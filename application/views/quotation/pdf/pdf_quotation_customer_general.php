<?php 
    require_once(FCPATH.'vendor/autoload.php');
    include site_url('');
    $mpdf = new \Mpdf\Mpdf(
        [
            'format' => 'A4',
            'margin_top' => 10,
            'margin_left' => 15,
            'debug' => true,
            'margin_right' => 15,
            'mirrorMargins' => true,
            'default_font' => 'tahoma'
        ]
    );
?>
<html>
    <head>
        <title></title>
        
    </head>
    <body>
    <style>
        .header-pdf{
            width: 100%;
            background: #002060;
            color: #fff;
            text-align: center;
        }
        .text-signature{
            background: #002060;
            color: #fff;
            text-align: center;
        }
        .menu-total{
            color:#1F4E78;
        }
        .note{
            font-size: 7.5px;
        }
        p{
            font-size: 8px;
            font-family: "Tahoma", sans-serif;
            margin: 0;
            font-weight:300;
        }
        .strong{
            font-weight: bold;
            
        }
        h2{
            font-size:20px;
            margin:0px;
        }
        h1,h3,h4,h5{
            margin:0 0 10px;
            font-family: "Tahoma", sans-serif;
        }
        .title-name {
            color: #002060;
        }
        .title-text{font-size:9px;}
        .text-light{
            font-weight: 300; 
        }
        .warptext{
            padding:10px 0 20px;
        }

        .warptext p{
            color:#002060;
            font-size:8px;
        }
        .box{
            width:100px;
        }
        th{
            background: #A9D08E;
            font-weight:300px;
            padding: 2px 3px;
        }
        #table-list{
            border-collapse: collapse;
        }
    
        #table-list th,#table-list td {
            border: 1px solid #000;
            border-top: 0px;
         }
         #table-list th:nth-child(1),#table-list td:nth-child(1) {
            /* border: 1px solid #000; */
            border-left:0px;
         }
         
         #table-list th:nth-child(8),#table-list td:nth-child(8) {
            /* border: 1px solid #000; */
            border-right:0px;
         }
    
    
         #table-list-sub{
            border-collapse: collapse;
       
        }
        #table-list-sub td{
            border: 0px solid #000;
          
         }
        #table-list-sub td.underline {
         
            border-top: 1px solid #000;
         }

         #table-list2{
            border-collapse: collapse;
            border: 2px solid #000;
            /* border-top: 0px; */
            
        }
        #table-list2 p {
            font-size:10px;
        }
        #signature{
            border-collapse: collapse;
        }
        #table-list2 th, #table-list2 td {
            border: 1px solid #000;
            border-top: 0px;
            
            
         }
         .remark{padding-left:22%; padding-top:1%;}
        .section-table{height:310px; border: 2px solid #000; border-bottom:0px;}
        .pull-left {float:left;}
        .pull-right {float:right;}
        .text-center {text-align:center;}
        .text-right {text-align:right;}
        .text-left {text-align:left;}
        #table_term td {padding:0px;}
        .border2{border: 1.5px solid #000}
        .license{
            font-family: "dancing_scriptregular";
            font-size:25px;

        }
        </style>
        <!-- <img src="<?= site_url('_assets/images/400dpiLogo.jpg')?>" alt="" width="70px"> -->
        <img src="<?= FCPATH;?>_assets/images/400dpiLogo.jpg" alt="" width="70px">
        <div class="warptext">
            <p class="strong">DATABAR Company Limited (Branch 0001)</p>
            <p>1448/15 Crystal Design Center (CDC), L2, 2FL., Room 202, 204, 206, 208, Soi Ladprao 87 (Chandra Suk), Praditmanuthum Rd., Klongjan, Bangkapi, Bangkok 10240 THAILAND.  <br>
            Website: www.databar.co.th   Email: Services@databar.co.th  Phone: +66 (0) 99 286 4709  Fax: +66 (0) 2 102-2590 <br>
            Company registration no. 0105557033628</p>
        </div>
        <div class="header-pdf">
        <h2>Quotation</h2>
        </div>
        <table width="100%">
            <tr>
                <td width="70px"><p class="title-name strong title-text">Customer :</p></td>
                <td><p class="strong title-text"><?= $rs['Quot_Customer']?> </p></td>
                <td width="80px"><p class="title-name text-right strong title-text">Quotation No.:</p></td>
                <td><p><?= $rs['Quot_No']?></p></td>
            </tr>
            <tr>
                <td width="70px"><p class="title-name strong title-text"> Attention :</p></td>
                <td><p class="strong title-text"><?= $rs['Quot_Attention']?></p></td>
                <td width="80px" class="text-right"><p class="title-name strong title-text">Date: </p></td>
                <td><p class="text-light"><?= date('d-M-Y',strtotime($rs['Quot_Date']))?></p></td>
            </tr>
            <tr>
                <td width="70px"></td>
                <td width="450px">
                    <p class="text-light">Address : <?= $rs['Quot_Address']?></p>
                </td>
                <td <?= isset($rs['Quot_Invoice']) ? 'width="80px" class="text-right"' : ''?>><p class="title-name strong title-text"><?= isset($rs['Quot_Invoice']) ? 'Invoice No.:' : ''?></p></td>
                <td><p class="text-light"><?= isset($rs['Quot_Invoice']) ? $rs['Quot_Invoice'] : ''?> </p></td>
            </tr>
            <tr>
                <td width="70px"></td>
                <td width="450px">
                    <p class="text-light">Email: <span class="strong"><?= $rs['Quot_Email']?></span></p>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td width="70px"></td>
                <td width="450px">
                    <p>Phone: <?= $rs['Quot_Phone']?></p>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <p style="padding: 10px 0 0;">We are pleased to provide you and who it may concern for the reasonable quote and commercial term to kindly consider of below;</p>
        <div class="section-table">     
            <table id="table-list" width="100%">
                <tr>
                    <th><p>Item</p></th>
                    <th><p>Model</p></th>
                    <th><p>Imei</p></th>
                    <th><p>Symptom</p></th>
                    <th><p>Description</p></th>
                    <th><p>Qty.</p></th>
                    <th><p>Price(THB)</p></th>
                    <th><p>Amount(THB)</p></th>
                </tr>
                <?php
                    $data = $this->db->where('Quot_No', $rs['Quot_No'])->group_by('Qlist_Imei')->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();

                    foreach ($data as $key => $row) {
                    $rowSpan = $this->db->where('Quot_No', $rs['Quot_No'])->where('Qlist_Imei', $row['Qlist_Imei'])->get('qt_quotation_list')->num_rows();
                    ?>
                    <tr class="text-center">
                        <td rowspan="<?=$rowSpan?>" class="text-center" width="40px"><p><?= ++$key?></p></td>
                        <td rowspan="<?=$rowSpan?>" class="text-center" width="100px"><p><?= $row['Qlist_Model']?></p></td>
                        <td rowspan="<?=$rowSpan?>" class="text-center" width="100px"> <p><?= $row['Qlist_Imei']?></p>
                        <p><?= $row['Qlist_Serial']?></p></td>
                        <?php
                        $data = $this->db->where('Quot_No', $rs['Quot_No'])->where('Qlist_Imei', $row['Qlist_Imei'])->group_by('Qlist_Symptom')->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();
                        $n1=1;
                        foreach ($data as $key => $row) {
                            if($n1>=2){echo '<tr>';}
                            $rowSpan = $this->db->where('Quot_No', $rs['Quot_No'])->where('Qlist_Imei', $row['Qlist_Imei'])->where('Qlist_Symptom', $row['Qlist_Symptom'])->get('qt_quotation_list')->num_rows();
                            ?>
                                <td rowspan="<?=$rowSpan?>"><p><?=$row['Qlist_Symptom']?></p></td>
                            <?php
                            $n1++;
                            $data = $this->db->where('Quot_No', $rs['Quot_No'])->where('Qlist_Imei', $row['Qlist_Imei'])->where('Qlist_Symptom', $row['Qlist_Symptom'])->order_by('Qlist_ID', 'ASC')->get('qt_quotation_list')->result_array();
                            $n2=1;
                            foreach ($data as $key => $row) {
                                if($n2>=2){echo '<tr>';}
                                $row['Qlist_Price'] = number_format($row['Qlist_Price'],2,'.',',');
                                $row['Qlist_Amount'] = number_format($row['Qlist_Amount'],2,'.',',');
                                ?>
                                    <td><p><?=$row['Qlist_Description']?></p></td>
                                    <td align="center" width="10px"><p><?=$row['Qlist_Qty']?></p></td>
                                    <td align="right" width="75px"><p><?=$row['Qlist_Price']?></p></td>
                                    <td align="right" width="75px"><p><?=$row['Qlist_Amount']?></p></td>
                                </tr>
                            <?php
                            $n2++;
                            }
                        }
                    }
                    ?>
            </table>
            <div class="remark">
                    <p><?=str_replace("\n",'',nl2br($rs['Quot_Remark']))?></p>
                </div>
        </div>
        <?php #
        $rs['Quot_Discount'] = number_format($rs['Quot_Discount'],2,'.',',');
        $rs['Quot_Total'] = number_format($rs['Quot_Total'],2,'.',',');
        $rs['Quot_Vat'] = number_format($rs['Quot_Vat'],2,'.',',');
        $rs['Quot_Grandtotal'] = number_format($rs['Quot_Grandtotal'],2,'.',',');
        ?>
        <table id="table-list2" width="100%">
            <tr class="text-center">
                <td rowspan="4" class="text-center" width="100px"><p> จำนวนเงินตัวอักษร </p></td>
                <td rowspan="4" class="text-center" width="500px"><p class="strong"><?=$rs['Quot_Grandtotal_TH']?></p></td>
                <td class="text-right menu-total strong" width="80px"><p>Total</p></td>
                <td class="text-right" width="75px"><p class="strong"><?=$rs['Quot_Total']?></p></td>
            </tr>
            <tr class="text-center">
                <td class="text-right menu-total strong"><p>VAT 7%</p></td>
                <td class="text-right"><p class="strong"><?=$rs['Quot_Vat']?></p></td>
            </tr>
            <tr class="text-center">
                <td class="text-right menu-total strong"><p>Grand Total</p></td>
                <td class="text-right"><p class="strong"><?=$rs['Quot_Grandtotal']?></p></td>
            </tr>
        </table>

        <table id="table_term" width="100%" style="padding-top:5px;">
            <tr>
                <td valign="top" width="70px"><p class="title-name strong title-text">Remark:</p></td>
                <td>
                    <p class="note">ในกรณีที่ตกลงซ่อมให้โอนเงินเข้าบัญชี บริษัทดาต้าบาร์ จำกัด ธนาคารไทยพาณิช จำกัด (มหาชน) สาขา ลาดพร้าว ซอย 71 บัญชีกระแสรายวัน เลขที่ 2533005115  <br>
                    หลังจากโอนเรียบร้อยแล้วส่ง Mail ยืนยันหรือโทรแจ้งได้ที่เบอร์ 099-2874709 Fax : 02-1022591</p>
                    <p>&nbsp;</p>
                    <p class="note">ที่อยู่ในการส่งเอกสาร</p>
                    <p class="note">-    บริษัท ดาต้าบาร์ จำกัด (สาขา 0001)</p>
                    <p class="note">คริสตัล ดีไซน์ เซ็นเตอร์, แอล 2, ชั้นที่ 2, ห้องเลขที่ 202,204,206,208</p>
                    <p class="note">1448/15 ซอยลาดพร้าว 87 (จันทราสุข) ถนนประดิษฐ์มนูธรรม</p>
                    <p class="note">แขวงคลองจั่น เขตบางกะปิ กรุงเทพมหานคร 10240</p>
                </td>
            </tr>
        </table>
          
        
        <table id="table_term" width="100%" style="padding-top:5px;">
            <tr>
                <td width="100px"><p class="title-name strong title-text">Commercial Term:</p></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-right" ><p>Delivery Time:</p></td>
                <td><p><?= $comm['Comm_Delivery']?></p></td>
            </tr>
            <tr>
                <td class="text-right" ><p>Price Validity:</p></td>
                <td><p><?= $comm['Comm_Validity']?></p></td>
            </tr>
            <tr>
                <td class="text-right" ><p>Term of Warranty:</p></td>
                <td><p><?= $comm['Comm_Warranty']?></p></td>
            </tr>
        </table>

        <table id="signature" class="text-center" width="100%" style="margin-top:20px">
            <tr>
                <td class="border2 text-signature" width="300px"><p class="strong title-text">BUYER</p></td>
                <td></td>
                <td class="border2 text-signature" width="300px"><p class="strong title-text">SERVICES</p></td>
                <td width="50px"></td>
            </tr>
            <tr>
                <td class="border2"><p>Confirmed and Accepted by:</p></td>
                <td></td>
                <td class="border2"><p>DATABAR Company Limited</p></td>
            </tr>
            <?php
            if($rs['Quot_User_Create'] != ''){
                $name_text = explode(" ", $rs['Quot_User_Create']);
                $first_name = $name_text[0];
                $last_name_full = $name_text[1];
                $last_name = substr($name_text[1], 0, 1);
                $full_name = $first_name.' '.$last_name.'.';
                if ($name_text[1] == '')
                {
                    $last_name_full = $name_text[2];
                    $last_name = substr($name_text[2], 0, 1);
                    $full_name = $first_name.' '.$last_name.'.';
                }
            }else{
                $first_name = '';
                $last_name_full = '';
            }
            ?>
            <tr>
                <td class="border2"><br><br><br></td>
                <td></td>
                <td class="border2"><span class="license"><?= isset($full_name) ? $full_name : '';?></span></td>
            </tr>
            <tr>
                <td class="border2"><p>Full name</p></td>
                <td></td>
                <td class="border2"><p>Repair Services</p></td>
            </tr>
            <tr>
                <td class="border2"><p>Date / Month / Year</p></td>
                <td></td>
                <?php 
                    $rs2 =$this->db->where('User_FName', $first_name)->where('User_LName', $last_name_full)->get('sv_user')->row_array();
            
                ?>
                <td class="border2"><p><?= isset($rs2['User_Phone']) ? $rs2['User_Phone'] : '099 287 4709';?></p></td>
            </tr>
        </table>

    </body>
</html>

<?php 
        $html = ob_get_contents();
        ob_end_clean();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        ?>