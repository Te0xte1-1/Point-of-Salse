@extends('layouts.app')

@section('title')
    Stock
@endsection
@section('content')
    <style>
        .show_products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: 1px !important;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: 0.5rem;
            position: relative;
            width: 100%;
        }
    </style>
    <div class="container-fluid">
      
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            عرض الأصناف في المخزن رقم
                            (المعرض)
                            <a class="text-left" title="رجوع لصفحة المخازن" href="{{ route('Stock') }}" class="text-left">
                                رجوع للمخازن
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </h4>
                        <br>
                        <select name=""  class="form-control form-control-sm" id="">
                            <option value="">اختر القسم</option>
                        </select>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a title="رجوع لصفحة المخازن" href="{{ route('Stock') }}" class="text-left">
                                        رجوع للمخازن
                                        <i class="fa fa-arrow-left"></i>
                                    </a>


                                </div>
                            </div>

                        </div> --}}
                        {{-- <hr> --}}

                        <div class="show_products">
                            @foreach ($data as $item)
                                <div class="col-md-12 col-sm-6 ">
                                    <div class="info-box">
                                        <img class="info-box-icon bg-success" src="{{ asset('images/' . $item->photo) }}"width="100" height="70" alt="" srcset="">
                                        <div class="info-box-content">
                                            <span class="info-box-text">Product Name : <b> {{$item->product_name}} </b></span>
                                            <span class="info-box-number">Price : <i class="fa fa-dollar-sign"></i> <b>{{$item->price}}</b></span>
                                            <span class="info-box-text">Product Risk : <b> {{$item->risk}} </b></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->


                    {{-- Cat Edit Modal  --}}
                    <div class="modal fade" id="modal-cat_edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">تعديل البيانات</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{ route('Stock.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">إغلاق</button>
                                                <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Cat Edit Modal  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
