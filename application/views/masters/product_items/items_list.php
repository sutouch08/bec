<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
    </div>
    <div class="col-sm-6 padding-5">
    	<p class="pull-right top-p">
			<button type="button" class="btn btn-sm btn-info" style="width:100px;" onclick="sync()"><i class="fa fa-refresh"></i> Sync</button>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-sm-2 padding-5">
    <label>รหัส</label>
    <input type="text" class="width-100" name="code" id="code" value="<?php echo $code; ?>" />
  </div>

  <div class="col-sm-2 padding-5">
    <label>ชื่อ</label>
    <input type="text" class="width-100" name="name" id="name" value="<?php echo $name; ?>" />
  </div>


	<div class="col-sm-2 padding-5">
    <label>หมวดหมู่</label>
		<select class="form-control" name="category" onchange="getSearch()">
			<option value="">ทั้งหมด</option>
			<?php echo select_product_category($category); ?>
		</select>
  </div>

	<div class="col-sm-2 padding-5">
    <label>ประเภท</label>
		<select class="form-control" name="kind" onchange="getSearch()">
			<option value="">ทั้งหมด</option>
			<?php echo select_product_kind($kind); ?>
		</select>
  </div>


	<div class="col-sm-2 padding-5">
    <label>ยี่ห้อ</label>
		<select class="form-control" name="brand" onchange="getSearch()">
			<option value="">ทั้งหมด</option>
			<?php echo select_product_brand($brand); ?>
		</select>
  </div>


  <div class="col-sm-1 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-search"></i> ค้นหา</button>
  </div>
	<div class="col-sm-1 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="button" class="btn btn-sm btn-warning btn-block" onclick="clearFilter()"><i class="fa fa-retweet"></i> Reset</button>
  </div>
</div>
<hr class="margin-top-15 padding-5">
</form>

<div class="row">
	<div class="col-sm-12 padding-5">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="width-5 middle text-center">ลำดับ</th>
					<th class="width-10 middle text-center">รหัส</th>
					<th class="middle text-center">สินค้า</th>
					<th class="width-10 middle text-center">รุ่น</th>
					<th class="width-10 middle text-center">ราคา</th>
					<th class="width-10 middle text-center">หมวดหมู่</th>
					<th class="width-10 middle text-center">ยี่ห้อ</th>
					<th class="width-5 middle text-center">สถานะ</th>
					<th class="" style="width:100px;"></th>
				</tr>
			</thead>
			<tbody>

					<tr class="font-size-12">
						<td class="middle text-center">1</td>
						<td class="middle">3673014376</td>
						<td class="middle">โคมไฟติดลอย รุ่น SJ6371/6C</td>
						<td class="middle">SJ6371/6C</td>
						<td class="middle text-right">4,440.00</td>
						<td class="middle">โคมไฟแขวนเพดาน</td>
						<td class="middle text-center">BEC</td>
						<td class="middle text-center"><?php echo is_active(1); ?></td>
						<td class="middle text-right">
							<button type="button" class="btn btn-minier btn-warning" onclick="edit()"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-minier btn-danger" onclick="getDelete('โคมไฟติดลอย รุ่น SJ6371/6C')"><i class="fa fa-trash"></i></button>
						</td>
					</tr>

					<tr class="font-size-12">
						<td class="middle text-center">2</td>
						<td class="middle">3881010245</td>
						<td class="middle">BEC โคมฉาย LED 100 วัตต์ แสงวอร์มไวท์ รุ่น ZONIC เดย์ไลท์ 50 วัตต์</td>
						<td class="middle">ZONIC</td>
						<td class="middle text-right">695.00</td>
						<td class="middle">โคมฉาย ฟลัดไลท์</td>
						<td class="middle text-center">BEC</td>
						<td class="middle text-center"><?php echo is_active(1); ?></td>
						<td class="middle text-right">
							<button type="button" class="btn btn-minier btn-warning" onclick="edit()"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-minier btn-danger" onclick="getDelete('BEC โคมฉาย LED 100 วัตต์ แสงวอร์มไวท์ รุ่น ZONIC เดย์ไลท์ 50 วัตต์')"><i class="fa fa-trash"></i></button>
						</td>
					</tr>

					<tr class="font-size-12">
						<td class="middle text-center">3</td>
						<td class="middle">3881010445</td>
						<td class="middle">BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K</td>
						<td class="middle">LED STEEM</td>
						<td class="middle text-right">1,500.00</td>
						<td class="middle">โคมฉาย ฟลัดไลท์</td>
						<td class="middle text-center">BEC</td>
						<td class="middle text-center"><?php echo is_active(1); ?></td>
						<td class="middle text-right">
							<button type="button" class="btn btn-minier btn-warning" onclick="edit()"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-minier btn-danger" onclick="getDelete('BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K')"><i class="fa fa-trash"></i></button>
						</td>
					</tr>

					<tr class="font-size-12">
						<td class="middle text-center">4</td>
						<td class="middle">SKU-00918</td>
						<td class="middle">La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto</td>
						<td class="middle">1PT-505</td>
						<td class="middle text-right">51,900.00</td>
						<td class="middle">เก้าอี้ปรับเอนนอน</td>
						<td class="middle text-center">La-Z-Boy</td>
						<td class="middle text-center"><?php echo is_active(1); ?></td>
						<td class="middle text-right">
							<button type="button" class="btn btn-minier btn-warning" onclick="edit()"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-minier btn-danger" onclick="getDelete('La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto')"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>

<script>
	function edit() {
		window.location.href = HOME + 'edit/1';
	}

</script>
<script src="<?php echo base_url(); ?>scripts/masters/items.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
