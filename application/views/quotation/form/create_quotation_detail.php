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
                                <div class="col-md-3 column-step active">
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
                            <h5 class="box-title">Ref. No Quotation</h5>
                            <dl class="row">
                                <dt class="col-sm-2 text-right">Group Ref No. : </dt>
                                <dd class="col-sm-4"> <?php 
                                        foreach ($ref_job as $key => $value) {
                                        ?>
                                            <?= $value['Regis_SubID']?>,
                                        <?php
                                        }
                                        ?>
                                </dd>
                                <dt class="col-sm-2 text-right">Ref No. : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_No']?></dd>
                                <dt class="col-sm-2 text-right">Customer : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_Customer']?></dd>
                                <dt class="col-sm-2 text-right">Attention : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_Attention']?></dd>
                                <dt class="col-sm-2 text-right">Address : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_Address']?></dd>
                                <dt class="col-sm-2 text-right">Email : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_Email']?></dd>
                                <dt class="col-sm-2 text-right">Tel. : </dt>
                                <dd class="col-sm-4"><?= $quotation['Quot_Phone']?></dd>
                                <dt class="col-sm-2 text-right">Date : </dt>
                                <dd class="col-sm-4"><?=date('d-M-Y',strtotime($quotation['Quot_Date']))?></dd>
                            </dl>
                            <?=form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                            <br>
                            
                            <div class="form-body">
                                <h3 class="box-title m-t-40">Middle </h3>
                                <hr>
                                <input type="text" name="Quot_No" hidden id="Quot_No" value="<?= $quotation['Quot_No']?>" class="form-control" placeholder="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Model</label>
                                            <input type="text" name="Qlist_Model" id="Qlist_Model" class="form-control"
                                                placeholder="" data-error="กรุณากรอก Model" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Imei</label>
                                            <input type="text" name="Qlist_Imei" id="Qlist_Imei" class="form-control"
                                                placeholder="" data-error="กรุณากรอกหมายเลข IMEI" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Serial</label>
                                            <input type="text" name="Qlist_Serial" id="Qlist_Serial" class="form-control"
                                                placeholder="">
                                                <div class="help-block with-errors">กรอกข้อมูลเมื่อต้องการนำ Serial ไปโชว์ (ไม่จำเป็นต้องกรอก)</div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Symptom</label>
                                            <input type="text" name="Qlist_Symptom" id="Qlist_Symptom" class="form-control"
                                                placeholder="" data-error="กรุณากรอก Symptom" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <input type="text" name="Qlist_Description" id="Qlist_Description"
                                                class="form-control" placeholder="" data-error="กรุณากรอก Description" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="control-label">Qty.</label>
                                            <input type="text" name="Qlist_Qty" id="Qlist_Qty" class="form-control"
                                                placeholder="" data-error="กรุณากรอกจำนวน" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Price(THB)</label>
                                            <input type="text" name="Qlist_Price" id="Qlist_Price" class="form-control"
                                                placeholder="" data-error="กรุณากรอกราคาสินค้า" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                            <hr>
                            <?=form_close();?>

                            <style>
                            th{
                                text-align:center;
                            }
                            </style>
                            <!-- Detail Quotation List -->
                            <div id="quotation-detail" class="table-responsive">
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-outline-info" onClick="ajax_edit_table()">Edit</button>
                            </div>
                            <table width="100%" border="1" class=" table-hover table-sm" >
                                <thead>
                                        <tr class="center">
                                            <th width="50px">No.</th>
                                            <th class="center">Model</th>
                                            <th>Imei / Serial</th>
                                            <th>Symptom</th>
                                            <th>Description</th>
                                            <th>Qty.</th>
                                            <th>Price(THB)</th>
                                            <th class="center">Amount(THB)</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $qtt_detail = $this->db->where('Quot_No', $quotation['Quot_No'])->group_by('Qlist_Imei')->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();
                                    // dump_debug($qtt_detail);
                                    
                                    foreach ($qtt_detail as $key => $value) {
                                    ?>
                                        <tr>
                                            <?php 
                                                $num_imei =  $this->db->where('Quot_No', $quotation['Quot_No'])->where('Qlist_Imei', $value['Qlist_Imei'])->get('qt_quotation_list')->num_rows(); 
                                                // echo $num_imei;
                                            ?>
                                            <td rowspan="<?= $num_imei?>" align="center"><?= ++$key?></td>
                                            <td rowspan="<?= $num_imei?>"><?= $value['Qlist_Model']?></td>
                                            <td rowspan="<?= $num_imei?>"><?= $value['Qlist_Imei']?></td>
                                            <?php 

                                                // Select ครั้งที่ 2 
                                                $qtt_detail = $this->db->where('Qlist_Imei', $value['Qlist_Imei'])->where('Quot_No', $quotation['Quot_No'])->order_by('Qlist_ID', 'ASC')->group_by('Qlist_Symptom')->get('qt_quotation_list')->result_array();
                                                foreach ($qtt_detail as $key => $value) {
                                                // นับจำนวนแถว Symptom
                                                $num_imei =  $this->db->where('Quot_No', $quotation['Quot_No'])->where('Qlist_Imei', $value['Qlist_Imei'])->where('Qlist_Symptom', $value['Qlist_Symptom'])->get('qt_quotation_list')->num_rows(); 
                                                ?>
                                                    <td rowspan="<?= $num_imei?>"><?= $value['Qlist_Symptom']?></td>
                                                <?php
                                                $qtt_detail = $this->db->where('Qlist_Imei', $value['Qlist_Imei'])->where('Quot_No', $quotation['Quot_No'])->order_by('Qlist_ID', 'ASC')->where('Qlist_Symptom', $value['Qlist_Symptom'])->get('qt_quotation_list')->result_array();
                                                foreach ($qtt_detail as $key => $value) {
                                                ?>
                                                        <td><?= $value['Qlist_Description']?></td>
                                                        <td width="20px"><?= $value['Qlist_Qty']?></td>
                                                        <td align="right"><?= $value['Qlist_Price']?></td>
                                                        <td align="right"><?= $value['Qlist_Amount']?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                }
                                            ?>
                                    <?php }?>
                                </tbody>

                            </table>
                            </div>
                            <div id="quotation-edit" class="table-responsive" style="display:none">
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-outline-info" onClick="(location.reload())">Save</button>
                                </div>
                                <table id="table-edit" class=" table-hover table-sm" width="100%" border="1">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <!-- //Detail Quotation List -->
                            <div class="form-group">
                                <a class="btn btn-default" href="<?= base_url('quotation/edit_quotation/'.$quotation['Quot_No']);?>">Back</a>
                                <a class="btn btn-info" href="<?= base_url('quotation/create_commercial_term/'.$quotation['Quot_No']);?>">Next</a>
                                <!-- <button type="submit" class="btn btn-info">Next</button> -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="fixed-menu">
                <div class="fixed-icon">
                    <?php
                    if ($quotation['Quot_Format'] == '1')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_general/'.$quotation['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($quotation['Quot_Format'] == '2')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_dtac/'.$quotation['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($quotation['Quot_Format'] == '3')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_dtac/'.$quotation['Quot_No']);?>">ref_no</a>
                    <?php }
                    if ($quotation['Quot_Format'] == '4')
                    {?>
                        <a class="btn btn-danger btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_ais/'.$quotation['Quot_No']);?>">Preview</a>
                    <?php }
                    if ($quotation['Quot_Format'] == '5')
                    {?>
                        <a class="btn btn-warning btn-lg" target="_blank" href="<?= base_url('quotation/pdf_quotation_very_smart/'.$quotation['Quot_No']);?>">Preview</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

<script>
    function ajax_edit_table(){
        document.getElementById('quotation-detail').style ="display:none";
        // let url = '<?= site_url('quotation/create_quotation_detail/'. $quotation['Quot_No'])?>';
        let url = '<?= site_url('quotation/ajax_quotation_detail/'. $quotation['Quot_No'])?>';
        var request = new XMLHttpRequest();
        request.open('GET', url, true);

        request.onload = function() {
        if (this.status >= 200 && this.status < 400) {
            // Success!
            let thead;
            let tbody;
            let no = 0;
            var data = JSON.parse(this.response);
            // console.log(data);

            thead += '<tr>';
            thead += '<th width="50px">No.</th>';
            thead += '<th class="center">Model</th>';
            thead += "<th>Imei</th>";
            thead += "<th>Serial</th>";
            thead += "<th>Symptom</th>";
            thead += "<th>Description</th>";
            thead += "<th>Qty.</th>";
            thead += "<th>Price(THB)</th>";
            thead += "<th class='center'>Delete</th>";
            thead += '</tr>';


            for (let i = 0; i < data.length; i++) {
                // console.log(data.length);
                // const element = array[i];
                tbody += '<tr>';
                tbody += '<td align="center">'+ ++no +'</td>';
                tbody += '<td contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Model" onblur ="edit_quotation(this)">'+data[i].Qlist_Model+'</td>';
                tbody += '<td contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Imei" onblur="edit_quotation(this)">'+data[i].Qlist_Imei+'</td>';
                tbody += '<td contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Serial" onblur="edit_quotation(this)">'+data[i].Qlist_Serial+'</td>';
                tbody += '<td contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Symptom" onblur="edit_quotation(this)">'+data[i].Qlist_Symptom+'</td>';
                tbody += '<td contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Description" onblur="edit_quotation(this)">'+data[i].Qlist_Description+'</td>';
                tbody += '<td align="center" contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Qty" onblur="edit_quotation(this)">'+data[i].Qlist_Qty+'</td>';
                tbody += '<td align="right" contenteditable="true" data-id="'+data[i].Qlist_ID+'" data-type="Qlist_Price" onblur="edit_quotation(this)">'+data[i].Qlist_Price+'</td>';
                tbody += '<td width="10px"><a href="<?= base_url('quotation/delete_quotation_list')?>?item_no='+data[i].Qlist_ID+'&ref_no='+data[i].Quot_No+'" class="btn btn-sm btn-danger">Delete</a></td>';

                tbody += '</tr>';

                
            }

            $('#table-edit thead').html(thead);
            $('#table-edit tbody').html(tbody);
            document.getElementById('quotation-edit').style ="display:block";


        } else {
            // We reached our target server, but it returned an error

        }
        };

        request.onerror = function() {
        // There was a connection error of some sort
        };

        request.send();
    }

    function edit_quotation(e)
    {
        let value = e.innerHTML;
        let id = e.getAttribute('data-id');
        let type = e.getAttribute('data-type');
        // console.log(id);
        let url = "<?= site_url('quotation/update_quotation_detail')?>?id="+id+"&type="+type+"&value="+value;
        var request = new XMLHttpRequest();
        request.open('GET', url, true);

        request.onload = function() {
        if (this.status >= 200 && this.status < 400) {
            // Success!
            // var data = JSON.parse(this.response);
            var data = this.response;
            console.log(data);
        } else {
            // We reached our target server, but it returned an error

        }
        };

        request.onerror = function() {
        // There was a connection error of some sort
        };

        request.send();
        // e.value;
        // consolt
        // alert('ok');
    }
</script>