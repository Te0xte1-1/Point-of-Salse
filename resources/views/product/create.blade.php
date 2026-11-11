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
                            {{ __('الأصــنــاف') }}
                            <i class="fa fa-flag"></i>
                        </h4>
                        {{-- <div class="card-header text-right"> --}}
                        <p class="text-right">إضافة صنف جديد
                        </p>
                        <a title="رجوع لصفحة المشتريات" href="{{ route('Pro') }}" class="text-left">
                            رجوع لقائمة الأصــنــاف
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        {{-- </div> --}}
                    </div>
                    <div class="card-body">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>القسم</label>
                                            <select name="category_id" class="form-control form-control-sm"required id="">
                                                <option value=""></option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">
                                                        {{ $cat->cat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>اسم الصنف</label>
                                            <input type="text" class="form-control form-control-sm" required
                                                name="product_name" id="">

                                                <input type="hidden" name="note" id="note" value="إضافة صنف">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>سعر الشراء</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                class="form-control form-control-sm"  name="purshace_Price"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>سعر البيع</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                class="form-control form-control-sm" required name="Price" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>الكمية المراد إضافتها
                                                الى المخزن</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                class="form-control form-control-sm" required name="stock" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>المخازن</label>
                                            <select name="stock_id" class="form-control form-control-sm" required id="">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($Stocks as $stock)
                                                    <option @if ($i == 1) selected @endif
                                                        value="{{ $stock->id }}">
                                                        {{ $stock->stock_name }}</option>
                                                        @php $i++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>حد الصرف</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                                class="form-control form-control-sm" name="risk" id="">
                                            </div>
                                    </div>
                                </div>
                                <div class="photo" align="center">
                                    <div class="form-group">
                                        <label>صورة الصنف</label>
                                        <br>
                                        <input type="file" name="photo" id="photo_pro" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="form-control btn-success" value="حفظ البيانات">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
