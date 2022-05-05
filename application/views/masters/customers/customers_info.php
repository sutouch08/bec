<form class="form-horizontal" style="margin-top:30px;">
	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">รหัส</label>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
      <input type="text" class="form-control input-sm" value="CL-002" disabled />
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="code-error"></div>
  </div>



  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">ชื่อ</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<input type="text" name="name" id="name" class="form-control input-sm" value="บริษัท โฮม โปรดักส์ เซ็นเตอร์ จำกัด" disabled />
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="name-error"></div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">กลุ่มลูกค้า</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<select name="group" id="group" class="form-control" >
				<option value="">เลือกรายการ</option>
				<option value="">ลูกค้าเงินสด</option>
				<option value="" selected>ลูกค้าเครดิต</option>
			</select>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="group-error"></div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">ประเภทลูกค้า</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<select name="kind" id="kind" class="form-control">
				<option value="">เลือกรายการ</option>
				<option value="">Retail</option>
				<option value="" selected>Modern Trade</option>
				<option value="">Tradition.</option>
				<option value="">Consignment</option>
			</select>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="kind-error"></div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">ชนิดลูกค้า</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<select name="type" id="type" class="form-control">
				<option value="">เลือกรายการ</option>
				<option value="" selected>ตัวแทน</option>
				<option value="">ขายส่ง</option>
				<option value="">ขายปลีก</option>
				<option value="">ห้าง/ร้าน</option>
				<option value="">หน่วยงานรัฐ</option>
			</select>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="type-error"></div>
  </div>



	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">เกรดลูกค้า</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<select name="class" id="class" class="form-control" >
				<option value="">เลือกรายการ</option>
				<option value="">VIP</option>
				<option value="" selected>A</option>
				<option value="">B</option>
				<option value="">C</option>
				<option value="">N</option>
			</select>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="class-error"></div>
  </div>


	<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">พื้นที่ขาย</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<select name="area" id="area" class="form-control">
				<option value="">เลือกรายการ</option>
				<option value="" selected>กรุงเทพฯ</option>
				<option value="">ภาคกลาง</option>
				<option value="">ภาคเหนือ</option>
				<option value="">ภาคใต้</option>
				<option value="">ภาคตะวันออก</option>
				<option value="">ภาคตะวันตก</option>
				<option value="">ภาคอีสาน</option>
			</select>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline red" id="area-error"></div>
  </div>

	<div class="divider-hidden">

	</div>
  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right"></label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <p class="pull-right">
        <button type="submit" class="btn btn-sm btn-success" style="width:100px;"><i class="fa fa-save"></i> Save</button>
      </p>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline">
      &nbsp;
    </div>
  </div>
</form>
