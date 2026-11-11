@extends('layouts.header')
@section('title')
    Salse
@endsection
{{--
@section('content') --}}
<title>Salse Page</title>
<style>
    body {
        background: #f4f6f9 !important;
        direction: rtl !important;
    }

    .container {
        padding: 10px;
    }

    .row {
        padding-left: 10px;
        padding-right: 10px;
    }

    .pt-4,
    .py-4 {
        padding-top: 1px !important;
    }

    th,
    td {
        text-align: center;
    }

    .card {
        box-shadow: 0 1px 10px 0 #d1dbeb;
    }

    .card-success:not(.card-outline)>.card-header {
        /* background: #4c5b8bad !important; */
    }

    #cash_info {
        color: #000;
        /* background: #2e6871 !important; */
    }

    #cash_info>.card-header {
        background: #a1a6ae !important;

    }

    .breadcrumb {
        box-shadow: 0 1px 10px 0 #060129bb;
    }

    h6 {
        text-align: center;
    }
</style>
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Salse</li>
    </ol>

    <h4 class="text-center">Create Invoice <a href="#" title="فاتورة جديده" class="btn btn-success btn-sm"
            data-toggle="modal" data-target="#modal-lg">فاتورة جديده</a></h4>
    <hr>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">تعديل البيانات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header ">
                                    <b>
                                        <h5 class="text-center">صحفة المبيعات</h5>
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
                                                    <h6>Date</h6>
                                                    <input type="date" name="date" class="form-control form-control-sm"
                                                        id="date">
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
                                                                            class="form-control select2 select2-hidden-accessible"
                                                                            style="width: 100%;" data-select2-id="1"
                                                                            tabindex="-1" aria-hidden="true"
                                                                            name="customer" id="">
                                                                            <option value=""></option>
                                                                        </select>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">

                                                                                <h6>اسم العميل</h6>

                                                                                <input type="text"
                                                                                    name="customer_name" disabled=""
                                                                                    class="form-control form-control-sm" id="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">

                                                                                <h6>رقم العميل</h6>

                                                                                <input type="text"
                                                                                    name="customer_number"
                                                                                    class="form-control form-control-sm" id="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">

                                                                                <h6>عنوان العميل</h6>

                                                                                <input type="text"
                                                                                    name="cusotmer_address"
                                                                                    class="form-control form-control-sm" id="">
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
                                                    <h6>رقم الفاتورة</h6>
                                                    <input type="text" name="serial" disabled=""
                                                        class="form-control form-control-sm" id="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <h6>طريقة البيع</h6>
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                        aria-hidden="true" name="units" id="units">
                                                        <option value="1">كاش</option>
                                                        <option value="0">أجل</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="form-group">

                                                    <h6>القسم</h6>

                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                        aria-hidden="true" name="cat" id="cat">
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
                                                        aria-hidden="true" name="pro" id="">
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
                                                        aria-hidden="true" name="unit" id="">
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
                                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="qty" class="form-control form-control-sm"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <h6>المخزن</h6>
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                        aria-hidden="true" name="stock" id="">
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
                                                    <h6>الكمية المتاحه في المخزن</h6>
                                                    <input type="text" name="available_qty" class="form-control form-control-sm"
                                                        disabled id="">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-info btn-sm add_new_row mt-4"
                                                        value="إضافة الصنف للفاتورة">
                                                </div>
                                            </div>

                                        </div>
                                        {{-- </form> --}}
                                    </div>

                                </div>
                                <hr>
                                <h6>الأصناف المضافة للفاتورة</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-hover table-stripped"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th width="2%">ID</th>
                                                    <th width="2%">المخزن</th>
                                                    <th width="13%">القسم</th>
                                                    <th width="13%">اسم الصنف</th>
                                                    <th width="13%">وحدة البيع</th>
                                                    <th width="15%x">سعر الوحدة</th>
                                                    <th width="7%">الكمية</th>
                                                    <th width="15%x">الإ</th>
                                                    <th width="5%">remove</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tboody">
                                                <?php $i = 1; ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td>

                                                        <input type="text" name="cat[]" disabled=""
                                                            class="form-control form-control-sm" id="">
                                                    </td>
                                                    <td>

                                                        <input type="text" name="pro[]" disabled=""
                                                            class="form-control form-control-sm" id="">
                                                    </td>
                                                    <td><input type="text" name="الكمية[]" class="form-control form-control-sm"
                                                            id=""></td>
                                                    <td><input type="text" name="price[]" disabled=""
                                                            class="form-control form-control-sm" id=""></td>
                                                    <td><input type="text" name="sub_total[]" disabled=""
                                                            class="form-control form-control-sm" id="">
                                                    </td>
                                                    <td><button class="btn btn-danger btn-sm remove_row"
                                                            data-id="undefined">-</button></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    القيمة المضافة
                                                    <input type="text" name="" id=""
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    المبلغ بعد القيمةالمضافة
                                                    <input type="text" name="" id=""
                                                        class="form-control form-control-sm" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    المبلغ بعد القيمةالمضافة
                                                    <input type="text" name="" id=""
                                                        class="form-control form-control-sm" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div align="center" class="from-group">
                                            <input type="button" id="toastsDefaultSuccess"
                                                class="btn btn-success btn-sm" value="فاتورة جديده">
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
    <div class="row">
        <div class="col-sm-3">
            <div class="card card-default">
                <div class="card-header text-right">
                    <h3 class="text-center">الأقسام <i class="bi bi-house"></i></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach ($Categorys as $category)
                        <div class="card card">
                            <div class="card-header text-right">
                                <h4 class="text-center catt" data-id="{{ $category->id }}" data-toggle="collapse"
                                    href="{{ $category->cat_name }}" data-target="#{{ $category->cat_name }}"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    {{ $category->cat_name }}</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="collapse" id="{{ $category->cat_name }}">
                                    <table id="dataTable" class="table table-bordered table-hover tabl-sm">
                                        <thead>
                                            <tr>

                                                {{-- <th>ID</th> --}}
                                                <th>الصنف</th>
                                                <th>السعر</th>
                                                <th>الكمية في المخزن</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category->products as $Pro)
                                                <tr>
                                                    {{-- <td>{{ $Pro->id }}</td> --}}
                                                    <td width="5%">{{ $Pro->product_name }}</td>
                                                    <td>{{ $Pro->price }}</td>
                                                    <td>{{ $Pro->stock }}</td>
                                                    <td>
                                                        <a href="#" id="product-{{ $Pro->id }}"
                                                            data-cat="{{ $category->id }}"
                                                            data-cat_name="{{ $category->cat_name }}"
                                                            data-id="{{ $Pro->id }}"
                                                            data-product_name="{{ $Pro->product_name }}"
                                                            data-price="{{ $Pro->price }}"
                                                            class=" btn btn-info btn-sm add_row">
                                                            +
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header text-right">
                    <h3 class="text-center">Salse Page</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        {{-- <form action="{{ route('Salse.store') }}" method="post"> --}}
                        <form action="Salse/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>Name Of Customer</h6>
                                        <input type="text" placeholder="Name Of Customer" name="customer_name"
                                            class="form-control form-control-sm" name="" id="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>Location Of Customer</h6>
                                        <input type="text" name="customer_location" class="form-control form-control-sm"
                                            name="" id="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>Nubmer Of Customer</h6>
                                        <input type="text" name="customer_number" class="form-control form-control-sm"
                                            name="" id="">
                                    </div>
                                </div>


                                <table id="example2" class="table table-bordered table-hover tabl-sm"
                                    aria-describedby="example2_info">
                                    <thead class="table">
                                        <th width="2%">ID</th>
                                        <th width="13%">الأقسام</th>
                                        <th width="13%">الصنف</th>
                                        <th width="15%">الكمية</th>
                                        <th width="15%x">السعر</th>
                                        <th width="15%x">الإجمالي</th>
                                        <th width="5%">Add</th>
                                    </thead>
                                    <tbody id="tboody"class="tbbody">

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div align="center">
                                <button class="btn btn-info btn-sm " id="order-print"> <i class="bi bi-house"></i>
                                    Print </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-sm-8 -->



        <div class="col-sm-3">
            <div class="card">
                <div class="card-header text-right">
                    <h3 class="text-center">Cash Detailse Area</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="lead text-center">Amount Due 2/22/2014</p>
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$250.30</td>
                                </tr>
                                <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <tbody>
                                <thead>

                                    <tr>
                                        <th style="text-align: center;">
                                            <h5>
                                                Total:
                                            </h5>
                                </thead>
                                </th>
                                <td style="text-align: center;background:#f4f6f9;color:black;">
                                    <h1 class="total-price">
                                        $00.00
                                    </h1>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div align="center" class="from-group">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/Adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.add_row').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var cat_id = $(this).data('cat');
                var cat_name = $(this).data('cat_name');
                var product_name = $(this).data('product_name');
                var price = $(this).data('price');

                $(this).removeClass('btn-info').addClass('btn-default disabled');
                // alert(id + name + price);
                var data =
                    `<tr>    
                    <td>1</td>
                            <td>
                                <label>${cat_name}

                                <input type="hidden" class="form-control form-control-sm" name="cat[]" value="${ cat_id }"/>
                                </td>
                            <td>
                                                                <label>${product_name}
                                <input type="hidden" name="pro[]" class="form-control pro- ${  product_name }" value="${id}"/>
                                </td>
                                <td>
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"class="form-control form-control-sm" min="1" name="qty[]" data-price="${price}" value="" class="form-control product-الكمية" id="الكمية">
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
                // $('#tboody').append(data);
                $('.tbbody').append(data);

                calc_total();

            }) //End Add Row


            $('body').on('change', '#cat', function(e) {

                var cat_id = $(this).val();

                $.ajax({
                    method: 'post',
                    url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#pro').html(data);
                    },
                });
            }); // Cat ID To Bring Pro Data


            $('.add_new_row').click(function(e) {
                e.preventDefault();
                alert(3);
            });
            $('body').on('click', '.disabled', function(e) {
                e.preventDefault();
            }); //End Disabled Click

            $('body').on('click', '.remove_row', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#product-' + id).removeClass('btn-default disabled').addClass('btn-info');
                $(this).closest('tr').remove();
                calc_total();

            }); // End Remove Row

            $('body').on('keyup change', '#qty', function() {
                var qty = parseInt($(this).val());
                var unitprice = $(this).data('price');
                $(this).closest('tr').find('#subtotal').val(qty * unitprice);
                $(this).closest('tr').find('#subtotall').html(qty * unitprice);
                calc_total();
            }); //End الكمية

            function calc_total() {
                var price = 0;
                $('#tboody #subtotall').each(function() {

                    price += parseInt($(this).html());
                });
                if (price > 0) {
                    // $('#order-print').removeClass('btn-info disabled').addClass('btn-info');
                } else {
                    // $('#order-print').addClass('btn-info disabled');
                }
                $('.total-price').html(price);
                $('.total-price').val(price);
            } // End Calc Total



        });
    </script>
