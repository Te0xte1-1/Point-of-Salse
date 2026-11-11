<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-stripped table-hover">
        <thead class="table table-primary">
            <th width="2%">#</th>
            <th width="10%">نوع الفاتورة</th>
            <th width="10%">رقم الفاتورة</th>
            <th width="10%">تاريخ الفاتورة</th>
            <th width="8%">نوع السداد</th>
            <th width="13%">اسم العميل</th>
            <th>المدفوع</th>
            <th>المتبقي</th>
            <th>قيمة الفاتورة</th>
            <th width="20%">اكشن</th>
        </thead>
        <tbody>
            @if (!empty($Salse))
                <?php $i = 1; ?>
                @foreach ($Salse as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->bill_type }}</td>
                        <td>{{ $item->serial }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->pay_type }}</td>
                        <td>
                            @if ($item->acc_name == "")
                                عميل 
                            @else
                            {{$item->acc_name}}
                            @endif
                            </td>
                        <td>{{ $item->what_paid }}</td>
                        <td>{{ $item->what_not_yet_paid }}</td>
                        <td><strong>
                                {{ $item->total }}
                            </strong>
                        </td>
                        <td>
                            @if ($item->is_approved == 0)
                                <a href="#" class="btn btn-warning btn-sm" id="edit_bill"
                                    data-bill-id=" {{ $item->id }}" title="تعديل في الفاتورة"> تعديل
                                </a>
                                <a href="#"class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#modal-lg-showd" title="تفاصيل الفاتورة">A4 <i class="fa fa-print"></i>
                                </a>
                                <a href="#"class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#modal-lg-showd" title="تفاصيل الفاتورة">A6 <i class="fa fa-print"></i>
                                </a>

                                <button class="btn btn-danger btn-sm" data-id="{{ $item->id }}"
                                    id="remove_salse_invoice">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @else
                                <button class=" btn btn-primary btn-sm" data-id="{{ $item->id }}"
                                    id="print_salse_invoice">
                                    فاتورة تمت
                                    <i class="fa fa-check"></i>
                                </button>
                                <a href="{{ route('Salse.done_print.a6', $item->id, 'A6') }}"class="btn btn-success btn-sm"
                                    title="طباعة الفاتورة">A6 <i class="fa fa-print"></i>
                                </a>
                                <a href="{{ route('Salse.done_print.a4', $item->id, 'A4') }}"class="btn btn-info btn-sm"
                                    title="طباعة الفاتورة">A4 <i class="fa fa-print"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10" class="alert alert-danger">لا توجد فاتورة بعد</td>
                </tr>
            @endif

        </tbody>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>إجمالي الفواتير <strong>({{ $total_salse }})</strong></td>
            <td></td>
        </tfoot>
    </table>
</div>
