<?php

namespace App\Http\Controllers\Admin\Units;

use App\Http\Controllers\Controller;
use App\Models\Units;
use Illuminate\Http\Request;

class Units_Controller extends Controller
{
    public function index(){
    
        $Units = Units::all();
        return view('Units.index',compact('Units'));
    
    }
    public function store(Request $request){
        
        Units::create([
            'unit_name' => $request->unit_name,
        ]);
        return redirect()->route('Units');
       
    }    public function unit_modal(Request $request){
   
        $id = $request->id;
        $data = Units::get()->find($id);
        return view('Units.Unit_Modal.Unit_edit',compact('data'));
    }

     public function edit(Request $id){
    
        return view('Units.index',compact(''));
    }public function update(Request $request){
        $cust_id = Units::find($request->id);
        $cust_id->update($request->all());
        return view('Units.index',compact(''));
    
    }
}
