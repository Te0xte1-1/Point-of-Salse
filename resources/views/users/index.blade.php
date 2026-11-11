@extends('layouts.app')
@section('title')
    User
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-sm-6">
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label> الإسم بالكامل</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>اسم المستخدم</label>
                                    <input type="text" class="form-control form-control-sm" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">ايميل المستخدم</label>
                                    <input type="text" class="form-control form-control-sm" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">كلمة السر</label>
                                    <input type="password" class="form-control form-control-sm" id="">
                                </div>


                                <button type="submit" class="form-control btn btn-info btn-sm">تأكيد</button>
                            </div>

                        </form>
                    </div>

                    <div class="col-sm-6">
                        <img src="{{ asset('img/dash.jpg') }}" width="350" height="350"
                            style="border: 1px solid #000;border-radius:8px;padding:20px;
                        margin-left:80px;margin-top:30px;width:350px;height:350px"
                            alt="" srcset="">
                    </div>
                </div>
                <hr>
                <table dir="rtl" border="1"
                    style="width: 98%;margin-bottom:35px;float: right;text-align:center; border:1px solie #000"cellcpacing="0"
                    cellpadding="1">
                    <thead>
                        <tr>
                            <td colspan="5"style="background-color:#939c9c;">تفاصيل مستخدمين النظام</td>
                        </tr>
                        <tr style="background-color:#af8e8e;">
                            <td>اسم المستخدم كامل</td>
                            <td>اسم المستخدم</td>
                            <td>ايميل المستخدم</td>
                            <td>كلمة السر</td>
                            <td>تعديل</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $item)
                            <tr>

                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td><a href="{{ route('Cat', $item->id) }}"></a><i class="fa fa-edit"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
