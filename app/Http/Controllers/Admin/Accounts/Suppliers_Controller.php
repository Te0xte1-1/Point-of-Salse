<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class Suppliers_Controller extends Controller
{
 
    public function index(){
    $Suppliers = Suppliers::all();
    return view('Suppliers.index',compact('Suppliers'));
    
    
}
public function create()
{
    $serial = 1212001;
    $data = Suppliers::latest()->value('id');
    if ($data < 1) {
    $data += $serial;    
    } else {
    $data +=1212001;
    }
    return view('Suppliers.create',compact('data'));

    
}
function Check_Supplier_Account() {
    
    return view('Check_Supplier_Account.index');
}
   
    public function store(Request $request)
    {

        // $file_extinstion = $request->pic->getClientOriginalExtension();
        // $pic = time() . rand(1, 10000) . "." . $file_extinstion;
        // $path = 'images/customers';
        // $request->pic->move($path, $pic);

       $sup= Suppliers::create([

            "account_number"=>  $request->acc_number,
               "sup_name"=>    $request->acc_name,
               "start_balance"=>0 ,
               "current_balance"=>0,
               "sup_phone"=>$request->phone,
               "sup_address"=>$request->address,
               "sup_email"=>$request->email ,
            //    "sup_image"=>$request->pic,
               
           ]);
   
           accounts::create([

            // $customer->

            "account_type" => 2,
            "is_parent" => 0,
            "parrent_account_number" => 2,
            "name" => $sup->sup_name,
            "account_number" => $sup->account_number,
            "start_balance_status" => $sup->acc_name,
            "start_balance" => 0,
            "current_balance" => 0,
            "is_archived" => 1,
            "notes" => "لا توجد ملاحظات",
            "date"=>date('Y-m-d'),

        ]);
           return redirect()->route('Suppliers');
    }

 
    public function show()
    {
        //
    }
    public function Supplier_modal(Request $request){
        $id = $request->id;
        $data = Suppliers::get()->find($id);
        // return $data;
        return view('Suppliers.Supplier_Modal.Supplier_edit',compact('data'));
    }
    public function edit()
    {
        //
    }

 
    public function update(Request $request)
    {
        $sup_id = Suppliers::find($request->id);
        $sup_id->update([    
            "account_number"=>  $request->acc_number,
            "sup_name"=>    $request->acc_name,
            "start_balance"=>$request->balance_start ,
            "current_balance"=>$request->current_balance,
            "sup_phone"=>$request->phone,
            "sup_address"=>$request->address,
            "sup_email"=>$request->email ,
            "sup_image"=>$request->pic,
        ]);
        return redirect()->route('Suppliers');
    }


    public function destroy()
    {
        abort(404);
    }
}
