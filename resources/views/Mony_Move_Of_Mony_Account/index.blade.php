@extends('layouts.app')

@section('title')
    Category
@endsection
@section('content')
    <div class="container-fluid">
        
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header text-right">{{ __('Category') }}</div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default">
                                        اضافه قسم جديد
                                    </button>

                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">نافذة لإضافة البيانات الجديدة</h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="اغلاق">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('Category.store') }}" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label >Category Name</label>
                                                                <input type="text" class="form-control form-control-sm" name="cat_name"
                                                                    id="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label >Category Description</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="cat_description" id="">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default btn-sm"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">تأكيد</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped " aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>
                                            اسم القسم</th>
                                     
                                        <th >
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>

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
