<?php
require('mc_table.php');
$pdf = new PDF_MC_Table();
$pdf->SetTitle('ALL PDF');
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
    
    // title page header
    $pdf->SetFont($font,'B', $font2);
    $pdf->Cell(75, 5, $permit_mail == 1 ? 'MAIL' : $permit_pickup_name, 0, 0, 'L');
    $pdf->Cell(30, 5, 'JEFFERSON COUNTY', 0, 1, 'L');
    $pdf->Cell(30, 5, $permit_pickup_number, 0, 0, 'L');
    $pdf->SetFont($font,'B', $font1);
    $pdf->Cell(170, 5, 'ZONING AND LAND USE PERMIT APPLICATION', 0, 1, 'L');
    $pdf->SetFont($font,'B', $font3);
    $pdf->Cell(0, 5, '311 S. CENTER AVE., ROOM 201, JEFFERSON, WI 53549 - 1701', 0, 1, 'C');
    $pdf->Cell(0, 5, 'PHONE: (920) 674 - 7130 | FAX: (920) 674 - 7525 | EMAIL: zoning@jeffersoncountywi.gov', 0, 1, 'C');
    
    //owners
    $pdf->Cell(30, 5, '', 0, 0, 'L');
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(50, 5, 'FULL NAME', 1, 0, 'C', true);
    $pdf->Cell(90, 5, 'STREET ADDRESS | CITY | STATE | ZIP', 1, 0, 'C', true);
    $pdf->Cell(25, 5, 'PHONE #', 1, 1, 'C', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 5, 'I. OWNERS', 0, 0, 'L');
    $pdf->SetWidths(array(50, 90, 25));
    $pdf->Row(array($owner1_fullname, $owner1_address . ', ' . $owner1_city . ', ' . $owner1_state . ', ' . $owner1_zip, $owner1_phoneno));
    $pdf->Cell(30, 5, '', 0, 0, 'L');
    $pdf->Row(array($owner2_fullname, $owner2_address == null ? "" : $owner2_address . ', ' . $owner2_city . ', ' . $owner2_state . ', ' . $owner2_zip, $owner2_phoneno));
    
    //contractor
    $pdf->Cell(30, 5, 'CONTRACTOR', 0, 0, 'L');
    $pdf->Row(array($contractor_fullname, $contractor_address == null ? "" : $contractor_address . ', ' . $contractor_city . ', ' . $contractor_state . ', ' . $contractor_zip, $contractor_phoneno));
    
    //property description
    $pdf->Cell(55, 5, 'II. PROPERTY DESCRIPTION', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(50, 5, 'PARCEL: ' . $parcel, 1, 0, 'L');
    $pdf->Cell(60, 5, 'TOWN: ' . $property_town, 1, 0, 'L');
    $pdf->Cell(30, 5, 'ACRES: ' . $property_acres, 1, 1, 'L');
    $pdf->Cell(25, 5, 'LOT NO: ' . $property_lot_no, 1, 0, 'L');
    $pdf->Cell(30, 5, 'BLOCK: ' . $property_block_no, 1, 0, 'L');
    $pdf->Cell(65, 5, 'SUBDIVISION: ' . $property_subdiv, 1, 0, 'L');
    $pdf->Cell(45, 5, 'ZONING DISTRICT: ' . $property_zoning_district, 1, 0, 'L');
    $pdf->Cell(30, 5, 'LOT NO: ' . $property_lot_no2, 1, 1, 'L');
    $pdf->Cell(30, 5, 'CSM NO: ' . $property_csm_no, 1, 0, 'L');
    $pdf->Cell(20, 5, 'VOL: ' . $property_vol_no, 1, 0, 'L');
    $pdf->Cell(20, 5, 'PG: ' . $property_pg_no, 1, 0, 'L');
    $pdf->Cell(125, 5, 'FIRE NO. ROAD: ' . $property_fireno_road, 1, 1, 'L');
    
    //SECTION 3
    $pdf->ln(3);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(195, 1, '', 1, 1, 'C', true);
    $pdf->ln(3);
    $pdf->Cell(0, 5, 'III. TYPE, SIZE, VALUE, AND USE OF PROPOSED STRUCTURE OR IMPROVEMENT.', 0, 1, 'L'); 
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res == 1 ? 4 : '', 1, 0, 'C');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(3, 5, '', 0, 0, 'L');
    $pdf->SetTextColor(255,255,255); 
    $pdf->Cell(60, 5, 'A. RESIDENTIAL', 0, 0, 'L', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres == 1 ? 4 : '', 1, 0, 'C');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(3, 5, '', 0, 0, 'L');
    $pdf->SetTextColor(255,255,255); 
    $pdf->Cell(62, 5, 'B. NON-RESIDENTIAL', 0, 0, 'L', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(5, 5, '', 0, 0, 'L');
    $pdf->SetTextColor(255,255,255);  
    $pdf->Cell(47, 5, 'OTHER DETAILS', 0, 0, 'C', true);
    $pdf->SetTextColor(0, 0, 0);  
    
    //RES NEW STRUC OR ADD
    $pdf->ln(5);
    $pdf->Cell(7, 5, '', 0, 0);
    $pdf->Cell(30, 5, 'NEW STRUCTURE', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_type_new == 1 ? ($structure_res == 1 ? 4 : '') : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(3, 5, '', 0, 0, 'L');
    $pdf->Cell(18, 5, 'ADDITION', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_type_add == 1 ? ($structure_res == 1 ? 4 : '') : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(13, 5, '', 0, 0);
    //NON RES NEW STRUC OR ADD
    $pdf->Cell(30, 5, 'NEW STRUCTURE', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_type_new == 1 ? ($structure_nonres == 1 ? 4 : '') : '', 1, 0);
    $pdf->Cell(3, 5, '', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(18, 5, 'ADDITION', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_type_add == 1 ? ($structure_nonres == 1 ? 4 : '') : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(7, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'SANITARY PERMIT NO.', 1, 0, 'C');
    
    //OPTIONS
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_singlefam == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'SINGLE FAMILY RESIDENCE', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_agricultural == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(30, 5, 'AGRICULTURAL', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(31, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_sanitary_no, 'B', 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(20, 5, '', 0, 0);
    $pdf->Cell(30, 5, 'NO. BEDROOMS', 0, 0, 'L');
    $pdf->Cell(15, 5, $structure_res_singlefam_bed, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_industrial == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(30, 5, 'INDUSTRIAL', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(31, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'NUMBER OF BEDROOMS', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_mobilehome == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'MH PARK SINGLE FAMILY', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_business == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(30, 5, 'BUSINESS', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(31, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_no_bed, 'B', 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(20, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_mobilehome_addition == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(20, 5, 'ADDITION', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_mobilehome_accessory == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(15, 5, 'ACESSORY', 0, 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_campground == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(30, 5, 'CAMPGROUND', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(31, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'PUBLIC SEWER', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_multifam == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'MULTI-FAMILY RESIDENCE', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_other == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(15, 5, 'OTHER', 0, 0, 'L');
    $pdf->Cell(35, 5, $structure_nonres_other_ans, 'B', 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_public_sewer, 'B', 0, 'C'); //public sewer
    
    $pdf->ln(5);
    $pdf->Cell(20, 5, '', 0, 0);
    $pdf->Cell(30, 5, 'NO. UNITS', 0, 0, 'L');
    $pdf->Cell(15, 5, $structure_res_multifam_units, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->Cell(55, 1, '', 'B', 0, 'L', TRUE);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'NON-CONFORM. USE', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(20, 5, '', 0, 0);
    $pdf->Cell(30, 5, 'NO. BEDROOMS', 0, 0, 'L');
    $pdf->Cell(15, 5, $structure_res_multifam_bed, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_floodplain == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(25, 5, 'FLOODPLAIN', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_floodplain_ff == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'FF', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_floodplain_fw == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'FW', 0, 0, 'L');
    $pdf->Cell(6, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_nonconform, 'B', 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_gardet == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'GARAGE DETACHED', 0, 0, 'L');      
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_nonres_shorewet == 4 ? 1 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(30, 5, 'SHORELAND/WETLAND', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(31, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'FLOODPLAIN', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_other == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(15, 5, 'OTHER', 0, 0, 'L');
    $pdf->Cell(35, 5, $structure_res_other_ans, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->Cell(55, 1, '', 'B', 0, 'L', TRUE);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_floodplain, 0, 0, 'C');//floodplain text other details
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->Cell(55, 1, '', 'B', 0, 'L', TRUE);
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(32, 5, 'STRUCTURE SQ. FT.', 0, 0, 'L');
    $pdf->Cell(23, 5, $structure_nonres_sqft, 'B', 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'SHORELAND/WETLAND', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_garatt == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'GARAGE ATTACHED', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(35, 5, 'STRUCTURE HEIGHT', 0, 0, 'L');
    $pdf->Cell(20, 5, $structure_nonres_height, 'B', 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_shoreland, 'B', 0, 'C');//additional shoreland wetland text
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_floodplain == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(25, 5, 'FLOODPLAIN', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_floodplain_ff == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'FF', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_floodplain_fw == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'FW', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'USE', 0, 0, 'L');
    $pdf->Cell(45, 5, $structure_nonres_use, 'B', 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, 'INSPECTION DATE', 1, 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $structure_res_wetland == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(55, 5, 'SHORELAND/WETLAND', 0, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(40, 5, 'CONSTRUCTION VALUE', 0, 0, 'L');
    $pdf->Cell(15, 5, $structure_nonres_value, 'B', 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(11, 5, '', 0, 0);
    $pdf->Cell(45, 5, $additional_inspection, 'B', 0, 'C');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(32, 5, 'STRUCTURE SQ. FT.', 0, 0, 'L');
    $pdf->Cell(23, 5, $structure_res_sqft, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(32, 5, 'OTHER DETAILS', 0, 0, 'L');
    $pdf->Cell(78, 5, $additional_other, 'B', 0, 'L');
    
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(27, 5, 'GARAGE SQ. FT.', 0, 0, 'L');
    $pdf->Cell(28, 5, $structure_res_gar_sqft, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(35, 5, 'STRUCTURE HEIGHT', 0, 0, 'L');
    $pdf->Cell(20, 5, $structure_res_height, 'B', 0, 'L');
    $pdf->Cell(18, 5, '', 0, 0, 'L');
    $pdf->Cell(50, 5, 'ACCESS APPROVAL REQUIRED? [TOWN, COUNTY, STATE]', 0, 0, 'L');
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'USE', 0, 0, 'L');
    $pdf->Cell(45, 5, $structure_res_use, 'B', 0, 'L');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $additional_access_approval == 'yes' ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'YES', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $additional_access_approval == 'no' ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(10, 5, 'NO', 0, 0, 'L');
    $pdf->SetFont($font,'B', $font4);
    
    $pdf->ln(5);
    $pdf->Cell(10, 5, '', 0, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(40, 5, 'CONSTRUCTION VALUE', 0, 0, 'L');
    $pdf->Cell(15, 5, $structure_res_value, 'B', 0, 'L');
    
    //SECTION 4
    $pdf->ln(5);
    $pdf->Cell(195, 1, '', 1, 1, 'C', true);
    $pdf->Cell(0, 5, 'IV. PLOT PLAN (SKETCH) REQUIRED TO BE ATTACHED', 0, 1, 'C');
    $pdf->SetWidths(array(195));
    $pdf->SetFont($font,'B', $font5);
    $pdf->Row(array('NO LARGER THAN 11" X 17" PLOT PLAN SKETCH SHALL INCLUDE THE FOLLOWING: ALL EXISTING STRUCTURES AND THE LOCATION OF THE NEW STRUCTURE OR ADDITION, INCLUDING DISTANCES FROM THE CENTERLINE AND RIGHT-OF-WAY OF THE ROAD, SIDE AND REAR LOT LINES, NAVIGABLE WATERS, SEPTIC TANK, AND FIELD, WELL, DRIVEWAY ACCESS. GIVE ALL DIMENSIONS. BE SURE TO INCLUDE DECKS PROPOSED FOR NEW HOMES.'));
    $pdf->Cell(195, 1, '', 1, 1, 'C', true);
    
    //SECTION 5
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(0, 5, 'V. ACKNOWLEDGEMENTS', 0, 1, 'C');
    $pdf->SetWidths(array(195));
    $pdf->SetFont($font,'B', $font5);
    $pdf->Row(array('YOU ARE RESPONSIBLE FOR COMPLYING WITH STATE AND FEDERAL LAWS CONCERNING CONSTRUCTION NEAR OR ON WETLANDS, LAKES, AND STREAMS. WETLANDS THAT ARE NOT ASSOCIATED WITH OPEN WATER CAN BE DIFFICULT TO IDENTIFY. FAILURE TO COMPLY MAY RESULT IN THE REMOVAL OR MODIFICATION OF CONSTRUCTION THAT VIOLATES THE LAW OR OTHER PENALTIES OR COSTS. FOR MORE INFORMATION, VISIT THE DEPARTMENT OF NATURAL RESOURCES WETLANDS IDENTIFICATION WEB PAGE OR CONTACT A DEPARTMENT OF NATURAL RESOURCES SERVICE CENTER. (Wis Stats 59.691)'));
    $pdf->Row(array('OWNER - CHECK FOR APPLICABLE DEED, PLAT AND TOWN RESTRICTIONS AND PERMIT REQUIREMENTS.'));
    $pdf->Row(array('THIS PERMIT MAY BE APPEALED FOR 30 DAYS AFTER PUBLICATION OF ISSUANCE.'));
    $pdf->Row(array('THE OWNER OF THIS PARCEL AND THE UNDERSIGNED AGREE TO CONFORM TO THE CONDITIONS OF THIS PERMIT AND TO ALL APPLICABLE LAWS OF JEFFERSON COUNTY AND ACKNOWLEDGE THAT YOU HAVE RECEIVED AND READ THE ABOVE NOTICE REGARDING WETLANDS, AS WELL AS ALL NOTICES AND TERMS ABOVE.'));
    
    $pdf->ln(3);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(75, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 5, 'PERMIT FEE', 1, 0, 'L');
    $pdf->Cell(40, 5, 'APPROVED BY', 1, 0, 'L');
    $pdf->Cell(55, 5, 'PERMIT #: ' . $permit_number, 1, 1, 'L');
    
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(20, 5, 'ACCEPTED', 0, 0, 'L');
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $permit_accepted_terms == 1 ? 4 : '', 1, 0);
    $pdf->SetFont($font,'B', $font4);
    $pdf->Cell(5, 5, '', 0, 0);
    $pdf->Cell(10, 5, 'DATE', 0, 0, 'L');
    $pdf->Cell(25, 5, $permit_accepted_date, 'B', 0, 'L');
    
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 5, $permit_fee, 1, 0, 'R');
    $pdf->Cell(40, 5, $permit_approved_by, 1, 0, 'R');
    $pdf->Cell(55, 5, 'DATE APPROVED: ' . $permit_date_issued, 1, 0, 'L');
} else {
    $pdf->Write(10, 'ERROR RETREVING DATA, PLEASE TRY AGAIN.');
}

$font1 = 16;
$font2 = 12;
$font3 = 10;
$font4 = 9;
$font5 = 7;
$font = 'Times';

$pdf->AddPage();
$pdf->SetFont($font,'', $font3);
$pdf->SetY(5);

if(isset($rs2) && !empty($rs2)){
    foreach($rs2 as $row){
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

$font1 = 20;
$font2 = 16;
$font3 = 14;
$font3 = 12;
$font5 = 10;
$font_XXL = 90;
$font = 'Arial';

$pdf->AddPage('L', 'Letter');
$pdf->SetFont($font,'', $font3);
$pdf->SetY(10);

if(isset($rs2) && !empty($rs2)){
    foreach($rs2 as $row){
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