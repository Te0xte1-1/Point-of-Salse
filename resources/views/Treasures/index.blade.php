@extends('layouts.app')

@section('title')
    الخزن
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('بيانات جميع الخزن') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group flex-wrap">
                              
                                <a href="#" class="btn btn-primary btn-sm" style="margin-left:370px;"
                                    data-toggle="modal" data-target="#modal-default">
                                    إضافة خزنة جديد
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
                                                <form action="{{ route('Treasures.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>اسم الخزنة</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="treasures_name" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>الرقم التسلسلي للخزنة</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="treasures_serial" id="">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default btn-sm"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
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
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th>اسم الخزينة</th>
                                    <th>هل الخزينة رئيسية</th>
                                    <th>أخر إيصال صرف</th>
                                    <th>أخر إيصال تحصيل</th>
                                    <th>حالة تفعيل الخزينة</th>
                                    <th>إجمالي المبلغ</th>
                                    <th>اكشن</th>
                                </thead>
                                <tbody>
                                    @foreach ($treasures as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->treasures_name }}</td>
                                            <td>
                                                @if ($item->is_master == 1)
                                                    خزنة رئيسية
                                                @else
                                                    خزنة فرعية
                                                @endif
                                            </td>
                                            <td>{{ $item->last_isal_exchange }}</td>
                                            <td>{{ $item->last_isal_collect }}</td>
                                            <td>
                                                @if ($item->active == 1)
                                                    الخزنة مفعله
                                                @else
                                                    الخزنة غير مفعله
                                                @endif
                                            </td>
                                            <td>{{ $item->money }}</td>
                                            <td><a href="{{ route('Treasures.edit', $item->id) }}"><i
                                                        class="fa fa-edit"></i></a></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', '#supplier_edit', (function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('Product.product_modal') }}",
                data: {
                    id: id
                },
                success: function(data) {

                    $('#unit_date').show();
                }
            });
            alert(id);

        }));

        $('#supplier_delete').click(function() {

            var id = $(this).data('id');
            $(this).confirm("are you shure");
        });
    });
</script>
