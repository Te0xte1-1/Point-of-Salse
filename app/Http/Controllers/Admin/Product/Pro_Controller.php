<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock_data;
use App\Models\Stocks;
use App\Models\Store_data;
use App\Models\Treasures;
use App\Models\Treasures_Transactions;

class Pro_Controller extends Controller
{
    public function index()
    {
       
        // $Category = category::all();
        $Products = Product::with('category')->get();

        foreach ($Products as $key) {
            $key->qty = Stock_data::where('id', $key->id)->value('qty');
            $key->stock = Stocks::where('id', $key->stock)->value('stock_name');
        }
        return view('Product.index', compact('Products'));
    }

    public function create()
    {

        $Stocks = Stocks::get();
        $category = category::all();
        return view('Product.create', compact('category', 'Stocks'));
    }
    public function store(Request $request)
    {
        $price = $request->Price;
        $stock = $request->stock;
        $last_price = ($price * $stock);

        $file_extinstion = $request->photo->getClientOriginalExtension();
        $fil_name = time() . rand(1, 10000) . "." . $file_extinstion;
        $path = 'images/products';
        $request->photo->move($path, $fil_name);


        $Pro = Product::create([
            "category_id" => $request->category_id,
            "product_name" => $request->product_name,
            "product_description" => $request->product_description,
            "unit_id" => 1,
            "purshace_price" => $request->purshace_Price,
            "price" => $request->Price,
            "risk" => $request->risk,
            "stock" => $request->stock_id,
            "photo" => $fil_name,
            "move_type" => 23,
            "bill_type" => 7,
            "note" => $request->note,
        ]);

        $cat_n = $Pro->category_id;
        $ser = $cat_n . "000" . $Pro->id;
        $Pro->update([
            "product_serial" => $ser,
        ]);

        $last_number = Store_data::select('batch_id')->count('batch_id');
        if (!empty($last_number)) {

            $last_number = Store_data::select('batch_id')->count('batch_id');
            if ($last_number > 0) {
                $last_number += 1;
            }

        } else {

            $last_number = 1;
        }
        $stock_data = Store_data::create([

            "batch_id" => $last_number,
            "store_id" => $Pro->stock,
            "cat_id" => $Pro->category_id,
            "pro_id" => $Pro->id,
            "unit_id" => $Pro->unit_id,
            "unit_cost_price" => $Pro->price,
            "qty" => $request->stock,
            "total_cost_unit" => $last_price,
            "risk" => $Pro->risk,
            "bill_type" => 7,
            "move_type" => 23,
        ]);

        Treasures_Transactions::create([
            "isal_number" => 1000,
            "shift_code" => 1,
            "treasures_id" => 1,
            "is_account" => 0,
            "account_type" => '1',
            "money" => $last_price,
            "move_type_id" => 23,
            "note" => $Pro->note,
            "date" => date('Y-m-d'),
            "added_by" => 1,
        ]);
        $tre = Treasures::find(1);
        $last_isal = Treasures::select('isal_for_first_insert')->sum('isal_for_first_insert');
        if (!empty($last_number)) {

            $last_number = Store_data::select('batch_id')->count('batch_id');
            if ($last_number > 0) {
                $last_number += 1;
            }

        } else {
            $last_number = 1;
        }
        
        $tre->update([
            'money' => $tre->money += $last_price,
            'isal_for_first_insert' => $last_number
        ]);

        return redirect()->back();


    }
    public function edit($id)
    {
        return view('Product.edit');
    }
    public function product_modal(Request $request)
    {

        $id = $request->id;
        $data = Product::get()->find($id);
        return view('product.Product_modal.Pro_edit', compact('data'));
    }

    public function customers_modal(Request $request)
    {

    }
    public function update(Request $request)
    {
        $pro_id = Product::find($request->id);
        $pro_id->update($request->all());
        return redirect()->route('Pro');
    }

}