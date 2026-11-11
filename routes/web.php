<?php

use App\Http\Controllers\Admin\Accounts\Accounts_Controller;
use App\Http\Controllers\Admin\Accounts\Account_Mony_Type_Controller;
use App\Http\Controllers\Admin\Accounts\Account_Mony_Type_Move_Controller;
use App\Http\Controllers\Admin\Accounts\Customers_Controller;
use App\Http\Controllers\Admin\Accounts\Suppliers_Controller;
use App\Http\Controllers\Admin\Admins\Admins_Controller;
use App\Http\Controllers\Admin\Admins\Admins_shifts;
use App\Http\Controllers\Admin\Admins\Admins_shifts_Controller;
use App\Http\Controllers\Admin\Category\Cat_Controller;
use App\Http\Controllers\Admin\Dashboard_Controller;
use App\Http\Controllers\Admin\Reports\Finance_customers_controller;
use App\Http\Controllers\Admin\Reports\Finance_suppliers_controller;
use App\Http\Controllers\Admin\Mony\accounts_type_Controller;
use App\Http\Controllers\Admin\Mony\Easal_Recive_Mony_Controller;
use App\Http\Controllers\Admin\Mony\Easal_Srf_Mony_Controller;
use App\Http\Controllers\Admin\Mony\Mony_Acconunt_Type_Controller;
use App\Http\Controllers\Admin\Mony\Mony_Move_Type_Controller;
use App\Http\Controllers\Admin\order\order_Controller;
use App\Http\Controllers\Admin\Product\Pro_Controller;
use App\Http\Controllers\Admin\Purshace\Purshace_Controller;
use App\Http\Controllers\Admin\Reports\Reports_Controller;
use App\Http\Controllers\Admin\Salse\Salse_Controller;
use App\Http\Controllers\Admin\settings\settings_Controller;
use App\Http\Controllers\Admin\Stock\Stock_Controller;
use App\Http\Controllers\Admin\Treasures\Treasures_Controller;
use App\Http\Controllers\Admin\Units\Units_Controller;
use App\Http\Controllers\Admin\Users\Users_Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\login_Controller;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [login_Controller::class, 'login'])->name('login');
Route::get('login', [login_Controller::class, 'login'])->name('login');
Route::post('login/store', [login_Controller::class, 'login_store'])->name('login_store');

