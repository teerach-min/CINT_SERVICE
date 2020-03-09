



<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Report Delivery</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('')?>">Index</a></li>
                            <li><a href="<?= base_url('import')?>">Import</a></li>
                            <li class="active">Import IVD</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-info">
                            <div class="panel-heading">Report Delivery</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <?= form_open_multipart()?>
                                    <!-- <form action="#" class="form-horizontal"> -->
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="box-title">Select Detail</h3>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="<?= site_url('_assets/excel-import/invoice_import.xlsx')?>" class=" btn btn-info btn-sm text-white">Download Excel</a>
                                                </div>
                                            </div>
                                            <hr class="m-t-0 m-b-40">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="input-file-now">Drop File Excel</label>

                                                    <!-- <input type="file" name="userfile" size="20" /> -->

                                                    <input type="file" name="userfile" id="uploadFile" class="dropify" accept=".xls, .xlsx" />
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>

                                    <?= form_close()?>


                                    <?php
                                    if (isset($report))
                                    {
                                        foreach ($report as $key => $value) {
                                            echo $value['report'];
                                        }
                                    } 
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- / row -->
                <?= isset($table_export) ? $table_export : '';?>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        
<script>
    $('.dropify').dropify();

    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        autoUpdateInput: false,
        locale: {
        format: 'DD-MMM-YYYY'
        }
    }, function(start, end, label) {
        $('#Date_Rage_Start').val(start.format('YYYY-MM-DD'));
        $('#Date_Rage_End').val(end.format('YYYY-MM-DD'));
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');

    });
    $('.input-daterange-datepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MMM-YYYY') + ' - ' + picker.endDate.format('DD-MMM-YYYY'));
    });
</script>