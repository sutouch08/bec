<div class="filter-main">
	<div class="filter-segment">
		<div class="filter-header">BRAND</div>
		<div class="filter-body">
			<div>
				<div class="filter-box filter-box-1" id="brand-filter">
					<?php $brands = $this->product_brand_model->get_all(); ?>
					<?php if(!empty($brands)) : ?>
						<?php foreach($brands as $brand) : ?>
						<label class="width-100 pointer">
							<input type="checkbox" class="ace brand-chk" onchange="setFilter()" value="<?php echo $brand->code; ?>" />
							<span class="lbl"><?php echo $brand->name; ?></span>
						</label>
					<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="filter-footer" id="brand-footer" data-open="0" onclick="toggleBrandwidth()">แสดงผลมากขึ้น</div>
	</div>

	<div class="filter-segment">
		<div class="filter-header">TYPE</div>
		<div class="filter-body">
			<div>
				<div class="filter-box filter-box-1" id="type-filter">
					<?php $types = $this->product_type_model->get_all(); ?>
					<?php if(!empty($types)) : ?>
						<?php foreach($types as $type) : ?>
						<label class="width-100 pointer">
							<input type="checkbox" class="ace type-chk" onchange="setFilter()" value="<?php echo $type->code; ?>" />
							<span class="lbl"><?php echo $type->name; ?></span>
						</label>
					<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="filter-footer" id="type-footer" data-open="0" onclick="toggleTypewidth()">แสดงผลมากขึ้น</div>
	</div>

</div><!-- /.nav-list -->


<script>
	function toggleBrandwidth() {
		let isOpen = $('#brand-footer').data('open');

		if(isOpen == 0) {
			$('#brand-filter').addClass('filter-box-2');
			$('#brand-footer').data("open", 1);
			$('#brand-footer').text("แสดงผลน้อยลง");
		}
		else {
			$('#brand-filter').removeClass('filter-box-2');
			$('#brand-footer').data("open", 0);
			$('#brand-footer').text("แสดงผลมากขึ้น");
		}
	}

	function toggleTypewidth() {
		let isOpen = $('#type-footer').data('open');

		if(isOpen == 0) {
			$('#type-filter').addClass('filter-box-2');
			$('#type-footer').data("open", 1);
			$('#type-footer').text("แสดงผลน้อยลง");
		}
		else {
			$('#type-filter').removeClass('filter-box-2');
			$('#type-footer').data("open", 0);
			$('#type-footer').text("แสดงผลมากขึ้น");
		}
	}
</script>
