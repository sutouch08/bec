<div class="row">
	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5 hidden-xs">
    	<label>Web No.</label>
      <input type="text" class="form-control input-sm text-center" value="" disabled />
    </div>

		<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-4 padding-5">
			<label>Custmer Code</label>
			<input type="text" class="form-control input-sm text-center edit" id="customer_code" value="" autofocus />
		</div>
    <div class="col-lg-5 col-md-4-harf col-sm-8 col-xs-8 padding-5">
    	<label>Customer Name</label>
			<input type="text" class="form-control input-sm edit" id="customer_name" value="" readonly />
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    	<label>Sale Channels</label>
			<select class="form-control input-sm" id="channels" name="channels" >
				<?php echo select_channels($default_channels); ?>
			</select>
    </div>
    <div class="col-lg-2 col-md-1-harf col-sm-2-harf col-xs-6 padding-5">
    	<label>Payment Term</label>
			<select class="form-control input-sm" id="payment" name="payment" disabled>
				<?php echo select_payment_term(); ?>
			</select>
    </div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Posting date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="DocDate" class="form-control input-sm" value="<?php echo date('d-m-Y'); ?>" readonly/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Delivery date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="ShipDate" class="form-control input-sm" value="<?php echo date('d-m-Y'); ?>" readonly/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-1-harf col-md-1-harf col-sm-2 col-xs-4 padding-5">
			<label>Document date</label>
			<span class="input-icon input-icon-right">
			<input type="text" id="TextDate" class="form-control input-sm" value="<?php echo date('d-m-Y'); ?>" readonly/>
			<i class="ace-icon fa fa-calendar-o"></i>
			</span>
		</div>

		<div class="col-lg-6-harf col-md-6-harf col-sm-10-harf col-xs-9 padding-5">
			<label>Remark</label>
			<input type="text" id="remark" class="form-control input-sm" maxlength="254" value="">
		</div>

		<input type="hidden" id="batchNo" value="<?php echo $this->_user->batch_no; ?>" />

	<?php if($this->pm->can_add) : ?>
		<div class="col-lg-1 col-md-1 col-sm-1-harf col-xs-3 padding-5">
			<label class="display-block not-show">add</label>
			<button type="button" class="btn btn-xs btn-primary btn-block" onclick="saveAdd()">Add</i></button>
		</div>
	<?php endif; ?>
</div>

<hr class="margin-top-15 padding-5"/>
