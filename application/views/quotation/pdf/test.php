<?php
        require_once __DIR__ . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L','margin_top' => 10,
        'margin_left' => 10,
        'margin_right' => 10,
        'mirrorMargins' => true]);
       
        ob_start();
        ?>
<html>
    <head>
        <title></title>
        
    </head>
    <body>
     test

       

    </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
<!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="PDF/filePDF/CS_DTB.pdf">คลิกที่นี้</a> -->