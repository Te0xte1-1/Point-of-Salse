<?php

namespace App\Http\Helper;

use app\Http\Controllers\Admin\Treasures\Treasures_Controller;
use App\Models\Treasures;

class get_last_isal
{

    // public function get()
    // {
    //     $request = {
    //         'treasures':'treasures',
    //     };
    //     $transaction = Treasures::select('last_isal_exchange')->get()->first();
    //     $trans_id = $transaction->last_isal_exchange;

    //     if (($transaction->last_isal_exchange) == 0) {
    //         $trans_id = $transaction->last_isal_exchange = 1;
    //     } else {
    //         $trans_id = $transaction->last_isal_exchange + 1;
    //     }
    //     $treasure_serial = $request->treasures;
    //     $update_trans = Treasures::where('id', $treasure_serial)->update([
    //         'last_isal_exchange' => $trans_id
    //     ]);
    // }
}
