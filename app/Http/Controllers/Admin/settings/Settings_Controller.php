<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;

class settings_Controller extends Controller
{
 
    public function index()
    {
        return view('settings.index');
    }
    public function create()
    {
        abort(404);
    }

 
    public function store(Request $request)
    {
        abort(404);
    }

  
    public function show()
    {
        //
    }


    public function edit()
    {
       return view('Settings.edit');
    }
    
    
    public function update(Request $request)
    {
        $cust_id = settings::find($request->id);
        $cust_id->update($request->all());
        return view('Settings.index');
    }


    public function destroy()
    {
        abort(404);
    }
}
