@extends('layouts.app')

@section('title')
    Stock
@endsection
@section('content')
    <style>
        .show_products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: 1px !important;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: 0.5rem;
            position: relative;
            width: 100%;
        }
    </style>
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h6 class="text-center">
                            عرض الأصناف في المخزن رقم
                            (المعرض)
                            <a class="text-left" title="رجوع لصفحة المخازن" href="{{ route('Stock') }}" class="text-left">
                                رجوع للمخازن
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </h6>
                        <br>
                        <select name="cat_id" class="form-control form-control-sm" id="cat_id">
                            <option value="">اختر القسم</option>
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a title="رجوع لصفحة المخازن" href="{{ route('Stock') }}" class="text-left">
                                        رجوع للمخازن
                                        <i class="fa fa-arrow-left"></i>
                                    </a>


                                </div>
                            </div>

                        </div> --}}
                        {{-- <hr> --}}

                        <div class="show_products">

                            <table class="table table-hover stripped bordered" id="dataTable">
                                <thead>
                                    <th>اسم القسم</th>
                                    <th>اسم الصنف</th>
                                    <th>رقم الباتش</th>
                                    <th>كمية الصنف في المخزن</th>
                                    <th>سعر الصنف</th>
                                    <th> إجمالي السعر</th>
                                    <th>حد الطلب </th>
                                    <th>تاريخ الإنتهاء </th>
                                </thead>
                                <tbody id="show_data_by_cat">
                                    @if (!empty($data))
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->batch_id }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->unit_cost_price }}</td>
                                                <td>{{ $item->total_cost_unit }}</td>
                                                <td>{{ $item->risk }}</td>
                                                <td>
                                                    @if ($item->expiration_date == '')
                                                        بدون تاريخ إنتهاء
                                                    @else
                                                        {{ $item->expiration_date }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        نأسف لا توجد أصناف في هذا المخزن
                                    @endif
                                </tbody>
                            </table>
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
                                        <form action="{{ route('Stock.store') }}" method="POST">
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
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        
        $(document).on('change', '#cat_id', (function() {
            var cat_id = $(this).val();
            $.ajax({
                method: 'POST',
                url: "{{ route('Stock.get_product_by_cat') }}",
                dataType:'html',
                data: {
                    cat_id: cat_id
                },
                success: function(data) {
                    $("#show_data_by_cat").html(data);
                }
            });

        }));

    });
</script>