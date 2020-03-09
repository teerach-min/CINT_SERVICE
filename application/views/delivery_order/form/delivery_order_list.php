<div id="page-wrapper" style="min-height: 827px;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Delivery Order <?= $detail['Deli_No']?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Delivery Order List</li>
                            <!-- <li class="active">Table Layouts</li> -->
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Delivery Order List</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div class="form-body">
                                        <h3 class="box-title">Delivery Order Detail</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div id="create_do_success"></div>
                                        <dl class="row">
                                            <dt class="col-sm-2 text-right">Ref No. : </dt>
                                            <dd class="col-sm-4"><?= $detail['Deli_Company']?></dd>
                                            <dt class="col-sm-2 text-right">Customer : </dt>
                                            <dd class="col-sm-4"><?= $detail['Deli_Contact']?></dd>
                                            <dt class="col-sm-2 text-right">Attention : </dt>
                                            <dd class="col-sm-4"><?= $detail['Deli_Address']?></dd>
                                            <dt class="col-sm-2 text-right">Tel : </dt>
                                            <dd class="col-sm-4"><?= $detail['Deli_Phone']?></dd>
                                            <dt class="col-sm-2 text-right">Date : </dt>
                                            <dd class="col-sm-4"><?=date('d-M-Y',strtotime($detail['Deli_Date']))?></dd>
                                            <dt class="col-sm-2 text-right">Iden : </dt>
                                            <dd class="col-sm-4"><?= $detail['Deli_Iden']?></dd>
            
                                        </dl>
                                        <br>
                                        <h3 class="box-title">Delivery Order List</h3>
                                        <hr>
                                        <div class="form-body">
                                                <div id="output-subdo"></div>
                                                <?= form_open();?>
                                                <!-- <form id="create-subdo" method="post" action="data/save_dotable.php" enctype="multipart/form-data"> -->
                                                    <div class="form-row">
                                                        <div id="sec1" class="form-group col-md-4">
                                                            <label for="inputGroup">Bill</label>
                                                            <input type="text" name="Dsub_Bill" id="Dsub_Bill" class="form-control" placeholder="Bill">

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputBrand">Model</label>
                                                            <input type="text" name="Dsub_Model" id="Dsub_Model" class="form-control" placeholder="Model">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputBrand">IMEI/SERIAL</label>
                                                            <input type="text" name="Dsub_Imei" id="Dsub_Imei" class="form-control" placeholder="IMEI">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputBrand">Accessories</label>
                                                            <input type="text" name="Dsub_Accessories" id="Dsub_Accessories" class="form-control" placeholder="Accessories">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputProduct">Repair Description</label>
                                                            <div class="input-group">
                                                                <input type="text" name="Dsub_Description" id="Dsub_Description" class="form-control" placeholder="Repair Description">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputProduct">Remark</label>
                                                            <div class="input-group">
                                                                <input type="text" name="Dsub_Remark" id="Dsub_Remark" class="form-control" placeholder="Remark">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <input type="submit" value="Add" class="btn btn-success">    

                                                <!-- </form> -->
                                                <?= form_close();?>
                                                <br><br><br>
                                                <div id="live_data"></div>
                                                <?= isset($table_delivery_list) ? $table_delivery_list : '' ;?>
                                            </div>

                                            
                                            <br><br>
                                            <a href="<?= base_url('delivery_order/edit_delivery_order/'.$detail['Deli_No'])?>" class="text-dark btn btn-default">Back</a>
                                            <?php if ($detail['Deli_Iden'] == ''){?>
                                                <a target="_blank" href="<?= base_url('delivery_order/pdf_delivery_order_list/'.$detail['Deli_No'])?>" class="text-white btn btn-inverse" id="PreviewPDF">Preview PDF</a>                                       
                                            <?php }else{ ?>
                                                <a target="_blank" href="<?= base_url('delivery_order/pdf_delivery_order_list_air/'.$detail['Deli_No'])?>" class="text-white btn btn-inverse" id="PreviewPDF">Preview PDF</a>                                       

                                            <?php } ?>
                                    </div>
                                </div>
                                <!-- /hide edit -->
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <?=link_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css');?>
    <?=script_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

    <!-- Check ค่าว่างของ บัตรประชาชน -->
    <?php if ($detail['Deli_Iden'] != '') { ?>
        <script>
            $('#showbox1').prop('checked', true);
            $('#showbox-input').show();
            $('#Card_ID').prop('disabled', false);
        </script>
    <?php }else{ ?>
        <script>
            $('#showbox1').prop('checked', false);
        </script>
    <?php } ?>
    <!-- /Check ค่าว่างของ บัตรประชาชน -->


    <script>
    $(window).load(function()
    {
    var card_id = [{"mask": "# #### ##### ## #"}];
        $('#Card_ID').inputmask({ 
          mask: card_id, 
          greedy: false, 
          definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
    });

    $(document).ready(function() {

        $('#showbox-input input').prop("disabled", true);
        $('#showbox1').change(function(){
            if($(this).is(':checked')){
                $('#showbox-input').show();
                $('#showbox-input input').prop("disabled", false);
                
            }else{
                $('#showbox-input').hide();
                $('#showbox-input input').prop("disabled", true);
            }
        })

        $('#datepicker-autoclose').datepicker({
            format: 'd-M-yyyy',
            autoclose: true,
            todayHighlight: true,
        
        });

    });

    
    </script>