@extends('layouts.app')

@section('content')
    <style>
        th,
        td,
        label {
            text-align: center !important;
        }

        #Repo {
            margin-top: 30px;
            width: 100%;
            height: 30px;
            line-height: 6px !important;
            font-size: 15px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header text-right">{{ __('كشف حساب مورد') }}</div>
                    <div class="card-body">

                        <form action="{{ route('Finance_suppliers_mirror.mirror') }}" target="_blank" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label>جميع الموردون </label>
                                        <select name="supplier" id="supplier" class="form-control form-control-sm">
                                            <option value="">-- اختر المورد --</option>
                                            @foreach ($data as $item)
                                                <option
                                                    data-acc_number="{{ $item->account_number }}"data-date="{{ $item->date }}"
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="today_date" id="today_date"
                                        value="@php echo date('Y-m-d'); @endphp">
                                </div>
                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label>نوع التقرير</label>
                                        <select name="report_type" id="report_type" class="form-control form-control-sm">
                                            <option value="">-- اختر العميل --</option>
                                            <option value="1">كشف حساب اجمالي</option>
                                            <option value="2">كشف حساب تفصيلي خلال الفترة</option>
                                            <option value="3">كشف حساب المشتريات خلال الفترة</option>
                                            <option value="4">كشف حساب مرتجع مشتريات خلال الفترة</option>
                                            <option value="5">كشف حساب النقدية خلال الفترة</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label>من فترة</label>
                                    <input type="date" name="from" id="from"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-2">
                                    <label>الى فترة</label>
                                    <input type="date" name="to" id="to"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class=" btn btn-success" id="Repo">
                                        تقرير كل
                                        الطلبات
                                    </button>
                                </div>
                            </div>

                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>رقم الحساب</th>
                                        <th>اسم المورد</th>
                                        <th>الرصيد الحالي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->account_number }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->current_balance }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td><a href="#" data-id="{{ $item->id }}"><i
                                                        class="fa fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/Adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(document).on('change', '#supplier', function(e) {
            var supplier = $(this).val();
            var to = $('#today_date').val();
            var date = $('#supplier option:selected').data('date');
            $('#from').val(date);
            $('#to').val(to);


        });
        $(document).on('click', '#Repo', function(e) {
            // e.preventDefault();

            var report_type = $('#report_type option:selected').val();
            var supplier = $('#supplier option:selected').val();
            if (supplier == "") {
                alert('لم تقم بإختيار المورد');
                $('#supplier').focus();
                return false;
            }
            if (report_type == "") {
                alert('اختر نوع التقرير');
                $('#report_type').focus();
                return false;
            }
            // $.ajax({
            //     url: "{{ route('Supplier.get_supplier_data') }}",
            //     method: "POST",
            //     dataType: "json",
            //     cache: false,
            //     data: {
            //         _token: '{{ csrf_token() }}',
            //         supplier: supplier,
            //         report_type: report_type,
            //     },
            //     success: function(data) {
            //     }
            // });

        });
    });
</script>
