<div class="row">
	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>เลขที่เอกสาร</label>
      <input type="text" class="form-control input-sm text-center" value="SO-22030009" disabled />
    </div>
    <div class="col-lg-1 col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    	<label>วันที่</label>
			<input type="text" class="form-control input-sm text-center edit" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" disabled readonly />
    </div>
		<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-4 padding-5">
			<label>รหัสลูกค้า</label>
			<input type="text" class="form-control input-sm text-center edit" id="customer_code" name="customer_code" value="CL-001" disabled />
		</div>
    <div class="col-lg-4 col-md-6-harf col-sm-6-harf col-xs-8 padding-5">
    	<label>ลูกค้า</label>
			<input type="text" class="form-control input-sm edit" id="customer" name="customer" value="Home Pro" required disabled />
    </div>

    <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>ช่องทางขาย</label>
			<select class="form-control input-sm" name="channels" disabled>
				<option value="">ทั้งหมด</option>
				<option value="">ตัวแทน</option>
				<option value="" selected>MT</option>
				<option value="">Line OA</option>
				<option value="">Website</option>
				<option value="">Fanpage</option>
				<option value="">Lazada</option>
				<option value="">Shopee</option>
			</select>
    </div>
    <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>การชำระเงิน</label>
			<select class="form-control input-sm" name="payment" disabled>
				<option value="">ทั้งหมด</option>
				<option value="" selected>เครดิต</option>
				<option value="">เงินสด</option>
				<option value="">COD</option>
				<option value="">เงินโอน</option>
				<option value="">Credit Card</option>
			</select>
    </div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 padding-5">
			<label class="display-block not-show">แก้ไข</label>
			<button type="button" class="btn btn-xs btn-warning btn-block" id="btn-edit"> แก้ไข</i></button>
			<button type="button" class="btn btn-xs btn-success btn-block hide" id="btn-update">บันทึก</i></button>
		</div>
</div>
<hr class="margin-bottom-15 padding-5"/>
