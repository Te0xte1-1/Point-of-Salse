<div class="modal fade" id="modal-xl-edit-product">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">تعديل البيانات</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Category.update',$edit_data->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                            <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" class="form-control form-control-sm" value="{{ $edit_data->id }}"
                                        name="id" >
                                        <label >اسم القسم</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $edit_data->cat_name }}"
                                        name="cat_name" >
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label >حالة القسم</label>
                                    <select class="form-control form-control-sm"  name="status" placeholder=" حالة الحساب ">
                                        <option value="{{$edit_data->status}}">مفعل</option>
                                        <option value="0">متوقف</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer">
                            <div align="center">
                            <button type="submit" class="btn btn-primary btn-sm">تعديل البيانات <i class="fa fa-check"></i></button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm"
                    data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
