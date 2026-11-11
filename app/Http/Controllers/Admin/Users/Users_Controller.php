<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\User;
use Illuminate\Http\Request;

class Users_Controller extends Controller
{
    public function index()
    {
        $admins = Admins::all();
        return view('Users.index',compact('admins'));
    }
    public function edit($id)
    {
        return view('Users.edit');
    }
    public function update(Request $request)
    {
        $cat_id = User::find($request->id);
        $cat_id->update([
            "cat_name" => $request->cat_name,
            "cat_description" => $request->cat_description,
            "status" => $request->status,
        ]);
        return redirect()->route('Cat');
    }
}
