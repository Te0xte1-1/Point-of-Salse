@extends('layouts.app')

@section('title')
    مراجعه مصروف النقدية
@endsection
@section('content')

    
<div class="container-fluid">
        <div class="card">
            <div class="card-header text-right">

                <h4  class="text-center"> مراجعه عملية صرف رقم ({{$data->id}})</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-stripped table-hover">
            <thead class="table table-secondary">
                <th>كود العملية</th>
                <th>اسم المورد</th>
            </thead>
      
            <tbody id="load_table_index">      
                <tr>
                    <td>رقم الوردية</td>
                    <td>{{$data->shift_code}}</td>
                </tr>
                <tr>
                    <td>اسم المستخدم</td>
                    <td>{{$data->added_by}}</td>
                </tr>
                <tr>
                    <td>تاريخ العملية</td>
                    <td>{{$data->date}}</td>
                </tr>
                <tr>
                    <td>رقم العملية</td>
                    <td id="auto_serial">{{$data->id}}</td>
                </tr>
                <tr>
                    <td>نوع العملية</td>
                    <td>
                    صرف مبلغ مالي
                    </td>
                </tr>
                <tr>
                    <td>الحساب المالي</td>
                    <td>
                    {{$data->account_number}}
                    </td>
                </tr>
                <tr>
                    <td>نوع الحركة المالية</td>
                    <td>{{$data->move_type_id}}</td>
                </tr>
                <tr>
                    <td>الخزينة</td>
                    <td id="parent_total">{{$data->treasures_id}}</td>
                </tr>
                <tr>
                    <td>المبلغ</td>
                    <td id="parent_total">{{$data->money_for_account}}</td>
                </tr>
                <tr>
                    <td>تفاصييل البيانات</td>
                    <td>{{$data->note}}</td>
                </tr>
            
            </tbody>
        </table>
    </div>
    </div>
<div class="card-footer">
    <button class="form-control form-control-sm btn btn-success btn-sm">Print</button>
</div>
</div>

</div>

    
@endsection
