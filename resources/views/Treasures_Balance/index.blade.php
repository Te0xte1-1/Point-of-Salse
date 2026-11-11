@extends('layouts.app')

@section('title')
    Category
@endsection
@section('content')
    <style>
        td {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px !important;
            font-weight: bold;
        }
    </style>
    <div class="container-fluid">

        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">
                        <h6 class="text-center">
                            {{ __('رصيد الخزن') }}

                        </h6>
                    </div>




                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <th>البيان</th>
                                    <th>المبلغ</th>
                                </thead>
                                <tbody>
                                    @foreach ($treasures as $item)
                                      
                                        <tr>
                                            <td style="background-color:#b81818;color:#fff">
                                                المصروفات
                                            </td>
                                            <td style="text-align: center;background-color:#186;color:#fff">
                                                {{ $item->Total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#2ba31b;color:#fff">
                                                الإيرادات
                                            </td>
                                            <td style="text-align: center;background-color:#186;color:#fff">
                                                {{ $item->Total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#065818;color:#fff">
                                                المبيعات
                                            </td>
                                            <td style="text-align: center;background-color:#186;color:#fff">
                                                {{ $salse_total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#680a0a;color:#fff">
                                                المشتريات
                                            </td>
                                            <td style="text-align: center;background-color:#186;color:#fff">
                                                {{ $purshace_total }}
                                            </td>
                                        </tr>
                                      
                                        <tr>
                                            <td style="background-color:#a9ac0c;color:#fff">
                                                {{ $item->treasures_name }}
                                            </td>
                                            <td style="text-align: center;background-color:#186;color:#fff">
                                                {{ $item->Total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{-- <td colspan="2" style="text-align: center;background-color:#180374;color:#fff">صافي المتبقي في الخزينة (8,500.00)</td> --}}
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
