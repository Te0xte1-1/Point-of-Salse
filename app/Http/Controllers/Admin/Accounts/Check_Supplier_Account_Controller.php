<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Check_Supplier_Account_Controller extends Controller
{
 
    public function index(){
    
        // $Customers = Customers::all();
        // return view('Check.index',compact('Customers'));
        
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
        //
    }

 
    public function update(Request $request)
    {
        //
    }


    public function destroy()
    {
        abort(404);
    }
}
