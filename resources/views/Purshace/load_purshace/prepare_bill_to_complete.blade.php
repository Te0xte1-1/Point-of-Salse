<form action="{{ route('Purshace.approve') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="auto_serial" value="{{ $get_order_bill->auto_serial }}">
            <div class="form-group">
                <label  class="label_approve">
                    إجمالي أصناف الفاتــــــورة
                </label>
                <input type="text" disabled value="{{ $get_order_bill->total_cost }}"
                    class="form-control form-control-sm" name="total_items_cost" id="total_items_cost">
                <input type="hidden" value="{{ $get_order_bill->total_cost }}" class="form-control form-control-sm"
                    name="total_items_cost_hidden" id="total_items_cost_hidden">
            </div>

            <div class="form-group">
                <label  class="label_approve">
                    خزنة الصرف
                </label>
                <select name="treasures_id" id="treasures_id" class="form-control form-control-sm">
                    <option value="0">-- اختر الخزينة --</option>
                    @foreach ($treasures as $item)
                        <option value="{{ $item->id }}">{{ $item->treasures_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label  class="label_approve">
                    طريقة الدفع
                </label>
                <select name="pay_type" id="pay_type" class="form-control form-control-sm">
                    <option value="0">-- اختر طريقة الدفع --</option>
                    <option value="1">كاش</option>
                    <option value="2">أجل</option>
                </select>
            </div>
            <div class="form-group">
                <label  class="label_approve">
                    المتبقي للمورد
                </label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" disabled class="form-control form-control-sm" min="0" value="0"
                    name="remain_to_supplier" id="remain_to_supplier">
                <input type="hidden" class="form-control form-control-sm" name="remain_to_supplier_hidden"
                    id="remain_to_supplier_hidden">
            </div>

        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label  class="label_approve">
                    الإجمالي النهائي
                </label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" disabled class="form-control form-control-sm"
                    value="{{ $get_order_bill->total_cost }}" name="total_after_all" id="total_after_all">
                <input type="hidden" class="form-control form-control-sm" value="{{ $get_order_bill->total_cost }}"
                    name="total_after_all_hidden" id="total_after_all_hidden">
            </div>

            <div class="form-group">
                <label  class="label_approve">
                    الرصيد المتاح بالخزينة
                </label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" disabled class="form-control form-control-sm" value="0" min="0"
                    name="available_balance" id="available_balance">
            </div>
            <div class="form-group">
                <label  class="label_approve">
                    المبلغ المدفوع للمورد الاَن
                </label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" min="0" value="0" class="form-control form-control-sm"
                    name="what_paid_now" id="what_paid_now">
            </div>

        </div>
    </div>
    <button type="submit" id="finish" class="btn btn-danger btn-sm "style="margin-left:500px">
        إكمال العملية
        <i class="fa fa-print"></i>
    </button>
    <span style="background: #050b29;padding: 13px;color: #fff;margin-left: 990px;font-size:20px" id="another_total">{{ $get_order_bill->total_cost }}
    </span>
</form>


<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {




        $('body').on('change', '#treasures_id', function(e) {
            var treasures_id = $(this).val();
            var total_after_all = $('#total_after_all').val();
            $.ajax({
                method: 'post',
                url: "{{ route('Purshace.get_treasures_data') }}",
                dataType: "json",
                cach: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    treasures_id: treasures_id
                },
                success: function(data) {
                    $('#available_balance').val(data);
                    $('#remain_to_supplier').val(total_after_all);
                    $('#another_total').html(total_after_all);
                }


            });
        }); // Bring Treasures Balance By ID 

        $('body').on('change', '#pay_type', function(e) {
            var pay_type = $(this).val();
            var total_after_all = $('#total_after_all').val();
            if (pay_type == 1) {
                $('#what_paid_now').val(total_after_all);
                $('#what_paid_now').attr('readonly', true);
                $('#remain_to_supplier').val(0);


            } else {
                $('#what_paid_now').val(0);
                $('#what_paid_now').attr('readonly', false);
                $('#remain_to_supplier').val(total_after_all);
            }
        }); // Pay Type Change Supplier balance  Treasures Balance By ID 

        $('body').on('keyup change', '#what_paid_now', function(e) {

            var what_paid_now = $(this).val();
            var total_after_all = $('#total_after_all').val();

            what_paid_now = parseInt(what_paid_now);
            total_after_all = parseInt(total_after_all);

            if ($(this).val() == "") {

                alert("يجب ان تكون القيمة على الأقل 0");
                $(this).val('0');
                $('#remain_to_supplier').val(total_after_all);
                return false;
            } else {
                var operation = what_paid_now - total_after_all;
                $('#remain_to_supplier').val(operation * -(1));
                $('#remain_to_supplier_hidden').val(operation * -(1));
            }

        }); // what_paid_now




        $('body').on('mouseenter', '#finish', function(e) {
            e.preventDefault();

            var total_after_all = $('#total_after_all').val();
            var available_balance = $('#available_balance').val();

            if (available_balance == "") {
                alert("اختر الخزنة لتكمل العملية");
                return false;
            } else {

                // if (total_after_all > available_balance) {
                //     alert("الخزنة ليس بها هذا المبلغ");
                //     return false;
                // } else if (total_after_all == available_balance) {
                //     alert("الخزنة أوشكت على النفاذ");
                //     return true;
                // } else {
                //     var pay_type = $('#pay_type').val();
         
                //     if (pay_type == "" || pay_type == 0) {
                //         alert("اختر طريقة الدفع");
                //         return false;
                //     }

                // }
            }

        });
    });
</script>
