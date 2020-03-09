<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Call Sheet</h4>
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
					<h3 class="box-title">Table Detail all</h3>
					<div class="table-responsive">
						<table id="Table-all" class="table table-hover color-bordered-table inverse-bordered-table  table-sm">
							<thead>
								<tr>
									<th style="text-align:center" width="8%">Number ID</th>
									<th>Company</th>
									<th>Address</th>
									<th>Contact</th>
									<th>Tel.</th>
									<th>Model</th>
									<th>Brand</th>
									<th>Serial</th>
									<!-- <th>Out Of Order</th> -->
									<!-- <th>Note</th> -->
									<th>menu</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach ($detail as $key => $value) {?>
								<tr>
									<td><?= $value['Call_No'];?></td>
									<td><?= $value['Call_Company'];?></td>
									<td><?= $value['Call_Address'];?></td>
									<td><?= $value['Call_Contact']?></td>
									<td><?= $value['Call_Phone_Customer'];?></td>
									<td><?= $value['Call_Product_List']; ?></td>
									<td><?= $value['Call_Brand'];?></td>
									<td><?= $value['Call_Serial'];?></td>
									<!-- <td><?= $value['Call_Out_Of_Order'];?></td> -->
									<!-- <td><?= $value['Call_Note'];?></td> -->
									<td>
                                        <a target="_blank" class="btn btn-inverse btn-sm" href="<?= base_url('call_sheet/pdf_call_sheet/'.$value['Call_No'])?>">PDF</a>
                                        <a target="_blank" class="btn btn-default btn-sm" href="<?= base_url('call_sheet/edit_call_sheet/'.$value['Call_No'])?>">Edit</a>
                                    </td>
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