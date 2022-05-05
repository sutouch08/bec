<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
    </div>
		<div class="col-sm-6 padding-5">
			<p class="pull-right top-p">
				<button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
			</p>
		</div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form class="form-horizontal" id="addForm" method="post">

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Username</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control input-sm" name="uname" id="uname" style="height:34px; font-size:14px;" onchange="update_name()">
				<option value="">Select</option>
				<?php echo select_user($uname); ?>
			</select>
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="name" id="name" class="width-100" style="height:34px; font-size:14px;" value="<?php echo $name; ?>" disabled />
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Customer Team</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
        <?php echo select_team($team); ?>
      </select>
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Max Discount</label>
    <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-12">
			<span class="input-icon input-icon-right">
			<input type="number" id="discPrcnt" class="form-control input-sm text-center" style="height:34px; font-size:14px;" value="<?php echo $max_disc; ?>">
			<i class="ace-icon fa fa-percent"></i>
			</span>
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Status</label>
    <div class="col-xs-12 col-sm-3">
			<div class="radio">
				<label>
					<input type="radio" class="ace" name="status" value="1" <?php echo is_checked('1', $status); ?> />
					<span class="lbl padding-5">  Active</span>
				</label>
				<label>
					<input type="radio" class="ace" name="status" value="0" <?php echo is_checked('0', $status); ?> />
					<span class="lbl">  Inactive</span>
				</label>
			</div>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red"></div>
  </div>


	<div class="divider-hidden">

	</div>
  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right"></label>
    <div class="col-xs-12 col-sm-3">
      <p class="pull-right">
        <button type="button" class="btn btn-sm btn-success" onclick="save()" style="width:100px;">Add</button>
      </p>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline">
      &nbsp;
    </div>
  </div>
</form>

<script src="<?php echo base_url(); ?>scripts/approver/approver.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