// Route::group(['middleware' => 'auth:admin'], function () {

    // Dashboard
    Route::post('logout', [login_Controller::class, 'logout'])->name('logout');
    Route::get('/', [Dashboard_Controller::class, 'home'])->name('Quick_access');
    Route::post('Dashboard', [Dashboard_Controller::class, 'index'])->name('Dashboard');
    Route::get('statistic', [Dashboard_Controller::class, 'index'])->name('statistic');
    Route::get('Contact_us', [Dashboard_Controller::class, 'contact'])->name('Contact_us');
    Route::get('About_us', [Dashboard_Controller::class, 'about'])->name('About_us');


    // Users
    Route::get('Users', [Users_Controller::class, 'index'])->name('Users');
    Route::get('Users/edit/{id}', [Users_Controller::class, 'edit']);
    Route::post('Users/update/{id}', [Users_Controller::class, 'update']);
    Route::get('Users/delete', [Users_Controller::class, 'delete']);

    // Category
    Route::get('Cat', [Cat_Controller::class, 'index'])->name('Cat');
    Route::get('Cat/create', [Cat_Controller::class, 'create'])->name('Category.create');
    Route::post('Cat/store', [Cat_Controller::class, 'store'])->name('Category.store');
    Route::get('Cat/edit/{id}', [Cat_Controller::class, 'edit'])->name('Category.edit');
    Route::post('Cat/update/{id}', [Cat_Controller::class, 'update'])->name('Category.update');
    Route::get('Cat/delete', [Cat_Controller::class, 'delete'])->name('Category.delete');

    // Product
    Route::get('Pro', [Pro_Controller::class, 'index'])->name('Pro');
    Route::get('Pro/create', [Pro_Controller::class, 'create'])->name('Product.create');
    Route::post('Pro/store', [Pro_Controller::class, 'store'])->name('Product.store');
    Route::post('Pro/modal', [Pro_Controller::class, 'product_modal'])->name('Product.product_modal');
    Route::post('Pro/edit/{id}', [Pro_Controller::class, 'edit']);
    Route::post('Pro/update/{id}', [Pro_Controller::class, 'update'])->name('Product.update');
    Route::get('Pro/delete', [Pro_Controller::class, 'delete']);

    // Unit
    Route::get('Units', [Units_Controller::class, 'index'])->name('Units');
    Route::get('Units/create', [Units_Controller::class, 'create'])->name('Unit.create');
    Route::post('Units/store', [Units_Controller::class, 'store'])->name('Unit.store');
    Route::post('Units/edit/{id}', [Units_Controller::class, 'edit'])->name('Unit.edit');
    Route::post('Units/unit_modal', [Units_Controller::class, 'unit_modal'])->name('Unit.unit_modal');
    Route::post('Unit/update/{id}', [Units_Controller::class, 'update'])->name('Unit.update');
    Route::get('Unit/delete', [Units_Controller::class, 'delete']);

    // Stock
    Route::get('Stock', [Stock_Controller::class, 'index'])->name('Stock');
    Route::get('Stock/create', [Stock_Controller::class, 'create'])->name('Stock.create');
    Route::post('Stock/store', [Stock_Controller::class, 'store'])->name('Stock.store');
    Route::post('Stock/edit/{id}', [Stock_Controller::class, 'edit'])->name('Stock.edit');
    Route::post('Stock/stock_modal', [Stock_Controller::class, 'stock_modal'])->name('Stock.stock_modal');
    Route::post('Stock/update/{id}', [Stock_Controller::class, 'update'])->name('Stock.update');
    Route::post('Stock/get_product_by_cat', [Stock_Controller::class, 'get_product_by_cat'])->name('Stock.get_product_by_cat');
    Route::get('Stock/show/{stock_id}', [Stock_Controller::class, 'show'])->name('Stock.Show');
    Route::get('Send_Between_Stocks', [Stock_Controller::class, 'send_between_stocks'])->name('Send_Between_Stocks');




    // Suppliers
    Route::get('Suppliers', [Suppliers_Controller::class, 'index'])->name('Suppliers');
    Route::get('Suppliers/create', [Suppliers_Controller::class, 'create'])->name('Suppliers.create');
    Route::post('Suppliers/store', [Suppliers_Controller::class, 'store'])->name('Suppliers.store');
    Route::post('Suppliers/modal', [Suppliers_Controller::class, 'Supplier_modal'])->name('Supplier.Supplier_modal');
    Route::post('Suppliers/print', [Suppliers_Controller::class, 'print'])->name('Suppliers.print');
    Route::post('Suppliers/prod', [Suppliers_Controller::class, 'prod'])->name('Suppliers.prod');
    Route::get('Suppliers/edit/{id}', [Suppliers_Controller::class, 'edit']);
    Route::post('Suppliers/update/{id}', [Suppliers_Controller::class, 'update'])->name('Suppliers.update');
    Route::get('Suppliers/delete', [Suppliers_Controller::class, 'delete'])->name('Suppliers.delete');

    // Customers
    Route::get('/Customers', [Customers_Controller::class, 'index'])->name('Customers');
    Route::get('Customers/create', [Customers_Controller::class, 'create'])->name('Customers.create');
    Route::post('Customers/store', [Customers_Controller::class, 'store'])->name('Customers.store');
    Route::post('Customers/modal', [Customers_Controller::class, 'customers_modal'])->name('Customers.Customer_modal');
    Route::post('Customers/print', [Customers_Controller::class, 'print'])->name('Customers.print');
    Route::post('Customers/prod', [Customers_Controller::class, 'prod'])->name('Customers.prod');
    Route::get('Customers/edit/{id}', [Customers_Controller::class, 'edit']);
    Route::post('Customers/update/{id}', [Customers_Controller::class, 'update']);
    Route::get('Customers/delete', [Customers_Controller::class, 'delete']);

    // Accounts
    Route::get('Account_Mony_Type_Move', [Account_Mony_Type_Controller::class, 'index'])->name('Account_Mony_Type_Move');
    Route::get('Account_Mony_Type_Move/create', [Account_Mony_Type_Controller::class, 'create'])->name('Account_Mony_Type_Move.create');
    Route::get('Check_Customer_Account', [Customers_Controller::class, 'Check_Customer_Account'])->name('Check_Customer_Account');
    Route::get('Check_Suppliers_Account', [Suppliers_Controller::class, 'Check_Supplier_Account'])->name('Check_Supplier_Account');
    Route::get('Status_Account_Mony', [Suppliers_Controller::class, 'index'])->name('Status_Account_Mony');

    // Account Tree
    Route::get('Account_Tree', [Accounts_Controller::class, 'index'])->name('Account_Tree');
    Route::get('Accounts/create', [Accounts_Controller::class, 'create'])->name('Accounts.create');
    Route::post('Accounts/store', [Accounts_Controller::class, 'store'])->name('Accounts.store');
    Route::get('Accounts/show/{acc_id}', [Accounts_Controller::class, 'show'])->name('Accounts.show');

    // Mony Operations/ Recive Money
    Route::get('Esal_Recive_Mony', [Easal_Recive_Mony_Controller::class, 'index'])->name('Esal_Recive_Mony');
    Route::get('Esal_Recive_Mony/create', [Easal_Recive_Mony_Controller::class, 'create'])->name('Esal_Recive_Mony.create');
    Route::post('Esal_Recive_Mony/store', [Easal_Recive_Mony_Controller::class, 'store'])->name('Esal_Recive_Mony.store');
    Route::post('Esal_Recive_Mony/update/{id}', [Easal_Recive_Mony_Controller::class, 'update'])->name('Esal_Recive_Mony.update');

    // Mony Operations/ Recive Money
    Route::get('Esal_Srf_Mony', [Easal_Srf_Mony_Controller::class, 'index'])->name('Esal_Srf_Mony');
    Route::get('Esal_Srf_Mony/create', [Easal_Srf_Mony_Controller::class, 'create'])->name('Esal_Srf_Mony.create');
    Route::get('Esal_Srf_Mony/edit/{id}', [Easal_Srf_Mony_Controller::class, 'edit'])->name('Esal_Srf_Mony.edit');
    Route::get('Esal_Srf_Mony/show/{id}', [Easal_Srf_Mony_Controller::class, 'show'])->name('Esal_Srf_Mony.show');
    Route::post('Esal_Srf_Mony/store', [Easal_Srf_Mony_Controller::class, 'store'])->name('Esal_Srf_Mony.store');
    Route::post('Esal_Srf_Mony/update/{id}', [Easal_Srf_Mony_Controller::class, 'update'])->name('Esal_Srf_Mony.update');

    // Mony Account
    Route::get('accounts_type', [accounts_type_Controller::class, 'index'])->name('accounts_type');
    Route::get('accounts_type/edit/{id}', [accounts_type_Controller::class, 'edit'])->name('accounts_type.edit');
    Route::get('accounts_type/store', [accounts_type_Controller::class, 'store'])->name('accounts_type.store');
    Route::post('accounts_type/update/{id}', [accounts_type_Controller::class, 'update'])->name('accounts_type.update');
    Route::get('accounts_type/delete/{id}', [accounts_type_Controller::class, 'destroy'])->name('accounts_type.delete');



    // Route::get('Mony_Move_Of_Mony_Account', [Mony_Acconunt_Type_Controller::class, 'index'])->name('Mony_Move_Of_Mony_Account');


    //  Mony Move Type
    Route::get('Mony_Type_Move', [Mony_Move_Type_Controller::class, 'index'])->name('Mony_Type_Move');
    Route::get('Mony_Type_Move/edit/{id}', [Mony_Move_Type_Controller::class, 'edit'])->name('Mony_Type_Move.edit');
    Route::get('Mony_Type_Move/store', [Mony_Move_Type_Controller::class, 'store'])->name('Mony_Type_Move.store');
    Route::post('Mony_Type_Move/update/{id}', [Mony_Move_Type_Controller::class, 'update'])->name('Mony_Type_Move.update');
    Route::post('Mony_Type_Move/delete', [Mony_Move_Type_Controller::class, 'destroy'])->name('Mony_Type_Move.delete');

    // Treasures
    Route::get('Treasures', [Treasures_Controller::class, 'index'])->name('Treasures');
    Route::get('Treasures_Balance', [Treasures_Controller::class, 'Treasures_Balance'])->name('Treasures_Balance');
    Route::post('Treasures/create', [Treasures_Controller::class, 'create'])->name('Treasures.create');
    Route::post('Treasures/store', [Treasures_Controller::class, 'store'])->name('Treasures.store');
    Route::get('Treasures/edit/{id}', [Treasures_Controller::class, 'edit'])->name('Treasures.edit');
    Route::post('Treasures/update/{id}', [Treasures_Controller::class, 'update'])->name('Treasures.update');
    Route::get('Treasures/delete', [Treasures_Controller::class, 'delete']);

    // Salse
    Route::get('Salse_And_Alert_Ajl', [Salse_Controller::class, 'index'])->name('Salse_And_Alert_Ajl');
    Route::get('Salse', [Salse_Controller::class, 'index'])->name('Salse');
    Route::post('Salse/store', [Salse_Controller::class, 'store'])->name('Salse.store');
    Route::post('Salse/print', [Salse_Controller::class, 'print'])->name('Salse.print');
    Route::post('Salse/prod', [Salse_Controller::class, 'prod'])->name('Salse.prod');
    Route::get('Salse/edit/{id}', [Salse_Controller::class, 'edit']);
    Route::post('Salse/update/{id}', [Salse_Controller::class, 'update']);
    Route::get('Salse/delete', [Salse_Controller::class, 'delete']);

    // Salse_Invoice_Operations
    Route::post('Salse/add_item_to_invoice', [Salse_Controller::class, 'add_item_to_invoice'])->name('Salse.add_item_to_invoice');
    Route::get('Salse/edit/{id}', [Salse_Controller::class, 'edit'])->name('Salse.edit');
    Route::post('salse/get_item_add_row', [Salse_Controller::class, 'get_item_add_row'])->name('salse.get_item_add_row');
    Route::post('Salse/load_salse_table', [Salse_Controller::class, 'load_salse_table'])->name('Salse.load_salse.load_salse_table');
    Route::post('Salse/load_pro_by_cat_id_in_salse', [Salse_Controller::class, 'load_pro_by_cat'])->name('load_pro_by_cat_id_in_salse');
    Route::post('Salse/load_product_by_serial', [Salse_Controller::class, 'load_product_by_serial'])->name('load_product_by_serial');
    Route::post('Salse/load_product_price', [Salse_Controller::class, 'load_product_price'])->name('load_product_price');
    Route::post('Salse/load_product_qty_on_stock', [Salse_Controller::class, 'load_product_qty_on_stock'])->name('load_product_qty_on_stock');
    Route::post('Salse/reload_items_in_invoice', [Salse_Controller::class, 'reload_items_in_invoice'])->name('salse.reload_items_in_invoice');
    Route::post('Salse/reload_items_in_edit_bill', [Salse_Controller::class, 'reload_items_in_edit_bill'])->name('salse.reload_items_in_edit_bill');
    Route::post('Salse/remove_item_detailse_invoice', [Salse_Controller::class, 'remove_item_detailse_invoice'])->name('salse.remove_item_detailse_invoice');
    Route::post('Salse/remove_item_detailse_invoice_edit_bill', [Salse_Controller::class, 'remove_item_detailse_invoice_edit_bill'])->name('salse.remove_item_detailse_invoice_edit_bill');
    Route::post('Salse/remove_salse_invoice', [Salse_Controller::class, 'remove_salse_invoice'])->name('salse.remove_salse_invoice');
    Route::post('Salse/load_complete_invoice', [Salse_Controller::class, 'load_complete_invoice'])->name('load_complete_invoice');
    Route::post('Salse/update_salse_invoice_active', [Salse_Controller::class, 'update_salse_invoice_active'])->name('salse.update_salse_invoice_active');
    Route::post('Salse/update_salse_invoice_edit_bill', [Salse_Controller::class, 'update_salse_invoice_edit_bill'])->name('salse.update_salse_invoice_edit_bill');
    Route::post('Salse/All_invoice_data', [Salse_Controller::class, 'All_invoice_data'])->name('Salse.load_salse.All_invoice_data');
    Route::post('Salse/load_edit_bill', [Salse_Controller::class, 'load_edit_bill'])->name('Salse.load_salse.load_edit_bill');
    Route::post('Salse/order_print', [Salse_Controller::class, 'order_print'])->name('Salse.order_print');
    Route::get('Salse/done_print/{id}/A6/', [Salse_Controller::class, 'done_print6'])->name('Salse.done_print.a6');
    Route::get('Salse/done_print/{id}/A4/', [Salse_Controller::class, 'done_print4'])->name('Salse.done_print.a4');


    // Edit Bill Detailse Section (Remove Old Item Or Added OR Increase Or Decress) 
    Route::post('salse/get_item_add_row_edit_bill', [Salse_Controller::class, 'get_item_add_row_edit_bill'])->name('salse.get_item_add_row_edit_bill');







    // Salse_Back
    Route::get('Salse_Back', [Salse_Controller::class, 'index'])->name('Salse_Back');
    Route::post('Salse/store/back', [order_Controller::class, 'store'])->name('Salse_Back.store');
    Route::post('Salse/print', [Salse_Controller::class, 'print'])->name('Salse_Back.print');
    Route::post('Salse/prod', [Salse_Controller::class, 'prod'])->name('Salse_Back.prod');
    Route::get('Salse/edit/{id}', [Salse_Controller::class, 'edit']);
    Route::post('Salse/update/{id}', [Salse_Controller::class, 'update']);
    Route::get('Salse/delete', [Salse_Controller::class, 'delete']);

    // Purshace
    Route::get('Purshace', [Purshace_Controller::class, 'index'])->name('Purshace');
    Route::get('Purshace/show/{id}', [Purshace_Controller::class, 'show'])->name('Purshace.preview');
    Route::get('Purshace/create', [Purshace_Controller::class, 'create'])->name('Purshace.create');
    Route::post('Purshace/store', [Purshace_Controller::class, 'store'])->name('Purshace.store');
    Route::get('Purshace/edit/{id}', [Purshace_Controller::class, 'edit'])->name('Purshace.edit');
    // Route::get('Purshace/edit_detailse/{id}', [Purshace_Controller::class, 'edit'])->name('Purshace.edit_detailse');
    Route::get('Purshace/add_items/{id}', [Purshace_Controller::class, 'add_items'])->name('Purshace.add_items');
    Route::post('Purshace/add_items_store', [Purshace_Controller::class, 'add_items_store'])->name('Purshace.add_items_store');
    Route::post('Purshace/load_table_index', [Purshace_Controller::class, 'load_table_index'])->name('load_purshace.load_table_index');
    Route::post('Purshace/load_pro_by_cat_id_in_purshace', [Purshace_Controller::class, 'load_pro_by_cat'])->name('load_purshace.load_pro_by_cat_id_in_purshace');
    Route::post('Purshace/load_product_price', [Purshace_Controller::class, 'load_product_price'])->name('load_purshace.load_product_price');
    Route::post('Purshace/load_table_added', [Purshace_Controller::class, 'load_table_added'])->name('Purshace.load_purshace.items_added_done');
    Route::post('Purshace/parent_added_done', [Purshace_Controller::class, 'load_table_parent_added'])->name('Purshace.load_purshace.parent_added_done');
    Route::post('Purshace/get_treasures_data', [Purshace_Controller::class, 'get_treasures_data'])->name('Purshace.get_treasures_data');
    Route::post('Purshace/prepare_bill_to_complete', [Purshace_Controller::class, 'prepare_bill_to_complete'])->name('Purshace.prepare_bill_to_complete');
    Route::post('Purshace/edit_items_after_added_to_order', [Purshace_Controller::class, 'edit_items_after_added_to_order'])->name('Purshace.load_purshace.edit_items_after_added_to_order');
    Route::post('Purshace/updated_items_after_added_to_order', [Purshace_Controller::class, 'updated_items_after_added_to_order'])->name('Purshace.load_purshace.updated_items_after_added_to_order');
    Route::post('Purshace/approve_bill', [Purshace_Controller::class, 'approve'])->name('Purshace.approve');
    Route::post('Purshace/update/{id}', [Purshace_Controller::class, 'update']);
    Route::get('Purshace/delete', [Purshace_Controller::class, 'delete']);
    Route::post('Purshace/delete_item_from_bill', [Purshace_Controller::class, 'delete_item_from_bill'])->name('Purshace.load_purshace.delete_item_from_bill');

    // Purshace_Back
    Route::get('Purshace_Back', [Purshace_Controller::class, 'index'])->name('Purshace_Back');
    Route::post('Purshace_Back/store', [Purshace_Controller::class, 'store'])->name('Purshace_Back.store');
    Route::get('Purshace_Back/edit/{id}', [Purshace_Controller::class, 'edit']);
    Route::post('Purshace_Back/update/{id}', [Purshace_Controller::class, 'update']);
    Route::get('Purshace_Back/delete', [Purshace_Controller::class, 'delete']);


    // Reports
