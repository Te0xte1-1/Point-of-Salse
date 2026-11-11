
<form action="{{ route('Customers.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>رقم الحساب</label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  disabled class="form-control form-control-sm"
                    name="acc_numb" id="acc_numb" value="{{$data->account_number}}">
                <input type="hidden" value="{{$data->account_number}}" class="form-control form-control-sm"
                    name="acc_number" id="acc_number">
            </div>

        </div>
       
        <div class="col-sm-6">
            <div class="form-group">
                <label >نوع الحساب</label>
                <select name="acc_type" class="form-control form-control-sm" disabled id="acc_type">
                    <option value="2">عميل</option>
                </select>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>الرصيد الإفتتاحي للحساب</label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" disabled
                    name="balance_start" id="balance_start" value="{{$data->start_balance}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>الرصيد الحالي للعميل</label>
                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" disabled
                    name="current_balance" id="current_balance" value="{{$data->current_balance}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>اسم العميل</label>
                <input type="text" class="form-control form-control-sm" autocomplete="off"
                    required name="acc_name" id="acc_name" value="{{$data->customer_name}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>عنوان سكن العميل</label>
                <input type="text" class="form-control form-control-sm" required name="address"
                    id="address" value="{{$data->customer_address}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ايميل العميل</label>
                <input type="email" class="form-control form-control-sm" required name="email"
                    id="email" value="{{$data->customer_email}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>صورة العميل</label>

                <img src="{{ asset('images/customers' . $data->sup_image) }}" width="150"
                height="150" alt="" srcset="" style="margin-left: 200px;" class="text-center" name="pic" id="pic">
            </div>
        </div>

    </div>

    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button> <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">إغلاق</button>
    </div>
</form>
