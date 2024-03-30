<?php
require('mc_table.php');
$pdf = new PDF_MC_Table();
$pdf->SetTitle('RECEIPT');
$pdf->AliasNbPages();

$font1 = 16;
$font2 = 12;
$font3 = 10;
$font4 = 9;
$font5 = 7;
$font = 'Times';

$pdf->AddPage();
$pdf->SetFont($font,'', $font3);
$pdf->SetY(5);

if(isset($rs) && !empty($rs)){
    foreach($rs as $row){
        foreach($row as $key => $value){
            $$key = $this->revert_back($value);
        }
    }
    
    //IT IS UNLAWFUL TO COMMENCE WORK BEFORE THIS PERMIT IS PLACE IN A CONSPICUOUS
    //PLACE ON THE PREMISES. PERMIT EXPIRES TWO (2) YEARS FROM DATE OF ISSUE.
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(0, 5, 'IT IS UNLAWFUL TO COMMENCE WORK BEFORE THIS PERMIT IS PLACE IN A CONSPICUOUS', 0, 1, 'C');
    $pdf->Cell(0, 5, 'PLACE ON THE PREMISES. PERMIT EXPIRES TWO (2) YEARS FROM DATE OF ISSUE.', 0, 1, 'C');
    //HEADING: ZONING PERMIT
    $pdf->SetFont($font,'B', $font1);
    $pdf->Cell(0, 10, 'ZONING PERMIT RECEIPT', 0, 1, 'C');
    //PERMIT NUMBER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'PERMIT NUMBER', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 7, $permit_number, 'B', 1, 'L');
    //PROPERTY OWNER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'PROPERTY OWNER', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(100, 7, $owner1_fullname . (isset($owner2_fullname) ? ", " . $owner2_fullname : ''), 'B', 1, 'L');
    //SITE ADDRESS
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'SITE ADDRESS', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(125, 7, $owner1_address . ", " . $owner1_city . ", " . $owner1_state . " " . $owner1_zip, 'B', 1, 'L');
    //NOTICE
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(0, 5, "IN COMPLIANCE WITH THE REQUIREMENTS OF THE JEFFERSON COUNTY ZONING ORDINANCE", 0, 1, 'R');
    //FOR
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'FOR', 0, 0, 'R');
    $for_desc = $this->zoningadmin_model->get_for_desc($property_desc_for);
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(125, 7, $for_desc, 'B', 1, 'L');
    //TOWN
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'TOWN', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 7, $property_town, 'B', 0, 'L');
    //PARCEL #
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 7, 'PARCEL #', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 7, $parcel, 'B', 1, 'L');
    //LEGAL DESCRIPTION
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'LEGAL DESCRIPTION', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(125, 7, $property_description, 'B', 1, 'L');
    //PERMIT ISSUED ON
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'PERMIT ISSUED ON', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 7, $permit_date_issued, 'B', 0, 'L');
    $pdf->Cell(5, 7, '', 0, 0, 'L');
    $pdf->Cell(50, 7, $permit_approved_by, 'B', 1, 'L');;
    //NOTICE
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(105, 7, '', 0, 0, 'R');
    $pdf->Cell(50, 5, 'JEFFERSON COUNTY ZONING', 0, 1, 'R');
    //(BY) : $permit_approved_by
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'PERMIT EXPIRES ON', 0, 0, 'R');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 7, $permit_expiration, 'B', 0, 'L');
    $pdf->Cell(5, 7, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(50, 7, 'UNLESS RENEWED BEFORE THAT DATE', 0, 1, 'L');
    //NOTICE
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(0, 5, "CAUTION: THIS PERMIT MAY BE APPEALED FOR 30 DAYS AFTER PUBLICATION OF ISSUANCE", 0, 1, 'R');
    // RECEIPT
    $pdf->ln(5);
    $is_dotted = true;
    $total = 0;
    while($total <= 190){
        $pdf->Cell(5, 1, "", 0, 0, 'C', $is_dotted);
        $is_dotted = $is_dotted == true ? false : true;
        $total += 5;
    }
    $pdf->ln(5);
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(0, 5, 'STATE OF WISCONSIN', 0, 1, 'L');
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(150, 5, 'COUNTY OF JEFERSON', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(45, 5, 'RECEIPT NUM', 0, 1, 'R');
    $pdf->SetFont($font,'B', $font1);
    $pdf->Cell(0, 10, 'RECEIPT', 0, 1, 'C');
    $pdf->ln(2);
    //PROPERTY OWNER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(0, 5, 'PROPERTY OWNER', 0, 1, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(0, 5, $owner1_fullname . (isset($owner2_fullname) ? ", " . $owner2_fullname : ''), 'B', 1, 'L');
    //SITE ADDRESS
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(95, 5, 'MAILING ADDRESS', 0, 0, 'L');
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->Cell(95, 5, 'PROPERTY ADDRESS', 0, 1, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(95, 5, $property_mailing_address, 'B', 0, 'L');//MAILING ADDRESS
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->Cell(95, 5, $owner1_address . ", " . $owner1_city . ", " . $owner1_state . " " . $owner1_zip, 'B', 1, 'L');
    //PARCEL #
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 5, 'PARCEL #', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(70, 5, $parcel, 'B', 0, 'L');
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    //TOWN
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 5, 'TOWNSHIP', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(70, 5, $property_town, 'B', 1, 'L');
    //LOT/BLK/CSM/SUBDIVISION
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(10, 5, 'LOT', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(10, 5, $property_lot_no, 'B', 0, 'L');//LOT
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(20, 5, 'BLK/CSM', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(50, 5, $property_block_no . '/' . $property_csm_no, 'B', 0, 'L');//BLK/CSM
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(30, 5, 'SUBDIVISION', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(65, 5, $property_subdiv, 'B', 1, 'L');//SUBDIVISION
    //PERMIT ISSUED FOR
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(45, 5, 'PERMIT ISSUED FOR', 0, 0, 'L');
    $for_desc = $this->zoningadmin_model->get_for_desc($property_desc_for);
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(150, 5, $for_desc, 'B', 1, 'L');
    //OTHER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(20, 5, 'OTHER', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(175, 5, $property_description_other, 'B', 1, 'L');
    //FEES/CHECK/CASH
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(15, 5, 'FEES', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(80, 5, $permit_fee, 'B', 0, 'L');//FEES
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(20, 5, 'CHECK', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(30, 5, $permit_fee_check, 'B', 0, 'L');//CHECK
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(15, 5, 'CASH', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(25, 5, $permit_fee_cash, 'B', 1, 'L');//CASH
    //PAID BY CONTRACTOR INSTALLER
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(80, 5, 'PAID BY / CONTRACTOR INSTALLER', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(115, 5, $permit_paid_by, 'B', 1, 'L');
    //DATE ISSUED/BY
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(30, 5, 'DATE ISSUED', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(65, 5, $permit_date_issued, 'B', 0, 'L');//DATE ISSUED
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(10, 5, 'BY', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(85, 5, $permit_approved_by, 'B', 1, 'L'); //ISSUED BY
    //(FOR ZONING ADMINISTRATOR)
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(110, 5, '', 0, 0, 'L');
    $pdf->Cell(85, 5, '(FOR ZONING ADMINISTRATOR)', 0, 1, 'R'); //ISSUED BY
    //AT
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(10, 5, 'AT', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(185, 5, $permit_paid_at, 'B', 1, 'L');//DATE ISSUED
    //NOTICE
    $pdf->ln(5);
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(0, 5, "CAUTION: THIS PERMIT MAY BE APPEALED FOR 30 DAYS AFTER PUBLICATION OF ISSUANCE", 0, 1, 'L');
    
    //SECOND RECEIPT
    $pdf->ln(5);
    $is_dotted = true;
    $total = 0;
    while($total <= 190){
        $pdf->Cell(5, 1, "", 0, 0, 'C', $is_dotted);
        $is_dotted = $is_dotted == true ? false : true;
        $total += 5;
    }
    $pdf->Cell(5, 1, "", 0, 1, 'C', $is_dotted);
    $pdf->ln(5);
    $pdf->Cell(0, 5, 'ZONING ADMINISTRATOR COPY', 0, 1, 'L');
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(0, 5, 'STATE OF WISCONSIN', 0, 1, 'L');
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(150, 5, 'COUNTY OF JEFERSON', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(45, 5, 'RECEIPT NUM', 0, 1, 'R');
    $pdf->SetFont($font,'B', $font1);
    $pdf->Cell(0, 10, 'RECEIPT', 0, 1, 'C');
    $pdf->ln(2);
    //PARCEL #
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 5, 'PARCEL #', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(70, 5, $parcel, 'B', 0, 'L');
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    //TOWN
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(25, 5, 'TOWNSHIP', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(70, 5, $property_town, 'B', 1, 'L');
    //PERMIT ISSUED FOR
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(45, 5, 'PERMIT ISSUED FOR', 0, 0, 'L');
    $for_desc = $this->zoningadmin_model->get_for_desc($property_desc_for);
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(150, 5, $for_desc, 'B', 1, 'L');//NEW SELECT
    //FEES/CHECK/CASH
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(15, 5, 'FEES', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(80, 5, $permit_fee, 'B', 0, 'L');//FEES
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(20, 5, 'CHECK', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(30, 5, $permit_fee_check, 'B', 0, 'L');//CHECK
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(15, 5, 'CASH', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(25, 5, $permit_fee_cash, 'B', 1, 'L');//CASH
    //DATE ISSUED/BY
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(30, 5, 'DATE ISSUED', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(65, 5, $permit_date_issued, 'B', 0, 'L');//DATE ISSUED
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(10, 5, 'BY', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(85, 5, $permit_approved_by, 'B', 1, 'L'); //ISSUED BY
    //AT
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(10, 5, 'AT', 0, 0, 'L');
    $pdf->SetFont($font,'', $font2);
    $pdf->Cell(185, 5, $permit_paid_at, 'B', 1, 'L');//DATE ISSUED
    //NOTICE
    $pdf->ln(5);
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(0, 5, "CAUTION: THIS PERMIT MAY BE APPEALED FOR 30 DAYS AFTER PUBLICATION OF ISSUANCE", 0, 1, 'L');
} else {
    $pdf->Write(10, 'ERROR RETREVING DATA, PLEASE TRY AGAIN.');
}

// save and output
ob_end_clean();
$pdf->Output();
?>