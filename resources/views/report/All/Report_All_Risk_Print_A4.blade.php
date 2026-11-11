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

    th {
        font-size: 16px;
        font-weight: bold;
    }

    .get_total {
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: brown;
        font-weight: bold;
        font-size: 20px;
    }

    .right_table,
    .up_head {
        display: flex;
        justify-content: space-between
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <h4 class="text-center">طباعة الفاتــــــورة</h4>
            <div class="table-responsive">
                <div class="right_table">

                    <table>
                        <tr>
                            <td>التـــاريخ {{ $salse->date }}</td>
                        </tr>
                        <tr>
                            <td>رقم الفاتــــــورة {{ $salse->serial }}</td>
                        </tr>
                        <tr>
                            <td>رقم الوردية {{ 1 }}</td>
                        </tr>
                        <tr>
                            <td>اسم العميل
                                @if ($salse->customer_id == 404)
                                    ( عميل سفري )
                                @else
                                    ( {{ $salse->customer_name }} )
                                @endif


                            </td>
                        </tr>
                        <tr>
                            <td>رقم حساب العميل {{ $salse->account_number }}</td>
                        </tr>
                    </table>
                    <table style="margin-top: -36px;margin-left:100px;font-weight:bold">
                        <tr>
                            <td>
                                شركة
                                <br>
                                [ IP-Magix ]
                                <br>
                                للحلول التقنية
                                المتكاملة
                                <br>
                            </td>
                        </tr>
                    </table>
                    <img src="{{ asset('images/products/17083351203468.png') }}" width="100" height="100" alt="">
                </div>

            </div>
            <hr>
            <div class="up_head text-center">
                <span>زمن الفاتــــــورة : 20-10:10 PM</span>
                <span style="margin-left:100px;">اسم البائع : Administraion </span>
                <span>رقم الوردية : 125</span>
            </div>

            <hr><br><br>
            <table dir="rtl" border="1"
                style="width: 98%;margin-bottom:35px;text-align:center; border:1px solid #ddd4d4 !important"cellcpacing="0"
                cellpadding="1">

                <head style="font-weight:bold;font-size:16px">
                    <tr>
                        <th colspan="5"style="background-color:#9d8d8dd9; font-weight:bold">تفاصيل
                            الأصناف
                        </th>
                    </tr>
                    <tr>
                        <th>اسم القسم</th>
                        <th>اسم الصنف</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>اجمالي الصنف</th>
                    </tr>
                </head>
                <tbody>

                    @foreach ($salse_data as $item)
                        <tr>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="background-color:#ddd;">إجمالي الفاتورة
                            ({{ $salse->total }}) جنية فقط لا غير</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <br>
            <div class="table-responsive">
                <table dir="rtl" border="1"
                    style="width: 98%;margin:0 auto;float: right;text-align:center; border:1px solid #ddd4d4"cellcpacing="0"
                    cellpadding="1">
                    <tr>
                        <th colspan="5" style="background-color:#ddd;">التفاصيل المالية</th>
                    </tr>
                    <tr>
                        <th>طريقة السداد </th>
                        <th>المدفوع من الفاتــــــورة</th>
                        <th> المتبقي من الفاتــــــورة</th>
                        <th>اجمالي الخصم </th>
                        <th>اجمالي قيمة الفاتــــــورة </th>
                    </tr>
                    <tr>
                        <td>
                            @if ($salse->pay_type == 1)
                                كاش
                            @elseif($salse->pay_type == 2)
                                أجل
                            @else
                                جزء كاش وجزء أجل
                            @endif

                        </td>
                        <td>{{ $salse->what_paid }}</td>
                        <td>{{ $salse->what_not_yet_paid }}</td>
                        <td>{{ $salse->discount_amount }}</td>
                        <td>{{ $salse->total }}</td>
                    </tr>

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

<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/Adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        window.print();

    });
</script>
