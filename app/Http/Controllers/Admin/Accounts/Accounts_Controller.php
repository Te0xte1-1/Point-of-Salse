<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\accounts_type;
use App\Models\Customers;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class Accounts_Controller extends Controller
{
    public function index()
    {
        $accounts = accounts::all();
        foreach ($accounts as $key) {

            $key->account_type_name = accounts_type::where('id', $key->account_type)->value('account_name');
        }

        return view('Account_Tree.index', compact('accounts'));

    }
    public function create()
    {

        $last_number = accounts::select('id')->count('id');
        if (!empty($last_number)) {

            $last_number = accounts::select('id')->count('id');
            if ($last_number > 0) {
                $last_number += 1;
            }

        } else {

            $last_number = 1;
        }

        $acc_type = accounts_type::where('related_internal_account', 0)->get();
        $acc = accounts::where('is_parent', 1)->get();
        return view('Account_Tree.create', compact('acc_type', 'acc', 'last_number'));
    }
    public function store(Request $request)
    {

        $last_number = accounts::select('account_number')->orderby('id', 'Desc')->first();
        // check if account type is supplier or customer
        if ($request->acc_type == 2) {
            // if it's supplier we generate account number depend on supplier table last id
            $serial = 1212001;
            $data = Suppliers::latest()->value('id');
            if ($data < 1) {
                $data += $serial;
            } else {
                $data += 1212001;
            }
            // insert to account table (Tree) 
            $account_added = accounts::create([
                'name' => $request->acc_name,
                'account_type' => $request->acc_type,
                'account_number' => $data,
                'is_parent' => $request->is_parent,
                'start_balance_status' => $request->balance_status,
                'start_balance' => 0,
                'current_balance' => 0,
                'is_archived' => $request->active,
                'notes' => $request->note,
                "date" => date('Y-m-d'),
            ]);

            // here we insert into supplier table 
            $sup = Suppliers::create([
                "account_number" => $data,
                "sup_name" => $account_added->name,
                "start_balance" => 0,
                "current_balance" => 0,

            ]);

        }
        //here we do check if this type of account is customer    
        elseif ($request->acc_type == 3) {
            // we generate account number depend on customer table last id
            $serial = 1211001;
            $data = Customers::latest()->value('id');
            if ($data < 1) {
                $data += $serial;
            } else {
                $data += 1211001;
            }
            $account_added = accounts::create([
                'name' => $request->acc_name,
                'account_type' => $request->acc_type,
                'account_number' => $data,
                'is_parent' => $request->is_parent,
                'start_balance_status' => $request->balance_status,
                'start_balance' => 0,
                'current_balance' => 0,
                'is_archived' => $request->active,
                'notes' => $request->note,
                "date" => date('Y-m-d'),
            ]);
            $cust = Customers::create([

                "account_number" => $data,
                "customer_name" => $account_added->name,
                "start_balance" => 0,
                "current_balance" => 0,
            ]);
        }else{
            $account_added = accounts::create([
                'name' => $request->acc_name,
                'account_type' => $request->acc_type,
                'account_number' => $request->acc_number,
                'is_parent' => $request->is_parent,
                'start_balance_status' => $request->balance_status,
                'start_balance' => 0,
                'current_balance' => 0,
                'is_archived' => $request->active,
                'notes' => $request->note,
                "date" => date('Y-m-d'),
            ]);
        }
        return redirect()->route('Account_Tree');
    }

    public function show($acc_id)
    {
        $acc_data = accounts::find($acc_id);
        // return $acc_data;
        return view('Account_Tree.show', compact('acc_data'));
    }
    public function edit($id)
    {
    }
    public function update(Request $request)
    {
    }

}