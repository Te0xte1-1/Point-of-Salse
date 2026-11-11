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
                            {{ __('استلام خزنة لشفت جديد') }}
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="{{ route('Admins_Shifts.store') }}" method="POST">
                                <div class="row">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label >بيانات الخزن المضافة لصلاحياتي</label>
                                            <select name="treasures_id" class="form-control form-control-sm" id="treasures_id">
                                                <option value="">من فضلك قم بإختيار الخزنة لبدء الشفت</option>
                                                @foreach ($treasures as $item)
                                                <option value="{{$item->id}}">{{$item->treasures_name}}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="form-control btn-success btn-sm" value="بدأ الشفت">
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
