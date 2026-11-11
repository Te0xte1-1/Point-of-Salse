@extends('layouts.app')
@section('title')
    Salse Page
@endsection
@section('content')
    <style>
        th,
        td {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

        h2,
        h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center !important;
        }
    </style>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header text-right">
                <h2>
                    صفحة فواتير المبيعات
                    <i class="fas fa-edit"></i>
                </h2>
                <i class="fa fa-tag"></i>
                <i class="fa fa-print"></i>
                <i class="fa fa-money_bill"></i>
                <i class="fa fa-landmark"></i>
                <a href="#" title="فاتورة جديده" class="btn btn-danger" style="float: right;margin-left:5px"
                    data-toggle="modal" data-target="#modal-lg">فاتورة جديده</a>

                <a href="#" title="فاتورة مبدئية" class="btn btn-success " style="float: right;" data-toggle="modal"
                    data-target="#modal-lg-not-real">فاتورة مبدئية</a>
                <br>
                <br>
                <hr>
                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="" placeholder="اكتب رقم الفاتورة "
                                class="form-control input-sm text-right" id="">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <button style="float:right" class="btn btn-info btn-sm mt-1"> <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-stripped table-hover">
                    <thead class="table table-primary">
                        <th>#</th>
                        <th>نوع الفاتــــــورة</th>
                        <th>رقم الفاتورة</th>
                        <th>تاريخ الفاتورة</th>
                        <th>نوع السداد</th>
                        <th>اسم صاحب الفاتورة</th>
                        <th>قيمة الفاتورة</th>
                        <th>المبلغ المسدد</th>
                        <th>المبلغ المتبقي</th>
                        <th width="15%">اكشن</th>
                    </thead>
                    <tbody>
                        @foreach ($Salse as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->bill_type }}</td>
                                <td>{{ $item->serial }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->pay_type }}</td>
                                <td>{{ $item->customer_id }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->what_paid }}</td>
                                <td>{{ $item->what_not_yet_paid }}</td>
                                <td>
                                    <a href="#"class="btn btn-danger btn-sm" title="حذف الفاتورة"> <i
                                            class="fa fa-trash"></i>
                                    </a>
                                    <a href="#"class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-edit" title="تعديل في الفاتورة" id="edit_invoice"
                                        data-invoice_id="{{ $item->id }}"> <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#"class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-show" title="تفاصيل الفاتورة"> <i class="fa fa-info"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <!-- /.card -->
        </div>


        <!-- Edit Invoice Modal -->
        <div class="modal fade" id="modal-lg-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-warning card-outline">
                                    <div class="card-header ">
                                        <b>
                                            <h5 class="text-center">تعديل فاتورة مبيعات</h5>
                                        </b>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            {{-- <form action="http://pos.local/Purshace/store" method="post"> --}}
                                            <input type="hidden" name="_token"
                                                value="x8wS8Ymxan8ZrT0QaMNNo1jOHEbHAJrHoatwGqtJ">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            <i class="far fa-calendar-alt"></i>
                                                            التـــاريخ
                                                        </h6>

                                                        <input type="date" name="date"
                                                            class="form-control form-control-sm" id="date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        بيانات العميل
                                                        <a href="#" class="" data-toggle="modal"
                                                            data-target="#modal-default" title="اضافة عميل">(+)</a>
                                                        <div class="modal fade" id="modal-default">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">نافذة لإضافة البيانات الجديدة</h6>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="اغلاق">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <select
                                                                                class="form-control select2
                                                                                name="customer" id="">
                                                                                <option value=""></option>
                                                                            </select>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">

                                                                                    <h6>اسم العميل</h6>

                                                                                    <input type="text"
                                                                                        name="customer_name" disabled
                                                                                        style="background:rgb(190, 202, 213)"
                                                                                        class="form-control form-control-sm"
                                                                                        id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">

                                                                                    <h6>رقم العميل</h6>

                                                                                    <input type="text"
                                                                                        name="customer_number"
                                                                                        class="form-control form-control-sm"
                                                                                        id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">

                                                                                    <h6>عنوان العميل</h6>

                                                                                    <input type="text"
                                                                                        name="cusotmer_address"
                                                                                        class="form-control form-control-sm"
                                                                                        id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success btn-sm"
                                                                            title="إضافة العميل للنظام">إضافة</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="customer" id="">
                                                            <option value=""></option>
                                                            @foreach ($Customers as $Customer)
                                                                <option value="{{ $Customer->id }}">
                                                                    {{ $Customer->customer_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                                        <input type="text" value="00011235542251" name="serial"
                                                            disabled
                                                            style="background:lightyellow;color:#fff;text-align:center"
                                                            class="form-control form-control-sm" id="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>نوع الفاتورة <i class="fa fa-barcode"></i></h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value=""></option>
                                                            <option value="1">فاتورة مبيعات</option>
                                                            <option value="0">فاتورة مبدئية</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr style="border:1px solid #ddff00">
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">

                                                        <h6>القسم</h6>

                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="cat" id="cat_id">
                                                            <option value=""></option>
                                                            @foreach ($Categorys as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">

                                                        <h6 style="text-align: center">الصنف</h6>

                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="pro" id="pro">
                                                            <option value=""></option>
                                                            @foreach ($Categorys as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>الوحدة</h6>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="unit" id="unit">
                                                            <option value=""></option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}">
                                                                    {{ $unit->unit_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>الكمية</h6>
                                                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="qty"
                                                            class="form-control form-control-sm" id="qty">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>المخزن</h6>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="stock" id="stock">
                                                            <option value=""></option>
                                                            @foreach ($Stocks as $stock)
                                                                <option value="{{ $stock->id }}">
                                                                    {{ $stock->stock_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>السعر</h6>
                                                        <input type="text" name="price"
                                                            class="form-control form-control-sm" id="price">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>الكمية المتاحه في المخزن</h6>
                                                        <input type="text" name="available_qty"
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow" id="available_qty">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input type="button"
                                                            class="btn btn-success btn-sm add_new_row mt-4"
                                                            value="إضافة الصنف للفاتورة" style="float: right;">
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- </form> --}}
                                        </div>

                                    </div>
                                    <h6 style="text-align: center">الأصناف المضافة للفاتورة</h6>
                                    <hr style="border:1px solid #ddff00">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-hover table-bordered table-stripped"
                                                aria-describedby="example2_info">
                                                <thead class="table table-bordered table-warning">
                                                    <tr>
                                                        <th width="2%">ID</th>
                                                        <th width="2%">المخزن</th>
                                                        <th width="13%">القسم</th>
                                                        <th width="13%">اسم الصنف</th>
                                                        <th width="13%">وحدة البيع</th>
                                                        <th width="7%">الكمية</th>
                                                        <th width="15%x">السعر</th>
                                                        <th width="15%x">الإجمالي</th>
                                                        <th width="5%">remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tboody">

                                                </tbody>

                                            </table>
                                            <hr style="border:1px solid #ddff00">
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            إجمالي الأصناف
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled min="0"
                                                            value="0"
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>
                                                            خزنة التحصيل
                                                        </h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value="0">الخزنة الرئيسية</option>
                                                            <option value="1">الخزنة الفرعيه</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            نسبة الضريبة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المراد خصمة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            طريقة الدفع
                                                        </h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value="0">بيع كاش</option>
                                                            <option value="1">بيع أجل</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            قيمة الضريبة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            قيمة الخصم
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المسدد
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            الإجمالي قبل الخصم
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            الإجمالي النهائي
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المتبقي تحصيلة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:lightyellow;color:#fff;text-align:center">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h6>
                                                            ملاحظات على الفاتورة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            style="background: lightyellow"
                                                            class="form-control form-control-sm"
                                                            value="لا توجد ملاحظـــــــــات على الفاتــــــورة">
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" class="from-group">
                                                <a href="#" id="toastsDefaultSuccess"
                                                    class="btn btn-warning btn-sm">طباعة الفاتورة <i
                                                        class="fa fa-print"></i></a>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> <!-- Edit Invoice Modal -->



        <!-- Show Invoice Modal -->
        <div class="modal fade" id="modal-lg-show">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header ">
                                        <b>
                                            <h5 class="text-center">عرض فاتورة مبيعات</h5>
                                        </b>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            {{-- <form action="http://pos.local/Purshace/store" method="post"> --}}
                                            <input type="hidden" name="_token"
                                                value="x8wS8Ymxan8ZrT0QaMNNo1jOHEbHAJrHoatwGqtJ">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            <i class="far fa-calendar-alt"></i>
                                                            التـــاريخ
                                                        </h6>

                                                        <input type="date" name="date"
                                                            class="form-control form-control-sm" id="date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        بيانات العميل
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="customer" id="">
                                                            <option value=""></option>
                                                            @foreach ($Customers as $Customer)
                                                                <option value="{{ $Customer->id }}">
                                                                    {{ $Customer->customer_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                                        <input type="text" value="00011235542251" name="serial"
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                            class="form-control form-control-sm" id="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>نوع الفاتورة <i class="fa fa-barcode"></i></h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value=""></option>
                                                            <option value="1">فاتورة مبيعات</option>
                                                            <option value="0">فاتورة مبدئية</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr style="border:1px solid #007bff">
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">

                                                        <h6>القسم</h6>

                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="cat" id="cat_id">
                                                            <option value=""></option>
                                                            @foreach ($Categorys as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">

                                                        <h6 style="text-align: center">الصنف</h6>

                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="pro" id="pro">
                                                            <option value=""></option>
                                                            @foreach ($Categorys as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>الوحدة</h6>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="unit" id="unit">
                                                            <option value=""></option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}">
                                                                    {{ $unit->unit_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>الكمية</h6>
                                                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="qty"
                                                            class="form-control form-control-sm" id="qty">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <h6>المخزن</h6>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                            aria-hidden="true" name="stock" id="stock">
                                                            <option value=""></option>
                                                            @foreach ($Stocks as $stock)
                                                                <option value="{{ $stock->id }}">
                                                                    {{ $stock->stock_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>السعر</h6>
                                                        <input type="text" name="price"
                                                            class="form-control form-control-sm" id="price">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>الكمية المتاحه في المخزن</h6>
                                                        <input type="text" name="available_qty"
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213)" id="available_qty">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input type="button"
                                                            class="btn btn-success btn-sm add_new_row mt-4"
                                                            value="إضافة الصنف للفاتورة" style="float: right;">
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- </form> --}}
                                        </div>

                                    </div>
                                    <h6 style="text-align: center">الأصناف المضافة للفاتورة</h6>
                                    <hr style="border:1px solid #007bff">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-hover table-bordered table-stripped"
                                                aria-describedby="example2_info">
                                                <thead class="table table-bordered table-primary">
                                                    <tr>
                                                        <th width="2%">ID</th>
                                                        <th width="2%">المخزن</th>
                                                        <th width="13%">القسم</th>
                                                        <th width="13%">اسم الصنف</th>
                                                        <th width="13%">وحدة البيع</th>
                                                        <th width="7%">الكمية</th>
                                                        <th width="15%">السعر</th>
                                                        <th width="15%">الإجمالي</th>
                                                        <th width="5%">remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tboody">

                                                </tbody>

                                            </table>
                                            <hr style="border:1px solid #007bff">
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            إجمالي الأصناف
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled min="0"
                                                            value="0"
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>
                                                            خزنة التحصيل
                                                        </h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value="0">الخزنة الرئيسية</option>
                                                            <option value="1">الخزنة الفرعيه</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            نسبة الضريبة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المراد خصمة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            طريقة الدفع
                                                        </h6>
                                                        <select name="" id=""
                                                            class="form-control form-control-sm">
                                                            <option value="0">بيع كاش</option>
                                                            <option value="1">بيع أجل</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            قيمة الضريبة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            قيمة الخصم
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المسدد
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <h6>
                                                            الإجمالي قبل الخصم
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            الإجمالي النهائي
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>
                                                            المبلغ المتبقي تحصيلة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            class="form-control form-control-sm" disabled
                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h6>
                                                            ملاحظات على الفاتورة
                                                        </h6>
                                                        <input type="text" name="" id=""
                                                            style="background: lightyellow"
                                                            class="form-control form-control-sm"
                                                            value="لا توجد ملاحظـــــــــات على الفاتــــــورة">
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" class="from-group">
                                                <a href="#" id="toastsDefaultSuccess"
                                                    class="btn btn-primary btn-sm">طباعة الفاتورة <i
                                                        class="fa fa-print"></i></a>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> <!-- Show Invoice Modal -->


        <!-- New Invoice Modal -->
        <div class="modal fade" id="add_rows_data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info card-outline">
                                    <!-- /.card-header -->
                                    <div class="card-header ">
                                        <b>
                                            <h4 class="text-center">تحديث الفاتــــــورة</h4>
                                        </b>
                                    </div>
                                    <div class="card-body" id="show_rows_data">


                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                        </div> <!-- card-footer -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> <!-- Edit Invoice Modal -->




        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header ">
                                        <b>
                                            <h5 class="text-center">فاتورة مبيعات</h5>
                                        </b>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <form id="add_item_to_invoice"
                                                action="{{ route('Salse.add_item_to_invoice') }}" method="post">
                                                <input type="hidden" name="invoice_number" id="invoice_number">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>
                                                                <i class="far fa-calendar-alt"></i>
                                                                التـــاريخ
                                                            </h6>

                                                            <input type="date" name="date"
                                                                class="form-control form-control-sm" id="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>
                                                                بيانات العميل
                                                                <i class="fa fa-barcode"></i>
                                                            </h6>
                                                            <select class="form-control select2 select2-hidden-accessible"
                                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                                aria-hidden="true" name="customer" id="customer">
                                                                <option value=""></option>
                                                                @foreach ($Customers as $Customer)
                                                                    <option value="{{ $Customer->id }}">
                                                                        {{ $Customer->customer_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <?php $i = rand(1,1000000); 
                                                            $t = 10001?>
                                                            <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                                            <input type="text" value="<?= $t.$i ?>" name="serial"
                                                                style="color:#000;text-align:center"
                                                                class="form-control form-control-sm" id="serial">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>نوع الفاتورة <i class="fa fa-barcode"></i></h6>
                                                            <select name="bill_type" id="bill_type"
                                                                class="form-control form-control-sm">
                                                                <option value=""></option>
                                                                <option value="1">فاتورة مبيعات</option>
                                                                <option value="0">فاتورة مبدئية</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="button"
                                                                class="btn btn-info btn-sm add_new_rows "
                                                                value="إضافة أصناف للفاتورة" style="margin-left:450px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div> <!-- New Invoice Modal -->
            </div>
        </div>


        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/Adminlte.min.js') }}"></script>

        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('body').on('click', '#edit_invoice', function(e) {
                    e.preventDefault();
                    var invoice_id = $(this).data('invoice_id');
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                        data: {
                            // '_token': {{ csrf_token() }},
                            'invoice_id': invoice_id
                        },
                        success: function(data) {
                            console.log(data);
                        },
                    });


                });

                $('body').on('change', '#cat_id_invoice', function(e) {

                    var cat_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                        dataType: "html",
                        data: {

                            _token: '{{ csrf_token() }}',
                            cat_id: cat_id
                        },
                        success: function(data) {
                            $('#pro_invoice').html(data);
                        },
                    });
                }); // Cat ID To Bring Pro Data

                $('body').on('change', '#pro_invoice', function(e) {
                    var pro_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_product_price') }}",
                        data_type: 'html',
                        data: {

                            _token: '{{ csrf_token() }}',
                            pro_id: pro_id
                        },
                        success: function(data) {
                            $('#price_invoice').val(data.price);
                            $('#price_invoice_hidden').val(data.price);
                        },
                    });
                }); // Pro ID To Bring Pro Data

                $('body').on('click', '.add_new_row', function(e) {
                    e.preventDefault();

                    var stock_name = $('#stock_invoice').children('option:selected').data('stock');
                    var cat_name = $('#cat_id_invoice').children("option:selected").data("cat");
                    var pro_name = $('#pro_invoice').children('option:selected').data('pro');
                    var unit_name = $('#unit_invoice').children('option:selected').data('unit');

                    var cat_id = $('#cat_id_invoice').val();
                    var pro = $('#pro_invoice').val();
                    var unit = $('#unit_invoice').val();
                    var qty = $('#qty_invoice').val();
                    var price = $('#price_invoice').val();
                    var price_hidden = $('#price_invoice_hidden').val();
                    var stock = $('#stock_invoice').val();
                    subtotal = (qty * price_hidden);
                    var add_item_to_invoice_form = $('#add_item_to_invoice').serialize();
                    var token_search = $('#token_search').val();
                    var $row =
                    `<tr>    
                                <td>1</td>
                                <td>
                                    <label>${stock_name}</label>
                                    <input type="hidden" name="gogal" value="" class="total-price"/>
                                    <input type="hidden" name="stock[]" value="${ stock }"/>
                                    <input type="hidden" name="cat[]" value="${ cat_id }"/>
                                    <input type="hidden" name="pro[]" class="form-control pro- ${pro }" value="${cat_id}"/>
                                    <input type="hidden" name="unit[]" id="product-price"value="${unit}"/>
                                    <input type="hidden" name="qty[]" id="product-price"value="${qty}"/>
                                    <input type="hidden" name="price[]" id="product-price"value="${price}"/>
                                    <input type="hidden" name="sub_total[]" id="subtotall_invoice" value="sub_total" />
                                </td>
                                <td>
                                    <label>${cat_name}</label>
                                </td>
                                <td>
                                    <label>${pro_name}</label>
                                </td>
                                <td>
                                    <label>${unit_name}</label>
                                    </td>
                                    <td>
                                        <label>${qty}</label>
                                </td>
                                <td>
                                    <label>${price}</label>
                                </td>
                                <td>
                                    <label name="" id="subtotall_invoice"/>${subtotal}</label>
                                    <input type="hidden" name="sub_total[]" id="subtotall_invoice_input" value="${subtotal}" />
                                
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove_row"data-id="${cat_id}">-</button>
                                </td>
                            </tr>`;

                    $('#tboody_invoice').append($row);
                    calc_total();

                }); // Added Row To Invoice

                $('body').on('click', '.disabled', function(e) {
                    e.preventDefault();
                }); //End disabled style="background:rgb(190, 202, 213)" Click

                $('body').on('click', '.remove_row', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $('#product-' + id).removeClass(
                            'btn-default disabled style="background:rgb(190, 202, 213)"')
                        .addClass('btn-info');
                    $(this).closest('tr').remove();
                    calc_total();

                }); // End Remove Row

                $('body').on('keyup change', '#الكمية', function() {
                    var الكمية = parseInt($(this).val());
                    var unitprice = $(this).data('price');
                    $(this).closest('tr').find('#subtotal').val(الكمية * unitprice);
                    $(this).closest('tr').find('#subtotall').html(الكمية * unitprice);
                    calc_total();
                }); //End Qty

                function calc_total() {
                    var price = 0;
                    count = 0;
                    $('#tboody_invoice #subtotall_invoice_input').each(function() {
                        price += parseInt($(this).val());
                        count += 1;
                    });

                    if (price > 0) {
                        $('#order-print').removeClass('btn-info disabled style="background:rgb(190, 202, 213)"')
                            .addClass(
                                'btn-info');
                    } else {
                        $('#order-print').addClass('btn-info disabled style="background:rgb(190, 202, 213)"');
                    }
                    var get_vat = price * 1/100;

                    $('#total-price').html(price+=get_vat);
                    $('#total-price').val(price+=get_vat);
                    $('.total-price').val(price+=get_vat);
                    $('#vat').html(get_vat);
                    $('#total_item_count').html(count);
                    $('#total_invoice').html(price-=get_vat);
                    $('#total_invoice').val(price);
                } // End Calc Total

        
                $('#done_load').click(function() {
                    alert();
                });

                $('.add_new_rows').click(function() {
                    var serial = $('#serial').val();
                    var date = $('#date').val();
                    var customer = $('#customer').val();
                    var bill_type = $('#bill_type').val();

                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_complete_invoice') }}",
                        dataType: 'html',
                        data: {
                            _token: '{{ csrf_token() }}',
                            serial: serial,
                            date: date,
                            cusotmer: customer,
                            bill_type: bill_type
                        },
                        success: function(data) {
                            // alert(data);
                            $('#modal-lg').html("");
                            $('#modal-lg').modal('hide');
                            $('#show_rows_data').html(data);
                            $('#add_rows_data').modal('show');


                        },
                    });

                });

                /////////////////////////////////////
                $('#order-print').click(function() {
                    alert();
                    // var row_data = $('#rows_data').serialize();
                    // alert(row_data);
                    // $(document).Toasts('create', {
                    //     class: 'bg-success',
                    //     title: 'Purshace Invoice',
                    //     subtitle: 'Subtitle',
                    //     body: 'Your Purshace Has Been Successfully Completed .'
                    // })
                });

                // toastr

                /////////////////////////////////////

            });
        </script>
    @endsection
