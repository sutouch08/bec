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
<form class="form-horizontal" id="addForm" method="post" action="<?php echo $this->home."/new_user"; ?>">

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">User name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="uname" id="uname" class="width-100" required />
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Display name</label>
    <div class="col-xs-12 col-sm-3">
			<input type="text" name="dname" id="dname" class="width-100" autofocus required />
    </div>
      </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Sales Person</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
				<option value="1">มานี มีน้ำใจ</option>
				<option value="2">มานะ บากบั่น</option>
				<option value="3">สมใจ ดีดังใจ</option>
      </select>
    </div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Customer Team</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
        <option value="1">Customer Team 1</option>
				<option value="1">Customer Team 2</option>
				<option value="2">Customer Team 3</option>
				<option value="3">Customer Team 4</option>
      </select>
    </div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">User Group</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
        <option value="1">BEC</option>
				<option value="1">Customer</option>
      </select>
    </div>
		<label class="col-sm-1-harf control-label no-padding-right">Customer Name</label>
		<div class="col-xs-12 col-sm-3">
			<select class="form-control">
				<option value="">Select</option>
				<option value="1">ร้าน เฟอร์นิเจอร์</option>
				<option value="1">ร้าน อุปกรณ์ไฟฟ้า</option>
			</select>
		</div>
  </div>



  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">New password</label>
    <div class="col-xs-12 col-sm-3">
			<span class="input-icon input-icon-right width-100">
        <input type="password" name="pwd" id="pwd" class="width-100" required />
				<i class="ace-icon fa fa-key"></i>
			</span>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" style="padding-left:15px;" id="pwd-error"></div>
  </div>

	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Confirm password</label>
    <div class="col-xs-12 col-sm-3">
			<span class="input-icon input-icon-right width-100">
        <input type="password" name="cm-pwd" id="cm-pwd" class="width-100" required />
				<i class="ace-icon fa fa-key"></i>
			</span>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" style="padding-left:15px;" id="cm-pwd-error"></div>
  </div>




  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Profile</label>
    <div class="col-xs-12 col-sm-3">
			<select class="form-control" name="profile" id="profile">
        <option value="">Select</option>
        <option value="">Admin</option>
				<option value="">Sales Rep.</optoin>
				<option value="">Manager</option>
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
        <button type="button" class="btn btn-sm btn-success" onclick="save()" style="width:100px;">Add</button>
      </p>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline">
      &nbsp;
    </div>
  </div>
	<input type="hidden" name="user_id" id="user_id" value="0" />
</form>

<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
