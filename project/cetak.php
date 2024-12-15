<?php


require 'vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
ob_start();
require_once('template_cetak.php');
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();
