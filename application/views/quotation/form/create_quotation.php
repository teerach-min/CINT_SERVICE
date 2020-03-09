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
                                <div class="col-md-3 column-step active">
                                    <div class="step-number">1</div>
                                    <div class="step-title">Header</div>
                                    <div class="step-info">Create Header Quotation</div>
                                </div>
                                <div class="col-md-3 column-step">
                                    <div class="step-number">2</div>
                                    <div class="step-title">List</div>
                                    <div class="step-info">Insert Detail and Description</div>
                                </div>
                                <div class="col-md-3 column-step">
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
                           
                            <?=form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>

                            <div class="form-group">
                                    <h5 class="box-title">Select Ref. No Quotation</h5>
                                    <select id='pre-selected-options' name="Regis_SubID[]" multiple='multiple'>
                                        <?php 
                                        foreach ($ref_job as $key => $value) {
                                            echo '<option value="'.$value['Regis_SubID'].'">'.$value['Regis_SubID'].'</option>';
                                        } 
                                        ?>
                                    </select>
                                </div>
                    
                                <br>
                            <h3 class="box-title">Form Create Quotation</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Customer</label>
                                            <input type="text" id="Quot_Customer" name="Quot_Customer" value="<?= isset($rs2['Regis_Name']) ? $rs2['Regis_Name'] : '';?>"
                                            data-error="กรุณากรอกชื่อบริษัท" class="form-control" placeholder="ชื่อบริษัท" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Attention</label>
                                            <input type="text" id="Quot_Attention" name="Quot_Attention" value="<?= isset($rs2['Regis_Contact']) ? $rs2['Regis_Contact'] : '';?>"
                                                class="form-control" placeholder="ชื่อผู้ติดต่อ" data-error="กรุณากรอกชื่อผู้ติดต่อ" required>
                                            <div class="help-block with-errors"></div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <input type="text" id="Quot_Address" name="Quot_Address" class="form-control" value="<?= isset($rs2['Regis_Address']) ? $rs2['Regis_Address'] : '';?>"
                                                placeholder="ที่อยู่" data-error="กรุณากรอกชื่อที่อยู่ของผู้ติดต่อ" required>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email" id="Quot_Email" name="Quot_Email" class="form-control" 
                                                placeholder="อีเมลล์" data-error="กรุณากรอก Email ของผู้ติดต่อ" required>
                                            <div class="help-block with-errors"></div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="text" id="phone_format" name="Quot_Phone" class="form-control" value="<?= isset($rs2['Regis_Phone']) ? $rs2['Regis_Phone'] : '';?>"
                                                placeholder="เบอร์โทรศัพท์" data-error="กรุณากรอกเบอร์โทรศัพท์ของผู้ติดต่อ" required>
                                            <div class="help-block with-errors"></div>

                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date</label>
                                            <input type="text" id="datepicker" name="Quot_Date" class="complex-colorpicker form-control"
                                                placeholder="วันที่ออกใบเสนอราคา" data-error="กรุณากรอกวันที่ออกใบเสนอราคา" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Format PDF</label>
                                            <select class="form-control" name="Quot_Format">
                                                <option value="1">Customer / Non-Samsung (ลูกค้าทั่วไป)</option>
                                                <option value="2">Customer DTAC (ลูกค้าดีเทค)</option>
                                                <option value="3">DTAC</option>
                                                <option value="4">AIS</option>
                                                <option value="5">Very Smart</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Discount %</label>
                                            <div class="input-group">
                                                
                                                <input id="Quot_PDiscount" name="Quot_PDiscount"  type="text" class="form-control" placeholder="ส่วนลด" aria-label="Text input with checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Create By</label>
                                            <div class="input-group">
                                                <input id="Quot_User_Create" name="Quot_User_Create"  type="text" class="form-control" placeholder="ชื่อผู้ Create" value="<?= $session['User_FName']?>  <?= $session['User_LName']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Next</button>
                                </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- Date picker plugins css -->
    <!-- <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Date Picker Plugin JavaScript -->
    <!-- <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->

    <?=link_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css');?>
    <?=script_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'th',
        autoclose: true,
        todayHighlight: true
        });
    });

    </script>

    <script>
    $(window).load(function()
    {
        var tel = [{
            "mask": "##[#] ### ###"},
            { "mask": "##[#] ### ### Ext [#][#][#][#][#]"},
            { "mask": "##[#] ### ###-[#][#]"},
            { "mask": "##[#] ### ###-[#][#] Ext [#][#][#][#][#]"},
            { "mask": "### ### ####"},
            {"mask": "## #### ####"},
            { "mask": "## #### ####[#] Ext [#][#][#][#][#]"},
            { "mask": "## #### ####-[#][#]"},
            { "mask": "## #### ####-[#][#] Ext [#][#][#][#][#]"}
        ];
        $('#phone_format').inputmask({
            mask: tel,
            greedy: false,
            definitions: { '#': { validator: "[0-9]", cardinality: 1}}
        });
       
    });
    </script>
         <script>
    jQuery(document).ready(function() {

        
        $('#pre-selected-options').multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>"
            // selectableFooter: "<div class='custom-header'>Selectable footer</div>",
            // selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });


    });
    </script>