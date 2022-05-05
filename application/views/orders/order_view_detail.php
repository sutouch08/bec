<?php $this->load->view('include/header'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 padding-5">
    	<h4 class="title"><?php echo $this->title; ?></h4>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 padding-5">
    	<p class="pull-right top-p">
        	<button type="button" class="btn btn-xs btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> กลับ</button>
        </p>
    </div>
</div>
<hr class="margin-bottom-15 padding-5" />

<div class="row">
	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>เลขที่เอกสาร</label>
      <input type="text" class="form-control input-sm text-center" value="SO-22030009" disabled />
    </div>
    <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>วันที่</label>
			<input type="text" class="form-control input-sm text-center edit" name="date" id="date" value="30-04-2022" disabled readonly />
    </div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
			<label>รหัสลูกค้า</label>
			<input type="text" class="form-control input-sm text-center edit" id="customer_code" name="customer_code" value="CL-001" disabled />
		</div>
    <div class="col-lg-7 col-md-8-harf col-sm-8-harf col-xs-8 padding-5">
    	<label>ลูกค้า</label>
			<input type="text" class="form-control input-sm edit" id="customer" name="customer" value="Home Pro" required disabled />
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>ช่องทางขาย</label>
			<select class="form-control input-sm" name="channels" disabled>
				<option value="">ทั้งหมด</option>
				<option value="">ตัวแทน</option>
				<option value="" selected>MT</option>
				<option value="">Line OA</option>
				<option value="">Website</option>
				<option value="">Fanpage</option>
				<option value="">Lazada</option>
				<option value="">Shopee</option>
			</select>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
    	<label>การชำระเงิน</label>
			<select class="form-control input-sm" name="payment" disabled>
				<option value="">ทั้งหมด</option>
				<option value="" selected>เครดิต</option>
				<option value="">เงินสด</option>
				<option value="">COD</option>
				<option value="">เงินโอน</option>
				<option value="">Credit Card</option>
			</select>
    </div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
			<label>ใบเสนราคา</label>
			<input type="text" class="form-control input-sm text-center" value="SQ-22030001" disabled/>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
			<label>SO No.</label>
			<input type="text" class="form-control input-sm text-center" value="" disabled/>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
			<label>User</label>
			<input type="text" class="form-control input-sm text-center" value="sale1" disabled/>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
			<label>Customer Team</label>
			<input type="text" class="form-control input-sm text-center" value="Customer team 1" disabled/>
		</div>
</div>
<hr class="margin-bottom-15 padding-5"/>

<form id="discount-form">
<div class="row">
	<?php if($status == 'canceled') { $this->load->view('cancle_watermark'); } ?>
	<?php if($status == 'rejected') { $this->load->view('reject_watermark'); } ?>
	<?php $b = base_url(); ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
			<table class="table table-striped border-1" style="border-collapse:inherit; min-width:1000px; margin-bottom:0px;">
        <thead>
        	<tr class="font-size-12">
            <th class="width-5 text-center"></th>
            <th class="" style="width:120px;">รหัสสินค้า</th>
            <th class="" style="min-width:250px;">ชื่อสินค้า</th>
            <th class="text-center" style="width:100px;">ราคา</th>
            <th class="text-center" style="width:100px;">จำนวน</th>
            <th class="text-center" style="width:120px;">ส่วนลด(%)</th>
            <th class="text-right" style="width:120px;">มูลค่า</th>
            </tr>
        </thead>
        <tbody id="detail-table">
          <tr class="font-size-12">
      			<td class="middle text-center padding-0"><img src="<?php echo $b; ?>images/products/56.jpg" width="40px" height="40px"  /></td>
      			<td class="middle">3673014376</td>
            <td class="middle">โคมไฟติดลอย รุ่น SJ6371/6C	</td>
            <td class="middle text-center">4,400.00</td>
						<td class="middle text-center">1</td>
						<td class="middle text-center">10.00+5.00</td>
            <td class="middle text-right">3,762.00</td>
          </tr>
					<tr class="font-size-12">
      			<td class="middle text-center padding-0"><img src="<?php echo $b; ?>images/products/57.jpg" width="40px" height="40px"  /></td>
      			<td class="middle">3881010250-1</td>
            <td class="middle">BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC เดย์ไลท์ 100 วัตต์	</td>
            <td class="middle text-center">1,500.00</td>
						<td class="middle text-center">1</td>
						<td class="middle text-center">10.00+5.00</td>
            <td class="middle text-right">1,282.50</td>
          </tr>
					<tr class="font-size-12">
      			<td class="middle text-center padding-0"><img src="<?php echo $b; ?>images/products/57.jpg" width="40px" height="40px"  /></td>
      			<td class="middle">3881010240</td>
            <td class="middle">BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC แสงวอร์มไวท์ 50 วัตต์</td>
            <td class="middle text-center">695.00</td>
						<td class="middle text-center">1</td>
						<td class="middle text-center">10.00+5.00</td>
            <td class="middle text-right">594.23</td>
          </tr>
					<tr class="font-size-12">
      			<td class="middle text-center padding-0"><img src="<?php echo $b; ?>images/products/58.jpg" width="40px" height="40px"  /></td>
      			<td class="middle">3881010445</td>
            <td class="middle">BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K</td>
            <td class="middle text-center">1,500.00</td>
						<td class="middle text-center">1</td>
						<td class="middle text-center">10.00+5.00</td>
            <td class="middle text-right">1,282.50</td>
          </tr>
					<tr class="font-size-12">
      			<td class="middle text-center padding-0"><img src="<?php echo $b; ?>images/products/59.png" width="40px" height="40px"  /></td>
      			<td class="middle">SKU-00918</td>
            <td class="middle">La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto</td>
            <td class="middle text-center">51,900.00</td>
						<td class="middle text-center">1</td>
						<td class="middle text-center">20.00</td>
            <td class="middle text-right">41,520.00</td>
          </tr>
        	</tbody>
        </table>
    </div>
</div>

<div class="divider-hidden"></div>
<div class="divider-hidden"></div>

<div class="row">
  <!--- left column -->
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-5 margin-bottom-15">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 padding-5 text-right hidden-xs margin-bottom-5">Sale Employee</div>
			<div class="col-lg-7 col-7 col-sm-7 col-xs-6 padding-5 margin-bottom-5">
				<label class="visible-xs">Sale Employee</label>
				<input type="text" id="slpCode" class="form-control input-sm" value="รุจิรา แช่มเอี่ยม" disabled>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 padding-5 text-right hidden-xs margin-bottom-5">Owner</div>
			<div class="col-lg-7 col-7 col-sm-7 col-xs-6 padding-5 margin-bottom-5">
				<label class="visible-xs">Owner</label>
				<select class="form-control input-sm" id="owner" disabled>
					<option value=""></option>
					<option value="1">ธิษตยา ม่วงโสภา</option>
					<option value="2">ลลิตา แซ่ล้อ</option>
					<option value="3">กุญรวี อ่ำขำ</option>
					<option value="4">ขวัญจิรา ทะบันหาร</option>
					<option value="5">คุณวรรณี เรืองมณี</option>
					<option value="6" selected>รุจิรา แช่มเอี่ยม</option>
				</select>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 padding-5 text-right hidden-xs margin-bottom-5">Remark</div>
		<div class="col-lg-7 col-7 col-sm-7 col-xs-12 padding-5 margin-bottom-5">
			<label class="visible-xs">Remark</label>
			<textarea id="comments" maxlength="254" class="form-control" style="height:100px; width:450px;" disabled></textarea>
		</div>
		</div>
  </div>

  <!--- Middle column -->
  <div class="col-lg-4 col-md-4 col-sm-4 padding-5 hidden-xs"> </div>


  <!--- right column -->
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-horizontal">
      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Total Before Discount</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
          <input type="text" class="form-control input-sm text-right" id="totalAmount" value="48,441.23" disabled>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-5 text-right">Discount</div>
        <div class="col-lg-3 col-md-3 col-sm- 3 col-xs-3 padding-5">
          <span class="input-icon input-icon-right">
          <input type="number" id="discPrcnt" class="form-control input-sm" value="0.00" disabled>
          <i class="ace-icon fa fa-percent"></i>
          </span>
        </div>
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 padding-5">
          <input type="text" id="discAmount" class="form-control input-sm text-right" value="0.00" disabled>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Rouding</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
          <input type="number" id="roundDif" class="form-control input-sm text-right" value="0.12" disabled>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Tax</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
          <input type="text" id="tax" class="form-control input-sm text-right" value="3,390.89" disabled>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Total</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
          <input type="text" id="docTotal" class="form-control input-sm text-right" value="51,832.00" disabled>
        </div>
      </div>

    </div>
  </div>

  <div class="divider-hidden"></div>
  <div class="divider-hidden"></div>
  <div class="divider-hidden"></div>
<?php if($status == 'penidng') : ?>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 text-right">
		<button type="button" class="btn btn-sm btn-danger" style="width:150px;">Reject</button>
    <button type="button" class="btn btn-sm btn-success" style="width:150px;">Approve</button>
  </div>
<?php endif; ?>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 text-right" style="font-size:12px; font-style: italic; color:#c5d0dc;">
		Create By : รุจิรา แช่มเอี่ยม @ 30-04-2022 10:32<br/>
		<?php if($status != 'draft') : ?>
			Rejected By : Sales manager @ 30-04-2022 10:40<br/>
			<?php if($status !== 'rejected') : ?>
			Edit By : รุจิรา แช่มเอี่ยม @ 30-04-2022 11:04<br/>
			<?php endif; ?>
			<?php if($status !== 'rejected' && $status != 'canceled' && $status !== 'draft') : ?>
			Approve By : Sales manager @ 30-04-2022 11:21<br/>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<!--  End Order Detail ----------------->
</form>


<script src="<?php echo base_url(); ?>scripts/orders/orders.js?v=<?php echo date('YmdH'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
