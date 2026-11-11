@extends('layouts.app')
@section('title')
    Salse Page
@endsection
@section('content')
    <style>
        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

        th,
        td {
            text-align: center;
            font-size: 14px;
        }

        h2,
        h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center !important;
            font-size: 14px;
            color: #000000ad;
        }

        label {
            font-size: 14px;
            float: right !important;
            margin-right: 15px;
            text-align: center !important;
        }

        div#add_rows_data {
            overflow-x: hidden;
            overflow-y: auto;
        }

        .toasts-top-right.fixed {
            z-index: 2000;
        }
    </style>

    <div class="container-fluid">
        <br>
        <div class="card card-primary card-outline">
            <div class="card-header text-right">
                <h6>
                    صفحة فواتير المبيعات
                    <i class="fas fa-edit"></i>
                </h6>

                <div class="row">
                    <div class="col-sm-3">
                        <label>بحث برقم الفاتــــــورة</label>
                        <input type="text" name="" id="" class="form-control form-control-sm">
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <button class="form-control form-control-sm btn btn-primary btn-sm"
                            style="margin-top: 5px;margin-right:85px;">بحث</button>
                    </div>
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <a href="#" title="فاتورة جديده" class="btn btn-danger btn-sm"
                            style="float: right;margin-left:5px;margin-top:5px;font-size: 14px;" data-toggle="modal"
                            data-target="#modal-xl">فاتورة جديده</a>

                        <a href="#" title="فاتورة مبدئية" class="btn btn-info btn-sm"
                            style="float: right;font-size: 14px;margin-top:5px;" data-toggle="modal"
                            data-target="#modal-xl-not-real">فاتورة مبدئية</a>

                    </div>
                </div>
                <br>


            </div>
            <div class="card-body" id="table_salse_data">

            </div>
            <!-- /.card -->
        </div>






        <!-- Show Invoice Modal -->
        <div class="modal fade" id="modal-xl-edit">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-body" id="edit_bill_body">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> <!-- Show Invoice Modal -->


        <!-- New Invoice Modal -->
        <div class="modal fade" id="add_rows_data">
            <div class="modal-dialog modal-xl">
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
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> <!-- Edit Invoice Modal -->


        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
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
                                            <form id="add_item_to_invoice" action="{{ route('Salse.add_item_to_invoice') }}"
                                                method="post">
                                                <input type="hidden" name="invoice_number" id="invoice_number">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>
                                                                <i class="far fa-calendar-alt"></i>
                                                                التـــاريخ
                                                            </h6>

                                                            <input type="text" name="date" value="{{ date('Y:M:D') }}"
                                                                class="form-control form-control-sm" id="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>
                                                                بيانات العميل
                                                                <i class="fa fa-user"></i>
                                                            </h6>
                                                            <select class="form-control form-control-sm"
                                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                                aria-hidden="true" name="customer" id="customer">
                                                                <option value="0">(بدون عميل)</option>
                                                                @foreach ($Customers as $Customer)
                                                                    <option value="{{ $Customer->account_number }}"
                                                                        data-acc_number="{{ $Customer->account_number }}">
                                                                        {{ $Customer->customer_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <?php $i = rand(1, 1000);
                                                            $t = 101; ?>
                                                            <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                                            <input type="text" value="<?= $t . $i + 1 ?>" name="serial"
                                                                style="color:#000;text-align:center"
                                                                class="form-control form-control-sm" id="serial">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <h6>نوع الفاتورة <i class="fa fa-file"></i></h6>
                                                            <select class="form-control form-control-sm"
                                                                style="width: 100%;" data-select2-id="2" tabindex="-1"
                                                                aria-hidden="true" name="bill_type" id="bill_type">
                                                                <option value="3">فاتورة مبيعات</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="button"
                                                                class="btn btn-info btn-sm add_new_rows "
                                                                value="إكمال الفاتورة" style="margin-left:450px;">
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

                $.ajax({
                    url: "{{ route('Salse.load_salse.load_salse_table') }}",
                    method: "POST",
                    success: function(data) {

                        $('#table_salse_data').html(data);
                    }
                });
                // new Salse invoice
                // $('#modal-xl').modal('show');
                count = 0;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('body').on('click', '#remove_salse_invoice', function(e) {
                    e.preventDefault();

                    var rest = confirm("هل أنت متأكد");
                    if (rest == true) {

                        var id = $(this).data('id');
                        $.ajax({
                            method: 'post',
                            url: "{{ route('salse.remove_salse_invoice') }}",
                            dataType: "json",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,

                            },
                            success: function(data) {
                                location.reload();
                                // console.log(data);
                            },
                        });
                    } else {
                        return false;
                        location.reload();
                    }

                }); // Cat ID To Bring Pro Data

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
                            $('#modal-xl').html("");
                            $('#modal-xl').modal('hide');
                            $('#show_rows_data').html(data);
                            $('#add_rows_data').modal({
                                show: true,
                                backdrop: 'static',
                            });



                        },
                    });
                });

                $('body').on('change', '#cat_id_invoice', function(e) {
                    get_item_by_cat_id('#cat_id_invoice', '#pro_invoice');
                }); // Cat ID To Bring Pro Data

                $('body').on('change', '#pro_invoice', function(e) {
                    get_price_item('#pro_invoice', '#price_invoice', '#price_invoice_hidden');
                    get_available_qty_item('#pro_invoice', '#item_available_qty', '#item_available_qty_hidd');

                }); // Pro ID To Bring Pro Data

                $('body').on('mouseenter', '#add', function(e) {
                    var cat = $('#cat_id_invoice').val();
                    var item = $('#pro_invoice option:selected').data('serial');
                    var stock = $('#stock_invoice option:selected').val();

                    if (cat == "") {
                        return false;
                    }
                    if (item == "") {

                        return false;
                    }
                    if (stock == "") {
                        return false;
                    }

                    get_available_qty_item('#cat_id_invoice', '#pro_invoice', '#stock_invoice',
                        '#item_available_qty',
                        '#item_available_qty_hidd');
                }); // Check Stock By Using Store id And item id

                $('body').on('click', '#add', function(e) {

                    //   alert();
                    var auto_serial = $('#serial_update').val();
                    var serial = $('#serial').val();
                    var stock_id = $('#stock_invoice').val();
                    var cat = $('#cat_id_invoice').val();
                    var data_pro = $('#item option:selected').data('pro');
                    var item = $('#pro_invoice').val();
                    var price = $('#price_invoice').val();
                    var unit = $('#unit_invoice').val();
                    var qty = $('#qty_invoice').val();
                    var subtotal = $('#subtotal').val();
                    var subtotal_h = $('#subtotal_h').val();
                    var total_item_count_h = $('#total_item_count_h').val();
                    var item_available_qty = $('#item_available_qty').val();
                    var item_available_qty_hidden = $('#item_available_qty_hidden').val();


                    if (serial == "") {
                        alert("من فضلك اختر الرقم التسلسلي للصنف");
                        $('#serial').focus();
                        return false;
                    }
                    if (qty == "") {
                        alert("من فضلك اكتب الكمية");
                        $('#qty').focus();
                        return false;
                    }
                    if (item_available_qty == "0") {
                        alert("لا توجد كمية متوفرة");
                        $('#pro_invoice').focus();
                        return false;
                    }
                    if (item_available_qty < qty) {
                        alert("المخزن ليس فيه هذه الكمية");
                        $('#qty').focus();
                        return false;
                    }


                    $.ajax({
                        method: 'post',
                        url: "{{ route('salse.get_item_add_row') }}",
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            auto_serial: auto_serial,
                            serial: serial,
                            cat: cat,
                            stock_id: stock_id,
                            item: item,
                            unit: unit,
                            price: price,
                            qty: qty,
                            subtotal_h: subtotal_h,
                            total_item_count_h: total_item_count_h
                        },
                        success: function(data) {
                            // console.log(data);
                            reload_items_in_invoice(auto_serial, '#tboody_invoice');
                            $('#pay_type_active_invoice').val("");
                            $('#treasures_id_active').val("");
                            $('#what_paid_active').val("");
                            $('#what_remain_active').val("");
                            $('#what_paid_active_h').val("");
                            $('#what_remain_active_h').val("");
                            $('#total_active_after_desc').val("");
                            $('#total_active_after_desc_h').val("");
                            $('#active_discount').val("");
                            var cat = $('#cat_id_invoice').val("");
                            var item = $('#pro_invoice').val("");
                            var price = $('#price_invoice').val("");
                            var unit = $('#unit_invoice').val("");
                            var qty = $('#qty_invoice').val("");
                            var stock_id = $('#stock_invoice').val("");
                            var available_qty = $('#item_available_qty').val("");
                            var item_available_qty_hidden = $('#item_available_qty_hidden').val("");
                            var subtotal = $('#subtotal').val("");
                            var subtotal_h = $('#subtotal_h').val("");
                            calc_total_active();
                        },

                    });
                });

                $('body').on('keyup change', '#pay_type_active_invoice', function(e) {
                    var total_item_count_h = $('#total_item_count_h').val();
                    var pay_type_active_invoice = $('#pay_type_active_invoice').val();
                    var treasures_id_active = $('#treasures_id_active').val();
                    var what_paid_active = $('#what_paid_active').val();
                    var what_remain_active_h = $('#what_remain_active_h').val();
                    var descount_amount = $(this).val();
                    var total_amount = $("#total_item_count_hidden").val();
                    if ($('#pay_type_active_invoice option:selected').val() == "1") {
                        // cash
                        // alert('cash');
                        $('#what_paid_active').val(total_amount);
                        $('#what_paid_active').attr('readonly', true);
                        $('#what_remain_active').val("0");
                        $('#what_remain_active').attr('readonly', true);

                        var pay_type = $('#pay_type').children('option:selected').val();
                    } else if ($('#pay_type_active_invoice').children('option:selected').val() == 2) {
                        // Ajiel
                        // alert('Ajiel');
                        $('#what_paid_active').val("0");
                        $('#what_paid_active').attr('readonly', false);
                        $('#what_remain_active').attr('readonly', true);
                        $('#what_remain_active').val(total_amount);
                    } else {
                        // something else
                        alert('يحب عليك اختيار طريقة الدفع قبل الخصم');
                        $('#pay_type_active_invoice').focus();
                        return false;
                    }
                });
                $('body').on('click', '#active_discount', function(e) {


                    var total_item_count_h = $('#total_item_count_h').val();
                    var pay_type_active_invoice = $('#pay_type_active_invoice').val();
                    var treasures_id_active = $('#treasures_id_active').val();
                    var what_paid_active = $('#what_paid_active').val();
                    var what_remain_active_h = $('#what_remain_active_h').val();
                    var descount_amount = $(this).val();
                    var total_amount = $("#total_item_count_hidden").val();

                    if ($('#pay_type_active_invoice').val() == "0") {
                        alert('يحب عليك اختيار طريقة الدفع قبل الخصم');
                        $('#pay_type_active_invoice').focus();
                        $('#what_paid_active').val("0");
                        $('#what_remain_active').val("0");
                        $('#what_paid_active_h').val("0");
                        $('#what_remain_active_h').val("0");
                        return false;
                    }

                    if ($('#treasures_id_active').val() == "0") {
                        alert('يحب عليك اختيار الخزنة المراد نحصيل المال فيها');
                        $('#treasures_id_active').focus();
                        return false;
                    }

                });
                $('body').on('keyup change', '#active_discount', function(e) {

                    var total_item_count_h = $('#total_item_count_h').val();
                    var pay_type_active_invoice = $('#pay_type_active_invoice').val();
                    var treasures_id_active = $('#treasures_id_active').val();
                    var what_paid_active = $('#what_paid_active').val();
                    var what_remain_active_h = $('#what_remain_active_h').val();
                    var descount_amount = $(this).val();
                    var total_amount = $("#total_item_count_hidden").val();
                    var total_active_after_desc = (parseFloat(total_amount) - parseFloat(
                        descount_amount));

                    $('#total_active_after_desc').val(total_active_after_desc);
                    $('#total_active_after_desc').html(total_active_after_desc);
                    $('#total_active_after_desc_h').val(total_active_after_desc);
                    $('#total_active_after_desc_h').html(total_active_after_desc);

                });

                $('body').on('keyup change', '#qty_invoice', function(e) {

                    var qty = $(this).val();
                    var price = $('#price_invoice_hidden').val();
                    var subtotal = (qty * price);
                    var subbtoalval = $('#subtotal_h').val(subtotal);
                    var subbtoaltxt = $('#subtotal').val(subtotal);
                });

                $('body').on('keyup change', '#what_paid', function(e) {
                    var what_paid = $(this).val();
                    var total_after_all = $('#total-invoice').val();
                    what_paid = parseFloat(what_paid);
                    total_after_all = parseFloat(total_after_all);
                    var operation = what_paid - total_after_all;
                    $('#what_not_yet_paid').val(operation);
                }); // what_paid

                $('body').on('click', '#remove_active', function(e) {
                    e.preventDefault();

                    var rest = confirm("هل أنت متأكد");
                    if (rest == true) {

                        var id = $(this).data('id');
                        var id_update = $('#id_update').val();
                        var auto_serial = $('#serial_update').val();
                        $.ajax({
                            method: 'post',
                            url: "{{ route('salse.remove_item_detailse_invoice') }}",
                            dataType: "json",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                                auto_serial: auto_serial,
                                id_update: id_update,
                                id: id,

                            },
                            success: function(data) {
                                reload_items_in_invoice(auto_serial, '#tboody_invoice');
                                calc_total_active();
                                $(this).closest('tr').remove();
                                calc_total();
                                count -= 1;
                                $('#total_item_count').html(count);
                                $('#total_item_count').val(count);
                                // alert(data);
                            },
                        });
                    } else {
                        return false;
                    }
                }); // End Remove Row
                function remov_row() {}

                function calc_total() {
                    var serial = $('#serial_update').val();
                    var price = 0;

                    $('#tboody_invoice #subtotall_invoice_input').each(function() {
                        price += parseInt($(this).html());

                    });

                    var get_vat = price * 1 / 100;
                    var qty = parseInt($('#qty_table').html());
                    var unitprice = $('#unit_table').html();
                    var subtotal = (qty * unitprice);
                    $(this).closest('tr').find('#subtotal').html(subtotal);
                    var subtotal = $('#subtotal').html(subtotal);
                    var total_item_count = $('#total_item_count_hidden').val(price);
                    var total_item_count_h = $('#total_item_count_h').val(price);
                    // alert(price);
                    $('#total-invoice').html(price * 1);
                    $('#total-invoice').val(price * 1);
                    $('#total-price').html(price * 1);
                    $('#total-price').val(price * 1);
                    $('.total-price').val(price * 1);
                    $('.serial_id').val(serial);
                    $('#total_item_count').html(count);
                    $('#total_item_count').val(count);
                    // $('#vat').html(get_vat);
                    $('#what_paid').val(0);
                    $('#what_not_yet_paid').val(0);
                    $('#pay_type').val(0);
                } // End Calc Total


                /////////////////////////////////////
                $('body').on('mouseenter', '#order_print', function() {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Salse Invoice',
                        subtitle: 'Subtitle',
                        body: 'Your Purshace Has Not Been Successfully !! .'
                    });
                    var total_cost_items = 0;
                    $("#total_cost_item").each(function() {
                        total_cost_items += parseFloat($("#total_cost_item").val());
                    });
                    if (total_cost_items == "") {
                        total_cost_items = 0;

                    }

                    var pay_type = $('#pay_type_active_invoice').children('option:selected').val();
                    var treasures_id = $('#treasures_id_active').children('option:selected').val();

                    if (pay_type == "0") {
                        alert('يجب عليك اختيار طريقة الدفع');
                        pay_type.foucse();
                    }
                    if (treasures_id == "0") {
                        alert('يجب عليك اختيار الخزنة');
                    }

                });

                // $('body').on('click', '#order_print', function() {
                // e.preventDefault();
                // var bill_id = $('#id_update').val();
                // var serial_update = $('#serial_update').val();
                // var account_number = $('#customer_update').val();
                // var pay_type_active_invoice = $("#pay_type_active_invoice").val();
                // var treasures_id_active = $("#treasures_id_active").val();
                // var what_paid_active = $("#what_paid_active").val();
                // var what_paid_active_h = $("#what_paid_active_h").val();
                // var what_remain_active = $("#what_remain_active").val();
                // var what_remain_active_h = $("#what_remain_active_h").val();
                // var active_discount = $("#active_discount").val();
                // var total_active_after_desc = $("#total_active_after_desc").val();
                // $.ajax({
                //     method: 'post',
                //     dataType: 'html',
                //     url: "{{ route('Salse.load_salse.All_invoice_data') }}",
                //     data: {
                //         _token: '{{ csrf_token() }}',
                //         'serial_number': bill_id,
                //         'serial_update': serial_update,
                //         'account_number': account_number,
                //         'pay_type_active_invoice': pay_type_active_invoice,
                //         'treasures_id_active': treasures_id_active,
                //         'what_paid_active': what_paid_active,
                //         'what_paid_active_h': what_paid_active_h,
                //         'what_remain_active': what_remain_active,
                //         'what_remain_active_h': what_remain_active_h,
                //         'active_discount': active_discount,
                //         'total_active_after_desc': total_active_after_desc,
                //     },
                //     success: function(data) {
                //         $('#id_update').val("");
                //         $('#customer_update').val("");
                //         $("#pay_type_active_invoice").val("");
                //         $("#treasures_id_active").val("");
                //         $("#what_paid_active").val("");
                //         $("#what_paid_active_h").val("");
                //         $("#what_remain_active").val("");
                //         $("#what_remain_active_h").val("");
                //         $("#active_discount").val("");
                //         $("#total_active_after_desc").val("");
                //         $('#cloose').modal('hide');
                //         $(document).Toasts('create', {
                //             class: 'bg-success',
                //             title: 'Purshace Invoice',
                //             subtitle: 'Subtitle',
                //             body: 'Your Purshace Has Been Successfully Completed .'
                //         });
                //     },
                // });

                // });

                // *********************** Start Edit Bill *******************************
                $('body').on('click', '#edit_bill', function(e) {

                    e.preventDefault();
                    var bill_id = $(this).data('bill-id');
                    $.ajax({
                        method: 'post',
                        // dataType:'html',
                        url: "{{ route('Salse.load_salse.load_edit_bill') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            'bill_id': bill_id
                        },
                        success: function(data) {
                            // For Edit iNVOICE HAS creted
                            $('#modal-xl-edit').modal({
                                show: true,
                                backdrop: 'static',
                            });
                            $('#edit_bill_body').html(data);
                            //   console.log(data);

                        },
                    });
                });

                $('body').on('change', '#cat_id_edit_bill', function(e) {
                    get_item_by_cat_id('#cat_id_edit_bill', '#pro_edit_bill');
                }); // Cat ID To Bring Pro Data

                $('body').on('change', '#pro_edit_bill', function(e) {
                    get_price_item('#pro_edit_bill', '#price_edit_bill');
                }); // Cat ID To Bring Pro Data


                $('body').on('mouseenter', '.add_new_row_edit_bill', function(e) {
                    var cat = $('#cat_id_edit_bill').val();
                    var item = $('#pro_edit_bill option:selected').data('serial');
                    var stock = $('#stock_edit_bill option:selected').val();

                    if (cat == "") {
                        return false;
                    }
                    if (item == "") {

                        return false;
                    }
                    if (stock == "") {
                        return false;
                    }

                    get_available_qty_item('#cat_id_edit_bill', '#pro_edit_bill', '#stock_edit_bill',
                        '#available_qty_edit_bill',
                        '#available_qty_edit_bill_h');
                }); // Check Stock By Using Store id And item id

                $('body').on('keyup change', '#qty_edit_bill', function(e) {

                    var qty = $(this).val();
                    var price = $('#price_edit_bill').val();
                    var subtotal = (qty * price);
                    var subbtoalval = $('#subtotal_edit_bill_h').val(subtotal);
                    var subbtoaltxt = $('#subtotal_edit_bill').val(subtotal);
                });

                $('body').on('click', '.add_new_row_edit_bill', function(e) {
                    // e.preventDefault();
                    var auto_serial = $('#serial_edit_bill_h').val();
                    var stock_name = $('#stock_edit_bill').children('option:selected').data('stock');
                    var cat_name = $('#cat_id_edit_bill').children("option:selected").data("cat");
                    var item = $('#pro_edit_bill').children('option:selected').data('serial');
                    var unit_name = $('#unit_edit_bill').val();
                    var id = $('#id_edit_bill').val();
                    var serial = $('#serial_edit_bill').val();
                    var cat = $('#cat_id_edit_bill').val();
                    var pro = $('#pro_edit_bill').val();
                    var unit = $('#unit_edit_bill').val();
                    var qty = $('#qty_edit_bill').val();
                    var price = $('#price_edit_bill').val();
                    var price_h = $('#price_edit_bill_h').val();
                    var price_hidden = $('#price_edit_bill').val();
                    var stock_id = $('#stock_edit_bill').val();
                    var item_available_qty = $('#available_qty_edit_bill').val();
                    var total_item_count_h = $('#total_item_count_h').val();
                    var item_available_qty_hidden = $('#available_qty_edit_bill_h').val();
                    var subtotal = $('#subtotal_edit_bill').val();
                    var subtotal_h = $('#subtotal_edit_bill_h').val();
                    var changed_failed = '#tboody_edit_bill';
                    var urls = "{{ route('salse.get_item_add_row_edit_bill') }}";
                    if (cat == "") {
                        alert("من فضلك اختر الرقم التسلسلي للصنف");
                        $('#serial').focus();
                        return false;
                    }
                    if (pro == "") {
                        alert("من فضلك اكتب الكمية");
                        $('#qty').focus();
                        return false;
                    }
                    if (item_available_qty == "0") {
                        alert("لا توجد كمية متوفرة");
                        $('#pro_invoice').focus();
                        return false;
                    }
                    if (item_available_qty < qty) {
                        alert("المخزن ليس فيه هذه الكمية");
                        $('#qty').focus();
                        return false;
                    }


                    $.ajax({
                        method: 'post',
                        url: urls,
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            auto_serial: auto_serial,
                            cat: cat,
                            stock_id: stock_id,
                            item: item,
                            unit: unit,
                            price: price,
                            qty: qty,
                            subtotal_h: subtotal_h,
                        },
                        success: function(data) {
                            reload_items_in_invoice(auto_serial, changed_failed);
                            $('#pay_type_active_invoice').val("");
                            $('#treasures_id_active').val("");
                            $('#what_paid_active').val("");
                            $('#what_remain_active').val("");
                            $('#what_paid_active_h').val("");
                            $('#what_remain_active_h').val("");
                            $('#total_active_after_desc').val("");
                            $('#total_active_after_desc_h').val("");
                            $('#active_discount').val("");
                            var cat = $('#cat_id_invoice').val("");
                            var item = $('#pro_invoice').val("");
                            var price = $('#price_invoice').val("");
                            var unit = $('#unit_invoice').val("");
                            var qty = $('#qty_invoice').val("");
                            var stock_id = $('#stock_invoice').val("");
                            var available_qty = $('#item_available_qty').val("");
                            var item_available_qty_hidden = $('#item_available_qty_hidden').val("");
                            var subtotal = $('#subtotal').val("");
                            var subtotal_h = $('#subtotal_h').val("");
                            // calc_total_active(urls);
                        },

                    });



                }); // Added Row To Invoice

                $('body').on('click', '#remove_edit_bill', function(e) {
                    // e.preventDefault();

                    var rest = confirm("هل أنت متأكد");
                    if (rest == true) {
                        var pro_id = $(this).data('id');
                        var salse_id = $('#id_edit_bill_update').val();
                        var auto_serial = $('#serial_edit_bill').val();
                        var stock_id = $('#stock_id_edit_bill').val();

                        $.ajax({
                            method: 'post',
                            url: "{{ route('salse.remove_item_detailse_invoice_edit_bill') }}",
                            dataType: "json",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                                auto_serial: auto_serial,
                                salse_id: salse_id,
                                pro_id: pro_id,
                                stock_id: stock_id,

                            },
                            success: function(data) {
                                reload_items_in_edit_bill_invoice(auto_serial, '#tboody_edit_bill');
                                calc_total_edit_bill();
                                $(this).closest('tr').remove();
                                calc_total();
                                count -= 1;
                                $('#total_item_count').html(count);
                                $('#total_item_count').val(count);
                                // alert(data);
                            },
                        });
                    } else {
                        return false;
                    }
                }); // End Remove Row

                $('body').on('click', '#cloose', function(e) {
                    $('#cloose').modal('hide');
                    location.reload();

                });
                /////////////////////////////////////
                $('body').on('mouseenter', '#order_print_edit_bill', function() {

                    var total_cost_items = 0;
                    $("#total_cost_item").each(function() {
                        total_cost_items += parseFloat($("#total_cost_item").val());
                    });
                    if (total_cost_items == "") {
                        total_cost_items = 0;
                    } else {
                        alert(total_cost_items);
                    }
                    console.log(total_cost_items);
                    var total_cost_items = 0;
                    $("#total_cost_item").each(function() {
                        total_cost_items += parseFloat($("#total_cost_item").val());
                    });
                    if (total_cost_items == "") {
                        total_cost_items = 0;

                    }

                    var pay_type = $('#pay_type_active_invoice').children('option:selected').val();
                    var treasures_id = $('#treasures_id_active').children('option:selected').val();

                    if (pay_type == "0") {
                        alert('يجب عليك اختيار طريقة الدفع');
                        pay_type.foucse();
                    }
                    if (treasures_id == "0") {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Salse Invoice',
                            subtitle: 'Subtitle',
                            body: 'Your Purshace Has Not Been Successfully !! .'
                        });
                    }

                });

                // ***********************End Edit Bill *******************************



                /* ########################  Helpers Functions ############################*/

                function get_item_by_cat_id(your_cat = null, your_location_to_save = null) {

                    var cat_id = $(your_cat).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                        dataType: "html",
                        data: {

                            _token: '{{ csrf_token() }}',
                            cat_id: cat_id
                        },
                        success: function(data) {
                            $(your_location_to_save).html(data);
                        },
                    });
                }

                function get_price_item(item_id = null, item_location = null, item_location_hidd = null) {
                    var pro_id = $(item_id).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_product_price') }}",
                        data_type: 'html',
                        data: {

                            _token: '{{ csrf_token() }}',
                            pro_id: pro_id
                        },
                        success: function(data) {
                            $(item_location).val(data.price);
                            $(item_location_hidd).val(data.price);
                        },
                    });
                }

                function get_available_qty_item(cat_id = null, item_id = null, stock = null,
                    item_available_qty = null,
                    item_available_qty_hidd = null) {
                    var cat_id = $(cat_id).val();
                    var pro_id = $(item_id).val();
                    var stock = $(stock).val();
                    var item_available_qty_hidden = $('#item_available_qty_hidden').val();
                    var item_available_qty_hidden_h = $('#item_available_qty_hidden_h').val();


                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_product_qty_on_stock') }}",
                        data_type: 'html',
                        data: {

                            _token: '{{ csrf_token() }}',
                            cat_id: cat_id,
                            pro_id: pro_id,
                            stock: stock
                        },
                        success: function(data) {
                            if (data !== "") {

                                $(item_available_qty).val(data.qty);
                                $(item_available_qty_hidden).val(data.qty);
                            } else {
                                $('#item_available_qty').val("0");
                                $('#item_available_qty_hidden').val("0");
                                // alert('no data on stock');


                            }
                        },
                    });
                }


                function reload_items_in_invoice(auto_serial = null, hold_place_data = null) {

                    $.ajax({
                        method: 'post',
                        url: "{{ route('salse.reload_items_in_invoice') }}",
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            auto_serial: auto_serial,
                        },
                        success: function(data) {
                            if (data == false) {
                                alert(0);
                            } else {

                                $(hold_place_data).html(data);
                                calc_total();
                            }
                        }
                    });
                }

                function reload_items_in_edit_bill_invoice(auto_serial = null, hold_place_data = null) {

                    $.ajax({
                        method: 'post',
                        url: "{{ route('salse.reload_items_in_edit_bill') }}",
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            auto_serial: auto_serial,
                        },
                        success: function(data) {
                            if (data == false) {
                                var tr =
                                    '<tr><td colspan="7" class="alert alert-danger">لا توجد داتا</td></tr>';
                                $(hold_place_data).html(tr);

                            } else {

                                $(hold_place_data).html(data);
                                calc_total();
                            }
                        }
                    });
                }


                function calc_total_active(changed_failed = '#tboody_edit_bill', urls = null) {
                    var changed_failed = '#tboody_invoice';
                    var urls = "{{ route('salse.update_salse_invoice_active') }}";
                    // update salse invoice table
                    var total_item_count_h = $('#total_item_count_h').val();
                    var pay_type_active_invoice = $('#pay_type_active_invoice').val();
                    var treasures_id_active = $('#treasures_id_active').val();
                    var what_paid_active = $('#what_paid_active').val();
                    var what_remain_active_h = $('#what_remain_active_h').val();

                    $.ajax({
                        method: 'post',
                        url: urls,
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            total_item_count_h: total_item_count_h,
                            pay_type_active_invoice: pay_type_active_invoice,
                            treasures_id_active: treasures_id_active,
                            what_paid_active: what_paid_active,
                            what_remain_active_h: what_remain_active_h,
                        },
                        success: function(data) {

                            $(changed_failed).append(data);
                            calc_total();

                        },

                    });

                    // update salse invoice table 
                }

                function calc_total_edit_bill(changed_failed = '#tboody_edit_bill', urls = null) {
                    var changed_failed = '#tboody_edit_bill';
                    var urls = "{{ route('salse.update_salse_invoice_edit_bill') }}";
                    // update salse invoice table
                    var total_item_count_h = $('#total_item_count_h').val();
                    var pay_type_active_invoice = $('#pay_type_active_invoice').val();
                    var treasures_id_active = $('#treasures_id_active').val();
                    var what_paid_active = $('#what_paid_active').val();
                    var what_remain_active_h = $('#what_remain_active_h').val();

                    $.ajax({
                        method: 'post',
                        url: urls,
                        dataType: "html",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                            total_item_count_h: total_item_count_h,
                            pay_type_active_invoice: pay_type_active_invoice,
                            treasures_id_active: treasures_id_active,
                            what_paid_active: what_paid_active,
                            what_remain_active_h: what_remain_active_h,
                        },
                        success: function(data) {

                            $(changed_failed).append(data);
                            calc_total();

                        },

                    });

                    // update salse invoice table 
                }
                /* ########################  Helpers Functions ############################*/
            });
        </script>
    @endsection
