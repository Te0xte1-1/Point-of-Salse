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
        {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Cat') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('Cat') }}">الــمـــوردون</a></li>
            <li class="breadcrumb-item active">إضافة مورد جديد</li>
        </ol> --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('العمــلاء') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-header text-right">
                            <p class="text-center">إضافة عميل جديد </p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="{{ route('Suppliers.store') }}" method="POST">
                                <div class="row">
                                    @csrf
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >كود الفاتورة</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                        <div class="form-group">
                                            <label >بحث بالعميل</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                        <div class="form-group">
                                            <label >بحث بفئة الفاتــــــورة</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_description"
                                               >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >بحث بنوع الفاتــــــورة</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                        <div class="form-group">
                                            <label >بحث بنوع الخصم</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_description"
                                               >
                                        </div>
                                        <div class="form-group">
                                            <label >بحث بالتاريخ من تاريخ</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >بحث بنوع الإعتماد</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                        <div class="form-group">
                                            <label >بحث</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_description"
                                               >
                                        </div>
                                        <div class="form-group">
                                            <label >بحث بالتاريخ إلى تاريخ</label>
                                            <input type="text" class="form-control form-control-sm" name="cat_name">
                                        </div>
                                    </div>
                                    <input type="submit" class="form-control btn-success btn-sm" value="بحث">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
