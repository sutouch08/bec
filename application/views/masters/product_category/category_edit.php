<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
  </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
		<p class="pull-right top-p">
			<button type="button" class="btn btn-xs btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
		</p>
	</div>
</div><!-- End Row -->
<hr class="padding-5"/>

<form class="form-horizontal" id="addForm" method="post">
  <div class="form-group margin-top-30">
    <label class="col-lg-3 col-md-3 col-sm-3 hidden-xs control-label no-padding-right">ชื่อ</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
				<label class="visible-xs">ชื่อ</label>
			<input type="text" name="name" id="name" class="width-100" value="<?php echo $name; ?>" autofocus />
    </div>
		<div class="col-xs-3 visible-xs">
			<label>Level</label>
			<input type="text" class="width-100 text-center" value="<?php echo $level; ?>" disabled />
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="name-error"></div>
  </div>

	<div class="form-group hidden-xs">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label no-padding-right">Level</label>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
			<input type="text" class="width-100 text-center" value="<?php echo $level; ?>" disabled />
    </div>
  </div>



	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label no-padding-right">Parent</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:8px;">
			<?php echo getCategoryTree($id); ?>
    </div>
  </div>

	<div class="divider-hidden"></div>

  <div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 hidden-xs control-label no-padding-right"></label>
    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
      <p class="pull-right ">
        <button type="button" class="btn btn-sm btn-success btn-100" onclick="update()">Update</button>
      </p>
    </div>

		<div class="col-xs-12 text-center visible-xs">
			<button type="button" class="btn btn-sm btn-success btn-100" style="margin:auto;" onclick="update()">Update</button>
    </div>

  </div>

	<input type="hidden" id="id" value="<?php echo $id; ?>" />
</form>

<script src="<?php echo base_url(); ?>scripts/masters/product_category.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
