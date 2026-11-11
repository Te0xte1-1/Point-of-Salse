<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-stripped table-hover">
    <thead class="table table-secondary">
        <th>كود الفاتــــــورة</th>
        <th>اسم الصنف</th>
        <th>كمية الصنف</th>
        <th>سعر شراء الصنف</th>
        <th>إجمالي </th>
        <th>اكشن</th>
    </thead>
    <tbody>
        @foreach ($get_items_from_order_bill as $item)
            <tr>
                <td>{{ $item->order_id }}</td>
                <td>{{ $item->item_id }}</td>
                <td>{{ $item->item_qty }}</td>
                <td>{{ $item->unit_price }}</td>
                <td id="td_total_price">{{ $item->total_price }}</td>
                <td>
                    @if ($get_order_bill->is_approved == 0)
                        <a href="#"class="btn btn-warning btn-sm" data-id="{{ $item->id }}"
                            value="{{ $item->id }}" id="edit_item_after_add">
                            <i class="fas fa-edit"></i>
                            <a href="#" id="delete_item" data-order_id="{{ $item->order_id }}"
                                data-delete_id="{{ $item->id }}" value="" class="btn btn-danger btn-sm m-1">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            الفاتــــــورة مغلقة ولا يمكن التعديل عليها
                    @endif
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>