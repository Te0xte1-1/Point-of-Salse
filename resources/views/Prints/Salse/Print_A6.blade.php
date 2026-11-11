<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    @media print {
        @page {
            size: 105mm 148mm;
        }

        td {
            font-size: 9px !important;
            text-align: center !important;
            font-weight: bold;

        }

        th {
            text-align: center !important;
        }

        table {
            margin-bottom: 20px auto !important;
        }

        .right_table {
            border: 1px solid #777 !important;
            font-size: 11px;
            width: 98%;
            margin-bottom: 10px;
            margin-left: 5px;

        }

        .right_table tr {

            float: right !important;
        }

    }
</style>

<body style="padding-top:1px;font-family:tahoma ;text-align:center;">

    <div class="right_table">
        <table style="margin-left: 35%;">
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
                <td>اسم البائع
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
    </div>

    <table dir="rtl" border="1"
        style="width: 98%;margin-bottom:35px;float: right;text-align:center; border:1px solie #000"cellcpacing="0"
        cellpadding="1">
        <tr>
            <td colspan="5"style="background-color:#ddd;">تفاصيل الأصناف</td>
        </tr>
        <tr>
            <td>اسم القسم</td>
            <td>اسم الصنف</td>
            <td>الكمية</td>
            <td>السعر</td>
            <td>اجمالي الصنف</td>
        </tr>

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
            <td colspan="5" class="get_total" style="background-color:#ddd;">إجمالي الفاتورة
                ({{ $salse->total }})</td>
        </tr>

    </table>
    <table dir="rtl" border="1"
        style="width: 98%;margin:0 auto;float: right;text-align:center; border:1px solie #000"cellcpacing="0"
        cellpadding="1">
        <tr>
            <td colspan="5" style="background-color:#ddd;">التفاصيل المالية</td>
        </tr>
        <tr>
            <td>طريقة السداد </td>
            <td>المدفوع من الفاتــــــورة</td>
            <td> المتبقي من الفاتــــــورة</td>
            <td>اجمالي الخصم </td>
            <td>اجمالي قيمة الفاتــــــورة </td>
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


</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var pr = window.print();
        if (pr) {
            window.location = "(route('Pro'))";
        } else {
            window.location = "http://market.local/Salse";

        }

    });
</script>
