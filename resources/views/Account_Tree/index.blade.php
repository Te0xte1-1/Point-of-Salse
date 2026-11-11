@extends('layouts.app')

@section('title')
    Category
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">

                            {{ __('جميع الحسابات المالية') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('Accounts.create') }}" class=" btn btn-outline-primary btn-sm"
                                style="margin-right: 15px">
                                اضافه حساب مالي
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-stripped table-hover">
                                    <thead class="table table-secondary">
                                        <th>
                                            اسم الحساب</th>
                                        <th>
                                            نوع الحساب</th>
                                        <th>هل الحساب أب</th>
                                        <th>
                                            رقم الحساب المالي</th>
                                        <th>
                                            حالة رصيد الحساب أول المدة</th>
                                        <th>
                                            عرض تفاصيل الحساب</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->account_type_name }}</td>
                                                <td>
                                                    @if ($item->is_parent == 1)
                                                        نعم الحساب أب
                                                    @else
                                                        لا
                                                    @endif
                                                </td>
                                                <td>{{ $item->account_number }}</td>
                                                <td>
                                                    @if ($item->start_balance_status == 1)
                                                        دائن
                                                    @elseif($item->start_balance_status == 2)
                                                        مدين
                                                    @elseif($item->start_balance_status == 3)
                                                        متزن
                                                    @else
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('Accounts.show', $item->id) }}"><i
                                                            class="fa fa-info"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                        <form action="{{ route('Category.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary"
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
