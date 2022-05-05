<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    	<p class="pull-right top-p">
        <button type="button" class="btn btn-xs btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> กลับ</button>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<div class="row">
	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>เลขที่เอกสาร</label>
      <input type="text" class="form-control input-sm text-center" value="SO-22030009" disabled />
    </div>
    <div class="col-lg-1 col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    	<label>วันที่</label>
			<input type="text" class="form-control input-sm text-center edit" id="date" value="<?php echo date('d-m-Y'); ?>" readonly />
    </div>
		<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-4 padding-5">
			<label>รหัสลูกค้า</label>
			<input type="text" class="form-control input-sm text-center edit" id="customer_code" value="" placeholder="Press * get list" />
		</div>
    <div class="col-lg-4 col-md-6-harf col-sm-6-harf col-xs-8 padding-5">
    	<label>ลูกค้า</label>
			<input type="text" class="form-control input-sm edit" id="customer_name" value="" readonly />
    </div>

    <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>ช่องทางขาย</label>
			<select class="form-control input-sm" name="channels" >
				<option value="">ทั้งหมด</option>
				<option value="">ตัวแทน</option>
				<option value="">MT</option>
				<option value="">Line OA</option>
				<option value="">Website</option>
				<option value="">Fanpage</option>
				<option value="">Lazada</option>
				<option value="">Shopee</option>
			</select>
    </div>
    <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>การชำระเงิน</label>
			<select class="form-control input-sm" name="payment" >
				<option value="">ทั้งหมด</option>
				<option value="">เครดิต</option>
				<option value="">เงินสด</option>
				<option value="">COD</option>
				<option value="">เงินโอน</option>
				<option value="">Credit Card</option>
			</select>
    </div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 padding-5">
			<label class="display-block not-show">add</label>
			<button type="button" class="btn btn-xs btn-primary btn-block"> Add</i></button>
		</div>
</div>

<hr class="padding-5 margin-top-15">

<script src="<?php echo base_url(); ?>scripts/quotation/quotation.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
