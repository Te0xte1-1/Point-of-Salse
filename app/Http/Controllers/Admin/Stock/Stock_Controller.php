<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Stock_data;
use App\Models\Stocks;
use Illuminate\Http\Request;

class Stock_Controller extends Controller
{
    public function index()
    {
        $Stocks = Stocks::select('id', 'stock_name')->orderBy('id', 'DESC')->get();
        foreach ($Stocks as $value) {

            $value->total_items_on_stock = Stock_data::select('store_id', 'qty')->where('store_id', $value->id)->sum('qty');
        }
        // return $Stocks;
        return view('stock.index', compact('Stocks'));
    }
    public function store(Request $request)
    {

        Stocks::create([
            'stock_name' => $request->stock_name,
            'stock_location' => $request->stock_desc
        ]);
        return redirect()->route('Stock');
    }
    public function show($stock_id)
    {

        $cats = category::get(['id', 'cat_name']);
        $data = Stock_data::select('cat_id', 'pro_id', 'batch_id', 'unit_cost_price', 'total_cost_unit', 'qty', 'risk', 'expiration_date')->where('store_id', $stock_id)->get();
        foreach ($data as $value) {

            $value->category_name = category::where('id', $value->cat_id)->value('cat_name');
            $value->product_name = Product::where('id', $value->pro_id)->value('product_name');
            // return $total_items_on_stock;
        }
        return view('stock.show_products', compact('data', 'cats'));
    }
    public function send_between_stocks()
    {

        $Stocks = Stocks::all();
        $items = Product::all();
        return view('Send_Between_Stocks.index', compact('Stocks', 'items'));
    }
    public function stock_modal(Request $request)
    {

        $id = $request->id;
        $data = Stocks::find($id);
        return view('Stock.stock_Modal.stock_edit', compact('data'));
    }


    public function edit($id)
    {
    }
    public function get_product_by_cat(Request $request)
    {
        $data = Stock_data::where('cat_id', $request->cat_id)->get();
        foreach ($data as $key) {
            $key->cat_name = category::where('id', $key->cat_id)->value('cat_name');
            $key->pro_name = Product::where('id', $key->pro_id)->value('product_name');
        }
        return view('stock.get_product_by_cat', compact('data'));

    }
    public function update(Request $request)
    {
        $cust_id = Stocks::find($request->id);
        $cust_id->update($request->all());
        return view('Stock.index');
    }

}