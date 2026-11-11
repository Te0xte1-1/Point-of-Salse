@extends('layouts.app')

@section('content')
    <style>
        th,
        td,
        label {
            text-align: center !important;
        }
    </style>
    <div class="container-fluid">
<br>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-sm-3">
                        <form action="{{ route('report.purshace_month') }}" target="_blank" method="POST">

                            @csrf
                            <h6 class="text-center" style="">تقرير مشتريات شهري</h6>
                            <label>من شهر </label>
                            <input type="date" name="purshace_month_from" id="purshace_month_from"
                                value="@php echo date('Y-m-d') @endphp" class="form-control form-control-sm">
                            {{-- <br> --}}
                            <label>الى شهر </label>
                            <input type="date" name="purshace_month_to" id="purshace_month_to"
                                value="@php echo date('Y-m-d') @endphp" class="form-control form-control-sm">

                            <input type="submit" class="form-control btn btn-default"
                                style="margin-top:10px ;background:#ddd" value="طباعه التقرير">
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ route('report.salse_month') }}" target="_blank" method="POST">

                            @csrf
                            <h6 class="text-center" style="">تقرير مبيعات شهري</h6>
                            <label>من شهر </label>
                            <input type="date" name="salse_month_from" id="salse_month_from"
                                value="@php echo date('Y-m-d') @endphp" class="form-control form-control-sm">
                            {{-- <br> --}}
                            <label>الى شهر </label>
                            <input type="date" name="salse_month_to" id="salse_month_to"
                                value="@php echo date('Y-m-d') @endphp" class="form-control form-control-sm">
                            <input type="submit" class="form-control btn btn-default"
                                style="margin-top:10px ;background:#ddd" value="طباعه التقرير">
                        </form>

                    </div>
                    <div class="col-sm-3">
                        <form action="{{ route('report.risk') }}" target="_blank" method="POST">

                            @csrf
                            <h6 class="text-center" style="">حد الطلب </h6>
                            <label>اختر القسم </label>
                            <select name="risk_cat" id="risk_cat" class="form-control form-control-sm">
                                <option value="0" selected>-- اختر --</option>
                                @foreach ($data_cat as $item)
                                    <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                @endforeach
                            </select>
                            <label>اختر الصنف </label>
                            <select name="risk_item" id="risk_item" class="form-control form-control-sm">
                                <option value="0">-- اختر --</option>

                            </select>
                            <input type="submit" class="form-control btn btn-default"
                                style="margin-top:10px ;background:#ddd" value="طباعه التقرير">
                        </form>
                    </div>
                    <hr>
                    <div class="col-sm-3">
                        <form action="{{ route('report.shift') }}"" target="_blank" method="POST">

                            @csrf
                            <h6 class="text-center" style="">تقرير وردية </h6>
                            <label>رقم الوردية </label>
                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="shift_date"
                                id="shift_date" class="form-control form-control-sm">
                            <input type="submit" class="form-control btn btn-default"
                                style="margin-top:10px ;background:#ddd" value="طباعه التقرير">
                        </form>
                    </div>
                </div>


                <hr>

            </div>
            {{-- </div>
            </div>

        </div> --}}
        </div>
    @endsection
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('body').on('change', '#risk_cat', function(e) {
                get_item_by_cat_id('#risk_cat', '#risk_item');
            }); // Cat ID To Bring Pro Data

            function get_item_by_cat_id(your_cat = null, your_location_to_save = null) {

                var cat_id = $(your_cat).val();
                $.ajax({
                    method: 'post',
                    url: "{{ route('load_pro_by_cat_id_in_salse') }}",
                    dataType: "html",
                    data: {
                        _token: '{{ csrf_token() }}',
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $(your_location_to_save).html(data);
                    },

                });

            }

        });
    </script>
