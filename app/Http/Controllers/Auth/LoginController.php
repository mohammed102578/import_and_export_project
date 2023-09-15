<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Dashboard;
//    public function username()
//    {
//
//        return 'username';
//    }
    public function username()
    {
        $value = request()->input('email'); // ahmed.emam.dev@gmail  or 293293923293
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field =>$value ]);
        return  $field;
    }
//    protected function credentials(Request $request) {
//        return array_merge($request->only($this->username(), 'password'), ['type' => ['super_admin','branch','vendor','operation','customer_service']]);
//    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
}
