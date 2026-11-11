@extends('layouts.app')

@section('content')
    <style>
        h6 {
            color: #7d7b7b;
        }a{
            color:#000;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center m-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">الوصــــــول االــــسريع</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Settings')}}">
                                            الإعـــدادت
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-lg .ribbon</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper ribbon-lg">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Salse')}}">
                                            المبيعات
                                            <i class="fa fa-home"></i>
                                        </a>
                                        </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-lg .ribbon</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper ribbon-xl">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Purshace')}}">
                                            المشتريات
                                            <i class="fa fa-home"></i>
                                        </a>
                                        </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-xl .ribbon</h6>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Users')}}">
                                            المستخدمين
                                            <i class="fa fa-users"></i>
                                        </a>
                                        </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-lg .ribbon</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper ribbon-lg">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Stock')}}">
                                            المخازن
                                            <i class="fa fa-store"></i>
                                        </a>
                                    </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-lg .ribbon</h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="position-relative p-3 " style="height: 180px;border :1px solid #ddd;margin:5px;box-shadow:0 1px 10px 0 #d1dbeb">
                                    <div class="ribbon-wrapper ribbon-xl">

                                    </div>
                                    <h4 class="text-center">
                                        <u><a href="{{route('Treasures')}}">
                                            الخزينة
                                            <i class="fa fa-home"></i>
                                        </a>
                                        </u>
                                    </h4>
                                    <br>
                                    <h6 class="text-center">.ribbon-wrapper.ribbon-xl .ribbon</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
