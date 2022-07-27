<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <h3 class="title"><?php echo $this->title; ?></h3>
  </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<p class="pull-right top-p">
			<button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
		</p>
	</div>
</div><!-- End Row -->
<hr class="margin-bottom-30"/>
<form class="form-horizontal">
	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Username</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<select class="width-100" id="user">
				<option value="">Please Select</option>
				<?php echo select_user($user_id); ?>
			</select>
    </div>
		<div class="col-xs-12 col-sm-reset inline red margin-top-5" id="user-error"></div>
  </div>


	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Customer Team</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<select class="form-control" id="team_id">
				<option value="">Please Select</option>
        <?php echo select_team($team_id); ?>
      </select>
    </div>
		<div class="col-sm-reset inline red margin-top-5" id="team-error"></div>
  </div>


  <div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Max Discount</label>
    <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-12">
			<span class="input-icon input-icon-right">
			<input type="number" id="disc" class="form-control text-center" style="font-size:14px;"  value="<?php echo $max_disc; ?>">
			<i class="ace-icon fa fa-percent"></i>
			</span>
    </div>
		<div class="col-sm-reset inline red margin-top-5" id="disc-error"></div>
  </div>

	<div class="divider-hidden"></div>

	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label"></label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<label>
				<input type="checkbox" class="ace" id="status" <?php echo is_checked(1, $status); ?> />
				<span class="lbl">&nbsp; Active</span>
			</label>
    </div>
  </div>

	<div class="divider-hidden"></div>

  <div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label"></label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">
			<button type="button" class="btn btn-sm btn-success btn-100" onclick="update()">Update</button>
    </div>
  </div>

	<input type="hidden" id="id" value="<?php echo $id; ?>">
</form>
<script>
	$('#user').select2();
</script>
<script src="<?php echo base_url(); ?>scripts/approver/approver.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
