        <tr>
            <td>رقم العملية</td>
            <td id="auto_serial">{{ $get_order_bill->auto_serial }}</td>
        </tr>
        <tr>
            <td>تاريخ الفاتورة</td>
            <td>{{ $get_order_bill->order_date }}</td>
        </tr>
        <tr>
            <td>نوع الفاتــــــورة</td>
            <td>
                @if ($get_order_bill->order_type == 1)
                    كاش
                @else
                    أجل
                @endif
            </td>
        </tr>
        <tr>
            <td>طريقة الدفع</td>
            <td>
                @if ($get_order_bill->order_pay_type == 1)
                    كاش
                @else
                    أجل
                @endif
            </td>
        </tr>
        <tr>
            <td>إسم العميل</td>
            <td>{{ $get_order_bill->supplier_id }}</td>
        </tr>
        <tr>
            <td>إجمالي الفاتــــــورة</td>
            <td id="parent_total">{{ $get_order_bill->total_cost }}</td>
        </tr>
        <tr>
            <td>المخزن المستلم للبضاعة</td>
            <td id="parent_total">{{ $get_order_bill->store_id }}</td>
        </tr>
        <tr>
            <td>المبلغ المدفوع</td>
            <td>{{ $get_order_bill->what_paid }}</td>
        </tr>
        <tr>
            <td>المبلغ الذي لم يتم دفعه</td>
            <td>{{ $get_order_bill->what_remain }}</td>
        </tr>
        <tr>
            <td>حالة الفاتــــــورة</td>
            <td>
                @if ($get_order_bill->is_approved == 0)
                    الفاتــــــورة مفتوحه
                @else
                    الفاتــــــورة تم اعتمادها
                @endif
            </td>
        </tr>
        <tr>
            <td>تعديل في بيانات الفاتــــــورة الرئيسية</td>
            <td>
                @if ($get_order_bill->is_approved == 0)
                    <a href="{{ route('Purshace.edit', $get_order_bill->id) }}" class="btn btn-success btn-sm"><i
                            class="fa fa-edit"></i></a>
                    <a href="#" id="remove_parent_bill" value="{{ $get_order_bill->id }}"
                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    <a href="#" value="{{ $get_order_bill->auto_serial }}" class="btn btn-primary btn-sm"
                        id="approve_bill">
                        إعتـمـاد الفاتــــــورة <i class="fa fa-check"></i></a>
                @else
                    الفاتــــــورة مغلقة ولا يمكن التعديل عليها
                @endif

            </td>

        </tr>

        <tr>
            @if ($get_order_bill->is_approved == 0)
                <td colspan="2">
                    <a href="#" class="btn btn-success btn-sm" id="add-items" data-toggle="modal"
                        data-target="#modal-lg-add-items"
                        style="margin-left: 1px;
        padding: 15px;
        line-height: 19px;
        background: #0c0f3d;
        height: 50px;">إضافة
                        الأصناف <i class="fa fa-plus"></i></a>
                </td>
            @else
            @endif

        </tr>



        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/Adminlte.min.js') }}"></script>

        <script>
            $('#approve_bill').click(function() {
                var auto_serial = $('#auto_serial').html();
                $.ajax({
                    method: 'post',
                    url: "{{ route('Purshace.prepare_bill_to_complete') }}",
                    dataType: "html",
                    cach: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        auto_serial: auto_serial
                    },
                    success: function(data) {
                        $('#modal_approved_bill').modal({
                            show: true,
                            backdrop: 'static',
                        });
                        $('#modal-lg_approved_bill_body').html(data);
                    }


                });
            });

        

            $('#remove_parent_bill').click(function(e) {
                e.preventDefault();
                var question = false;
                confirm('هل تريد حذف الفاتورة');

            })
        </script>
