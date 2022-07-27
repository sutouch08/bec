<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owlcarousel/owl.theme.default.min.css">
<?php $ac = 8; ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:10px;">
		<div style="padding:10 0; font-size:18px; color:#212121;">Category</div>
		<div class="owl-carousel">
		<?php $tabs = $this->product_category_model->get_by_level(4); ?>
			<?php  if(!empty($tabs)) : ?>
				<?php foreach($tabs as $rs) : ?>
					<div class="text-center border-1 <?php echo ($ac == $rs->id ? 'cat-active' : ''); ?>" style="min-width:100px; height:35px; padding:7px 12px 8px">
						<a data-toggle="tab"
							href="#cat-<?php echo $rs->id; ?>"
							data-code="<?php echo $rs->code; ?>"
							aria-expanded="false"
							onclick="getChild(<?php echo $rs->id; ?>)">
							<?php echo $rs->name; ?>
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<hr class="padding-5"/>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:10px;">
		<div style="font-size:16px; color:#212121;">SubCategory</div>
		<div class="owl-carousel" id="subCate">
			<?php $subCate = $this->product_category_model->get_by_parent($ac); ?>
			<?php  if(!empty($subCate)) : ?>
				<?php foreach($subCate as $rs) : ?>
					<div class="text-center border-1" style="min-width:100px; height:35px; padding:7px 12px 8px">
						<a data-toggle="tab"
							href="#cat-<?php echo $rs->id; ?>"
							data-code="<?php echo $rs->code; ?>"
							aria-expanded="false"
							onclick="setFilter('category', <?php echo $rs->id; ?>)">
							<?php echo $rs->name; ?>
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-xs-12 padding-5" >
		<div class="tabbable tabs-left" style="display:flex;">
			<div class="tab-content width-100 margin-bottom-10" style="padding:0px; border:0px; min-height:300px;">
				<div id="item-list" class="tab-pane active">

		<?php if(!empty($qs)) : ?>
			<?php foreach($qs as $rs) : ?>
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6" style="padding:5px;">
					<div class="border-1" style="padding:10px;">
						<div class="image">
							<a href="javascript:void(0)" onclick="getOrderItemGrid('<?php echo $rs->code; ?>')">
								<img class="img-responsive" src="<?php echo get_product_image($rs->code, 'default'); ?>" />
							</a>
						</div>
						<div class="description" style="overflow: hidden; line-height: 18px; height:42px; font-size:16px; font-weight:400;">
							ssssssssssssssssss<?php echo $rs->name; ?>
						</div>
						<div class="description" style="height:20px; font-size:10px;">
							รหัสสินค้า &nbsp;&nbsp;<?php echo $rs->code; ?>
						</div>
						<div class="price red bold margin-bottom-15" style="font-size:18px;">
							<?php echo number($rs->price, 2); ?> ฿
						</div>
						<div class="row" style="margin-left:-5px; margin-right:-5px;">
							<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 padding-5 margin-bottom-10">
								<div class="input-group">
									<span class="input-group-btn"><button type="button" class="btn btn-white padding-5"><i class="fa fa-minus"></i></button></span>
									<input type="number" class="form-control text-center" style="font-size:14px;" value="1" id="<?php echo $rs->code; ?>" />
									<span class="input-group-btn"><button type="button" class="btn btn-white padding-5"><i class="fa fa-plus"></i></button></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 padding-5">
								<button type="button" class="btn btn-sm btn-danger btn-block">เพิ่ม</button>
							</div>
						</div>

					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>

				</div>
				<?php if(!empty($tabs)) : ?>
					<?php foreach($tabs as $rs) : ?>
						<div id="cat-<?php echo $rs->id; ?>" class="tab-pane"></div>
				<?php endforeach; ?>
			<?php endif; ?>

			</div>
		</div>
	</div>


</div>

<script src="<?php echo base_url(); ?>assets/js/owlcarousel/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
	$(".owl-carousel").owlCarousel({
		"margin" : 10,
		"autoWidth" : true,
		"dots" : false
	});
});
</script>