// Salse
    Route::get('Reports', [Reports_Controller::class, 'index'])->name('Reports');
    Route::get('Reports/salse', [Reports_Controller::class, 'salse'])->name('Report.Salse');
    Route::get('Reports/salse', [Reports_Controller::class, 'salse'])->name('Report_Salse');
    Route::get('Reports/salse_Back', [Reports_Controller::class, 'salse_Back'])->name('Report_Salse_Back');
    Route::get('Reports/salse/period', [Reports_Controller::class, 'salse_period']);

    // Purshace
    Route::get('Reports/purshace', [Reports_Controller::class, 'purshace'])->name('Report.Purshace');
    Route::get('Reports/purshace', [Reports_Controller::class, 'purshace'])->name('Report_Purshace');
    Route::get('Reports/purshace/period', [Reports_Controller::class, 'purshace_period']);
    Route::get('Reports/purshace_Back', [Reports_Controller::class, 'purshace_Back'])->name('Report_Purshace_Back');

    // Collections Of Reports
    Route::get('Reports/Report_All', [Reports_Controller::class, 'Report_All'])->name('Report_All');
    Route::post('Reports/purshace_month', [Reports_Controller::class, 'purshace_month'])->name('report.purshace_month');
    Route::post('Reports/salse_month', [Reports_Controller::class, 'salse_month'])->name('report.salse_month');
    Route::post('Reports/risk', [Reports_Controller::class, 'risk'])->name('report.risk');
    Route::post('Reports/shift', [Reports_Controller::class, 'shift'])->name('report.shift');





    // Settings
    Route::get('Settings', [settings_Controller::class, 'index'])->name('Settings');
    Route::get('Settings/edit', [settings_Controller::class, 'edit'])->name('Settings.edit');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Admins
    Route::get('Admins', [Admins_Controller::class, 'index'])->name('Admins');
    Route::post('Admins/create', [Admins_Controller::class, 'create'])->name('Admins.create');
    Route::post('Admins/store', [Admins_Controller::class, 'store'])->name('Admins.store');
    Route::get('Admins/edit/{id}', [Admins_Controller::class, 'edit'])->name('Admins.edit');
    Route::post('Admins/update/{id}', [Admins_Controller::class, 'update'])->name('Admins.update');
    Route::get('Admins/delete', [Admins_Controller::class, 'delete']);


    // Admins Shifts
    Route::get('Admins_Shifts', [Admins_shifts_Controller::class, 'index'])->name('Admin_Shifts');
    Route::get('Admins_Shifts/create', [Admins_shifts_Controller::class, 'create'])->name('Admins_Shifts.create');
    Route::post('Admins_Shifts/store', [Admins_shifts_Controller::class, 'store'])->name('Admins_Shifts.store');
    Route::get('Admins_Shifts/edit/{id}', [Admins_shifts_Controller::class, 'edit'])->name('Admins_Shifts.edit');
    Route::post('Admins_Shifts/update/{id}', [Admins_shifts_Controller::class, 'update'])->name('Admins_Shifts.update');
    Route::post('Admins_Shifts/close_shift', [Admins_shifts_Controller::class, 'close'])->name('Admins_Shifts.close_shift');
    Route::get('Admins_Shifts/delete', [Admins_shifts_Controller::class, 'delete']);


    Route::get('Support', [Admins_shifts_Controller::class, 'Support'])->name('Support');
    Route::post('Support/get_item_add_row', [Admins_shifts_Controller::class, 'get_item_add_row'])->name('suppoet.get_item_add_row');
    Route::post('Support/load_product_qty_on_stock', [Admins_shifts_Controller::class, 'load_product_qty_on_stock'])->name('support.load_product_qty_on_stock');
    Route::post('support/store', [Admins_shifts_Controller::class, 'support_store'])->name('support/store');





    // كشف حساب عميل
    Route::get('Finance_customers_mirror/index', [Finance_customers_controller::class, 'index'])->name('Finance_customers_mirror.index');
    Route::post('Finance_customers_mirror/mirror', [Finance_customers_controller::class, 'mirror'])->name('Finance_customers_mirror.mirror');
    Route::post('Finance_customers_mirror/get_customer_data', [Finance_customers_controller::class, 'get_customer_data'])->name('Customer.get_customer_data');
    // Route::post('Finance_customers_mirror/store', [Mirrors_Controller::class, 'Finance_customers_mirror'])->name('Finance_customers_mirror.store');
// كشف حساب


    // كشف حساب مورد
    Route::get('Finance_suppliers_mirror/index', [Finance_suppliers_controller::class, 'index'])->name('Finance_suppliers_mirror.index');
    Route::post('Finance_suppliers_mirror/mirror', [Finance_suppliers_controller::class, 'mirror'])->name('Finance_suppliers_mirror.mirror');
    Route::post('Finance_customers_mirror/get_supplier_data', [Finance_suppliers_controller::class, 'get_supplier_data'])->name('Supplier.get_supplier_data');
    // Route::post('Finance_suppliers_mirror/store', [Mirrors_Controller::class, 'Finance_suppliers_mirror'])->name('Finance_suppliers_mirror.store');
// كشف حساب مورد

// });