<?php

namespace App\Http\Controllers\Admin\Salse;


use App\Models\order;
use App\Models\salse;
use App\Models\Units;
use App\Models\Stocks;
use App\Models\Product;
use App\Models\category;
use App\Models\pay_type;
use App\Models\bill_type;
use App\Models\Customers;
use App\Models\Treasures;
use App\Models\Stock_data;
use App\Models\Store_data;
use Illuminate\Http\Request;
use App\Models\salse_detailse;
use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\Treasures_Transactions;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

use function GuzzleHttp\Promise\all;

class Salse_Controller extends Controller
{
    public function index(Request $request)
    {
        $pay_type = pay_type::all();
        $bill_type = bill_type::all();
        $Salse = salse::select('*')->orderby('id', 'Desc')->get();
        $Customers = Customers::all();
        $Stocks = Stocks::all();
        $units = Units::all();
        $Categorys = category::with('products')->get();
        return view('Salse.index', compact('Salse', 'Categorys', 'Customers', 'units', 'Stocks', 'pay_type', 'bill_type'));
    }
    public function load_salse_table(Request $request)
    {
        if ($request->ajax()) {

        }
        $Salse = salse::select('*')->orderby('is_approved', 'Asc')->get();
        $total_salse = salse::select('total')->sum('total');

        foreach ($Salse as $value) {
            $value->bill_type = bill_type::where('id', $value->bill_type)->value('bill_type_name');
            $value->pay_type = pay_type::where('id', $value->pay_type)->value('pay_type_name');
            $value->acc_name = accounts::where('account_number', $value->account_number)->value('name');
        }
        return view('Salse.load_salse.load_salse_table', compact('Salse','total_salse'));
    }

    public function reload_items_in_invoice(Request $request)
    {
        $get_salse_detailse = salse::where('serial', $request->auto_serial)->get('id');
        $salse_detailse2 = salse_detailse::where('salse_id', $get_salse_detailse[0]->id)->get();

        foreach ($salse_detailse2 as $value) {
            $value->cat_name = category::where('id', $value->category_id)->value('cat_name');
            $value->product_name = Product::where('id', $value->product_id)->value('product_name');
            $value->unit_name = Units::where('id', $value->unit_id)->value('unit_name');
        }


        return view('Salse.load_salse.load_table_added', compact('salse_detailse2'));

    }
    public function get_item_add_row(Request $request)
    {
        if ($request->ajax()) {

            $store_id = $request->stock_id;
            $salse_id = $request->auto_serial;
            $product_id = $request->item;
            $auto_serial_related_by_pro = $request->item;
            $stock_data = stock_data::where('pro_id', $request->item)->first();

            // return $stock_data;
            if (!$stock_data) {
                return false;


            } else {

                // نقص الكميات في المخزن
                $stock_data->update([
                    "auto_serial" => $stock_data->auto_serial,
                    "batch_id" => $request->qty,
                    "store_id" => $request->stock_id,
                    "cat_id" => $request->cat,
                    "pro_id" => $request->item,
                    "unit_id" => $request->unit,
                    "unit_cost_price" => $request->price,
                    "qty" => $stock_data->qty -= $request->qty,
                    "total_cost_unit" => $stock_data->total_cost_unit += $request->subtotal_h,
                    "bill_type" => 3,
                    "move_type" => 5,
                ]);



                //  ادخال تفاصيل الفاتورة
                $get_salse_detailse = salse::where('serial', $request->auto_serial)->select('id', 'total')->first();
                $get_salse_detailse->update([
                    "total" => $request->subtotal_h + $get_salse_detailse->total,
                ]);
                $salse_detailse = salse_detailse::create([
                    'salse_id' => $get_salse_detailse->id,
                    'auto_serial' => $get_salse_detailse->serial,
                    'category_id' => $request->cat,
                    'product_id' => $request->item,
                    'unit' => $request->unit,
                    'price' => $request->price,
                    'qty' => $request->qty,
                    'subtotal' => $request->subtotal_h,
                    'move_type' => 5,
                ]);

            }
        }

    }

