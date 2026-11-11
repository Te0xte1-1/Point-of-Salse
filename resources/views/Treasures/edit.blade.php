@extends('layouts.app')

@section('content')
    <style>
        th,
        td {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

        h2,
        h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center !important;
        }

        label {
            float: right !important;
            margin-right: 15px;
        }
    </style>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('العمليات على الخزينة') }}
                            <i class="fa fa-tree"></i>
                        </h4>

                    </div>
                    <div class="card-body">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table dir="rtl" border="1"
                                style="width: 98%;margin-bottom:35px;float: right;text-align:center; border:1px solie #000"cellcpacing="0"
                                cellpadding="1">
                                <thead>
                                    <tr>
                                        <td colspan="5"style="background-color:#939c9c;">تفاصيل الحركات المالية على
                                            الخزينة الرئيسية</td>
                                    </tr>

                                    <tr style="background-color:#ddd;">
                                        <td>رقم الحركة</td>
                                        <td>تاريخ الحركة</td>
                                        <td>نوع الحركة</td>
                                        <td>المبلغ</td>
                                        <td>مراجعه الحركة</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Treasures_trans as $item)
                                        <tr>

                                            <td>{{ $item->isal_number }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->move_type_name }}</td>
                                            <td>{{ $item->money }}</td>
                                            <td><a href="{{ route('Cat', $item->id) }}"></a><i class="fa fa-edit"></i></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
