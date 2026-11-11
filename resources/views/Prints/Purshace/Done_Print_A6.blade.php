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
                <td>التـــاريخ {{ $purshace->order_date }}</td>
            </tr>
            <tr>
                <td>رقم الفاتــــــورة {{ $purshace->auto_serial }}</td>
            </tr>
            <tr>
                <td>رقم الوردية {{ 1 }}</td>
            </tr>
            <tr>
                <td>اسم البائع
                    @if ($purshace->supplier_id == 404)
                        ( عميل سفري )
                    @else
                        ( {{ $purshace->customer_name }} )
                    @endif

                    
                </td>
            </tr>
            <tr>
                <td>رقم حساب العميل {{ $purshace->account_number }}</td>
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

        @foreach ($purshace_data as $item)
            <tr>
        
                <td>{{ $item->category_name }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->item_qty }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->total_price }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" class="get_total" style="background-color:#ddd;">إجمالي الفاتورة
                ({{ $purshace->total_cost }})</td>
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
                @if ($purshace->order_pay_type == 1)
                    كاش
                @elseif($purshace->order_pay_type == 2)
                    أجل
                @else
                    جزء كاش وجزء أجل
                @endif

            </td>
            <td>{{ $purshace->what_paid }}</td>
            <td>{{ $purshace->what_remain }}</td>
            <td>{{ $purshace->discount_amount }}</td>
            <td>{{ $purshace->total_cost }}</td>
        </tr>
        
    </table>


</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // var pr = window.print();
        // if (pr) {
        //     window.location = "(route('Pro'))";
        // } else {
        //     window.location = "http://market.local/Salse";

        // }

    });
</script>
