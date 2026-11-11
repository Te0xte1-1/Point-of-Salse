@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">ضبط المخازن</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Cat') }}">الأقسام</a></li>
            <li class="breadcrumb-item active">تعديل</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <!-- /.card-header -->
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('تعديل بيانات القسم') }}
                    </div>
                    </h4>
                    <div class="card-body ">
                        <div class="card-header text-right">
                            <h3 class="text-right">
                                تعديل بيانات
                                القسم
                            </h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('Category.update', $edit_data->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control form-control-sm"
                                                value="{{ $edit_data->id }}" name="id">
                                            <label >اسم القسم</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $edit_data->cat_name }}" name="cat_name">
                                        </div>
                                    </div>
                                  
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >حالة القسم</label>
                                            <select class="form-control form-control-sm" name="status"
                                                placeholder=" حالة الحساب ">
                                                <option value="{{ $edit_data->status }}">مفعل</option>
                                                <option value="0">متوقف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-footer">
                                    <div align="center">
                                        <button type="submit" class="btn btn-primary btn-sm">تعديل البيانات <i
                                                class="fa fa-check"></i></button>
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
