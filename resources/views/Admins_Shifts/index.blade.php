@extends('layouts.app')

@section('title')
    Admins
@endsection
@section('content')
    <div class="container-fluid">
      
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h6 class="text-center">
                            {{ __('بيانات شفتات الخزن للمستخدمين') }}
                            <i class="fa fa-user"></i>
                        </h6>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                    
                            <div class="col-sm-12 col-md-6">
                                <div class="card card-info card-outline">
                                    <div class="card-header text-right">
                                        <h4 class="text-center">
                                            {{ __(' بيانات الشفت المفتوح حاليا') }}
                                        </h4>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- form start -->
                                        <form action="{{ route('Admins_Shifts.close_shift') }}" method="POST">
                                            <div class="row">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="data-shift-opened">
                                                            @if (@isset($shift_data) && !@empty($shift_data))
                                                                @if ($shift_data->admin_id == 1 and $shift_data->is_finished == 1)
                                                                    <label >لا يوجد شفت فاتح يمكنك بدأ شفت
                                                                        جديد</label>
                                                                @else
                                                                    <h6 >اسم المستخدم
                                                                        <span style="font-size: 14px;color:blue"> (
                                                                            {{ $shift_data->admin_id }} )</span>
                                                                    </h6>
                                                                    <h6>الخزنةالمستخدمة في الشفت
                                                                        <span style="font-size: 14px;color:blue">(
                                                                            {{ $shift_data->treasures_id }} )</span>
                                                                    </h6>
                                                                    <h6>تاريخ بدايةالشفت
                                                                        <span style="font-size: 14px;color:blue">(
                                                                            {{ $shift_data->started_date }} )</span>
                                                                    </h6>
                                                                    <input type="submit"
                                                                        class="form-control btn-info btn-sm"
                                                                        value="إقفال الشفت الحالي">
                                                                @endif
                                                            @else
                                                                لا توجد داتا
                                                            @endif



                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover table-stripped">
                                    <thead>
                                        <th>كود الشفت</th>
                                        <th>اسم المستخدم</th>
                                        <th>اسم الخزنة</th>
                                        <th>وقت فتح الشفت</th>
                                        <th>حاله الشفت</th>
                                        <th>حاله مراجعه الشفت</th>
                                        <th>اكشن</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins_shift as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->admin_id }}</td>
                                                <td>{{ $item->treasures_id }}</td>
                                                <td>{{ $item->started_date }}</td>
                                                <td>{{ $item->is_finished }}</td>
                                                <td>{{ $item->is_delevered_and_reviewed }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-success btn-sm">طباعة الكشف</a>
                                                    <a href="#" class="btn btn-danger btn-sm">كشف مختصر</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
            </div>
        </div>
    </div>
@endsection
