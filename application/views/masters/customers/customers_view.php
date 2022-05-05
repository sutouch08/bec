<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
    </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 padding-5">
    	<p class="pull-right top-p">
				<button type="button" class="btn btn-sm btn-info" onclick="syncData()"><i class="fa fa-refresh"></i> Sync</button>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>รหัส</label>
    <input type="text" class="form-control input-sm" name="code" id="code" value="" />
  </div>

  <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>ชื่อ</label>
    <input type="text" class="form-control input-sm" name="name" id="name" value="" />
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>กลุ่มลูกค้า</label>
    <select class="form-control input-sm filter" name="group" id="customer_group">
			<option value="">ทั้งหมด</option>
			<option value="">ลูกค้าเงินสด</option>
			<option value="">ลูกค้าเครดิต</option>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>ประเภทลูกค้า</label>
    <select class="form-control input-sm filter" name="kind" id="customer_kind">
			<option value="">ทั้งหมด</option>
			<option value="">Retail</option>
			<option value="">Modern Trade</option>
			<option value="">Tradition.</option>
			<option value="">Consignment</option>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>ชนิดลูกค้า</label>
    <select class="form-control input-sm filter" name="type" id="customer_type">
			<option value="">ทั้งหมด</option>
			<option value="">ตัวแทน</option>
			<option value="">ขายส่ง</option>
			<option value="">ขายปลีก</option>
			<option value="">ห้าง/ร้าน</option>
			<option value="">หน่วยงานรัฐ</option>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>เกรดลูกค้า</label>
    <select class="form-control input-sm filter" name="class" id="customer_class">
			<option value="">ทั้งหมด</option>
			<option value="">VIP</option>
			<option value="">A</option>
			<option value="">B</option>
			<option value="">C</option>
			<option value="">N</option>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label>เขตการขาย</label>
    <select class="form-control input-sm filter" name="area" id="customer_area">
			<option value="">ทั้งหมด</option>
			<option value="">กรุงเทพฯ</option>
			<option value="">ภาคกลาง</option>
			<option value="">ภาคเหนือ</option>
			<option value="">ภาคใต้</option>
			<option value="">ภาคตะวันออก</option>
			<option value="">ภาคตะวันตก</option>
			<option value="">ภาคอีสาน</option>
		</select>
  </div>

  <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
    <label class="display-block not-show">buton</label>
		<div class="btn-group width-100">
			<button type="submit" class="btn btn-sm btn-primary width-50">Search</button>
			<button type="button" class="btn btn-sm btn-warning width-50" onclick="clearFilter()">Reset</button>
		</div>
  </div>

</div>
<hr class="margin-top-15 padding-5">
</form>
<?php echo $this->pagination->create_links(); ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
		<table class="table table-striped table-hover border-1">
			<thead>
				<tr>
					<th style="width:50px;" class="middle text-center">ลำดับ</th>
					<th style="width:100px;" class="middle">รหัส</th>
					<th style="min-width:250px;" class="middle">ชื่อ</th>
					<th style="width:100px;" class="middle">กลุ่ม</th>
					<th style="width:100px;" class="middle">ประเภท</th>
					<th style="width:100px;" class="middle">ชนิด</th>
					<th style="width:100px;" class="middle">เกรด</th>
					<th style="width:100px;" class="middle">เขต</th>
					<th style="width:80px;" class="middle text-center">สถานะ</th>
					<th style="width:100px;" class=""></th>
				</tr>
			</thead>
			<tbody>
				<tr style="font-size:12px;">
					<td class="middle text-center">1</td>
					<td class="middle">CL-001</td>
					<td class="middle">ร้านเฟอร์นิเจอร์</td>
					<td class="middle">ลูกค้าเครดิต</td>
					<td class="middle">ตัวแทน</td>
					<td class="middle">Retail</td>
					<td class="middle">B</td>
					<td class="middle">กรุงเทพฯ</td>
					<td class="middle text-center"><i class="fa fa-check green"></i></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>

				<tr style="font-size:12px;">
					<td class="middle text-center">2</td>
					<td class="middle">CL-002</td>
					<td class="middle">บริษัท โฮม โปรดักส์ เซ็นเตอร์ จำกัด</td>
					<td class="middle">ลูกค้าเครดิต</td>
					<td class="middle">ตัวแทน</td>
					<td class="middle">Modern Trade</td>
					<td class="middle">A</td>
					<td class="middle">กรุงเทพฯ</td>
					<td class="middle text-center"><i class="fa fa-check green"></i></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>

				<tr style="font-size:12px;">
					<td class="middle text-center">3</td>
					<td class="middle">CL-003</td>
					<td class="middle">บริษัท สยามโกลบอลเฮ้าส์ จำกัด</td>
					<td class="middle">ลูกค้าเครดิต</td>
					<td class="middle">ตัวแทน</td>
					<td class="middle">Modern Trade</td>
					<td class="middle">A</td>
					<td class="middle">กรุงเทพฯ</td>
					<td class="middle text-center"><i class="fa fa-check green"></i></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>

				<tr style="font-size:12px;">
					<td class="middle text-center">4</td>
					<td class="middle">CL-004</td>
					<td class="middle">บริษัท ซีอาร์ซี ไทวัสดุ จำกัด</td>
					<td class="middle">ลูกค้าเครดิต</td>
					<td class="middle">ตัวแทน</td>
					<td class="middle">Modern Trade</td>
					<td class="middle">A</td>
					<td class="middle">ภาคกลาง</td>
					<td class="middle text-center"><i class="fa fa-check green"></i></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/masters/customers.js"></script>

<?php $this->load->view('include/footer'); ?>
