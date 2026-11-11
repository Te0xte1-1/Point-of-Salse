<?php

use App\Models\Product;

// ***********************  Teasures Table Effects *******************
// function effect_of_transaction_operation(){

//  Treasures Coulmnst=>

// ***********************  Teasures Table Effects *******************


//   $transaction = Treasures::select('last_isal_exchange')->get()->first();
//   $trans_id = $transaction->last_isal_exchange;

//   if (($transaction->last_isal_exchange) == 0) {
//       $trans_id = $transaction->last_isal_exchange = 1;
//   } else {
//       $trans_id = $transaction->last_isal_exchange + 1;
//   }
//   $treasure_serial = $request->treasures;
//   $update_trans = Treasures::where('id', $treasure_serial)->update([
//       'last_isal_exchange' => $trans_id
//   ]);

//   $treasures_transaction = Treasures_Transactions::create([
//       'isal_number' => $trans_id,
//       'shift_code' => 1,
//       'treasures_id' => $request->treasures,
//       'is_account' => 1,
//       'account_number' => $request->accounts,
//       'money' => $request->amount * (-1),
//       'money_for_account' => $request->amount * (1),
//       'move_type_id' => $request->money_move,
//       'note' => $request->note,
//       'date' => $request->date,
//   ]);

// ***********************  End Teasures Table Effects *******************

// Store Coulmnst=>

// ***********************  Store Data Table Effects *******************

// Check if the product exists just incress qty or added 


        // $check_pro = Product::select('id','store_id','batch_id','unit_cost_price','production_date','expiration_date')->where()->first();
        // if (isset($check_pro)) {
        //     $update_trans = Treasures::where('id', $treasure_serial)->update([
        //         'last_isal_exchange' => $trans_id
        //     ]);
        // }
        //  else {
        //     $Store_data = Store_data::create([
        //         'batch_id' => $trans_id,
        //         'store_id' => 1,
        //         'cat_id' => $request->treasures,
        //         '`pro_id' => 1,
        //         'unit_id' => $request->accounts,
        //         'unit_cost_price' => $request->amount * (-1),
        //         '`qty' => $request->amount * (1),
        //         'total_cost_unit' => $request->money_move,
        //         'production_date' => $request->note,
        //         'expiration_date' => $request->date,
        //     ]);
        // }



// ***********************  End Store Data Table Effects *******************
// Update Parent Bill Coulmnst=>
// ***********************  Store Data Table Effects *******************
// update parent bill




    //    $auto_serial = $request->auto_serial;
    //    $items_bill = Supplier_with_order_details::where('order_id', $auto_serial)->get();

    //    $update_parent = Supplier_with_order::where('auto_serial' ,$auto_serial)->first();
    //    $update_parent->update([

    //        "total_cost" => $request->total_after_all_hidden,
    //        "treasures_id" => $request->treasures_id,
    //        "order_pay_type" => $request->pay_type,
    //        "what_remain" => $request->remain_to_supplier_hidden * (-1),
    //        "what_paid" => $request->what_paid_now,
    //        "is_approved" => 1
    //    ]);

    // }
// ***********************  End Store Data Table Effects *******************







