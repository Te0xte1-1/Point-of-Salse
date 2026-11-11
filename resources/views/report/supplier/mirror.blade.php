@extends('layouts.header')
@section('title')
    Print Invoice Salse A6
@endsection
<style>
    body {
        direction: rtl;
        border: 1px dotted #EEE;

    }

    th,
    td {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center !important;
    }

    .get_total {
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: brown;
        font-weight: bold;
        font-size: 20px;
    }

    .invoice-col {
        margin-left: 10px !important;
        border: dashed 1px #000000;
    }

    #foot_hide {
        display: none;
    }

    @media print {
        #foot_hide {
            display: block;

        }

        #prin {
            display: none;
        }

        h6 {
            padding: 20px;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center">
                        <i class="fa fa-globe text-center"></i>
                        للحلول التقنية المتكاملة
                        [ IP-Magix ]
                        شركة
                    </h6>

                </div>
            </div>
            <div class="col-sm-12 invoice-co text-right">
                <b>رقم الفاتــــــورة / </b>
                <br>
                <b>التـــاريخ/ 2/10/2014</b>
                <br>
                4F3S8J
                <b>/ رقم الطلب</b>
                <br>
                <b>تاريخ السداد /</b> 2/22/2014<br>
                <b>رقم حساب العميل /</b> 968-34567
                <br>
                <br>
                <button class="btn btn-primary btn-sm" onclick="window.print();" id="prin">طباعه</button>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="up_head text-center">
    <span>اسم البائع : </span>
    <span>زمن الفاتــــــورة : </span>
    <span>رقم الوردية : </span>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <br>
                    <h4 class="text-center">البيانات الرئيسية لكشف الحساب</h4>
                    <br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td>رقم الحساب المالي</td>
                                    <td width="75%">{{ $get_supplier_account_number->account_number }}</td>
                                </tr>
                                <tr>
                                    <td>اسم صاحب الحساب المالي</td>
                                    <td width="75%">{{ $get_supplier_account_number->name }}</td>
                                </tr>
                                <tr>
                                    <td>رصيد أول المدة الإفتتاحي للمورد</td>
                                    <td width="75%">{{ $get_supplier_start_balance->start_balance }}</td>
                                </tr>
                                <tr>
                                    <td>المشتريات</td>
                                    <td width="75%">{{ $get_supplier_pure_orders }}</td>
                                </tr>
                                <tr>
                                    <td>مرتجع المشتريات</td>
                                    <td width="75%">{{ $get_supplier_pure_orders }}</td>
                                </tr>
                                <tr>
                                    <td>اجمالي صرف النقدية</td>
                                    <td width="75%">{{ $get_supplier_pure_money }}</td>
                                </tr>
                                <tr>
                                    <td>اجمالي تحصيل النقدية من المورد</td>
                                    <td width="75%">{{ $get_supplier_pure_money }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h4 class="text-center">تفاصيل كشف الحساب</h4>
                    <br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>المنتجات</th>
                                    <th>الكمية</th>
                                    <th>سعر الوحدة</th>
                                    <th>اجمالي الصنف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>56</td>
                                    <td>56</td>
                                    <td>56</td>
                                    <td>56</td>
                                <tr>
                                    <td colspan="5" class="get_total">إجمالي الفاتورة
                                        (5,0000.00)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <span class="text-center" style="position: fixed;bottom:50px;left:480px;" id="foot_hide">
                        شكرا لزيارتكم الجميلة
                    </span>
                    <span style="position:fixed;bottom:50px;left:30px;" id="foot_hide">0114700220</span>
                    <span style="position:fixed;bottom:50px;right:30px;" id="foot_hide">0114700220</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/Adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // window.print();
        // window.onprint(function(){
        //     alert("printed");
        // });

    });
</script>
