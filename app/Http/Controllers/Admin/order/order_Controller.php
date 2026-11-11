<?php

namespace App\Http\Controllers\Admin\order;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class order_Controller extends Controller
{
    public function index()
    {
    }
 
    public function create()
    {
        abort(404);
    }

 
    public function store(Request $request)
    {
        // dd($request->customer_name);
      
       
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
