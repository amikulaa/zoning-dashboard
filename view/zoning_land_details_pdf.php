<?php
require('fpdf/fpdf.php');
//$pdf = new PDF_MC_Table();
$pdf = new FPDF('L','mm', 'Letter');
$pdf->SetTitle('PERMIT');
$pdf->AliasNbPages();

$font1 = 20;
$font2 = 16;
$font3 = 14;
$font3 = 12;
$font5 = 10;
$font_XXL = 90;
$font = 'Arial';

$pdf->AddPage('0');
$pdf->SetFont($font,'', $font3);
$pdf->SetY(10);

if(isset($rs) && !empty($rs)){
    foreach($rs as $row){
        foreach($row as $key => $value){
            $$key = $this->revert_back($value);
        }
    }
    //IT IS UNLAWFUL TO COMMENCE WORK BEFORE THIS PERMIT IS PLACE IN A CONSPICUOUS 
    //PLACE ON THE PREMISES. PERMIT EXPIRES TWO (2) YEARS FROM DATE OF ISSUE.
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(0, 5, 'IT IS UNLAWFUL TO COMMENCE WORK BEFORE THIS PERMIT IS PLACED IN A CONSPICUOUS', 0, 1, 'C');
    $pdf->Cell(0, 5, 'PLACE ON THE PREMISES. PERMIT EXPIRES TWO (2) YEARS FROM DATE OF ISSUE.', 0, 1, 'C');
    //HEADING: ZONING PERMIT
    $pdf->SetFont($font,'B', $font_XXL);
    $pdf->Cell(0, 35, 'ZONING PERMIT', 0, 1, 'C');
    //PERMIT NUMBER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(55, 10, 'PERMIT NUMBER', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(75, 10, $permit_number, 'B', 1, 'L');
    //PROPERTY OWNER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(60, 15, 'PROPERTY OWNER', 0, 0, 'L');
    $name = $owner1_fullname . (isset($owner2_fullname) ? ", " . $owner2_fullname : '');
    $pdf->SetFont($font,'', $this->get_font($name));
    $pdf->Cell(200, 15, $name, 'B', 1, 'L');
    //SITE ADDRESS
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(45, 15, 'SITE ADDRESS', 0, 0, 'L');
    $address = $owner1_address . ", " . $owner1_city . ", " . $owner1_state . " " . $owner1_zip;
    $pdf->SetFont($font,'', $this->get_font($address));
    $pdf->Cell(215, 15, $address, 'B', 1, 'L');
    //NOTICE
    $pdf->SetFont($font,'', $font3);
    $pdf->Cell(0, 7, "IN COMPLIANCE WITH THE REQUIREMENTS OF THE JEFFERSON COUNTY ZONING ORDINANCE", 0, 1, 'C');
    //FOR
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(20, 10, 'FOR', 0, 0, 'L');
    $for_desc = $this->zoningadmin_model->get_for_desc($property_desc_for);
    $pdf->SetFont($font,'', $this->get_font($for_desc));
    $pdf->Cell(240, 10, substr($property_desc_for, 0, 3) . ': ' . $for_desc, 'B', 1, 'L');
    //TOWN
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 15, 'TOWN', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(100, 15, $property_town, 'B', 0, 'L');
    $pdf->Cell(5, 15, '', 0, 0, 'L');
    //PARCEL #
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(35, 15, 'PARCEL #', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(95, 15, $parcel, 'B', 1, 'L');
    //LEGAL DESCRIPTION
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(65, 15, 'LEGAL DESCRIPTION', 0, 0, 'L');
    $pdf->SetFont($font,'', $this->get_font($property_description));
    $pdf->Cell(195, 15, $property_description, 'B', 1, 'L');
    //PERMIT ISSUED ON
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(60, 15, 'PERMIT ISSUED ON', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(80, 15, $permit_date_issued, 'B', 0, 'L');
    $pdf->Cell(5, 15, '', 0, 0, 'L');
    $pdf->Cell(115, 15, $permit_approved_by, 'B', 1, 'L');;
    //NOTICE
    $pdf->SetFont($font,'', $font3);
    $pdf->Cell(145, 7, '', 0, 0, 'L');
    $pdf->Cell(115, 7, 'JEFFERSON COUNTY PLANNING AND ZONING', 0, 1, 'C');
    //(BY) : $permit_approved_by
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(65, 15, 'PERMIT EXPIRES ON', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(65, 15, $permit_expiration, 'B', 0, 'L');
    $pdf->Cell(5, 15, '', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(75, 15, 'UNLESS RENEWED BEFORE THAT DATE', 0, 1, 'L');
    //NOTICE
    $pdf->SetFont($font,'', $font3);
    $pdf->Cell(0, 10, "CAUTION: THIS PERMIT MAY BE APPEALED FOR 30 DAYS AFTER PUBLICATION OF ISSUANCE", 0, 1, 'C');
} else {
    $pdf->Write(10, 'ERROR RETREVING DATA, PLEASE TRY AGAIN.');
}

// save and output
ob_end_clean();
$pdf->Output();
?>