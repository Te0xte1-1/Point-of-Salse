<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Models\Admins;
use App\Models\Stocks;
use App\Models\category;
use App\Models\customers;
use App\Models\Treasures;
use App\Models\Stock_data;
use Illuminate\Http\Request;
use App\Models\Admins_shifts;
use App\Http\Controllers\Controller;
use App\Models\salse;
use App\Models\salse_detailse;

class Admins_shifts_Controller extends Controller
{
    public function index()
    {
        $treasures = Treasures::all();
        $admins_shift = Admins_shifts::all();
        $shift_data = Admins_shifts::where('admin_id', 1)->first();
        return view('Admins_Shifts.index', compact('admins_shift', 'treasures', 'shift_data'));
    }

    public function create()
    {

        $treasures = Treasures::all();
        return view('Admins_Shifts.create', compact('treasures'));
    }


    public function store(Request $request)
    {
        Admins_shifts::create([
            'treasures_id' => $request->treasures_id,
            'admin_id' => 1
        ]);
        return redirect()->route('Admin_Shifts');
    }
    public function close()
    {

        $admin_shifts_update = Admins_shifts::where('admin_id', 1);
        $admin_shifts_update->update([
            'is_finished' => 1
        ]);
        return redirect()->route('Admin_Shifts');
    }
    public function Support()
    {

        $customers = Customers::all();
        $categorys = category::all();
        $stocks = Stocks::all();
        return view('Admins_Shifts.support', compact('customers', 'categorys', 'stocks'));
    }

    public function get_item_add_row(Request $request)
    {
        $store_id = $request->stock_id;
        $salse_id = $request->auto_serial;
        $product_id = $request->item;
        $auto_serial_related_by_pro = $request->item;
        // $old_stock_data = stock_data::where(['store_id' => $store_id, 'pro_id' => $product_id, 'auto_serial' => $auto_serial_related_by_pro])->get(['qty', 'total_cost_unit']);
        $stock_data = stock_data::where('pro_id', $request->item)->first();

        // return $stock_data;
        // نقص الكميات في المخزن
        $stock_data->update([
            "auto_serial" => $request->item,
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
            // ادخال البيانات الرئيسية في الفاتورة
        $salse = salse::create([
            'account_number' => $request->account_number,
            'serial' => $salse_id,
            'is_approved' => 1,

            'total' => $request->gogal,
            'customer_id' => $request->customer_id,
            'bill_type' => 1,
            'pay_type' => $request->pay_type,
            'what_paid' => $request->what_paid,
            'what_not_yet_paid' => $request->what_not_yet_paid,
            'treasures_id' => $request->treasures_id,
            'total_item_count' => $request->total_item_count,
            'date' => date('Y-m-d'),
            'note' => $request->note,
        ]);
        // // ادخال تفاصيل الفاتورة
        $salse_detailse = salse_detailse::create([
            'salse_id' => $salse->id,
            'category_id' => $request->cat,
            'product_id' => $request->item,
            'unit' => $request->unit,
            'price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal_h,
            'move_type' => 5,
        ]);


        $get_salse_detailse = salse_detailse::where('salse_id', $salse_detailse->salse_id)->get();
return $get_salse_detailse;
        //  $auto_serial = $request->auto_serial;
        //  $recive_data = salse_detailse::where(['salse_id' => $auto_serial])
        //  return view('Admins_Shifts.data.get_item_add_row', ['recive_data' => $recive_data]);
        //  dd($stock_data);
        // return $get_salse_detailse ;
        // dd($request->item);


        // ***********************  Teasures Table Effects *******************
        //  $treasures_id = $request->treasures_id;
        //  $transaction = Treasures::where('id', $treasures_id)->first();
        //  $trans_id = $transaction->last_isal_collect;
        //  if (($transaction->last_isal_collect) == 0) {
        //      $trans_id = $transaction->last_isal_collect = 1;
        //  } else {
        //      $trans_id = $transaction->last_isal_collect + 1;
        //  }
        //  $treasure_serial = $request->treasures;
        //  $update_trans = Treasures::where('id', $treasures_id)->update([
        //      'last_isal_collect' => $trans_id
        //  ]);
        //  $treasures_transaction = Treasures_Transactions::create([
        //      'isal_number' => $trans_id,
        //      'shift_code' => 1,
        //      'treasures_id' => $treasures_id,
        //      'is_account' => 1,
        //      'account_number' => $request->accounts,
        //      'money' => $request->gogal * (-1),
        //      'money_for_account' => $request->gogal * (1),
        //      'move_type_id' => $request->money_move,
        //      'note' => $request->note,
        //      'date' => $request->date,
        //  ]);
//  Table Treasures effects


        // $auto_serial = $request->auto_serial;
        // $items_bill = Supplier_with_order_details::where('order_id', $auto_serial)->get();
        // $update_parent = Supplier_with_order::where('auto_serial', $auto_serial)->first();
        // $update_parent->update([
        //     "total_cost" => $request->total_after_all_hidden,
        //     "treasures_id" => $request->treasures_id,
        //     "order_pay_type" => $request->pay_type,
        //     "what_remain" => $request->remain_to_supplier_hidden * (-1),
        //     "what_paid" => $request->what_paid_now,
        //     "is_approved" => 1
        // ]);

    }

    public function load_product_qty_on_stock(Request $request)
    {

        if ($request->ajax()) {

            // return $request->all();
            $cat_id = $request->cat_id;
            $pro_id = $request->pro_id;
            $stock_id = $request->stock;
            $data = Stock_data::select('qty')->where(['cat_id' => $cat_id, 'pro_id' => $pro_id, 'store_id' => $stock_id])->first();
            if (!$data) {
                return false;
            } else {
                return $data;
            }
        }
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
    public function support_store(Request $request)
    {
        return view('Prints.Salse.Support_Print_A4');
    }
}