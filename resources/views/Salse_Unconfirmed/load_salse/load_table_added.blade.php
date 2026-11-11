var $data =
`<tr>    
<td>1</td>
<td>
    <input type="hidden" name="gogal" value="" class="total-price"/>
    <label>${stock}</label>
    <input type="hidden" class="form-control form-control-sm" name="stock[]" value="${ stock }"/>
</td>
    <td>
        <label>${cat_id}</label>
        <input type="hidden" class="form-control form-control-sm" name="cat[]" value="${ cat_id }"/>
    </td>
    <td>
        <label>${pro}</label>
        <input type="hidden" class="form-control form-control-sm" name="pro[]" value="${ pro }"/>
    </td>
    <label>${unit}</label>
        <input type="hidden" name="unit[]" class="form-control form-control-sm" value="${unit}"/>
    </td>
    <td>
        <label>${unit}</label>
        <input type="hidden"class="form-control form-control-sm" name="unit[]" id="product-price"value="${unit}"/>
    </td>
        <td>
            <label>${qty}</label>
            <input type="hidden"class="form-control form-control-sm" min="1" name="الكمية[]" data-price="${qty}" value="${qty}" class="form-control product-الكمية" id="الكمية">
        </td>
        <td>
            <label>${price}</label>
            <input type="hidden"class="form-control form-control-sm" name="price[]" id="product-price"value="${price}"/>
    </td>
    <td>
        <label name="" id="subtotall">${subtotal}</label>
        <input type="hidden"class="form-control form-control-sm" name="sub_total[]" id="subtotal" value="sub_total" />
    </td>
</form>
<td><button class="btn btn-danger btn-sm remove_row"data-id="${cat_id}">-</button></td>
</tr>`;