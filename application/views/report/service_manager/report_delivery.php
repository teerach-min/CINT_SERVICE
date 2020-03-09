           
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">

                            <?= isset($excel_export) ? $excel_export : ''?>
                            <br>
                            <!-- <h3 class="box-title">Report</h3> -->

                            <div class="table-responsive">
                                <table class="table table-hover color-bordered-table inverse-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th width="100px">Date</th>
                                            <th>Company Name</th>
                                            <th>Bill</th>
                                            <th>Model</th>
                                            <th>IMEI</th>
                                            <th>Repair</th>
                                            <th>Other</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail as $key => $value) {?>
                                        <tr>
                                            <?php  
                                                $regis_date = date('d-M-Y', strtotime($value['Deli_Date']));
                                            ?>
                                            <td class="text-center"><?= ++$key;?></td>
                                            <td><?= $regis_date ?></td>
                                            <td><?= $value['Deli_Company'];?></td>
                                            <td><?= $value['Dsub_Bill'];?></td>
                                            <td><?= $value['Dsub_Model']?></td>
                                            <td><?= $value['Dsub_Imei'];?></td>
                                            <td><?= $value['Dsub_Description'];?></td>
                                            <td><?= $value['Dsub_Remark'];?></td>
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