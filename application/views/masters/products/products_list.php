<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 padding-5">
    <p class="pull-right top-p">
			<button type="button" class="btn btn-xs btn-info btn-100 top-btn" onclick="syncData()"><i class="fa fa-refresh"></i> Sync</button>
    </p>
  </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Code</label>
    <input type="text" class="form-control input-sm" name="code" value="<?php echo $code; ?>" />
  </div>

  <div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Name</label>
    <input type="text" class="form-control input-sm" name="name" value="<?php echo $name; ?>" />
  </div>

	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Model</label>
    <input type="text" class="form-control input-sm" name="model" value="<?php echo $model; ?>" />
  </div>

	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Category</label>
		<select class="form-control input-sm" name="category" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<?php echo select_category_level(3, $category); ?>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Type</label>
		<select class="form-control input-sm" name="type" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<?php echo select_product_type($type); ?>
		</select>
  </div>

	<div class="col-lg-1-harf col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Brand</label>
		<select class="form-control input-sm" name="brand" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<?php echo select_product_brand($brand); ?>
		</select>
  </div>

	<div class="col-lg-1 col-md-2 col-sm-2 col-xs-6 padding-5">
    <label>Status</label>
		<select class="form-control input-sm" name="status" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<option value="1" <?php echo is_selected('1', $status); ?>>Active</option>
			<option value="0" <?php echo is_selected('0', $status); ?>>Disactive</option>
		</select>
  </div>

  <div class="col-lg-1 col-md-2 col-sm-2 col-xs-3 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="submit" class="btn btn-xs btn-primary btn-block"><i class="fa fa-search"></i> ค้นหา</button>
  </div>
	<div class="col-lg-1 col-md-2 col-sm-2 col-xs-3 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="button" class="btn btn-xs btn-warning btn-block" onclick="clearFilter()"><i class="fa fa-retweet"></i> Reset</button>
  </div>
</div>
<hr class="margin-top-15 padding-5">
</form>
<?php echo $this->pagination->create_links(); ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
		<table class="table table-striped border-1" style="min-width:1100px;">
			<thead>
				<tr>
					<th class="fix-width-60 middle text-center">#</th>
					<th class="fix-width-60 middle text-center">Img</th>
					<th class="fix-width-100 middle">Code</th>
					<th class="min-width-200 middle">Name</th>
					<th class="fix-width-100 middle text-right">Price</th>
					<th class="fix-width-150 middle">Model</th>
					<th class="fix-width-150 middle">Category</th>
					<th class="fix-width-100 middle">Brand</th>
					<th class="fix-width-60 middle text-center">Status</th>
					<th class="fix-width-80"></th>
				</tr>
			</thead>
			<tbody>
		<?php if( ! empty($data)) : ?>
			<?php $no = $this->uri->segment($this->segment) + 1; ?>
			<?php foreach($data as $rs) : ?>
					<tr class="font-size-12" id="row-<?php echo $rs->id; ?>">
						<td class="middle text-center no"><?php echo $no; ?></td>
						<td class="middle text-center padding-0"><img src="<?php echo get_product_image($rs->id, "mini"); ?>" width="40" /></td>
						<td class="middle"><?php echo $rs->code; ?></td>
						<td class="middle"><?php echo $rs->name; ?></td>
						<td class="middle text-right"><?php echo number($rs->price, 2); ?></td>
						<td class="middle"><?php echo $rs->model_name; ?></td>
						<td class="middle"><?php echo $rs->category_name; ?></td>
						<td class="middle"><?php echo $rs->brand_name; ?></td>
						<td class="middle text-center"><?php echo is_active($rs->status); ?></td>
						<td class="middle text-right">
							<button type="button" class="btn btn-minier btn-info" onclick="viewDetail(<?php echo $rs->id; ?>)"><i class="fa fa-eye"></i></button>
							<?php if($this->pm->can_edit) : ?>
							<button type="button" class="btn btn-minier btn-warning" onclick="getEdit(<?php echo $rs->id; ?>)"><i class="fa fa-pencil"></i></button>
							<?php endif; ?>
						</td>
					</tr>
					<?php $no++; ?>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="9" class="middle text-center">--- No data ---</td>
			</tr>
		<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/masters/products.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
