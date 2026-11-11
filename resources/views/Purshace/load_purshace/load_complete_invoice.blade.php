<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <h6>
                <i class="far fa-calendar-alt"></i>
                التـــاريخ
            </h6>

            <input type="date" name="date_update" style="background:#ddd;color:#000;text-align:center"
                class="form-control form-control-sm" id="date">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>
                بيانات العميل
                <i class="fa fa-user"></i>
            </h6>
            <select class="form-control form-control-sm" style="background:#ddd;color:#000;text-align:center"
                name="customer" id="customer_update">
                <option value="{{ $data->id }}">{{ $data->customer_id }}</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
            <input type="text" value="{{ $data->serial }}" name="serial_update"
                style="background:#ddd;color:#000;text-align:center" class="form-control form-control-sm"
                id="serial_update">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>نوع الفاتورة <i class="fa fa-file"></i></h6>
            <select name="bill_type" id="bill_type_update" style="background:#ddd;color:#000;text-align:center"
                class="form-control form-control-sm">
                <option value="{{ $data->bill_type }}">
                    فاتورة مبيعات</option>
            </select>
        </div>
    </div>
</div>

<hr style="border:1px solid #007bff">
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <h6>القسم</h6>
            <select class="form-control form-control-sm" name="cat" id="cat_id_invoice"
                class="form-control form-control-sm">
                <option value=""></option>
                @foreach ($Categorys as $category)
                    <option value="{{ $category->id }}" id="category_invoice_option"
                        data-cat="{{ $category->cat_name }}">
                        {{ $category->cat_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6 style="text-align: center">الصنف</h6>
            <select class="form-control form-control-sm" name="pro" id="pro_invoice">
            </select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <h6>الوحدة</h6>
            <select class="form-control form-control-sm select select2" style="width: 100%;" data-select2-id="4"
                tabindex="-1" aria-hidden="true" name="unit" id="unit_invoice">
                @foreach ($units as $unitt)
                    <option value="{{ $unitt->id }}" id="unit_invoice_option" data-unit="{{ $unitt->unit_name }}">
                        {{ $unitt->unit_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <h6>الكمية</h6>
            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="qty" min="1" value="1" class="form-control form-control-sm"
                id="qty_invoice">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <h6>المخزن</h6>
            <select class="form-control form-control-sm select2 select2-accessible" style="width: 100%;"
                data-select2-id="3" tabindex="-1" aria-hidden="true" name="stock_invoice" id="stock_invoice">
                @foreach ($Stocks as $stock)
                    <option value="{{ $stock->id }}" id="stock_invoice_option"
                        data-stock="{{ $stock->stock_name }}">
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
            <input type="text" name="price" class="form-control form-control-sm" disabled id="price_invoice">
            <input type="hidden" id="price_invoice_hidden" name="">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>الكمية المتاحه في المخزن</h6>
            <input type="text" name="available_qty" class="form-control input-control-sm" disabled
                style="background:#ddd" id="available_qty_invoice">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <input type="button" class="btn btn-primary btn-sm add_new_row mt-4" value="إضافة الصنف للفاتورة"
                style="float: right;">
        </div>
    </div>
</div>
<h6 style="text-align: center">الأصناف المضافة للفاتورة</h6>
<hr style="border:1px solid #007bff">

<div class="row">
    <div class="col-sm-12">
        <form id="rows_data" action="{{ route('Salse.load_salse.All_invoice_data') }}" method="POST">
            @csrf
            <table id="dataTable" class="table table-hover table-bordered table-stripped">
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
                <tbody id="tboody_invoice">

                </tbody>

            </table>
            <hr style="border:1px solid #007bff">
            <br>

            {{-- بيانات القيمة المضافه والخصومات في حالة حوجه العميل لإضافتها على النظام --}}

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <h6>
                            إجمالي الأصناف
                        </h6>
                        <input type="text" name="total_items" id="total_items"
                            class="form-control form-control-sm" disabled min="0" value="0"
                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                    </div>

                    <div class="form-group">
                        <h6>
                            خزنة التحصيل
                        </h6>
                        <select name="casher_treasures" id="casher_treasures" class="form-control form-control-sm">
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
                        <input type="text" name="tax" id="tax" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <h6>
                            المبلغ المراد خصمة
                        </h6>
                        <input type="text" name="amount" id="amount" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <h6>
                            طريقة الدفع
                        </h6>
                        <select name="pay_type" id="pay_type" class="form-control form-control-sm">
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
                        <input type="text" name="tax_value" id="tax_value" class="form-control form-control-sm"
                            disabled style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                    </div>
                    <div class="form-group">
                        <h6>
                            قيمة الخصم
                        </h6>
                        <input type="text" name="" id="" class="form-control form-control-sm"
                            disabled style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                    </div>
                    <div class="form-group">
                        <h6>
                            المبلغ المسدد
                        </h6>
                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="what_paid" id="what_paid" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <h6>
                            الإجمالي قبل الخصم
                        </h6>
                        <input type="text" name="total_before_descount" id="total_before_descount"
                            class="form-control form-control-sm" disabled
                            style="background:rgb(190, 202, 213);color:#fff;text-align:center">
                    </div>
                    <div class="form-group">
                        <h6>
                            الإجمالي النهائي
                        </h6>
                        <input type="text" name="last_total" id="total_invoice"
                            class="form-control form-control-sm" disabled>
                        <input type="hidden" name="last_total" id="total_invoice"
                            class="form-control form-control-sm" >
                    </div>
                    <div class="form-group">
                        <h6>
                            المبلغ المتبقي تحصيلة
                        </h6>
                        <input type="text" style="text-align: center;color:#000;" name="what_not_yet_paid" id="what_not_yet_paid"
                            class="form-control form-control-sm" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <h3 class="text-center">التفاصيل المالي للفاتورة</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="lead text-center">تاريخ الفاتــــــورة 2/22/2014</p>
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">عدد الأصناف في الفاتــــــورة:</th>
                                            <td id="total_item_count"></td>
                                        </tr>
                                        <tr>
                                            <th>القيمة المضافة (15%)</th>
                                            <td id="vat">$0.0</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$0.0</td>
                                        </tr>
                                        <tr>
                                            <th>إجمالي قيمة الفاتــــورة:</th>
                                            <td id="total_invoice">$0.0</td>
                                        </tr>
                                        <td> <input type="hidden" name="gogal" value=""
                                                class="total-price" /></td>
                                        <td> <input type="hidden" name="serial" value=""
                                                class="serial_id" /></td>
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
                                        <td style="text-align: center;background:#000;color:#fff;">
                                            <span id="total-price" style="font-size: 20px">
                                                $00.00
                                            </span>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div align="center" class="from-group">
                                    <button type="submit" id="order-print"
                                        class="form-control btn btn-success btn-sm">طباعة
                                        الفاتورة <i class="fa fa-print"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </form>
        <br>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/Adminlte.min.js') }}"></script>

<script>
    $(document).on('keyup down', '#what_paid', function() {
        var what_paid = $(this).val();
        var total_before_pay = $('#total_invoice').val();
        
        var last = total_before_pay -= what_paid;
        var what_not_yet_paid = $('#what_not_yet_paid').html(last);
        var what_not_yet_paid = $('#what_not_yet_paid').val(last);
// alert(last);

    });
    // $('#order-print').click(function() {

    //     var row_data = $('#rows_data').serialize();
    //      $.ajax({
    //         method: 'post',
    //         url: "{{ route('Salse.load_salse.All_invoice_data') }}",
    //         dataType: 'json',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             invoice_data: row_data,
    //             e: $row
    //         },
    //         success: function(data) {
    //             console.log(data);
    //         },
    //     });
    //     // $(document).Toasts('create', {
    //     //     class: 'bg-success',
    //     //     title: 'Purshace Invoice',
    //     //     subtitle: 'Subtitle',
    //     //     body: 'Your Purshace Has Been Successfully Completed .'
    //     // })
    // });
</script>
