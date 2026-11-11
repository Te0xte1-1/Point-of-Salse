<?php

namespace App\Http\Controllers\Admin\Mony;

use App\Http\Controllers\Controller;
use App\Models\mony_type_move;
use Illuminate\Http\Request;

class Mony_Move_Type_Controller extends Controller
{

    public function index()
    {
        $mony_move_type = mony_type_move::all();
        return view('Mony_Move_Type.index', compact('mony_move_type'));
    }


    public function store(Request $request)
    {
        dd($request);
    }


    public function edit($id)
    {
        $edit_data = mony_type_move::select()->find($id);
        return view('Mony_Move_Type.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function destroy()
    {
        abort(404);
    }
}
