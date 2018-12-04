<?php
include('connect_base_use_class.php');
$database = new Database();
$result = $database->runQuery("SELECT mois,montant FROM paiements_eleves where id=".$_REQUEST['paiements']);

$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='gestion_ecole' 
AND `TABLE_NAME`='paiements_eleves'
and `COLUMN_NAME` in ('mois','montant')");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$resultetablissement = $database->runQuery("SELECT nom,adresse,image,tel,fax,email,mobile FROM etablissements");

	foreach($resultetablissement as $row) {
		$pdf->Ln();
		//foreach($row as $col){
			$pdf->Image('images/'.$row['image'],10,6,30);
			$pdf->Ln(20);
		    // Police Arial gras 15
		    $pdf->SetFont('Arial','B',15);
		    // Décalage à droite
		    // Titre
		    $pdf->Cell(95,12,$row['nom'],0);
		    $pdf->Ln(10);
		    $pdf->SetFont('Arial','',15);
		    $pdf->Cell(95,12,$row['adresse'],0);
		    $pdf->Ln(10);
		    $pdf->Cell(95,12,$row['email'],0);
		    // Saut de ligne
		    $pdf->Ln(10);
		//}	
	}


$pdf->Ln(20);
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(95,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column){
		$pdf->Cell(95,12,$column,1);
	}
}
$pdf->Output();
?>