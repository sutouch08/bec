<?php $id = $rule->id; ?>
<div class="modal fade" id="style-list-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:600px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">รุ่นสินค้าที่กำหนด</h4>
      </div>
      <div class="modal-body" id="style-list-body">
        <ul style="list-style-type:none;" id="style-list">
<?php
      $qr  = "SELECT ps.code FROM discount_rule_product_style AS sr ";
      $qr .= "LEFT JOIN product_style AS ps ON sr.style_code = ps.code ";
      $qr .= "WHERE sr.id_rule = ".$id;
?>
<?php $qs = $this->db->query($qr); ?>
<?php if($qs->num_rows() > 0) : ?>
<?php  $style_no = 1; ?>
<?php   foreach($qs->result() as $rs) : ?>
          <li style="min-height:15px; padding:5px;" id="style-id-<?php echo $style_no; ?>">
            <a href="#" class="paddint-5" onclick="removeStyleId('<?php echo $style_no; ?>')">
              <i class="fa fa-times red"></i>
            </a>
            <span style="margin-left:10px;"><?php echo $rs->code; ?></span>
          </li>
          <input type="hidden" name="styleId[<?php echo $style_no; ?>]" id="styleId-<?php echo $style_no; ?>" class="styleId" value="<?php echo $rs->code; ?>" />
					<?php $style_no++; ?>
<?php endforeach; ?>
<?php endif; ?>
        </ul>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="pd-cat-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">เลือกหมวดหมู่สินค้า</h4>
      </div>
      <div class="modal-body" id="pd-cat-body">
        <div class="row">
          <div class="col-sm-12">
    <?php
    $qs = $this->db->query("SELECT * FROM product_category"); ?>
    <?php if($qs->num_rows() > 0) : ?>
      <?php $sd = $this->discount_rule_model->getRuleProductCategory($id); ?>
      <?php foreach($qs->result() as $rs) : ?>
        <?php $se = isset($sd[$rs->code]) ? 'checked' : ''; ?>
              <label class="display-block">
                <input type="checkbox" class="chk-pd-cat" name="chk-pd-cat-<?php echo $rs->code; ?>" id="chk-pd-cat-<?php echo $rs->code; ?>" value="<?php echo $rs->code; ?>" <?php echo $se; ?> />
                <?php echo $rs->name; ?>
              </label>
      <?php endforeach; ?>
    <?php endif;?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="pd-kind-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">เลือกประเภทสินค้า</h4>
      </div>
      <div class="modal-body" id="pd-kind-body">
        <div class="row">
          <div class="col-sm-12">
						<?php
				    $qs = $this->db->query("SELECT * FROM product_tab WHERE id_parent = 0"); ?>
				    <?php if($qs->num_rows() > 0) : ?>
				      <?php foreach($qs->result() as $rs) : ?>
				              <label class="display-block">
				                <input type="checkbox" class="chk-pd-type" name="chk-pd-type-<?php echo $rs->id; ?>" id="chk-pd-type-<?php echo $rs->id; ?>" value="<?php echo $rs->name; ?>" />
				                <?php echo $rs->name; ?>
				              </label>
											<?php $qa = $this->db->query("SELECT * FROM product_tab WHERE id_parent = {$rs->id}"); ?>
											<?php if($qa->num_rows() > 0) : ?>
											<?php 	foreach($qa->result() as $ra) : ?>
												<label class="display-block">
													--- &nbsp;
					                <input type="checkbox" class="chk-pd-type" name="chk-pd-type-<?php echo $ra->id; ?>" id="chk-pd-type-<?php echo $ra->id; ?>" value="<?php echo $ra->name; ?>" />
					                <?php echo $ra->name; ?>
					              </label>
											<?php endforeach; ?>
										<?php endif; ?>
				      <?php endforeach; ?>
				    <?php endif;?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="pd-brand-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">เลือกยี่ห้อสินค้า</h4>
      </div>
      <div class="modal-body" id="pd-brand-body">
        <div class="row">
          <div class="col-sm-12">
    <?php
    $qs = $this->db->query("SELECT * FROM product_brand"); ?>
    <?php if($qs->num_rows() > 0) : ?>
      <?php $sd = $this->discount_rule_model->getRuleProductBrand($id); ?>
      <?php foreach($qs->result() as $rs) : ?>
        <?php $se = isset($sd[$rs->code]) ? 'checked' : ''; ?>
              <label class="display-block">
                <input type="checkbox" class="chk-pd-brand" name="chk-pd-brand-<?php echo $rs->code; ?>" id="chk-pd-brand-<?php echo $rs->code; ?>" value="<?php echo $rs->code; ?>" <?php echo $se; ?> />
                <?php echo $rs->name; ?>
              </label>
      <?php endforeach; ?>
    <?php endif;?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
