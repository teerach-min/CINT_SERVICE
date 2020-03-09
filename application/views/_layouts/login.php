
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Services Login</title>
     <!-- Bootstrap Core CSS -->
     <?= link_tag('_assets/bootstrap/dist/css/bootstrap.min.css');?>
    <?= link_tag('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css');?>
    <!-- <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet"> -->
    <!-- Menu CSS -->
    <?= link_tag('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css');?>
    <!-- <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet"> -->
    <!-- vector map CSS -->
    <?= link_tag('plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css');?>
    <?= link_tag('plugins/bower_components/css-chart/css-chart.css');?>
    <!-- <link href="../plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../plugins/bower_components/css-chart/css-chart.css" rel="stylesheet"> -->
    <!-- animation CSS -->
    <?= link_tag('_assets/css/animate.css');?>
    <!-- <link href="_assets/css/animate.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <?= link_tag('_assets/css/style.css');?>
    <!-- <link href="_assets/css/style.css" rel="stylesheet"> -->
    <!-- color CSS -->
    <?= link_tag('_assets/css/colors/default.css');?>
    <!-- <link href="_assets/css/colors/default.css" id="theme" rel="stylesheet"> -->

    <!-- page -->
    <?= link_tag('plugins/bower_components/multiselect/css/multi-select.css');?>
       <!-- <link href="../plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" /> -->

    <!-- Data Table -->
    <?=link_tag('plugins/bower_components/datatables/jquery.dataTables.min.css');?>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


    <!-- jQuery -->
    <?= script_tag('plugins/bower_components/jquery/dist/jquery.min.js');?>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <?= script_tag('_assets/bootstrap/dist/js/tether.min.js');?>
    <?= script_tag('_assets/bootstrap/dist/js/bootstrap.min.js');?>
    <?= script_tag('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js');?>
    
    <!-- Menu Plugin JavaScript -->
    <?= script_tag('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js');?>
    
    <!--slimscroll JavaScript -->
    <?= script_tag('_assets/js/jquery.slimscroll.js');?>

    <!--Wave Effects -->
    <?= script_tag('_assets/js/waves.js');?>

    <!-- Custom Theme JavaScript -->
    <?= script_tag('_assets/js/custom.min.js');?>
    <?= script_tag('_assets/js/validator.js');?>


    <!-- <?= script_tag('plugins/bower_components/switchery/dist/switchery.min.js');?> -->
    <!-- <?= script_tag('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');?> -->

    <?= script_tag('plugins/bower_components/custom-select/custom-select.min.js');?>
    <?= script_tag('plugins/bower_components/bootstrap-select/bootstrap-select.min.js');?>
    <?= script_tag('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>
    <?= script_tag('plugins/bower_components/multiselect/js/jquery.multi-select.js');?>


    <!--Style Switcher -->
    <?= script_tag('plugins/bower_components/styleswitcher/jQuery.style.switcher.js');?>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
            <?= isset($message) ? $message : '';?>
            <?php echo form_open('', 'class="form-horizontal form-material needs-validation"');?>
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class="form-group ">
                  <div class="col-xs-12">
                    <input class="form-control" name="User_Email" type="text" placeholder="Email Address" required>
                    <div class="invalid-feedback"> * Please input an email address. </div>
                    <div class="form-text text-warning"> <?=form_error('username');?> </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <input class="form-control" name="User_Password" type="password" placeholder="Password" required>
                    <div class="invalid-feedback"> * Please input a Password. </div>
                    <div class="form-text text-warning"> <?=form_error('password');?> </div>
                  </div>
                </div>
                <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                  </div>
                </div>
                <div class="form-group m-b-0">
                  <div class="col-sm-12 text-center">
                    <!-- <p>Don't have an account? <a href="<?=site_url('home/register');?>" class="text-primary m-l-5"><b>Sign Up</b></a></p> -->
                  </div>
                </div>
              </form>
            <?php echo form_close(); ?>
            </div>
        </div>
    </section>
 
</body>

</html>
