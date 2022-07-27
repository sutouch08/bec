
<script id="row-template" type="text/x-handlebarsTemplate">
	<tr class="font-size-12" id="row-{{id}}">
		<input type="hidden" id="price-{{id}}" value="{{Price}}" />
		<input type="hidden" id="sellPrice-{{id}}" value="{{SellPrice}}" />
		<input type="hidden" id="sysSellPrice-{{id}}" value="{{sysSellPrice}}" />
		<input type="hidden" class="line-num" id="line-num-{{id}}" value="{{id}}" />
		<input type="hidden" id="disc-amount-{{id}}" value="{{discAmount}}"/>
		<input type="hidden" id="line-disc-amount-{{id}}" value="{{totalDiscAmount}}" />
		<input type="hidden" id="line-total-{{id}}" value="{{LineTotal}}" />
		<input type="hidden" id="vat-rate-{{id}}" value="{{VatRate}}" />
		<input type="hidden" id="vat-amount-{{id}}" value="{{VatAmount}}" />
		<input type="hidden" id="vat-total-{{id}}" value="{{totalVatAmount}}" />
		<input type="hidden" id="sys-disc-label-{{id}}"  value="{{id}}" />

		<td class="middle text-center padding-0">
			<img src="{{image}}" width="40px" height="40px"  />
		</td>
		<td class="middle">
			{{ItemCode}}
		</td>
		<td class="middle">{{ItemName}}</td>
		<td class="middle text-center">
			<input type="text" class="form-control input-sm text-center price-label" id="price-label-{{id}}" value="{{PriceLabel}}" readonly/>
		</td>
		<td class="middle text-center">
			<input type="number" class="form-control input-sm text-center line-qty" id="line-qty-{{id}}" value="{{Qty}}" onchange="recalAmount({{id}})"/>
		</td>
		<td class="middle text-center">
			<input type="text" class="form-control input-sm text-center" id="disc-label-{{id}}" value="{{discLabel}}" onchange="recalAmount({{id}})"/>
		</td>
		<td class="middle text-center">
			<input type="text" class="form-control input-sm text-center" id="vat-code-{{id}}" value="{{VatGroup}}" readonly />
		</td>
		<td class="middle text-right">
			<input type="text" class="form-control input-sm text-right line-total" id="total-label-{{id}}" value="{{LineTotalLabel}}" readonly/>
		</td>
		<td class="middle text-right">
			<button type="button" class="btn btn-mini btn-danger" onClick="removeRow({{id}}, '{{ItemName}}')"><i class="fa fa-trash"></i></button>
		</td>
	</tr>
</script>
