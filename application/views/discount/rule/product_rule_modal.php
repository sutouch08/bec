
<div class="modal fade" id="pd-cat-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Category</h4>
      </div>
      <div class="modal-body" id="pd-cat-body">
        <div class="row" style="margin-left:0px;">
          <div class="col-sm-12">
    <?php if(! empty($product_categorys)) : ?>
      <?php foreach($product_categorys as $rs) : ?>
        <?php $se = isset($pdCategory[$rs->id]) ? 'checked' : ''; ?>
              <label class="display-block">
                <input type="checkbox"
								class="ace chk-pd-cat"
								name="chk-pd-cat-<?php echo $rs->id; ?>"
								id="chk-pd-cat-<?php echo $rs->id; ?>"
								value="<?php echo $rs->id; ?>" <?php echo $se; ?> />
								<span class="lbl">+&nbsp;<?php echo $rs->name; ?></span>
              </label>
					<?php $level2 = $this->product_category_model->get_by_parent($rs->id); ?>
						<?php if(! empty($level2)) : ?>
							<?php foreach($level2 as $l2) : ?>
								<?php $se = isset($pdCategory[$l2->id]) ? 'checked' : ''; ?>
								<label class="display-block">
	                <input type="checkbox"
									class="ace chk-pd-cat"
									name="chk-pd-cat-<?php echo $l2->id; ?>"
									id="chk-pd-cat-<?php echo $l2->id; ?>"
									value="<?php echo $l2->id; ?>" <?php echo $se; ?> />
									<span class="lbl">++&nbsp;<?php echo $l2->name; ?></span>
	              </label>
								<?php $level3 = $this->product_category_model->get_by_parent($l2->id); ?>
									<?php if(! empty($level3)) : ?>
										<?php foreach($level3 as $l3) : ?>
											<?php $se = isset($pdCategory[$l3->id]) ? 'checked' : ''; ?>
											<label class="display-block">
				                <input type="checkbox"
												class="ace chk-pd-cat"
												name="chk-pd-cat-<?php echo $l3->id; ?>"
												id="chk-pd-cat-<?php echo $l3->id; ?>"
												value="<?php echo $l3->id; ?>" <?php echo $se; ?> />
												<span class="lbl">+++&nbsp;<?php echo $l3->name; ?></span>
				              </label>
											<?php $level4 = $this->product_category_model->get_by_parent($l3->id); ?>
												<?php if(! empty($level4)) : ?>
													<?php foreach($level4 as $l4) : ?>
														<?php $se = isset($pdCategory[$l4->id]) ? 'checked' : ''; ?>
														<label class="display-block">
							                <input type="checkbox"
															class="ace chk-pd-cat"
															name="chk-pd-cat-<?php echo $l4->id; ?>"
															id="chk-pd-cat-<?php echo $l4->id; ?>"
															value="<?php echo $l4->id; ?>" <?php echo $se; ?> />
															<span class="lbl">++++&nbsp;<?php echo $l4->name; ?></span>
							              </label>
														<?php $level5 = $this->product_category_model->get_by_parent($l4->id); ?>
															<?php if(! empty($level5)) : ?>
																<?php foreach($level5 as $l5) : ?>
																	<?php $se = isset($pdCategory[$l5->id]) ? 'checked' : ''; ?>
																	<label class="display-block">
										                <input type="checkbox"
																		class="ace chk-pd-cat"
																		name="chk-pd-cat-<?php echo $l5->id; ?>"
																		id="chk-pd-cat-<?php echo $l5->id; ?>"
																		value="<?php echo $l5->id; ?>" <?php echo $se; ?> />
																		<span class="lbl">+++++&nbsp;<?php echo $l5->name; ?></span>
										              </label>
																<?php endforeach; // level 5 ?>
															<?php endif; ?>
													<?php endforeach; // level 4 ?>
												<?php endif; ?>
										<?php endforeach; // level 3 ?>
									<?php endif; ?>
							<?php endforeach; // level 2 ?>
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


<div class="modal fade" id="pd-type-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Type</h4>
      </div>
      <div class="modal-body" id="pd-type-body">
        <div class="row" style="margin-left:0px;">
          <div class="col-sm-12">
				    <?php if( ! empty($product_types)) : ?>
				      <?php foreach($product_types as $rs) : ?>
								<?php $se = isset($pdType[$rs->id]) ? 'checked' : ''; ?>
				            <label class="display-block">
				              <input type="checkbox"
											class="ace chk-pd-type"
											name="chk-pd-type-<?php echo $rs->id; ?>"
											id="chk-pd-type-<?php echo $rs->id; ?>"
											value="<?php echo $rs->name; ?>" />
				              <span class="lbl"><?php echo $rs->name; ?></span>
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



<div class="modal fade" id="pd-brand-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">เลือกยี่ห้อสินค้า</h4>
      </div>
      <div class="modal-body" id="pd-brand-body">
        <div class="row" style="margin-left:0px;">
          <div class="col-sm-12">

    <?php if( ! empty($product_brands)) : ?>
      <?php foreach($product_brands as $rs) : ?>
        <?php $se = isset($pdBrand[$rs->id]) ? 'checked' : ''; ?>
              <label class="display-block">
                <input type="checkbox"
								class="ace chk-pd-brand"
								name="chk-pd-brand-<?php echo $rs->id; ?>"
								id="chk-pd-brand-<?php echo $rs->id; ?>"
								value="<?php echo $rs->id; ?>" <?php echo $se; ?> />
								<span class="lbl"><?php echo $rs->name; ?></span>
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
