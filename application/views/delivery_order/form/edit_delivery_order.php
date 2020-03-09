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
                            <li class="active">Edit Delivery Order</li>
                            <!-- <li class="active">Table Layouts</li> -->
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Edit Delivery Order</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div class="form-body">
                                        <h3 class="box-title">Edit Delivery Order</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div id="create_do_success"></div>
                                        <?= form_open('', array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                                        <!-- <form id="create-do" method="post" action="data/create_do_dtb.php" enctype="multipart/form-data"> -->
                                            <div class="form-row col-md-12">
                                                <div id="sec1" class="form-group col-md-4">
                                                    <label for="inputGroup">Company Name</label>
                                                    <input type="text" name="Deli_Company" value="<?= $detail['Deli_Company']?>" id="Deli_Company" class="form-control" placeholder="Company Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputBrand">Contact Person</label>
                                                    <input type="text" name="Deli_Contact" value="<?= $detail['Deli_Contact']?>" id="Deli_Contact" class="form-control" placeholder="Contact Person">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputProduct">Date</label>
                                                    <div class="input-group">
                                                        <input autocomplete="off" type="text" class="form-control" name="Deli_Date" value="<?= date('d-M-Y', strtotime($detail['Deli_Date']))?>" id="datepicker-autoclose" placeholder="dd-mm-yyyy">
                                                        <span class="input-group-addon"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row col-md-12">
                                                <div class="form-group col-md-8">
                                                    <label for="inputSale">Address</label>
                                                    <input type="text" name="Deli_Address" value="<?= $detail['Deli_Address']?>" id="Deli_Address" class="form-control" placeholder="Address">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCompany">Mobile</label>
                                                    <input type="text" name="Deli_Phone" value="<?= $detail['Deli_Phone']?>" id="Deli_Phone" class="form-control" placeholder="###-###-#####">
                                                </div>
                                            </div>
                                            <div class="form-row col-md-12">
                                                <div class="form-group col-md-2">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="showbox1" type="checkbox">
                                                        <label for="showbox1">AIR FORCE ONE</label>
                                                    </div>
                                                </div>
                                                <div id="showbox-input" class="form-group col-md-12" style="display:none">
                                                    <label for="inputCompany">ID CARD</label>
                                                    <input type="text" name="Deli_Iden" value="<?= $detail['Deli_Iden']?>" id="Card_ID" class="form-control" placeholder="ID CARD">
                                                </div>
                                            </div>
                                            <input id="save-create" type="submit" value="Save" class="btn btn-info">
                                            <a href="<?= base_url('delivery_order/delivery_order_list/'.$detail['Deli_No'])?>" class="text-dark btn btn-default">Next</a>
                                        <!-- </form> -->
                                        <?= form_close();?>
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