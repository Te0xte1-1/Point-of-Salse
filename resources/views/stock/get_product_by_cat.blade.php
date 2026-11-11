@foreach ($data as $item)
    <tr>
        <td>{{ $item->cat_name }}</td>
        <td>{{ $item->pro_name }}</td>
        <td>{{ $item->batch_id }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->unit_cost_price }}</td>
        <td>{{ $item->total_cost_unit }}</td>
        <td>{{ $item->risk }}</td>
        <td>
            @if ($item->expiration_date == '')
                بدون تاريخ إنتهاء
            @else
                {{ $item->expiration_date }}
            @endif
        </td>
    </tr>
@endforeach
