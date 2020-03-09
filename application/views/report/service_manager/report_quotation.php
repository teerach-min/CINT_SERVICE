           
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">

                            <?= isset($excel_export) ? $excel_export : ''?>
                            <br>
                            <!-- <h3 class="box-title">Report</h3> -->

                            <div class="table-responsive">
                                <table id="export-all" border="1" class="table table-hover color-bordered-table inverse-bordered-table  table-sm">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center" width="20px">Item</th>
                                            <th>Customer Name</th>
                                            <th>Quotation No.</th>
                                            <th>Imei</th>
                                            <th width="10%">Symptom</th>
                                            <th>Description</th>
                                            <th>Qty.</th>
                                            <th width="7%">ราคา</th>
                                            <th>Total</th>
                                            <th>VAT 7%</th>
                                            <th>Grand Total</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- <?= dump_debug($detail)?> -->
                                    <?php foreach ($detail as $key => $value) {?>
                                        <?php $row = $this->db->where('Quot_No', $value['Quot_No'])->get('qt_quotation_list')->num_rows();?>
                                        <?php 
                                        if ($row == '0')
                                        {?>
                                        <tr>
                                            <td><?= ++$key?></td>
                                            <td><?= $value['Quot_Customer'];?></td>
                                            <td><?= $value['Quot_No'];?></td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                            <td>none</td>
                                        </tr>
                                        <?php }else{ ?>
                                        <tr>
                                            <td rowspan="<?= $row?>" class="text-center"><?= ++$key?></td>
                                            <td rowspan="<?= $row?>"><?= $value['Quot_Customer'];?></td>
                                            <td rowspan="<?= $row?>"><?= $value['Quot_No'];?></td>
                                            <?php $detail2 = $this->db->where('Quot_No', $value['Quot_No'])->group_by('Qlist_Imei')->get('qt_quotation_list')->row_array();?>

                                                <td><?= $detail2['Qlist_Imei'];?> <?= isset($detail2['Qlist_Serial']) ? $detail2['Qlist_Serial'] : ''?> </td>
                                                <td><?= $detail2['Qlist_Symptom']?></td>
                                                <td><?= $detail2['Qlist_Description']?></td>
                                                <td class="text-center"><?= $detail2['Qlist_Qty']?></td>
                                                <td class="text-right"><?= number_format($detail2['Qlist_Amount'],2,'.',',')?></td>
                                            <td rowspan="<?= $row?>" class="text-right"><?= number_format($value['Quot_Total'],2,'.',',')?></td>
                                            <td rowspan="<?= $row?>" class="text-right"><?= number_format($value['Quot_Vat'],2,'.',',')?></td>
                                            <td rowspan="<?= $row?>" class="text-right"><?= number_format($value['Quot_Grandtotal'],2,'.',',')?></td>
                                            <td width="50px" rowspan="<?= $row?>" class="text-right"><?= date('d-M-Y', strtotime($value['Quot_Create']))?></td>
                                            </tr>
                                            <?php $detail2 = $this->db->where('Quot_No', $value['Quot_No'])->get('qt_quotation_list')->result_array();
                                            
                                            unset($detail2[0]);
                                            // array_splice($detail2, 1, -1);
                                            foreach ($detail2 as $key => $value) {
                                                // $value['Qlist_Amount'] = number_format($value['Qlist_Amount'],2,'.',',')
                                            ?>
                                            
                                            <tr>
                                                <td><?= $value['Qlist_Imei']?></td>
                                                <td><?= $value['Qlist_Symptom']?></td>
                                                <td><?= $value['Qlist_Description']?></td>
                                                <td class="text-center"><?= $value['Qlist_Qty']?></td>
                                                <td class="text-right"><?=  number_format($value['Qlist_Amount'],2,'.',',')?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            
                                            
                                    <?php } 
                                }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.Table -->

                        </div>
                    </div>
                </div>
          
