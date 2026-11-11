@extends('layouts.app')
@section('title')
    Dashboard Page
@endsection
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <h6 class="">Dashboard</h6>
                {{-- Home --}}
            </li>
    
        </ol>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Sales</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <h1>$18,230.00
                                </h1>
                                <br>
                                <h6>Sales Over Time</h6>
                            </p>
                            <br>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="bi bi-house-fill"></i> 33.1%
                                </span>
                                <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                    </div>
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Online Store Overview</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cat Name</th>
                                    <th>Cat Desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>ID</td>
                                    <td>ID</td>
                                    <td>ID</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
        </div>
    </div>
@endsection
