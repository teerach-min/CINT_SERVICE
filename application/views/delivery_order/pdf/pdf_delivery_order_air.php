<?php
    require_once(FCPATH.'vendor/autoload.php');
    include site_url('');
    $mpdf = new \Mpdf\Mpdf(
        [
            'format' => 'A4-L',
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
            .tr-center td{
                text-align:center;
            }
            .table-border{
                border: 1px solid #000 ;
                height:420px;
                overflow: hidden;
                
            }
            #detail-do { table-layout:fixed; }
            #detail-do tr { height:1em;  }
            #detail-do tr td { overflow:hidden; white-space:nowrap;  } 
            .responsive-table-td{
                min-width:50px;
                width:150px;
            }
        </style>
        <table width="100%">
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
        <h2 class="text-center" style="padding:0 0 5px">DELIVERY ORDER</h2> 
        <table  width="100%">
            <tr>
                <!-- <td colspan="2"><p><span class="strong">Service Contact</span></p></td> -->
                <!-- <td></td> -->
                <!-- <td><p><i> *ส่วนลูกค้า</i></p></td> -->
            </tr>
            <tr>
                <td width="80px"><p>Company:</p></td>
                <td><p><?= $detail['Deli_Company'];?></p></td>
                <td class="text-right" width="100px"><p>เจ้าหน้าที่เข้ารับ:</p></td>
                <td><p><?= $detail['Deli_Contact'];?></p></td>
                <td width="30px" class="text-right"><p>Date:</p></td>
                <td width="150px"><p><?= $detail['Deli_Date'];?></p></td>
            </tr>
            <tr>
                <td><p>สถานที่จัดส่ง:</p></td>
                <td><p><span ><?= $detail['Deli_Address'];?></span></p></td>
                <td class="text-right"><p>เลขบัตรประชาชน:</p></td>
                <td><p><?= $detail['Deli_Iden'];?></p></td>
                <td class="text-right"><p>Phone:</p></td>
                <td ><p><?= $detail['Deli_Phone'];?></p></td>
            </tr>
        </table>
        <!-- ตารางแสดงข้อมูล list -->
        <div class="table-border">
            <table id="detail-do" width="100%" class="list" cellpadding="0" cellspacing="0" >
                <tr>
                    <th colspan="7">Delivery Order: <?= $detail['Deli_No'];?></th>
                
                </tr>
                <tr class="tr-center">
                    <td width="30px">NO.</td>
                    <td width="110px">BILL NO.</td>
                    <td width="150px">MODEL</td>
                    <td width="150px">IMEI/SERIAL</td>
                    <td>ACCESSORIES</td>
                    <td>Repair Description</td>
                    <td>REMARK</td>
                </tr>
                <?php
                $detail_list = $this->db->where('Deli_No', $detail['Deli_No'])->get('do_sub_delivery')->result_array();
                foreach ($detail_list as $key => $value) {
                ?>
                <tr class="tr-center">
                <td><?= ++$key; ?></td>
                    <td><?= $value['Dsub_Bill']?></td>
                    <td><?= $value['Dsub_Model']?></td>
                    <td><?= $value['Dsub_Imei']?></td>
                    <td><?= $value['Dsub_Accessories']?></td>
                    <td><?= $value['Dsub_Description']?></td>
                    <td><?= $value['Dsub_Remark']?></td>
                    
                </tr>
                <?php
                }
                while($key < 20)
                {?>
                <tr class="tr-center">
                    <td><?= ++$key?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } ?>
                
            </table>
        </div>
        <!-- /table -->
        <br>
        <table width="100%" class="signature" style="padding-top:10px;">
            <tr >
                
                <td align="center"><p>____________________________________</p> <br>
                <p>Received By</p>
                <p>AIR FORCE ONE EXPRESS</p><br>
                <p>Date _______/_______/__________</p></td>
                
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
<!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="PDF/filePDF/CS_DTB.pdf">คลิกที่นี้</a> -->