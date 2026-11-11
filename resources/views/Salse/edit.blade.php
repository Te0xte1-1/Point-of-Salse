@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header ">
                        <b>
                            <h5 class="text-center">تعديل فاتورة مبيعات</h5>

                            <hr>


                        </b>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            {{-- <form action="http://pos.local/Purshace/store" method="post"> --}}
                            <input type="hidden" name="_token" value="x8wS8Ymxan8ZrT0QaMNNo1jOHEbHAJrHoatwGqtJ">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>
                                            <i class="far fa-calendar-alt"></i>
                                            التـــاريخ
                                        </h6>

                                        <input type="date" name="date" value="{{ $bill_salse_info->date }}"
                                            class="form-control form-control-sm" id="date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        بيانات العميل
                                        <i class="fa fa-user"></i></h6>
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $bill_salse_info->account_number }}" name="" id="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>رقم الفاتورة <i class="fa fa-barcode"></i></h6>
                                        <input type="text" value="{{ $bill_salse_info->serial }}" name="serial" disabled
                                            style="background:lightyellow;color:#000;text-align:center"
                                            class="form-control form-control-sm" id="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>نوع الفاتورة <i class="fa fa-barcode"></i></h6>

                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $bill_salse_info->account_number }}" name="" id="">
                                    </div>
                                </div>

                            </div>
                            <hr style="border:1px solid #ddff00">
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

                                        </tr>
                                    </thead>
                                    <tbody id="tboody">
                                        @foreach ($bill_salse_detailse as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->store }}</td>
                                                <td>{{ $item->category_id }}</td>
                                                <td>{{ $item->product_id }}</td>
                                                <td>{{ $item->unit_id }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <hr style="border:1px solid #ddff00">
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>
                                                إجمالي الأصناف
                                            </h6>
                                            <input type="text" name="total_items" value="{{ $bill_salse_info->date }}" id="total_item_count"
                                                class="form-control form-control-sm" disabled min="0" value="0"
                                                style="color:#000;text-align:center">
                                        </div>
                                        <div class="form-group">
                                            <h6>
                                                طريقة الدفع
                                            </h6>
                                            <select name="pay_type" value="{{ $bill_salse_info->pay_type }}" id="pay_type" class="form-control form-control-sm">
                                                <option value="0">اختر طريقة الدفع</option>
                                                <option value="1">بيع كاش</option>
                                                <option value="2">بيع أجل</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>
                                                الإجمالي النهائي
                                            </h6>
                                            <input type="text" value="{{ $bill_salse_info->total }}" name="last_total" value="0"
                                                style="text-align: center;color:#000" id="total-invoice"
                                                class="form-control form-control-sm" disabled>
                                            <input type="hidden" name="last_total" id="" class="total-invoice">
                                        </div>
                                        <div class="form-group">
                                            <h6>
                                                المبلغ المسدد
                                            </h6>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ $bill_salse_info->what_paid }}" name="what_paid" id="what_paid" value="0"
                                                style="text-align: center;color:#000" class="form-control form-control-sm">
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>
                                                خزنة التحصيل
                                            </h6>
                                            <select name="treasures_id" id="treasures_id" value="{{ $bill_salse_info->date }}"
                                                class="form-control form-control-sm">
                                                <option value="0">اختر الخزنة</option>
                                                <option value="1">الخزنة الرئيسية</option>
                                                <option value="2">الخزنة الفرعيه</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h6>
                                                المبلغ المتبقي تحصيلة
                                            </h6>
                                            <input type="text" value="0" value="{{ $bill_salse_info->what_not_yet_paid }}" style="text-align: center;color:#000;"
                                                name="what_not_yet_paid" id="what_not_yet_paid"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header text-right">
                                                <h3 class="text-center">التفاصيل المالية للفاتورة</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table id="dataTable" class="table">
                                                        <tbody>

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
                                                            <td style="text-align:  center;background:#000;color:#fff;">
                                                                <span id="total-price" style="font-size: 20px">
                                                                    {{ $bill_salse_info->total }}
                                                                </span>
                                                            </td>

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
                               
                                <div align="center" class="from-group">
                                    <a href="#" id="toastsDefaultSuccess" class="btn btn-warning btn-sm">طباعة
                                        الفاتورة
                                        <i class="fa fa-print"></i></a>
                                    <a href="{{ route('Salse') }}" class="btn btn-primary btn-sm">
                                        رجوع لفواتير المبيعات
                                        <i class="fa fa-rowo"></i></a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
