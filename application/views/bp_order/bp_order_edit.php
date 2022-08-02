<?php $this->load->view('include/header'); ?>
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
