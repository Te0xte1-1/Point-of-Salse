@extends('layouts.app')

@section('title')
    Admins
@endsection
<style>
    #group {

        text-align: right;
        margin: 20px;
        display: flex;
        justify-content: space-between
    }

    h6,
    input,
    .form-control {
        text-align: center;

    }

    .table-warning {
        background-color: #ffbad4 !important;
    }

    #total {
        color: #843754;
    }

    th,
    td {
        font-family: cairo !important;
    }

    h6 {
        font-size: 14px !important;
        font-weight: 500 !important;
    }

    ,
    th {
        font-size: 14px !important;
        font-weight: 700 !important;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <form action="{{ route('support/store') }}" method="post">
                        @csrf
                        {{-- bill detailse --}}
                        <div class="container-fluid">
                            <br>
                            <h6 class="text-center">
                                <strong>
                                    {{ __('بيانات الفاتورة') }}
                                    <i class="fa fa-file"></i>
                                </strong>
                            </h6>
                            <hr>
                            <div class="row">

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>رقم الفاتورة</h6>
                                        <input type="text" name="bill_serial" id="bill_serial" disabled value="00154220"
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="bill_serial_h" id="bill_serial_h" value="00154220"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>التاريخ</h6>
                                        <input type="text" name="date" id="date" disabled value="2023-02-15"
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="date_h" id="date_h" value="2023-02-15"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الوقت</h6>
                                        <input type="text" name="time" id="time" disabled value="7:00:02 pm"
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="time_h" id="time_h" value="7:00:02 pm"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>اسم العميل</h6>
                                        <select name="customer_name" id="customer_name"
                                            class="form-control form-control-sm">
                                            <option value="0">-- اختر --</option>
                                            @foreach ($customers as $item)
                                                <option value="{{ $item->id }}">{{ $item->customer_name }}
                                                <option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>رقم الجوال</h6>
                                        <input type="text" name="phone" id="phone"
                                            placeholder="يحب أن يكون الرقم من 10 رقم" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>اسم المستخدم</h6>
                                        <select disabled name="user" id="user" class="form-control form-control-sm">

                                            @foreach ($admins as $item)
                                                <option value="{{ $item->id }}">{{ $item->username }}
                                                <option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End bill detailse --}}

                        <hr>
                        {{-- item detailse --}}
                        <div class="container-fluid">
                            <h6 class="text-center">
                                <strong>
                                    {{ __('بيانات الصنف') }}
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                </strong>
                            </h6>
                            <hr>
                            <div class="row">

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>
                                            كود الصنف

                                            <a href="#" class="search"><i class="fa fa-search"></i></a>
                                        </h6>
                                        <input type="text" name="serial" id="serial"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>اسم الصنف</h6>
                                        <input type="text" name="item" id="item"
                                            class="form-control form-control-sm" />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>سعر البيع</h6>
                                        <input type="text" name="price" id="price" disabled
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="price_h" id="price_h"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الكمية</h6>
                                        <input type="text" name="qty" id="qty"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الإجمالي</h6>
                                        <input type="text" name="subtotal" id="subtotal" disabled
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="subtotal_h" id="subtotal_h" disabled
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>إضافة</h6>
                                        <button type="button" id="add"
                                            class="form-control form-control-sm btn btn-primary btn-sm"
                                            style="float: right">+</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- End item detailse --}}

                        <hr>
                        {{-- table items --}}
                        <div class="container">
                            <table id="data" class="table table-bordered table-striped">
                                <thead class="table table-primary">
                                    <tr>
                                        <th>كود الصنف</th>
                                        <th>اسم الصنف</th>
                                        <th>سعر البيع</th>
                                        <th>الكمية</th>
                                        <th>ألإجمالي</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody class="tboody">

                                </tbody>
                                <tfoot>
                                    <td colspan="6" class="table table-warning"> <strong>
                                            <span id="span_total"></span>
                                        </strong></td>
                                </tfoot>
                            </table>
                        </div>
                        {{-- End table items --}}

                        <hr>

                        {{-- bill detailse --}}
                        <div class="container-fluid">
                            <h6 class="text-center">
                                <strong>
                                    {{ __('إكمال عملية البيع') }}
                                    <img src="" width="30" height="30"
                                        alt="" srcset="">
                                </strong>
                            </h6>
                            <hr>
                            <div class="row">

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الإجمالي قبل الخصم</h6>
                                        <input type="text" name="total_before_desc" id="total_before_desc" disabled
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="total_before_desc_h" id="total_before_desc_h"
                                            disabled class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>المدفوع</h6>
                                        <input type="text" name="paid" id="paid"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>المتبقي</h6>
                                        <input type="text" name="amount" id="amount"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الخصم</h6>
                                        <input type="text" name="descount" id="descount"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>الإجمالي بعد الخصم</h6>
                                        <input type="text" name="total_after_desc" id="total_after_desc" disabled
                                            class="form-control form-control-sm">
                                        <input type="hidden" name="total_after_desc_h" id="total_after_desc_h" disabled
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h6>طريقة الدفع</h6>
                                        <select name="pay_type" id="pay_type" class="form-control form-control-sm">
                                            <option value="0">-- اختر --</option>
                                            <option value="1">كاش</option>
                                            <option value="2">أجل</option>
                                            <option value="3">بنكي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-center">
                                <strong>
                                    <span id="span_total2">الإجمالي النهائي 12,0000</span>
                                </strong>
                            </h6>

                        </div>
                        {{-- End bill detailse --}}
                        <hr>
                        <div id="group">

                            <button class="btn btn-success btn-sm" id="complete">إكمال العملية</button>
                    </form>
                    <button class="btn btn-danger btn-sm" id="exit">إلغاء</button>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {


        // Bill Detailse
        var serial = $('#serial').val();
        var date = $('#date').val();
        var time = $('#time').val();
        var customer_name = $('#customer_name').val();
        var pay = $('#pay').val();
        var phone = $('#phone').val();
        var admin = $('#admin').val();
        // Bill Detailse



        // Item Detailse
        var serial_item = $('#serial_item').val();
        var cat = $('#cat').val();
        var item = $('#item').val();
        var price = $('#price').val();
        var qty = $('#qty').val();
        var total = $('#total').val();
        // Item Detailse


        // Table Detailse
        var form = $('form_data').serialize();
        // Table Detailse


        // Completing Area Detailse
        var total_before_desc = $('#total_before_desc').val();
        var total_before_desc = $('#total_before_desc').val();
        var pay = $('#pay').val();
        var amount = $('#amount').val();
        var descount = $('#descount').val();
        var total_after_descount = $('#total_after_descount').val();
        var pay_type = $('#pay_type').val();
        var total = $('#total').val();
        // Completing Area Detailse



        $('#add').click(function() {
            //   alert();
            var serial = $('#serial').val();
            var cat = $('#cat').val();
            var item = $('#item').val();
            var data_pro = $('#item').data('pro');
            var price = $('#price').val();
            var qty = $('#qty').val();
            var subtotal = $('#subtotal').val();
            var subtotal_h = $('#subtotal_h').val();



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
          

            $.ajax({
                method: 'post',
                url: "{{ route('suppoet.get_item_add_row') }}",
                dataType:"html",
                cache:false,
                data: {
                    _token: '{{ csrf_token() }}',
                    serial: serial,
                    item: item,
                    price: price,
                    qty: qty,
                    subtotal_h: subtotal_h,
                },
                success: function(data) {
                  $('.tboody').append(data);
                // alert(data);
                },

            });







            // $('.tboody').append('<tr><td>' + serial + '</td>' + '<td>' + item + '</td>' + '<td>' +
            //     price + '</td>' + '<td>' + qty + '</td>' + '<td>' + subtotal_h + '</td>' +
            //     '<td><button class="btn btn-danger btn-sm" id="remove"><i class="fa fa-trash"></i></button></td></tr>'
            //     );
            // var serial = $('#serial').val("");
            // var item = $('#item').val("");
            // var price = $('#price').val("");
            // var qty = $('#qty').val("");
            // var total = $('#subtotal').val("");
        });

        $('body').on('click', '.search', function(e) {
            e.preventDefault();
            var serial = $('#serial').val();
            $.ajax({
                method: 'post',
                url: "{{ route('load_product_by_serial') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    serial: serial
                },
                success: function(data) {
                    // alert(data[0].id);
                    // $('#').val(data[0].id);
                    $('#item').val(data[0].product_name);
                    $('#price').val(data[0].price);
                    $('#price_h').val(data[0].price);
                    $('#qty').val("");
                    $('#subtotal').val("");
                },

            });
        }); // Cat And Item By Serial Bring Pro Data

        $('body').on('change', '#cat', function(e) {
            get_item_by_cat_id('#cat', '#item');
        }); // Cat ID To Bring Pro Data


        $('body').on('change', '#item', function(e) {
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
                    $('#price').val(data.price);
                    $('#price_h').val(data.price);
                },
            });

        }); // Pro ID To Bring Pro Data


        $('body').on('click', '#remove', function(e) {

            e.preventDefault();

            $(this).closest('tr').remove();


        });


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


        $('body').on('keyup change', '#qty', function(e) {

            var qty = $(this).val();
            var price = $('#price_h').val();
            var subtotal = (qty * price);
            var subbtoalval = $('#subtotal_h').val(subtotal);
            var subbtoaltxt = $('#subtotal').val(subtotal);
        });
        $('body').on('keyup change', '#price', function(e) {

            var qty = $(this).val();
            var price = $('#price_h').val();
            var subtotal = (qty * price);
            var subbtoalval = $('#subtotal_h').val(subtotal);
            var subbtoaltxt = $('#subtotal').val(subtotal);
        });
        $('#exit').click(function(e) {
            e.preventDefault();
            var phone = $('#phone').val("");
            var customer_name = $('#customer_name').val("");
            var serial = $('#serial').val("");
            var cat = $('#serial_item').val("");
            var item = $('#item').val("");
            var price = $('#price').val("");
            var qty = $('#qty').val("");
            var subtotal = $('#subtotal').val("");
            var total_before_desc = $('#total_before_desc').val("");
            var total_before_desc = $('#total_before_desc').val("");
            var pay = $('#pay').val("");
            var amount = $('#amount').val("");
            var descount = $('#descount').val("");
            var total_after_descount = $('#total_after_descount').val("");
            var pay_type = $('#pay_type').val("");
            var total = $('#total').val("");
            $('.tboody tr').remove();
            var span_total = $('#span_total').html("");
            var span_total2 = $('#span_total2').html("");

        });
        $('#complete').click(function() {

        });
    });
</script>
