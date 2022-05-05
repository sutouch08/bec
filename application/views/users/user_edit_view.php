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
    <label class="col-sm-3 control-label no-padding-right">User name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="uname" id="uname" class="width-100" value="<?php echo $data->code; ?>" required disabled />
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Display name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="dname" id="dname" class="width-100" value="<?php echo $data->name; ?>" autofocus required />
    </div>
      </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Sales Person</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
				<option value="1" <?php echo is_selected('มานี มีน้ำใจ', $data->sale); ?>>มานี มีน้ำใจ</option>
				<option value="2" <?php echo is_selected('มานะ บากบั่น', $data->sale); ?>>มานะ บากบั่น</option>
				<option value="3" <?php echo is_selected('สมใจ ดีดังใจ', $data->sale); ?>>สมใจ ดีดังใจ</option>
      </select>
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Customer Team</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
        <option value="1" <?php echo is_selected('Customer Team 1', $data->team); ?>>Customer Team 1</option>
				<option value="1" <?php echo is_selected('Customer Team 2', $data->team); ?>>Customer Team 2</option>
				<option value="2" <?php echo is_selected('Customer Team 3', $data->team); ?>>Customer Team 3</option>
				<option value="3" <?php echo is_selected('Customer Team 4', $data->team); ?>>Customer Team 4</option>
      </select>
    </div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">User Group</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
        <option value="1" <?php echo is_selected('BEC', $data->group); ?>>BEC</option>
				<option value="1" <?php echo is_selected('Customer', $data->group); ?>>Customer</option>
      </select>
    </div>
		<label class="col-sm-1-harf control-label no-padding-right">Customer Name</label>
		<div class="col-xs-12 col-sm-3">
			<select class="form-control" <?php echo ($data->group == 'Customer' ? '' : 'disabled'); ?>>
				<option value="">Select</option>
				<option value="1">ร้าน เฟอร์นิเจอร์</option>
				<option value="1">ร้าน อุปกรณ์ไฟฟ้า</option>
			</select>
		</div>
  </div>


  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Profile</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control" name="profile" id="profile">
        <option value="">Select</option>
        <option value="1" <?php echo is_selected(1, $data->profile); ?>>Administrator</option>
				<option value="2" <?php echo is_selected(2, $data->profile); ?>>Manager</option>
				<option value="3" <?php echo is_selected(3, $data->profile); ?>>Sales Rep.</optoin>
      </select>
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Status</label>
    <div class="col-xs-12 col-sm-3">
			<div class="radio">
				<label>
					<input type="radio" class="ace" name="status" value="1" checked />
					<span class="lbl padding-5">  Active</span>
				</label>
				<label>
					<input type="radio" class="ace" name="status" value="0" />
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
        <button type="button" class="btn btn-sm btn-success" onclick="save()" style="width:100px;">Update</button>
      </p>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline">
      &nbsp;
    </div>
  </div>
</form>

<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
