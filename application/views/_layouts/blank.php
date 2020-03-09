<?php 
    $new_job = $this->db->where('Status_ID', '1')->get('sv_register')->num_rows(); 
    $assign = $this->db->where('Status_ID', '2')->get('sv_register')->num_rows(); 
    $quotation = $this->db->where('Status_ID', '3')->get('sv_register')->num_rows(); 
    $completed = $this->db->where('Status_ID', '4')->get('sv_register')->num_rows(); 
    $close_job = $this->db->where('Status_ID', '5')->get('sv_register')->num_rows(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('plugins/images/favicon.png')?>">
    <title>Services</title>
    <!-- Bootstrap Core CSS -->
    <?= link_tag('_assets/bootstrap/dist/css/bootstrap.min.css');?>
    <?= link_tag('_assets/css/main.css');?>
    <?= link_tag('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css');?>
    <!-- Menu CSS -->
    <?= link_tag('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css');?>
    <!-- vector map CSS -->
    <?= link_tag('plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css');?>
    <?= link_tag('plugins/bower_components/css-chart/css-chart.css');?>
    <!-- animation CSS -->
    <?= link_tag('_assets/css/animate.css');?>
    <!-- Custom CSS -->
    <?= link_tag('_assets/css/style.css');?>
    <!-- color CSS -->
    <?= link_tag('_assets/css/colors/default.css');?>

    <!-- page -->
    <?= link_tag('plugins/bower_components/multiselect/css/multi-select.css');?>

    <!-- Data Table -->
    <?=link_tag('plugins/bower_components/datatables/jquery.dataTables.min.css');?>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Tag -->
    <?=link_tag('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css');?>

    
    <?= link_tag('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>

    <!-- toast CSS -->
    <?= link_tag('plugins/bower_components/toast-master/css/jquery.toast.css');?>

    <!-- toast CSS -->
    <?= link_tag('plugins/bower_components/dropify/dist/css/dropify.min.css');?>

    <!-- jQuery -->
    <?= script_tag('plugins/bower_components/jquery/dist/jquery.min.js');?>

    <!-- jQuery file upload -->
    <?= script_tag('plugins/bower_components/dropify/dist/js/dropify.min.js');?>

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
    
    <!-- Tag -->
    <?= script_tag('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');?>
    <?= script_tag('_assets/js/typeahead.js');?>

    <?= script_tag('plugins/bower_components/moment/moment.js');?>
    <?= script_tag('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>

    <?= script_tag('plugins/bower_components/toast-master/js/jquery.toast.js');?>
    <?= script_tag('_assets/js/toastr.js');?>

    <?= script_tag('plugins/bower_components/blockUI/jquery.blockUI.js');?>



    <!-- <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script> -->
    <!-- <script src="js/toastr.js"></script> -->

  
</head>
<style>
</style>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="#"><b><img src="<?= site_url('plugins/images/eliteadmin-logo.png')?>" alt="home" /></b><span class="hidden-xs"><img src="<?= site_url('plugins/images/eliteadmin-text.png')?>" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                   
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <b class="hidden-xs"><?= $session['User_FName']?> <?= $session['User_LName']?> [<?=$session['Access']['Acc_Name']?>]</b> </a>
                        <ul class="dropdown-menu dropdown-user scale-up">
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li><a href="<?= base_url('home/logout')?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul> 
                        <!-- /.dropdown-user-->
                    </li>
    
                    <!-- <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <!-- <li class="user-pro">
                        <a href="#" class="waves-effect"><span class="hide-menu"> Steve Gection<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>

                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('service_manager')?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i> 
                            <span class="hide-menu">Service Manager 
                                <span class="fa arrow"></span> 
                                <!-- <span class="label label-rouded label-custom pull-right">4</span> -->
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('service_manager/view_order?pro_id=null&Status_ID=1&Regis_Name=')?>">View All Job</a> </li>
                            <li> <a href="<?= base_url('service_manager/create_job')?>">Create Job</a> </li>
                            <li> <a href="<?= base_url('tracking_order/serach_tracking')?>">Tracking Order</a> </li>
                            <li> <a href="<?= base_url('service_manager/check_IVD')?>">Check Invoice</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('call_sheet')?>" class="waves-effect"><i class="fa fa-folder-open fa-fw"></i>
                            <span class="hide-menu">Collection Sheet 
                                <span class="fa arrow"></span> 
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('call_sheet/view_call_sheet')?>">Collection Sheet</a> </li>
                            <li> <a href="<?= base_url('call_sheet/create_call_sheet')?>">Create Collection Sheet</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('delivery_order')?>" class="waves-effect"><i class="fa fa-folder-open fa-fw"></i>
                            <span class="hide-menu">Delivery Order 
                                <span class="fa arrow"></span> 
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('delivery_order/view_delivery_order')?>">Delivery Order</a> </li>
                            <li> <a href="<?= base_url('delivery_order/create_delivery_order')?>">Create Delivery Order</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('quotation')?>" class="waves-effect"><i class="fa fa-folder-open fa-fw"></i> 
                            <span class="hide-menu">Quotation 
                                <span class="fa arrow"></span> 
                                <!-- <span class="label label-rouded label-custom pull-right">4</span> -->
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <!-- <li><?= base_url('service_manager/create_job')?></li> -->
                            <li> <a href="<?= base_url('quotation/view_all_quotation')?>">View Quotation</a> </li>
                            <li> <a href="<?= base_url('quotation/create_quotation')?>">Create Quotation</a> </li>
                        </ul>
                    </li>


                    <li id="menuItem" data-status="technician-samsung"> 
                        <a href="<?= base_url('technician')?>" class="waves-effect"><i class="fa fa-folder-open fa-fw" ></i> 
                            <span class="hide-menu">Samsung
                                <span class="fa arrow"></span> 
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('technician/view_job_samsung')?>">Samsung Job</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="technician-non-samsung"> 
                        <a href="<?= base_url('non_samsung')?>" class="waves-effect"><i class="fa fa-folder-open fa-fw" ></i> 
                            <span class="hide-menu">Non Samsung
                                <span class="fa arrow"></span> 
                                <!-- <span class="label label-rouded label-custom pull-right">4</span> -->
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('non_samsung/view_job_nonsamsung')?>">Non-Samsung Job</a> </li>
                            <li id="menuItem" data-status="technician"> <a href="<?= base_url('non_samsung/order_call')?>">Manage Order Call</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager" class="nav-small-cap">--- Import</li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('import')?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i> 
                            <span class="hide-menu">Import
                                <span class="fa arrow"></span> 
                                <!-- <span class="label label-rouded label-custom pull-right"><?= $new_job?></span> -->
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('import/import_IVD')?>">Import Invoice</a> </li>
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager" class="nav-small-cap">--- Report</li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a href="<?= base_url('report')?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i> 
                            <span class="hide-menu">Report
                                <span class="fa arrow"></span> 
                                <!-- <span class="label label-rouded label-custom pull-right"><?= $new_job?></span> -->
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url('report/report_job')?>">Report Job</a> </li>
                            <li> <a href="<?= base_url('report/report_quotation')?>">Report Quotation</a> </li>
                            <li> <a href="<?= base_url('report/report_delivery')?>">Report Delivery Order</a> </li>
                            <!-- <li> <a href="<?= base_url('report/report_quotation')?>">Report Quotation</a> </li> -->
                        </ul>
                    </li>

                    <li id="menuItem" data-status="service_manager" class="nav-small-cap">--- Status</li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a target="_blank" href="<?= base_url('service_manager/view_job_status?status=1')?>" class="waves-effect">
                            <span class="hide-menu">New Job
                                <span class="label label-rouded label-danger pull-right"><?= $new_job?></span>
                            </span>
                        </a>
                    </li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a target="_blank" href="<?= base_url('service_manager/view_job_status?status=2')?>" class="waves-effect">
                            <span class="hide-menu">Assign
                                <span class="label label-rouded label-info pull-right"><?= $assign?></span>
                            </span>
                        </a>
                    </li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a target="_blank" href="<?= base_url('service_manager/view_job_status?status=3')?>" class="waves-effect">
                            <span class="hide-menu">Quotation
                                <span class="label label-rouded label-warning pull-right"><?= $quotation?></span>
                            </span>
                        </a>
                    </li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a target="_blank" href="<?= base_url('service_manager/view_job_status?status=4')?>" class="waves-effect">
                            <span class="hide-menu">Completed
                                <span class="label label-rouded label-success pull-right"><?= $completed?></span>
                            </span>
                        </a>
                    </li>
                    <li id="menuItem" data-status="service_manager"> 
                        <a target="_blank" href="<?= base_url('service_manager/view_job_status?status=5')?>" class="waves-effect">
                            <span class="hide-menu">Close Job
                                <span class="label label-rouded label-inverse pull-right"><?= $close_job?></span>
                            </span>
                        </a>
                    </li>
             
                

                   
                    <!-- <li><a href="login.html" class="waves-effect"><i class="zmdi zmdi-power zmdi-hc-fw fa-fw"></i> <span class="hide-menu">Log out</span></a></li> -->
                    <!-- <li class="nav-small-cap">--- Support</li>
                    <li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentation</span></a></li>
                    <li><a href="gallery.html" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Gallery</span></a></li>
                    <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li> -->
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->


        <?=isset($body) ? $body : '

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard 1</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li class="active">Dashboard 1</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Site Visits</h3>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        ';?>

            <!-- <footer class="footer text-center"> 2017 &copy; Elite Admin brought to you by themedesigner.in </footer> -->
        </div>
        <!-- /#wrapper -->
      

</body>
<script>

    var objStatus = {
        id : '<?= $session['Access']['Acc_ID']?>',
        name : '<?= $session['Access']['Acc_Name']?>'
    }

    const checkMenu = (e) =>{
        var selectMenu = document.querySelectorAll('#menuItem');
        selectMenu.forEach(element => {
            element.style.display = "none";
        });

        var menuManager, menuTechnical, menuTechnicalSamsung, menuTechnicalNonSamsung;
        switch (e.id) {
            case '1':
                menuManager = document.querySelectorAll('#menuItem[data-status="service_manager"]');
                menuTechnical = document.querySelectorAll('#menuItem[data-status="technician"]');
                menuTechnicalNonSamsung = document.querySelectorAll('#menuItem[data-status="technician-non-samsung"]');
                menuTechnicalSamsung = document.querySelectorAll('#menuItem[data-status="technician-samsung"]');
                break;
            case '2':
                menuManager = document.querySelectorAll('#menuItem[data-status="service_manager"]');
                break;
            case '3':
                menuTechnical = document.querySelectorAll('#menuItem[data-status="technician"]');
                menuTechnicalNonSamsung = document.querySelectorAll('#menuItem[data-status="technician-non-samsung"]');
                menuTechnicalSamsung = document.querySelectorAll('#menuItem[data-status="technician-samsung"]');
                break;
            case '4':
                menuTechnicalNonSamsung = document.querySelectorAll('#menuItem[data-status="technician-non-samsung"]');
                break;
            case '5':
                menuTechnicalSamsung = document.querySelectorAll('#menuItem[data-status="technician-samsung"]');
                break;
            
                
            default:
                break;
        }
        
        menuManager ?  menuManager.forEach(element => {
            element.style.display = "block";
        }) : '' ;

        menuTechnical ? menuTechnical.forEach(element => {
            element.style.display = "block";
        }) : '';

        menuTechnicalNonSamsung ? menuTechnicalNonSamsung.forEach(element => {
            element.style.display = "block";
        }) : '';

        menuTechnicalSamsung ? menuTechnicalSamsung.forEach(element => {
            element.style.display = "block";
        }) : '';

    }

    checkMenu(objStatus);


</script>

</html>
