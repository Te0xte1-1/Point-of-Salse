@extends('layouts.app')

@section('content')
    <style>
     
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
                        <p class="text-center">إضافة مورد جديد</p>
                    </div>
                    <div class="card-body">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="{{ route('Suppliers.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم الحساب</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$data}}" disabled class="form-control form-control-sm"
                                                name="acc_numb" id="acc_numb">
                                                <input type="hidden" value="{{$data}}"  class="form-control form-control-sm"
                                                 name="acc_number" id="acc_number">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم المورد</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" required name="acc_name"
                                                id="acc_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >نوع الحساب</label>
                                            <select name="acc_type" class="form-control form-control-sm" id="acc_type">
                                                <option value="2">مورد</option>
                                             

                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>عنوان سكن المورد</label>
                                            <input type="text" class="form-control form-control-sm" required name="address"
                                                id="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ايميل المورد</label>
                                            <input type="email" class="form-control form-control-sm" required name="email"
                                                id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>صورة المورد</label>
                                            <input type="file" class="form-control form-control-sm"  name="pic"
                                                id="pic">
                                        </div>
                                  </div>

                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="form-control btn-success" value="حفظ البيانات">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
