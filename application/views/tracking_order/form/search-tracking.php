<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tracking Order</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Tracking Order</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Form Tracking</h3>
                    <hr>
                    <?php $getParam = $this->input->get(); ?>
                    <?= form_open('', array('method'=>'get'));?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>IMEI</label>
                                <div>
                                    <input type="text" name="Regis_Imei" class="form-control" value="<?= set_value('Regis_Imei', isset($getParam['Regis_Imei']) ? $getParam['Regis_Imei'] : '')?>" placeholder="Enter IMEI mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                    <!-- .row -->
                    <?= form_close();?>

                </div>
            </div>
        </div>
        <!-- row -->
        <?= isset($viewDetail) ? $viewDetail : ''?>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<style>
/* .custom-checkbox::before{
    background:red;
} */
</style>
