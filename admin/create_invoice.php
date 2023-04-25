<?php
include_once 'fpdf.php';
include_once 'model/operations.php';
date_default_timezone_set("Africa/Nairobi");
if(!is_numeric($_GET['id'])){
    exit();
}
$sql = "select * from orders where id = '$_GET[id]'";
$row = select_rows($sql);
if(empty($row)){
    exit();
}
$item = $row[0];
//unset($item['id']);

$pdf = new FPDF();
$pdf->AddPage("P","A4");
$pdf->setMargins(10,1);
$w = $pdf -> GetPageWidth();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,"MY DAKTARI INVOICE",0,0,"C");
$pdf->ln(10);
$pdf->image("dist/img/icon.png",$w/2 - 30,null,60,20);
$pdf->SetFont('Arial',"",10);
$pdf->Cell(0,10,"Tel: +25471234567 Email: doctor@gmail.com",0,0,"C");
$pdf->ln(20);
$pdf->SetFont('Arial',"B",12);
$pdf->Cell(50,10,strtoupper("Name"),1,0,"C");
$pdf->Cell(80,10,strtoupper("Price"),1,0,'C');
$pdf->ln();
$sql = "select name,price from tests where oid = $item[id]";
$row = select_rows($sql);
$total = 1000;
foreach($row as $item ){
$total+=$item['price'];
$pdf->SetFont('Arial',"",12);
$pdf->Cell(50,10,strtoupper($item['name']),1,0,"C");
$pdf->Cell(80,10,strtoupper($item['price']),1,0,'C');
$pdf->ln();
//$pdf->Cell(50,10,"");


}
$pdf->SetFont('Arial',"",12);
$pdf->Cell(50,10,strtoupper("consultation"),1,0,"C");
$pdf->Cell(80,10,strtoupper("1000"),1,0,'C');
$pdf->ln();
$pdf->SetFont('Arial',"B",12);
$pdf->Cell(50,10,strtoupper("Total"),1,0,"C");
$pdf->Cell(80,10,strtoupper($total),1,0,'C');
$pdf->ln();
$pdf->SetY(1);
// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Page number
$pdf->Cell(0,10,'Date of generation '.date('Y-m-d H:i:s'),0,0,'C');
$pdf->Output();