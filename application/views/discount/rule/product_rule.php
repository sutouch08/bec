<?php
$allProduct = $rule->all_product == 0 ? 'N' : 'Y';
$id = $rule->id;
/*
//--- ระบุชื่อสินค้า
$pdList = getRuleProductId($id);
$pdListNo = count($cusList);
$product_id = ($allProduct == 'N' && $pdListNo > 0 ) ? 'Y' : 'N';
*/

//--- กำหนดรุ่นสินค้า
$pdStyle = $this->discount_rule_model->getRuleProductStyle($id);
$pdStyleNo = count($pdStyle);
$product_style = ($pdStyleNo > 0 && $allProduct == 'N') ? 'Y' : 'N';

//--- กำหนดกลุ่มสินค้า
$pdGroup = $this->discount_rule_model->getRuleProductGroup($id);
$pdGroupNo = count($pdGroup);
$product_group = ($pdGroupNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';


//--- กำหนดกลุ่มย่อยสินค้า
$pdSub = $this->discount_rule_model->getRuleProductSubGroup($id);
$pdSubNo = count($pdSub);
$product_sub_group = ($pdSubNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';

//--- กำหนดชนิดสินค้า
$pdType = $this->discount_rule_model->getRuleProductType($id);
$pdTypeNo = count($pdType);
$product_type = ($pdTypeNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';

//--- กำหนดประเภทสินค้า
$pdKind = $this->discount_rule_model->getRuleProductKind($id);
$pdKindNo = count($pdKind);
$product_kind = ($pdKindNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';


//--- กำหนดหมวดหมู่สินค้า
$pdCategory = $this->discount_rule_model->getRuleProductCategory($id);
$pdCategoryNo = count($pdCategory);
$product_category = ($pdCategoryNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';


//--- กำหนดปีสินค้า
$pdYear = $this->discount_rule_model->getRuleProductYear($id);
$pdYearNo = count($pdYear);
$product_year = ($pdYearNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';


//--- กำหนดยี่ห้อสินค้า
$pdBrand = $this->discount_rule_model->getRuleProductBrand($id);
$pdBrandNo = count($pdBrand);
$product_brand = ($pdBrandNo > 0 && $allProduct == 'N' && $product_style == 'N') ? 'Y' : 'N';
 ?>
<div class="tab-pane fade" id="product">

	<div class="row">
        <div class="col-sm-8 top-col">
            <h4 class="title">กำหนดเงื่อนไขตามคุณสมบัติสินค้า</h4>
        </div>

        <div class="divider margin-top-5"></div>
        <div class="col-sm-2">
					<span class="form-control left-label text-right">สินค้าทั้งหมด</span>
				</div>
        <div class="col-sm-2">
          <div class="btn-group width-100">
          	<button type="button" class="btn btn-sm width-50 btn-primary" id="btn-pd-all-yes" onclick="toggleAllProduct('Y')">YES</button>
						<button type="button" class="btn btn-sm width-50" id="btn-pd-all-no" onclick="toggleAllProduct('N')">NO</button>
          </div>
        </div>
				<div class="divider-hidden"></div>


        <div class="col-sm-2">
					<span class="form-control left-label text-right">รายการสินค้า</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-pd-all btn btn-sm width-50" id="btn-style-id-yes" onclick="toggleStyleId('Y')" disabled>YES</button>
						<button type="button" class="not-pd-all btn btn-sm width-50 btn-primary" id="btn-style-id-no" onclick="toggleStyleId('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<input type="text" class="option form-control input-sm text-center" id="txt-style-id-box" placeholder="รหัส/ชื่อสินค้า" disabled />
					<input type="hidden" id="id_style" />
				</div>
				<div class="col-sm-1 padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block" id="btn-style-id-add" onclick="addStyleId()" disabled><i class="fa fa-plus"></i> เพิ่ม</button>
				</div>
				<div class="col-sm-1 col-1-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block" id="btn-style-import" onclick="getUploadFile()" disabled><i class="fa fa-upload"></i> import</button>
				</div>
				<div class="col-sm-2 padding-5">
					<span class="form-control input-sm text-center"><span id="psCount"><?php echo $pdStyleNo; ?></span>  รายการ</span>
					<input type="hidden" id="style-no" value="<?php echo $pdStyleNo; ?>" />
				</div>
				<div class="col-sm-1 padding-5">
					<button type="button" class="option btn btn-xs btn-primary btn-block" id="btn-show-style-name" onclick="showStyleList()">
						แสดง
					</button>
				</div>
				<div class="divider-hidden"></div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">ประเภทสินค้า</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-pd-all btn btn-sm width-50" id="btn-pd-kind-yes" onclick="toggleProductKind('Y')" disabled>YES</button>
						<button type="button" class="not-pd-all btn btn-sm width-50 btn-primary" id="btn-pd-kind-no" onclick="toggleProductKind('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-pd-kind" onclick="showProductKind()" disabled>
						เลือกประเภทสินค้า <span class="badge pull-right" id="badge-pd-kind"><?php echo $pdKindNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">หมวดหมู่สินค้า</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-pd-all btn btn-sm width-50" id="btn-pd-cat-yes" onclick="toggleProductCategory('Y')" disabled>YES</button>
						<button type="button" class="not-pd-all btn btn-sm width-50 btn-primary" id="btn-pd-cat-no" onclick="toggleProductCategory('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-pd-cat" onclick="showProductCategory()" disabled>
						เลือกเขตสินค้า <span class="badge pull-right" id="badge-pd-cat"><?php echo $pdCategoryNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">ยี่ห้อสินค้า</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-pd-all btn btn-sm width-50" id="btn-pd-brand-yes" onclick="toggleProductBrand('Y')" disabled>YES</button>
						<button type="button" class="not-pd-all btn btn-sm width-50 btn-primary" id="btn-pd-brand-no" onclick="toggleProductBrand('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-pd-brand" onclick="showProductBrand()" disabled>
						เลือกยี่ห้อสินค้า <span class="badge pull-right" id="badge-pd-brand"><?php echo $pdBrandNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>

        <div class="divider-hidden"></div>
				<div class="col-sm-2">&nbsp;</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-sm btn-success btn-block" onclick="saveProduct()"><i class="fa fa-save"></i> บันทึก</button>
				</div>


    </div>

		<input type="hidden" id="all_product" value="<?php echo $allProduct; ?>" />
		<!-- <input type="hidden" id="product_id" value="<?php //echo $product_id; ?>" /> -->
    <input type="hidden" id="product_style" value="<?php echo $product_style; ?>" />
		<input type="hidden" id="product_group" value="<?php echo $product_group; ?>" />
    <input type="hidden" id="product_sub" value="<?php echo $product_sub_group; ?>" />
		<input type="hidden" id="product_type" value="<?php echo $product_type; ?>" />
		<input type="hidden" id="product_kind" value="<?php echo $product_kind; ?>" />
		<input type="hidden" id="product_category" value="<?php echo $product_category; ?>" />
		<input type="hidden" id="product_brand" value="<?php echo $product_brand; ?>" />
    <input type="hidden" id="product_year" value="<?php echo $product_year; ?>" />

		<div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 <div class="modal-dialog" style="width:500px;">
		   <div class="modal-content">
		       <div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		       <h4 class="modal-title">Import Product Model</h4>
		      </div>
		      <div class="modal-body">
		        <form id="upload-form" name="upload-form" method="post" enctype="multipart/form-data">
		        <div class="row">
		          <div class="col-sm-9">
		            <button type="button" class="btn btn-sm btn-primary btn-block" id="show-file-name" onclick="getFile()">กรุณาเลือกไฟล์ Excel</button>
		          </div>

		          <div class="col-sm-3">
		            <button type="button" class="btn btn-sm btn-info" onclick="readExcelFile()"><i class="fa fa-cloud-upload"></i> นำเข้า</button>
		          </div>
		        </div>
		        <input type="file" class="hide" name="uploadFile" id="uploadFile" accept=".xlsx" />
		        </form>
		       </div>
		      <div class="modal-footer">

		      </div>
		   </div>
		 </div>
		</div>


</div><!--- Tab-pane --->
<?php $this->load->view('discount/rule/product_rule_modal'); ?>