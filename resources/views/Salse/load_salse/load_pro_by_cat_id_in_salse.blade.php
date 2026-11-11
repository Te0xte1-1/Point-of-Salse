@if ($data == '')
    <option value="">القسم فارغ</option>
@else
    <select class="form-control form-control-sm" name="pro_invoice" id="pro_invoice">
        <option value="0">اختر الصنف</option>
        @foreach ($data->products as $pro_item)
            <option value="{{ $pro_item->id }}" data-serial="{{ $pro_item->id }}"
                data-pro="{{ $pro_item->product_name }}">{{ $pro_item->product_name }}</option>
        @endforeach
    </select>
@endif
