<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <th width="10px">Check</th>
                        <th>No.</th>
                        <th>Date</th>
                        <th width="70px">Status</th>
                        <th width="10px">link</th>
                    </thead>
                    <tbody>
                        <?php foreach ($imei as $key => $item) { ?>
                        <tr>
                            <td class="text-center">
                                <input class="custom-checkbox" type="radio" name="radio" value="<?= $item['Regis_SubID']?>" onClick="handleClick(this)">
                            </td>
                            <td><?= $item['Regis_SubID']?></td>
                            <td><?= date('d M Y', strtotime($item['Regis_Date']));?></td>
                            <td class="color<?= $item['Status_ID']?>"><?= $item['Status_Name']?></td>
                            <td class="text-center"><a target="_blank" href="<?= base_url('service_manager/edit_job/'.$item['Regis_SubID'])?>"><i class="fa fa-external-link link-icon"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div  class="row">
    <div class="col-md-12">
        <div id="timeline-section" class="white-box" style="display:none">
            <h3 class="box-title">Timeline Tracking</h3>
            <hr>
            <ul class="my-timeline">
                <li>
                    <div class="timeline-badge"> <i class="fa fa-check"></i> </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">New Job</h4>
                            <p class="text-muted"><small id="newjob_date"> </small> </p>
                        </div>
                        <div class="timeline-body">

                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><i class="fa fa-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Assign</h4>
                            <p class="text-muted"><small id="assign_date"> </small> </p>
                        </div>
                        <div class="timeline-body">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><i class="fa fa-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 id="reject-title" class="timeline-title">Quotation</h4>
                            <p class="text-muted"> <small id="quotation_date"> </small> </p>
                        </div>
                        <div class="timeline-body">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><i class="fa fa-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Repair Complete</h4>
                            <p class="text-muted"> <small id="repair_complete_date"> </small> </p>
                        </div>
                        <div class="timeline-body">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><i class="fa fa-check"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Close Job</h4>
                            <p class="text-muted"><small id="closejob_date"> </small> </p>
                        </div>
                        <div class="timeline-body">
                        </div>
                    </div>
                </li>
            </ul>
            <hr>
            
            <h3 class="box-title">Delivery Order</h3>
            <div id="delivery_order" class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Imei / Serial</th>
                            <th>Date</th>
                            <th width="10px">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- AJAX QUERY DATA -->
                    </tbody>
                </table>
            </div>
            
            <!-- .row -->
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>
            <!-- .row -->
        </div>
    </div>
</div>

<script>



function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

function handleClick (e) {
    $('div.timeline-panel').block({
            message: null,
            overlayCSS: {
                backgroundColor: '#eee'
            },
            css: {
                border: '1px solid #fff'
            }
    });
    var value = e.getAttribute('value');
    var request = new XMLHttpRequest();
    var url = '<?= base_url('tracking_order/ajax_tracking_order');?>/'+value;
    request.open('GET', url, true);
    request.onload = function() {
    if (this.status >= 200 && this.status < 400) {
        var status, count = 0, html = [];
        // Success!
        var data = JSON.parse(this.response);
        console.log(data);
        
        // Check NewJob != ''
        if (!isEmpty(data.newjob)){
            // Status New Job
            status = 1;
            $('#newjob_date').html('<i class="fa fa-clock-o"></i> ' + data.newjob.Regis_Date);
            html[0] = '<p> Customer Defect : '+ data.newjob.Regis_Order+'</p>'

            // Check Assign != ''
            if (!isEmpty(data.assign.status))
            {
                // Status Assign
                status = 2;
                html[1] = '<p> Symptom : ';
                data.assign.symptom.forEach(element => {
                    html[1] += ' '+ element.SSymp_Name +',';
                });
                html[1] += '<p> By : '+ data.assign.status.User_FName + ' ' + data.assign.status.User_LName +'</p>';
                $('#assign_date').html('<i class="fa fa-clock-o"></i> ' + data.assign.status.Schange_Date_Create);
            }else{
                html[1] = '';
                $('#assign_date').html('');
            }
            // Check Quotation != ''
            if (!isEmpty(data.quotation.status))
            {
                // Status Quotation
                status = 3;
                html[2] = '<p> Remark : '+ data.quotation.status.Schange_Remark +'</p>' 
                html[2] += '<p> By : '+ data.quotation.status.User_FName + ' ' + data.quotation.status.User_LName +'</p>' 
                $('#quotation_date').html('<i class="fa fa-clock-o"></i> ' + data.quotation.status.Schange_Date_Create);
            }else{
                html[2] = '';
                $('#quotation_date').html('');

            }
            // Check Status Job = Reject 
            if (data.newjob.Status_ID === '6'){
                status = 3;
                html[2] = '';
                document.getElementById('reject-title').innerHTML = 'Reject';
            }

            // Check Repaircomplete != ''
            if (!isEmpty(data.repaircomplete.status))
            {
                // Status Completed
                status = 4;
                html[3] = '<p> Remark : '+ data.repaircomplete.status.Schange_Remark +'</p>' 
                html[3] += '<p> By : '+ data.repaircomplete.status.User_FName + ' ' + data.repaircomplete.status.User_LName +'</p>' 
                $('#repair_complete_date').html('<i class="fa fa-clock-o"></i> ' + data.repaircomplete.status.Schange_Date_Create);
            }else{
                html[3] = '';
                $('#repair_complete_date').html('');
            }
            // Check Closejob != ''
            if (!isEmpty(data.closejob.status))
            {
                // Status Closejob
                status = 5;
                html[4] = '<p> Remark : '+ data.closejob.status.Schange_Remark +'</p>' 
                html[4] += '<p> By : '+ data.closejob.status.User_FName + ' ' + data.closejob.status.User_LName +'</p>' 
                $('#closejob_date').html('<i class="fa fa-clock-o"></i> ' + data.closejob.status.Schange_Date_Create);
            }else{
                html[4] = '';
                $('#closejob_date').html('');

            }

            // Function Alert เมื่อไม่ได้มีการเก็บ Record ของ Status ไว้
            checkStatus(data.newjob.Status_ID, status);

            // Select div timeline-badge & body
            var timeline = document.getElementsByClassName('timeline-badge');
            var timelineBody = document.getElementsByClassName('timeline-body');

            //  Remove All Status
            for (let index = 0; index < timeline.length; index++) {
                timeline[index].classList.remove('success');
                timeline[index].classList.remove('wait');
            }

            // Add Class Success
            for (var index = 0; index < status; index++) {
                timeline[index].classList.add('success');
                timelineBody[index].innerHTML = html[index];
                $('div.timeline-panel').eq(index).unblock();
            }

            // Change Status Other To Wait 
            if (status < timeline.length )
            {
                timeline[index].classList.add('wait');
            }

            // Status == Reject Deleted Wait
            if (data.newjob.Status_ID === '6')
            {
                timeline[index].classList.remove('wait');
            }

            // Status != Assign AND Status != Reject 
            if (data.newjob.Status_ID !== '2' && data.newjob.Status_ID !== '6')
            {
            // Quotation as null
                if (isEmpty(data.quotation.status))
                {
                    timeline[2].classList.remove('success');
                    $('div.timeline-panel').eq(2).block({
                        message: null,
                        overlayCSS: {
                            backgroundColor: '#eee'
                        },
                        css: {
                            border: '1px solid #fff'
                        }
                    });
                }
            }
            
            tableDelivery(data.delivery);

            document.getElementById('timeline-section').style.display = 'block';

        }
        // var data = this.response;
    } else {
        // We reached our target server, but it returned an error
    }
    };
    request.onerror = function() {};
    request.send();
}

function tableDelivery (req) {
    var baseURL = '<?= base_url('delivery_order/delivery_order_list/')?>'; // String URL Text
    var tbody = '';
    if (!isEmpty(req)){
        req.forEach(element => {
            tbody += '<tr>';
                tbody += '<td>'+ element.Deli_No+ '</td>';
                tbody += '<td>'+ element.Dsub_Imei+ '</td>';
                tbody += '<td>'+ element.Deli_Date+ '</td>';
                tbody += '<td class="text-center">';
                tbody += '<a target="_blank" href="'+ baseURL + element.Deli_No +'">';
                    tbody += '<i class="fa fa-external-link link-icon"></i>';
                tbody += '</a>';
                tbody += '</td>';
            tbody += '</tr>';
        });
    }else{
        tbody += '<tr>';
                tbody += '<td class="text-center" colspan="4"> No Data</td>';
        tbody += '</tr>';
    }

    // Table Delivery Order
    $('#delivery_order tbody').html(tbody);
}

function checkStatus (status, timeline) {
    if (status === '5' || status ==='6')
    {
        if (status !== '6')
        {
            if (timeline !== 5 || timeline !== 6)
            {
                alert('รายการนี้เก็บRecord ไว้ในฐานข้อมูลไม่ครบถ้วน');
            }
        }
    }
    return true;

}

</script>

<style>

.link-icon{
    font-size:16px;
}
.my-timeline {
    position: relative;
    padding: 20px 0;
    list-style: none;
    max-width: 1200px;
    margin: 0 auto
}
/* ul.my-timeline:before {
        left: 40px
    } */

.my-timeline:before {
    content: " ";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 40px;
    width: 3px;
    margin-left: -1.5px;
    background-color: #eee
}

.my-timeline>li {
    position: relative;
    margin-bottom: 20px
}

.my-timeline>li:after,
.my-timeline>li:before {
    content: " ";
    display: table
}

.my-timeline>li:after {
    clear: both
}

.my-timeline>li>.timeline-panel {
    float: right;
    position: relative;
    width: calc(100% - 90px);
    padding: 20px;
    border: 1px solid rgba(120, 130, 140, .13);
    border-radius: 2px;
    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 6px rgba(0, 0, 0, .05)
}

.my-timeline>li>.timeline-panel:before {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 26px;

    right: auto;
    left: -15px;

    border-top: 8px solid transparent;
    border-right: 15px solid rgba(120, 130, 140, .13);
    border-bottom: 8px solid transparent;
    border-left: 0 solid rgba(120, 130, 140, .13)
}

.my-timeline>li>.timeline-panel:after {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 27px;
    right: auto;
    left: -14px;
    border-top: 7px solid transparent;
    border-right: 15px solid #fff;
    border-bottom: 7px solid transparent;
    border-left: 0px solid #fff
}

.my-timeline>li>.timeline-badge {
    
    z-index: 100;
    position: absolute;
    top: 16px;
    left: 15px;
    margin-left: 0;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-align: center;
    font-size: 1.4em;
    line-height: 50px;
    color: #fff;
    overflow: hidden;
    background-color: #eee;
}

.my-timeline>li.timeline-inverted>.timeline-panel {
    float: right
}

.my-timeline>li.timeline-inverted>.timeline-panel:before {
    right: auto;
    left: -8px;
    border-right-width: 8px;
    border-left-width: 0
}

.my-timeline>li.timeline-inverted>.timeline-panel:after {
    right: auto;
    left: -7px;
    border-right-width: 7px;
    border-left-width: 0
}

.timeline-badge.primary {
    background-color: #ab8ce4!important
}

.timeline-badge.secondary {
    background-color: #ab8ce4!important
}

.timeline-badge.success {
    background-color: #00c292!important
}

.timeline-badge.warning {
    background-color: #fec107!important
}

.timeline-badge.danger {
    background-color: #fb9678!important
}

.timeline-badge.info {
    background-color: #03a9f3!important
}

.timeline-badge.wait {
    background-color: #eee !important;
    border: 2px dashed #03a9f3;
    color: #03a9f3 !important;

}

.timeline-title {
    margin-top: 0;
    color: inherit;
    font-weight: 400
}

.timeline-body>p,
.timeline-body>ul {
    margin-bottom: 0
}

.timeline-body>p+p {
    margin-top: 5px
}

@media (max-width:767px) {
    
    ul.my-timeline>li>.timeline-panel:before {
        right: auto;
        left: -15px;
        border-right-width: 15px;
        border-left-width: 0;
    }
    ul.my-timeline>li>.timeline-panel:after {
        right: auto;
        left: -14px;
        border-right-width: 14px;
        border-left-width: 0
    }
}

</style>
