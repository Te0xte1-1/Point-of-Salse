@extends('layouts.app')

@section('content')
    <style>
        th,
        td,label {
            text-align: center !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">{{ __('Preview Of Salse Invoices') }}</div>
                    <div class="card-body">

                        <form action="" method="get">
                            <div class="row">
                              
                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label >نوع الفاتورة</label>
                                        <select name="" id="" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label >طريقة الدفع</label>
                                        <select name="" id="" class="form-control form-control-sm">
                                            <option value=""></option>
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label >الى فترة</label>
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-3">
                                    <label >من فترة</label>
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>
                                <a href="Report" class=" form-control btn btn-success" style="margin-top:10px">تقرير كل الطلبات</a>
                            </div>

                        </form>
                        <hr>
                        <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Number OF Invoice</th>
                                    <th>Total OF Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
@endsection
