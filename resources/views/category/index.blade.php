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
                        <h6 class="text-center">
                            {{ __('أقسام الأصناف') }}
                        </h6>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <div style="display: flex;justify-content:space-between">
                                    <a href="#" class="btn btn-primary btn-sm" style="margin-left:400px;" data-toggle="modal"
                                        data-target="#modal-default">
                                        إضافة قسم جديد
                                </a>
                                <button class="btn btn-danger btn-sm" style="display:none;margin-right:400px;" id="delete_all">حذف المحدد</button>
                                    </div>    
                                <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">نافذة لإضافة البيانات الجديدة</h6>
                                                    <span aria-hidden="true">&times;</span>
                                                    <button type="button" class="close" style="float:left" data-dismiss="modal"
                                                        aria-label="اغلاق">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('Category.store') }}" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label >اسم القسم</label>
                                                                <input type="text" class="form-control form-control-sm" name="cat_name"
                                                                    id="cat_name" placeholder="أضف إسم القسم">
                                                            </div>
                                                          
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">تأكيد</button>
                                                            <button type="button" class="btn btn-default btn-sm"
                                                                data-dismiss="modal">إغلاق</button>
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
                                        <th><input type="checkbox" class="checkbox" name="all_check" id="all_check"></th>
                                        <th>
                                            رقم القسم</th>
                                        <th>
                                            اسم القسم</th>
                                       
                                        <th>
                                            حالة القسم</th>
                                        <th>
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" name="checkes[]" id="{{ $item->id }}" ></td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->cat_name }}</td>
                                           
                                            <td> @if (($item->status)==1)
                                                الحساب مفعل
                                                @else
                                                الحساب ليس مفعل
                                            @endif </td>
                                            <td>
                                                <a href="{{route('Category.edit',$item->id )}}"><i class="fa fa-edit"></i></a>
                                                
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
 <!-- jQuery -->
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 
 <script>
    
    $(document).ready(function(){
    
        $('#all_check').click(function(){
           
           if (this.checked) {
            $('.checkbox').each(function(){
                this.checked= true;
                $('#delete_all').css('display','block');
            });
           } else {
            $('.checkbox').each(function(){
                this.checked= false;
                $('#delete_all').css('display','none');
            });
           } 
          
        });
      
        $('#delete_all').click(function(){
        
            $(this).confirm("are you shure");
        });
    });
 </script>
