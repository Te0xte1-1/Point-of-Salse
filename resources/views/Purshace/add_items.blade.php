@extends('layouts.app')

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

        label {
            float: right !important;
            margin-right: 15px;

        }

        .label_approve {
            font-size: 14px;
            font-family: aria;
            color: #000;
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            تفاصيل فاتورة مشتريات رقم
                        </h4>
                        <span style="margin-left:160px" class="text-center">
                            @if (!empty($get_items_from_order_bill))
                                ( {{ $bill_info->auto_serial }} )
                            @else
                            @endif

                        </span>
                        <a title="رجوع لصفحة المشتريات" href="{{ route('Purshace') }}" class="text-left"><i
                                class="fa fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead class="table table-info">
                                    <tr>
                                        <th>الحقل</th>
                                        <th>القيمة</th>
                                    </tr>
                                </thead>
                                <tbody id="parent_added_done">


                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>


                    {{-- Add Items --}}
                    <div class="modal fade" id="modal-lg-add-items">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-info card-outline">
                                                <div class="card-header ">
                                                    <b>
                                                        <h5 class="text-center">إضافة أصناف للفاتورة رقم
                                                            ({{ $bill_info->auto_serial }})
                                                        </h5>
                                                    </b>
                                                </div>
                                                <!-- /.card-header -->
                                                <form id="add_item_form">
                                                    @csrf
                                                    <div class="card-body">


                                                        <input type="hidden" id="url"
                                                            value="{{ route('Purshace.add_items_store') }}">


                                                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>
                                                                            <i class="far fa-calendar-alt"></i>
                                                                            التـــاريخ
                                                                        </h6>

                                                                        <input type="date" name="date"
                                                                            value="{{ $bill_info->date }}"
                                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                                            class="form-control form-control-sm"
                                                                            id="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        بيانات العميل
                                                                        <input type="text" name=""
                                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                                            class="form-control form-control-sm"
                                                                            id=""value="{{ $bill_info->supplier_id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>رقم الفاتورة <i class="fa fa-barcode"></i>
                                                                        </h6>
                                                                        <input type="text"
                                                                            value="{{ $bill_info->auto_serial }}"
                                                                            name="serial"
                                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                                            class="form-control form-control-sm"
                                                                            id="serial">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>نوع الفاتورة <i class="fa fa-barcode"></i>
                                                                        </h6>
                                                                        <input type="text" name=""
                                                                            style="background:rgb(190, 202, 213);color:#fff;text-align:center"
                                                                            class="form-control form-control-sm"
                                                                            value="{{ $bill_info->order_pay_type }}"
                                                                            id="">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr style="border:1px solid #007bff">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h6>القسم</h6>

                                                                        <select class="form-control " name="cat"
                                                                            id="cat">
                                                                            <option value=""></option>
                                                                            @foreach ($Categorys as $category)
                                                                                <option value="{{ $category->id }}">
                                                                                    {{ $category->cat_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">

                                                                        <h6 style="text-align: center">الصنف</h6>
                                                                        <select class="form-control form-control"
                                                                            name="pro" id="pro">
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h6>بيانات وحدة الصنف</h6>
                                                                        <select class="form-control " name="unit"
                                                                            id="unit">
                                                                            <option value=""></option>
                                                                            @foreach ($units as $unit)
                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->unit_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>سعر الوحدة</h6>
                                                                        <input type="number"
                                                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                                            name="price"
                                                                            class="form-control form-control-sm"
                                                                            id="unit_price">
                                                                        <input type="hidden" id="unit_price"
                                                                            name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>سعر الوحدة</h6>
                                                                        <input type="number"
                                                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                                            name="price"
                                                                            class="form-control form-control-sm"
                                                                            id="unit_price">
                                                                        <input type="hidden" id="unit_price"
                                                                            name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>الكمية المستلمة</h6>
                                                                        <input type="number"
                                                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                                            name="qty"
                                                                            class="form-control form-control-sm"
                                                                            id="qty">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <h6>الإجمالي</h6>
                                                                        <input type="text" name="subtotal" disabled
                                                                            class="form-control form-control-sm"
                                                                            id="price_invoice">
                                                                        <input type="hidden" id="total_cost"
                                                                            name="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h6>حد الطلب </h6>
                                                                        <input type="number" name="risk"
                                                                            class="form-control form-control-sm"
                                                                            id="risk">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>هل للصنف تاريخ صلاحية ..
                                                                        ؟</label>
                                                                    <select class="form-control form-control-sm"
                                                                        id="has_production_date">
                                                                        <option value=""></option>
                                                                        <option value="0">لا</option>
                                                                        <option value="1">نعم</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row" id="product_date" style="display: none">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h6>تاريخ الإنتاج</h6>
                                                                        <input type="date" name="creation_product"
                                                                            class="form-control form-control-sm"
                                                                            id="creation_product">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h6>تاريخ الإنتاج</h6>
                                                                        <input type="date" name="expiration_product"
                                                                            class="form-control form-control-sm"
                                                                            id="expiration_product">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group text-center">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm add_new_row mt-4"
                                                                            value="">
                                                                            إضافة الصنف للفاتورة
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <hr style="border:1px solid #007bff">

                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    {{-- Add Items --}}

                    <div class="modal fade" id="modal-lg-edit_items">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header modal-info">
                                    <h3 class="text-center">تحديث أصناف في الفاتورة رقم
                                        ({{ $bill_info->auto_serial }})
                                    </h3>
                                    <button class="btn btn-info btn-sm" data-dismiss="modal">x</button>
                                </div>
                                <div class="modal-body" id="modal-lg-edit_items_body">
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-info" style="background-color: #3D3D3D3D;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <input type="hidden" value="{{$bill_info->order_id}}" name="updated_item_after_added_serial" id="updated_item_after_added_serial">
                                                            <input type="hidden" value="{{$bill_info->id}}" name="updated_item_after_added_item_id" id="updated_item_after_added_item_id">
                                                            <input type="hidden" value="{{$bill_info->cat_id}}" name="cat">
                                                            <input type="hidden" value="{{$bill_info->item_id}}" name="pro">
                                                            <input type="hidden" value="{{$bill_info->unit_id}}" name="unit">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h6>القسم</h6>
                                                                <select class="form-control form-control-sm" disabled
                                                                    name="updated_item_after_added_category_id"
                                                                    id="updated_item_after_added_category_id" required>
                                                                    <option value="{{ $bill_info->cat_id }}">
                                                                        {{ $bill_info->cat_id }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <h6 style="text-align: center">الصنف</h6>
                                                                <select class="form-control form-control" disabled
                                                                    name="updated_item_after_added_pro"
                                                                    id="updated_item_after_added_pro">
                                                                    <option value="{{ $bill_info->item_id }}">
                                                                        {{ $bill_info->item_id }}</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h6>بيانات وحدة الصنف</h6>
                                                                <select class="form-control form-control-sm" disabled
                                                                    name="updated_item_after_added_unit"
                                                                    id="updated_item_after_added_unit">
                                                                    <option value="{{ $bill_info->unit_id }}">
                                                                        {{ $bill_info->unit_id }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h6>سعر الوحدة</h6>
                                                                <input type="text"
                                                                    value="{{ $bill_info->unit_price }}"
                                                                    name="updated_item_after_added_price"
                                                                    class="form-control form-control-sm" id="unit_price">
                                                                <input type="hidden" id="updated_item_after_added_price"
                                                                    name="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h6>الكمية المستلمة</h6>
                                                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ $bill_info->item_qty }}"
                                                                    name="updated_item_after_added_qty"
                                                                    class="form-control form-control-sm"
                                                                    id="updated_item_after_added_qty">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h6>الإجمالي</h6>
                                                                <input type="text"
                                                                    name="updated_item_after_added_total_cost"
                                                                    id="updated_item_after_added_total_cost"
                                                                    value="{{ $bill_info->total_price }}" disabled
                                                                    class="form-control form-control-sm">
                                                                <input type="hidden"
                                                                    id="updated_item_after_added_total_cost_hidden"
                                                                    name="updated_item_after_added_total_cost_hidden">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group text-center">
                                                                <button type="button"
                                                                    id="submit_updated_item_after_added"
                                                                    class="btn btn-primary btn-sm update_row mt-4"
                                                                    value="">
                                                                    تحديث الصنف المضاف للفاتورة
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>

                                            <hr style="border:1px solid  #3D3D3D3D;">
                                        </div>
                                    </div> --}}

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-info btn-sm" data-dismiss="modal">أغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="modal_approved_bill">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #020e23;color:#fff;">
                                <a href="#" style="margin-right:500px;color:#fff">إعتـمـاد
                                    الفاتــــــورة
                                    ({{ $bill_info->auto_serial }})
                                </a>
                            </div>
                            <div class="modal-body" id="modal-lg_approved_bill_body">

                            </div>
                            <div class="modal-footer" style="background: #020e23;color:#fff;text-align:center;">
                                <button type="button" data-dismiss="modal" class="btn btn-light btn-sm">خروج</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div id="items_added_done">


    </div>

    </div>





    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/Adminlte.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            reload_table_parent_data();
            reload_table_data();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            //

            var td_total_price = 0;
            $('#td_total_price').each(function() {
                var me = parseInt($(this).val());
                $('#show_total').val(td_total_price += me);
            });

            $('body').on('click', '.add_new_row', function(e) {
                var add_item_form = $('#add_item_form').serialize();
                var url = $('#url').val();
                var serial = $('#serial').val();
                var cat = $('#cat').val();
                var pro = $('#pro').val();
                var unit = $('#unit').val();
                var qty = $('#qty').val();
                var price = $('#unit_price').val();
                var total = $('#total_cost').val();
                var creation_product = $('#creation_product').val();
                var expiration_product = $('#expiration_product').val();

                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.add_items_store') }}",
                    dataType: "json",
                    cach: false,
                    data: {

                        _token: '{{ csrf_token() }}',
                        serial: serial,
                        cat: cat,
                        pro: pro,
                        unit: unit,
                        qty: qty,
                        price: price,
                        total: total,
                        creation_product: creation_product,
                        expiration_product: expiration_product,

                    },
                    success: function(data) {
                        alert('لقد تمت إضافة الصنف الى الفاتورة بنجاح');
                        $('#cat').val("");
                        $('#pro').val("");
                        $('#unit').val("");
                        $('#qty').val("");
                        $('#unit_price').val("");
                        $('#total_cost').val("");
                        $('#price_invoice').val("");
                        $('#creation_product').val("");
                        $('#expiration_product').val("");

                        reload_table_parent_data();
                        reload_table_data();

                    },
                });

            });


            $('body').on('click', '#delete_item', function(e) {

                e.preventDefault();
                var question_delete_item = confirm("هل تريد حذف الصنف من الفاتورة");
                if (question_delete_item == true) {
                    var delete_id = $(this).data('delete_id');
                    var order_id = $(this).data('order_id');
                    $.ajax({
                        method: 'post',
                        url: "{{ route('Purshace.load_purshace.delete_item_from_bill') }}",
                        dataType: "json",
                        cach: false,
                        data: {

                            _token: '{{ csrf_token() }}',
                            delete_id: delete_id,
                            order_id: order_id,
                        },
                        success: function(data) {
                            reload_table_parent_data();
                            reload_table_data();
                            console.log(data);
                        }
                    });

                } else {
                    return false;
                }

            });

            $('body').on('keyup change', '#unit_price,#qty', function(e) {

                get_total_cost();
            });

            function reload_table_parent_data() {
                var serial = $('#serial').val();
                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.load_purshace.parent_added_done') }}",
                    dataType: "html",
                    cach: false,
                    data: {

                        _token: '{{ csrf_token() }}',
                        serial: serial
                    },
                    success: function(data) {

                        $('#parent_added_done').html(data);
                    }
                });

            } // Get Reload Table Data

            function reload_table_data() {
                var serial = $('#serial').val();
                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.load_purshace.items_added_done') }}",
                    dataType: "html",
                    cach: false,
                    data: {

                        _token: '{{ csrf_token() }}',
                        serial: serial
                    },
                    success: function(data) {
                        $('#items_added_done').html(data);
                        var parent_total = $('#parent_total').html();
                        $('#show_total').html(parent_total);
                    }
                });

            } // Get Reload Table Data





            function get_total_cost() {

                var unit = $('#unit_price').val();
                var qty = $('#qty').val();
                var total = $('#price_invoice').val(unit * qty);
                var total2 = $('#price_invoice').html(unit * qty);
                var total_cost = $('#total_cost').val(unit * qty);
            } // Get Calculate of Two Arguments Data

            $('body').on('change', '#cat', function(e) {
                var cat_id = $(this).val();
                // alert(cat_id);
                $.ajax({
                    method: 'post',
                    url: "{{ route('load_purshace.load_pro_by_cat_id_in_purshace') }}",
                    dataType: "html",
                    data: {

                        _token: '{{ csrf_token() }}',
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#pro').html(data);
                    },
                });
            }); // Cat ID To Bring Pro Data


            function get_some_for_tow_inputs_with_hidden(input1, input2, total_area, total_area_hidden = null) {
                var value1 = $(input1).val();
                var value2 = $(input2).val();
                var sumation = value1 * value2;
                var sumation_val = $(total_area).val(sumation);
                var sumation_html = $(total_area_hidden).val(sumation);
            }

            $('body').on('keyup change', '#updated_item_after_added_qty,#updated_item_after_added_price',
                function() {
                    var show = get_some_for_tow_inputs_with_hidden('#updated_item_after_added_qty',
                        '#updated_item_after_added_price', '#updated_item_after_added_total_cost',
                        '#updated_item_after_added_total_cost_hidden');
                });


            $('body').on('click', '#edit_item_after_add', function() {

                var item_id = $(this).data('id');
                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.load_purshace.edit_items_after_added_to_order') }}",
                    // dataType: "html",
                    cach: false,
                    data: {

                        _token: '{{ csrf_token() }}',
                        item_id: item_id
                    },
                    success: function(data) {
                        $('#modal-lg-edit_items').modal({
                            show: true,
                            backdrop: 'static',
                        });
                        $('#modal-lg-edit_items_body').html(data);

                    }
                });
            });
            $('body').on('click', '#submit_updated_item_after_added', function(e) {
                e.preventDefault();
                var updated_item_after_added_serial = $('#updated_item_after_added_serial').val();
                var updated_item_after_added_item_id = $('#updated_item_after_added_item_id').val();
                var updated_item_after_added_cat = $('#updated_item_after_added_category_id').val();
                var updated_item_after_added_pro = $('#updated_item_after_added_pro').val();
                var updated_item_after_added_qty = $('#updated_item_after_added_qty').val();
                var updated_item_after_added_price = $('#updated_item_after_added_price').val();
                var updated_item_after_added_subtotal_cost = $(
                    '#updated_item_after_added_total_cost_hidden').val();

                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.load_purshace.updated_items_after_added_to_order') }}",
                    cach: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: {

                            updated_item_after_added_serial: updated_item_after_added_serial,
                            updated_item_after_added_item_id: updated_item_after_added_item_id,
                            updated_item_after_added_cat: updated_item_after_added_cat,
                            updated_item_after_added_pro: updated_item_after_added_pro,
                            updated_item_after_added_qty: updated_item_after_added_qty,
                            updated_item_after_added_price: updated_item_after_added_price,
                            updated_item_after_added_subtotal_cost: updated_item_after_added_subtotal_cost

                        }
                    },
                    success: function(data) {

                        alert('لقد تمت العملية بنجاح');
                        $('#modal-lg-edit_items_body').html("");
                        $('#modal-lg-edit_items').modal('hide');
                        reload_table_parent_data();
                        reload_table_data();
                    }
                });
            });
            $('body').on('change', '#has_production_date', function(e) {
                var has_production_date = $(this).val();

                if (has_production_date == 1) {
                    $('#product_date').show();
                } else {
                    $('#product_date').hide();

                }
            });



            $('#remove_parent_bill').click(function(e) {
                e.preventDefault();
                var question = false;
                confirm('هل تريد حذف الفاتورة');

            })
        });
    </script>
@endsection
