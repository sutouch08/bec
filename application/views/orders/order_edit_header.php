<div class="row">
	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5 hidden-xs">
    	<label>Web No.</label>
      <input type="text" class="form-control input-sm text-center" value="<?php echo $order->code; ?>" disabled />
    </div>

		<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-4 padding-5">
			<label>Custmer Code</label>
			<input type="text" class="form-control input-sm text-center edit" id="customer_code" value="<?php echo $order->CardCode; ?>" disabled />
		</div>
    <div class="col-lg-5 col-md-4-harf col-sm-8 col-xs-8 padding-5">
    	<label>Customer Name</label>
			<input type="text" class="form-control input-sm edit" id="customer_name" value="<?php echo $order->CardName; ?>" disabled />
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    	<label>Sale Channels</label>
			<select class="form-control input-sm edit" id="channels" name="channels" disabled>
				<?php echo select_channels($order->Channels); ?>
			</select>
    </div>
    <div class="col-lg-2 col-md-1-harf col-sm-2-harf col-xs-6 padding-5">
    	<label>Payment Term</label>
			<select class="form-control input-sm" id="payment" name="payment" disabled>
				<?php echo select_payment_term($order->Payment); ?>
			</select>
    </div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Posting date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="DocDate" class="form-control input-sm edit" value="<?php echo thai_date($order->DocDate); ?>" readonly disabled/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Delivery date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="ShipDate" class="form-control input-sm edit" value="<?php echo thai_date($order->DocDueDate); ?>" readonly disabled/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Document date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="TextDate" class="form-control input-sm edit" value="<?php echo thai_date($order->TextDate); ?>" readonly disabled/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-6-harf col-md-6-harf col-sm-10-harf col-xs-9 padding-5">
			<label>Remark</label>
			<input type="text" id="remark" class="form-control input-sm edit" maxlength="254" value="<?php echo $order->Comments; ?>" disabled>
		</div>

	<?php if($this->pm->can_add OR $this->pm->can_edit) : ?>
		<div class="col-lg-1 col-md-1 col-sm-1-harf col-xs-3 padding-5">
			<label class="display-block not-show">add</label>
			<button type="button" class="btn btn-xs btn-warning btn-block" id="btn-edit" onclick="getEdit()">Edit</button>
			<button type="button" class="btn btn-xs btn-primary btn-block hide" id="btn-update" onclick="update()">Update</button>
		</div>
	<?php endif; ?>

	<input type="hidden" id="code" value="<?php echo $order->code; ?>" />
	<input type="hidden" id="current_customer_code" value="<?php echo $order->CardCode; ?>" />
	<input type="hidden" id="current_channels" value="<?php echo $order->Channels; ?>" />
	<input type="hidden" id="current_posting_date" value="<?php echo thai_date($order->DocDate); ?>" />
	<input type="hidden" id="priceList" value="<?php echo $order->PriceList; ?>" />
	<input type="hidden" id="batchNo" value="<?php echo $order->batch_no; ?>" />
	<input type="hidden" id="vat_rate" value="<?php echo $order->VatRate; ?>" />
</div>

<hr class="margin-top-15 padding-5"/>
