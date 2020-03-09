<!-- Page Content -->

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">View Detail</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
				<ol class="breadcrumb">
					<li><a href="<?= base_url('')?>">index</a></li>
					<li class="active">View Detail</li>
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
			<div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Search order
                        <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                    </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            <?= form_open('',array('class'=>'needs-validation','novalidate'=>TRUE,'data-toggle'=>'validator', 'method'=>'get'))?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pro_id" class="col-form-label">Type Order</label>
                                        <select class="form-control" name="pro_id" placeholder="Type Order" required onChange="handleChangeType(this)">
                                            <option value="" selected disabled hidden>Choose Type Order</option>
                                            <option value="null">All</option>
                                            <option value="1">Samsung</option>
                                            <option value="2">Non-Samsung</option>
                                            
                                        </select>
                                        <small class="form-text text-muted">This field is required.</small>
                                        <small class="form-text text-warning"><?=form_error('pro_id');?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <!-- <div class="input-group mb-2"> -->
                                        <label for="prd_id" class="col-form-label">Date Range</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk-date" type="checkbox" onClick="handleCheckDate()" aria-label="Checkbox for following text input" >
                                                </span>
                                                <input type="text" class="form-control" name="date-range" data-date="date-range" value="<?= date('d m Y')?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="Regis_Name" class="col-form-label">Customer Name</label>
                                    <select id="chosen-customer" class="form-control" name="Regis_Name" placeholder="Customer Name" required>
                                        <option value="" selected disabled hidden>Choose Customer</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="prd_id" class="col-form-label">Status</label>
                                    <select id="chosen-status" class="form-control" name="Status_ID" placeholder="Status" required>
                                        <option value="" selected disabled hidden>Choose Status</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" id="submit" class="btn btn-success">Search</button>
                            </div>
                            <?= form_close();?>
                    </div>
                    <div class="panel-footer"> Form Search </div>
                </div>
            </div>
        </div>
    </div>
    <?= isset($page_view) ? $page_view : ''?>
    </div>
</div>


<?=link_tag('vendor/harvesthq/chosen/chosen.css');?>
<?=script_tag('vendor/harvesthq/chosen/chosen.jquery.min.js');?>
<script>

    $('#chosen-customer').chosen();
    $('#chosen-status').chosen();
    

    const selectAuto = () => {
        let url = window.location.href;
        url = new URL(url);
        let pro_id = url.searchParams.get('pro_id');
        let name = url.searchParams.get('Regis_Name');
        let status = url.searchParams.get('Status_ID');
        if (window.location.search != '')
        {
            e = {value : pro_id};
            ajaxCustomer(e);
            ajaxStatus(e);
            $('select[name="pro_id"]').val(pro_id);
        }
    }
    // $('select[name="pro_id"]').change();

    const handleCheckDate = () =>{
        if ($('#chk-date').is(':checked') === true)
        {
            $('input[data-date="date-range"]').prop('disabled', false);
        }
        else
        {
            $('input[data-date="date-range"]').prop('disabled', true);
        }
    }
    // const handdleChange
    const handleChangeType = (e) => {
        ajaxCustomer(e);
        ajaxStatus(e);
    }

    const ajaxStatus = (e) =>{
        var request = new XMLHttpRequest();
        var url = '<?= base_url('service_manager/ajax_status?pro_id=')?>'+e.value;
        request.open('GET', url, true);
        request.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                var data = JSON.parse(this.response);
                let option = '<option value="" selected>All</option>';
                data.forEach(res => {
                    option += '<option value="'+res.Status_ID+'">'+res.Status_Name+'</option>';
                });

                $('#chosen-status').html(option);
                $('#chosen-status').trigger("chosen:updated");

            } else {

            }
        };
        request.send();
    }

    const ajaxCustomer = (e) =>{
        var request = new XMLHttpRequest();
        var url = '<?= base_url('service_manager/ajax_customer?pro_id=')?>'+e.value;
        request.open('GET', url, true);
        request.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                var data = JSON.parse(this.response);
                let option = '<option value="" selected>All</option>';
                data.forEach(res => {
                    option += '<option value="'+res.Regis_Name+'">'+res.Regis_Name+'</option>';
                });

                $('#chosen-customer').html(option);
                $('#chosen-customer').trigger("chosen:updated");

            } else {

            }
        };
        request.send();
    }

    $('input[data-date="date-range"]').daterangepicker({
        locale: {
            format: 'DD MMM YYYY'
        }
    });

    selectAuto();
</script>
