<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
		<h3 class="title"><?php echo $this->title; ?></h3>
	</div>
	<div class="col-sm-6">
		<p class="pull-right top-p">
			<button type="button" class="btn btn-sm btn-success" onclick="addNew()"><i class="fa fa-plus"></i>  Add new</button>
		</p>
	</div>
</div>
<hr class="padding-5">
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
	<div class="col-sm-2 padding-5">
		<label>Username</label>
		<input type="text" class="form-control input-sm search-box" name="uname" value="<?php echo $uname; ?>" />
	</div>
	<div class="col-sm-2 padding-5">
		<label>Name</label>
		<input type="text" class="form-control input-sm search-box" name="name" value="<?php echo $name; ?>" />
	</div>
	<div class="col-sm-2 padding-5">
		<label>Customer Team</label>
		<select class="form-control input-sm" name="team" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<?php echo select_team($team); ?>
		</select>
	</div>
	<div class="col-sm-2 padding-5">
		<label>Status</label>
		<select class="form-control input-sm" name="status" onchange="getSearch()">
			<option value="all">ทั้งหมด</option>
			<option value="1" <?php echo is_selected('1', $status); ?>>Active</option>
			<option value="0" <?php echo is_selected('0', $status); ?>>Inactive</option>
		</select>
	</div>
	<div class="col-sm-2 padding-5">
		<label class="display-block not-show">ok</label>
		<button type="button" class="btn btn-xs btn-primary btn-block" onclick="getSearch()"><i class="fa fa-search"></i> Search</button>
	</div>
	<div class="col-sm-2 padding-5">
		<label class="display-block not-show">reset</label>
		<button type="button" class="btn btn-xs btn-warning btn-block" onclick="clearFilter()"><i class="fa fa-retweet"></i> Reset</button>
	</div>
</div>
</form>
<hr class="padding-5">
<div class="row">
	<div class="col-sm-12 padding-5 table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:50px;" class="text-center">#</th>
					<th style="width:150px;">Username</th>
					<th style="min-width:250px;">ชื่อ</th>
					<th style="width:150px;">Customer Team</th>
					<th style="width:150px;" class="text-right">Max Discount.</th>
					<th style="width:100px;" class="text-center">สถานะ</th>
					<th style="width:150px;"></th>
				</tr>
			</thead>
			<tbody>
<?php if(!empty($data)) : ?>
	<?php $no = $this->uri->segment($this->segment) + 1; ?>
	<?php foreach($data as $rs) : ?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $rs->uname; ?></td>
					<td><?php echo $rs->name; ?></td>
					<td><?php echo $rs->team_name; ?></td>
					<td class="text-right"><?php echo $rs->max_disc; ?> %</td>
					<td class="text-center"><?php echo is_active(1, $rs->status); ?></td>
					<td class="text-right">
						<button type="button" class="btn btn-mini btn-warning" onclick="getEdit(<?php echo $rs->id; ?>)"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-mini btn-danger" onclick="getDelete(<?php echo $rs->id; ?>, '<?php echo $rs->uname; ?>')"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
		<?php $no++; ?>
	<?php endforeach; ?>
<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/approver/approver.js?v=<?php echo date('Ymd'); ?>"></script>
<?php $this->load->view('include/footer'); ?>
