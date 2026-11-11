@extends('layouts.app')
@section('title')
   المستخدمين
@endsection
@section('content')
    <style>
        th,
        td {
            text-align: center;
        }

        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

        h2 {
            text-align: center !important;
        }
    </style>

    <div class="container-fluid">

        <div class="card card-primary card-outline">
            <div class="card-header text-right">
                <h2>
                   الصلاحيات الخاصة
                    <i class="fas fa-edit"></i>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header text-right">
                                <h5 class="text-center">
                                    الطلبات
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-stripped table-hover">
                                    <thead class="table table-success">
                                        <th>#</th>
                                        <th>رقم الفاتورة</th>
                                        <th>تاريخ الفاتورة</th>
                                        <th>قيمة الفاتورة</th>
                                        <th>اسم صاحب الفاتورة</th>
                                        <th>اعتماد الفاتـــورة</th>
                                        
                                    </thead>
                                    <tbody>
                                        <td>1</td>
                                        <td>12542</td>
                                        <td>2022-01-22</td>
                                        <td>17,000</td>
                                        <td>مصنع المدينة للإمدادات الطبية</td>
                                        <td> <a href="#" title="اعتماد الفاتورة" class="btn btn-info btn-sm">
                                                إعتمـاد الفاتـــورة
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                      
                                    </tbody>
                                </table>


                           
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-info card-outline">
                            <div class="card-header text-right">
                                <h5 class="text-center">
                                    عرض المنتجات في الطلب
                                </h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="dataTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>الصنف</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Toshipa</td>
                                            <td>1</td>
                                            <td>105</td>
                                        </tr>
                                        <tr>
                                            <td>Toshipa</td>
                                            <td>1</td>
                                            <td>105</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h4 class="text-right">المجموع</h4>
                                <h5 class="text-left">20,000.00</h5>
                                <hr>
                                <div class="col-sm-12">
                                    <button type="button" style="margin-left:100px" value=""
                                        class="btn btn-outline-primary">
                                        طـباعه الفـــاتورة
                                        <i class="fa fa-print"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card -->
            </div>
        </div>


        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/Adminlte.min.js') }}"></script>

    @endsection
