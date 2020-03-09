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
                                <div class="col-md-3 column-step">
                                    <div class="step-number">3</div>
                                    <div class="step-title">Bottom</div>
                                    <div class="step-info">Create Commercial Term</div>
                                </div>
                                <div class="col-md-3 column-step active">
                                    <div class="step-number">4</div>
                                    <div class="step-title">View</div>
                                    <div class="step-info">View Detail All</div>
                                </div>
                            </div>
                            <!-- // Step -->

                            <br><br>
                            <h5 class="box-title">Ref. No Quotation</h5>
                            <hr>
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
                                <dt class="col-sm-2 text-right">Discount : </dt>
                                <dd class="col-sm-4"><?= isset($quotation['Quot_PDiscount']) ? $quotation['Quot_PDiscount'].'%' : '';?></dd>
                            </dl>
                            <br>

                            <h5 class="box-title">Middle</h5>
                            <hr>
                            <!-- Detail Quotation List -->
                            <div class="table-responsive">
                            <table width="100%" border="1" class=" table-hover table-sm" >
                       
                                    <tr class="center">
                                        <th width="50px">No.</th>
                                        <th class="center">Model</th>
                                        <th>Imei / Serial</th>
                                        <th>Symptom</th>
                                        <th>Description</th>
                                        <th>Qty.</th>
                                        <th>Price(THB)</th>
                                        <th class="center">Amount(THB)</th>
                                        <!-- <th class="center">Delete</th> -->
                                    </tr>

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
                                            $qtt_detail = $this->db->where('Qlist_Imei', $value['Qlist_Imei'])->where('Quot_No', $value['Quot_No'])->group_by('Qlist_Symptom')->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();
                                            foreach ($qtt_detail as $key => $value) {
                                            // นับจำนวนแถว Symptom
                                            $num_imei =  $this->db->where('Quot_No', $quotation['Quot_No'])->where('Qlist_Imei', $value['Qlist_Imei'])->where('Qlist_Symptom', $value['Qlist_Symptom'])->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->num_rows(); 
                                            ?>
                                                <td rowspan="<?= $num_imei?>"><?= $value['Qlist_Symptom']?></td>
                                            <?php
                                            $qtt_detail = $this->db->where('Qlist_Imei', $value['Qlist_Imei'])->where('Quot_No', $value['Quot_No'])->where('Qlist_Symptom', $value['Qlist_Symptom'])->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();
                                            foreach ($qtt_detail as $key => $value) {
                                                $value['Qlist_Price'] = number_format($value['Qlist_Price'],2,'.',',');
                                                $value['Qlist_Amount'] = number_format($value['Qlist_Amount'],2,'.',',');                    
                                             ?>
                                             
                                                    <td><?= $value['Qlist_Description']?></td>
                                                    <td width="20px"><?= $value['Qlist_Qty']?></td>
                                                    <td align="right"><?= $value['Qlist_Price']?></td>
                                                    <td align="right"><?= $value['Qlist_Amount']?></td>
                                                    <!-- <td align="center" width="10px"><a href="<?= base_url('quotation/delete_quotation_list?item_no='.$value['Qlist_ID'].'&ref_no='.$value['Quot_No'])?>" class="btn btn-sm btn-danger">Delete</a></td> -->
                                                </tr>
                                             <?php
                                            }
                                            ?>

                                            <?php
                                            }
                                        ?>
                                <?php }?>

                            </table>
                            </div>
                            <br>
                            <!-- //Detail Quotation List -->
                            
                            <!-- //Remark -->
                            <?=form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator'));?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Remark</label>
                                        <textarea id="Quot_Remark" name="Quot_Remark" class="form-control" rows="4"><?= $quotation['Quot_Remark']?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <?=form_close();?>
                           
                            <!-- //Remark -->

                            <?php
                                $quotation['Quot_Discount'] = number_format($quotation['Quot_Discount'],2,'.',',');
                                $quotation['Quot_Total'] = number_format($quotation['Quot_Total'],2,'.',',');
                                $quotation['Quot_Vat'] = number_format($quotation['Quot_Vat'],2,'.',',');
                                $quotation['Quot_Grandtotal'] = number_format($quotation['Quot_Grandtotal'],2,'.',',');                    
                            ?>
                            <div class="row">
                                <div class="col-md-12 text-center"><?= $quotation['Quot_Grandtotal_TH']?></div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right"><span class="font-bold">Discount:</span> <?= $quotation['Quot_Discount']?> ฿</div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right"><span class="font-bold">Total:</span> <?= $quotation['Quot_Total']?> ฿</div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right"><span class="font-bold">Vat:</span> <?= $quotation['Quot_Vat']?> ฿</div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" ><span class="font-bold">Grand Total:</span> <?= $quotation['Quot_Grandtotal']?> ฿</div>
                            </div>


                            <div class="form-body">
                                <h3 class="box-title m-t-40">Bottom </h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Address: </strong> <?=$comm['Comm_Delivery']?></p>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <p><strong>Email: </strong> <?=$comm['Comm_Payment']?></p>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <p><strong>Phone: </strong> <?=$comm['Comm_Validity']?></p>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <p><strong>Phone: </strong> <?=$comm['Comm_Warranty']?></p>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div>
                            <br>
                            <div class="form-group">
                                <a class="btn btn-default" href="<?= base_url('quotation/create_commercial_term/'.$quotation['Quot_No']);?>">Back</a>
                                <?php
                                if ($quotation['Quot_Format'] == '1')
                                {?>
                                    <a class="btn btn-info" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_general/'.$quotation['Quot_No']);?>">Preview</a>
                                <?php }
                                if ($quotation['Quot_Format'] == '2')
                                {?>
                                    <a class="btn btn-info" target="_blank" href="<?= base_url('quotation/pdf_quotation_customer_dtac/'.$quotation['Quot_No']);?>">Preview</a>
                                <?php }
                                if ($quotation['Quot_Format'] == '3')
                                {?>
                                    <a class="btn btn-info" target="_blank" href="<?= base_url('quotation/pdf_quotation_dtac/'.$quotation['Quot_No']);?>">Preview</a>
                                <?php }
                                if ($quotation['Quot_Format'] == '4')
                                {?>
                                    <a class="btn btn-info" target="_blank" href="<?= base_url('quotation/pdf_quotation_ais/'.$quotation['Quot_No']);?>">Preview</a>
                                <?php }
                                if ($quotation['Quot_Format'] == '5')
                                {?>
                                    <a class="btn btn-info" target="_blank" href="<?= base_url('quotation/pdf_quotation_very_smart/'.$quotation['Quot_No']);?>">Preview</a>
                                <?php } ?>
                                <!-- <button type="submit" class="btn btn-info">Next</button> -->
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
