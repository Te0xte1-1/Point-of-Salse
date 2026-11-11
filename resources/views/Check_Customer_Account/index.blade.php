@extends('layouts.app')

@section('title')
    Category
@endsection
@section('content')
    <div class="container-fluid">
      
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">{{ __('كشف حساب العملاء') }}</div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label >جميع الــعمـــلاء</label>
                                <select class="form-control form-control-sm">
                                    <option value=""></option>
                                    </select>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label >نوع التقرير</label>
                                <select class="form-control form-control-sm">
                                <option value=""></option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label >من تاريخ</label>
                                <input type="date" class="form-control form-control-sm">
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                              <div class="form-group">
                                <label >الى تاريخ</label>
                                <input type="date" class="form-control form-control-sm">
                              </div>
                            </div>
                        </div>
                        <hr>
                        <input type="button" value="بحث" class="form-control form-control-sm btn-default">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
