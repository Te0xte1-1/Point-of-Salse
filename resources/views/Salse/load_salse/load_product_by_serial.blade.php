@if ($data == '')
    <option value="">القسم فارغ</option>
@else
    <select class="form-control form-control-sm" name="item" id="item">
        <option>اختر الصنف</option>
        @foreach ($data as $pro_item)
            <option value="{{ $pro_item->id }}" data-pro="{{$pro_item->product_name }}">{{ $pro_item->product_name }}</option>
        @endforeach
    </select>
@endif



