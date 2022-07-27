<div class="row">
	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 padding-5">
		<div class="input-group width-100">
    	<span class="input-group-addon">เลขที่</span>
      <input type="text" class="form-control text-center" value="<?php echo $order->code; ?>" disabled />
    </div>
	</div>
	<div class="col-lg-1-harf col-md-3 col-sm-3 col-xs-6 padding-5">
		<div class="input-group width-100">
			<span class="input-group-addon">วันที่</span>
			<input type="text" id="DocDate" class="form-control" value="<?php echo thai_date($order->DocDate); ?>" readonly disabled/>
		</div>
	</div>

	<div class="col-lg-1-harf col-md-3 col-sm-3 col-xs-6 padding-5">
		<div class="input-group width-100">
			<span class="input-group-addon">รหัส</span>
			<input type="text" class="form-control text-center" id="customer_code" value="<?php echo $order->CardCode; ?>" disabled />
		</div>
	</div>
  <div class="col-lg-7 col-md-4-harf col-sm-8 col-xs-8 padding-5">
		<div class="input-group width-100">
			<span class="input-group-addon">ชื่อ</span>
			<input type="text" class="form-control" id="customer_name" value="<?php echo $order->CardName; ?>" disabled />
    </div>
	</div>
</div>
<input type="hidden" id="channels" value="<?php echo $order->Channels; ?>" />
<input type="hidden" id="payment" value="<?php echo $order->Payment; ?>" />

<input type="hidden" id="code" value="<?php echo $order->code; ?>" />
<input type="hidden" id="priceList" value="<?php echo $order->PriceList; ?>" />
<input type="hidden" id="vat_rate" value="<?php echo $order->VatRate; ?>" />

<hr class="margin-top-15 padding-5"/>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5">

	</div>
</div>
