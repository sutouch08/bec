<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
    	<p class="pull-right top-p">
<?php if($this->pm->can_add) : ?>
			<button type="button" class="btn btn-xs btn-success" onclick="addNew()"><i class="fa fa-plus"></i> เพิมใหม่</button>
<?php endif; ?>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>เลขที่</label>
    <input type="text" class="width-100 search-box" name="code"  value="<?php echo $code; ?>" />
  </div>

	<?php if($this->_customer === FALSE) : ?>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
		<label>ลูกค้า</label>
		<input type="text" class="width-100 search-box" name="customer" value="<?php echo $customer; ?>" />
	</div>
	<?php endif; ?>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
		<label>การอนุมัติ</label>
		<select class="width-100 filter" name="approval" id="approval">
			<option value="all">ทั้งหมด</option>
			<option value="P" <?php echo is_selected('P', $approval); ?>>Pending</option>
			<option value="A" <?php echo is_selected('A', $approval); ?>>Approved</option>
			<option value="R" <?php echo is_selected('R', $approval); ?>>Rejected</option>
			<option value="S" <?php echo is_selected('S', $approval); ?>>Approvaless</option>
		</select>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 padding-5">
		<label>สถานะ</label>
		<select class="width-100 filter" name="status" id="status">
			<option value="all">ทั้งหมด</option>
			<option value="-1" <?php echo is_selected('-1', $status); ?>>Draft</option>
			<option value="0" <?php echo is_selected('0', $status); ?>>Pending</option>
			<option value="1" <?php echo is_selected('1', $status); ?>>Success</option>
			<option value="2" <?php echo is_selected('2', $status); ?>>Canceled</option>
			<option value="3" <?php echo is_selected('3', $status); ?>>Failed</option>
		</select>
	</div>

	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 padding-5">
		<label>วันที่</label>
		<div class="input-daterange input-group width-100">
			<input type="text" class="width-50 text-center from-date" name="from_date" id="fromDate" value="<?php echo $from_date; ?>" />
			<input type="text" class="width-50 text-center" name="to_date" id="toDate" value="<?php echo $to_date; ?>" />
		</div>
	</div>


	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 padding-5">
		<label class="display-block not-show">buton</label>
		<button type="button" class="btn btn-xs btn-primary btn-block" onclick="getSearch()" >Search</button>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 padding-5">
		<label class="display-block not-show">buton</label>
		<button type="button" class="btn btn-xs btn-warning btn-block" onclick="clearFilter()">Reset</button>
	</div>
</div>

