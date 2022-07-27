
<!--- Category Menu ---------------------------------->
<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 padding-5">
		<label>ยี่ห้อ</label>
		<select class="form-control input-sm">
			<option value="all">ทั้งหมด</option>
			<option value="bec">BEC</option>
			<option value="blite">BLITE</option>
			<option value="suntree">Suntree</option>
			<option value="lazboy">LAZBOY</option>
		</select>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 padding-5">
		<label>ประเภท</label>
		<select class="form-control input-sm">
			<option value="all">ทั้งหมด</option>
			<option value="bec">หลอดไฟ LED</option>
			<option value="blite">&nbsp;&nbsp; - หลอดบัล์บ</option>
			<option value="suntree">&nbsp;&nbsp; - หลอด T8</option>
			<option value="lazboy">&nbsp;&nbsp; - หลอด MR16</option>
			<option value="bec">โคมไฟภายใน</option>
			<option value="blite">&nbsp;&nbsp; - โคมไฟแขวนเพดาน</option>
			<option value="suntree">&nbsp;&nbsp; - โคมไฟช่อ</option>
			<option value="lazboy">&nbsp;&nbsp; - โคมไฟระย้า</option>
		</select>
	</div>


	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 padding-5">
		<label>ชนิด</label>
		<select class="form-control input-sm">
			<option value="all">ทั้งหมด</option>
			<option value="light">อุปกรณ์ส่องสว่าง</option>
			<option value="electric">อุปกรณ์ไฟฟ้า</option>
			<option value="solarcell">โซล่าเซลล์และอุปกรณ์</option>
			<option value="furniture">เฟอร์นิเจอร์</option>
			<option value="fan">พัดลมแต่งบ้าน</option>
		</select>
	</div>

	<div class="col-lg-2 col-md-2-harf col-sm-3 col-xs-6 padding-5">
		<label>ราคา</label>
		<div class="input-group">
			<input type="number" class="form-control input-sm text-center" style="width:45%;" placeholder="Min">
			<input type="text" class="form-control input-sm text-center" style="width:10%; border:none;" value="-">
			<input type="number" class="form-control input-sm text-center" style="width:45%" placeholder="Max">
		</div>
	</div>

	<div class="col-lg-1 col-md-1-harf col-sm-1-harf col-xs-6 padding-5">
		<label class="display-block not-show">search</label>
		<button type="button" class="btn btn-xs btn-primary btn-block">ค้นหา</button>
	</div>
</div><!---/ row -->
<hr class="margin-top-15 padding-5"/>

<div class='row'>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 scrollbar" style="min-height:1px; max-height:500px; overflow-y:scroll; overflow-x:hidden;">
		<div class="row">
			<div calss="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
	$b = base_url();
			$items = array(
				array('code' => '3673014376', 'action' => 1, 'name' => 'โคมไฟติดลอย รุ่น SJ6371/6C', 'price' => '4,440.00', 'image' => $b.'images/products/56.jpg'),
				array('code' => '3881010245', 'action' => 2, 'name' => 'BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC', 'price' => '195.00 - 1,500.00', 'image' => $b.'images/products/57.jpg'),
				array('code' => '3881010445', 'action' => 1, 'name' => 'BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K', 'price' => '1,500.00', 'image' => $b.'images/products/58.jpg'),
				array('code' => 'SKU-00918', 'action' => 1, 'name' => 'La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto', 'price' => '51,900.00', 'image' => $b.'images/products/59.png'),
				array('code' => '3673014376', 'action' => 1, 'name' => 'โคมไฟติดลอย รุ่น SJ6371/6C', 'price' => '4,440.00', 'image' => $b.'images/products/56.jpg'),
				array('code' => '3881010245', 'action' => 2, 'name' => 'BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC', 'price' => '195.00 - 1,500.00', 'image' => $b.'images/products/57.jpg'),
				array('code' => '3881010445', 'action' => 1, 'name' => 'BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K', 'price' => '1,500.00', 'image' => $b.'images/products/58.jpg'),
				array('code' => 'SKU-00918', 'action' => 1, 'name' => 'La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto', 'price' => '51,900.00', 'image' => $b.'images/products/59.png'),
				array('code' => '3673014376', 'action' => 1, 'name' => 'โคมไฟติดลอย รุ่น SJ6371/6C', 'price' => '4,440.00', 'image' => $b.'images/products/56.jpg'),
				array('code' => '3881010245', 'action' => 2, 'name' => 'BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC', 'price' => '195.00 - 1,500.00', 'image' => $b.'images/products/57.jpg'),
				array('code' => '3881010445', 'action' => 1, 'name' => 'BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K', 'price' => '1,500.00', 'image' => $b.'images/products/58.jpg'),
				array('code' => 'SKU-00918', 'action' => 1, 'name' => 'La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto', 'price' => '51,900.00', 'image' => $b.'images/products/59.png')
			);

			$page = "";

			if(!empty($items))
			{
				foreach($items as $rb)
				{
					$page .= '<div class="item2 col-lg-2 col-md-3 col-sm-4 col-xs-6 padding-5 text-center margin-bottom-15" style="height:280px;">';
					$page .= 	'<div class="product padding-5">';
					$page .= 		'<div class="image">';
					$page .= 			'<a href="javascript:void(0)" onclick="showGrid('.$rb['action'].')">';
					$page .=			'<img src="'.$rb['image'].'" class="img-responsive" />';
					$page .=			'</a>';
					$page .= 		'</div>';
					$page .= 		'<div class="description">';
					$page .=			'<a href="javascript:void(0)" onclick="showGrid('.$rb['action'].')" style="display:block; text-decoration:none; font-size:14px; max-height:40px; overflow:hidden;">' . $rb['name'] . '</a>';
					$page .= 		'</div>';
					$page .= 		'<div class="price text-center">';
					$page .=			'<span class="bold" style="font-size:15px;">' . $rb['price'] . '</span>';
					$page .=		'</div>';
					$page .= 	'</div>';
					$page .= '</div>';
				}
			}
			else
			{
				$page .= '<div class="row"><div class="col-sm-12 text-center"><h3>No Data</h3></div></div>';
			}

			echo $page;
			?>
			</div>
		</div>
	</div>
</div>
<hr class="padding-5"/>
