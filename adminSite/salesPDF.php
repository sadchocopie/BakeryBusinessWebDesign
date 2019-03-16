<?php
require('fpdf.php');

$url = 'http://157.230.150.204:4040/sales_data.php';
$img = './sales.png';
file_put_contents($img, file_get_contents($url));

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(50,10,'Weekly Sales',1,0,'C');
    // Line break
    $this->Ln(20);

    $this->Image('sales.png');
}
}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();
?>
