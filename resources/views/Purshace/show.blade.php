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

        h2 {
            text-align: center !important;
        }
    </style>

    <div class="container-fluid">

        <div class="card card-primary card-outline">
            <div class="card-header text-right">
                <h2>
                    صفحة مراجعة فواتير المعتمدة
                    <i class="fas fa-edit"></i>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header text-right">
                                <h5 class="text-center">
                                    الفواتير
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-stripped table-hover">
                                    <thead class="table table-success">
                                        <th>#</th>
                                        <th>رقم الفاتورة</th>
                                        <th>تاريخ الفاتورة</th>
                                        <th>قيمة الفاتورة</th>
                                        <th>اسم صاحب الفاتورة</th>
                                        <th>اعتماد الفاتـــورة</th>
                                        
                                    </thead>
                                    <tbody>
                                
                                        <tr>
                                            <td>{{$parent_bill->auto_serial}}</td>
                                            <td>{{$parent_bill->order_date}}</td>
                                            <td>{{$parent_bill->order_pay_type}}</td>
                                            <td>{{$parent_bill->total_cost}}</td>
                                            <td>
                                                @if (($parent_bill->supplier_id == 0 ))
                                                (فاتورة بدون عميل محدد)
                                                    @else
                                                    {{$parent_bill->supplier_id}}
                                                    @endif
                                                    {{-- {{$parent_bill}} --}}
                                                
                                        </td>
                                            <td>{{$parent_bill->auto_serial}}</td>
                                        </tr>
                                     
                                      
                                    </tbody>
                                </table>


                           
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-info card-outline">
                            <div class="card-header text-right">
                                <h5 class="text-center">
                                    عرض المنتجات في الطلب
                                </h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="dataTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>الصنف</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>إجمالي السعر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               
                                        @foreach ($items_bill as $item)
                                        <tr>
                                            <td>{{$item->item_id}}</td>
                                            <td>{{$item->item_qty}}</td>
                                            <td>{{$item->unit_price}}</td>
                                            <td>{{$item->total_price}}</td>
                                     
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h4 class="text-right">المجموع</h4>
                                <h5 class="text-left">{{$parent_bill->total_cost}}</h5>
                                <hr>
                                <div class="col-sm-12">
                                    <button type="button" style="margin-left:100px" value=""
                                        class="btn btn-outline-primary">
                                        طـباعه الفـــاتورة
                                        <i class="fa fa-print"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card -->
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
                    var cat_id = $(this).data('cat');
                    var cat_name = $(this).data('cat_name');
                    var product_name = $(this).data('product_name');
                    var price = $(this).data('price');

                    $(this).removeClass('btn-info').addClass('btn-default disabled');
                    // alert(id + name + price);
                    var $data =
                        `<tr>    
                <td>1</td>
                <td>
                    <label>${cat_name}
                    <input type="hidden" name="gogal" value="" class="total-price"/>
                    <input type="hidden" class="form-control form-control-sm" name="cat[]" value="${ cat_id }"/>
                    </td>
                <td>
                                                    <label>${product_name}
                    <input type="hidden" name="pro[]" class="form-control pro- ${  product_name }" value="${id}"/>
                    </td>
                    <td>
                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"class="form-control form-control-sm" min="1" name="الكمية[]" data-price="${price}" value="" class="form-control product-الكمية" id="الكمية">
                        </td>
                        <td>
                            
                            <label>${price}
                            <input type="hidden"class="form-control form-control-sm" name="price[]" id="product-price"value="${price}"/>
                            </td>
                        <td>
                            <label name="" id="subtotall"/>
                        <input type="hidden"class="form-control form-control-sm" name="sub_total[]" id="subtotal" value="sub_total" />
            
                            </td>
                </form>
                    <td><button class="btn btn-danger btn-sm remove_row"data-id="${id}">-</button></td>
                </tr>`;
                    $('#tboody').append($data);

                    calc_total();

                }); //End Add Row


                $('body').on('change', '#cat', function(e) {

                    var cat_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                        data: {
                            cat_id: cat_id
                        },
                        success: function(data) {
                            console.log(data);
                        },
                    });
                }); // Cat ID To Bring Pro Data


                $('.add_new_row').click(function(e) {
                    e.preventDefault();
                    alert(3);
                });
                $('body').on('click', '.disabled', function(e) {
                    e.preventDefault();
                }); //End Disabled Click

                $('body').on('click', '.remove_row', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $('#product-' + id).removeClass('btn-default disabled').addClass('btn-info');
                    $(this).closest('tr').remove();
                    calc_total();

                }); // End Remove Row

                $('body').on('keyup change', '#الكمية', function() {
                    var الكمية = parseInt($(this).val());
                    var unitprice = $(this).data('price');
                    $(this).closest('tr').find('#subtotal').val(الكمية * unitprice);
                    $(this).closest('tr').find('#subtotall').html(الكمية * unitprice);
                    calc_total();
                }); //End الكمية

                function calc_total() {
                    var price = 0;
                    $('#tboody #subtotall').each(function() {

                        price += parseInt($(this).html());
                    });
                    if (price > 0) {
                        $('#order-print').removeClass('btn-info disabled').addClass('btn-info');
                    } else {
                        $('#order-print').addClass('btn-info disabled');
                    }
                    $('.total-price').html(price);
                    $('.total-price').val(price);
                } // End Calc Total

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
