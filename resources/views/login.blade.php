<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style2.css') }}"> --}}
</head>
<style>
    body {
        background: #edeff6 !important;
        color: :#ddd;
        font-family: cairo;
    }

    .square {
        width: 430px;
        height: 300px;
        background: #ffffff;
        border: 1px solid #ddd;
        border-radius: 3px;
        box-shadow: 0 1px 1px 0 #ddd;
        margin: 95px auto;
        padding: 20px 40px 20px 40px;
        text-align: center
    }

    #done {
        background: #0078d4;
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        width: 80px;
    }

    .header {
        background-color: #FFF;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        box-shadow: 0 1px 10px 0 #d1dbeb;
        z-index: 10;
    
    }

    .center {
        width: fit-content;
        position: absolute;
        top: 70px !important;
        left: 620px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 28px;
        color: #ffffff;
    }

    label {
        text-align: left !important;
        font-family: Arial, Helvetica, sans-serif;
        color: #0009;
    }

    .square h6 {
        color: #0009;
        font-size: 28px;
        text-align: left;
    }

    .alert {
        position: absolute;
        top: 60px !important;
        left: 670px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 38px;
    }
</style>

<body>
    <div class="header">
        <a href="#" style="margin-left: 20px">
            <img src="{{ asset('images/Assets/AdminLTELogo.png') }}" style="border-radius: 50%;border: 1px solid#777;"
                width="55" height="55" alt="" srcset="">
            IP-MAGIX
        </a>

        <a href="#" style="margin-right:10px" class="btn btn-default btn-sm"> Sign up</a>
    </div>
    <div class="container-fluid">
        <div class="square">
            <form method="POST" id="form_data" action="{{ route('login_store') }}">
                @csrf
                <h6>Factualy</h6>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" placeholder="Enter User" class="form-control form-control-sm" name="email"
                        id="email" autocomplete="email" autofocus>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="text" placeholder="Enter Password" class="form-control form-control-sm"
                        name="password" id="">
                </div>

                <div align="left">
                    <label for="" style="margin:7px 0 15px 2px">Remeber Me</label>
                    <input type="radio" name="" id="">
                </div>
                <div class="log" style="display: flex; justify-content:space-between">
                    <button type="submit" id="done" class="btn btn-primary btn-sm">login</button>
                    <a href="{{ route('Dashboard') }}">Forget Your Password ...?</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
