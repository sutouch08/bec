<?php $this->load->view('include/header'); ?>
<style>
	.filter-main {
		padding-left: 15px;
	}

	.filter-segment {
		padding-top:15px;
		border-top:solid 1px #ececec;
	}

	.filetr-header {
		font-size:14px;
		font-family: Roboto-Regular;
		color:#212121;
	}

	.filter-body {
		margin-top: 10px;
		padding-bottom: 20px;
	}

	.filter-box {
		max-height: 186px;
		text-align: left;
	}

	.filter-box-1 {
		overflow: hidden;
		transition: max-height 0.5s;
	}

	.filter-box-2 {
		overflow: auto;
		max-height: 500px;
	}

	.filter-footer {
		font-family: Roboto-Medium;
    margin-top: 5px;
    color: #1a9cb7;
    cursor: pointer;
    font-size: 13px;
	}
</style>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 padding-5">
    	<h4 class="title"><?php echo $this->title; ?></h4>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 padding-5">
    	<p class="pull-right top-p">
        	<button type="button" class="btn btn-xs btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> กลับ</button>
        </p>
    </div>
</div>
<hr class="margin-bottom-15 padding-5" />

<?php $this->load->view('bp_order/bp_order_edit_header'); ?>

<?php $this->load->view('bp_order/bp_order_category_bar'); ?>
<!-- End Category Menu ------------------------------------>

<script src="<?php echo base_url(); ?>scripts/orders/orders.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/orders/order_add.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
