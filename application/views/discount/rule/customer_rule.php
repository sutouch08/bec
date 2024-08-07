<?php
$allCustomer = $rule->all_customer == 0 ? 'N' : 'Y';
//--- ระบุชื่อลูกค้า
$cusListNo = (! empty($cusList) ? count($cusList) : 0);
$customer_id = ($allCustomer == 'N' && $cusListNo > 0 ) ? 'Y' : 'N';

//--- กำหนดกลุ่มลูกค้า
$custGroupNo = ( ! empty($custGroup) ? count($custGroup) : 0);
$customer_group = ($custGroupNo > 0 && $allCustomer == 'N' && $customer_id == 'N') ? 'Y' : 'N';

//--- กำหนดชนิดลูกค้า
$custTypeNo = ( ! empty($custType) ? count($custType) : 0);
$customer_type = ($custTypeNo > 0 && $allCustomer == 'N' && $customer_id == 'N') ? 'Y' : 'N';

//--- กำหนดประเภทลูกค้า
$custRegionNo = ( ! empty($custRegion) ? count($custRegion) : 0);
$customer_region = ($custRegionNo > 0 && $allCustomer == 'N' && $customer_id == 'N') ? 'Y' : 'N';

//--- กำหนดเขตลูกค้า
$custAreaNo = ( ! empty($custArea) ? count($custArea) : 0);
$customer_area = ($custAreaNo > 0 && $allCustomer == 'N' && $customer_id == 'N') ? 'Y' : 'N';

