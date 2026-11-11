@extends('layouts.app')

@section('content')
    <style>
        th,
        td {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                            {{ __('المشتريات') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-header text-right">
                            <p class="text-center">تعديل فاتورة مشتريات </p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="store" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label >كود الفاتورة</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $get_bill_data->auto_serial }}" name="code_bill">
                                        </div>
                                        <div class="form-group">
                                            <label >الــمـــوردون</label>
                                            <select name="supplier_id" class="form-control form-control-sm" id="supplier_id">
                                                <option value="">--</option>
                                                @foreach ($supplier_id as $item)
                                                <option value="{{ $item->id }}">{{ $item->sup_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >طريقة الدفع</label>
                                            <select name="pay_type" id="pay_type" class="form-control form-control-sm">
                                                <option value="">--</option>
                                                @foreach ($pay_type as $item)
                                                <option value="{{ $item->id }}">{{ $item->pay_type_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >نوع الفاتــــــورة</label>
                                            <select name="bill_type" id="bill_type" class="form-control form-control-sm">
                                                <option value="{{ $bill_type->id }}">{{ $bill_type->bill_type_name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >بيانات المخازن</label>
                                            <select name="store_id" id="store_id" class="form-control form-control-sm">
                                                <option value="">--</option>
                                                @foreach ($store_id as $item)
                                                    <option  value="{{ $item->id }}">{{ $item->stock_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >الملاحظـــات</label>
                                            <input type="text" value="{{ $get_bill_data->note }}" class="form-control form-control-sm"
                                                name="note">
                                        </div>
                                    </div>
                                </div>
                                <div id="do" style="margin-left:450px;">
                                    <a href="{{ route('Purshace.add_items', $get_bill_data->id) }}" style="margin: 5px" id="close_bill" class="btn-danger btn-sm text-center"
                                        value="">
                                        <i class="fa fa-arrow-right"></i>
                                        رجــوع لبيانات الفاتــــــورة
                                    </a>
                                    <button type="submit" class="btn-success btn-sm" value="">تحديث الفاتــــــورة</button>
                                </div>
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
