<?php $this->load->view('include/header'); ?>
<?php $can_upload = getConfig('ALLOW_UPLOAD_ORDER'); ?>
<?php $instant_export = getConfig('WMS_INSTANT_EXPORT'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    	<p class="pull-right top-p">
			<button type="button" class="btn btn-xs btn-success" onclick="addNew()"><i class="fa fa-plus"></i> เพิมใหม่</button>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    <label>เลขที่เอกสาร</label>
    <input type="text" class="form-control input-sm search" name="code"  value="" />
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    <label>ลูกค้า</label>
    <input type="text" class="form-control input-sm search" name="customer" value="" />
  </div>

	<div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    <label>ช่องทางขาย</label>
		<select class="form-control input-sm" name="channels">
			<option value="">ทั้งหมด</option>
			<option value="">ตัวแทน</option>
			<option value="">MT</option>
			<option value="">Line OA</option>
			<option value="">Website</option>
			<option value="">Fanpage</option>
			<option value="">Lazada</option>
			<option value="">Shopee</option>
		</select>
  </div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>การชำระเงิน</label>
		<select class="form-control input-sm" name="payment">
			<option value="">ทั้งหมด</option>
			<option value="">เครดิต</option>
			<option value="">เงินสด</option>
			<option value="">COD</option>
			<option value="">เงินโอน</option>
			<option value="">Credit Card</option>
		</select>
  </div>

	<div class="col-lg-2 col-md-2 col-sm-2-harf col-xs-6 padding-5">
    <label>วันที่</label>
    <div class="input-daterange input-group">
      <input type="text" class="form-control input-sm width-50 text-center from-date" name="fromDate" id="fromDate" value="" />
      <input type="text" class="form-control input-sm width-50 text-center" name="toDate" id="toDate" value="" />
    </div>
  </div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
		<label>การอนุมัติ</label>
		<select class="form-control input-sm" name="sap_status">
			<option value="all">ทั้งหมด</option>
			<option value="">รออนุมัติ</option>
			<option value="">อนุมัติแล้ว</option>
			<option value="">ไม่ต้องอนุมัติ</option>
			<option value="">ไม่อนุมัติ</option>
		</select>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
		<label>สถานะ</label>
		<select class="form-control input-sm" name="sap_status">
			<option value="all">ทั้งหมด</option>
			<option value="">Draft</option>
			<option value="">Pending</option>
			<option value="">Success</option>
			<option value="">Failed</option>
			<option value="">Canceled</option>
		</select>
	</div>

	<div class="col-lg-1 col-md-1 col-sm-1-harf col-xs-4 padding-5">
		<label class="display-block not-show">buton</label>
		<button type="submit" class="btn btn-xs btn-primary btn-block" ><i class="fa fa-search"></i> Search</button>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1-harf col-xs-4 padding-5">
		<label class="display-block not-show">buton</label>
		<button type="button" class="btn btn-xs btn-warning btn-block" ><i class="fa fa-retweet"></i> Reset</button>
	</div>
</div>
</form>
<hr class="padding-5 margin-top-10"/>
<?php echo $this->pagination->create_links(); ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive" id="double-scroll">
		<table class="table table-striped table-hover dataTable border-1" style="min-width:960px; border-collapse:inherit;">
			<thead>
				<tr style="font-size:12px;">
					<th class="middle text-center" style="width:50px;">#</th>
					<th style="width:85px;" class="middle">วันที่</th>
					<th style="width:100px;" class="middle">เลขที่เอกสาร</th>
					<th style="min-width:200px;" class="middle">ลูกค้า</th>
					<th style="width:100px;" class="middle text-right">ยอดเงิน</th>
					<th style="width:100px;" class="middle">ช่องทางขาย</th>
					<th style="width:100px;" class="middle">การชำระเงิน</th>
					<th style="width:80px;" class="middle">การอนุมัติ</th>
					<th style="width:80px;" class="middle">สถานะ</th>
					<th class="middle" style="width:120px;"></th>
				</tr>
			</thead>
			<tbody style="font-size:12px;">
				<tr>
					<td class="middle text-center">1</td>
					<td class="middle">11.03.2022</td>
					<td class="middle">SO-22030010</td>
					<td class="middle">ร้านโปรแกรม</td>
					<td class="middle text-right">12,300.00</td>
					<td class="middle">ขายตัวแทน</td>
					<td class="middle">เงินสด</td>
					<td class="middle text-center"></td>
					<td class="middle">
						<button type="button" class="btn btn-mini btn-purple btn-block">Draft</button>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('draft')"><i class="fa fa-eye"></i></button>
						<button type="button" class="btn btn-mini btn-warning" onclick="editDetail()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="cancleOrder()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td class="middle text-center">1</td>
					<td class="middle">11.03.2022</td>
					<td class="middle">SO-22030010</td>
					<td class="middle">ร้านโปรแกรม</td>
					<td class="middle text-right">12,300.00</td>
					<td class="middle">ขายตัวแทน</td>
					<td class="middle">เงินสด</td>
					<td class="middle text-center"><span class="label label-danger btn-block">ไม่อนุมัติ</span></td>
					<td class="middle"></td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('rejected')"><i class="fa fa-eye"></i></button>
						<button type="button" class="btn btn-mini btn-warning" onclick="editDetail()"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="cancleOrder()"><i class="fa fa-trash"></i></button>
					</td>
				</tr>

				<tr>
					<td class="middle text-center">2</td>
					<td class="middle">10.03.2022</td>
					<td class="middle">SO-22030009</td>
					<td class="middle">Home Pro</td>
					<td class="middle text-right">233,300.00</td>
					<td class="middle">MT</td>
					<td class="middle">เครดิต</td>
					<td class="middle text-center"><span class="label label-success btn-block">อนุมัติแล้ว</span></td>
					<td class="middle">
						<button type="button" class="btn btn-mini btn-success btn-block" onclick="showSuccesModal()">Success</button>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('approved')"><i class="fa fa-eye"></i></button>
					</td>
				</tr>

				<tr>
					<td class="middle text-center">3</td>
					<td class="middle">10.03.2022</td>
					<td class="middle">SO-22030008</td>
					<td class="middle">Central Pattana</td>
					<td class="middle text-right">92,000.00</td>
					<td class="middle">MT</td>
					<td class="middle">เครดิต</td>
					<td class="middle text-center"><span class="label label-warning btn-block">รออนุมัติ</span></td>
					<td class="middle">
						<button type="button" class="btn btn-mini btn-warning btn-block" onclick="showPendingModal()">Pending</button>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('pending')"><i class="fa fa-eye"></i></button>
					</td>
				</tr>

				<tr>
					<td class="middle text-center">4</td>
					<td class="middle">09.03.2022</td>
					<td class="middle">SO-22030006</td>
					<td class="middle">Lazada (คุณ สุทัศ สังข์สวัสดิ์)</td>
					<td class="middle text-right">1,910.00</td>
					<td class="middle">Lazada</td>
					<td class="middle">COD</td>
					<td class="middle text-center"><span class="label label-primary btn-block">ไม่ต้องอนุมัติ</span></</td>
					<td class="middle">
						<button type="button" class="btn btn-mini btn-danger btn-block" onclick="showFailedModal()">Failed</button>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('pass')"><i class="fa fa-eye"></i></button>
					</td>
				</tr>

				<tr>
					<td class="middle text-center">4</td>
					<td class="middle">09.03.2022</td>
					<td class="middle">SO-22030006</td>
					<td class="middle">Lazada (คุณ สุทัศ สังข์สวัสดิ์)</td>
					<td class="middle text-right">1,910.00</td>
					<td class="middle">Lazada</td>
					<td class="middle">COD</td>
					<td class="middle text-center"></</td>
					<td class="middle">
						<button type="button" class="btn btn-mini btn-danger btn-block">Canceled</button>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info" onclick="viewDetail('canceled')"><i class="fa fa-eye"></i></button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>




<div class="modal fade" id="successTempModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom:0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="font-size: 24px; font-weight: bold; padding-bottom: 10px; color:#428bca; border-bottom:solid 2px #428bca">Sales Order Temp Status</h4>
            </div>
            <div class="modal-body" style="padding-top:5px;">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
								<table class="table table-bordered" style="margin-bottom:0px;">
							    <tbody style="font-size:16px;">
							      <tr><td class="width-30">Web Order</td><td class="width-70">SO-22030009</td></tr>
							      <tr><td class="width-30">BP Code</td><td class="width-70">CL-001</td></tr>
							      <tr><td>BP Name</td><td>Home Pro</td></tr>
							      <tr><td>Date/Time To Temp</td><td>10.03.2022 15:31:21</td></tr>
							      <tr><td>Date/Time To SAP</td><td>10.03.2022 15:35:01</td></tr>
							      <tr><td>Status</td><td>Success</td></tr>
							      <tr><td>Message</td><td></td></tr>
										<tr>
											<td colspan="2">
												<button type="button" class="btn btn-sm btn-default" onclick="closeModal('successTempModal')">Close</button>
											</td>
										</tr>
							    </tbody>
							  </table>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pendingTempModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom:0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="font-size: 24px; font-weight: bold; padding-bottom: 10px; color:#428bca; border-bottom:solid 2px #428bca">Sales Order Temp Status</h4>
            </div>
            <div class="modal-body" style="padding-top:5px;">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
								<table class="table table-bordered" style="margin-bottom:0px;">
							    <tbody style="font-size:16px;">
							      <tr><td class="width-30">Web Order</td><td class="width-70">SO-22030009</td></tr>
							      <tr><td class="width-30">BP Code</td><td class="width-70">CL-001</td></tr>
							      <tr><td>BP Name</td><td>Home Pro</td></tr>
							      <tr><td>Date/Time To Temp</td><td>10.03.2022 15:31:21</td></tr>
							      <tr><td>Date/Time To SAP</td><td>-</td></tr>
							      <tr><td>Status</td><td>Pending</td></tr>
							      <tr><td>Message</td><td></td></tr>
										<tr>
											<td colspan="2">
												<button type="button" class="btn btn-sm btn-default" onclick="closeModal('pendingTempModal')">Close</button>
												<button type="button" class="btn btn-sm btn-danger" onClick="removeTemp()" ><i class="fa fa-trash"></i> Delete Temp</button>
											</td>
										</tr>
							    </tbody>
							  </table>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="failedTempModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom:0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="font-size: 24px; font-weight: bold; padding-bottom: 10px; color:#428bca; border-bottom:solid 2px #428bca">Sales Order Temp Status</h4>
            </div>
            <div class="modal-body" style="padding-top:5px;">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
								<table class="table table-bordered" style="margin-bottom:0px;">
							    <tbody style="font-size:16px;">
							      <tr><td class="width-30">Web Order</td><td class="width-70">SO-22030009</td></tr>
							      <tr><td class="width-30">BP Code</td><td class="width-70">CL-001</td></tr>
							      <tr><td>BP Name</td><td>Home Pro</td></tr>
							      <tr><td>Date/Time To Temp</td><td>10.03.2022 15:31:21</td></tr>
							      <tr><td>Date/Time Update</td><td>10.03.2022 15:31:21</td></tr>
							      <tr><td>Status</td><td>Failed</td></tr>
							      <tr><td>Message</td><td>Base Doc Missmatch</td></tr>
										<tr>
											<td colspan="2">
												<button type="button" class="btn btn-sm btn-default" onclick="closeModal('failedTempModal')">Close</button>
												<button type="button" class="btn btn-sm btn-danger" onClick="removeTemp()" ><i class="fa fa-trash"></i> Delete Temp</button>
											</td>
										</tr>
							    </tbody>
							  </table>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
	function showSuccesModal() {
		$('#successTempModal').modal('show');
	}


	function showPendingModal() {
		$('#pendingTempModal').modal('show');
	}

	function showFailedModal() {
		$('#failedTempModal').modal('show');
	}


	function closeModal(name) {
		$('#'+name).modal('hide');
	}


</script>

<script src="<?php echo base_url(); ?>scripts/quotation/quotation.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
