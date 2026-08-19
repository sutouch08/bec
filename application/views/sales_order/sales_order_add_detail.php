<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-5">
		<button type="button" class="btn btn-sm btn-info" onclick="addRow()">Add Row</button>
		<button type="button" class="btn btn-sm btn-warning" onclick="removeRow()">Delete Row</button>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-5">
		<p class="pull-right" id="free-box"></p>
	</div>
	<div class="hide" id="free-temp"></div>


	<div class="divider-hidden"> </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-1 table-responsive" style="height:400px; overflow:auto; padding:0px; margin-left:5px;">
		<table class="table table-bordered border-1 tableFixHead" style="min-width:1948px;">
			<thead>
				<tr class="font-size-10 freez">
					<th class="fix-width-40 middle text-center fix-no fix-header">#</th>
					<th class="fix-width-40 middle text-center fix-chk fix-header"></th>
					<th class="fix-width-60 middle text-center fix-img fix-header">Image</th>
					<th class="fix-width-150 middle text-center fix-item fix-header">Item Code</th>
					<th class="fix-width-250 middle text-center fix-desc fix-header">Description.</th>
					<th class="fix-width-100 middle text-center">Warehouse</th>
					<th class="fix-width-80 middle text-center">In Stock</th>
					<th class="fix-width-100 middle text-center">Quota No.</th>
					<th class="fix-width-80 middle text-center">Quota</th>
					<th class="fix-width-80 middle text-center">Commited</th>
					<th class="fix-width-80 middle text-center">Available</th>
					<th class="fix-width-100 middle text-center">Quantity</th>
					<th class="fix-width-100 middle text-center">Uom</th>
					<th class="fix-width-100 middle text-center">Std Price</th>
					<th class="fix-width-100 middle text-center">Price</th>
					<th class="fix-width-150 middle text-center">Discount(%)</th>
					<th class="fix-width-80 middle text-center">Tax Code</th>
					<th class="fix-width-120 middle text-center">Price after discount</th>
					<th class="fix-width-150 middle text-center">Amount before tax</th>
					<th class="fix-width-60 middle text-center"></th>
				</tr>
			</thead>
			<tbody id="details-template">
				<?php $no = 1; ?>
				<?php $dwh = getConfig('DEFAULT_WAREHOUSE'); ?>
				<?php $whs = select_listed_warehouse($dwh); ?>
				<?php $qn = select_listed_quota($this->_user->quota_no); ?>
				<?php $uuid = uniqid(rand(1, 100)); ?>
				<tr id="row-<?php echo $no; ?>">
					<input type="hidden" id="product-id-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="price-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="stdPrice-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="sellPrice-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="sysSellPrice-<?php echo $no; ?>" value="0" />
					<input type="hidden" class="line-num" id="line-num-<?php echo $no; ?>" value="<?php echo $no; ?>" />
					<input type="hidden" id="disc-amount-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="line-disc-amount-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="totalDiscPercent-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="line-total-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="vat-rate-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="vat-amount-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="vat-total-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="sys-disc-label-<?php echo $no; ?>" value="" />
					<input type="hidden" id="uom-code-<?php echo $no; ?>" value="" />
					<input type="hidden" class="disc-diff" id="disc-diff-<?php echo $no; ?>" value="0" />
					<input type="hidden" id="rule-id-<?php echo $no; ?>" value="" />
					<input type="hidden" id="policy-id-<?php echo $no; ?>" value="" />
					<input type="hidden" class="disc-error" id="disc-error-<?php echo $no; ?>" value="0" data-id="<?php echo $no; ?>" />
					<input type="hidden" class="is-free" id="is-free-<?php echo $no; ?>"
						value="0" data-id="<?php echo $no; ?>"
						data-parent="" data-parentrow="" />
					<input type="hidden" id="<?php echo $uuid; ?>" data-id="<?php echo $no; ?>" value="<?php echo $no; ?>" />
					<input type="hidden" id="disc-type-<?php echo $no; ?>" value="P" />
					<input type="hidden" id="count-stock-<?php echo $no; ?>" value="1" />
					<input type="hidden" id="allow-change-discount-<?php echo $no; ?>" value="1" />

					<td class="middle text-center fix-no no handle" scope="row"><?php echo $no; ?></td>
					<td class="middle text-center fix-chk" scope="row">
						<input type="checkbox" class="ace del-chk" value="<?php echo $no; ?>" />
						<span class="lbl"></span>
					</td>
					<td class="middle text-center fix-img" scope="row" id="img-<?php echo $no; ?>">
					</td>
					<td class="middle fix-item" scope="row">
						<input type="text" class="form-control input-sm item-code" data-id="<?php echo $no; ?>" id="itemCode-<?php echo $no; ?>" value="" />
					</td>
					<td class="middle fix-desc" scope="row">
						<input type="text" class="form-control input-sm item-name" data-id="<?php echo $no; ?>" id="itemName-<?php echo $no; ?>" value="" />
					</td>

					<td class="middle">
						<select class="form-control input-sm whs" data-id="<?php echo $no; ?>" id="whs-<?php echo $no; ?>" onchange="getStock(<?php echo $no; ?>)">
							<option value=""></option>
							<?php echo $whs; ?>
						</select>
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm" id="instock-<?php echo $no; ?>" value="" disabled />
					</td>

					<td class="middle">
						<select class="form-control input-sm quota" data-id="<?php echo $no; ?>" id="quota-<?php echo $no; ?>" onchange="getStock(<?php echo $no; ?>)">
							<option value=""></option>
							<?php echo $qn; ?>
						</select>
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm" id="team-<?php echo $no; ?>" value="" disabled />
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm" id="commit-<?php echo $no; ?>" value="" disabled />
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm" id="available-<?php echo $no; ?>" value="" disabled />
					</td>

					<td class="middle">
						<input type="number" class="form-control input-sm text-right line-qty"
							data-id="<?php echo $no; ?>" id="line-qty-<?php echo $no; ?>"
							value="" onkeyup="recalAmount(<?php echo $no; ?>)" />
					</td>
					<td class="middle">
						<input type="text" class="form-control input-sm text-center" id="uom-<?php echo $no; ?>" value="" disabled />
					</td>
					<td class="middle">
						<input type="text" class="form-control input-sm text-right number" id="stdPrice-label-<?php echo $no; ?>" value="" disabled />
					</td>
					<td class="middle">
						<input type="text" class="form-control input-sm text-right number" id="price-label-<?php echo $no; ?>"
							value="" onchange="recalAmount(<?php echo $no; ?>)" disabled />
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm text-right " id="disc-label-<?php echo $no; ?>"
							value="" onchange="recalDiscount(<?php echo $no; ?>)" />
					</td>
					<td class="middle">
						<input type="text" class="form-control input-sm text-center" id="vat-code-<?php echo $no; ?>" value="" disabled />
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm text-right" id="sell-price-<?php echo $no; ?>" value="" readonly disabled>
					</td>

					<td class="middle">
						<input type="text" class="form-control input-sm text-right number input-amount" id="total-label-<?php echo $no; ?>" value="" readonly disabled />
					</td>
					<td class="middle text-center">
					</td>
				</tr>
				<?php $no++; ?>
			</tbody>
		</table>

		<input type="hidden" id="row-no" value="<?php echo $no; ?>" />
	</div>
</div>
<hr class="padding-5" />


<?php $this->load->view('sales_order/sales_detail_template'); ?>