<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
			<table class="table table-striped border-1" style="border-collapse:inherit; min-width:1280px; margin-bottom:0px;">
        <thead>
        	<tr class="font-size-12">
						<th class="fix-width-40 text-center"></th>
            <th class="fix-width-60 text-center"></th>
            <th class="fix-width-120">รหัส</th>
            <th class="min-width-300">สินค้า</th>
						<th class="fix-width-80 text-center">In Stock</th>
						<th class="fix-width-80 text-center">Team</th>
						<th class="fix-width-80 text-center">Committed</th>
						<th class="fix-width-80 text-center">Available</th>
            <th class="fix-width-100 text-center">ราคา</th>
            <th class="fix-width-100 text-center">จำนวน</th>
            <th class="fix-width-120 text-center">ส่วนลด(%)</th>
						<th class="fix-width-80 text-center">Tax Code</th>
            <th class="fix-width-120 text-center">มูลค่าหลังส่วนลดก่อนภาษี</th>
            </tr>
        </thead>
        <tbody id="detail-table">
					<?php $row_num = 0; ?>
					<?php if( ! empty($details)) : ?>
						<?php foreach($details as $rs) : ?>
							<?php $no = $rs->id; ?>
							<?php $row_num++; ?>
		          <tr class="font-size-12" id="row-<?php echo $no; ?>">
								<input type="hidden" id="price-<?php echo $no; ?>" value="<?php echo $rs->Price; ?>" />
								<input type="hidden" id="sellPrice-<?php echo $no; ?>" value="<?php echo $rs->SellPrice; ?>" />
								<input type="hidden" id="sysSellPrice-<?php echo $no; ?>" value="<?php echo $rs->sysSellPrice; ?>" />
								<input type="hidden" class="line-num" id="line-num-<?php echo $no; ?>" value="<?php echo $no; ?>" />
								<input type="hidden" id="disc-amount-<?php echo $no; ?>" value="<?php echo $rs->discAmount; ?>"/>
								<input type="hidden" id="line-disc-amount-<?php echo $no; ?>" value="<?php echo $rs->totalDiscAmount; ?>" />
								<input type="hidden" id="line-total-<?php echo $no; ?>" value="<?php echo $rs->LineTotal; ?>" />
								<input type="hidden" id="vat-rate-<?php echo $no; ?>" value="<?php echo $rs->VatRate; ?>" />
								<input type="hidden" id="vat-amount-<?php echo $no; ?>" value="<?php echo $rs->VatAmount; ?>" />
								<input type="hidden" id="vat-total-<?php echo $no; ?>" value="<?php echo $rs->totalVatAmount; ?>" />
								<input type="hidden" id="sys-disc-label-<?php echo $no; ?>"  value="<?php echo $rs->sysDiscLabel; ?>" />
								<input type="hidden" id="disc-diff-<?php echo $no; ?>" value="<?php echo $rs->discDiff; ?>" />
								<td class="middle text-center">
									<label><input type="checkbox" class="ace del-chk" value="<?php echo $no; ?>"><span class="lbl"></span></label>
								</td>
		      			<td class="middle text-center padding-0">
									<img src="<?php echo get_image_path($rs->product_id, 'mini'); ?>" width="40px" height="40px"  />
								</td>
		      			<td class="middle">
									<input type="text" class="form-control input-sm item-code" id="item-code-<?php echo $no; ?>" value="<?php echo $rs->ItemCode; ?>" />
								</td>
		            <td class="middle">
									<input type="text" class="form-control input-sm item-name" id="item-name-<?php echo $no; ?>" value="<?php echo $rs->ItemName; ?>" />
								</td>
								<td class="middle">
									<input type="number" class="form-control input-sm text-center" id="instock-<?php echo $no; ?>" value="<?php echo number($rs->instock); ?>" disabled/>
								</td>
								<td class="middle">
									<input type="number" class="form-control input-sm text-center" id="team-<?php echo $no; ?>" value="<?php echo number($rs->team); ?>" disabled/>
								</td>
								<td class="middle">
									<input type="number" class="form-control input-sm text-center" id="commit-<?php echo $no; ?>" value="<?php echo number($rs->commit); ?>" disabled/>
								</td>
								<td class="middle">
									<input type="number" class="form-control input-sm text-center" id="available-<?php echo $no; ?>" value="<?php echo number($rs->available); ?>" disabled/>
								</td>
		            <td class="middle text-center">
									<input type="text" class="form-control input-sm text-center price-label" id="price-label-<?php echo $no; ?>" value="<?php echo number($rs->Price, 2); ?>" disabled/>
								</td>
								<td class="middle text-center">
									<input type="number" class="form-control input-sm text-center line-qty" id="line-qty-<?php echo $no; ?>" value="<?php echo round($rs->Qty, 2); ?>" onchange="recalAmount(<?php echo $no; ?>)"/>
								</td>
								<td class="middle text-center">
									<input type="text" class="form-control input-sm text-center" id="disc-label-<?php echo $no; ?>" value="<?php echo $rs->discLabel; ?>" onchange="recalAmount(<?php echo $no; ?>)"/>
								</td>
								<td class="middle text-center">
									<input type="text" class="form-control input-sm text-center" id="vat-code-<?php echo $no; ?>" value="<?php echo $rs->VatGroup; ?>" disabled />
								</td>
		            <td class="middle text-right">
		            	<input type="text" class="form-control input-sm text-right line-total" id="total-label-<?php echo $no; ?>" value="<?php echo number($rs->LineTotal, 2); ?>" disabled/>
		            </td>
		          </tr>
				<?php endforeach; ?>
			<?php else : ?>
				<?php $row_num++; ?>
			<?php endif; ?>
        	</tbody>
        </table>

				<input type="hidden" id="row-num" value="<?php $row_num; ?>"
    </div>
</div>
