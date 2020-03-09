<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Delivery Order</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
				<ol class="breadcrumb">
					<li><a href="<?= base_url('')?>">index</a></li>
					<li class="active">Delivery Order</li>
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
									<th width="0px">Item</th>
									<th>Number ID</th>
									<th>Company</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Tel.</th>
									<th>Date</th>
									<th>Menu</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach ($detail as $key => $value) {?>
								<tr>
									<td class="text-center"><?= ++$key;?></td>
									<td><?= $value['Deli_No'];?></td>
									<td><?= $value['Deli_Company'];?></td>
									<td><?= $value['Deli_Contact'];?></td>
									<td><?= $value['Deli_Address']?></td>
									<td><?= $value['Deli_Phone'];?></td>
									<td width="90px"><?= date('d-M-Y', strtotime($value['Deli_Date']));?></td>
									<td>
										<?php if ($value['Deli_Iden'] == ''){?>
											<a target="_blank" href="<?= base_url('delivery_order/pdf_delivery_order_list/'.$value['Deli_No'])?>" class="text-white btn btn-inverse btn-sm" id="PreviewPDF">PDF</a>                                       
										<?php }else{ ?>
											<a target="_blank" href="<?= base_url('delivery_order/pdf_delivery_order_list_air/'.$value['Deli_No'])?>" class="text-white btn btn-inverse btn-sm" id="PreviewPDF">PDF</a>                                       

										<?php } ?>
                                        <a target="_blank" class="btn btn-default btn-sm" href="<?= base_url('delivery_order/edit_delivery_order/'.$value['Deli_No'])?>">Edit</a>
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