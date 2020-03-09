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
        body{
            font-family: "Tahoma", sans-serif;
            font-size:12px;
        }
            p{
                font-size: 11px;
                font-family: "Tahoma", sans-serif;
                margin: 0;
                font-weight:300;
            }
            h1,h2,h3,h4,h5{
                font-family: "Tahoma", sans-serif;
                margin:10px 0 0;
            }
            .underline{
                text-decoration: underline;
            }
            .strong{
                font-weight: bold;
                
            }
            .warptext{
                padding:10px 0 20px;
            }

            .warptext p{
                color:#002060;
                font-size:9px;
            }
            tr th{padding:2px 5px; text-align:right; background:#ccc;}
            tr td{padding:2px 5px;}
            .line-header{margin:10px 0 0; padding:0;}
            .text-center {text-align:center;}
            .text-right {text-align:right;}
            .text-left {text-align:left;}
            .signature tr td>p{padding:20px 0; }
            .list{border-collapse: collapse;}
            .list td, .list th, .list tr {
                    border: 1px solid black;

                    border-bottom: 1px solid black;
            }
        </style>
        <table width="100%">
            <tr>
                <td width="90px"><img src="<?= FCPATH.'_assets/images/400dpiLogo.jpg'?>"  alt="" width="65px"></td>
                <td>
                        <p class="strong">DATABAR Company Limited</p>
                        <p>CRYSTAL DESIGN CENTER (CDC), L2 Building, 2FL.,Room no.202-208, 1448/15 Praditmanuthum Rd.,<br> Klongjan, Bangkapi, Bangkok 10240 THAILAND.<br>
                        T: +66 (0) 2 102-2591 (Auto), F: +66 (0) 2 102-2590<br>
                        W: <span class="underline">www.databar.co.th</span> E: <span class="underline">sale@databar.co.th</span>; <span class="underline">services@databar.co.th</span></p>
                </td>
            </tr>
        </table>

        <hr class="line-header">
        <h2 class="text-center">ใบรับซ่อมสินค้า</h2>
        <table width="100%">
            <tr>
                <td colspan="2"><p><span class="strong">Service Contact</span></p></td>
                <td></td>
                <td><p><i> *ส่วนลูกค้า</i></p></td>
            </tr>
            <tr>
                <td width="50px"><p>Mobile:</p></td>
                <td><p><?= $detail['Call_Phone'];?></p></td>
                <td class="text-right"><p>Date:</p></td>
                <td width="130px"><p><?= date('d-M-Y', strtotime($detail['Call_DateTime']));?></p></td>
            </tr>
            <tr>
                <td><p>Email:</p></td>
                <td><p><span ><?= $detail['Call_Email'];?></span></p></td>
                <td class="text-right"><p>Authority:</p></td>
                <td><p><?= $detail['Call_Prepare'];?></p></td>
            </tr>
        </table>
        <table width="100%" class="list" cellpadding="0" cellspacing="0">
            <tr>
                <th colspan="3">เลขที่ใบรับซ่อม: <?= $detail['Call_No'];?></th>
             
            </tr>
            <tr>
                <td colspan="3">ชื่อบริษัท: <?= $detail['Call_Company'];?></td>
                
            </tr>
            <tr>
                <td colspan="3">ที่อยู่: <?= $detail['Call_Address'];?></td>
                
            </tr>
            <tr>
                <td colspan="2">ชื่อลูกค้า: <?= $detail['Call_Contact'];?></td>
                <td width="300px">เบอร์ติดต่อ: <?= $detail['Call_Phone_Customer'];?></td>
            </tr>
            <tr>
                <td colspan="2">รายการที่ส่งซ่อม: <?= $detail['Call_Product_List'];?></td>
                <!-- <td></td> -->
                <td>ยี่ห้อ:  <?= $detail['Call_Brand'];?></td>
            </tr>
            <tr>
                <td colspan="3">หมายเลขS/N: <?= $detail['Call_Serial'];?></td>
            </tr>
            <tr>
                <td colspan="3">อาการที่พบ: <?= $detail['Call_Out_Of_Order'];?></td>
            </tr>
            <tr>
                <td colspan="3">หมายเหตุ: <?= $detail['Call_Note'];?></td>
            </tr>
        </table> <br>
        <table width="100%" class="signature" style="padding-top:20px;">
            <tr>
                <td width="50px"></td>
                <td><p>ลงชื่อ .................................... ผู้ส่งซ่อม</p> <br>
                <p>วันที่ ........../............../............</p></td>
                <td>
                <p>ลงชื่อ .................................... ผู้รับซ่อมสินค้า</p> <br>
                <p>วันที่ ........../............../............</p>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <hr>
        <br>
        <table width="100%" style="padding-top:30px;">
            <tr>
                <td width="90px"><img src="<?= FCPATH.'_assets/images/400dpiLogo.jpg'?>" alt="" width="65px"></td>
                <td>
                        <p class="strong">DATABAR Company Limited</p>
                        <p>CRYSTAL DESIGN CENTER (CDC), L2 Building, 2FL.,Room no.202-208, 1448/15 Praditmanuthum Rd.,<br> Klongjan, Bangkapi, Bangkok 10240 THAILAND.<br>
                        T: +66 (0) 2 102-2591 (Auto), F: +66 (0) 2 102-2590<br>
                        W: <span class="underline">www.databar.co.th</span> E: <span class="underline">sale@databar.co.th</span>; <span class="underline">services@databar.co.th</span></p>
                </td>
            </tr>
        </table>

        <hr class="line-header">
        <h2 class="text-center">ใบรับซ่อมสินค้า</h2>
        <table width="100%">
            <tr>
                <td colspan="2"><p><span class="strong">Service Contact</span></p></td>
                <td></td>
                <td><p><i> *ส่วนบริษัท</i></p></td>
            </tr>
            <tr>
                <td width="50px"><p>Mobile:</p></td>
                <td><p><?= $detail['Call_Phone'];?></p></td>
                <td class="text-right"><p>Date:</p></td>
                <td width="130px"><p><?= date('d-M-Y', strtotime($detail['Call_DateTime']));?></p></td>
            </tr>
            <tr>
                <td><p>Email:</p></td>
                <td><p><span ><?= $detail['Call_Email'];?></span></p></td>
                <td class="text-right"><p>Authority:</p></td>
                <td><p><?= $detail['Call_Prepare'];?></p></td>
            </tr>
        </table>
        <table width="100%" class="list" cellpadding="0" cellspacing="0">
            <tr>
                <th colspan="3">เลขที่ใบรับซ่อม: <?= $detail['Call_No'];?></th>
             
            </tr>
            <tr>
                <td colspan="3">ชื่อบริษัท: <?= $detail['Call_Company'];?></td>
                
            </tr>
            <tr>
                <td colspan="3">ที่อยู่: <?= $detail['Call_Address'];?></td>
                
            </tr>
            <tr>
                <td colspan="2">ชื่อลูกค้า: <?= $detail['Call_Contact'];?></td>
                <td width="300px">เบอร์ติดต่อ: <?= $detail['Call_Phone_Customer'];?></td>
            </tr>
            <tr>
                <td colspan="2">รายการที่ส่งซ่อม: <?= $detail['Call_Product_List'];?></td>
                <!-- <td></td> -->
                <td>ยี่ห้อ:  <?= $detail['Call_Brand'];?></td>
            </tr>
            <tr>
                <td colspan="3">หมายเลขS/N: <?= $detail['Call_Serial'];?></td>
            </tr>
            <tr>
                <td colspan="3">อาการที่พบ: <?= $detail['Call_Out_Of_Order'];?></td>
            </tr>
            <tr>
                <td colspan="3">หมายเหตุ: <?= $detail['Call_Note'];?></td>
            </tr>
        </table> <br>
        <table width="100%" class="signature" style="padding-top:20px;">
            <tr>
                <td width="50px"></td>
                <td><p>ลงชื่อ .................................... ผู้ส่งซ่อม</p> <br>
                <p>วันที่ ........../............../............</p></td>
                <td>
                <p>ลงชื่อ .................................... ผู้รับซ่อมสินค้า</p> <br>
                <p>วันที่ ........../............../............</p>
                </td>
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