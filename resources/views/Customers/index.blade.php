@extends('layouts.app')

@section('title')
    Customers
@endsection
<style>
    .btn-group {
        direction: ltr;
    }

    .modal-body {
        padding: 1px 17px !important;
        max-height: 480px !important;
    }
</style>
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">

                            {{ __('الــعمـــلاء') }}
                        </h4>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            
                                <a href="{{ route('Finance_customers_mirror.index') }}" class="btn btn-success btn-sm m-1">
                                    كشف حساب مالي لعميل مع الأصناف
                                </a>



                                <a href="{{ route('Customers.create') }}" class="btn btn-primary btn-sm m-1">
                                    اضافه عميل جديد
                                </a>

                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped "
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>
                                                اسم العميل</th>
                                            <th>
                                                رقم حساب العميل</th>
                                            <th>
                                                Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Customers as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->customer_name }}
                                                </td>
                                                <td>
                                                    {{ $item->account_number }}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm" id="unit_edit"
                                                        data-id="{{ $item->id }}">Edit</a>
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

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
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
                url: "{{ route('Customers.Customer_modal') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modal-lg').modal('show');
                    $('#modal-edit-body').html(data);
                    // $('#modal-lg').html("");
                    // $('#modal-lg').modal('hide');
                    // alert(data);
                    // $('#modal-lg').modal({
                    //     show: true,
                    //     backdrop: 'static',
                    // });

                }
            });

        }));

        $('#unit_delete').click(function() {

            var id = $(this).data('id');
            $(this).confirm("are you shure");
        });
    });
</script>
