<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id','desc')->get();

        return view('countries.index',compact('countries'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $country   =   Country::updateOrCreate(['id' => $request->id],
            [
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'status' =>$request->status == 'on' ? 1 : 0,
                'user_id'=> auth()->id()
            ]);
        if ($country) {
            session()->flash('success', __('site.saved_successfully'));
        }
        return response()->json(['success' => true]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $country  = Country::where($where)->first();
        return response()->json($country);
    }


    function destroy($id)
    {
        $country = Country::find($id);

        $country->delete();

        session()->flash('success', __('site.deleted_successfully'));
        return back();

    }//end of destroy
}