    public function update_salse_invoice_active(Request $request)
    {

        if ($request->ajax()) {

            // $salse_id = $request->auto_serial;
            // $product_id = $request->item;
            // $auto_serial_related_by_pro = $request->item;
            // $stock_data = stock_data::where('pro_id', $request->item)->first();

            // // return $stock_data;
            // // نقص الكميات في المخزن
            // $stock_data->update([
            //     "auto_serial" => $request->item,
            //     "batch_id" => $request->qty,
            //     "store_id" => $request->stock_id,
            //     "cat_id" => $request->cat,
            //     "pro_id" => $request->item,
            //     "unit_id" => $request->unit,
            //     "unit_cost_price" => $request->price,
            //     "qty" => $stock_data->qty -= $request->qty,
            //     "total_cost_unit" => $stock_data->total_cost_unit += $request->subtotal_h,
            //     "bill_type" => 3,
            //     "move_type" => 5,
            // ]);
        }
    }

    public function remove_item_detailse_invoice(Request $request)
    {
        $salse_auto_serial = $request->auto_serial; // like = 102452 salse serial
        $salse_id = $request->id_update; // like = 50 salse id
        $salse_detailse_item_id = $request->id; // like = 31 product item id

        $decrese_salse_total = salse::find($salse_id);
        $decrese_salse_detailse_total = salse_detailse::find($salse_detailse_item_id);
        $stock_data = stock_data::where(['cat_id' => $decrese_salse_detailse_total->category_id, 'pro_id' => $decrese_salse_detailse_total->product_id])->first();


        // نقص الكميات في المخزن
        $stock_data->update([
            "auto_serial" => $salse_id,
            "qty" => $stock_data->qty += $decrese_salse_detailse_total->qty,
            "total_cost_unit" => $stock_data->total_cost_unit -= $decrese_salse_detailse_total->subtotal,
        ]);

        //   حذف الصنف من تفاصيل الفاتورة
        $decrese_salse_detailse_total->delete();

        // انقاص المبلغ من الفاتورة الرئيسية
        $decrese_salse_total->update([
            'total' => $decrese_salse_total->total -= $decrese_salse_detailse_total->subtotal,
        ]);
        //    return $decrese_salse_detailse_total->product_id;

        return json_encode('done');
    }

    public function load_complete_invoice(Request $request)
    {

        if ($request->ajax()) {
            salse::create([
                'serial' => $request->serial,
                'customer_id' => $request->cusotmer,
                'account_number' => $request->cusotmer,
                'bill_type' => $request->bill_type,
            ]);

            $serial = $request->serial;
            $Customers = Customers::all();
            $Stocks = Stocks::all();
            $Categorys = category::all();
            $units = Units::all();
            $data = salse::where('serial', $serial)->first();
            return view('Salse.load_salse.load_complete_invoice', compact('data', 'Customers', 'Stocks', 'Categorys', 'units'));
        }
    }
    public function load_pro_by_cat(Request $request)
    {
        if ($request->ajax()) {

            $cat_id = $request->cat_id;
            $data = category::with('products')->find($cat_id);

            return view('Salse.load_salse.load_pro_by_cat_id_in_salse', compact('data'));
        }
    }
    public function load_product_by_serial(Request $request)
    {
        if ($request->ajax()) {

            $serial = $request->serial;
            $data = Product::where('product_serial', $serial)->get(['id', 'product_name', 'price']);
            return $data;
            // return view('Salse.load_salse.load_product_by_serial', compact('data'));

        }
    }

    public function check_available(Request $request)
    {

        $pro = $request->pro_id;
        if ($pro) {

            Stock_data::where('pro_id', '>');
        }

    }
    public function load_product_price(Request $request)
    {

        if ($request->ajax()) {

            $pro_id = $request->pro_id;
            $data = Product::select('price')->find($pro_id);
            // return view('Salse.load_salse.load_product_price', compact('data'));
            return $data;
        }
    }
    public function load_product_qty_on_stock(Request $request)
    {

        if ($request->ajax()) {

            $qty = "";
            $pro_id = $request->pro_id;
            $data = Stock_data::select('qty')->where('pro_id', $pro_id)->first();
            if (!$data) {
                return false;
            } else {
                return $data;
            }
        }
    }

