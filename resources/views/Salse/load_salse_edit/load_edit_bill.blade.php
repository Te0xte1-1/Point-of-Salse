<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header ">
                <b>
                    <h5 class="text-center">تعديل فاتورة مبيعات</h5>
                </b>
            </div>
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <input type="hidden" name="_token" value="x8wS8Ymxan8ZrT0QaMNNo1jOHEbHAJrHoatwGqtJ">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>
                                    <i class="far fa-calendar-alt"></i>
                                    التـــاريخ
                                </h6>

                                <input type="text" disabled name="date_edit_bill"
                                    value="{{ $bill_salse_info->date }}" class="form-control form-control-sm"
                                    id="date">
                                <input type="hidden" name="date_edit_bill_h" value="{{ $bill_salse_info->date }}"
                                    class="form-control form-control-sm" id="date_h">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                بيانات العميل
                                <select class="form-control form-control-sm" style="width: 100%;" data-id="1"
                                    tabindex="-1" aria-hidden="true" name="customer_edit_bill" id="customer_edit_bill">
                                    @if (empty($bill_salse_info->customer_id))
                                        <option value="">بدون عميل</option>
                                    @else
                                        <option value="{{ $bill_salse_info->serial }}"></option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                <input type="text" value="{{ $bill_salse_info->serial }}" name="serial_edit_bill"
                                    style="background:#e9ecef;color:#000;text-align:center"
                                    class="form-control form-control-sm" id="serial_edit_bill">

                                <input type="hidden" name="serial_edit_bill_h" value="{{ $bill_salse_info->serial }}"
                                    class="form-control form-control-sm" id="serial_edit_bill_h">
                                <input type="hidden" name="id_edit_bill_update" id="id_edit_bill_update"
                                    value="{{ $bill_salse_info->id }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>نوع الفاتورة <i class="fa fa-barcode"></i></h6>
                                <select name="bill_type_edit_bill" id="bill_type_edit_bill"
                                    class="form-control form-control-sm">
                                    <option value="{{ $bill_salse_info->bill_type }}"> {{ $bill_salse_info->bill_type }}
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
                                <select class="form-control form-control-sm" style="width: 100%;" data-id="1"
                                    tabindex="-1" aria-hidden="true" name="cat_id_edit_bill" id="cat_id_edit_bill">
                                    <option value=""></option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">

                                <h6 style="text-align: center">الصنف</h6>

                                <select class="form-control form-control-sm" style="width: 100%;" data-id="1"
                                    tabindex="-1" aria-hidden="true" name="pro_edit_bill" id="pro_edit_bill">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>الوحدة</h6>
                                <select class="form-control form-control-sm" style="width: 100%;" data-id="1"
                                    tabindex="-1" aria-hidden="true" name="unit_edit_bill" id="unit_edit_bill">
                                    <option value=""></option>
                                    @foreach ($Units as $item)
                                        <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>الكمية</h6>
                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                    name="qty_edit_bill" class="form-control form-control-sm" id="qty_edit_bill">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>المخزن</h6>
                                <select class="form-control form-control-sm" style="width: 100%;" data-id="1"
                                    tabindex="-1" aria-hidden="true" name="stock_edit_bill" id="stock_edit_bill">
                                    <option value=""></option>
                                    @foreach ($stocks as $item)
                                        <option value="{{ $item->id }}">{{ $item->stock_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>السعر</h6>
                                <input type="text" disabled name="price_edit_bill"
                                    class="form-control form-control-sm" id="price_edit_bill">
                                <input type="hidden" name="price_edit_bill_h" class="form-control form-control-sm"
                                    id="price_edit_bill">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>الكمية المتاحه في المخزن</h6>
                                <input type="text" name="available_qty_edit_bill"
                                    class="form-control form-control-sm" disabled style="background:#e9ecef"
                                    id="available_qty_edit_bill">
                                <input type="hidden" name="available_qty_edit_bill_h"
                                    class="form-control form-control-sm" id="available_qty_edit_bill_h">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h6>الإجمالي</h6>
                                <input type="text" name="subtotal_edit_bill" class="form-control form-control-sm"
                                    disabled="" style="background:#e9ecef" id="subtotal_edit_bill">
                                <input type="hidden" id="subtotal_edit_bill_h" name="subtotal_edit_bill_h">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="button" class="btn btn-success btn-sm add_new_row_edit_bill mt-4"
                                    value="إضافة الصنف للفاتورة" style="float: right;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr style="border:1px solid #007bff">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-hover table-bordered table-stripped"
                        aria-describedby="example2_info">
                        <thead class="table table-bordered table-info">
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
                        <tbody id="tboody_edit_bill">
                            @if (!empty($bill_salse_detailse))
                                @foreach ($bill_salse_detailse as $item)
                                    <tr>

                                        <td>
                                            <input type="hidden" name="stock_id_edit_bill" id="stock_id_edit_bill"
                                                value="{{ $item->store_id }}">
                                            {{ $item->category_name }}
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->subtotal }}</td>
                                        <td><button class="btn btn-danger btn-sm" id="remove_edit_bill"
                                                data-id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="alert alert-danger">لا توجد داتا</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <hr style="border:1px solid #007bff">


                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>اجمالي الأصناف</h6>

                                <input type="number" disabled oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                    name="total_item_count_h" id="total_item_count_h"
                                    class="form-control form-control-sm" value="{{ $bill_salse_info->total }}">
                                <input type="hidden" style="text-align: center;color:#000;"
                                    name="total_item_count_hidden" id="total_item_count_hidden"
                                    class="form-control form-control-sm" value="{{ $bill_salse_info->total }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>طريقة الدفع</h6>
                                <select name="pay_type_edit_invoice" id="pay_type_edit_invoice"
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
                                <select name="treasures_id_edit" id="treasures_id_edit"
                                    class="form-control form-control-sm">
                                    <option value="1"selected>الخزنة الرئيسية</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <h6>المدفوع</h6>
                                <input type="number" name="what_paid_edit" id="what_paid_edit"
                                    class="form-control form-control-sm" min="0"
                                    style="color:#000;text-align:center" value="{{ $bill_salse_info->what_paid }}">
                                <input type="hidden" name="what_remain_edit_h" id=""
                                    class="what_remain_h" value="{{ $bill_salse_info->what_paid }}">
                            </div>
                        </div>  	
                        	
                        <div class="col-sm-1">
                            <div class="form-group">
                                <h6>المتبقي</h6>
                                <input type="number" name="what_remain_edit" id="what_remain_edit"
                                    class="form-control form-control-sm" min="0"
                                    style="color:#000;text-align:center" value="{{ $bill_salse_info->what_not_yet_paid }}">
                                <input type="hidden" name="what_remain_edit_h" id=""
                                    class="what_remain_edit_h" value="{{ $bill_salse_info->what_not_yet_paid }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <h6>الخصم</h6>
                                <input type="number" name="edit_discount" style="text-align: center;color:#000"
                                    id="edit_discount" class="form-control form-control-sm" value="{{ $bill_salse_info->discount_amount }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h6>الإجمالي بعد الخصم</h6>
                            <input type="number" name="total_edit_after_desc" disabled
                                id="total_edit_after_desc" class="form-control form-control-sm" min="0"
                                style="color:#000;text-align:center">
                            <input type="hidden" name="total_edit_after_desc_h" id="total_edit_after_desc_h"
                                class="total_edit_after_desc_h" value="{{ $bill_salse_info->des }}">
                        </div>

                      
                        	
                        	
                 
                       
                    </div>

                    <div class="form-group">
                        <h6>
                            ملاحظات على الفاتورة
                        </h6>
                        <input type="text" name="" id=""
                            style="background: rgb(46, 46, 10);color:#fff" class="form-control form-control-sm"
                            value="لا توجد ملاحظـــــــــات على الفاتــــــورة">
                    </div>
                </div>


                <div align="center">
                    <button type="submit" class="btn btn-primary btn-sm" id="order_print_edit_bill"
                        style="margin-bottom:10px;margin-right:10px;">
                        إعتمـــاد الفاتــــــورة
                        <i class="fa fa-check"></i>
                    </button>
                </div>
                <button type="button" id="cloose" class="btn btn-danger btn-sm"
                    style="margin-right:550px;margin-bottom:10px;" data-dismiss="modal">إغلاق</button>
            </div>

        </div>
    </div>

</div>
