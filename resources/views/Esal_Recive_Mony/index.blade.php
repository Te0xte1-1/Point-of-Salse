@extends('layouts.app')

@section('title')
    إيصال استلام النقدية
@endsection
@section('content')
    <style>
        #ISAL {
            /* background: #a8d6d121; */
            background: #fff;
            border: 1px solid #29252542;
            font-family: sans-serif;
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        option {
            text-align: center;
            font-size: 14px !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
    </style>
    <div class="container-fluid">

        <div class="nagdia" id="ISAL">
            <h6 style="">
                تحصيل نقدية
                <i class="fa fa-cash"></i>
            </h6>
            <hr>
            <form action="{{ route('Esal_Recive_Mony.store') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <h6>تاريخ الحركة

                            </h6>
                            <input type="date" name="date" id="date" value="@php echo date('Y-m-d') @endphp" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <h6>الحسابات المالية</h6>
                            <select name="accounts" id="accounts" class="form-control form-control-sm">
                                <option value=""></option>
                                @foreach ($accounts as $item)
                                    <option data-acc_serial="{{ $item->account_number }}" value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group ">
                            <h6>نوع الحركة المالية</h6>
                            <select name="money_move" id="money_move" class="form-control form-control-sm">
                                <option value=""></option>
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
                            <h6>الخذنه التي تم فيها التحصيل

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
                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                name="available_balance" value="{{ $total_amount_of_treasures }}" disabled
                                style="text-align: center;" id="available_balance" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <h6>قيمة المبلغ المتحصل</h6>
                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="amount"
                                id="amount" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6>تفاصييل البيـــــان</h6>
                    <textarea name="note" id="note" style="color:#000;border:1px solid #ddd;margin-left:30px;" cols="70"
                        rows="4" placeholder="تفاصييل البيـــــان"></textarea>
                </div>
                <input type="submit" class="form-control btn-info" value="تحصيل المبلغ">
            </form>
        </div>
        <br>
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
                                    <td> {{ $item->Treasures }} </td>
                                    <td> {{ $item->money }} </td>
                                    <td> {{ $item->mony_type_move_id }} </td>
                                    <td> {{ $item->note }} </td>
                                    <td> {{ $item->created_at }} </td>
                                    <td>

                                        <a href="{{ route('Esal_Recive_Mony', $item->id) }}"><i class="fa fa-print"
                                                style="color:rgb(17, 50, 80); margin:5px"></i></a>
                                        <a href="{{ route('Esal_Recive_Mony', $item->id) }}"><i class="fa fa-info"></i></a>

                                    </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    @endsection
