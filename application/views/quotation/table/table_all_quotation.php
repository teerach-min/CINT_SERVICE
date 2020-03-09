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
                            <li class="active">Create Quotation</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Quotation Detail</h3>
                            <hr>
                            <table id="Table-all"  class="table table-hover color-bordered-table inverse-bordered-table  table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Customer</th>
                                        <th>Attention</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($quot_no as $key => $value) {?>
                                    <tr>
                                        <td><?= $value['Quot_No']?></td>
                                        <td><?= $value['Quot_Customer']?></td>
                                        <td><?= $value['Quot_Attention']?></td>
                                        <td><?= $value['Quot_Address']?></td>
                                        <td><?= $value['Quot_Phone']?></td>
                                        <td><?= date('d-M-Y', strtotime($value['Quot_Date'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('quotation/edit_quotation/'.$value['Quot_No']);?>" class="btn btn-default btn-sm">Edit</a>
                                            <?php if ($value['Quot_Format'] == 1) { ?>
                                                <a target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_general/'.$value['Quot_No'])?>" class="btn btn-inverse btn-sm">PDF</a>
                                            <?php }else if ($value['Quot_Format'] == 2) { ?>
                                                <a target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_dtac/'.$value['Quot_No'])?>" class="btn btn-inverse btn-sm">PDF</a>
                                            <?php }else if ($value['Quot_Format'] == 3) { ?>
                                                <a target="_blank" href="<?= base_url('quotation/pdf_quotation_dtac/'.$value['Quot_No'])?>" class="btn btn-inverse btn-sm">PDF</a>
                                            <?php }else if ($value['Quot_Format'] == 4) { ?>
                                                <a target="_blank" href="<?= base_url('quotation/pdf_quotation_ais/'.$value['Quot_No'])?>" class="btn btn-inverse btn-sm">PDF</a>
                                            <?php }else if ($value['Quot_Format'] == 5) { ?>
                                                <a target="_blank" href="<?= base_url('quotation/pdf_quotation_very_smart/'.$value['Quot_No'])?>" class="btn btn-inverse btn-sm">PDF</a>
                                            <?php }?>
                                     
                                        </td>
                                        
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


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