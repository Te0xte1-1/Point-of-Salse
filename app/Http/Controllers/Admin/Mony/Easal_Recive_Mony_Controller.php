<?php

namespace App\Http\Controllers\Admin\Mony;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\accounts_type;
use App\Models\mony_type_move;
use App\Models\Treasures;
use App\Models\Treasures_Transactions;
use Illuminate\Http\Request;

class Easal_Recive_Mony_Controller extends Controller
{
 
    public function index()
    {

        $accounts = accounts::all();
        $mony_type_move = mony_type_move::where('move_type',2)->get('mony_move_type');
        $Treasures = Treasures::all();
        $Treasures_trans = Treasures_Transactions::where('money', ">","0")->get();
        $total_amount_of_treasures = Treasures_Transactions::select('money')->sum('money');
        
        // get supplier name by using id in purshace bill
        foreach ($Treasures_trans as $value) {

            $value->mony_type_move_id = mony_type_move::where('id', $value->move_type_id)->value('mony_move_type');
            $value->Treasures = Treasures::where('id', $value->treasures_id)->value('Treasures_name');
        }

        return view('Esal_Recive_Mony.index', compact('accounts', 'mony_type_move', 'Treasures', 'Treasures_trans', 'total_amount_of_treasures'));
    }
    public function create()
    {
        abort(404);
    }

 
    public function store(Request $request)
    {
        $transaction = Treasures::select('last_isal_collect')->get()->first();
        $trans_id = $transaction->last_isal_collect;

        if (($transaction->last_isal_collect) == 0) {
            $trans_id = $transaction->last_isal_collect = 1;
        } else {
            $trans_id = $transaction->last_isal_collect + 1;
        }
        $treasure_serial = $request->treasures;
        $update_trans = Treasures::where('id', $treasure_serial)->update([
            'last_isal_collect' => $trans_id
        ]);

        $treasures_transaction = Treasures_Transactions::create([
            'isal_number' => $trans_id,
            'shift_code' => 1,
            'treasures_id' => $request->treasures,
            'is_account' => 1,
            'account_number' => $request->accounts,
            'money' => $request->amount,
            'money_for_account' => $request->amount * (-1),
            'move_type_id' => $request->money_move,
            'note' => $request->note,
            'date' => $request->date,
        ]);

        // dd($request->all());



        return redirect()->back();
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
}
