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
                                    <label >اسم المستخدم</label>
                                    <input type="text" class="form-control form-control-sm" id=""
                                        placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">كلمة السر</label>
                                    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"> الإسم بالكامل</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control form-control-sm" id="exampleInputFile">
                                        </div>
                                   
                                    </div>
                                </div>
                               
                            </div>
                       
                                <button type="submit" class="form-control btn btn-info btn-sm">تأكيد</button>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <img src="{{ asset('img/2.png') }}" width="350" height="350" style="border: 3px solid #000;border-radius:8px;padding:20px;
                        margin-left:80px;margin-top:30px;width:350px;height:350px" alt="" srcset="">
                    </div>
                </div>
                <hr>
              
            </div>

        </div>


    </div>
    </div>
    </div>
@endsection
