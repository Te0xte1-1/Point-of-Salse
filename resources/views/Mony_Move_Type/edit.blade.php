@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Cat') }}">الحركات النقدية</a></li>
            <li class="breadcrumb-item active">تعديل</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <!-- /.card-header -->
                    <div class="card-header text-right"><h4 class="text-center">
                        {{ __('تعديل بيانات الحركات النقدية') }}</div>
                        </h4>
                    <div class="card-body ">
                        <div class="card-header text-right">
                            <h3 class="text-right"> 
                                تعديل بيانات
                                حركة نقدية
                                رقم (
                                {{ $edit_data->id }})
                            </h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('Mony_Type_Move.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="{{ $edit_data->mony_move_type }}"
                                                name="move_name" placeholder=" الحركات النقدية">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" value="{{ $edit_data->screen_show }}"
                                                name="screen_show" placeholder=" الحركات النقدية">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control form-control-sm" name="status" placeholder=" حالة الحساب ">
                                                <option value="1">مفعل</option>
                                                <option value="0">متوقف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-footer">
                                    <div align="center">
                                    <button type="submit" class="btn btn-primary btn-sm">تعديل البيانات <i class="fa fa-check"></i></button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
