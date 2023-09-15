<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequist;
use App\Models\RoleUser;
use \App\Traits\ImageTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    use ImageTrait;

    public function __construct()
    {

    }//end of constructor

    public function index(Request $request)
    {
        $users = User::whereNotIn('type', ['visitor', 'customer', 'vendor', 'branch'])->latest()->get();

        return view('users.index', compact('users'));

    }//end of index


    public function create()
    {

        $models = ['users', 'categories', 'tags', 'brands', 'products', 'coupons', 'orders', 'advertisings', 'settings', 'socials', 'sections'];

        $maps = ['create', 'read', 'update', 'delete'];
        return view('users.create', compact('models', 'maps'));

    }//end of create

    public
    function store(CreateUserRequist $request)
    {


        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'sample']);
        if ($request->image) {
            $this->saveImage('uploads/', $request->image, $width = 900, $height = 500);
            $request_data['image'] = $request->image->hashName();
        }
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);
        $user->attachRole($user->type);
//        $user->syncPermissions($request->permissions);
//        $this->logs($user->name, 'Add User ');

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('users.index');

    }//end of store

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }//end of user

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }//end of user

    public function update(Request $request, User $user)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'password' => 'nullable|min:6|confirmed',
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'mobile_verified']);

        if ($request->password != null) {
            $request_data['password'] = bcrypt($request->password);

        }
        if ($request->avatar) {
            $this->saveImage('uploads/', $request->avatar, $width = 900, $height = 500);
            $request_data['avatar'] = $request->avatar->hashName();
        }
//        if ($request->type != $user->type&& $user->roles()->count()>0) {
//            $user->roles()->delete();
//        }


//        dd($request->type);
        if ($request->type != $user->type) {
//            dd( RoleUser::where('user_id', $user->id)->get());
          RoleUser::where('user_id', $user->id)->delete();
            $user->attachRole($request->type);
        }
        $user->update($request_data);
       // $user->attachRole($user->type);

        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('users.index');

    }//end of update

    public
    function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }//end of destroy

}//end of controller
