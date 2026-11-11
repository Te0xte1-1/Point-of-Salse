@extends('layouts.app')
@section('title')
    الأصناف
@endsection
@section('content')
    <style>
        body {
            direction: rtl !important;
        }

        label {
            text-align: center !important;
        }

        #photo_pro {
            border: 1px solid rgba(34, 33, 33, 0.251);
            border-radius: 8px;
            width: 300px;
            height: 200px;
            padding: 10px;
            background: #ddd;
        }

        th,
        td {
            font-size: 14px;
            text-align: center;
        }

        .modal-body {
            padding: 0 1rem !important;
        }
    </style>
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('الأصــنــاف') }}
                        </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('Product.create') }}" class="btn btn-primary btn-sm"
                                    style="margin-left:370px;">
                                    اضاف صنف جديد
                                </a>

                            </div>

                        </div>
                        <hr>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>القسم</th>
                                            <th>الصنف</th>
                                            <th>سعر الشراء</th>
                                            <th>سعر البيع</th>
                                            <th>المخزن</th>
                                            <th>الكمية</th>
                                            <th>حد الصرف</th>
                                            <th>صورة الصنف</th>
                                            <th>تاريخ الإنتهاء</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($Products as $item)
                                            {{-- {{$item}} --}}
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->category->cat_name }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->purshace_price }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->qty}}</td>
                                                <td>{{ $item->risk }}</td>
                                                <td>
                                                    <img src="{{ asset('images/products/' . $item->photo) }}" width="60"
                                                        height="50" alt="" srcset="">
                                                </td>
                                                <td>

                                                    @if ($item->expiration_date == '')
                                                        بدون تاريخ إنتهاء
                                                    @else
                                                        {{ $item->expiration_date }}
                                                    @endif


                                                </td>




                                                <td><a href="#" class="btn btn-info btn-sm" id="product_edit"
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

        $(document).on('click', '#product_edit', (function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('Product.product_modal') }}",
                data: {
                    id: id
                },
                success: function(data) {

                    $('#modal-lg').modal('show');
                    $('#modal-edit-body').html(data);
                }
            });


        }));

        $('#delete_product').click(function() {

            var id = $(this).data('id');
            $(this).confirm("are you shure");
        });
    });
</script>
