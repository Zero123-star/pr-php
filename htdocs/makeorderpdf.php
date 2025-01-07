<?php
require_once 'boot.php';
$id = $_GET["id"];
require('fpdf186/fpdf.php');
$aux = $conn->prepare("Select * from postare where idpostare=?");
$aux->bind_param('i', $id);
$aux->execute();
$aux = $aux->get_result();
$be= $aux->fetch_row();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
for ($i = 2; $i < sizeof($be); $i++) {
    switch ($i) {
        case 2:
            //Titlu
            $pdf->Cell(180,10,$be[$i],0,0,'C');
            $pdf->ln(30);
            break;
        case 3:
            //Descriere
            $pdf->SetFont('Arial','B',14);
            $be[$i]=str_replace('<br />',"\n",$be[$i]);//pentru a functiona multicell
            $pdf->multicell(0,5,$be[$i]);
            $pdf->ln(30);
            break;
        case 4:
            //echo "Suma oferita: ";
            $str= "Suma oferita: " . $be[$i] . " lei";
            $pdf->Cell(30,10,$str);
            $pdf->ln(25);
            break;
        case 5:
            //echo "Adresa: ";
            $str="Adresa: " . $be[$i];
            $pdf->Cell(30,10,$str);
            $pdf->ln(25);
            break;
    }
    //echo $be[$i];
   // echo "<br>";
}
$pdf->Output();
?>