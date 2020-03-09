
		
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
									<th width="10%">Date</th>
									<th>Technician</th>
									<th>Status</th>
									<th width="7%">Update By</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach ($detail as $key => $value) {?>
								<tr>
									<td><a href="#" data-toggle="modal" data-target="#modelViewDetail" onClick="handleViewDetail(this)" data-id="<?= $value['Regis_SubID'];?>"><?= $value['Regis_SubID'];?></a></td>
									<td><?= $value['Regis_Name'];?></td>
									<td><?= $value['Regis_Model'];?></td>
									<td><?= $value['Regis_Imei']?> <?= isset($value['Regis_Serial']) ? ' '.$value['Regis_Serial'] : ''?></td>
									<td><?= $value['Regis_Order'];?></td>
									<td nowrap><?= date('d-M-Y', strtotime($value['Regis_Date'])); ?></td>
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

								
								</tr>
                            <?php }?>
							</tbody>
						</table>
					</div>
					<!-- /.Table -->
				</div>
			</div>
		</div>

<!-- /======modal===== -->
<div id="modelViewDetail" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Detail
				</h4>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Company</label>
						<input type="text" class="form-control form-control-sm" data-send="company" readonly value=""
						placeholder="Company">
					</div>
					<div class="form-group col-md-6">
						<label>Customer Name</label>
						<input type="text" class="form-control form-control-sm" data-send="customer" readonly value=""
						placeholder="Customer Name">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Address</label>
						<input type="text" class="form-control form-control-sm" data-send="address" readonly value=""
							placeholder="Address">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Phone</label>
						<input type="text" class="form-control form-control-sm" data-send="phone" readonly value="">
					</div>
					<div class="form-group col-md-4">
						<label>Mobile</label>
						<input type="text" class="form-control form-control-sm" data-send="mobile" readonly value="">
					</div>
					<div class="form-group col-md-4">
						<label>Pick Up Date</label>
						<input type="text" class="form-control form-control-sm" data-send="pickup" readonly value="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>IMEI</label>
						<input type="text" class="form-control form-control-sm" data-send="imei" readonly value="">
					</div>
					<div class="form-group col-md-4">
						<label>S/N</label>
						<input type="text" class="form-control form-control-sm" data-send="serial" readonly value="">
					</div>
					<div class="form-group col-md-4">
						<label>Model</label>
						<input type="text" class="form-control form-control-sm" data-send="model" readonly value="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Detail</label>
						<textarea class="form-control" data-send="detail" rows="3" readonly></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Status Order</label>
						<input type="text" class="form-control form-control-sm" data-send="status" readonly value="">
					</div>
					<div class="form-group col-md-6">
						<label>Name Technician</label>
						<input type="text" class="form-control form-control-sm" data-send="technicial" readonly value="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Update By</label>
						<input type="text" class="form-control form-control-sm" data-send="updateby" readonly value="">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
<!-- =========== /modal -->
<script>

const handleViewDetail = (e) =>{
	$('input[data-send="company"]').val('');
	$('input[data-send="customer"]').val('');
	$('input[data-send="address"]').val('');
	$('input[data-send="phone"]').val('');
	$('input[data-send="mobile"]').val('');
	$('input[data-send="pickup"]').val('');
	$('input[data-send="imei"]').val('');
	$('input[data-send="serial"]').val('');
	$('input[data-send="model"]').val('');
	$('textarea[data-send="detail"]').val('');
	$('input[data-send="status"]').val('');
	$('input[data-send="technicial"]').val('');
	$('input[data-send="updateby"]').val('');
	var id = e.getAttribute('data-id');
	var url = '<?= base_url('service_manager/ajax_order_detail/')?>'+id;
	var request = new XMLHttpRequest();
	request.open('GET', url, true);

	request.onload = function() {
	if (this.status >= 200 && this.status < 400) {
		// Success!
		var data = JSON.parse(this.response);
		console.log(data);
		$('input[data-send="company"]').val(data.Regis_Name);
		$('input[data-send="customer"]').val(data.Regis_Contact);
		$('input[data-send="address"]').val(data.Regis_Address);
		$('input[data-send="phone"]').val(data.Regis_Phone);
		$('input[data-send="mobile"]').val(data.Regis_Mobile);
		$('input[data-send="pickup"]').val(data.Regis_Pickupdate);
		$('input[data-send="imei"]').val(data.Regis_Imei);
		$('input[data-send="serial"]').val(data.Regis_Serial);
		$('input[data-send="model"]').val(data.Regis_Model);
		$('textarea[data-send="detail"]').val(data.Regis_Order);
		$('input[data-send="status"]').val(data.Status_Name);
		$('input[data-send="technicial"]').val(data.Status);
		$('input[data-send="updateby"]').val(data.Regis_Submit);
	} else {

	}
	};

	request.onerror = function() {
	// There was a connection error of some sort
	};

	request.send();
	// console.log(id);
}

$('#Table-all').DataTable({
    "ordering": false
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>