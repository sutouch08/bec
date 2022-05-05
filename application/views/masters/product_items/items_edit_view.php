<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
  </div>
	<div class="col-sm-6 padding-5">
		<p class="pull-right top-p">
			<button type="button" class="btn btn-sm btn-warning" onclick="goBack()"><i class="fa fa-arrow-left"></i> Back</button>
		</p>
	</div>
</div><!-- End Row -->
<hr class="margin-bottom-15 padding-5"/>

<script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dropzone.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css" />

<div class="row">
<div class="col-sm-1 padding-right-0 padding-top-15">
	<ul id="myTab1" class="setting-tabs width-100" style="margin-left:0px;">
	  <li class="li-block active in" >
			<a href="#styleTab" data-toggle="tab" style="text-decoration:none;">ข้อมูล</a>
		</li>
		<li class="li-block">
			<a href="#imageTab" data-toggle="tab" style="text-decoration:none;" >รูปภาพ</a>
		</li>
	</ul>
</div>

<div class="col-sm-11" style="padding-top:15px; border-left:solid 1px #ccc; min-height:600px; ">
<div class="tab-content" style="border:0">
	<div class="tab-pane fade active in" id="styleTab">
		<div class="row">
			<form class="form-horizontal" id="addForm" method="post" action="">
			<div class="row">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">รหัส</label>
					<div class="col-xs-12 col-sm-3">
						<input type="text" class="width-100" value="3673014376" disabled />
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="code-error"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">ชื่อ</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" name="name" id="name" class="width-100" value="โคมไฟติดลอย รุ่น SJ6371/6C" disabled />
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="name-error"></div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">ราคาขาย</label>
					<div class="col-xs-12 col-sm-3">
						<input type="text" name="price" id="price" class="width-100" value="4,440.00" disabled />
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="price-error"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">รุ่นสินค้า</label>
					<div class="col-xs-12 col-sm-5">
						<select name="category_code" id="category" class="form-control" >
							<option value="">โปรดเลือก</option>
							<option value="" selected>	โคมไฟติดลอย รุ่น SJ6371/6C</option>
							<option value="1">a-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto</option>
							<option value="2">BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K</option>
							<option value="">BEC โคมฉาย LED 100 วัตต์ แสงวอร์มไวท์ รุ่น ZONIC เดย์ไลท์</option>
						</select>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="category-error"></div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">ยี่ห้อ</label>
					<div class="col-xs-12 col-sm-3">
						<select name="brand_code" id="brand" class="form-control">
							<option value="">โปรดเลือก</option>
							<?php echo select_product_brand('BEC'); ?>
						</select>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="brand-error"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">หมวดหมู่</label>
					<div class="col-xs-12 col-sm-3">
						<select name="category_code" id="category" class="form-control" >
							<option value="">โปรดเลือก</option>
							<option value="1">หลอดไฟ LED</option>
							<option value="2">โคมไฟภายนอก</option>
							<option value="" selected>โคมไฟภายใน</option>
						</select>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="category-error"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">ประเภท</label>
					<div class="col-xs-12 col-sm-8" style="padding-top:10px;">
						<?php echo productTabsTree(); ?>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red" id="kind-error"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">สถานะ</label>
					<div class="col-xs-12 col-sm-3" style="padding-top:5px;">
						<label style="margin-left:20px;">
							<input type="radio" class="ace" name="active" checked />
							<span class="lbl">  Active</span>
						</label>
						<label style="margin-left:20px;">
							<input type="radio" class="ace" name="active" />
							<span class="lbl">  Inactive</span>
						</label>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red"></div>
				</div>

				<div class="divider-hidden"></div>
				<div class="divider-hidden"></div>


				<div class="form-group">
					<label class="col-sm-3 control-label not-show">บันทึก</label>
					<div class="col-xs-12 col-sm-3">
						<button type="button" class="btn btn-sm btn-success" onclick="save()"><i class="fa fa-save"></i> บันทึก</button>
					</div>
					<div class="help-block col-xs-12 col-sm-reset inline red"></div>
				</div>
			</div>
			</form>
		</div><!--/ row  -->
	</div>



	<div class="tab-pane fade" id="imageTab">
		<div class="row">
		  <div class="col-sm-4">
		    <span class="form-control label-right">
		      <h4 class="title">เพิ่มรูปภาพสำหรับสินค้านี้</h4>
		    </span>
		  </div>
		  <div class="col-sm-4">
		    <button type="button" class="btn btn-primary btn-block" onClick="showUploadBox()">
		      <i class="fa fa-cloud-upload"></i> เพิ่มรูปภาพ
		    </button>
		  </div>
		  <div class="col-sm-4">
		    <span class="help-block" style="margin-top:15px; margin-bottom:0px;">ไฟล์ : jpg, png, gif ขนาดสูงสุด 2 MB</span>
		  </div>
		</div><!--/ row -->

		<hr/>
		<div class="row" id="imageTable">

		  <div class="col-sm-3" id="img-1">
		    <div class="thumbnail">
		      <a data-rel="colorbox" href="#">
		        <img class="img-rounded" src="<?php echo base_url(); ?>images/products/56.jpg" />
		      </a>
		      <div class="caption">
		        <button type="button" class="btn btn-sm btn-success btn-cover" id="btn-cover-1" onclick="setAsCover(1)"><i class="fa fa-check"></i></button>
		        <button type="button" class="btn btn-sm btn-danger" onclick="removeImage(1)" style="position:relative; float:right;"><i class="fa fa-trash"></i></button>
		      </div>
		    </div>
		  </div>

			<div class="col-sm-3" id="img-2">
		    <div class="thumbnail">
		      <a data-rel="colorbox" href="#">
		        <img class="img-rounded" src="<?php echo base_url(); ?>images/products/oe.jpg" />
		      </a>
		      <div class="caption">
		        <button type="button" class="btn btn-sm btn-cover" id="btn-cover-2" onclick="setAsCover(2)"><i class="fa fa-check"></i></button>
		        <button type="button" class="btn btn-sm btn-danger" onclick="removeImage(2)" style="position:relative; float:right;"><i class="fa fa-trash"></i></button>
		      </div>
		    </div>
		  </div>

		</div><!--/ row -->


		<div class="modal fade" id="uploadBox" tabindex="-1" role="dialog" aria-labelledby="uploader" aria-hidden="true">
			<div class="modal-dialog" style="width:800px">
		  	<div class="modal-content">
		    	<div class="modal-header">
		        <h4 class="modal-title">อัพโหลดรูปภาพสำหรับสินค้านี้</h4>
		      </div>
		      <div class="modal-body">
		      	<form class="dropzone" id="imageForm" action="">
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-sm btn-default" onClick="clearUploadBox()">ปิด</button>
		        <button type="button" class="btn btn-sm btn-primary" onClick="doUpload()">Upload</button>
		      </div>
		    </div>
		  </div>
		</div>

		<script id="imageTableTemplate" type="text/x-handlebars-temlate">
		{{#each this}}
			{{#if id_img}}
				<div class="col-sm-3" id="div-image-{{ id_img }}">
					<div class="thumbnail">
						<a data-rel="colorbox" href="{{ bigImage }}">
							<img class="img-rounded" src="{{ thumbImage }}" />
						</a>
						<div class="caption">
							<button type="button" id="btn-cover-{{ id_img }}" class="btn btn-sm {{ isCover }} btn-cover" style="position:relative;" onClick="setAsCover('{{ id_pd }}', {{ id_img }})"><i class="fa fa-check"></i></button>
							<button type="button" class="btn btn-sm btn-danger" style="position:absolute; right:25px;" onClick="removeImage({{ id_pd }}, {{ id_img }})"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div>
			{{else}}
				<div class="col-sm-12"><h4 style="text-align:center; padding-top:50px; color:#AAA;"><i class="fa fa-file-image-o fa-2x"></i> No image now</h4></div>
			{{/if}}
		{{/each}}
		</script>
	</div>

</div>
</div><!--/ col-sm-9  -->
</div><!--/ row  -->









<script src="<?php echo base_url(); ?>scripts/masters/items.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/masters/product_image.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
