<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
</head>
<style>
    body {
        direction: rtl;
        font-family: cairo !important;
    }

    .card-info.card-outline {
        margin-top: 10px;
    }

    img {
        color: #000 !important;
        background: #FFF;
    }

    ul {
        list-style: none;
    }

    #top_nav {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        direction: rtl;
        height: 45px;
        display: flex;
        background-color: #286191;
        justify-content: space-between;
        padding: 0 20px;
        margin-bottom: 50px;
    }

    .btn-sm {
        padding: 0.2rem 0.3rem;
        font-size: 14px;
        line-height: 1.5;
        border-radius: 0.2rem
    }

    .top_nav_ul_left,
    .top_nav_ul_right {
        line-height: 40px;
    }

    .top_nav_ul_right li a {
        font-size: 14px;
        color: #fff;
        margin: 10px;
    }

    .top_nav_ul_left li a {
        font-size: 14px;
        color: #fff;
        margin: 10px;
    }

    th {
        font-size: 14px !important;
    }

    td {
        font-size: 14px !important;

    }

    th,
    td {
        text-align: center;
    }

    .table td,
    .table th {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .navbar-dark {
        position: fixed;
        left: 0;
        width: 1287px;
        height: 45px;
        z-index: 100;
        top: 0;
        background-color: #343a40;
        border-color: #4b545c;
    }

    [class*=sidebar-light-] .sidebar a {
        color: #343a40;
    }

    .layout-fixed .main-sidebar {
        /* bottom: 0; */
        /* float: none; */
        right: 0 !important;
        position: absolute;
        top: 48px;
        height: 100%;
        /* box-shadow: none !important;*/
    }

    .modal-header .close,
    .modal-header .mailbox-attachment-close {
        padding: 0 !important;
        margin: 0 !important;
    }

    .nav-link {
        font-size: 14px;
        font-weight: 300 !important;
    }


    [class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link:active,
    [class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link:focus {
        color: #fdfeff;
        background: #007bff;
    }


    .nav-sidebar .nav-item>.nav-link {
        position: relative;
        margin-right: -24px;
        text-align: right;
    }

    .nav-sidebar>.nav-item {
        margin-bottom: 0;
        margin-right: -20px;
    }



    [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link {
        border-top: 1px solid #ded3d3;
        font-size: 14px;
        color: #000;
    }

    main {
        margin-right: 250px !important;
    }

    .pt-4,
    .py-4 {
        background: #f4f6f9;
        min-height: 558px;
        padding-right: 15px !important;
        padding-left: 15px !important;
    }

    label:not(.form-check-label):not(.custom-file-label) {
        font-size: 14px;
        float: right;
        font-weight: 400;
        color: #2e2d2d;

    }

    .form-control {
        font-size: 12px;
        border-color: #c7c0c0;
        text-align: center;
    }

    ol {
        direction: ltr;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('Quick_access') }}" class="brand-link">

                <span class="brand-text font-weight-light">Dashboard</span>
                <span class="brand-text font-weight-light"> [ @php echo date('Y-m-d') @endphp ]</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item has-treeview {{ request()->is('Settings') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-cog"></i>

                                <b>
                                    <p>
                                        الضبط العام
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Treasures') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt="" srcset="">
                                        <p>بيانات الخزن</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('Users') }}" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>المستخدمين</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('Settings') }}" class="nav-link">
                                        <i class="fas fa-cog nav-icon"></i>
                                        <p>بيانات الشركة</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{-- close الضبط العام --}}





                        {{-- الحسابات النقدية --}}
                        <li class="nav-item  {{ request()->is('Mony_Type_Move') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <b>
                                    <p>
                                        الحسابات
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">


                                {{-- <li class="nav-item">
                                    <a href="{{ route('Account_Tree') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>جميع الحسابات المالية</p>
                                    </a>
                                </li> --}}



                                <li class="nav-item">
                                    <a href="{{ route('Suppliers') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt="" srcset="">
                                        <p>الموردون</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Customers') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt="" srcset="">
                                        <p>العملاء</p>
                                    </a>
                                </li>


                                {{-- <li class="nav-item">
                                    <a href="{{ route('Finance_suppliers_mirror.index') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt="" srcset="">
                                        <p>كشف حساب الموردون</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Finance_customers_mirror.index') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt="" srcset="">
                                        <p>كشف حساب العملاء</p>
                                    </a>
                                </li> --}}

                            </ul>
                        </li>
                        {{-- close الحسابات النقدية --}}


                        <li class="nav-item  {{ request()->is('Mony_Type_Move') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <b>
                                    <p>
                                        العمليات المالية
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('Esal_Srf_Mony') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>المصروفات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Esal_Recive_Mony') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>الإيرادات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Treasures_Balance') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>رصيد الخزن</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        {{-- ضبط المخازن --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <b>
                                    <p>
                                        ضبط الأصناف
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Cat') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>أقسام الأصناف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Pro') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>الأصناف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Units') }}" class="nav-link">
                                        <i class="fa fa-flag nav-icon"></i>
                                        <p>الوحدات</p>
                                    </a>
                                </li>



                            </ul>
                        </li>

                        {{-- حركات مخزنية --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <b>
                                    <p>
                                        ضبط المخازن
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Stock') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>المخازن</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('Send_Between_Stocks') }}" class="nav-link">
                                        <img src="" width="30" height="30" alt=""
                                            srcset="">
                                        <p>الترحيل بين المخازن</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        {{-- close الحسابات النقدية --}}


                        {{-- العمليات --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <b>
                                    <p>
                                        الفواتير
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Purshace') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الفواتيرالمبدئية</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Salse') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>فواتير المبيعات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Purshace') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>فواتير المشتريات</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('Purshace_Back') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>مردود المشتريات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Salse_Back') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>مردود المبيعات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- close العمليات --}}

                        {{-- حركات شفت الخزينة --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <b>
                                    <p>
                                        حركات شفت الخزينة
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Admin_Shifts') }}" class="nav-link">
                                        <i class="fa fa-key nav-icon"></i>
                                        <p>شفتات الخزينة</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        {{-- التقارير --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="border-top:1px solid#ddd">
                                <i class="nav-icon fas fa-edit"></i>
                                <b>
                                    <p>
                                        التقارير
                                        <i style="float: left" class="fas fa-angle-left right"></i>
                                    </p>
                                </b>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Report_All') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تقرير مبيعات ومشتريات </p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('Check_Customer_Account') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كشف حساب عميل</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Check_Supplier_Account') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كشف حساب مورد</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Mony_Move_Of_Mony_Account') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>حركة النقدية على حساب مالي</p>
                                    </a>
                                </li>
                               --}}


                                <li class="nav-item">
                                    <a href="{{ route('Report_Purshace') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تقارير المشتريات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Report_Salse') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تقارير المبيعات</p>
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a href="{{ route('Report_Of_Treasures') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تقارير الخزينة</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('report.risk') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تقارير حد الأصناف </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- close التقارير --}}


                        <li class="nav-item">
                            <a href="{{ route('Support') }}" class="nav-link"style="border-top:1px solid#ddd">
                                <i class="fa fa-box nav-icon"></i>
                                <p>فاتورة دعم</p>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- main content -->
        <main class="py-4">
            <nav id="top_nav">
                <ul class="top_nav_ul_right">
                    <li>
                        <a href="{{ route('Quick_access') }}">الصفحة الرئيسية</a>
                        <a href="{{ route('Salse') }}">المبيعات</a>
                        <a href="{{ route('Purshace') }}">المشتريات</a>
                        <a href="{{ route('Treasures') }}">الخزينة</a>



                    </li>
                </ul>
                <ul class="top_nav_ul_left">
                    <li>
                        <a href="#">الإشعارات</a>
                        <a href="#">تسجيل خروج</a>
                    </li>
                </ul>
            </nav>
            <br>
            @yield('content')

        </main>
    </div>
    {{-- <footer class="main-footer">
        <strong>Copyright &copy; 2020-2023 <a href="https://">Nasr Alden</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer> --}}

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <!-- fontawesome -->
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>

    <!-- Bootstrap App -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/Adminlte.min.js') }}"></script>

    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
        $('#example').DataTable();
        } ); 
        // $("#dataTable").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // $('#dataTable').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
        $('#modal').modal({
            show: true,
            backdrop: 'static',
        });
    </script>
</body>

</html>
