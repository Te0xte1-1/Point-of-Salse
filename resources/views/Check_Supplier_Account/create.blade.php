@extends('layouts.app')

@section('content')
    <div class="container">
       
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header text-right">{{ __('Categorys') }}</div>
                    <div class="card-body">
                        <div class="card-header text-right">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- form start -->
                                <form action="{{ route('Category.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            {{-- <label >Category Name</label> --}}
                                            <input type="text" class="form-control form-control-sm" name="cat_name"
                                                id="" placeholder="Enter Category Name">
                                        </div>
                                        <div class="form-group">
                                            {{-- <label >Category Description</label> --}}
                                            <input type="text" class="form-control form-control-sm" name="cat_description"
                                                id="" placeholder="Enter Category Description">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                              
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
