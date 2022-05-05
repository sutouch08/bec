
<div class="tab-pane fade active in" id="discount">

	<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
					<span class="form-control left-label">
						<label>
							<input type="radio" class="ace" name="disc" value="P">
							<span class="lbl">&nbsp;&nbsp; ราคา Net</span>
						</label>
					</span>
				</div>
        <div class="col-sm-2 padding-5">
          <input type="number" class="form-control input-sm text-center" id="txt-price" value="0.00" disabled/>
				</div>
				<div class="divider"></div>

        <div class="col-sm-2">
					<span class="form-control left-label margin-top-20">
						<label>
							<input type="radio" class="ace" name="disc" value="D" checked>
							<span class="lbl">&nbsp;&nbsp; ส่วนลด (%)</span>
						</label>
					</span>
				</div>
        <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label class="display-block">Step 1</label>
					<input type="number" class="form-control input-sm text-center" value="20.00" />
        </div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label class="display-block">Step 2</label>
					<input type="number" class="form-control input-sm text-center" value="10.00" />
        </div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label class="display-block">Step 3</label>
					<input type="number" class="form-control input-sm text-center" value="0.00" />
        </div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label class="display-block">Step 4</label>
					<input type="number" class="form-control input-sm text-center" value="0.00" />
        </div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label class="display-block">Step 5</label>
					<input type="number" class="form-control input-sm text-center" value="0.00" />
        </div>
				<div class="divider"></div>

        <div class="col-sm-2">
					<span class="form-control left-label margin-top-20">ของแถม</span>
				</div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5">
					<label>จำนวน</label>
					<input type="number" class="form-control input-sm text-center" value="1.00" />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 padding-5">
					<label>สินค้า</label>
					<input type="text" class="form-control input-sm text-center" placeholder="รหัส/ชื่อสินค้า" />
        </div>
				<div class="col-lg-1 col-md-1 col-sm-1 padding-5">
					<label class="display-block not-show">x</label>
					<button type="button" class="btn btn-xs btn-primary btn-block" onclick="showItemModal()"><i class="fa fa-plus"></i> เพิ่ม</button>
        </div>
				<div class="divider-hidden"></div>
				<div class="col-sm-2 not-show">
					<span class="form-control left-label">ของแถม2</span>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 padding-5 table-responsive" style="max-height:300px;">
					<table class="table table-striped border-1" style="width:600px;">
						<tr id="free-row-1">
							<td style="width:20px;" class="text-center">1</td>
							<td style="min-width:100px;">SKU-00268</td>
							<td style="min-width:200px;">BEC หลอด LED MR16 ขั้ว GU5.3 หรี่ไฟ ดิมไฟได้ รุ่น M DIM</td>
							<td style="width:20px;" class="text-center"><button type="button" class="btn btn-minier btn-danger" onclick="removeFreeRow(1)"><i class="fa fa-trash"></i></button></td>
						</tr>
						<tr id="free-row-2">
							<td style="width:20px;" class="text-center">2</td>
							<td style="min-width:100px;">SKU-00269</td>
							<td style="min-width:200px;">BEC หลอด LED MR16 ขนาด 7 วัตต์ DAISY/หลอดไฟ ขั้ว GU5.3 แพ็ค 2 หลอด</td>
							<td style="width:20px;" class="text-center"><button type="button" class="btn btn-minier btn-danger" onclick="removeFreeRow(2)"><i class="fa fa-trash"></i></button></td>
						</tr>
					</table>
        </div>
				<div class="divider"></div>


        <div class="col-lg-2 col-md-2 col-sm-2">
					<span class="form-control left-label text-right">จำนวนขั้นต่ำ</span>
				</div>
        <div class="col-lg-2 col-md-2 col-sm-2">
					<input type="number" class="form-control input-sm text-center" id="txt-qty" value="5.00" />
        </div>
				<div class="divider-hidden"></div>


        <div class="col-lg-2 col-md-2 col-sm-2">
					<span class="form-control left-label text-right">มูลค่าขั้นต่ำ</span>
				</div>
        <div class="col-lg-2 col-md-2 col-sm-2">
					<input type="number" class="form-control input-sm text-center" id="txt-amount" value="500.00" />
        </div>
				<div class="divider-hidden"></div>
				<div class="divider-hidden"></div>

				<div class="col-lg-2 col-md-2 col-sm-2">
					<span class="form-control left-label text-right">รวมยอดได้</span>
				</div>
        <div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5 margin-top-5">
					<label>
						<input type="radio" class="ace" name="canuse"  value="YES" checked />
						<span class="lbl">&nbsp;&nbsp;ได้</span>
					</label>
        </div>
				<div class="col-lg-1-harf col-md-1-harf col-sm-1-harf padding-5 margin-top-5">
					<label>
						<input type="radio" class="ace" name="canuse"  value="NO" />
						<span class="lbl">&nbsp;&nbsp;ไม่ได้</span>
					</label>
        </div>
				<div class="divider-hidden"></div>


				<div class="divider-hidden"></div>
				<div class="col-sm-2">&nbsp;</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-sm btn-success btn-block" onclick="saveDiscount()"><i class="fa fa-save"></i> บันทึก</button>
				</div>
    </div>

</div><!--- Tab-pane --->

<div class="modal fade" id="freeItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top:30px;">
    <div class="modal-content" style="min-width:800px;">
      <div class="modal-header" style="padding-bottom:0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="font-size: 24px; font-weight: bold; padding-bottom: 10px; color:#428bca; border-bottom:solid 2px #428bca">Seach Results</h4>
      </div>
      <div class="modal-body" style="padding-top:5px;">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5">
						<table class="table table-striped border-1">
							<tr>
								<td style="width:50px;" class="text-center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
								<td style="width:120px;">SKU-00268</td>
								<td style="min-width:400px;">BEC หลอด LED MR16 ขั้ว GU5.3 หรี่ไฟ ดิมไฟได้ รุ่น M DIM</td>
							</tr>
							<tr>
								<td class="text-center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
								<td >SKU-00269</td>
								<td >BEC หลอด LED MR16 ขนาด 7 วัตต์ DAISY/หลอดไฟ ขั้ว GU5.3 แพ็ค 2 หลอด</td>
							</tr>
							<tr>
								<td class="text-center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
								<td>SKU-00201</td>
								<td>BEC หลอด LED MR16 ขนาด 5 วัตต์ DAISY/หลอดไฟ ขั้ว GU5.3 แพ็ค 2 หลอด</td>
							</tr>
							<tr>
								<td class="text-center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
								<td >SKU-00014</td>
								<td >BEC หลอด LED MR16 ขนาด 5 วัตต์ STARLED แพ็ค 2 หลอด</td>
							</tr>
							<tr>
								<td class="text-center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
								<td >3884905060-2</td>
								<td >BEC หลอดไฟ LED 2 วัตต์ แสงวอร์มไวท์ รุ่น VINTAGE-S/Pack 2</td>
							</tr>
						</table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" onclick="addAll()">เพิ่มรายการ</button>
      </div>
    </div>
  </div>
</div>

<script>
	function showItemModal() {
		$('#freeItemModal').modal('show');
	}

</script>
