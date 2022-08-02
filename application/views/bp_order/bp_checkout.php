<?php $this->load->view('bp_order/bp_header'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5">
			<h3 class="title">Checkout</h3>
		</div>
	</div>
	<hr class="padding-5" />
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
				<label>ที่อยู่จัดส่ง</label>
				<select class="width-100" id="shipToCode" onchange="getShipToAddress()">
					<?php if(!empty($shipToCode)) : ?>
						<?php foreach($shipToCode as $sh) : ?>
							<option value="<?php echo $sh->code; ?>" <?php echo is_selected($sh->code, $shipCode); ?>><?php echo $sh->name; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<textarea id="ShipTo" class="autosize autosize-transition form-control margin-top-10" readonly><?php echo $shipTo; ?></textarea>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
				<label>ที่อยู่เปิดบิล</label>
				<select class="width-100" id="billToCode" onchange="getBillToAddress()">
					<?php if(!empty($billToCode)) : ?>
						<?php foreach($billToCode as $sh) : ?>
							<option value="<?php echo $sh->code; ?>" <?php echo is_selected($sh->code, $billCode); ?>><?php echo $sh->name; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<textarea id="BillTo" class="autosize autosize-transition form-control margin-top-10" readonly><?php echo $billTo; ?></textarea>
			</div>
		</div>
	</div>
	<hr class="padding-5 margin-top-15 margin-bottom-15">

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 font-size-20 margin-top-5">
			ตะกร้าสินค้า
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
			<button type="button" class="btn btn-sm btn-primary btn-100" onclick="goBack()"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp; ซื้อสินค้าต่อ</button>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<table class="table border-1 margin-top-5">
				<thead>
					<tr>
						<th class="fix-width-60"></th>
						<th class="">รายละเอียด</th>
						<th class="width-10 text-center">จำนวน</th>
						<th class="width-15 text-right">มูลค่า</th>
					</tr>
				</thead>
				<tbody>
					<?php $totalQty = 0; ?>
					<?php $totalAmount = 0; ?>
					<?php $totalDiscAmount = 0; ?>
					<?php if(!empty($cart)) : ?>
						<?php foreach($cart as $rs) : ?>
							<?php $discLabel = discountLabel($rs->disc1, $rs->disc2, $rs->disc3, $rs->disc4, $rs->disc5, '%'); ?>
							<tr>
								<td class="text-center">
									<img src="<?php echo get_image_path($rs->product_id, "medium"); ?>" width="60" />
								</td>
								<td class="">
									<span class="font-size-12 display-block">SKU : <?php echo $rs->ItemCode; ?></span>
									<span class="font-size-12"><?php echo $rs->ItemName; ?></span>
									<span class="font-size-12 blue display-block">ราคา : <?php echo number($rs->Price, 2); ?></span>
									<?php if(!empty($rs->discAmount)) : ?>
										<span class="font-size-12 green">ส่วนลด : <?php echo $discLabel; ?></span>
									<?php endif; ?>
								</td>
								<td class="text-center"><?php echo number($rs->Qty); ?></td>
								<td class="text-right"><?php echo number($rs->LineTotal, 2); ?></td>
							</tr>
							<?php $totalQty += $rs->Qty; ?>
							<?php $totalDiscAmount += $rs->totalDiscAmount; ?>
							<?php $totalAmount += $rs->LineTotal; ?>
						<?php endforeach; ?>
						<tr class="font-size-18">
							<td colspan="2" class="text-right">รวม</td>
							<td class="text-center"><?php echo number($totalQty); ?></td>
							<td class="text-right"><?php echo number($totalAmount, 2); ?></td>
						</tr>
					<?php else : ?>
						<tr>
							<td colspan="6" class="text-center">--- ไม่พบรายการสินค้า ---</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
			ข้อความของคุณ
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<textarea class="width-100" id="remark" maxlength="250"></textarea>
		</div>

		<div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-12 margin-top-10">
		<?php if( ! empty($cart)) : ?>
			<button type="button" class="btn btn-sm btn-success btn-block" onclick="placeOrder()">ยืนยันการสั่งซื้อ</button>
		<?php endif; ?>
		</div>
	</div>
</div> <!-- container -->



<input type="hidden" id="priceList" value="<?php echo $customer->ListNum; ?>" />
<input type="hidden" id="quotaNo" value="<?php echo $this->_user->quota_no; ?>" />
<input type="hidden" id="customer_code" value="<?php echo $customer->CardCode; ?>" />
<input type="hidden" id="payment" value="<?php echo $customer->GroupNum; ?>" />
<input type="hidden" id="channels" value="<?php echo $this->_user->channels; ?>" />



<script src="<?php echo base_url(); ?>scripts/bp_order/bp_order.js?v=<?php echo date('Ymd'); ?>"></script>


<?php $this->load->view('bp_order/bp_footer'); ?>
