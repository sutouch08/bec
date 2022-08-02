<?php $this->load->view('bp_order/bp_header'); ?>

<div class="row">
	<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 padding-5">
		<span class="input-icon input-icon-right width-100">
			<input type="text" class="width-100 input-lg" id="search-box">
			<i id="search-icon" class="ace-icon fa fa-search" style="font-size:20px; line-height:40px;" onclick="search()"></i>
			<i id="clear-icon" class="ace-icon fa fa-times hide" style="font-size:20px; line-height:40px;" onclick="clear()"></i>
		</span>
	</div>
</div>
<div class="divider">	</div>
<?php  if(!empty($last_sale)) : ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 font-size-18" style="padding-left:10px; padding-top:5px; padding-bottom:5px; background-color:salmon; color:white;">
			ซื้อล่าสุด
		</div>
	</div>
</div>
<div class="row margin-top-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
		<div class="owl-carousel">
				<?php foreach($last_sale as $rs) : ?>
					<div class="item-box" onclick="showItem('<?php echo $rs->code; ?>')">
						<div class="img width-100 display-block">
							<img src="<?php echo $rs->image_path; ?>" class="width-100" />
						</div>
						<div class="item-description"><?php echo $rs->name; ?></div>
						<div class="item-sku">SKU : <?php echo $rs->code; ?></div>
						<div class="item-price"><?php echo number($rs->price, 2); ?> ฿</div>
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="divider">	</div>
<?php endif; ?>

<?php  if(!empty($home)) : ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 font-size-18" style="padding-left:10px; padding-top:5px; padding-bottom:5px; background-color:salmon; color:white;">
			แนะนำ
		</div>
	</div>
</div>
<div class="row margin-top-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="owl-carousel">
				<?php foreach($home as $rs) : ?>
					<div class="item-box" onclick="showItem('<?php echo $rs->code; ?>')">
						<div class="img width-100 display-block">
							<img src="<?php echo $rs->image_path; ?>" class="width-100" />
						</div>
						<div class="item-description"><?php echo $rs->name; ?></div>
						<div class="item-sku">SKU : <?php echo $rs->code; ?></div>
						<div class="item-price"><?php echo number($rs->price, 2); ?> ฿</div>
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="divider visible-xs" style="margin-bottom:35px;"></div>

<input type="hidden" id="priceList" value="<?php echo $customer->ListNum; ?>" />
<input type="hidden" id="quotaNo" value="<?php echo $this->_user->quota_no; ?>" />
<input type="hidden" id="customer_code" value="<?php echo $customer->CardCode; ?>" />
<input type="hidden" id="payment" value="<?php echo $customer->GroupNum; ?>" />
<input type="hidden" id="channels" value="<?php echo $this->_user->channels; ?>" />

<input type="hidden" id="sell-price" value="0">
<input type="hidden" id="ItemCode" value="">

<?php $this->load->view('bp_order/cart_modal'); ?>
<?php $this->load->view('bp_order/cart_bar'); ?>

<script src="<?php echo base_url(); ?>scripts/bp_order/bp_order.js?v=<?php echo date('Ymd'); ?>"></script>

<script>
$(document).ready(function(){
	$(".owl-carousel").owlCarousel({
		"loop" : false,
		"margin" : 10,
		"autoWidth" : true,
		"dots" : false,
		"smartSpeed" : 0
	});
});
</script>

<?php $this->load->view('bp_order/bp_footer'); ?>
