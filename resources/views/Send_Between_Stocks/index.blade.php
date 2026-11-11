@extends('layouts.app')

@section('title')
    الترحيل بين المخازن
@endsection
@section('content')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }h6{
            text-align: center;
            font-size: 14px;
        }
    </style>
    <div class="container-fluid">
       
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('الترحيل بين المخازن') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h6>المخزن المرحل</h6>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach ($Stocks as $item)
                                            <option value="{{ $item->id }}">{{ $item->stock_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h6>الصنف المراد ترحيله</h6>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->stock_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h6>الكمية المتوفرة في المخزن</h6>
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" name="" id="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>المخزن الذي سيستلم البضاعه</h6>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach ($Stocks as $item)
                                            <option value="{{ $item->id }}">{{ $item->stock_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>الكمية المراد ترحيلها</h6>
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h4 class="text-center">تفاصيل البـيـــــان </h4>
                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" style="background:lightyellow" class="form-control form-control-sm" name=""
                                    id="">
                            </div>
                            <div align="center">

                                <button class="btn btn-success btn-sm" style="background: #0f2e55; color:#fff; font-family:Arial, Helvetica, sans-serif"> ترحيل البضاعه</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->



            </div>
        </div>
    </div>
    </div>
@endsection
