<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Job <?= $job['Regis_SubID']?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('')?>">index</a></li>
                            <li class="active">Edit Job</li>
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
                    <!-- Table -->
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="panel-body">
                            <?= form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'))?>
                            
                                        <div class="form-body">
                                            <h2 class="box-title">Customer Detail</h2>
                                            <fieldset disabled>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Company</label>
                                                        <input type="text" class="form-control" name="Regis_Name" id="Regis_Name" value="<?= $job['Regis_Name']?>" placeholder="Company" data-error="กรุณากรอกชื่อบริษัท" >
                                                        <div class="help-block with-errors">(ชื่อบริษัทของลูกค้า)</div>
                                                        <!-- <span class="help-block"> This is inline help </span>  -->
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Name</label>
                                                        <input type="text" class="form-control" name="Regis_Contact" id="Regis_Contact" value="<?=set_value('Regis_Contact',$job['Regis_Contact']);?>" placeholder="Customer Name" data-error="กรุณากรอกชื่อของลูกค้า" >
                                                        <div class="help-block with-errors">(ชื่อของลูกค้าที่สามารถติดต่อได้)</div>
                                                        <!-- <span class="help-block"> This field has error. </span>  -->
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer Email</label>
                                                        <input type="text" class="form-control" name="Regis_Email" id="Regis_Email" value="<?=set_value('Regis_Email',$job['Regis_Email']);?>" placeholder="Customer Email" data-error="กรุณากรอกเมลล์ของลูกค้า">
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
                                                        <input type="text" class="form-control" name="Regis_Address" id="Regis_Address" value="<?= $job['Regis_Address']?>" placeholder="Address" data-error="กรุณากรอกที่อยู่ของลูกค้า" >
                                                        <div class="help-block with-errors">(ที่อยู่ของลูกค้า)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" class="form-control" name="Regis_Phone" id="Regis_Phone" value="<?= $job['Regis_Phone']?>" placeholder="Phone" data-error="กรุณากรอกหมายเลขเบอร์โทรติดต่อของลูกค้า" >
                                                        <div class="help-block with-errors">(หมายเลขเบอร์โทรติดต่อของลูกค้า)</div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Date Pick Up</label>
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" name="Regis_Pickupdate" value="<?= date('d-M-Y',strtotime($job['Regis_Pickupdate']))?>" id="datepicker-autoclose" placeholder="dd/mm/yyyy" data-error="กรุณาเลือกวันที่รับเครื่อง" >
                                                        <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                                        <div class="help-block with-errors">(เลือกวันที่รับเครื่อง Format: dd/mm/yyyy )</div>
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                         
                                          

                                            <h3 class="box-title m-t-40">Product Detail</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">IMEI</label>
                                                        <input type="text" class="form-control" name="Regis_Imei" id="Regis_Imei" value="<?= $job['Regis_Imei']?>" placeholder="IMEI">
                                                                                                             
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Serial</label>
                                                        <input type="text" class="form-control" name="Regis_Serial" id="Regis_Serial" value="<?= $job['Regis_Serial']?>" placeholder="Serial">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Model</label>
                                                        <input type="text" class="form-control" name="Regis_Model" id="Regis_Model" value="<?= $job['Regis_Model']?>" placeholder="Model">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Detail Defect</label>
                                                        <textarea class="form-control" name="Regis_Order" placeholder="ใส่อาการเสีย" id="Regis_Order" rows="3"><?= $job['Regis_Order']?></textarea>
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
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="Pro_ID" id="Samsung" value="1">
                                                                    <label for="Samsung">Samsung</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="Pro_ID" id="Non_Samsung" value="2">
                                                                    <label for="Non_Samsung">Non-Samung</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                            <!--/row-->
                                        <hr>
                                        <fieldset>
                                        </div>
                                        <div class="form-body">

                                        <!-- //symptom-nonsamsung -->
                                        <div class="symptom-nonsamsung">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Printer</label>
                                                        <br>
                                                        <?php $printer = $this->db->where('GSymp_ID','8')->get('sv_sub_symptom')->result_array();?>
                                                        <?php 
                                                            foreach ($printer as $key => $value) {
                                                        ?>
                                                            <div class="checkbox checkbox-info">
                                                                <input type="checkbox" id="chk-nonsamsung<?= $value['SSymp_ID']?>" class="chk-nonsamsung custom-control-input" name="printer[]" value="<?= $value['SSymp_ID']?>">
                                                                <label for="chk-nonsamsung<?= $value['SSymp_ID']?>"><?= $value['SSymp_Name']?></label>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?>                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Scanner</label>
                                                        <br>
                                                        <?php $scanner = $this->db->where('GSymp_ID','9')->get('sv_sub_symptom')->result_array();?>
                                                        <?php 
                                                            foreach ($scanner as $key => $value) {
                                                        ?>
                                                            <div class="checkbox checkbox-info">
                                                                <input type="checkbox" id="chk-nonsamsung<?= $value['SSymp_ID']?>" class="chk-nonsamsung custom-control-input" name="scanner[]" value="<?= $value['SSymp_ID']?>">
                                                                <label for="chk-nonsamsung<?= $value['SSymp_ID']?>"><?= $value['SSymp_Name']?></label>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?>                
                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">PDA</label>
                                                        <br>
                                                        <?php $pda = $this->db->where('GSymp_ID','10')->get('sv_sub_symptom')->result_array();?>
                                                        <?php 
                                                            foreach ($pda as $key => $value) {
                                                        ?>
                                                            <div class="checkbox checkbox-info">
                                                                <input type="checkbox" id="chk-nonsamsung<?= $value['SSymp_ID']?>" class="chk-nonsamsung custom-control-input" name="pda[]" value="<?= $value['SSymp_ID']?>">
                                                                <label for="chk-nonsamsung<?= $value['SSymp_ID']?>"><?= $value['SSymp_Name']?></label>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?> 
                                                       
                                                      
                                                
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Accessories</label>
                                                        <br>
                                                        <?php $accessories = $this->db->where('GSymp_ID','10')->get('sv_sub_symptom')->result_array();?>
                                                        <?php 
                                                            foreach ($accessories as $key => $value) {
                                                        ?>
                                                            <div class="checkbox checkbox-info">
                                                                <input type="checkbox" id="chk-nonsamsung<?= $value['SSymp_ID']?>" class="chk-nonsamsung custom-control-input" name="accessories[]" value="<?= $value['SSymp_ID']?>">
                                                                <label for="chk-nonsamsung<?= $value['SSymp_ID']?>"><?= $value['SSymp_Name']?></label>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?> 
                                                        
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <hr>
                                        <!-- Select Symptom to ajax -->
                                        <?php 
                                            $symptom = $this->db->select('SSymp_ID')->where('Regis_SubID', $job['Regis_SubID'])->get('sv_symptom_job')->result_array();
                                            $array_h = '[';
                                            foreach ($symptom as $key => $value) {
                                                $array_h .= '"'.$value['SSymp_ID'].'",';
                                            }
                                            $array_h = substr($array_h,0,-1); 
                                            $array_h .= ']';
                                        ?>
                                        <!-- <?= dump_debug($symptom)?> -->
                                        <!-- <?= print_r($new_array)?> -->
                                        <textarea id="symptom" cols="10" hidden data-val='<?= $array_h?>' rows="1"><?= $array_h?></textarea>
                                        <input type="text" id="status_group" hidden value="<?= $job['Pro_ID']?>">
                                        <!-- /Select Symptom to ajax -->

                                        <!-- Warranty  -->
                                        <div class="row">
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
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" hidden class="form-control" id="check_warranty" value="<?= $job['Regis_Warranty']?>">                                            
                                        <!-- /Warranty  -->
                                        

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Status Job</label>
                                                    <select id="select_status" name="Status_ID" id="status" class="form-control" tabindex="1" onChange="handleChangeStatus(this)">
                                                        <?php 
                                                            if($array_h != ']' && $array_h != '[]' )
                                                            {
                                                                $status_job = $this->db->where_in('Status_ID', array('2','3','4'))->get('sv_status')->result_array();
                                                            }else{
                                                                if ($job['Status_ID'] === '1' || $job['Status_ID'] === '2'){
                                                                    $status_job = $this->db->where_in('Status_ID', array('2','3','4'))->get('sv_status')->result_array();
                                                                    ?>
                                                                        <option value="<?= $job['Status_ID']?>">
                                                                            <?= $job['Status_Name']?>
                                                                        </option>
                                                                    <?php
                                                                }else{
                                                                    $status_job = $this->db->where_in('Status_ID',array('2','3','4'))->or_where_in('Status_Group', '2')->get('sv_status')->result_array();
                                                                }
                                                            }
                                                            foreach ($status_job as $key => $value) {
                                                        ?>
                                                            <option <?php if ($job['Status_ID'] === $value['Status_ID']) { echo 'selected="selected"'; } ?> value="<?= $value['Status_ID']?>">
                                                                <?= $value['Status_Name']?>
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div id="SelectUser" class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Technical</label>
                                                    <select id="select_user" <?php if ($session['Access']['Acc_ID'] !== '3') { echo 'disabled';} ?> name="User_ID" class="form-control" tabindex="1">
                                                        <?php 
                                                        $select_user = $this->db->where_in('Status', array('Technician_Non_Samsung', 'Technician'))->get('sv_user')->result_array();
                                                        foreach ($select_user as $key => $value) { 
                                                        ?>
                                                            <option <?php if ($job['User_ID'] === $value['User_ID']) { echo 'selected="selected"'; }?> value="<?= $value['User_ID']?>">
                                                                <?= $value['User_FName']?> <?= $value['User_LName']?> 
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <label class="control-label">Create By  </label>
                                                <input type="text" class="form-control" disabled name="" value="<?= $job['Regis_Submit']?>">
                                                <input type="text" class="form-control" <?php if ($session['Access']['Acc_ID'] === '3') { echo 'disabled';} ?> hidden name="User_ID" id="Schange_Name" value="<?= $session['User_ID'].' '?> ">
                                            </div>
                                        </div>
                                        <?php 
                                            $remark_quotation = $this->db->where('Regis_SubID', $job['Regis_SubID'])->where('Schange_Quotation', '1')->get('sv_change_status')->row_array();
                                            $remark_complete = $this->db->where('Regis_SubID', $job['Regis_SubID'])->where('Schange_Complete', '1')->get('sv_change_status')->row_array();
                                            $remark_closecall = $this->db->where('Regis_SubID', $job['Regis_SubID'])->where('Schange_Closecall', '1')->get('sv_change_status')->row_array();
                                            // dump_debug($remark_quotation);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-remark quotation">
                                                    <div class="form-group">
                                                        <label class="control-label">Remark Quotation</label>
                                                        <textarea class="form-control" name="Schange_Remark" placeholder="Remark Quotation" id="Remark_Quotation" rows="3"><?= isset($remark_quotation['Schange_Remark']) ? $remark_quotation['Schange_Remark'] : '' ;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-remark completed">
                                                    <div class="form-group">
                                                        <label class="control-label">Remark Completed</label>
                                                        <textarea class="form-control" name="Schange_Remark" placeholder="Remark Completed" id="Remark_Completed" rows="3"><?= isset($remark_complete['Schange_Remark']) ? $remark_complete['Schange_Remark'] : '' ;?></textarea>
                                                    </div>
                                                </div>
                                            </div>       
                                            <div class="col-md-12">
                                                <div class="form-remark closecall">
                                                    <div class="form-group">
                                                        <label class="control-label">Remark Close Call</label>
                                                        <textarea class="form-control" name="Schange_Remark" placeholder="Remark Close Call" id="Remark_Closecall" rows="3"><?= isset($remark_closecall['Schange_Remark']) ? $remark_closecall['Schange_Remark'] : '' ;?></textarea>
                                                    </div>
                                                </div>
                                            </div>             
                                        </div>

                                        </div>
                                        <br>
                                        
                                        <div class="form-actions">
                                            <!-- <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $session['User_ID']?>"> -->
                                            <button type="submit" id="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save Job</button>
                                            <!-- <button type="button" id="reset" class="btn btn-default">Reset Form</button> -->
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
        </style>

        <?=link_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css');?>
        <?=script_tag('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

        <script>

        if ($('select[name="Status_ID"]').val() !== '7'){
            document.getElementById('SelectUser').style.display = 'none';
        }else{
            document.getElementById('SelectUser').style.display = 'block';
        }

        const handleChangeStatus = (e) =>{
            if (e.value !== '7')
            {
                document.getElementById('SelectUser').style.display = 'none';
                // e.style:
            }else{

                document.getElementById('SelectUser').style.display = 'block';
            }

        }

        $(window).load(function()
        {
            // var tel = [{
            //     "mask": "##[#] ### ###"},
            //     { "mask": "##[#] ### ### Ext [#][#][#][#][#]"},
            //     { "mask": "##[#] ### ###-[#][#]"},
            //     { "mask": "##[#] ### ###-[#][#] Ext [#][#][#][#][#]"},
            //     { "mask": "### ### ####"},
            //     {"mask": "## #### ####"},
            //     { "mask": "## #### #### Ext [#][#][#][#][#]"},
            //     { "mask": "## #### ####-[#][#]"},
            //     { "mask": "## #### ####-[#][#] Ext [#][#][#][#][#]"}
            // ];
            // $('#Regis_Phone').inputmask({
            //     mask: tel,
            //     greedy: false,
            //     definitions: { '#': { validator: "[0-9]", cardinality: 1}}
            // });
        
        });
        $(document).ready(function() {
          
            $('#select_status').change(function(){
                // Disabled Form Symbol Non-Samsung
                $('.chk-nonsamsung').prop('disabled', true);
                $status = $('#select_status').val();
                selectRemarkAll = document.querySelectorAll('textarea[name="Schange_Remark"]');
                selectFormRemarkAll = document.querySelectorAll('.form-remark');
                selectRemarkAll.forEach(element => {
                    element.disabled = true;
                });
                selectFormRemarkAll.forEach(element => {
                    element.style.display = 'none';
                });

                if ($status == '2')
                {
                    $('.chk-nonsamsung').prop('disabled', false);
                }
                else if ($status == '3')
                {
                    $('#Remark_Quotation').prop('disabled', false);
                    $('#Remark_Completed').prop('disabled', true);
                    $('.quotation').show();
                }
                else if ($status == '4')
                {
                    $('#Remark_Completed').prop('disabled', false);
                    $('.completed').show();
                }
                else if ($status == '8')
                {
                    $('.closecall').show();
                    $('#Remark_Closecall').prop('disabled', false);
                }
            });

            $('#select_status').trigger('change');

            var check = $('#status_group').val();
            if (check == 1)
            {
                $('#Samsung').prop('checked', true);
                var $elements = $(".chk-samsung[name]")
                var symptom = $('#symptom').data("val");

                if (symptom != ']' && symptom != '[]')
                {
                    $elements.val( symptom );
                }
                // alert(symptom);
            }
            if (check == 2)
            {
                $('#Non_Samsung').prop('checked', true);
                var $elements = $(".chk-nonsamsung[name]")
                var symptom = $('#symptom').data("val");
                if (symptom != ']' && symptom != '[]')
                {
                    $elements.val( symptom );
                }
            }

            //Check Warranty
            var check_warranty = $('#check_warranty').val();
            if (check_warranty == 'IN')
            {
                $('#In_Warranty').prop('checked', true);
            }
            else if (check_warranty == 'OUT')
            {
                $('#Out_Warranty').prop('checked', true);
            }else{

            }

            if($('input#Non_Samsung').is(':checked'))
            {
                $('.symptom-nonsamsung').show(); 
                // $('input[name="Regis_Warranty"]').prop('disabled', true);
                $('#input_warranty').show();
            }

            jQuery('#datepicker-autoclose').datepicker({
                format: 'd-M-yyyy',
                autoclose: true,
                todayHighlight: true,
            
            });
        });

      
        </script>