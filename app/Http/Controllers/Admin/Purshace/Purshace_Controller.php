<?php

namespace App\Http\Controllers\Admin\Purshace;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\bill_type;
use App\Models\category;
use App\Models\Customers;
use App\Models\pay_type;
use App\Models\Stocks;
use App\Models\Stock_data;
use App\Models\Store_data;
use App\Models\Units;
use App\Models\Product;
use App\Models\purshace;
use App\Models\Suppliers;
use App\Models\Supplier_with_order;
use App\Models\Supplier_with_order_details;
use App\Models\Treasures;
use App\Models\Treasures_Transactions;
use Illuminate\Http\Request;

class Purshace_Controller extends Controller
{
    public function index()
    {
        $pay_type = pay_type::all();
        $bill_type = bill_type::where('id', 4)->first();
        $Suppliers = Supplier_with_order::orderby('id', 'DESC')->get();

        // get Suppliers name by using id in purshace bill
        foreach ($Suppliers as $value) {

            $value->supplier_id = Suppliers::where('account_number', $value->account_number)->value('sup_name');
        }

        return view('Purshace.index', compact('Suppliers'));
    }
    public function load_table_index()
    {
        $Suppliers = Supplier_with_order::orderby('id', 'DESC')->get();
        foreach ($Suppliers as $value) {

            $value->supplier_id = Suppliers::where('account_number', $value->account_number)->value('sup_name');
            // $value->supplier_id = Suppliers::where('id', $value->supplier_id)->value('sup_name');
        }
        return view('Purshace.load_purshace.load_table_index', compact('Suppliers'));

    }
    public function create()
    {
        $pay_type = pay_type::all();
        $bill_type = bill_type::where('id', 4)->first();
        $supplier = accounts::where(['account_type' => 2, 'is_parent' => 0])->get();
        $Stocks = Stocks::all();
        return view('Purshace.create', compact('supplier', 'Stocks', 'pay_type', 'bill_type'));
    }
    public function add_items($id)
    {

        // $get_items = Supplier_with_order::find($id);
        $bill_info = Supplier_with_order::find($id);
        $auto_serial_bill = $bill_info->auto_serial;
        $get_items_from_order_bill = Supplier_with_order_details::where('order_id', $auto_serial_bill)->get();
        $Customers = Customers::all();
        $Stocks = Stocks::all();
        $Categorys = category::all();
        $units = Units::all();

        return view('Purshace.add_items', compact('get_items_from_order_bill', 'bill_info', 'Customers', 'Stocks', 'Categorys', 'units'));
    }
    public function store(Request $request)
    {
        $get_supplier_acc_number = accounts::select('account_number')->where('id', $request->supplier_id)->first();

        $purshace_info = Supplier_with_order::create([
            "auto_serial" => $request->code_bill,
            "supplier_id" => $request->supplier_id,
            "account_number" => $get_supplier_acc_number->account_number,
            "bill_type" => $request->bill_type,
            "order_pay_type" => $request->pay_type,
            "store_id" => $request->store_id,
            "note" => $request->note,
        ]);

        return redirect()->route('Purshace');
    }
    public function add_items_store(Request $request)
    {
        $serial_order = $request->serial;
        $purshace_detailse = Supplier_with_order_details::create([
            "order_id" => $request->serial,
            "cat_id" => $request->cat,
            "item_id" => $request->pro,
            "unit_id" => $request->unit,
            "item_qty" => $request->qty,
            "unit_price" => $request->price,
            "total_price" => $request->total,
            "creation_product" => $request->creation_product,
            "expiration_product" => $request->expiration_product,
        ]);

        $get_sum_items = Supplier_with_order_details::where('order_id', $serial_order)->sum('total_price');
        $salse = Supplier_with_order::where('auto_serial', $serial_order)->first();


        $salse->update([
            'total_cost' => $get_sum_items
        ]);

        echo json_encode('done');
    }
    public function delete_item_from_bill(Request $request)
    {

        $delete_id = $request->delete_id;
        $order_id = $request->order_id;

        $get_order_bill_detailse = Supplier_with_order_details::where('id', $delete_id)->first();
        $get_order_bill = Supplier_with_order::select('total_cost')->where('auto_serial', $order_id)->first();
        $update_total = Supplier_with_order::where('auto_serial', $order_id)->first();
        $deleted_item_amount = $get_order_bill_detailse->total_price;
        $the_operation_of_decres_total = $get_order_bill->total_cost -= $deleted_item_amount;
        // return $get_order_bill->total_cost ." ".$deleted_item_amount;
        $update_total->update([
            'total_cost' => $the_operation_of_decres_total,
        ]);
        $get_order_bill_detailse->delete();
        return json_encode('done');
    }
    public function load_pro_by_cat(Request $request)
    {

        if ($request->ajax()) {

            $cat_id = $request->cat_id;
            $data = category::with('products')->find($cat_id);

            return view('Purshace.load_purshace.load_pro_by_cat_id_in_purshace', compact('data'));
        }
    } // Get Product Items by using Category Id
    public function load_table_parent_added(Request $request)
    {
        if ($request->ajax()) {


            $serial = $request->serial;
            $get_order_bill = Supplier_with_order::where('auto_serial', $serial)->first();

            return view('Purshace.load_purshace.parent_added_done', compact('get_order_bill'));
        }
    } // load Table items added
    public function load_table_added(Request $request)
    {
        if ($request->ajax()) {


            $serial = $request->serial;
            $get_order_bill = Supplier_with_order::where('auto_serial', $serial)->first();
            $get_items_from_order_bill = Supplier_with_order_details::where('order_id', $serial)->get();
            return view('Purshace.load_purshace.items_added_done', compact('get_items_from_order_bill', 'get_order_bill'));
        }
    } // load Table items added
    public function load_product_price(Request $request)
    {
        if ($request->ajax()) {

            $pro_id = $request->pro_id;
            $data = Product::select('price')->find($pro_id);
            return $data;
            // return view('Salse.load_salse.load_product_price', compact('data'));
        }
    } // Get Price Of Product By Id
    public function prepare_bill_to_complete(Request $request)
    {
        if ($request->ajax()) {
            $serial = $request->auto_serial;
            $treasures = Treasures::all();
            $get_order_bill = Supplier_with_order::where('auto_serial', $serial)->first();
            return view('Purshace.load_purshace.prepare_bill_to_complete', compact('get_order_bill', 'treasures'));
        }
    }
    public function get_treasures_data(Request $request)
    {

        $treasures_id = $request->treasures_id;

        $get_treasures_data = Treasures::where('id', $treasures_id)->sum('money');

        return $get_treasures_data;
    }
    public function edit_items_after_added_to_order(Request $request)
    {

        $item_id = $request->item_id;
        $bill_info = Supplier_with_order_details::find($item_id);
        // return $bill_info;
        return view('Purshace.load_purshace.edit_items_after_added_to_order', compact('bill_info'));
    }
    public function updated_items_after_added_to_order(Request $request)
    {
        if ($request->ajax()) {

            $updated_item_after_added_serial = $request->data['updated_item_after_added_serial'];
            $updated_item_after_added_item_id = $request->data['updated_item_after_added_item_id'];
            $updated_item_after_added_cat = $request->data['updated_item_after_added_cat'];
            $updated_item_after_added_pro = $request->data['updated_item_after_added_pro'];
            $updated_item_after_added_qty = $request->data['updated_item_after_added_qty'];
            $updated_item_after_added_price = $request->data['updated_item_after_added_price'];
            $updated_item_after_added_subtotal_cost = $request->data['updated_item_after_added_subtotal_cost'];
            $id_for_update = $updated_item_after_added_item_id;
            $bill_update_data = Supplier_with_order_details::where('id', $id_for_update)->first();
            $bill_update_data->update([
                'item_qty' => $updated_item_after_added_qty,
                'unit_price' => $updated_item_after_added_price,
                'total_price' => $updated_item_after_added_subtotal_cost,
            ]);
            return json_decode("done");
        }
    }
    public function approve(Request $request)
    {
        // الفاتورة كاش سوف يتم التأثير على أربعه جداول  المخازن,العمليات المالية,الخزينة++, تأثير على حساب العميل

        $pay_type = $request->pay_type;

        $get_account_number = Supplier_with_order::select('account_number')->where('auto_serial', $request->auto_serial)->first();
        // ***********************  Teasures Table Effects *******************
        if ($pay_type == 1) {
            $treasures_id = $request->treasures_id;
            $transaction = Treasures::where('id', $treasures_id)->first();
            $trans_id = $transaction->last_isal_exchange;
            if (($transaction->last_isal_exchange) == 0) {
                $trans_id = $transaction->last_isal_exchange = 1;
            } else {
                $trans_id = $transaction->last_isal_exchange + 1;
            }
            $treasure_serial = $request->treasures_id;
            $update_trans = Treasures::where('id', $treasures_id)->update([
                'last_isal_exchange' => $trans_id,
                'money' => $transaction->money -= $request->total_after_all_hidden
            ]);

            if ($get_account_number->account_number == 0) {
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 0,
                    'account_type' => 2,
                    'account_number' => 303,
                    'money' => $request->total_after_all_hidden * (-1),
                    'money_for_account' => $request->total_after_all_hidden * (1),
                    'move_type_id' => 7,
                    'note' => 'فاتورة مشتريات',
                    'date' => date('Y-m-d'),
                ]);
            } else {
               
                $acc = accounts::where('account_number',$get_account_number->account_number)->first();
                $acc->update([
                    'current_balance' => $acc->current_balance +=$request->total_after_all_hidden
                ]);

                //complete transaction on treasures transaction table 
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 1,
                    'account_type' => 2,
                    'account_number' => $get_account_number->account_number,
                    'money' => $request->total_after_all_hidden * (1),
                    'money_for_account' => $request->total_after_all_hidden * (-1),
                    'move_type_id' => 5,
                    'note' => $request->note,
                    'date' => date('Y-m-d'),
                ]);
            }
            // ***********************  End Teasures Table Effects *******************

            // ***********************  Store Data Table Effects *******************
            $auto_serial = $request->auto_serial;
            $items_bill_deettailse = Supplier_with_order_details::where('order_id', $auto_serial)->get();
            $last_number = Store_data::select('batch_id')->count('batch_id');
            if (!empty($last_number)) {
    
                $last_number = Store_data::select('batch_id')->count('batch_id');
                if ($last_number > 0) {
                    $last_number += 1;
                }
    
            } else {
    
                $last_number = 1;
            }
            foreach ($items_bill_deettailse as $data) {
                $check_pro = Store_data::select('id', 'store_id', 'batch_id', 'qty', 'unit_cost_price', 'total_cost_unit', 'production_date', 'expiration_date')->where('pro_id', $data->item_id)->first();
                $data_to_insert['auto_serial'] = $data->order_id;
                $data_to_insert['batch_id'] = $last_number;
                $data_to_insert['store_id'] = 1;
                $data_to_insert['cat_id'] = $data->cat_id;
                $data_to_insert['pro_id'] = $data->item_id;
                $data_to_insert['unit_id'] = $data->unit_id;
                $data_to_insert['unit_cost_price'] = $data->unit_price;
                $data_to_insert['qty'] = $data->item_qty;
                $data_to_insert['total_cost_unit'] = $data->total_price;
                $data_to_insert['production_date'] = $data->production_date;
                $data_to_insert['expiration_date'] = $data->expiration_date;
                $flag = Stock_data::create($data_to_insert);

            }
            // ***********************  End Store Data Table Effects *******************


            // ***********************   update parent bill   Table Effects *******************
            $auto_serial = $request->auto_serial;
            $items_bill = Supplier_with_order_details::where('order_id', $auto_serial)->get();
            $update_parent = Supplier_with_order::where('auto_serial', $auto_serial)->first();
            $update_parent->update([
                "total_cost" => $request->total_after_all_hidden,
                'money_for_account' => $request->total_after_all_hidden * (1),
                "treasures_id" => $request->treasures_id,
                "order_pay_type" => $request->pay_type,
                "what_remain" => $request->remain_to_supplier_hidden * (-1),
                "what_paid" => $request->what_paid_now,
                "is_approved" => 1
            ]);
            // ***********************  End Store Data Table Effects *******************
            // ***********************  Start Account Update Table Effects *******************

            $purshace = Supplier_with_order::select(
                'auto_serial',
                'is_approved',
                'approved_by',
                'bill_type',
                'order_pay_type',
                'order_date',
                'supplier_id',
                'account_number',
                'total_cost',
                'money_for_account',
                'what_paid',
                'what_remain',
                'treasures_transaction_id',
                'store_id',
                'treasures_id',
                'supplier_balance_before',
                'supplier_balance_fater',
                'note',
            )->where('auto_serial', $request->auto_serial)->first();

            $purshace_data = Supplier_with_order_details::select(
                "order_id",
                "cat_id",
                "item_id",
                "unit_id",
                "item_qty",
                "unit_price",
                "total_price",
                "creation_product",
                "expiration_product",
            )->where('order_id', $request->auto_serial)->get();

            if ($get_account_number->account_number == 404) {

                foreach ($purshace_data as $key) {
                    $key->category_name = category::where('id', $key->cat_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->item_id)->value('product_name');
                }

            } else {
                // dd($salse);

                foreach ($purshace_data as $key) {
                    $key->category_name = category::where('id', $key->cat_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->item_id)->value('product_name');
                }
            }
            return view('Prints.Purshace.Print_A6', compact('purshace', 'purshace_data'));
        }

    } // Get Price Of Product By Id


    public function show($id)
    {
        $parent_bill = Supplier_with_order::where('id', $id)->first();
        $supplier_name = Suppliers::select('sup_name')->find($parent_bill->supplier_id);
        $items_bill = Supplier_with_order_details::where('order_id', $parent_bill->auto_serial)->get();
        // return $items_bill;
        return view('Purshace.show', compact('items_bill', 'parent_bill', 'supplier_name'));
    }
    public function edit($id)
    {
        $pay_type = pay_type::all();
        $bill_type = bill_type::where('id', 4)->first();
        ;
        $store_id = Stocks::all();
        $supplier_id = Suppliers::all();
        $get_bill_data = Supplier_with_order::where('id', $id)->first();


        return view('Purshace.edit', compact('supplier_id', 'store_id', 'get_bill_data', 'pay_type', 'bill_type'));
    }
    public function update(Request $request)
    {
        $cust_id = Customers::find($request->id);
        $cust_id->update($request->all());
        return redirect()->route('Purshace.index');
    }

}