<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\Customers;
use Illuminate\Http\Request;

class Customers_Controller extends Controller
{

    public function index()
    {

        $Customers = Customers::all();
        return view('Customers.index', compact('Customers'));

    }
    function Check_Customer_Account()
    {

        return view('Check_Customer_Account.index');
    }
    public function create()
    {
        $serial = 1211001;
        $data = Customers::latest()->value('id');
        if ($data < 1) {
            $data += $serial;
        } else {
            $data += 1211001;
        }
        return view('Customers.create', compact('data'));
    }

    public function customers_modal(Request $request)
    {
        $id = $request->id;
        $data = Customers::get()->find($id);
        // return $data;
        return view('Customers.Customer_Modal.Customer_edit', compact('data'));
    }
    public function store(Request $request)
    {
        // $file_extinstion = $request->pic->getClientOriginalExtension();
        // $pic = time() . rand(1, 10000) . "." . $file_extinstion;
        // $path = 'images/customers';
        // $request->pic->move($path, $pic);
        $customer = Customers::create([

            "account_number" => $request->acc_number,
            "customer_name" => $request->acc_name,
            "start_balance" => 0,
            "current_balance" => 0,
            "customer_address" => $request->address,
            "customer_email" => $request->email,
            "customer_imge" => $request->pic,

        ]);
        accounts::create([

            // $customer->

            "account_type" => 3,
            "is_parent" => 0,
            "parrent_account_number" => 3,
            "name" => $customer->customer_name,
            "account_number" => $customer->account_number,
            "start_balance_status" => $customer->acc_name,
            "start_balance" => 0,
            "current_balance" => 0,
            "is_archived" => 1,
            "notes" => "لا توجد ملاحظات",
            "date"=>date('Y-m-d'),

        ]);

        return redirect()->route('Customers');

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

        $sup_id = Customers::find($request->id);
        $sup_id->update([
            "account_number" => $request->acc_number,
            "customer_name" => $request->acc_name,
            "start_balance" => $request->balance_start,
            "current_balance" => $request->current_balance,
            "customer_address" => $request->address,
            "customer_email" => $request->email,
            "customer_imge" => $request->pic,
        ]);
        return redirect()->route('Customers');
    }


    public function destroy()
    {
        abort(404);
    }
}