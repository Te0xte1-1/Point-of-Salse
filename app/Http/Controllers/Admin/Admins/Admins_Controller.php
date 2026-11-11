<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class Admins_Controller extends Controller
{
    public function index()
    {
        $admins = Admins::all();
        return view('Admins.index', compact('admins'));
        // return view('Admins.index');
    }
    public function create()
    {

        $admins = Admins::all();
        return view('Admins.create', compact('admins'));
    }
    public function store(Request $request)
    {
        Admins::create([
            "name" => $request->name,
        ]);
        return redirect()->route('Admins');
        // return $validation = Validator::make($request, [
        //     'name' => 'require|unique:name',
        // ]);
        // dd($request->all());
    }
    public function show($id)
    {

        $admins_treasures = Admins::all();
        return view('Admins.create', compact('admins'));
    }
    public function edit($id)
    {
        return view('Admins.index');
    }
    public function update(Request $request)
    {
        $admin_id = Admins::find($request->id);
        $admin_id->update($request->all());
        return redirect()->route('Pro');
    }

}