<?php

namespace App\Http\Controllers\Admin\Mony;

use App\Http\Controllers\Controller;
use App\Models\accounts;

use App\Models\accounts_type;
use App\Models\mony_type_move;
use App\Models\Treasures;
use App\Models\Treasures_Transactions;
use Illuminate\Http\Request;

class Easal_Srf_Mony_Controller extends Controller
{
 
    public function index()
    {

        $Treasures_trans = Treasures_Transactions::where('money', "<", "0")->orderby('id','Desc')->get();
        $total_amount_of_treasures = Treasures_Transactions::select('money')->sum('money');
        $accounts = accounts::select('id','name','account_number','account_type')->get();
        foreach($accounts as $account){

        $account->account_type_name =  accounts_type::where('id', $account->account_type)->value('account_name');
        }
        // return $accounts;
        $mony_type_move = mony_type_move::where('status',1)->get();
        $Treasures = Treasures::all();


        return view('Esal_Srf_Mony.index', compact('accounts', 'mony_type_move', 'Treasures', 'Treasures_trans', 'total_amount_of_treasures'));
    }
    public function create()
    {
        abort(404);
    }

 
    public function store(Request $request)
    {
        $transaction = Treasures::select('last_isal_exchange')->get()->first();
        $trans_id = $transaction->last_isal_exchange;

        if (($transaction->last_isal_exchange) == 0) {
            $trans_id = $transaction->last_isal_exchange = 1;
        } else {
            $trans_id = $transaction->last_isal_exchange + 1;
        }
        $treasure_serial = $request->treasures;
        $update_trans = Treasures::where('id', $treasure_serial)->update([
            'last_isal_exchange' => $trans_id
        ]);

        $treasures_transaction = Treasures_Transactions::create([
            'isal_number' => $trans_id,
            'shift_code' => 1,
            'treasures_id' => $request->treasures,
            'is_account' => 1,
            'account_number' => $request->accounts,
            'money' => $request->amount * (-1),
            'money_for_account' => $request->amount * (1),
            'move_type_id' => $request->money_move,
            'date' => $request->date,
            'note' => $request->note
        ]);
    }

  
    public function show(Request $request)
    {
        $id = $request->id;
        $data =  Treasures_Transactions::get()->find($id);
        return view('Esal_Srf_Mony.show', compact('data'));

    }


    public function edit(Request $request)
    {
        dd($request->id);
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
