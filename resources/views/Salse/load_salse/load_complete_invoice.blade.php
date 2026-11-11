<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <h6>
                <i class="far fa-calendar-alt"></i>
                التـــاريخ
            </h6>

            <p class="lead text-center"id="date_update">تاريخ الفاتــــــورة 2/22/2014</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>
                بيانات العميل
                <i class="fa fa-user"></i>
            </h6>
            <select class="form-control form-control-sm" style="background:#e9ecef;color:#000;text-align:center"
                name="customer" id="customer_update">
                <option value="{{ $data->id }}">{{ $data->customer_id }}</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
            <input type="text" value="{{ $data->serial }}" name="serial_update"
                style="background:#e9ecef;color:#000;text-align:center" class="form-control form-control-sm"
                id="serial_update">
            <input type="hidden" name="id_update" id="id_update" value="{{ $data->id }}">
            <input type="hidden" name="serial" id="serial" value="{{ $data->serial }}">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>نوع الفاتورة <i class="fa fa-file"></i></h6>
            <select name="bill_type" id="bill_type_update" style="background:#e9ecef;color:#000;text-align:center"
                class="form-control form-control-sm">
                <option value="{{ $data->bill_type }}">
                    فاتورة مبيعات</option>
            </select>
        </div>
    </div>
</div>

<hr>
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
            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="qty" min="1"
                value="1" class="form-control form-control-sm" id="qty_invoice">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <h6>المخزن</h6>
            <select class="form-control form-control-sm select2 select2-accessible" style="width: 100%;"
                data-select2-id="3" tabindex="-1" aria-hidden="true" name="stock_invoice" id="stock_invoice">

                @php $i = 1 ; @endphp
                @foreach ($Stocks as $stock)
                    <option @if($i==1) selected @endif value="{{ $stock->id }}" id="stock_invoice_option" data-stock="{{ $stock->stock_name }}">
                        {{ $stock->stock_name }}</option>
                @php $i++ ; @endphp
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
            <input type="text" name="available_qty" class="form-control form-control-sm" disabled
                style="background:#e9ecef" id="item_available_qty">
            <input type="hidden" id="item_available_qty_hidden" name="">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h6>الإجمالي</h6>
            <input type="text" name="subtotal" class="form-control form-control-sm" disabled
                style="background:#e9ecef" id="subtotal">
            <input type="hidden" id="subtotal_h" name="subtotal_h">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <input type="button" class="btn btn-success btn-sm add_new_row mt-4" value="إضافة الصنف للفاتورة"
                style="float: right;" id="add">
            {{-- <h6>اضف الصنف</h6>
                <button type="button" id="adds"
                class="form-control form-control-sm btn btn-primary btn-sm "
                style="float: right">+</button> --}}
        </div>
    </div>
</div>
<h6 style="text-align: center">الأصناف المضافة للفاتورة</h6>
<hr>

<div class="row">
    <div class="col-sm-12">
        <form id="rows_data" action="{{ route('Salse.load_salse.All_invoice_data') }}" method="POST">
            @csrf
            <input type="hidden" name="serial" id="serial" value="{{ $data->serial }}"> 
            <input type="hidden" name="id_update" id="id_update" value="{{ $data->id }}">
            <input type="hidden" name="customer_id" id="customer_id" value="{{ $data->customer_id }}">
            <table id="dataTable" class="table table-hover table-bordered table-stripped">
                <thead class="table table-bordered table-primary">
                    <tr>
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
            <hr>
            {{-- بيانات القيمة المضافه والخصومات في حالة حوجه العميل لإضافتها على النظام --}}

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <h6>اجمالي الأصناف</h6>

                        <input type="number" disabled oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                            name="total_item_count_h" id="total_item_count_h" class="form-control form-control-sm">
                        <input type="hidden" style="text-align: center;color:#000;" name="total_item_count_hidden"
                            id="total_item_count_hidden" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <h6>طريقة الدفع</h6>
                        <select name="pay_type_active_invoice" id="pay_type_active_invoice"
                            class="form-control form-control-sm">
                            <option value="0">اختر طريقة الدفع</option>
                            <option value="1">بيع كاش</option>
                            <option value="2">بيع أجل</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <h6>خزنة التحصيل</h6>
                        <select name="treasures_id_active" id="treasures_id_active"
                            class="form-control form-control-sm">
                            <option value="1"selected>الخزنة الرئيسية</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <h6>المدفوع</h6>
                        <input type="number" name="what_paid_active" id="what_paid_active"
                            class="form-control form-control-sm" min="0" style="color:#000;text-align:center">
                        <input type="hidden" name="what_remain_active_h" id="" class="what_remain_h">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <h6>المتبقي</h6>
                        <input type="number" name="what_remain_active" id="what_remain_active"
                            class="form-control form-control-sm" min="0" style="color:#000;text-align:center">
                        <input type="hidden" name="what_remain_active_h" id=""
                            class="what_remain_active_h">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <h6>الخصم</h6>
                        <input type="number" name="active_discount" style="text-align: center;color:#000"
                            id="active_discount" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-sm-2">
                    <h6>الإجمالي بعد الخصم</h6>
                    <input type="number" name="total_active_after_desc" disabled id="total_active_after_desc"
                        class="form-control form-control-sm" min="0" style="color:#000;text-align:center">
                    <input type="hidden" name="total_active_after_desc_h" id="total_active_after_desc_h"
                        class="total_active_after_desc_h">
                </div>

                <div class="from-group" id="active_div_last"
                    style="display: flex;justify-content: space-between;width: 100%;">
                    <button type="submit" id="order_print" class="btn btn-primary btn-sm">
                        إعتمـــاد الفاتــــــورة
                        <i class="fa fa-check"></i> 
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="cloose">إغلاق</button>
                </div>
            </div>
        </form>
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
    });
</script>
