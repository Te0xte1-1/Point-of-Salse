<form action="{{ route('Unit.update', ['id' => $data->id]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>اسم الوحدة</label>
                <input type="text"  value="{{ $data->unit_name }}" class="form-control form-control-sm" autocomplete="off" required name="unit_name"
                    id="unit_name">
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button> <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">إغلاق</button>
    </div>
</form>
