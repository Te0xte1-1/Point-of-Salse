<form action="{{ route('Product.update', ['id' => $data->id]) }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label >Category</label>
                    <select name="category_id" class="form-control form-control-sm" id="" disabled >
                        <option value="{{ $data->category_id }}">{{ $data->category_id }}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label >الرقم التسلسلي للصنف</label>
                    <input type="text" class="form-control form-control-sm" disabled value="{{ $data->product_serial }}"
                         name="product_name" id="">

                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label >اسم الصنف</label>
                    <input type="text" class="form-control form-control-sm" value="{{ $data->product_name }}"
                        required name="product_name" id="">

                </div>
            </div>
         
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label >سعر الشراء
                    </label>
                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" value="{{ $data->purshace_price }}"
                        required name="purshace_Price" id="">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label >
                        سعر البيع</label>
                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" value="{{ $data->price }}" required
                        name="Price" disabled id="">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label >
                        وحدة البيع</label>
                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" value="{{ $data->price }}" required
                        name="unit_id" disabled id="">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label >الكمية المراد اضافتها
                        للمخزن</label>
                    <input type="number" disabled oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" value="{{ $data->stock }}" required
                        name="stock" id="">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label >حد الصرف للصنف</label>
                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" value="{{ $data->risk }}" required
                        name="risk" id="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label >تاريخ الإنتاج</label>
                    <input type="date" class="form-control form-control-sm" value="{{ $data->creation_date }}"
                         name="creation_date" id="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label >تاريخ الإنتهاء</label>
                    <input type="date" class="form-control form-control-sm" value="{{ $data->expiration_date }}"
                         name="expiration_date" id="">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>صورة المنتج</label>
                <img src="{{ asset('images/products/' . $data->photo) }}" width="120"
                    style="margin-right: 290px;margin-bottom:-20px;" class="text-center" height="120" name="pic"
                    id="pic" value="">

            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between" style="margin-bottom:-20px;">
        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">إغلاق</button>
    </div>
</form>
