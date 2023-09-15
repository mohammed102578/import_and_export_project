<?php

namespace App\Http\Controllers;


use App\Models\Cats;
use Illuminate\Http\Request;
use App\Imports\importCats;
use Maatwebsite\Excel\Facades\Excel;


class CatController extends AppBaseController
{

    public function uploadFile(Request $request)
	{
        Excel::import(new importCats, $request->file);
		
        return redirect()->route('uploadFile.index')->with('success', __('site.Operation Done successfully'));
	}

    public function create()
    {
        return view('excel.create');
    }
    public function index()
    {
        $cats = Cats::all();
        return view('excel.index', compact('cats'));
    }
    public function destroy($id)
    {
        $category = Cats::find($id);
        $category->delete();

    }
}
