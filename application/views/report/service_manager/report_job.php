           
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">

                            <?= isset($excel_export) ? $excel_export : ''?>
                            <br>
                            <!-- <h3 class="box-title">Report</h3> -->

                            <div class="table-responsive">
                                <table id="export-all" class="table table-hover color-bordered-table inverse-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th width="100px">Date</th>
                                            <th>Company Name</th>
                                            <th>Brand</th>
                                            <th>Imei</th>
                                            <th>Out of Order</th>
                                            <th>Job</th>
                                            <th>Model</th>
                                            <th>Technician</th>
                                            <th>Contact</th>
                                            <th>Phone</th>
                                            <th>Quotation</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail as $key => $value) {?>
                                        <tr>
                                            <?php  
                                                $check = $this->db->where('Regis_SubID', $value['Regis_SubID'])->get('qt_form_group')->row_array();
                                                $ref_no = $this->db->where('Qfg_Group_ID', $check['Qfg_Group_ID'])->get('qt_quotation')->row_array();
                                                
                                                if ($ref_no['Quot_No'] == '')
                                                {
                                                    $check2 = $this->db->where('Qfg_Group_ID', $value['Regis_SubID'])->get('qt_quotation')->row_array();
                                                }
                                                $regis_date = date('d-M-Y', strtotime($value['Regis_Date']));
                                                $ref_no['Quot_Grandtotal'] = number_format($ref_no['Quot_Grandtotal'],2,'.',',');
                                            ?>
                                            <td class="text-center"><?= ++$key;?></td>
                                            <td><?= $regis_date ?></td>
                                            <td><?= $value['Regis_Name'];?></td>
                                            <td><?= isset($value['Pro_ID']) ? group_product($value['Pro_ID']) : '';?></td>
                                            <td><?= $value['Regis_Imei']?></td>
                                            <td><?= $value['Regis_Order'];?></td>
                                            <td><?= $value['Regis_SubID'];?></td>
                                            <td><?= $value['Regis_Model'];?></td>
                                            <td><?= $value['User_FName'];?></td>
                                            <td><?= $value['Regis_Contact'];?></td>
                                            <td><?= $value['Regis_Phone'];?></td>
                                            <td><?= isset($ref_no['Quot_No']) ? $ref_no['Quot_No'] : $check2['Quot_No'];?></td>
                                            <td><?= isset($ref_no['Quot_Grandtotal']) ? $ref_no['Quot_Grandtotal'].' ฿' : $check2['Quot_Grandtotal'].' ฿';?></td>
                                            <td><?= $value['Status_Name'];?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.Table -->

                        </div>
                    </div>
                </div>
          
                <script>
$(document).ready(function(){
    $('#export-all').DataTable({
        "ordering": false,
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'excel'

        //     // 'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    });
});
</script>