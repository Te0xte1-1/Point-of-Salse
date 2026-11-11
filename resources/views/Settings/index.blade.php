@extends('layouts.app')
@section('title')
    Settings
@endsection
@section('content')
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                            <h3 class="profile-username text-center">إسم الشركه</h3>
                            <p class="text-muted text-center">Software Engineer</p>
                            <img class="" width="150px" height="100px" src="{{ asset('img/photo4.jpg') }}">
                        </div>
                        <br>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <a class="">شارع عبدالله الطيب</a>
                                <b class="float-right">مقر الشركة</b>
                            </li>
                            <li class="list-group-item">
                                <a class="">+249114700220</a>
                                <b class="float-right">رقم هاتف الشركة</b>
                            </li>
                            <li class="list-group-item">
                                <a class="">IP-Magix@hotmail.com</a>
                                <b class="float-right">إيميل الشركة</b>
                            </li>

                        </ul>

                        <a href="{{route('Settings.edit')}}" class="btn btn-primary btn-block"><b>تعديل البيانات</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection
