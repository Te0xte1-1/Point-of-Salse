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

        .pt-4,
        .py-4 {
            padding-top: 1px !important;
        }
    </style>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Purshace</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <h3 class="card-title">Purshace Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <form action="{{ route('Purshace.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>Name Of Customer</h6>
                                            <input type="text" name="customer_name" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>Location Of Customer</h6>
                                            <input type="text" name="customer_location" class="form-control form-control-sm"
                                                name="" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <h6>Nubmer Of Customer</h6>
                                            <input type="text" name="customer_number" class="form-control form-control-sm" name=""
                                                id="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table " aria-describedby="example2_info">
                                <thead class="table-info">
                                    <th width="2%">ID</th>
                                    <th width="13%">Category</th>
                                    <th width="13%">Product</th>
                                    <th width="7%">QTY</th>
                                    <th width="15%x">Price</th>
                                    <th width="15%x">Total</th>
                                    <th width="5%">Add</th>
                                    <th width="5%">remove</th>
                                </thead>
                                <tbody id="tboody">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="cat[]" class="form-control form-control-sm" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="pro[]" class="form-control form-control-sm" id="">
                                                <option value="">1</option>
                                                <option value="">22</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="qty[]" class="form-control form-control-sm"
                                                name=""id=""></td>
                                        <td><input type="text" name="price[]" class="form-control form-control-sm" id=""></td>
                                        <td><input type="text" name="sub_total[]" class="form-control form-control-sm" id="">
                                        </td>
                                        </form>
                                        <td><button class="btn btn-info btn-sm add_row">+</button></td>
                                    </tr>
                                </tbody>

                            </table>
                            <input type="submit" class="btn btn-primary btn-sm" value="طباعه">
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
                            <hr>
                            <div align="center" class="from-group">
                                <input type="button" class="btn btn-success btn-sm" value="فاتورة جديده">
                            </div>

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
                                            <select name="cat[]" class="form-control form-control-sm" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="pro[]" class="form-control form-control-sm" id="">
                                                <option value="">1</option>
                                                <option value="">22</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="qty[]" class="form-control form-control-sm"
                                                name=""id=""></td>
                                        <td><input type="text" name="price[]" class="form-control form-control-sm" id=""></td>
                                        <td><input type="text" name="sub_total[]" class="form-control form-control-sm" id="">
                                        </td>
                                        </form>
                                        <td><button class="btn btn-info btn-sm add_row">+</button></td>
                                        <td><button class="btn btn-danger btn-sm remove_row"data-id="${id}">-</button></td>
                                    </tr>`;
                $('#tboody').append($data);

                // calc_total();
            });
        });
    </script>
@endsection
