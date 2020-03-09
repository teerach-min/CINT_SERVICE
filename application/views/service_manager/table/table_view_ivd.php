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
				<div class="d-flex justify-content-between">
					<h3 class="box-title">Table Detail all</h3>
					<div class="">
						<a target="_blank" href="<?= base_url('report/report_invoice')?>" class="btn btn-info">Export</a>
					</div>
				</div>
					<div class="table-responsive">
						<table id="Table-all" class="table table-hover color-bordered-table inverse-bordered-table  table-sm">
							<thead>
								<tr>
									<th style="text-align:center" width="10px">Number ID</th>
									<th>IVD</th>
									<th>Customer</th>
									<th>Code</th>
									<th width="100px">Name</th>
									<th>Serial</th>
									<th>Year</th>
									<th width="7%">Start Date</th>
									<th width="7%">End Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach ($detail as $key => $value) {?>
								<tr>
									<td><?= ++$key;?></td>
									<td><?= $value['Wart_IVD'];?></td>
									<td><?= $value['Wart_Customer'];?></td>
									<td><?= $value['Wart_Code']?> </td>
									<td><?= $value['Wart_Name'];?></td>
									<td><?= $value['Wart_Serial'];?></td>
									<td class="text-center"><?= $value['Wart_Warranty'];?></td>
									<td><?= date('d-M-Y', strtotime($value['Wart_Startdate'])); ?></td>
									<td><?= date('d-M-Y', strtotime($value['Wart_Expdate'])); ?></td>
									<td><?php if ($value['Wart_Startdate'] < $value['Wart_Expdate']) { echo '<p class=" font-weight-bold" style="color:green">IN</p>'; } else { echo '<p class=" font-weight-bold"  style="color:red">OUT</p>'; } ?></td>

								</tr>
                            <?php }?>
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
