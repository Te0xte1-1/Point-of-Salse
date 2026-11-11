@extends('layouts.app')

@section('title')
    الحركات النقدية
@endsection
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">

            <li class="breadcrumb-item active">الحسابات و النقدية</li>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('Mony_Type_Move') }}">الحركات النقدية</a></li>
        </ol>
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">{{ __('الحركات النقدية') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped "
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>
                                                اسم الحركة النقدية</th>
                                            <th>
                                                وصف الحركة النقدية</th>
                                            <th>
                                                حالة الحساب</th>
                                            <th>
                                                Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mony_move_type as $item)
                                            <tr>
                                                <td>{{ $item->mony_move_type }}</td>
                                                <td>{{ $item->screen_show }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        مفعل
                                                    @else
                                                        الحساب متوقف
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('Mony_Type_Move.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
