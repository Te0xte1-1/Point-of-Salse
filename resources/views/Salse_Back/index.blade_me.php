@extends('layouts.header')
@section('title')
Salse
@endsection
{{--
@section('content') --}}
<title>Salse Page</title>
<style>
    body {
        background: #f4f6f9 !important;
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

    th,
    td {
        text-align: center;
    }


    #cash_info {
        color: #f4f6f9;
        background: #2e6871 !important;
    }

    #cash_info>.card-header {
        background: #1a194a !important;

    }
</style>
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Salse</li>
    </ol>
    <div class="row">

        <div class="col-sm-3">
            <div class="card card-default">
                <div class="card-header text-right">
                    <p class="lead text-center">Categories <i class="bi bi-house"></i></p>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    {{-- {{$Categorys}} --}}
                    @foreach ($Categorys as $category)
                        <div class="card card-info">
                            <div class="card-header ">
                                <h4 class="text-center catt" data-id="{{ $category->id }}" data-toggle="collapse"
                                    href="{{ $category->cat_name }}" data-target="#{{ $category->cat_name }}"
                                    aria-expanded="false" aria-controls="collapseExample">{{ $category->cat_name }}</a>
                                </h4>
                            </div>
                            <div class="card-body">

                                <div class="collapse" id="{{ $category->cat_name }}">
                                    <table id="dataTable" class="table tabl-sm">
                                        <thead>
                                            <tr>

                                                {{-- <th>ID</th> --}}
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category->products as $Pro)
                                                <tr>
                                                    {{-- <td>{{ $Pro->id }}</td> --}}
                                                    <td width="5%">{{ $Pro->product_name }}</td>
                                                    <td>{{ $Pro->price }}</td>
                                                    <td>{{ $Pro->stock }}</td>
                                                    <td>
                                                        <a href="#" id="product-{{ $Pro->id }}"
                                                            data-cat="{{ $category->id }}"
                                                            data-cat_name="{{ $category->cat_name }}"
                                                            data-id="{{ $Pro->id }}"
                                                            data-product_name="{{ $Pro->product_name }}"
                                                            data-price="{{ $Pro->price }}"
                                                            class=" btn btn-info btn-sm add_row">
                                                            +
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header text-right">
                    <p class="lead text-center">Salse Page</p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <form action="{{ route('Salse.store') }}" method="post">

                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>Name Of Customer</h6>
                                        <input type="text" placeholder="Name Of Customer" name="customer_name"
                                            class="form-control form-control-sm" name="" id="">
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


                                <table id="example2" class="table" aria-describedby="example2_info">
                                    <thead class="table">
                                        <th width="2%">ID</th>
                                        <th width="13%">Categorys</th>
                                        <th width="13%">Product</th>
                                        <th width="15%">الكمية</th>
                                        <th width="15%x">Price</th>
                                        <th width="15%x">Total</th>
                                        <th width="5%">Add</th>
                                    </thead>
                                    <tbody id="tboody">

                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary" id="order-print"> <i class="bi bi-house"></i> طباعه</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-sm-8 -->



        <div class="col-sm-3">
            <div class="card card-info" id="cash_info">
                <div class="card-header text-right">
                    <h3 class="card-title">Cash Detailse Area</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="lead text-right">Amount Due 2/22/2014</p>
                    <br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <tbody>
                                <thead>

                                    <tr>
                                        <th style="text-align: center;">
                                            <h5>
                                                Total:
                                            </h5>
                                </thead>
                                </th>
                                <td style="text-align: center;background:#f4f6f9;color:black;">
                                    <h1 class="total-price">
                                        $00.00
                                    </h1>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div align="center" class="from-group">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
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

                $(this).removeClass('btn-info').addClass('btn-default disabled');
                // alert(id + name + price);
                var $data =
                    `<tr>    
                    <td>1</td>
                            <td>
                                <label>${cat_name}</label>
                                <input type="hidden" name="gogal" value="" class="total-price"/>
                                <input type="hidden" class="form-control form-control-sm" name="cat[]" value="${ cat_name }"/>
                                </td>
                            <td>
                                                                <label>${product_name}</label>
                                <input type="hidden" name="pro[]" class="form-control pro- ${  product_name }" value="${product_name}"/>
                                </td>
                                <td>
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"class="form-control form-control-sm" min="1" name="الكمية[]" data-price="${price}" value="" class="form-control product-الكمية" id="الكمية">
                                    </td>
                                    <td>
                                        
                                        <label>${price}</label>
                                        <input type="hidden"class="form-control form-control-sm" name="price[]" id="product-price"value="${price}"/>
                                        </td>
                                    <td>
                                        <label name="sub_total[]" id="subtotal"/>
                                    <input type="hidden"class="form-control form-control-sm" name="sub_total[]" id="subtotal" value="sub_total[]" />
                        </label>
                                        </td>
                        </form>
                        <td><button class="btn btn-danger btn-sm remove_row"data-id="${id}">-</button></td>
                    </tr>`;
                $('#tboody').append($data);

                calc_total();
                // if (price > 0) {

                //     $('#order-print').removeClass('disabled');
                // } else {
                //     $('#order-print').addClass('btn btn-primary');


                // }
            })
            $('body').on('click', '.disabled', function(e) {
                e.preventDefault();
            });
            $('body').on('click', '.remove_row', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');
                $(this).closest('tr').remove();
                calc_total();

            });
            $('body').on('keyup change', '#الكمية', function() {

                var الكمية = parseInt($(this).val());
                var unitprice = $(this).data('price');
                var t = $(this).closest('tr').find('#subtotal').html(الكمية * unitprice);


                calc_total();
            });

            function calc_total() {
                var price = 0;
                $('#tboody #subtotal').each(function() {

                    price += parseInt($(this).html());
                });

                $('.total-price').html(price);
                $('.total-price').val(price);
            }


        });
    </script>
