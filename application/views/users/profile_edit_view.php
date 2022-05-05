<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
    </div>
		<div class="col-sm-6">
			<p class="pull-right">
				<button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
			</p>
		</div>
</div><!-- End Row -->
<hr class="title-block"/>
<form class="form-horizontal" id="addForm" method="post">

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Profile name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="profileName" id="profileName" class="width-100" value="<?php echo $data->name; ?>" autofocus required />
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="pname-error"></div>
  </div>

	<div class="divider-hidden">

	</div>
  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right"></label>
    <div class="col-xs-12 col-sm-3">
      <p class="pull-right">
        <button type="button" class="btn btn-sm btn-success" style="width:100px;" onclick="save()">Update</button>
      </p>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline">
      &nbsp;<input type="text" class="hide"/>
    </div>
  </div>
</form>

<script src="<?php echo base_url(); ?>scripts/users/profiles.js"></script>
<?php $this->load->view('include/footer'); ?>
