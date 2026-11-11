<?php

namespace App\Http\Controllers\Admin\Treasures;

use App\Http\Controllers\Controller;
use App\Models\accounts;
use App\Models\mony_type_move;
use App\Models\salse;
use App\Models\Supplier_with_order;
use App\Models\Treasures;
use App\Models\Treasures_Transactions;
use Illuminate\Http\Request;

class Treasures_Controller extends Controller
{

    public function index()
    {
        $treasures = Treasures::get();
        return view('Treasures.index', compact('treasures'));

    }

    public function Treasures_Balance()
    {
        $treasures = Treasures::get();
        $salse_total = salse::sum('total');
        $purshace_total = Supplier_with_order::sum('total_cost');
        $treasures_transactions = Treasures_Transactions::sum('money');
        foreach ($treasures as $value) {

            $treasures_id = $value->id;

            $value->Total = Treasures_Transactions::where('treasures_id', $treasures_id)->sum('money');

        }

        return view('Treasures_Balance.index', compact('treasures','salse_total','purshace_total','treasures_transactions'));
    }
    public function create()
    {
        $accounts = accounts::all();
        $mony_type_move = mony_type_move::where('move_type',2)->get();
        $Treasures = Treasures::all();
        $Treasures_trans = Treasures_Transactions::where('money', ">","0")->get();
        $total_amount_of_treasures = Treasures_Transactions::select('money')->sum('money');

        // get supplier name by using id in purshace bill
        foreach ($mony_type_move as $value) {

            $value->mony_type_move_id = mony_type_move::where('id', $value->mony_type_move_id)->value('mony_type_move_name');
            $value->Treasures = Treasures::where('id', $value->Treasures)->value('Treasures_name');
        }

        return view('Esal_Recive_Mony.index', compact('accounts', 'mony_type_move', 'Treasures', 'Treasures_trans', 'total_amount_of_treasures'));

    }

    public function store(Request $request)
    {
        Treasures::create([
            'treasures_serial' => $request->treasures_serial,
            'treasures_name' => $request->treasures_name,
            'is_master' => 0,
        ]);
        return redirect()->route('Treasures');
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {

        $Treasures_trans = Treasures_Transactions::select('id', 'isal_number', 'money', 'move_type_id', 'date')->where('treasures_id', 1)->get();
        $mony_type_move = mony_type_move::get();


        foreach ($Treasures_trans as $value) {

            $value->move_type_name = mony_type_move::where('id', $value->move_type_id)->value('mony_move_type');
        }


        return view('Treasures.edit', compact('Treasures_trans'));
    }


    public function update(Request $request)
    {
        $cust_id = Treasures::find($request->id);
        $cust_id->update($request->all());
        return redirect()->route('Treasures.index');
    }


    public function destroy()
    {
        abort(404);
    }
}