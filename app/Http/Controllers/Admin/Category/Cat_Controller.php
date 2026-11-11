<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class Cat_Controller extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('Category.index', compact('categories'));
        // return view('Category.index');
    }
    public function create()
    {

        $categories = category::all();
        return view('Category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        category::create([
            "cat_name" => $request->cat_name,
            "cat_description" => $request->cat_description,
            // "status" => $request->status,
        ]);
        return redirect()->route('Cat');
        // return $validation = Validator::make($request, [
        //     'cat_name' => 'require|unique:cat_name',
        // ]);
        // dd($request->all());
    }
    public function edit($id)
    {
        $edit_data = category::find($id);
        
        return view('Category.edit', compact('edit_data'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $cat_id = category::find($request->id);
        $cat_id->update([
            "cat_name" => $request->cat_name,
            "cat_description" => $request->cat_description,
            "status" => $request->status,
        ]);
        return redirect()->route('Cat');
    }
}
