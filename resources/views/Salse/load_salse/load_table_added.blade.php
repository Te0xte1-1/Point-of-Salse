<table>
    <tbody id="tboody_invoice">
        @if (!empty($salse_detailse2))
            @foreach ($salse_detailse2 as $item)
                <tr>
                    <td>
                        <input type="hidden" name="total_cost_item[]" id="total_cost_item" value="{{ $item->subtotal }}">
                        {{ $item->cat_name }}
                    </td>
                    <td>{{ $item->product_name }}
                    </td>
                    <td id="unit_table">{{ $item->unit_name }}
                    </td>
                    <td id="qty_table">{{ $item->qty }}
                    </td>
                    <td id="price_table">{{ $item->price }}
                    </td>
                    <td id="subtotall_invoice_input">{{ $item->subtotal }}
                    </td>
                    <td><button id="remove_active" data-id="{{ $item->id }}" class="btn btn-danger btn-sm"><i
                                class="fa fa-trash"></i></button></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="alert alert-danger">لا توجد داتا</td>
            </tr>
        @endif

    </tbody>
</table>
