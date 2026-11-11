@extends('layouts.app')
@section('title')
Purshace Page
@endsection
@section('content')
<style>
    th,
    td {
        text-align: center;
    }

    .container {
        padding: 10px;
    }

    .row {
        padding-left: 10px;
        padding-right: 10px;
    }

    h2 {
        text-align: center !important;
    }
</style>

<div class="container-fluid">

    <div class="card card-primary card-outline">
        <div class="card-header text-right">
            <h2>
                صفحة مراجعة فواتير المشتريات
                <i class="fas fa-edit"></i>
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header text-right">
                            <h5 class="text-center">
                                الطلبات
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="search" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="col-sm-3">
                                    <button style="float: right" class="btn btn-info">بحث</button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-stripped table-hover">
                                    <thead class="table table-success">
                                        <th>#</th>
                                        <th>رقم الفاتورة</th>
                                        <th>تاريخ الفاتورة</th>
                                        <th>قيمة الفاتورة</th>
                                        <th>اسم صاحب الفاتورة</th>
                                        <th>اعتماد الفاتـــورة</th>
                                        <th>اكشن</th>
                                    </thead>
                                    <tbody>
                                        <td>1</td>
                                        <td>12542</td>
                                        <td>2022-01-22</td>
                                        <td>17,000</td>
                                        <td>مصنع المدينة للإمدادات الطبية</td>
                                        <td> <a href="#" title="اعتماد الفاتورة" class="btn btn-primary btn-sm">
                                                إعتمـاد الفاتـــورة
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" title="عرض الفاتورة" class="btn btn-info btn-sm"> <i
                                                    class="fa fa-info"></i> </a>
                                            <a href="#" title="تعديل الفاتورة" class="btn btn-warning btn-sm"
                                                data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" title="حذف الفاتورة" class="btn btn-danger btn-sm"> <i
                                                    class="fa fa-trash"></i> </a>
                                        </td>
                                    </tbody>
                                </table>
                            </div>

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
                                                            <div id="example2_wrapper"
                                                                class="dataTables_wrapper dt-bootstrap4">
                                                                {{-- <form action="http://pos.local/Purshace/store"
                                                                    method="post"> --}}
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
                                                                                    class="form-control form-control-sm"
                                                                                    id="date">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                                بيانات العميل
                                                                                <a href="#" class="" data-toggle="modal"
                                                                                    data-target="#modal-default"
                                                                                    title="اضافة عميل">(+)</a>
                                                                                <div class="modal fade"
                                                                                    id="modal-default">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">
                                                                                                    Default
                                                                                                    Modal</h4>
                                                                                                <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="اغلاق">
                                                                                                    <span
                                                                                                        aria-hidden="true">×</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row">
                                                                                                    <select
                                                                                                        class="form-control select2 select2-hidden-accessible"
                                                                                                        style="width: 100%;"
                                                                                                        data-select2-id="1"
                                                                                                        tabindex="-1"
                                                                                                        aria-hidden="true"
                                                                                                        name="customer"
                                                                                                        id="">
                                                                                                        <option
                                                                                                            value="">
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <div
                                                                                                        class="col-sm-4">
                                                                                                        <div
                                                                                                            class="form-group">

                                                                                                            <h6>اسم
                                                                                                                العميل
                                                                                                            </h6>

                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="customer_name"
                                                                                                                disabled
                                                                                                                style="background:rgb(190, 202, 213)"=""
                                                                                                                class="form-control form-control-sm"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-4">
                                                                                                        <div
                                                                                                            class="form-group">

                                                                                                            <h6>رقم
                                                                                                                العميل
                                                                                                            </h6>

                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="customer_number"
                                                                                                                class="form-control form-control-sm"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-4">
                                                                                                        <div
                                                                                                            class="form-group">

                                                                                                            <h6>عنوان
                                                                                                                العميل
                                                                                                            </h6>

                                                                                                            <input
                                                                                                                type="text"
                                                                                                                name="cusotmer_address"
                                                                                                                class="form-control form-control-sm"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button
                                                                                                    class="btn btn-success btn-sm"
                                                                                                    title="إضافة العميل للنظام">إضافة</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <select
                                                                                    class="form-control select2 select2-hidden-accessible"
                                                                                    style="width: 100%;"
                                                                                    data-select2-id="1" tabindex="-1"
                                                                                    aria-hidden="true" name="customer"
                                                                                    id="">
                                                                                    <option value=""></option>
                                                                                    {{-- @foreach ($Customers as
                                                                                    $Customer)
                                                                                    <option value="{{ $Customer->id }}">
                                                                                        {{ $Customer->customer_name }}
                                                                                    </option>
                                                                                    @endforeach --}}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                                <h6>رقم الفاتورة <i
                                                                                        class="fa fa-barcode"></i></h6>
                                                                                <input type="text"
                                                                                    value="00011235542251" name="serial"
                                                                                    disabled
                                                                                    style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                                                    class="form-control form-control-sm"
                                                                                    id="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                                <h6>نوع الفاتورة <i
                                                                                        class="fa fa-barcode"></i></h6>
                                                                                <select name="" id=""
                                                                                    class="form-control form-control-sm">
                                                                                    <option value=""></option>
                                                                                    <option value="1">فاتورة مبيعات
                                                                                    </option>
                                                                                    <option value="0">فاتورة مبدئية
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <hr style="border:1px solid #007bff">
                                                                    <div class="row">

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">

                                                                                <h6>القسم</h6>

                                                                                <select
                                                                                    class="form-control select2 select2-hidden-accessible"
                                                                                    style="width: 100%;"
                                                                                    data-select2-id="1" tabindex="-1"
                                                                                    aria-hidden="true" name="cat"
                                                                                    id="cat_id">
                                                                                    <option value=""></option>
                                                                                    {{-- @foreach ($Categorys as
                                                                                    $category)
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ $category->cat_name }}
                                                                                    </option>
                                                                                    @endforeach --}}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">

                                                                                <h6 style="text-align: center">الصنف
                                                                                </h6>

                                                                                {{-- <select
                                                                                    class="form-control select2 select2-hidden-accessible"
                                                                                    style="width: 100%;"
                                                                                    data-select2-id="1" tabindex="-1"
                                                                                    aria-hidden="true" name="pro"
                                                                                    id="pro">
                                                                                    <option value=""></option>
                                                                                    @foreach ($Categorys as $category)
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ $category->cat_name }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select> --}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                                <h6>الوحدة</h6>
                                                                                <select
                                                                                    class="form-control select2 select2-hidden-accessible"
                                                                                    style="width: 100%;"
                                                                                    data-select2-id="1" tabindex="-1"
                                                                                    aria-hidden="true" name="unit"
                                                                                    id="unit">
                                                                                    <option value=""></option>
                                                                                    {{-- @foreach ($units as $unit)
                                                                                    <option value="{{ $unit->id }}">
                                                                                        {{ $unit->unit_name }}</option>
                                                                                    @endforeach --}}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                                <h6>الكمية</h6>
                                                                                <input type="number"
                                                                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                                                    name="qty"
                                                                                    class="form-control form-control-sm"
                                                                                    id="qty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <div class="form-group">
                                                                                <h6>المخزن</h6>
                                                                                <select
                                                                                    class="form-control select2 select2-hidden-accessible"
                                                                                    style="width: 100%;"
                                                                                    data-select2-id="1" tabindex="-1"
                                                                                    aria-hidden="true" name="stock"
                                                                                    id="stock">
                                                                                    <option value=""></option>
                                                                                    {{-- @foreach ($Stocks as $stock)
                                                                                    <option value="{{ $stock->id }}">
                                                                                        {{ $stock->stock_name }}
                                                                                    </option>
                                                                                    @endforeach --}}
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                                <h6>السعر</h6>
                                                                                <input type="text" name="price"
                                                                                    class="form-control form-control-sm"
                                                                                    id="price">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-group">
                                                                                <h6>الكمية المتاحه في المخزن</h6>
                                                                                <input type="text" name="available_qty"
                                                                                    class="form-control form-control-sm"
                                                                                    disabled
                                                                                    style="background:rgb(190, 202, 213)"
                                                                                    id="available_qty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <input type="button"
                                                                                    class="btn btn-success btn-sm add_new_row mt-4"
                                                                                    value="إضافة الصنف للفاتورة"
                                                                                    style="float: right;">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    {{--
                                                                </form> --}}
                                                            </div>

                                                        </div>
                                                        <h6 style="text-align: center">الأصناف المضافة للفاتورة</h6>
                                                        <hr style="border:1px solid #007bff">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table id="example2"
                                                                    class="table table-hover table-bordered table-stripped"
                                                                    aria-describedby="example2_info">
                                                                    <thead class="table table-bordered table-primary">
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
                                                                <hr style="border:1px solid #007bff">
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                إجمالي الأصناف
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled min="0" value="0"
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <h6>
                                                                                خزنة التحصيل
                                                                            </h6>
                                                                            <select name="" id=""
                                                                                class="form-control form-control-sm">
                                                                                <option value="0">الخزنة الرئيسية
                                                                                </option>
                                                                                <option value="1">الخزنة الفرعيه
                                                                                </option>
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
                                                                                class="form-control form-control-sm"
                                                                                disabled
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                قيمة الخصم
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                المبلغ المسدد
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                الإجمالي قبل الخصم
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                الإجمالي النهائي
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled
                                                                                style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h6>
                                                                                المبلغ المتبقي تحصيلة
                                                                            </h6>
                                                                            <input type="text" name="" id=""
                                                                                class="form-control form-control-sm"
                                                                                disabled
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
                                                                        class="btn btn-primary btn-sm">طباعة الفاتورة
                                                                        <i class="fa fa-print"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-info card-outline">
                        <div class="card-header text-right">
                            <h5 class="text-center">
                                عرض المنتجات في الطلب
                            </h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>الصنف</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Toshipa</td>
                                        <td>1</td>
                                        <td>105</td>
                                    </tr>
                                    <tr>
                                        <td>Toshipa</td>
                                        <td>1</td>
                                        <td>105</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h4 class="text-right">المجموع</h4>
                            <h5 class="text-left">20,000.00</h5>
                            <hr>
                            <div class="col-sm-12">
                                <button type="button" style="margin-left:100px" value=""
                                    class="btn btn-outline-primary">
                                    طـباعه الفـــاتورة
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card -->
        </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/Adminlte.min.js') }}"></script>

    <script>
        $(document).ready(function () {


            $('.add_row').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var cat_id = $(this).data('cat');
                var cat_name = $(this).data('cat_name');
                var product_name = $(this).data('product_name');
                var price = $(this).data('price');

                $(this).removeClass('btn-info').addClass('btn-default disabled');
                // alert(id + name + price);
                var $data =
                    `<tr>    
                <td>1</td>
                <td>
                    <label>${cat_name}
                    <input type="hidden" name="gogal" value="" class="total-price"/>
                    <input type="hidden" class="form-control form-control-sm" name="cat[]" value="${cat_id}"/>
                    </td>
                <td>
                                                    <label>${product_name}
                    <input type="hidden" name="pro[]" class="form-control pro- ${product_name}" value="${id}"/>
                    </td>
                    <td>
                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"class="form-control form-control-sm" min="1" name="الكمية[]" data-price="${price}" value="" class="form-control product-الكمية" id="الكمية">
                        </td>
                        <td>
                            
                            <label>${price}
                            <input type="hidden"class="form-control form-control-sm" name="price[]" id="product-price"value="${price}"/>
                            </td>
                        <td>
                            <label name="" id="subtotall"/>
                        <input type="hidden"class="form-control form-control-sm" name="sub_total[]" id="subtotal" value="sub_total" />
            
                            </td>
                </form>
                    <td><button class="btn btn-danger btn-sm remove_row"data-id="${id}">-</button></td>
                </tr>`;
                $('#tboody').append($data);

                calc_total();

            }); //End Add Row


            $('body').on('change', '#cat', function (e) {

                var cat_id = $(this).val();
                $.ajax({
                    method: 'post',
                    url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                    data: {
                        cat_id: cat_id
                    },
                    success: function (data) {
                        console.log(data);
                    },
                });
            }); // Cat ID To Bring Pro Data


            $('.add_new_row').click(function (e) {
                e.preventDefault();
                alert(3);
            });
            $('body').on('click', '.disabled', function (e) {
                e.preventDefault();
            }); //End Disabled Click

            $('body').on('click', '.remove_row', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#product-' + id).removeClass('btn-default disabled').addClass('btn-info');
                $(this).closest('tr').remove();
                calc_total();

            }); // End Remove Row

            $('body').on('keyup change', '#الكمية', function () {
                var الكمية = parseInt($(this).val());
                var unitprice = $(this).data('price');
                $(this).closest('tr').find('#subtotal').val(الكمية * unitprice);
                $(this).closest('tr').find('#subtotall').html(الكمية * unitprice);
                calc_total();
            }); //End الكمية

            function calc_total() {
                var price = 0;
                $('#tboody #subtotall').each(function () {

                    price += parseInt($(this).html());
                });
                if (price > 0) {
                    $('#order-print').removeClass('btn-info disabled').addClass('btn-info');
                } else {
                    $('#order-print').addClass('btn-info disabled');
                }
                $('.total-price').html(price);
                $('.total-price').val(price);
            } // End Calc Total

            /////////////////////////////////////
            $('#toastsDefaultSuccess').click(function () {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Purshace Invoice',
                    subtitle: 'Subtitle',
                    body: 'Your Purshace Has Been Successfully Completed .'
                })
            });

            // toastr

            /////////////////////////////////////

        });
    </script>
    @endsection