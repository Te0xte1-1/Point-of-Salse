<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Supplier_with_order;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Stock_data;

class Reports_Controller extends Controller
{
    public function index()
    {
        return view('Report.index');
    }
    public function Report_All()
    {

        $data_cat = Category::all();
        $data_item = Product::all();
        return view('Report.Report_All', compact('data_cat', 'data_item'));

    }
    public function cash()
    {
        return view('Report.cash');
    }
    public function salse()
    {
        return view('Report.salse');
    }
    public function purshace()
    {
        return view('Report.purshace');
    }
    public function purshace_month(Request $request)
    {
        $purshace_month_from = $request->purshace_month_from;
        $purshace_month_to = $request->purshace_month_to;

        $data = Supplier_with_order::where()->like($purshace_month_from, $purshace_month_to)->get();
        return view('report.All.Report_All_Purshace_Print_A4', compact('data'));
    }
    public function salse_month(Request $request)
    {
        $salse_month_from = $request->salse_month_from;
        $salse_month_to = $request->salse_month_to;

        $data = supplier_with_order::where()->like($salse_month_from, $salse_month_to)->get();
        return view('report.All.Report_All_Salse_Print_A4', compact('data'));
    }
    public function risk(Request $request)
    {
        $risk_cat = $request->risk_cat;
        $risk_item = $request->risk_item;

        $data = Stock_data::where('qty','<=', $risk_item)->get();

        return view('report.All.Report_All_Risk_Print_A4', compact('data'));
    }
    public function shift(Request $request)
    {
        // $outbut = "test";
        // header("Content-Type:application/pdf");
        // header("Content-Disposition:attachment;filename=download.pdf");
        // echo $outbut;
        $shift_number = $request->shift_date;

        $data = supplier_with_order::where('shift_number', $shift_number)->get();
        return view('report.All.Report_All_Shift_Print_A4', compact('data'));
    }
}