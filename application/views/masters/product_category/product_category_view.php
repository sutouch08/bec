<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
    <h3 class="title"><?php echo $this->title; ?></h3>
  </div>
  <div class="col-sm-6 padding-5">
  	<p class="pull-right top-p">
      <button type="button" class="btn btn-sm btn-success" onclick="addNew()"><i class="fa fa-plus"></i> Add new</button>
    </p>
  </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-sm-2 padding-5">
    <label>รหัส</label>
    <input type="text" class="width-100" name="code" id="code" value="" />
  </div>

  <div class="col-sm-2 padding-5">
    <label>ชื่อ</label>
    <input type="text" class="width-100" name="name" id="name" value="" />
  </div>

  <div class="col-sm-2 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
  </div>
	<div class="col-sm-2 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="button" class="btn btn-sm btn-warning btn-block" onclick="clearFilter()"><i class="fa fa-retweet"></i> Reset</button>
  </div>
</div>
<hr class="margin-top-15 padding-5">
</form>
<?php echo $this->pagination->create_links(); ?>

<div class="row">
	<div class="col-sm-12 padding-5">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="width-5 middle text-center">ลำดับ</th>
					<th class="width-15 middle">รหัส</th>
					<th class="middle">ชื่อ</th>
					<th class="" style="width:100px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach($data as $rs) : ?>
				<tr>
					<td class="middle text-center"><?php echo $no; ?></td>
					<td class="middle"><?php echo $rs->code; ?></td>
					<td class="middle"><?php echo $rs->name; ?></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit('<?php echo $rs->code; ?>')"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete('<?php echo $rs->code; ?>', '<?php echo $rs->name; ?>')"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/masters/product_category.js"></script>

<?php $this->load->view('include/footer'); ?>
