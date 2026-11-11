@extends('layouts.app')

@section('title')
    إيصال استلام النقدية
@endsection
@section('content')
    <style>
        .wrapper {
            background: #f0efef;
            font-
        }

        #ISAL {
            background: #fff;
            border: 1px solid #29252542;
            font-family: cairo;
            border-radius: 8px;
            margin-left: 15px;
            margin-right: 15px;
            height: 410px;
            padding: 10px;
        }

        h6 {
            text-align: center;
            color: #000;
            font-size: 14px !important;
            font-family: cairo;
        }
    </style>
    <div class="container-fluid">
       
        <div class="nagdia" id="ISAL">

            <h5 style="text-align:center">
                ايصال صرف نقدية جديد
                <i class="fa fa-flag"></i>
            </h5>
            <hr>
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6>تاريخ الحركة

                        </h6>
                        <input type="date" name="date" value="@php echo date('Y-m-d') @endphp" id="date" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6>الحسابات المالية</h6>
                        <select name="accounts" id="accounts" class="form-control form-control-sm">
                            <option value="0">اختر الحساب المالي</option>
                            @foreach ($accounts as $item)
                                <option data-acc_type="{{ $item->account_type }}" value="{{ $item->account_number }}">
                                    {{ $item->name }} ( {{ $item->account_type_name }} )</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ">
                        <h6>نوع الحركة المالية</h6>
                        <select name="money_move" id="money_move" class="form-control form-control-sm">
                            <option value="0">اختر نوع الحركة المالية</option>
                            @foreach ($mony_type_move as $item)
                                <option value="{{ $item->id }}">{{ $item->mony_move_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6>الخذنه التي سيتم فيها الصرف
                        </h6>
                        <select name="treasures" id="treasures" class="form-control form-control-sm">
                            <option value=""></option>
                            @foreach ($Treasures as $item)
                                <option value="{{ $item->id }}">{{ $item->treasures_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6>الرصيد المتاح بالخزنة</h6>
                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$total_amount_of_treasures}}" name="available_balance" disabled style="text-align: center;"
                            id="available_balance" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6>قيمة المبلغ المراد صرفة</h6>
                        <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="amount" id="amount" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h6>تفاصييل البيـــــان</h6>
                <input type="text" name="note" id="note"
                    style="color:#000;border:1px solid #ddd;height:100px;width:100%">
            </div>
            <button type="button" id="srf_done" class="form-control btn-info" value="">صرف</button>

        </div>
        <hr>

        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <th>#</th>
                        <th>رقم الإيصال</th>
                        <th>الخزينة</th>
                        <th>المبلغ الذي تم تحصيله</th>
                        <th>نوع الحركة</th>
                        <th>البيـــــان</th>
                        <th>تاريخ العملية</th>
                        <th>اكشن</th>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($Treasures_trans as $item)
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->isal_number }} </td>
                                <td> {{ $item->treasures_id }} </td>
                                <td> {{ $item->money * -1 }} </td>
                                <td> {{ $item->move_type_id }} </td>
                                <td> {{ $item->note }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td>

                                    <a href="{{ route('Esal_Srf_Mony', ['id' => $item->id]) }}"><i class="fa fa-print"
                                            style="color:rgb(17, 50, 80); margin:5px"></i></a>
                                    <a href="{{ route('Esal_Srf_Mony.show', ['id' => $item->id]) }}"><i
                                            class="fa fa-info"></i></a>

                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            </div>
        </div>
        {{-- </div>
        </div> --}}
        <!-- /.card-body -->


        <!-- jQuery -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <script>
            $(document).ready(function() {


                $(document).on('click', '#srf_done', function(e) {
                    e.preventDefault();
                    var srf_money_form = $('#srf_money_form').serialize();
                    var date = $('#date').val();
                    var accounts = $('#accounts').val();
                    var money_move = $('#money_move').val();
                    var treasures = $('#treasures').val();
                    var available_balance = $('#available_balance').val();
                    var amount = $('#amount').val();
                    var date = $('#date').val();
                    var note = $('#note').val();

                    if (date == "") {
                        alert("يجب عليك اختيار التاريخ");
                    } else if (accounts == "0") {
                        alert("يجب عليك اختيار نوع الحساب");
                    } else if (money_move == "0") {
                        alert("يجب عليك اختيار نوع الحركة المالية");
                    } else if (treasures == "") {
                        alert("يجب عليك اختيار الخزينة");
                    } else if (amount == "") {
                        alert("يجب عليك كتابة المبلغ");
                    } else if (note == "0") {
                        alert("يجب عليك كتابة التعليق");
                    } else {

                        $.ajax({
                            method: 'post',
                            url: "{{ route('Esal_Srf_Mony.store') }}",
                            data: {
                                date: date,
                                accounts: accounts,
                                money_move: money_move,
                                treasures: treasures,
                                available_balance: available_balance,
                                amount: amount,
                                date: date,
                                note: note,
                            },
                            success: function(data) {
                                alert('تمت العملية بنجاح');

                                var date = $('#date').val("");
                                var date = $('#available_balance').val("");
                                var accounts = $('#accounts').val("");
                                var money_move = $('#money_move').val("");
                                var treasures = $('#treasures').val("");
                                var amount = $('#amount').val("");
                                var date = $('#date').val("");
                                var note = $('#note').val("");
                            },
                        });
                    }

                });
                $(document).on('change', '#treasures', function() {
                    var treasures_id = $(this).val();
                    $.ajax({
                        method: 'post',
                        url: "{{ route('Purshace.get_treasures_data') }}",
                        data: {
                            treasures_id: treasures_id,
                        },
                        success: function(data) {
                            // alert(treasures);
                            $('#available_balance').val(data);
                            // $('#available_balance').html(data);

                        },
                    });
                });

                $(document).on('keyup change ', '#amount', function() {
                    var changeit_amount = $(this).val();
                    var available_balance = $('#available_balance').val();
                    if (parseInt(changeit_amount) > parseInt(available_balance)) {

                        alert("الخزينة ليس فيها المبلغ");
                        $('#amount').val("");
                    }
                    // console.log(exchange);
                });

            });
        </script>
    @endsection
