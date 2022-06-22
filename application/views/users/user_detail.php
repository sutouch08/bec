<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
  </div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<p class="pull-right top-p">
			<button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
		</p>
	</div>
</div><!-- End Row -->
<hr class="margin-bottom-30"/>
<form class="form-horizontal" id="addForm" method="post">
	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Username</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" maxlength="50" value="<?php echo $user->uname; ?>" readonly/>
    </div>
  </div>

	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Display name</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" maxlength="100" value="<?php echo $user->name; ?>" readonly/>
    </div>
  </div>

	<div class="form-group">
  	<label class="col-lg-3 col-md-3 col-sm-3 col-xs-6 control-label">Sales Person</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo $user->sale_name; ?>" readonly>
    </div>
  </div>

	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Customer Team</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo ($user->team_id == NULL ? "-No Customer Team-" : $user->team_name); ?>" readonly>
    </div>
  </div>


	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">User Group</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo ($user->is_customer ? 'Customer' : 'BEC'); ?>" readonly>
    </div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label ">Customer</label>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo $user->customer_name; ?>" readonly>
		</div>
  </div>


  <div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Permission Profile</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo $user->profile_name; ?>" readonly>
    </div>
  </div>


	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Last password change</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" class="form-control" value="<?php echo thai_date($user->last_pass_change, FALSE, '.'); ?>" readonly>
    </div>
  </div>


	<div class="form-group">
    <label class="col-lg-3 col-md-3 col-sm-3 hidden-xs control-label">Status</label>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<label style="margin-top:7px; padding-left:10px;">
				<?php echo $user->active == 1 ? '<span class="green">Active</span>' : '<span class="red">Inactive</span>'; ?>
			</label>
    </div>
  </div>


	<div class="divider-hidden"></div>

</form>

<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
