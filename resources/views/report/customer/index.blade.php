@extends('layouts.app')

@section('content')
    <style>
        th,
        td,
        label {
            text-align: center !important;
        }   #Repo {
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
                    <div class="card-header text-right">{{ __('كشف حساب عميل') }}</div>
                    <div class="card-body">

                        <form action="{{ route('Finance_customers_mirror.mirror') }}" target="_blank" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label>جميع العملاء </label>
                                        <select name="customer" id="customer" class="form-control form-control-sm">
                                            <option value="">-- اختر العميل --</option>
                                            @foreach ($data as $item)
                                                <option
                                                    data-acc_number="{{ $item->account_number }}"data-date="{{ $item->date }}"
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="today_date" id="today_date"
                                            value="@php echo date('Y-m-d'); @endphp">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="from-group">
                                        <label>نوع التقرير</label>
                                        <select name="report_type" id="report_type" class="form-control form-control-sm">
                                            <option value="">-- اختر العميل --</option>
                                            <option value="1">كشف حساب اجمالي</option>
                                            <option value="2">كشف حساب تفصيلي خلال الفترة</option>
                                            <option value="3">كشف حساب المبيعات خلال الفترة</option>
                                            <option value="4">كشف حساب مرتجع مشتريات خلال الفترة</option>
                                            <option value="5">كشف حساب النقدية خلال الفترة</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label>من فترة</label>
                                    <input type="date" name="to" id="to"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-2">
                                    <label>الى فترة</label>
                                    <input type="date" name="from" id="from"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="form-control btn btn-primary" id="Repo">
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
                                        <th>اسم العميل</th>
                                        <th>الرصيد الحالي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>action</th>
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
        $(document).on('change', '#customer', function(e) {
            var customer = $(this).val();
            var to = $('#today_date').val();
            var date = $('#customer option:selected').data('date');
            $('#from').val(date);
            $('#to').val(to);


        });
        $(document).on('click', '#Repo', function(e) {
            // e.preventDefault();

            var report_type = $('#report_type option:selected').val();
            var customer = $('#customer option:selected').val();
            if (customer == "") {
                alert('لم تقم بإختيار المورد');
                $('#customer').focus();
                return false;
            }
            if (report_type == "") {
                alert('اختر نوع التقرير');
                $('#report_type').focus();
                return false;
            }
            $.ajax({
                url: "{{ route('Customer.get_customer_data') }}",
                method: "POST",
                dataType: "json",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    customer: customer,
                    report_type: report_type,
                },
                success: function(data) {

                    alert(date);
                }
            });
        });


    });
</script>
