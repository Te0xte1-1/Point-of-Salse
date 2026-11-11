   <div class="row">
       <div class="col-md-12">
           <div class="card card-info" style="background-color: #3D3D3D3D;">
               <div class="card-body">
                   <div class="row">
                       <input type="hidden" value="{{ $bill_info->order_id }}" name="updated_item_after_added_serial"
                           id="updated_item_after_added_serial">
                       <input type="hidden" value="{{ $bill_info->id }}" name="updated_item_after_added_item_id"
                           id="updated_item_after_added_item_id">
                       <input type="hidden" value="{{ $bill_info->cat_id }}" name="cat">
                       <input type="hidden" value="{{ $bill_info->item_id }}" name="pro">
                       <input type="hidden" value="{{ $bill_info->unit_id }}" name="unit">
                       <div class="col-md-4">
                           <div class="form-group">
                               <h6>القسم</h6>
                               <select class="form-control form-control-sm" disabled name="updated_item_after_added_category_id"
                                   id="updated_item_after_added_category_id" required>
                                   <option value="{{ $bill_info->cat_id }}">
                                       {{ $bill_info->cat_id }}</option>
                               </select>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">

                               <h6 style="text-align: center">الصنف</h6>
                               <select class="form-control form-control" disabled name="updated_item_after_added_pro"
                                   id="updated_item_after_added_pro">
                                   <option value="{{ $bill_info->item_id }}">
                                       {{ $bill_info->item_id }}</option>
                               </select>

                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <h6>بيانات وحدة الصنف</h6>
                               <select class="form-control form-control-sm" disabled name="updated_item_after_added_unit"
                                   id="updated_item_after_added_unit">
                                   <option value="{{ $bill_info->unit_id }}">
                                       {{ $bill_info->unit_id }}</option>
                               </select>
                           </div>
                       </div>
                   </div>


                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <h6>سعر الوحدة</h6>
                               <input type="text" value="{{ $bill_info->unit_price }}" name="updated_item_after_added_price" id="updated_item_after_added_price" class="form-control form-control-sm">
                               <input type="hidden" id="updated_item_after_added_price">
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <h6>الكمية المستلمة</h6>
                               <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ $bill_info->item_qty }}"
                                   name="updated_item_after_added_qty" class="form-control form-control-sm"
                                   id="updated_item_after_added_qty">
                           </div>
                       </div>

                       <div class="col-md-4">
                           <div class="form-group">
                               <h6>الإجمالي</h6>
                               <input type="text" name="updated_item_after_added_total_cost"
                                   id="updated_item_after_added_total_cost" value="{{ $bill_info->total_price }}"
                                   disabled class="form-control form-control-sm">
                               <input type="hidden" id="updated_item_after_added_total_cost_hidden"
                                   name="updated_item_after_added_total_cost_hidden"
                                   value="{{ $bill_info->total_price }}">
                           </div>
                       </div>
                   </div>


                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-group text-center">
                               <button type="button" id="submit_updated_item_after_added"
                                   class="btn btn-primary btn-sm update_row mt-4" value="">
                                   تحديث الصنف المضاف للفاتورة
                               </button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           </form>

           <hr style="border:1px solid  #3D3D3D3D;">
       </div>
   </div>