//--- กำหนดเกรดลูกค้า
$custGradeNo = count($custGrade);
$customer_grade = ($custGradeNo > 0 && $allCustomer == 'N' && $customer_id == 'N') ? 'Y' : 'N';
 ?>

	<div class="row">
        <div class="col-sm-8 top-col">
            <h4 class="title">Conditions according to customer attributes</h4>
        </div>

        <div class="divider margin-top-5"></div>
        <div class="col-sm-2">
					<span class="form-control left-label text-right">All customer</span>
				</div>
        <div class="col-sm-2">
          <div class="btn-group width-100">
          	<button type="button" class="btn btn-sm width-50 btn-primary" id="btn-cust-all-yes" onclick="toggleAllCustomer('Y')">YES</button>
						<button type="button" class="btn btn-sm width-50" id="btn-cust-all-no" onclick="toggleAllCustomer('N')">NO</button>
          </div>
        </div>
				<div class="divider-hidden"></div>


        <div class="col-sm-2">
					<span class="form-control left-label text-right">Individual customers</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-id-yes" onclick="toggleCustomerId('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-id-no" onclick="toggleCustomerId('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-lg-6 col-md-6 col-sm-6 padding-5">
					<input type="text" class="option form-control input-sm" id="txt-cust-id-box" placeholder="ค้นหาชื่อลูกค้า" disabled />
					<input type="hidden" id="id_customer" />
				</div>
				<div class="col-sm-1 padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block" id="btn-cust-id-add" onclick="addCustId()" disabled><i class="fa fa-plus"></i> เพิ่ม</button>
				</div>

				<div class="divider-hidden"></div>
				<div class="col-sm-2 not-show">
					<span class="form-control left-label">SKU</span>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 padding-5" style="max-height:300px; overflow-y:scroll; margin-bottom:5px;">
					<table class="table table-striped border-1">
						<thead>
							<tr>
								<th class="fix-width-40">
									<label>
										<input type="checkbox" class="ace" onchange="checkCustomerAll($(this))">
										<span class="lbl"></span>
									</label>
								</th>
								<th class="fix-width-150">Customer Code</th>
								<th class="min-width-250">Customer Name</th>
								<th class="fix-width-60 text-center"><button type="button" class="btn btn-mini btn-danger btn-block" onclick="removeCustomer()">Delete</button></th>
							</tr>
						</thead>
						<tbody id="customerList">
							<?php if(!empty($cusList)) : ?>
								<?php foreach($cusList as $rs) : ?>
									<tr id="customer-row-<?php echo $rs->customer_id; ?>">
										<td class="middle text-center">
											<label>
												<input type="checkbox" class="ace customer-chk" value="<?php echo $rs->customer_id; ?>">
												<span class="lbl"></span>
											</label>
										</td>
										<td class="middle">
										<?php echo $rs->customer_code; ?>
										<input type="hidden" class="customer-id" id="customer-id-<?php echo $rs->customer_id; ?>" value="<?php echo $rs->customer_id; ?>">
										</td>
										<td class="middle" colspan="2"><?php echo $rs->customer_name; ?></td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
        </div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">Customer Group</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-group-yes" onclick="toggleCustomerGroup('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-group-no" onclick="toggleCustomerGroup('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-cust-group" onclick="showCustomerGroup()" disabled>
						Customer Group <span class="badge pull-right" id="badge-group"><?php echo $custGroupNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>



				<div class="col-sm-2">
					<span class="form-control left-label text-right">Customer Type</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-type-yes" onclick="toggleCustomerType('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-type-no" onclick="toggleCustomerType('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-cust-type" onclick="showCustomerType()" disabled>
						Customer Type <span class="badge pull-right" id="badge-type"><?php echo $custTypeNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>



				<div class="col-sm-2">
					<span class="form-control left-label text-right">Sales Team</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-region-yes" onclick="toggleCustomerRegion('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-region-no" onclick="toggleCustomerRegion('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-cust-region" onclick="showCustomerRegion()" disabled>
						Customer Region <span class="badge pull-right" id="badge-region"><?php echo $custRegionNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">Customer Area</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-area-yes" onclick="toggleCustomerArea('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-area-no" onclick="toggleCustomerArea('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-cust-area" onclick="showCustomerArea()" disabled>
						Customer Area <span class="badge pull-right" id="badge-area"><?php echo $custAreaNo; ?></span>
					</button>
				</div>
				<div class="divider-hidden"></div>


				<div class="col-sm-2">
					<span class="form-control left-label text-right">Customer Grade</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="not-all btn btn-sm width-50" id="btn-cust-grade-yes" onclick="toggleCustomerGrade('Y')" disabled>YES</button>
						<button type="button" class="not-all btn btn-sm width-50 btn-primary" id="btn-cust-grade-no" onclick="toggleCustomerGrade('N')" disabled>NO</button>
					</div>
        </div>
				<div class="col-sm-2 col-2-harf padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-select-cust-grade" onclick="showCustomerGrade()" disabled>
						Customer Grade <span class="badge pull-right" id="badge-grade"><?php echo $custGradeNo; ?></span>
					</button>
				</div>
        <div class="divider-hidden"></div>
				<div class="col-sm-2">&nbsp;</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-xs btn-success btn-block" onclick="saveCustomer()"><i class="fa fa-save"></i> บันทึก</button>
				</div>
    </div>

		<input type="hidden" id="all_customer" value="<?php echo $allCustomer; ?>" />
		<input type="hidden" id="customer_id" value="<?php echo $customer_id; ?>" />
		<input type="hidden" id="customer_group" value="<?php echo $customer_group; ?>" />
		<input type="hidden" id="customer_type" value="<?php echo $customer_type; ?>" />
		<input type="hidden" id="customer_region" value="<?php echo $customer_region; ?>" />
		<input type="hidden" id="customer_area" value="<?php echo $customer_area; ?>" />
		<input type="hidden" id="customer_grade" value="<?php echo $customer_grade; ?>" />

		<script type="text/x-handlebarsTemplate" id="customerRowTemplate">
			<tr id="customer-row-{{id}}">
				<td class="middle text-center"><label><input type="checkbox" class="ace customer-chk" value="{{id}}"><span class="lbl"></span></label></td>
				<td class="middle">
				{{code}}
				<input type="hidden" class="customer-id" id="customer-id-{{id}}" value="{{id}}">
				</td>
				<td class="middle" colspan="2">{{name}}</td>
			</tr>
		</script>

<?php $this->load->view('discount/rule/customer_rule_modal'); ?>
