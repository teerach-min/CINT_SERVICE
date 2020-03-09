<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Create Job</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('')?>">index</a></li>
                            <li class="active">Create Job</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="row">
                    <!-- Table -->
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="panel-body">
                            <?= form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'))?>
                                        <div class="form-body">
                                            <h2 class="box-title">Customer Detail</h2>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Company</label>
                                                        <input type="text" class="form-control" name="Regis_Name" id="Regis_Name" value="" placeholder="Company" data-error="กรุณากรอกชื่อบริษัท" required>
                                                        <div class="help-block with-errors">(ชื่อบริษัทของลูกค้า)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Name</label>
                                                        <input type="text" class="form-control" name="Regis_Contact" id="Regis_Contact" value="" placeholder="Customer Name" data-error="กรุณากรอกชื่อของลูกค้า" required>
                                                        <div class="help-block with-errors">(ชื่อของลูกค้าที่สามารถติดต่อได้)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Email</label>
                                                        <input type="text" class="form-control" name="Regis_Email" id="Regis_Email" value="" placeholder="Customer Email" data-error="กรุณากรอกเมลล์ของลูกค้า" required>
                                                        <div class="help-block with-errors">(อีเมลล์ของลูกค้าที่สามารถติดต่อได้)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <input type="text" class="form-control" name="Regis_Address" id="Regis_Address" value="" placeholder="Address" data-error="กรุณากรอกที่อยู่ของลูกค้า" required>
                                                        <div class="help-block with-errors">(ที่อยู่ของลูกค้า)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tel :</label>
                                                        <input type="text" class="form-control" name="Regis_Phone" id="Regis_Phone" value="" placeholder="Phone" data-error="กรุณากรอกหมายเลขเบอร์โทร T: 02 000 0000-00 Ext 000">
                                                        <div class="help-block with-errors">(หมายเลขเบอร์โทร T: 02 000 0000-00 Ext 000)</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile</label>
                                                        <input type="text" class="form-control" name="Regis_Mobile" id="Regis_Mobile" value="" placeholder="Phone" data-error="กรุณากรอกหมายเลขเบอร์มือถือ P: 086 000 000">
                                                        <div class="help-block with-errors">(หมายเลขเบอร์มือถือ P: 086 000 000)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <!-- <div class="col-md-4">
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Date Pick Up</label>
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" autocomplete="off" name="Regis_Pickupdate" value="" id="datepicker-autoclose" placeholder="dd/MM/yyyy" data-error="กรุณาเลือกวันที่รับเครื่อง" required>
                                                        <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                                        <div class="help-block with-errors">(เลือกวันที่รับเครื่อง Format: dd/MM/yyyy )</div>
                                                        
                                                    </div>
                                                </div> -->
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                         
                                          

                                            <h3 class="box-title m-t-40">Product Detail</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">IMEI</label>
                                                        <input type="text" class="form-control" name="Regis_Imei" id="Regis_Imei" value="" placeholder="IMEI">
                                                                                                             
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Serial</label>
                                                        <input type="text" class="form-control" name="Regis_Serial" id="Regis_Serial" value="" placeholder="Serial">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Model</label>
                                                        <input type="text" class="form-control" name="Regis_Model" id="Regis_Model" value="" placeholder="Model">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Detail Defect</label>
                                                        <textarea class="form-control" name="Regis_Order" placeholder="ใส่อาการเสีย" id="Regis_Order" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Status Product</label>
                                                        <div class="radio-list">
                                                            <!-- <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="Pro_ID" id="Samsung" value="1">
                                                                    <label for="Samsung">Samsung</label>
                                                                </div>
                                                            </label> -->
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="Pro_ID" id="Non_Samsung" value="2" checked>
                                                                    <label for="Non_Samsung">Non-Samung</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div id="SelectUser" class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Technical</label>
                                                        <select id="select_user" name="User_ID" class="form-control" tabindex="1">
                                                        <option value="" disabled hidden selected>Choose Technical</option>
                                                            <?php 
                                                            $select_user = $this->db->where_in('Status', array('Technician_Non_Samsung', 'Technician'))->get('sv_user')->result_array();
                                                            foreach ($select_user as $key => $value) { 
                                                            ?>
                                                                <option value="<?= $value['User_ID']?>">
                                                                    <?= $value['User_FName']?> <?= $value['User_LName']?> 
                                                                </option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Warranty -->
                                        <hr>      
                                            <!--/span-->
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div id="input_warranty" class="form-group">
                                                    <label class="control-label">Warranty</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="Regis_Warranty" id="In_Warranty" value="IN">
                                                                <label for="In_Warranty">In Warranty</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="Regis_Warranty" id="Out_Warranty" value="OUT">
                                                                <label for="Out_Warranty">Out Warranty</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- Warranty -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- <label class="control-label">Create By  </label> -->
                                                <input type="text" class="form-control" hidden readonly name="Regis_Submit" id="Regis_Submit" value="<?= $session['User_FName']?>">
                                            </div>
                                        </div>
                                        </div>
                                        <br>
                                        <div class="form-actions">
                                            <button type="submit" id="submit" class="btn btn-success"> <i class="fa fa-check"></i> Create Job</button>
                                        </div>
                                    <?= form_close();?>
                                </div>
                        </div>
                    </div>
                    <!-- /.Table -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <style>
            .symptom-samsung{
                display:none;
            }
            .symptom-nonsamsung{
                display:none;
            }
            #accessories input{
                margin:5px 0;
            }
            .samsung{
                display:none;
            }
            .non-samsung{
                display:none;
            }
        
        </style>

        <?=link_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css');?>
        <?=script_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

        <script>
        $(window).load(function()
        {
            var tel = [
                { "mask": "## ### ####"},
                { "mask": "## ### #### Ext [#][#][#][#][#]"},
                { "mask": "## ### ####-[#][#] Ext [#][#][#][#][#]"},
            ];

            var mobile = [
                { "mask": "### ### ####"},
                { "mask": "### ### ####-[#][#]"},

            ]

            $('#Regis_Phone').inputmask({
                mask: tel,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}}
            });

            $('#Regis_Mobile').inputmask({
                mask: mobile,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}}
            });
        
        });
        $(document).ready(function() {

            $('#Regis_Accessories').tagsinput({
                freeInput: false,
                trimValue: true 
            });

            $('#Regis_Accessories').keyup(function(){
                alert('ok');
            });
            $('#accessories input').click(function(){
                var btn = $(this).val();
                $('#Regis_Accessories').tagsinput('add', btn);
            });

            // $('input[id="chk-samsung"]').prop('disabled', true);
            // $('input[id="chk-nonsamsung"]').prop('disabled', true);

            $('#Samsung').click(function(){
                $('.non-samsung').hide();
                $('.samsung').show();
                $('#Regis_Accessories').tagsinput('removeAll');
                $('#input_warranty').hide();
                
              
            });

            $('#input_warranty').hide();

            $('#Non_Samsung').click(function(){
                // alert('ok');
                $('.samsung').hide();
                $('.non-samsung').show();
                $('#Regis_Accessories').tagsinput('removeAll');
                $('#input_warranty').show();

            });


            $('#datepicker-autoclose').datepicker({
                format: 'd-M-yyyy',
                autoclose: true,
                todayHighlight: true,
            
            });

        });

      
        </script>