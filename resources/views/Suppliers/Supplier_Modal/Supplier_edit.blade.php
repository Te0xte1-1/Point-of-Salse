
                <form action="{{ route('Suppliers.update', ['id' => $data->id]) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الحساب</label>
                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$data->account_number}}" disabled class="form-control form-control-sm"
                                    name="acc_numb" id="acc_numb">
                                <input type="hidden" value="{{$data->account_number}}" class="form-control form-control-sm"
                                    name="acc_number" id="acc_number">
                            </div>

                        </div>
                      
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label >نوع الحساب</label>
                                <select name="acc_type" class="form-control form-control-sm" disabled id="acc_type">
                                    <option value="2">مورد</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الرصيد الإفتتاحي للحساب</label>
                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" 
                                    name="balance_start" id="balance_start" disabled value="{{$data->start_balance}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الرصيد الحالي للمورد</label>
                                <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control form-control-sm" disabled
                                    name="current_balance" id="current_balance" value="{{$data->current_balance}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم المورد</label>
                                <input type="text" class="form-control form-control-sm" autocomplete="off"
                                    required name="acc_name" id="acc_name" value="{{$data->sup_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عنوان سكن المورد</label>
                                <input type="text" class="form-control form-control-sm" required name="address"
                                    id="address" value="{{$data->sup_address}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ايميل المورد</label>
                                <input type="email" class="form-control form-control-sm" required name="email"
                                    id="email" value="{{$data->sup_email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>صورة المورد</label>
                                <img src="{{$data->sup_image}}" width="150"  height="150" name="pic"
                                id="pic" >
                
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary btn-sm">تأكيد</button>
                        <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">إغلاق</button>
                    </div>
                </form>
 