<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Create Job</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
				<ol class="breadcrumb">
					<li><a href="<?= base_url('')?>">index</a></li>
					<li class="active">View Detail</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-sm-12">
				<?php $this->load->view('_partials/message'); ?>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-md-12">
				<div class="white-box">
                <div class="row">
                <div class="col-6">
					<h3 class="box-title">Table Detail all</h3>
                </div>
                <div class="col-6 text-right">
					<a href="<?= base_url('non_samsung/create_order')?>" class="btn btn-success btn-sm" href="">Create Job</a>
                </div>
                </div>
					<div class="table-responsive">
						<table id="Table-all" class="table table-hover color-bordered-table inverse-bordered-table  table-sm">
							<thead>
								<tr>
									<th style="text-align:center" width="8%">Number ID</th>
									<th>Name</th>
									<th>Model</th>
									<th>Imei / Serial</th>
									<th>Defect</th>
									<th width="10%">Date / Time</th>
									<th>Technician</th>
									<th>Status</th>
									<th width="7%">Update By</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
                                <?php foreach ($detail as $key => $value) {?>
                                <tr>
                                    <td><?= $value['Regis_SubID'];?></td>
									<td><?= $value['Regis_Name'];?></td>
									<td><?= $value['Regis_Model'];?></td>
									<td><?= $value['Regis_Imei']?> <?= isset($value['Regis_Serial']) ? ' '.$value['Regis_Serial'] : ''?></td>
									<td><?= $value['Regis_Order'];?></td>
									<td><?= date('d-M-Y', strtotime($value['Regis_Date'])); ?></td>
									<td><?= $value['User_FName'];?></td>
									<td class="color<?= $value['Status_ID']?>"><?= $value['Status_Name'];?></td>
									<td><?= $value['Regis_Submit'];?></td>
									<td><a class="btn btn-default btn-sm" href="<?= base_url('non_samsung/edit_job/'.$value['Regis_SubID'])?>">Edit</a></td>
                                </tr>
                                <?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /.Table -->

				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script>
$('#Table-all').DataTable({
    "ordering": false
});
</script>