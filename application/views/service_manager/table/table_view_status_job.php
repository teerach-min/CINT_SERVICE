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
					<h3 class="box-title">Table Detail all</h3>
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
									<td><a href="#" data-toggle="modal" data-target="#model<?= $value['Regis_SubID'];?>"><?= $value['Regis_SubID'];?></a></td>
									<td><?= $value['Regis_Name'];?></td>
									<td><?= $value['Regis_Model'];?></td>
									<td><?= $value['Regis_Imei']?> <?= isset($value['Regis_Serial']) ? ' '.$value['Regis_Serial'] : ''?></td>
									<td><?= $value['Regis_Order'];?></td>
									<td><?= date('d-M-Y', strtotime($value['Regis_Date'])); ?></td>
									<td><?= $value['User_FName'];?></td>
									<?php 
									if($value['Status_ID'] == '3') {
									$remark = $this->db->where('Regis_SubID', $value['Regis_SubID'])->where('Schange_Quotation', '1')->get('sv_change_status')->row_array();
									?>
										<td class="color<?= $value['Status_ID']?>"><p data-toggle="tooltip" data-placement="bottom" title="<?= $remark['Schange_Remark']?>"><?= $value['Status_Name'];?></p></td>
									<?php 
									}else if($value['Status_ID'] == '4') {
									$remark = $this->db->where('Regis_SubID', $value['Regis_SubID'])->where('Schange_Complete', '1')->get('sv_change_status')->row_array();
									?>
										<td class="color<?= $value['Status_ID']?>"><p data-toggle="tooltip" data-placement="bottom" title="<?= $remark['Schange_Remark']?>"><?= $value['Status_Name'];?></p></td>
									<?php }else{ ?>
										<td class="color<?= $value['Status_ID']?>"><?= $value['Status_Name'];?></td>
									<?php } ?>
									<td><?= $value['Regis_Submit'];?></td>
									<td><a class="btn btn-default btn-sm" href="<?= base_url('service_manager/edit_job/'.$value['Regis_SubID'])?>">Edit</a></td>

									<!-- /======modal===== -->
									<div id="model<?= $value['Regis_SubID'];?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
									aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title" id="myModalLabel">Detail
												<?= $value['Regis_SubID'];?></h4>
											</div>
											<div class="modal-body">

												<div class="form-row">
												<div class="form-group col-md-6">
													<label>Company</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Name'];?>"
													placeholder="Company">
												</div>
												<div class="form-group col-md-6">
													<label>Customer Name</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Contact'];?>"
													placeholder="Customer Name">
												</div>
												</div>
												<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" readonly value="<?= $value['Regis_Address'];?>"
													placeholder="Address">
												</div>
												<div class="form-row">
												<div class="form-group col-md-6">
													<label>Phone</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Phone'];?>">
												</div>
												<div class="form-group col-md-6">
													<label>Pick Up Date</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Pickupdate'];?>">
												</div>
												</div>
												<div class="form-row">
												<div class="form-group col-md-4">
													<label>IMEI</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Phone'];?>">
												</div>
												<div class="form-group col-md-4">
													<label>S/N</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Imei'];?>">
												</div>
												<div class="form-group col-md-4">
													<label>Model</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Model'];?>">
												</div>
												</div>
												<div class="form-group">
												<label>Detail</label>
												<textarea class="form-control" rows="3" readonly><?= $value['Regis_Order'];?></textarea>
												</div>
												<div class="form-row">
												<div class="form-group col-md-6">
													<label>Status Order</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Status_Name'];?>">
												</div>
												<div class="form-group col-md-6">
													<label>Name Technician</label>
													<input type="text" class="form-control form-control-sm" readonly value="<?= $value['User_FName'];?>">
												</div>
												</div>
												<div class="form-group">
												<label>Update By</label>
												<input type="text" class="form-control form-control-sm" readonly value="<?= $value['Regis_Submit'];?>">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											</div>
										</div>
									</div>
									</div>
									<!-- =========== /modal -->

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