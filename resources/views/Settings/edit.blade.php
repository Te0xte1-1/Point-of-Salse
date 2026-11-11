@extends('layouts.app')
@section('title')
    Settings
@endsection
<style>
   
</style>
@section('content')
    <div class="container-fluid">
   
     
        <div class="row">
         
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header text-right">
                      <h3 class="card-title">تعديل معلومات الشركة</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                      <div class="card-body">
                        <div class="form-group">
                          <label >اسم الشركة</label>
                          <input type="email" class="form-control form-control-sm" id="" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">عنوان الشركة</label>
                          <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">شعار الشركة</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">أختر الشعار</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">تعديل البيانات</button>
                      </div>
                    </form>
                  </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
