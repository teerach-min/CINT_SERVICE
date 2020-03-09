<div id="page-wrapper" style="min-height: 827px;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                        <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Create Call Sheet</li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <!-- <li class="active">Table Layouts</li> -->
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Create Call Sheet</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div id="show-create-cs">
                                    </div>
                                    <?= form_open('', array('class'=>'needs-validation form-horizontal','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                                        <!-- <form id="create-cs" method="post" action="data/update_cs_dtb.php" class="form-horizontal"> -->
                                        <?= form_hidden('Call_No', isset($form['Regis_SubID']) ? $form['Regis_SubID'] : '');?>
                                        <div class="form-body">
                                            <h3 class="box-title"><?= isset($form['Regis_SubID']) ? 'Pickup : '.$form['Regis_SubID'] : ''?></h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Company</label>
                                                        <div class="col-md-9">
                                                            <!-- <input type="text" name="call_no" value="CS_DTB20190309" class="form-control" placeholder="Company"> -->
                                                            <input type="text" name="Call_Company" value="<?= set_value('Call_Conpany', isset($form['Regis_Name'])) ? $form['Regis_Name'] : ''?>" class="form-control" placeholder="Company">
                                                            <span class="help-block"> *ชื่อบริษัท </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="Call_Datetime" value="<?= date('d-M-Y')?>" id="datepicker-autoclose" placeholder="">
                                                            <span class="help-block"> ( Date : dd-mm-yyyy ) </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="<?= set_value('Call_Address', isset($form['Regis_Address']) ? $form['Regis_Address'] : '' )?>" name="Call_Address" placeholder="Address">
                                                            <span class="help-block"> *ที่อยู่</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Contact</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="<?= set_value('Call_Contact', isset($form['Regis_Contact']) ? $form['Regis_Contact'] : '')?>" name="Call_Contact" placeholder="Contact">
                                                            <span class="help-block"> *ชื่อลูกค้า</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Phone</label>
                                                        <div class="col-md-9">
                                                            <input id="phone_cus" type="text" value="<?= set_value('Call_Phone_Customer', isset($form['Regis_Mobile']) ? $form['Regis_Mobile'] : '')?>" class="form-control" name="Call_Phone_Customer" placeholder="Phone">
                                                            <span class="help-block"> *เบอร์โทรติดต่อ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Product List</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="" name="Call_Product_List" placeholder="Product List">
                                                            <span class="help-block"> *รายการที่ส่งซ่อม</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Brand</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="" name="Call_Brand" placeholder="Brand">
                                                            <span class="help-block"> *ยี่ห้อ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Serial</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="Call_Serial" value="" placeholder="Serial">
                                                            <span class="help-block"> *หมายเลข S/N</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Out Of Order</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="<?= set_value('Call_Out_Of_Order', isset($form['Regis_Order']) ? $form['Regis_Order'] : '')?>" name="Call_Out_Of_Order" placeholder="Out Of Order">
                                                            <span class="help-block"> *อาการที่พบ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Note</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="" name="Call_Note" placeholder="Note">
                                                            <span class="help-block"> *หมายเหตุ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <!--/form-body-->
                                        <div class="form-body">
                                            <h3 class="box-title">By Create Detail</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Prepared By</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="Call_Prepare" class="form-control" value="<?= $session['User_FName'].' '.$session['User_LName'];?>" readonly="">
                                                            <!-- <span class="help-block"> *อาการที่พบ</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="Call_Email" class="form-control" value="<?= $session['User_Email']?>" readonly="">
                                                            <!-- <span class="help-block"> *หมายเหตุ</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Phone</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="Call_Phone" class="form-control" value="<?= $session['User_Phone']?>" readonly="">
                                                            <!-- <span class="help-block"> *หมายเหตุ</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <!--/form-body-->
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                            <!-- <button type="button" class="btn btn-default">Cancel</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                    <?= form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
            
        <?=link_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css');?>
        <?=script_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

        <script>
        $(document).ready(function() {

            $('#datepicker-autoclose').datepicker({
                format: 'd-M-yyyy',
                autoclose: true,
                todayHighlight: true,
            
            });

        });

      
        </script>