@extends('layouts.app')

@section('title')
    Unit
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">

                            {{ __('الوحدات وقياسات البيع') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a href="#" class="btn btn-primary btn-sm" style="margin-left:370px;"
                                        data-toggle="modal" data-target="#modal-default">
                                        إضافة وحدة جديد
                                    </a>


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
                                                    <form action="{{ route('Unit.store') }}" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label >اسم الوحدة</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="unit_name" id=""
                                                                   >
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
                            <table id="dataTable" class="table table-bordered table-striped "
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>
                                            اسم الوحده</th>
                                      
                                        <th>
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Units as $item)
                                        <tr>

                                            <td>
                                                {{ $item->unit_name }}
                                            </td>
                                          
                                            <td><a href="#" class="btn btn-info btn-sm" id="unit_edit"
                                                    data-id="{{ $item->id }}">Edit</a>
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
        <div class="modal fade" id="modal-default-xl">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">تعديل البيانات</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-edit-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', '#unit_edit', (function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('Unit.unit_modal') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modal-default-xl').modal('show');
                    $('#modal-edit-body').html(data);
                }
            });

        }));

        $('#unit_delete').click(function() {

            var id = $(this).data('id');
            $(this).confirm("are you shure");
        });
    });
</script>
