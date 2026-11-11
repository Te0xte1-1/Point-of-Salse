@extends('layouts.app')

@section('content')
    <style>
        th,
        td {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 10px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }

        h2,
        h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center !important;
        }

        label {
            float: right !important;
            margin-right: 15px;
        }
    </style>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h4 class="text-center">
                            {{ __('الحسابات') }}
                            <i class="fa fa-tree"></i>
                        </h4>

                        <p class="text-right">إضافة حساب جديد
                            <i class="fa fa-plus"></i>
                        </p>

                    </div>
                    <div class="card-body">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('Accounts.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم الحساب</label>
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ $last_number }}" disabled class="form-control form-control-sm"
                                                name="acc_numb" id="acc_numb">
                                                <input type="hidden" value="{{ $last_number }}"  class="form-control form-control-sm"
                                                 name="acc_number" id="acc_number">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم الحساب</label>
                                            <input type="text" class="form-control form-control-sm" required name="acc_name"
                                                id="acc_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >نوع الحساب</label>
                                            <select name="acc_type" class="form-control form-control-sm" id="acc_type">
                                                <option value=""></option>
                                                @foreach ($acc_type as $item)
                                                    <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>هل الحساب اب</label>
                                            <select name="is_parent" class="form-control form-control-sm" id="is_parent">
                                                <option value=""></option>
                                                <option value="1">نعم</option>
                                                <option value="0">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="divparent" style="display: none">
                                        <div class="form-group">
                                            <label>الحساب الأب</label>
                                            <select name="parent" class="form-control form-control-sm" id="parent">
                                                <option value=""></option>
                                                @foreach ($acc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ملاحظات</label>
                                            <input type="text" value="لا توجد ملاحظات" class="form-control form-control-sm"  name="note"
                                                id="note">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>حالة التفعيل </label>
                                            <select name="active" class="form-control form-control-sm" id="active">
                                                <option value=""></option>
                                                <option value="1">مفعل</option>
                                                <option value="0">متوقف</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="form-control btn-success" value="حفظ البيانات">
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var balance_status = $('#balance_status').val();
            var balance_start = $('#balance_start').val();
            $(document).on('change', '#is_parent', function() {
                if ($(this).val() == 0) {
                    $('#divparent').show();

                } else {
                    $('#divparent').hide();
                }
            });
            $(document).on('change', '#balance_status', function() {
                if ($(this).val() == 1) {
                    $('#balance_start').val('');
                    if (balance_start == '0') {
                        alert('يجب ان تكون قيمة هذا الحقل اكبر من الصفر');
                    }

                }
                if ($(this).val() == 2) {
                    $('#balance_start').val('');
                    if (balance_start == '0') {
                        alert('يجب ان تكون قيمة هذا الحقل اكبر من الصفر');
                    }
                }
                if ($(this).val() == 3) {
                    $('#balance_start').val(0);
                    if (balance_start > 0) {
                        alert('يجب ان تكون قيمة هذا الحقل صفر');
                    }
                }
            });

            // $(document).on('input', '#balance_start', function() {

            //     if (balance_status !== 0) {
            //         $('#balance_start').val('');
            //         alert('يجب عليك كتابة حالة الرصيد');
            //         $('#balance_status').focus();
            //         return false;
            //     }

            // });
        });
    </script>
@endsection
