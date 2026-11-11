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

                            {{ __('أنواع الحسابات المالية') }}</div>
                        </h4>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table id="dataTable" class="table table-bordered table-hover " aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>اسم الحساب المالي</th>
                                        <th> حالة الحساب المالي</th>
                                        <th> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mony_acconunt_type as $item)
                                        <tr>
                                            <td>
                                                {{ $item->account_name }}
                                            </td>
                                            <td>
                                               @if (($item->status)==1)
                                                   الحساب مفعل
                                                   @else
                                                   الحساب ليس مفعل
                                               @endif 
                                            </td>
                                            <td>
                                                <a href="{{ route('accounts_type.edit', $item->id) }}" id="cat_edit"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                                <div class="form-group">
                                                    <label >اسم الحساب المالي</label>
                                                    {{-- <input type="text" value="{{ $item->cat_name }}"
                                                        class="form-control form-control-sm" name="cat_name" id=""> --}}
                                                </div>
                                                
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
