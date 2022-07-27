<?php $this->load->view('include/header'); ?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 padding-5">
    	<h4 class="title"><?php echo $this->title; ?></h4>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 padding-5">
    	<p class="pull-right top-p">
        	<button type="button" class="btn btn-xs btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> กลับ</button>
					<button type="button" class="btn btn-xs btn-info">คำนวณส่วนลดใหม่</button></button>
        </p>
    </div>
</div>
<hr class="margin-bottom-15 padding-5" />

<?php $this->load->view('orders/order_edit_header'); ?>



<!--  Search Product -->
<div class="row">
  <div class="col-lg-6 col-md-4 col-sm-4 col-xs-8 padding-5 margin-bottom-10">
		<label>Item</label>
		<input type="text" class="form-control input-sm" id="item-name" autofocus>
  </div>

	<div class="col-lg-1 col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
			<label>Qty</label>
		<input type="number" class="form-control input-sm text-center" id="item-qty">
  </div>

	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 padding-5 margin-bottom-10">
			<label class="display-block not-show hidden-xs">Add</label>
    <button type="button" class="btn btn-xs btn-primary btn-block" onclick="addItemToOrder()">Add</button>
  </div>
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 padding-5 margin-bottom-10">
			<label class="display-block not-show hidden-xs">Clear</label>
    <button type="button" class="btn btn-xs btn-warning btn-block" onclick="clearItem()">Clear</button>
  </div>

	<div class="divider-hidden" style="margin:0px;"></div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
		<label>Price</label>
		<input type="text" class="form-control input-sm text-center" id="item-price" disabled>
  </div>

  <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
		<label>Total</label>
		<input type="text" class="form-control input-sm text-center" id="in-stock" disabled>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
			<label>Team</label>
		<input type="text" class="form-control input-sm text-center" id="team-stock" disabled>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
			<label>Committed</label>
		<input type="text" class="form-control input-sm text-center" id="commit-stock" disabled>
  </div>

	<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf col-xs-3 padding-5 margin-bottom-10">
			<label>Available</label>
		<input type="text" class="form-control input-sm text-center" id="available-stock" disabled>
  </div>

	<input type="hidden" id="item-id" />
	<input type="hidden" id="item-code" />
</div>

<hr class="margin-bottom-0 padding-5" />

<?php
	if(getConfig('USE_PRODUCT_GRID'))
	{
		if($this->_user->use_product_grid)
		{
			$this->load->view('orders/order_product_grid');
		}
	}
?>
<!-- End Category Menu ------------------------------------>

<?php $this->load->view('orders/order_detail'); ?>

<?php $this->load->view('orders/order_edit_footer'); ?>

<?php $this->load->view('orders/order_edit_modal'); ?>


<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="modal-item" style="min-width:70%; max-width:90%;">
		<div class="modal-content">
  			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalItemTitle" >โคมไฟติดลอย รุ่น SJ6371/6C</h4>
			 </div>
			 <div class="modal-body text-center">
				 <div class="row">
				 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 scrollbar" style="width:100%; overflow-x:auto; overflow-y:hidden;">
						<table class="table border-1" style="min-width:800px; margin-bottom:0px;">
								<tr>
									<th class="" style="min-width:300px;">Item</th>
									<th class="text-right" style="width:100px;">Price</th>
									<th class="width-10 text-right" style="width:100px;">Total</th>
									<th class="width-10 text-right" style="width:100px;">Team</th>
									<th class="width-10 text-right" style="width:100px;">Available</th>
									<th class="text-center" style="width:100px;">Qty.</th>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3673014376</b><br/>โคมไฟติดลอย รุ่น SJ6371/6C</td>
									<td class="middle text-right">195.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>
						</table>
				 	</div>
				 </div>
			 </div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				<button type="button" class="btn btn-primary" onClick="addToOrder()" >เพิ่มในรายการ</button>
			 </div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="modal-item" style="min-width:70%; max-width:90%;">
		<div class="modal-content">
  			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modalItemTitle" >BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC</h4>
			 </div>
			 <div class="modal-body text-center">
				 <div class="row">
				 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 scrollbar" style="width:100%; overflow-x:auto; overflow-y:hidden;">
						<table class="table border-1" style="min-width:800px; margin-bottom:0px;">
								<tr>
									<th class="" style="min-width:300px;">Item</th>
									<th class="text-right" style="width:100px;">Price</th>
									<th class="width-10 text-right" style="width:100px;">Total</th>
									<th class="width-10 text-right" style="width:100px;">Team</th>
									<th class="width-10 text-right" style="width:100px;">Available</th>
									<th class="text-center" style="width:100px;">Qty.</th>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010215</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC เดย์ไลท์ 10 วัตต์ </td>
									<td class="middle text-right">195.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010235</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC เดย์ไลท์ 30 วัตต์ </td>
									<td class="middle text-right">490.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010245</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC เดย์ไลท์ 50 วัตต์ </td>
									<td class="middle text-right">695.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010250-1</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC เดย์ไลท์ 100 วัตต์ </td>
									<td class="middle text-right">1,500.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010210</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC แสงวอร์มไวท์ 10 วัตต์ </td>
									<td class="middle text-right">195.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010230</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC แสงวอร์มไวท์ 30 วัตต์ </td>
									<td class="middle text-right">490.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left"><b>รหัสสินค้า 3881010240</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC แสงวอร์มไวท์ 50 วัตต์ </td>
									<td class="middle text-right">695.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>

								<tr>
									<td class="middle text-left">รหัสสินค้า 3881010250-2</b><br/>BEC โคมฉาย LED 100 วัตต์ รุ่น ZONIC แสงวอร์มไวท์ 100 วัตต์ </td>
									<td class="middle text-right">1,500.00</td>
									<td class="middle text-right">1,000</td>
									<td class="middle text-right">350</td>
									<td class="middle text-right">200</td>
									<td class="middle text-center"><input type="number" class="form-control input-sm text-center"></td>
								</tr>
						</table>
				 	</div>
				 </div>
			 </div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				<button type="button" class="btn btn-primary" onClick="addToOrder()" >เพิ่มในรายการ</button>
			 </div>
		</div>
	</div>
</div>

<script>
	function showGrid(id) {
		$('#modal-'+id).modal('show');
	}
</script>
<script src="<?php echo base_url(); ?>scripts/orders/orders.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/orders/order_add.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
