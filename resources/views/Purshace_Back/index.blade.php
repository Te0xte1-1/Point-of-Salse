@extends('layouts.app')
@section('title')
    Purshace Page
@endsection
@section('content')
    <style>
        th,
        td {
            text-align: center;
        }

        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

    </style>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Purshace</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header ">
                            <b>
                                <h5 class="text-center">Purshace Pages</h5>
                            </b>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <form action="{{ route('Purshace.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>Date</h6>
                                            </label>
                                            <input type="date" name="customer_name" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>Name Of Customer</h6>
                                            </label>
                                            <select class="form-control form-control-sm" name="amil" id="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >
                                                <h6>Number Of Invoice</h6>
                                            </label>
                                            <input type="text" name="serial" disabled class="form-control form-control-sm"
                                                name="" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>Nubmer Of Employee</h6>
                                            </label>
                                            <input type="text" name="customer_number" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>The Stock</h6>
                                            </label>
                                            <input type="text" name="stock" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>Type OF Sale</h6>
                                            </label>
                                            <select class="form-control form-control-sm" name="units" id="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>Category</h6>
                                            </label>
                                            <select class="form-control form-control-sm" name="units" id="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >
                                                <h6>Product Name</h6>
                                            </label>
                                            <input type="text" name="customer_name" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label >
                                                <h6>الكمية</h6>
                                            </label>
                                            <input type="text" name="customer_location" class="form-control form-control-sm"
                                                name="" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label >
                                                <h6>Price</h6>
                                            </label>
                                            <input type="text" name="customer_number" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label >
                                                <h6>The Total</h6>
                                            </label>
                                            <input type="text" name="customer_name" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label >
                                                <h6>Unit</h6>
                                            </label>
                                            <select class="form-control form-control-sm" name="units" id="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >
                                                <h6>The Available Quantity Of stock</h6>
                                            </label>
                                            <input type="text" name="customer_name" class="form-control form-control-sm"
                                                name="" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >
                                                <h6>Action</h6>
                                            </label>
                                            <br>
                                            <input type="submit" class="btn btn-info btn-sm add_row"
                                                value="Add The Product To The Invoice +">
                                        </div>
                                    </div>

                                </div>
                        </div>

                    </div>
                    {{-- <br> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-hover table-stripped" aria-describedby="example2_info">
                                <thead>
                                    <th width="2%">ID</th>
                                    <th width="13%">Category</th>
                                    <th width="13%">Product</th>
                                    <th width="7%">الكمية</th>
                                    <th width="15%x">Price</th>
                                    <th width="15%x">Total</th>
                                    <th width="5%">remove</th>
                                </thead>
                                <tbody id="tboody">

                                </tbody>

                            </table>

                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <div align="right">
                                        <p class="lead">Amount Due 2/22/2014</p>
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>$250.30</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax (9.3%)</th>
                                                        <td>$10.34</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping:</th>
                                                        <td>$5.80</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>$265.24</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <div align="center" class="from-group">
                                <input type="button" id="toastsDefaultSuccess" class="btn btn-success btn-sm"
                                    value="فاتورة جديده">
                            </div>
                            <br>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/Adminlte.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.add_row').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var cat_name = $(this).data('cat_name');
                var product_name = $(this).data('product_name');
                var price = $(this).data('price');

                var $data =
                    `<tr>
                                        <td>1</td>
                                        <td>
                                            
                                            <input type="text" name="cat[]" disabled class="form-control form-control-sm" id="">
                                        </td>
                                        <td>
                                           
                                            <input type="text" name="pro[]" disabled class="form-control form-control-sm" id="">
                                        </td>
                                        <td><input type="text" name="الكمية[]" class="form-control form-control-sm"
                                                name=""id=""></td>
                                        <td><input type="text" name="price[]" disabled class="form-control form-control-sm" id=""></td>
                                        <td><input type="text" name="sub_total[]" disabled class="form-control form-control-sm" id="">
                                        </td>
                                        <td><button class="btn btn-danger btn-sm remove_row"data-id="${id}">-</button></td>
                                    </tr>`;
                $('#tboody').append($data);

                // calc_total();
            });

            // end add row

            /////////////////////////////////////

            $('#toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Purshace Invoice',
                    subtitle: 'Subtitle',
                    body: 'Your Purshace Has Been Successfully Completed .'
                })
            });

            // toastr

            /////////////////////////////////////

        });
    </script>
@endsection
