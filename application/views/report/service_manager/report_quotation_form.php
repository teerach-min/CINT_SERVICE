<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Report Quotation</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('')?>">Index</a></li>
                            <li><a href="<?= base_url('report')?>">Report</a></li>
                            <li class="active">Report Quotation</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-info">
                            <div class="panel-heading">Report Quotation</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                <?= form_open()?>
                                    <!-- <form action="#" class="form-horizontal"> -->
                                        <div class="form-body">
                                            <h3 class="box-title">Select Detail</h3>
                                            <hr class="m-t-0 m-b-40">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control input-daterange-datepicker" type="text" value="" />
                                                            <input id="Date_Rage_Start" hidden class="form-control" type="text" name="Date_Rage_Start" value="" />
                                                            <input id="Date_Rage_End" hidden class="form-control" type="text" name="Date_Rage_End" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Form Type</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="Form_Type">
                                                                <option value="all">ALL</option>
                                                                <option value="1">Customer / Non-Samsung (ลูกค้าทั่วไป)</option>
                                                                <option value="2">Customer DTAC (ลูกค้าดีเทค)</option>
                                                                <option value="3">DTAC</option>
                                                                <option value="4">AIS</option>
                                                                <option value="5">Very Smart</option>
                                                            </select>
                                                            <!-- <span class="help-block"> Select your gender. </span>  -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                          
                                        </div>
                                        <br>
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                    <?= form_close()?>

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