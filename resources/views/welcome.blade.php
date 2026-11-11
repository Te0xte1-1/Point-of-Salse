@extends('layouts.header')
@section('contetn')
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        background: #dddddd87 !important;
        color: :#ddd;
    }

    .square {
        width: 400px;
        height: 350px;
        background: #ffffff;
        border: 1px solid #ddd;
        box-shadow: 0 0 0 0.75 #ddd;
        margin: 150px auto;
        padding: 40px;
        text-align: center
    }

    #done {
        background: #4b4bffd9;
        color: #ffffff;
    }

    .center {
        width: fit-content;
        position: absolute;
        top: 100px !important;
        left: 44%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 38px;
    }

    label {
        text-align: right !important;
    }
</style>

<body>
    <div class="container-fluid">

        <label class="center">نظام المبيعات</label>
        <br>
        <form method="POST" action="{{ route('Dashboard') }}">
            @csrf
            <div class="square">
                <h6>يحب عليك ملئ جميع الحقول</h6>
                <hr>
                <div class="form-group">

                    <input type="text" placeholder="البريد الإلكتروني" class="form-control form-control-sm" name="email"
                        id="email" required autocomplete="email" value="admin@admin.com" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="كلمة السر" value="123123" class="form-control form-control-sm" name="password" id="">
                </div>
                <div align="right">
                    <label >تذكرني</label>
                    <input type="radio" name="" id="">
                </div>
                <input type="submit" id="done" class="form-control form-control-sm" value="تسجيل الدخول">
                <br>
                <a href="{{ route('Quick_access') }}">هل نسيت كلمة السر</a>
            </div>
        </form>
    </div>
</body>

</html>
