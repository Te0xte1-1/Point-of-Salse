@foreach ($Suppliers as $item)
<tr>
    <td><a href="{{route('Purshace.preview',$item->id)}}" >{{ $item->auto_serial }}</a></td>
    <td><a href="{{route('Purshace.preview',$item->id)}}" >
        @if ($item->supplier_id == 0)بدون عميل
        @else
        {{ $item->supplier_id }}
        @endif
       </a>
    </td>
    <td><a href="{{route('Purshace.preview',$item->id)}}" >{{ $item->order_date }}</a></td>
    <td><a href="{{route('Purshace.preview',$item->id)}}" >{{ $item->total_cost }}</a></td>
    <td>
        @if ($item->is_approved == 1)
        <a href="{{route('Purshace.preview',$item->id)}}" >فاتورة معتمدة</a>
        @else
        فاتورة مفتوحه
        @endif
    </td>
    <td>
        @if ($item->order_pay_type == 1)
            كاش
        @else
            أجل
        @endif
    </td>
    <td>{{ $item->note }}</td>
    <td>
        @if ($item->is_approved == 1)
            <a href="{{ route('Purshace.preview', $item->id) }}" title="عرض الفاتورة"
                class="btn btn-info btn-sm">

                <i class="fas fa-info"></i>
            </a>
        @else
            {{-- <a href="#"class="btn btn-primary btn-sm" value="{{ $item->id }}"
                data-toggle="modal" data-target="#modal-lg"title="إعتماد الفاتورة">
                إعتماد
                <i class="fa fa-check"></i>
            </a> --}}
            <a href="{{ route('Purshace.add_items', $item->id) }}"class="btn btn-secondary btn-sm"
                title="إضافة أصناف لهذه الفاتورة" value="{{ $item->id }}">
                فاتورة مفتوحه                 {{-- <i class="fas fa-plus"></i> --}}
            </a>

            <a href="{{ route('Purshace.edit', $item->id) }}" class="btn btn-success btn-sm"><i
                    class="fa fa-edit"></i></a>
        @endif
    </td>

</tr>
@endforeach