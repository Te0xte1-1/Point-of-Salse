<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\Treasures_Transactions;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Customers;
use App\Models\Product;
use App\Models\salse;
use App\Models\Suppliers;

class Finance_customers_controller extends Controller
{
    public function index()
    {
        $data = accounts::where(['account_type' => '3', 'is_parent' => '0'])->get();
        // return $data;
        return view('report.customer.index', compact('data'));
    }
    public function mirror(Request $request)
    {
        $customer = $request->customer;
        $today_date = $request->today_date;
        $report_type = $request->report_type;
        $from = $request->from;
        $to = $request->to;

        $get_customer_account_number = accounts::select('name', 'account_number')->find($customer);
        $number = $get_customer_account_number->account_number;
        $get_customer_start_balance = accounts::select('start_balance')->where('account_number', $number)->first();
        $get_customer_pure_orders = salse::where('account_number', $number)->sum('total');
        $get_customer_pure_money = Treasures_Transactions::where('account_number', $number)->sum('money_for_account');

        $update_balance = $get_customer_start_balance->start_balance += $get_customer_pure_orders += $get_customer_pure_money;

        $update_Current_balance = accounts::where('account_number', $number)->first();
        $update_Current_balance->update([
            'current_balance' => $update_balance
        ]);

        // return $update_balance;
        if ($update_Current_balance) {
            return view('report.customer.mirror', compact('get_customer_account_number', 'get_customer_start_balance', 'get_customer_pure_orders', 'get_customer_pure_money'));
        } else {
            return false;
        }
    }

    public function get_customer_data(Request $request)
    {
        return $request->all();
        // $customers = accounts::select('created_at')->find($request->customer);
        // return json_encode($customers);
    }



// if ($_POST) {
//     die('new check');
// } else {
//     $data = Suppliers::all();
//     return view('Finance_customers_mirror.index');
// }


}