    public function All_invoice_data(Request $request)
    {
        // Added Button For Save Type With Print Or Without Print with value
        $pay_type = $request->pay_type_active_invoice;
        $salse_id_number = $request->id_update;
        $salse_serial_number = $request->serial;
        $treasures_id = $request->treasures_id_active;
        $what_paid = $request->what_paid_active;
        $what_remain = $request->what_remain_active;
        $discount_amount = $request->active_discount;
        $total_after_desc = $request->total_active_after_desc_h;
        $customer_number = $request->customer_id;
        // return $request->all();


        // الفاتورة كاش سوف يتم التأثير على أربعه جداول
        // ,العمليات المالية,
        // الخزينة++,
        //  تأثير على حساب العميل
        // ***********************  Teasures Transaction Table Effects *******************
        if ($pay_type == 1) {
            $transaction = Treasures::where('id', $treasures_id)->first();
            $trans_id = $transaction->last_isal_collect;
            // get last isal to increase number of isals
            if (($transaction->last_isal_collect) == 0) {
                $trans_id = $transaction->last_isal_collect = 1;
            } else {
                $trans_id = $transaction->last_isal_collect + 1;
            }

            // update isal and money
            $treasure_serial = $request->treasures_id_active;
            $update_trans = Treasures::where('id', $treasures_id)->update([
                'last_isal_collect' => $trans_id,
                'money' => $transaction->money += $total_after_desc
            ]);



            // ***********************  End Teasures Transaction Table Effects *******************


            // ***********************  Start Account Update Table Effects *******************
            if ($customer_number == 0) {
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 0,
                    'account_number' => 404,
                    'money' => $total_after_desc * (1),
                    'money_for_account' => $total_after_desc * (-1),
                    'move_type_id' => 5,
                    'foreign_key'=>$salse_serial_number,
                    'note' => $request->note,
                    'date' => date('Y-m-d'),
                ]);
                $salse = salse::where('id', $salse_id_number)->update([
                    "is_approved" => 1,
                    "approved_by" => 1,
                    "total" => $total_after_desc,
                    "customer_id" => 404,
                    "bill_type" => 3,
                    "pay_type" => $pay_type,
                    "what_paid" => $what_paid,
                    "what_not_yet_paid" => $what_remain,
                    "discount_amount" => $discount_amount,
                    "note" => "فاتورة مبيعات",
                    "treasures_id" => $treasures_id,
                ]);
            } else {
                $acc = accounts::where('account_number',$customer_number)->first();
                $acc->update([
                    'current_balance' => $acc->current_balance +=$total_after_desc
                ]);

                //complete transaction on treasures transaction table 
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 1,
                    'account_number' => $customer_number,
                    'money' => $total_after_desc * (1),
                    'money_for_account' => $total_after_desc * (-1),
                    'move_type_id' => 5,
                    'note' => $request->note,
                    'date' => date('Y-m-d'),
                ]);
                $salse = salse::where('id', $salse_id_number)->update([
                    "is_approved" => 1,
                    "approved_by" => 1,
                    "total" => $total_after_desc,
                    "customer_id" => $customer_number,
                    "bill_type" => 3,
                    "pay_type" => $pay_type,
                    "what_paid" => $what_paid,
                    "what_not_yet_paid" => $what_remain,
                    "discount_amount" => $discount_amount,
                    "note" => "فاتورة مبيعات",
                    "treasures_id" => $treasures_id,
                ]);
            }



            $salse = salse::select(
                'account_number',
                'serial',
                'approved_by',
                'customer_id',
                'bill_type',
                'pay_type',
                'what_paid',
                'what_not_yet_paid',
                'discount_amount',
                'total',
                'note',
                'date'
            )->where('id', $salse_id_number)->first();

            $salse_data = salse_detailse::select(
                'category_id',
                'product_id',
                'unit',
                'price',
                'qty',
                'subtotal',
            )->where('salse_id', $salse_id_number)->get();


            if ($customer_number == 404) {

                foreach ($salse_data as $key) {
                    $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->product_id)->value('product_name');
                }

            } else {
                // dd($salse);

                foreach ($salse_data as $key) {
                    $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->product_id)->value('product_name');
                }
            }




            return view('Prints.Salse.Print_A6', compact('salse', 'salse_data'));
            // ***********************  Start Teasures Update Table Effects *******************
        }

        // ***********************  End Store Data Table Effects *******************
    }

    public function edit($id)
    {
        $pay_type = pay_type::all();
        $bill_type = bill_type::all();
        $bill_salse_info = salse::find($id);
        $bill_salse_detailse = salse_detailse::where('salse_id', $id)->get();
        return view('Salse.edit', compact('bill_salse_info', 'bill_salse_detailse', 'bill_type', 'pay_type'));
    } //edit function
    public function load_edit_bill(Request $request)
    {
        if ($request->ajax()) {
            $category = category::all();
            $Units = Units::all();
            $stocks = Stocks::all();
            $bill_id = $request->bill_id;
            $bill_salse_info = salse::find($bill_id);
            $bill_salse_detailse = salse_detailse::select('id', 'salse_id', 'category_id', 'product_id', 'price', 'qty', 'subtotal')->where('salse_id', $bill_salse_info->id)->get();
            foreach ($bill_salse_detailse as $bill_salse_det) {

                $bill_salse_det->category_name = category::where('id', $bill_salse_det->category_id)->value('cat_name');
                $bill_salse_det->product_name = Product::where('id', $bill_salse_det->product_id)->value('product_name');
            }
            // return $bill_salse_detailse;
            return view('Salse.load_salse_edit.load_edit_bill', compact('bill_salse_info', 'category', 'Units', 'stocks', 'bill_salse_detailse'));
        }
    }
    public function update(Request $request)
    {
        $cust_id = salse::find($request->id);
        $cust_id->update($request->all());
        return view('Prints.index');
    }

    public function done_print4($id)
    {
        $salse = salse::select('account_number','serial','approved_by','customer_id','bill_type','pay_type','what_paid','what_not_yet_paid','discount_amount','total','note','date')->where('id', $id)->first();
        $salse_data = salse_detailse::select('category_id','product_id','unit','price','qty','subtotal',)->where('salse_id', $id)->get();
        if ($salse->customer_id == 404) {

            foreach ($salse_data as $key) {
                $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                $key->product_name = Product::where('id', $key->product_id)->value('product_name');
            }

        } else {

            foreach ($salse_data as $key) {
                $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                $key->product_name = Product::where('id', $key->product_id)->value('product_name');
            }
        }
        return view('Prints.Salse.Done_Print_A4', compact('salse', 'salse_data'));
    }
    public function done_print6 ($id)
    {
        $salse = salse::select('account_number','serial','approved_by','customer_id','bill_type','pay_type','what_paid','what_not_yet_paid','discount_amount','total','note','date')->where('id', $id)->first();
        $salse_data = salse_detailse::select('category_id','product_id','unit','price','qty','subtotal',)->where('salse_id', $id)->get();
        if ($salse->customer_id == 404) {

            foreach ($salse_data as $key) {
                $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                $key->product_name = Product::where('id', $key->product_id)->value('product_name');
            }

        } else {

            foreach ($salse_data as $key) {
                $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                $key->product_name = Product::where('id', $key->product_id)->value('product_name');
            }
        }
        return view('Prints.Salse.Done_Print_A6', compact('salse', 'salse_data'));
    
    }
    public function order_print(Request $request)
    {
        return $request->all();
        // return view('Prints.Salse_Print');
    }

    // Edit Bill Detailse Section (Remove Old Item Or Added OR Increase Or Decress) 
    public function get_item_add_row_edit_bill(Request $request)
    {
        if ($request->ajax()) {

            $store_id = $request->stock_id;
            $salse_id = $request->auto_serial;
            $product_id = $request->item;
            $auto_serial_related_by_pro = $request->item;
            $stock_data = stock_data::where('pro_id', $request->item)->first();
            
            if (!$stock_data) {
                return $request->all();
                // return json_encode('this data not added on stock please add it...!');
                return false;

            } else {

                // نقص الكميات في المخزن
                $stock_data->update([
                    "auto_serial" => $stock_data->auto_serial,
                    "batch_id" => $request->qty,
                    "store_id" => $request->stock_id,
                    "cat_id" => $request->cat,
                    "pro_id" => $request->item,
                    "unit_id" => $request->unit,
                    "unit_cost_price" => $request->price,
                    "qty" => $stock_data->qty -= $request->qty,
                    "total_cost_unit" => $stock_data->total_cost_unit += $request->subtotal_h,
                    "bill_type" => 3,
                    "move_type" => 5,
                ]);



                //  ادخال تفاصيل الفاتورة
                $get_salse_detailse = salse::where('serial', $request->auto_serial)->select('id', 'total')->first();
                $get_salse_detailse->update([
                    "total" => $request->subtotal_h + $get_salse_detailse->total,
                ]);
                $salse_detailse = salse_detailse::create([
                    'salse_id' => $get_salse_detailse->id,
                    'category_id' => $request->cat,
                    'auto_serial' => $get_salse_detailse->serial,
                    'product_id' => $request->item,
                    'unit' => $request->unit,
                    'price' => $request->price,
                    'qty' => $request->qty,
                    'subtotal' => $request->subtotal_h,
                    'move_type' => 5,
                ]);

            }
        }

    }


    public function remove_item_detailse_invoice_edit_bill(Request $request)
    {


        $salse_auto_serial = $request->auto_serial; // like = 102452 salse serial
        $salse_id = $request->salse_id; // like = 50 salse id
        $salse_detailse_item_id = $request->pro_id; // like = 31 product item id

        $decrese_salse_total = salse::find($salse_id);
        $decrese_salse_detailse_total = salse_detailse::find($salse_detailse_item_id);

        $stock_data = stock_data::where(['cat_id' => $decrese_salse_detailse_total->category_id, 'pro_id' => $decrese_salse_detailse_total->product_id])->first();
        // return $salse_detailse_item_id;

        // نقص الكميات في المخزن
        $stock_data->update([
            "auto_serial" => $salse_id,
            "qty" => $stock_data->qty += $decrese_salse_detailse_total->qty,
            "total_cost_unit" => $stock_data->total_cost_unit -= $decrese_salse_detailse_total->subtotal,
        ]);

        //   حذف الصنف من تفاصيل الفاتورة
        $decrese_salse_detailse_total->delete();


        // انقاص المبلغ من الفاتورة الرئيسية
        $decrese_salse_total->update([
            'total' => $decrese_salse_total->total -= $decrese_salse_detailse_total->subtotal,
        ]);

        return json_encode('done');
    }

    public function reload_items_in_edit_bill(Request $request)
    {
        $get_salse_detailse = salse::where('serial', $request->auto_serial)->get('id');
        $salse_detailse2 = salse_detailse::where('salse_id', $get_salse_detailse[0]->id)->get();

        foreach ($salse_detailse2 as $value) {
            $value->cat_name = category::where('id', $value->category_id)->value('cat_name');
            $value->product_name = Product::where('id', $value->product_id)->value('product_name');
            $value->unit_name = Units::where('id', $value->unit_id)->value('unit_name');
        }

        // return $salse_detailse2;
        return view('Salse.load_salse_edit.reload_items_in_edit_bill', compact('salse_detailse2'));

    }

    public function update_salse_invoice_edit_bill(Request $request)
    {

        if ($request->ajax()) {

         // Added Button For Save Type With Print Or Without Print with value
        $pay_type = $request->pay_type_edit_invoice;
        $salse_id_number = $request->id_update;
        $salse_serial_number = $request->serial_edit_bill_h;
        $treasures_id = $request->treasures_id_edit;
        $what_paid = $request->what_paid_edit;
        $what_remain = $request->what_remain_edit;
        $discount_amount = $request->edit_discount;
        $total_after_desc = $request->total_edit_after_desc_h;
        $customer_number = $request->customer_id;

        // return $request->all();


        // الفاتورة كاش سوف يتم التأثير على أربعه جداول
        // ,العمليات المالية,
        // الخزينة++,
        //  تأثير على حساب العميل
        // ***********************  Teasures Transaction Table Effects *******************
        if ($pay_type == 1) {
            $transaction = Treasures::where('id', $treasures_id)->first();
            $trans_id = $transaction->last_isal_collect;
            // get last isal to increase number of isals
            if (($transaction->last_isal_collect) == 0) {
                $trans_id = $transaction->last_isal_collect = 1;
            } else {
                $trans_id = $transaction->last_isal_collect + 1;
            }

            // update isal and money
            $treasure_serial = $request->treasures_id_active;
            $update_trans = Treasures::where('id', $treasures_id)->update([
                'last_isal_collect' => $trans_id,
                'money' => $transaction->money += $total_after_desc
            ]);



            // ***********************  End Teasures Transaction Table Effects *******************


            // ***********************  Start Account Update Table Effects *******************
            if ($customer_number == 0) {
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 0,
                    'account_number' => 404,
                    'money' => $total_after_desc * (1),
                    'money_for_account' => $total_after_desc * (-1),
                    'move_type_id' => 5,
                    'note' => $request->note,
                    'date' => date('Y-m-d'),
                ]);
                $salse = salse::where('id', $salse_id_number)->update([
                    "is_approved" => 1,
                    "approved_by" => 1,
                    "total" => $total_after_desc,
                    "customer_id" => 404,
                    "bill_type" => 3,
                    "pay_type" => $pay_type,
                    "what_paid" => $what_paid,
                    "what_not_yet_paid" => $what_remain,
                    "discount_amount" => $discount_amount,
                    "note" => "فاتورة مبيعات",
                    "treasures_id" => $treasures_id,
                ]);
            } else {
                $acc = accounts::where('account_number',$customer_number)->first();
                $acc->update([
                    'current_balance' => $acc->current_balance +=$total_after_desc
                ]);

                //complete transaction on treasures transaction table 
                $treasures_transaction = Treasures_Transactions::create([
                    'isal_number' => $trans_id,
                    'shift_code' => 1,
                    'treasures_id' => $treasures_id,
                    'is_account' => 1,
                    'account_number' => $customer_number,
                    'money' => $total_after_desc * (1),
                    'money_for_account' => $total_after_desc * (-1),
                    'move_type_id' => 5,
                    'note' => $request->note,
                    'date' => date('Y-m-d'),
                ]);
                $salse = salse::where('id', $salse_id_number)->update([
                    "is_approved" => 1,
                    "approved_by" => 1,
                    "total" => $total_after_desc,
                    "customer_id" => $customer_number,
                    "bill_type" => 3,
                    "pay_type" => $pay_type,
                    "what_paid" => $what_paid,
                    "what_not_yet_paid" => $what_remain,
                    "discount_amount" => $discount_amount,
                    "note" => "فاتورة مبيعات",
                    "treasures_id" => $treasures_id,
                ]);
            }



            $salse = salse::select(
                'account_number',
                'serial',
                'approved_by',
                'customer_id',
                'bill_type',
                'pay_type',
                'what_paid',
                'what_not_yet_paid',
                'discount_amount',
                'total',
                'note',
                'date'
            )->where('id', $salse_id_number)->first();

            $salse_data = salse_detailse::select(
                'category_id',
                'product_id',
                'unit',
                'price',
                'qty',
                'subtotal',
            )->where('salse_id', $salse_id_number)->get();


            if ($customer_number == 404) {

                foreach ($salse_data as $key) {
                    $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->product_id)->value('product_name');
                }

            } else {
                // dd($salse);

                foreach ($salse_data as $key) {
                    $key->category_name = category::where('id', $key->category_id)->value('cat_name');
                    $key->product_name = Product::where('id', $key->product_id)->value('product_name');
                }
            }




            return view('Prints.Salse.Print_A6', compact('salse', 'salse_data'));
            // ***********************  Start Teasures Update Table Effects *******************
        }
        }
    }
    // order_print_edit_bill

    // remove_salse_invoice
    public function remove_salse_invoice(Request $request)
    {

        $salse_id = $request->id; // like = 50 salse id

        $salse_cell = salse::select('id', 'is_approved')->find($salse_id);

        $salse_cell->delete();
        $salse_detailse_cell = salse_detailse::where('salse_id', $salse_id)->delete();

        // salse_detailse::destroy('salse_id',$salse_id);


        // return $salse_detailse_cell;
        return json_encode('done');
        //End  remove_salse_invoice

    }
}