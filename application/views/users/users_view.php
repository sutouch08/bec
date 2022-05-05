<?php $this->load->view('include/header'); ?>
<div class="row">
	<div class="col-sm-6 padding-5">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
    </div>
    <div class="col-sm-6 padding-5">
    	<p class="pull-right top-p">
        <button type="button" class="btn btn-sm btn-success" onclick="newUser()"><i class="fa fa-plus"></i> Add new</button>
      </p>
    </div>
</div><!-- End Row -->
<hr class="padding-5"/>
<form id="searchForm" method="post" action="<?php echo current_url(); ?>">
<div class="row">
  <div class="col-lg-1-harf padding-5">
    <label>Username</label>
    <input type="text" class="width-100" name="uname" value="" />
  </div>

  <div class="col-lg-1-harf padding-5">
    <label>Display name</label>
    <input type="text" class="width-100" name="dname" value="" />
  </div>

	<div class="col-lg-1-harf padding-5">
    <label>Sales Person</label>
    <input type="text" class="width-100" name="dname" value="" />
  </div>

	<div class="col-lg-1-harf padding-5">
    <label>User Group</label>
    <select class="form-control input-sm">
			<option>All</opton>
			<option>BEC</option>
			<option>Customer</option>
		</select>
  </div>

	<div class="col-lg-1-harf padding-5">
    <label>Customer Team</label>
		<select class="form-control input-sm">
			<option>All</opton>
			<option>Customer Team 1</option>
			<option>Customer Team 2</option>
			<option>Customer Team 3</option>
		</select>
  </div>

	<div class="col-lg-1 padding-5">
    <label>Status</label>
		<select class="form-control input-sm">
			<option>All</opton>
			<option>Active</option>
			<option>Inactive</option>
		</select>
  </div>



  <div class="col-lg-1 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="submit" class="btn btn-xs btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
  </div>
	<div class="col-lg-1 padding-5">
    <label class="display-block not-show">buton</label>
    <button type="button" class="btn btn-xs btn-warning btn-block" onclick="clearFilter()"><i class="fa fa-retweet"></i> Reset</button>
  </div>
</div>
<hr class="margin-top-15 padding-5">
</form>
<?php echo $this->pagination->create_links(); ?>
<?php
$data = array(
	array('code' => 'admin', 'name' => 'ผู้ดูแลระบบ', 'sale' => '', 'team' => '', 'group' => 'BEC', 'activ' => 1),
	array('code' => 'CUST01', 'name' => 'ร้าน เฟอร์นิเจอร์', 'sale' => 'มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'Customer', 'activ' => 1),
	array('code' => 'USER01', 'name' => 'มานี มีน้ำใจ', 'sale' => 'นางสาว มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'BEC', 'activ' => 1),
	array('code' => 'USER02', 'name' => 'มานะ บากบั่น', 'sale' => 'นาย มานะ บากบั่น', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1),
	array('code' => 'USER03', 'name' => 'Somai', 'sale' => 'นาย สมหมาย ดั่งใจหวัง', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1),
	array('code' => 'USER04', 'name' => 'มานี มีน้ำใจ์', 'sale' => 'นาย สมชาย สุดหล่อ', 'team' => 'Customer Team 3', 'group' => 'BEC', 'activ' => 1)
);
?>

<div class="row">
	<div class="col-sm-12 padding-5">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="width-5 middle text-center">#</th>
					<th class="width-10 middle">User name</th>
					<th class="width-20 middle">Display name</th>
					<th class="width-20 middle">Sales Person</th>
					<th class="width-15 middle text-center">Custoemr Team</th>
					<th class="width-10 middle text-center">User Group</th>
					<th class="width-10 middle text-center">Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
<?php $no = 1; ?>
<?php foreach($data as $user) : ?>
	<?php $rs = (object) $user; ?>

				<tr>
					<td class="middle text-center"><?php echo $no; ?></td>
					<td class="middle"><?php echo $rs->code; ?></td>
					<td class="middle"><?php echo $rs->name; ?></td>
					<td class="middle"><?php echo $rs->sale; ?></td>
					<td class="middle text-center"><?php echo $rs->team; ?></td>
					<td class="middle text-center"><?php echo $rs->group; ?></td>
					<td class="middle text-center"><?php echo is_active($rs->activ); ?></td>
					<td class="text-right">
						<button type="button" class="btn btn-minier btn-info" title="Reset password" onclick="getReset('<?php echo $rs->code; ?>')"><i class="fa fa-key"></i></button>
						<button type="button" class="btn btn-minier btn-warning" onclick="getEdit('<?php echo $rs->code; ?>')"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-minier btn-danger" onclick="getDelete('<?php echo $rs->code; ?>')"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="<?php echo base_url(); ?>scripts/users/users.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer'); ?>
