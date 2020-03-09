<style>
.fixed-menu{
    position:fixed;
    bottom:0;
    right:0;
    z-index:9999;
}
.fixed-icon{
    margin:20px;
}
</style>
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
                            <div class="row thin-steps-numbered-bg">
                                <div class="col-md-3 column-step">
                                    <div class="step-number">1</div>
                                    <div class="step-title">Header</div>
                                    <div class="step-info">Create Header Quotation</div>
                                </div>
                                <div class="col-md-3 column-step">
                                    <div class="step-number">2</div>
                                    <div class="step-title">List</div>
                                    <div class="step-info">Insert Detail and Description</div>
                                </div>
                                <div class="col-md-3 column-step active">
                                    <div class="step-number">3</div>
                                    <div class="step-title">Bottom</div>
                                    <div class="step-info">Create Commercial Term</div>
                                </div>
                                <div class="col-md-3 column-step">
                                    <div class="step-number">4</div>
                                    <div class="step-title">View</div>
                                    <div class="step-info">View Detail All</div>
                                </div>
                            </div>
                            <!-- // Step -->
                            <hr>
                           <!-- <?php $commercial = $this->db->where('Quot_No', $ref_no['Quot_No'])->get('qt_commercial')->row_array();?> -->
                           <?php if($commercial == '')
                           { ?>
                            <?=form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                            <?= form_hidden('Status', 'create');?>


                            <h3 class="box-title">Form Commercial Term</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Delivery Time</label>
                                            <input type="text" id="Comm_Delivery" name="Comm_Delivery" value="About 3-5 working days after receipt of Purchase Order" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" class="form-control" placeholder="ชื่อบริษัท" required>
                                            <div class="help-block with-errors">Example: About 3-5 working days after receipt of Purchase Order</div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Term of Payment</label>
                                            <input type="text" id="Comm_Payment" name="Comm_Payment" value="Credit by 30 Days"
                                                class="form-control" placeholder="ชื่อผู้ติดต่อ" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: Credit by 30 Days</div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Price Validity</label>
                                            <input type="text" id="Comm_Validity" name="Comm_Validity" class="form-control" value="15 Days on Quotation date"
                                                placeholder="ที่อยู่" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: 15 Days on Quotation date</div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Term of Warranty</label>
                                            <input type="text" id="Comm_Warranty" name="Comm_Warranty" class="form-control" value="90 Days"
                                                placeholder="อีเมลล์" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: 90 Days</div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Next</button>
                                </div>
                            <?=form_close();?>

                            <?php
                           }else{
            
                            ?>
                            <?=form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                            <?= form_hidden('Status', 'edit');?>
                            <h3 class="box-title">Form Commercial Term</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Delivery Time</label>
                                            <input type="text" id="Comm_Delivery" name="Comm_Delivery" value="<?= $comm['Comm_Delivery']?>" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" class="form-control" placeholder="ชื่อบริษัท" required>
                                            <div class="help-block with-errors">Example: About 3-5 working days after receipt of Purchase Order</div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Term of Payment</label>
                                            <input type="text" id="Comm_Payment" name="Comm_Payment" value="<?= $comm['Comm_Payment']?>"
                                                class="form-control" placeholder="ชื่อผู้ติดต่อ" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: Credit by 30 Days</div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Price Validity</label>
                                            <input type="text" id="Comm_Validity" name="Comm_Validity" class="form-control" value="<?= $comm['Comm_Validity']?>"
                                                placeholder="ที่อยู่" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: 15 Days on Quotation date</div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Term of Warranty</label>
                                            <input type="text" id="Comm_Warranty" name="Comm_Warranty" class="form-control" value="<?= $comm['Comm_Warranty']?>"
                                                placeholder="อีเมลล์" data-error="กรุณากรอกข้อมูลให้ครบถ้วน" required>
                                            <div class="help-block with-errors">Example: 90 Days</div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <div class="form-group">
                                    <a class="btn btn-default" href="<?= base_url('quotation/create_quotation_detail/'.$ref_no['Quot_No']);?>">Back</a>
                                    <button type="submit" class="btn btn-info">Next</button>
                                </div>
                            <?=form_close();?>
                            
                            <?php
                           }?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="fixed-menu">
                <div class="fixed-icon">
                    <?php
                    if ($ref_no['Quot_Format'] == '1')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_general/'.$ref_no['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($ref_no['Quot_Format'] == '2')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_dtac/'.$ref_no['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($ref_no['Quot_Format'] == '3')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_dtac/'.$ref_no['Quot_No']);?>">ref_no</a>
                    <?php }
                    if ($ref_no['Quot_Format'] == '4')
                    {?>
                        <a class="btn btn-danger btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_ais/'.$ref_no['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($ref_no['Quot_Format'] == '5')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_very_smart/'.$ref_no['Quot_No']);?>">Preview</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->