</form>
<hr class="padding-5 "/>
<?php echo $this->pagination->create_links(); ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
		<table class="table table-striped table-hover dataTable border-1">
			<thead>
				<tr style="font-size:10px;">
					<th class="fix-width-40 middle text-center">#</th>
					<th class="fix-width-80 middle">วันที่</th>
					<th class="fix-width-120 middle">เลขที่</th>
					<th class="min-width-200 middle">ชื่อ</th>
					<th class="fix-width-100 middle text-right">มูลค่า</th>
					<th class="fix-width-100 middle text-center">การชำระเงิน</th>
					<th class="fix-width-80 middle text-center">การอนุมัติ</th>
					<th class="fix-width-80 middle text-center">สถานะ</th>
					<th class="fix-width-120 middle"></th>
				</tr>
			</thead>
			<tbody style="font-size:12px;">
		<?php if( ! empty($data)) : ?>
			<?php $no = $this->uri->segment($this->segment) + 1; ?>
			<?php foreach($data as $rs) : ?>
				<?php $term = $rs->term > 0 ? "{$rs->term} วัน" : "เงินสด"; ?>
				<tr>
					<td class="middle text-center no"><?php echo $no; ?></td>
					<td class="middle"><?php echo thai_date($rs->DocDate, FALSE, '.'); ?></td>
					<td class="middle"><?php echo $rs->code; ?></td>
					<td class="moddle"><?php echo $rs->CardName; ?></td>
					<td class="middle text-right"><?php echo number($rs->DocTotal, 2); ?></td>
					<td class="middle text-center"><?php echo $term; ?></td>

					<td class="middle text-center">
						<?php if($rs->Status == 0 OR $rs->Status == 1) : ?>
							<?php if($rs->must_approve == 0) : ?>
								<span class="green">System</span>
							<?php else : ?>
								<?php if($rs->Approved == 'P') : ?>
									<span class="orange">Pending</span>
								<?php elseif($rs->Approved == 'A') : ?>
									<span class="green">Approved</span>
								<?php elseif($rs->Approved == 'R') : ?>
								<span class="red">Rejected</span>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					</td>
					<td class="middle text-center">
						<?php if($rs->Status == -1) : ?>
							<span class="purple">Draft</span>
						<?php elseif($rs->Status == 1) : ?>
							<span class="green">Success</span>
						<?php elseif($rs->Status == 2) : ?>
							<span class="red">Canceled</span>
						<?php elseif($rs->Status == 3) : ?>
							<a href="javascript:void(0)" class="red" onclick="showMessage('<?php echo $rs->code; ?>')">Failed</a>
						<?php endif; ?>
					</td>
					<td class="middle text-right">
						<button type="button" class="btn btn-mini btn-info top-btn" onclick="viewDetail('<?php echo $rs->code; ?>')"><i class="fa fa-eye"></i></button>
					<?php if($this->pm->can_edit && ($rs->Status == 0 OR $rs->Status == -1 OR $rs->Status == 3)) : ?>
						<button type="button" class="btn btn-mini btn-warning top-btn" onclick="edit('<?php echo $rs->code; ?>')"><i class="fa fa-pencil"></i></button>
					<?php endif; ?>
					<?php if($rs->Status != 1 && $rs->Status != 2) : ?>
						<button type="button" class="btn btn-mini btn-danger top-btn" onclick="cancleOrder('<?php echo $rs->code; ?>')"><i class="fa fa-trash"></i></button>
					<?php endif; ?>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="failedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom:0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="font-size: 24px; font-weight: bold; padding-bottom: 10px; color:#428bca; border-bottom:solid 2px #428bca">Interface Status</h4>
            </div>
            <div class="modal-body" style="padding-top:5px;">
            <div class="row">
              <div class="col-sm-12 col-xs-12" id="failed-table">

              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<script id="failed-template" type="text/x-handlebarsTemplate">
  <input type="hidden" id="U_WEBORDER" value="{{U_WEBORDER}}"/>
  <table class="table table-bordered" style="margin-bottom:0px;">
    <tbody style="font-size:16px;">
      <tr><td class="width-30">Web Order</td><td class="width-70">{{U_WEBORDER}}</td></tr>
      <tr><td class="width-30">Customer Code</td><td class="width-70">{{CardCode}}</td></tr>
      <tr><td>Customer Name</td><td>{{CardName}}</td></tr>
      <tr><td>Date/Time To SAP</td><td>{{date_upd}}</td></tr>
      <tr><td>Status</td><td class="red">Failed</td></tr>
      <tr><td>Error message</td><td>{{Message}}</td></tr>
    </tbody>
  </table>
</script>
<script src="<?php echo base_url(); ?>scripts/sales_order/sales_order.js?v=<?php echo date('Ymd'); ?>"></script>
<script>

	function toggleSqNo(el) {
		if(el.is(':checked')) {
			$('.sqNo').removeClass('hide');
			$('#chk-sqNo').val(1);
		}
		else {
			$('.sqNo').addClass('hide');
			$('#chk-sqNo').val(0);
		}
	}

	function toggleChannels(el) {
		if(el.is(':checked')) {
			$('.channels').removeClass('hide');
			$('#chk-channels').val(1);
		}
		else {
			$('.channels').addClass('hide');
			$('#chk-channels').val(0);
		}
	}

	function togglePayment(el) {
		if(el.is(':checked')) {
			$('.payment').removeClass('hide');
			$('#chk-payment').val(1);
		}
		else {
			$('.payment').addClass('hide');
			$('#chk-payment').val(0);
		}
	}

	$('#sale_id').select2();
	$('#user_id').select2();
	$('#channels').select2();
	$('#payment').select2();
	$('#approval').select2();
	$('#status').select2();
</script>

<?php $this->load->view('include/footer'); ?>
