<form action="{{ route('Stock.update', ['id' => $data->id]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>اسم المخزن</label>
                <input type="text" class="form-control form-control-sm" autocomplete="off" required name="stock_name"
                    id="stock_name" value="{{ $data->stock_name }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>مكان المخزن</label>
                <input type="text" class="form-control form-control-sm" autocomplete="off" required
                    name="stock_location" id="stock_location" value="{{ $data->stock_location }}">
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
        <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">إغلاق</button>
    </div>
</form>
