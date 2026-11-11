<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\Supplier_with_order;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\Treasures_Transactions;

class Finance_suppliers_controller extends Controller
{
    public function index()
    {
        $data = accounts::where(['account_type' => '2', 'is_parent' => '0'])->get();
        return view('report.supplier.index', compact('data'));

    }

    public function mirror(Request $request)
    {
        $supplier = $request->supplier;
        $today_date = $request->today_date;
        $report_type = $request->report_type;
        $from = $request->from;
        $to = $request->to;

        $get_supplier_account_number = accounts::select('name', 'account_number')->find($supplier);
        $number = $get_supplier_account_number->account_number;
        $get_supplier_start_balance = accounts::select('start_balance')->where('account_number', $number)->first();
        $get_supplier_pure_orders = Supplier_with_order::where('account_number', $number)->sum('money_for_account');
        $get_supplier_pure_money = Treasures_Transactions::where('account_number', $number)->sum('money_for_account');

        $update_balance = $get_supplier_start_balance->start_balance += $get_supplier_pure_orders += $get_supplier_pure_money;

        $update_Current_balance = accounts::where('account_number', $number)->first();
        $update_Current_balance->update([
            'current_balance' => $update_balance
        ]);

        // return $update_balance;
        if ($update_Current_balance) {
            return view('report.supplier.mirror', compact('get_supplier_account_number','get_supplier_start_balance','get_supplier_pure_orders', 'get_supplier_pure_money'));
        } else {
            return false;
        }

    }

    public function get_supplier_data(Request $request)
    {
        // $id = $request->supplier;
        // $suppliers = accounts::select('date')->where('id',$id)->first();
        // return $suppliers->date;
        return $request->all();
    }


}