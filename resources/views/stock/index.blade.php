@extends('layouts.app')

@section('title')
    Stock
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('المخازن') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a href="#" class="btn btn-primary btn-sm" style="margin-left:370px;"
                                        data-toggle="modal" data-target="#modal-default">
                                        إضافة مخزن جديد
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
                                                    <form action="{{ route('Stock.store') }}" method="POST">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label >اسم المخزن</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="stock_name" id="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label >مكان المخزن</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="stock_desc" id="">
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
                            <table id="dataTable" class="table table-bordered table-striped "
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>
                                            اسم المخزن</th>
                                       
                                        <th>عدد الأصــنــاف في المخزن</th>
                                        <th> مراجعه الأصــنــاف داخل المخزن</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Stocks as $item)
                                        <tr>

                                            <td>
                                                {{ $item->stock_name }}
                                            </td>
                                            <td>
                                                {{ $item->total_items_on_stock }}
                                            </td>
                                            <td>
                                                <a href="{{ route('Stock.Show', $item->id) }}"class="btn btn-info btn-sm"><i
                                                        class="fa fa-tv"></i></a>
                                                <a href="#" class="btn btn-success btn-sm" id="stock_edit"
                                                    data-id="{{ $item->id }}"><i
                                                    class="fa fa-edit"></i></a>
                                            </td>
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
        <div class="modal fade" id="modal-default-edit">
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

        $(document).on('click', '#stock_edit', (function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('Stock.stock_modal') }}",
                data: {
                    id: id
                },
                success: function(data) {
// alert(data);
                    $('#modal-default-edit').modal('show');
                    $('#modal-edit-body').html(data);
                }
            });

        }));
    });
</script>
