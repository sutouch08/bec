<form id="filter-form" method="post" action="<?php echo $this->home; ?>/filter">
<div class="filter-main">
	<div class="filter-segment">
		<div class="filter-header">BRAND</div>
		<div class="filter-body">
			<div class="filter-box filter-box-1" id="brand-filter">
				<?php $brands = $this->product_brand_model->get_all(); ?>
				<?php if(!empty($brands)) : ?>
					<?php foreach($brands as $brand) : ?>
						<label class="width-100 pointer">
							<input type="radio" name="brand" class="ace brand-chk" onchange="getFilter()" value="<?php echo $brand->code; ?>" <?php echo is_checked($brand->code, $brandCode); ?> />
							<span class="lbl"><?php echo $brand->name; ?></span>
						</label>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="filter-footer" style="padding-right:15px;">
			<button type="button" class="btn btn-white btn-sm btn-info btn-block" onclick="clearBrandFilter()">Clear Filter</button>
			<!--
			<button type="button" data-open="0" id="brand-footer" class="btn btn-white btn-sm btn-info btn-block" onclick="toggleBrandWidth()">แสดงผลมากขึ้น</button>
		-->
		</div>
	</div>

	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>

	<div class="filter-segment">
		<div class="filter-header">CATEGORY</div>
		<div class="filter-body">
			<div class="filter-box filter-box-1" id="cate-filter">
				<?php $cates = $this->product_category_model->get_by_level(4, TRUE); ?>
				<?php if(!empty($cates)) : ?>
					<?php foreach($cates as $cate) : ?>
						<label class="width-100 pointer">
							<input type="radio" name="cate" class="ace cate-chk" onchange="getFilter()" value="<?php echo $cate->code; ?>" <?php echo is_checked($cate->code, $cateCode); ?> />
							<span class="lbl"><?php echo $cate->name; ?></span>
						</label>
						<?php $subCate = $this->product_category_model->get_by_parent($cate->id, TRUE); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="filter-footer" style="padding-right:15px;">
			<button type="button" class="btn btn-white btn-sm btn-info btn-block" onclick="clearCateFilter()">Clear Filter</button>
			<!--
			<button type="button" data-open="0" id="cate-footer" class="btn btn-white btn-sm btn-info btn-block" onclick="toggleCateWidth()">แสดงผลมากขึ้น</button>
		-->
		</div>
	</div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>
	<div class="divider-hidden"></div>
</div>
</form>




<script>
	function toggleBrandWidth() {
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

	function toggleCateWidth() {
		let isOpen = $('#cate-footer').data('open');

		if(isOpen == 0) {
			$('#cate-filter').addClass('filter-box-2');
			$('#cate-footer').data("open", 1);
			$('#cate-footer').text("แสดงผลน้อยลง");
		}
		else {
			$('#cate-filter').removeClass('filter-box-2');
			$('#cate-footer').data("open", 0);
			$('#cate-footer').text("แสดงผลมากขึ้น");
		}
	}


	function clearBrandFilter() {
		$('.brand-chk').prop('checked', false);
		$.ajax({
			url:HOME + 'clear_side_filter/brand',
			type:'GET',
			cache:false,
			success:function() {
				window.location.href = HOME + 'filter';
			}
		})
	}


	function clearCateFilter() {
		$('.cate-chk').prop('checked', false);
		$.ajax({
			url:HOME + 'clear_side_filter/cate',
			type:'GET',
			cache:false,
			success:function() {
				window.location.href = HOME + 'filter';
			}
		})
	}


	function getFilter() {
		load_in();
		setTimeout(function() {
			$('#filter-form').submit();			
		})
	}

</script>
