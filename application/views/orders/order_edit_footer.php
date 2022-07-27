<div class="divider-hidden"></div>
<div class="divider-hidden"></div>

<div class="row">
  <!--- left column -->
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-5 margin-bottom-15">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 padding-5 text-right hidden-xs margin-bottom-5">Sale Employee</div>
			<div class="col-lg-7 col-7 col-sm-7 col-xs-6 padding-5 margin-bottom-5">
				<label class="visible-xs">Sale Employee</label>
				<input type="text" id="slpCode" class="form-control input-sm" value="รุจิรา แช่มเอี่ยม" disabled="">
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 padding-5 text-right hidden-xs margin-bottom-5">Owner</div>
			<div class="col-lg-7 col-7 col-sm-7 col-xs-6 padding-5 margin-bottom-5">
				<label class="visible-xs">Owner</label>
				<select class="form-control input-sm" id="owner">
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
			<textarea id="comments" maxlength="254" class="form-control" style="height:100px; width:450px;"></textarea>
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
					<input type="hidden" id="totalAmount" value="<?php echo $totalAmount; ?>" />
          <input type="text" class="form-control input-sm text-right" id="totalAmountLabel" value="<?php echo number($totalAmount, 2); ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-5 text-right">Discount</div>
        <div class="col-lg-3 col-md-3 col-sm- 3 col-xs-3 padding-5">
          <span class="input-icon input-icon-right">
          <input type="number" id="discPrcnt" class="form-control input-sm" value="<?php echo round($order->DiscPrcnt, 2); ?>">
          <i class="ace-icon fa fa-percent"></i>
          </span>
        </div>
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 padding-5">
					<input type="hidden" id="discAmount" value="<?php echo $order->DiscAmount; ?>">
          <input type="text" id="discAmountLabel" class="form-control input-sm text-right" value="<?php echo number($order->DiscAmount, 2); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Rouding</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
          <input type="number" id="roundDif" class="form-control input-sm text-right" value="<?php echo round($order->RoundDif, 2); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Tax</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
					<input type="hidden" id="tax" value="<?php echo $totalVat; ?>" />
          <input type="text" id="taxLabel" class="form-control input-sm text-right" value="<?php echo number($totalVat, 2); ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5 text-right">Total</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding-5">
					<input type="hidden" id="docTotal" value="<?php echo $order->DocTotal; ?>" />
          <input type="text" id="docTotalLabel" class="form-control input-sm text-right" value="<?php echo number($order->DocTotal, 2); ?>">
        </div>
      </div>

    </div>
  </div>

  <div class="divider-hidden"></div>
  <div class="divider-hidden"></div>
  <div class="divider-hidden"></div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 text-right">
		<button type="button" class="btn btn-sm btn-purple" onclick="saveDarf()">Save AS Draft</button>
    <button type="button" class="btn btn-sm btn-success" onclick="saveOrder()" style="width:100px;">Save</button>
  </div>

</div>
