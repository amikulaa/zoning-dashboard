<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa-solid fa-gears fa-xl"></i>&nbsp;Zoning and Land Use Status Permit Record</h1>
  	</div>
  	<form method="POST" action="<? echo URL ?>ZoningAdmin/save_lup_updates_status/<? echo $permit_num;?>">
	<section class="ftco-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<label></label>
				</div>
				<div class="col-md-7">
					<button id='save_lup_button' type='submit' class='btn btn-primary' title='CLICK TO SAVE'>SAVE</button>
				</div>
				<div class="col-md-1">
					<a id='open_pdf_button' type='button' class='button_style' href='<? echo URL ?>ZoningAdmin/open_fillable_pdf/<? echo $permit_num;?>' target='_blank' title='CLICK TO OPEN PERMIT PDF'>PDF</a>
				</div>
			</div>
    		<div class='color_back'>
    			<div class="row land_permit_heading">
            		<h3 class='land_permit_heading'>I. OWNERS</h3>
    			</div>
    			<br/>
    			<div class="row">
            		<h4>OWNERS</h4>
    			</div>
    			<div class="row">
    				<div class="col-md-3">
    					<label>FULL NAME</label>
    						<input id='owner1_fullname' name='owner1_fullname' class='land_use_input' value='<?php if(isset($owner1_fullname)) echo $owner1_fullname?>' type='text' readonly/>
    						<input id='owner2_fullname' name='owner2_fullname' class='land_use_input' value='<?php if(isset($owner2_fullname)) echo $owner2_fullname?>' type='text' readonly/>
    				</div>
    				<div class="col-md-3">
    					<label>ADDRESS</label>
    						<input id='owner1_address' name='owner1_address' class='land_use_input' value='<?php if(isset($owner1_address)) echo $owner1_address?>' type='text' readonly/>
    						<input id='owner2_address' name='owner2_address' class='land_use_input' value='<?php if(isset($owner2_address)) echo $owner2_address?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>CITY</label>
    						<input id='owner1_city' name='owner1_city' class='land_use_input' value='<?php if(isset($owner1_city)) echo $owner1_city?>' type='text' readonly/>
    						<input id='owner2_city' name='owner2_city' class='land_use_input' value='<?php if(isset($owner2_city)) echo $owner2_city?>' type='text' readonly/>
    				</div>
    				<div class="col-md-1">
    					<label>STATE</label>
    						<input id='owner1_state' name='owner1_state' class='land_use_input' value='<?php if(isset($owner1_state)) echo $owner1_state?>' type='text' readonly/>
    						<input id='owner2_state' name='owner2_state' class='land_use_input' value='<?php if(isset($owner2_state)) echo $owner2_state?>' type='text' readonly/>
    				</div>
    				<div class="col-md-1">
    					<label>ZIP</label>
    						<input id='owner1_zip' name='owner1_zip' class='land_use_input' value='<?php if(isset($owner1_zip)) echo $owner1_zip?>' type='text' readonly/>
    						<input id='owner2_zip' name='owner2_zip' class='land_use_input' value='<?php if(isset($owner2_zip)) echo $owner2_zip?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>PHONE #</label>
    						<input id='owner1_phoneno' name='owner1_phoneno' class='land_use_input' value='<?php if(isset($owner1_phoneno)) echo $owner1_phoneno?>' type='text' readonly/>
    						<input id='owner2_phoneno' name='owner2_phoneno' class='land_use_input' value='<?php if(isset($owner2_phoneno)) echo $owner2_phoneno?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
            		<h4>CONTRACTOR</h4>
    			</div>
    			<div class="row">
    				<div class="col-md-3">
    					<label>FULL NAME</label>
    						<input id='contractor_fullname' name='contractor_fullname' class='land_use_input' value='<?php if(isset($contractor_fullname)) echo $contractor_fullname?>' type='text' readonly/>
    				</div>
    				<div class="col-md-3">
    					<label>ADDRESS</label>
    						<input id='contractor_address' name='contractor_address' class='land_use_input' value='<?php if(isset($contractor_address)) echo $contractor_address?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>CITY</label>
    						<input id='contractor_city' name='contractor_city' class='land_use_input' value='<?php if(isset($contractor_city)) echo $contractor_city?>' type='text' readonly/>
    				</div>
    				<div class="col-md-1">
    					<label>STATE</label>
    						<input id='contractor_state' name='contractor_state' class='land_use_input' value='<?php if(isset($contractor_state)) echo $contractor_state?>' type='text' readonly/>
    				</div>
    				<div class="col-md-1">
    					<label>ZIP</label>
    						<input id='contractor_zip' name='contractor_zip' class='land_use_input' value='<?php if(isset($contractor_zip)) echo $contractor_zip?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>PHONE #</label>
    						<input id='contractor_phoneno' name='contractor_phoneno' class='land_use_input' value='<?php if(isset($contractor_phoneno)) echo $contractor_phoneno?>' type='text' readonly/>
    				</div>
    			</div>
			</div>
    		<br/>
    		<div class='color_back'>
    			<div class="row land_permit_heading">
            		<h3 class='land_permit_heading'>II. PROPERTY DESCRIPTION</h3>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-5">
    					<label>PARCEL</label>
    						<input id='parcel' name='parcel' class='land_use_input' value='<?php if(isset($parcel)) echo $parcel?>' type='text' readonly/>
    				</div>
    				<div class="col-md-5">
    					<label>TOWN</label>
    						<input id='property_town' name='property_town' class='land_use_input' value='<?php if(isset($property_town)) echo $property_town?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-2">
    					<label>LOT NO</label>
    						<input id='property_lot_no' name='property_lot_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_lot_no)) echo $property_lot_no?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>BLOCK</label>
    						<input id='property_block_no' name='property_block_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_block_no)) echo $property_block_no?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>SUBDIVISION</label>
    						<input id='property_subdiv' name='property_subdiv' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_subdiv)) echo $property_subdiv?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>ACRES</label>
    						<input id='property_acres' name='property_acres' class='land_use_input' value='<?php if(isset($property_acres)) echo $property_acres?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>ZONING DISTRICT</label>
    						<input id='property_zoning_district' name='property_zoning_district' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_zoning_district)) echo $property_zoning_district?>' type='text'/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-2">
    					<label>LOT NO</label>
    						<input id='property_lot_no2' name='property_lot_no2' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_lot_no2)) echo $property_lot_no2?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>CSM NO</label>
    						<input id='property_csm_no' name='property_csm_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_csm_no)) echo $property_csm_no?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>VOL</label>
    						<input id='property_vol_no' name='property_vol_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_vol_no)) echo $property_vol_no?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>PG</label>
    						<input id='property_pg_no' name='property_pg_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_pg_no)) echo $property_pg_no?>' type='number'/>
    				</div>
    				<div class="col-md-4">
    					<label>PROJECT SITE-FIRE NO. AND ROAD</label>
    						<input id='property_fireno_road' name='property_fireno_road' class='land_use_input' value='<?php if(isset($property_fireno_road)) echo $property_fireno_road?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-12">
    					<label>PROPERTY DESCRIPTION</label>
    						<input id='property_description' name='property_description' class='land_use_input' value='<?php if(isset($property_description)) echo $property_description?>' type='text' readonly/>
    				</div>
    			</div>
    		</div>
    		<br/>
    		<div class='color_back'>
    			<div class="row land_permit_heading">
            		<h3 class='land_permit_heading'>III. TYPE, SIZE, VALUE, AND USE OF PROPOSED STRUCTURE OR IMPROVEMENT</h3>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-2">
    					<label><input id='structure_res' name='structure_res' class='CHECKBOX' <?php if(isset($structure_res) && $structure_res == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;RESIDENTIAL</label>
    				</div>
    				<div class="col-md-2">
    					<label><input id='structure_nonres' name='structure_nonres' class='CHECKBOX' <?php if(isset($structure_nonres) && $structure_nonres == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;NON-RESIDENTIAL</label>
    				</div>
    				<div class="col-md-2">
    					<label><input id='input_nonstruct' name='input_nonstruct' class='CHECKBOX' <?php if(isset($input_nonstruct) && $input_nonstruct == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;NON-STRUCTURAL</label>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-2">
    					<label><input id='structure_type_new' name='structure_type_new' class='CHECKBOX' <?php if(isset($structure_type_new) && $structure_type_new == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;NEW STRUCTURE</label>
    				</div>
    				<div class="col-md-2">
    					<label><input id='structure_type_add' name='structure_type_add' class='CHECKBOX' <?php if(isset($structure_type_add) && $structure_type_add == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;ADDITION</label>
    				</div>
    				<div class="col-md-2">
    					<label><input id='input_nonstruc_other' name='input_nonstruc_other' class='CHECKBOX' <?php if(isset($input_nonstruc_other) && $input_nonstruc_other == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;OTHER</label>
    				</div>
    			</div>
    			<hr/>
    			<div id='RESIDENTIAL' <?php if(isset($structure_res) && $structure_res == 0){ echo 'hidden';}?>>
        			<div class="row">
                		<h4>RESIDENTIAL</h4>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_singlefam' name='structure_res_singlefam' class='CHECKBOX' <?php if(isset($structure_res_singlefam) && $structure_res_singlefam == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;SINGLE FAMILY RESIDENCE</label>
        				</div>
        				<div class="col-md-2">
        					<label>NO. BEDROOMS<input id='structure_res_singlefam_bed' name='structure_res_singlefam_bed' class='land_use_input' value='<?php if(isset($structure_res_singlefam_bed)) echo $structure_res_singlefam_bed?>' type='number' readonly/></label>
        				</div>
        				<div class="col-md-2 offset-md-4">
        					<label>STRUCTURE SQ. FT.</label>
        					<input id='structure_res_sqft' name='structure_res_sqft' class='land_use_input' value='<?php if(isset($structure_res_sqft)) echo $structure_res_sqft?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_mobilehome' name='structure_res_mobilehome' class='CHECKBOX' <?php if(isset($structure_res_mobilehome) && $structure_res_mobilehome == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;MH PARK SINGLE FAMILY</label>
        				</div>
        				<div class="col-md-2">
        					<label>ADDITION&nbsp;<input id='structure_res_mobilehome_addition' name='structure_res_mobilehome_addition' class='CHECKBOX' <?php if(isset($structure_res_mobilehome_addition) && $structure_res_mobilehome_addition == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        				<div class="col-md-2">
        					<label>ACCESSORY&nbsp;<input id='structure_res_mobilehome_accessory' name='structure_res_mobilehome_accessory' class='CHECKBOX' <?php if(isset($structure_res_mobilehome_accessory) && $structure_res_mobilehome_accessory == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_multifam' name='structure_res_multifam' class='CHECKBOX' <?php if(isset($structure_res_multifam) && $structure_res_multifam == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;MULTI-FAMILY RESIDENCE</label>
        				</div>
        				<div class="col-md-2">
        					<label>NO. UNITS&nbsp;<input id='structure_res_multifam_units' name='structure_res_multifam_units' class='land_use_input' value='<?php if(isset($structure_res_multifam_units)) echo $structure_res_multifam_units?>' type='number' readonly/></label>
        				</div>
        				<div class="col-md-2">
        					<label>NO. BEDROOMS&nbsp;<input id='structure_res_multifam_bed' name='structure_res_multifam_bed' class='land_use_input' value='<?php if(isset($structure_res_multifam_bed)) echo $structure_res_multifam_bed?>' type='number' readonly/></label>
        				</div>
        				<div class="col-md-2 offset-md-2">
        					<label>STRUCTURE HEIGHT</label>
        					<input id='structure_res_height' name='structure_res_height' class='land_use_input' value='<?php if(isset($structure_res_height)) echo $structure_res_height?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_gardet' name='structure_res_gardet' class='CHECKBOX' <?php if(isset($structure_res_gardet) && $structure_res_gardet == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;GARAGE DETACHED</label>
        				</div>
        				<div class="col-md-2 offset-md-6">
        					<label>USE</label>
        					<input id='structure_res_use' name='structure_res_use' class='land_use_input' value='<?php if(isset($structure_res_use)) echo $structure_res_use?>' type='text' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_other' name='structure_res_other' class='CHECKBOX' <?php if(isset($structure_res_other) && $structure_res_other == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;OTHER</label>
        				</div>
        				<div class="col-md-4">
        					<input id='structure_res_other_ans' name='structure_res_other_ans' class='land_use_input' value='<?php if(isset($structure_res_other_ans)) echo $structure_res_other_ans?>' type='text' readonly/>
        				</div>
        				<div class="col-md-2 offset-md-2">
        					<label>CONSTRUCTION VALUE</label>
        					<input id='structure_res_value' name='structure_res_value' class='land_use_input' value='<?php if(isset($structure_res_value)) echo $structure_res_value?>' type='number' readonly/>
        				</div>
        			</div>
        			<br/>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_garatt' name='structure_res_garatt' class='CHECKBOX' <?php if(isset($structure_res_garatt) && $structure_res_garatt == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;GARAGE ATTACHED</label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_floodplain' name='structure_res_floodplain' class='CHECKBOX' <?php if(isset($structure_res_floodplain) && $structure_res_floodplain == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;FLOODPLAIN</label>
        				</div>
        				<div class="col-md-2">
        					<label>FF&nbsp;<input id='structure_res_floodplain_ff' name='structure_res_floodplain_ff' class='CHECKBOX' <?php if(isset($structure_res_floodplain_ff) && $structure_res_floodplain_ff == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        				<div class="col-md-2">
        					<label>FW&nbsp;<input id='structure_res_floodplain_fw' name='structure_res_floodplain_fw' class='CHECKBOX' <?php if(isset($structure_res_floodplain_fw) && $structure_res_floodplain_fw == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_res_wetland' name='structure_res_wetland' class='CHECKBOX' <?php if(isset($structure_res_wetland) && $structure_res_wetland == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;SHORELAND/WETLAND</label>
        				</div>
        			</div>
        			<hr/>
    			</div>
    			<div id="NONRESIDENTIAL" <?php if(isset($structure_nonres) && $structure_nonres == 0){ echo 'hidden';}?>>
        			<div class="row">
                		<h4>NON-RESIDENTIAL</h4>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_agricultural' name='structure_nonres_agricultural' class='CHECKBOX' <?php if(isset($structure_nonres_agricultural) && $structure_nonres_agricultural == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;AGRICULTURAL</label>
        				</div>
        				<div class="col-md-2 offset-md-6">
        					<label>STRUCTURE SQ. FT.</label>
        					<input id='structure_nonres_sqft' name='structure_nonres_sqft' class='land_use_input' value='<?php if(isset($structure_nonres_sqft)) echo $structure_nonres_sqft?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_industrial' name='structure_nonres_industrial' class='CHECKBOX' <?php if(isset($structure_nonres_industrial) && $structure_nonres_industrial == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;INDUSTRIAL</label>
        				</div>
        				<div class="col-md-2 offset-md-6">
        					<label>STRUCTURE HEIGHT</label>
        					<input id='structure_nonres_height' name='structure_nonres_height' class='land_use_input' value='<?php if(isset($structure_nonres_height)) echo $structure_nonres_height?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_business' name='structure_nonres_business' class='CHECKBOX' <?php if(isset($structure_nonres_business) && $structure_nonres_business == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;BUSINESS</label>
        				</div>
        				<div class="col-md-2 offset-md-6">
        					<label>USE</label>
        					<input id='structure_nonres_use' name='structure_nonres_use' class='land_use_input' value='<?php if(isset($structure_nonres_use)) echo $structure_nonres_use?>' type='text' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_campground' name='structure_nonres_campground' class='CHECKBOX' <?php if(isset($structure_nonres_campground) && $structure_nonres_campground == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;CAMPGROUND</label>
        				</div>
        				<div class="col-md-2 offset-md-6">
        					<label>CONSTRUCTION VALUE</label>
        					<input id='structure_nonres_value' name='structure_nonres_value' class='land_use_input' value='<?php if(isset($structure_nonres_value)) echo $structure_nonres_value?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_other' name='structure_nonres_other' class='CHECKBOX' <?php if(isset($structure_nonres_other) && $structure_nonres_other == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;OTHER</label>
        				</div>
        				<div class="col-md-4">
        					<input id='structure_nonres_other_ans' name='structure_nonres_other_ans' class='land_use_input' value='<?php if(isset($structure_nonres_other_ans)) echo $structure_nonres_other_ans?>' type='text' readonly/>
        				</div>
        			</div>
        			<br/>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_floodplain' name='structure_nonres_floodplain' class='CHECKBOX' <?php if(isset($structure_nonres_floodplain) && $structure_nonres_floodplain == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;FLOODPLAIN</label>
        				</div>
        				<div class="col-md-2">
        					<label>FF&nbsp;<input id='structure_nonres_floodplain_ff' name='structure_nonres_floodplain_ff' class='CHECKBOX' <?php if(isset($structure_nonres_floodplain_ff) && $structure_nonres_floodplain_ff == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        				<div class="col-md-2">
        					<label>FW&nbsp;<input id='structure_nonres_floodplain_fw' name='structure_nonres_floodplain_fw' class='CHECKBOX' <?php if(isset($structure_nonres_floodplain_fw) && $structure_nonres_floodplain_fw == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='structure_nonres_shorewet' name='structure_nonres_shorewet' class='CHECKBOX' <?php if(isset($structure_nonres_shorewet) && $structure_nonres_shorewet == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;SHORELAND/WETLAND</label>
        				</div>
        			</div>
        			
        			<hr/>        			
        			<div class="row">
        				<div class="col-md-2" <?php if(!isset($structure_res_garcount) || $structure_res_garcount == 0) echo 'hidden'?>>
        					<label>GARAGE QUANTITY</label>
        					<input id='structure_res_garcount' name='structure_res_garcount' class='land_use_input' value='<?php if(isset($structure_res_garcount)) echo $structure_res_garcount?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft1) || $structure_res_garsqft1 == 0) echo 'hidden'?>>
        					<label>GARAGE 1 SQ. FT</label>
        					<input id='structure_res_garsqft1' name='structure_res_garsqft1' class='land_use_input' value='<?php if(isset($structure_res_garsqft1)) echo $structure_res_garsqft1?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft2) || $structure_res_garsqft2 == 0) echo 'hidden'?>>
        					<label>GARAGE 2 SQ. FT</label>
        					<input id='structure_res_garsqft2' name='structure_res_garsqft2' class='land_use_input' value='<?php if(isset($structure_res_garsqft2)) echo $structure_res_garsqft2?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft3) || $structure_res_garsqft3 == 0) echo 'hidden'?>>
        					<label>GARAGE 3 SQ. FT</label>
        					<input id='structure_res_garsqft3' name='structure_res_garsqft3' class='land_use_input' value='<?php if(isset($structure_res_garsqft3)) echo $structure_res_garsqft3?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft4) || $structure_res_garsqft4 == 0) echo 'hidden'?>>
        					<label>GARAGE 4 SQ. FT</label>
        					<input id='structure_res_garsqft4' name='structure_res_garsqft4' class='land_use_input' value='<?php if(isset($structure_res_garsqft4)) echo $structure_res_garsqft4?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft5) || $structure_res_garsqft5 == 0) echo 'hidden'?>>
        					<label>GARAGE 5 SQ. FT</label>
        					<input id='structure_res_garsqft5' name='structure_res_garsqft5' class='land_use_input' value='<?php if(isset($structure_res_garsqft5)) echo $structure_res_garsqft5?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-2 offset-md-2" <?php if(!isset($structure_res_garsqft6) || $structure_res_garsqft6 == 0) echo 'hidden'?>>
        					<label>GARAGE 6 SQ. FT</label>
        					<input id='structure_res_garsqft6' name='structure_res_garsqft6' class='land_use_input' value='<?php if(isset($structure_res_garsqft6)) echo $structure_res_garsqft6?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft7) || $structure_res_garsqft7 == 0) echo 'hidden'?>>
        					<label>GARAGE 7 SQ. FT</label>
        					<input id='structure_res_garsqft7' name='structure_res_garsqft7' class='land_use_input' value='<?php if(isset($structure_res_garsqft7)) echo $structure_res_garsqft7?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft8) || $structure_res_garsqft8 == 0) echo 'hidden'?>>
        					<label>GARAGE 8 SQ. FT</label>
        					<input id='structure_res_garsqft8' name='structure_res_garsqft8' class='land_use_input' value='<?php if(isset($structure_res_garsqft8)) echo $structure_res_garsqft8?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft9) || $structure_res_garsqft9 == 0) echo 'hidden'?>>
        					<label>GARAGE 9 SQ. FT</label>
        					<input id='structure_res_garsqft9' name='structure_res_garsqft9' class='land_use_input' value='<?php if(isset($structure_res_garsqft9)) echo $structure_res_garsqft9?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_garsqft10) || $structure_res_garsqft10 == 0) echo 'hidden'?>>
        					<label>GARAGE 10 SQ. FT</label>
        					<input id='structure_res_garsqft10' name='structure_res_garsqft10' class='land_use_input' value='<?php if(isset($structure_res_garsqft10)) echo $structure_res_garsqft10?>' type='number' readonly/>
        				</div>
        			</div>
        			<?php if(isset($structure_res_garcount) && $structure_res_garcount != 0) echo '<hr/>';?>
        			<div class="row">
        				<div class="col-md-2" <?php if(!isset($structure_res_deckcount) || $structure_res_deckcount == 0) echo 'hidden'?>>
        					<label>DECK QUANTITY</label>
        					<input id='structure_res_deckcount' name='structure_res_deckcount' class='land_use_input' value='<?php if(isset($structure_res_deckcount)) echo $structure_res_deckcount?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft1) || $structure_res_decksqft1 == 0) echo 'hidden'?>>
        					<label>DECK 1 SQ. FT</label>
        					<input id='structure_res_decksqft1' name='structure_res_decksqft1' class='land_use_input' value='<?php if(isset($structure_res_decksqft1)) echo $structure_res_decksqft1?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft2) || $structure_res_decksqft2 == 0) echo 'hidden'?>>
        					<label>DECK 2 SQ. FT</label>
        					<input id='structure_res_decksqft2' name='structure_res_decksqft2' class='land_use_input' value='<?php if(isset($structure_res_decksqft2)) echo $structure_res_decksqft2?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft3) || $structure_res_decksqft3 == 0) echo 'hidden'?>>
        					<label>DECK 3 SQ. FT</label>
        					<input id='structure_res_decksqft3' name='structure_res_decksqft3' class='land_use_input' value='<?php if(isset($structure_res_decksqft3)) echo $structure_res_decksqft3?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft4) || $structure_res_decksqft4 == 0) echo 'hidden'?>>
        					<label>DECK 4 SQ. FT</label>
        					<input id='structure_res_decksqft4' name='structure_res_decksqft4' class='land_use_input' value='<?php if(isset($structure_res_decksqft4)) echo $structure_res_decksqft4?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft5) || $structure_res_decksqft5 == 0) echo 'hidden'?>>
        					<label>DECK 5 SQ. FT</label>
        					<input id='structure_res_decksqft5' name='structure_res_decksqft5' class='land_use_input' value='<?php if(isset($structure_res_decksqft5)) echo $structure_res_decksqft5?>' type='number' readonly/>
        				</div>
        			</div>        			
        			<div class="row">
        				<div class="col-md-2 offset-md-2" <?php if(!isset($structure_res_decksqft6) || $structure_res_decksqft6 == 0) echo 'hidden'?>>
        					<label>DECK 6 SQ. FT</label>
        					<input id='structure_res_decksqft6' name='structure_res_decksqft6' class='land_use_input' value='<?php if(isset($structure_res_decksqft6)) echo $structure_res_decksqft6?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft7) || $structure_res_decksqft7 == 0) echo 'hidden'?>>
        					<label>DECK 7 SQ. FT</label>
        					<input id='structure_res_decksqft7' name='structure_res_decksqft7' class='land_use_input' value='<?php if(isset($structure_res_decksqft7)) echo $structure_res_decksqft7?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft8) || $structure_res_decksqft8 == 0) echo 'hidden'?>>
        					<label>DECK 8 SQ. FT</label>
        					<input id='structure_res_decksqft8' name='structure_res_decksqft8' class='land_use_input' value='<?php if(isset($structure_res_decksqft8)) echo $structure_res_decksqft8?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft9) || $structure_res_decksqft9 == 0) echo 'hidden'?>>
        					<label>DECK 9 SQ. FT</label>
        					<input id='structure_res_decksqft9' name='structure_res_decksqft9' class='land_use_input' value='<?php if(isset($structure_res_decksqft9)) echo $structure_res_decksqft9?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2" <?php if(!isset($structure_res_decksqft10) || $structure_res_decksqft10 == 0) echo 'hidden'?>>
        					<label>DECK 10 SQ. FT</label>
        					<input id='structure_res_decksqft10' name='structure_res_decksqft10' class='land_use_input' value='<?php if(isset($structure_res_decksqft10)) echo $structure_res_decksqft10?>' type='number' readonly/>
        				</div>
        			</div>
        			<?php if(isset($structure_res_deckcount) && $structure_res_deckcount != 0) echo '<hr/>';?>
    			</div>
    			<div id="NONSTRUCTURAL" <?php if(isset($input_nonstruct) && $input_nonstruct == 0){ echo 'hidden';}?>>
        			<div class="row">
                		<h4>NON-STRUCTURAL</h4>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='input_nonstruc_fill' name='input_nonstruc_fill' class='CHECKBOX' <?php if(isset($input_nonstruc_fill) && $input_nonstruc_fill == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;FILL</label>
        				</div>
        				<div class="col-md-2 offset-md-5">
        					<label>SQ. FT.</label>
        					<input id='input_nonstruc_sqft' name='input_nonstruc_sqft' class='land_use_input' value='<?php if(isset($input_nonstruc_sqft)) echo $input_nonstruc_sqft?>' type='number' readonly/>
        				</div>
        				<div class="col-md-2">
        					<label>VALUE</label>
        					<input id='input_nonstruc_value' name='input_nonstruc_value' class='land_use_input' value='<?php if(isset($input_nonstruc_value)) echo $input_nonstruc_value?>' type='number' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='input_nonstruc_dist' name='input_nonstruc_dist' class='CHECKBOX' <?php if(isset($input_nonstruc_dist) && $input_nonstruc_dist == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;GRADING/LAND DISTURBANCE</label>
        				</div>
        				<div class="col-md-4 offset-md-5">
        					<label>USE</label>
        					<input id='input_nonstruc_use' name='input_nonstruc_use' class='land_use_input' value='<?php if(isset($input_nonstruc_use)) echo $input_nonstruc_use?>' type='text' readonly/>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='input_nonstruc_remov' name='input_nonstruc_remov' class='CHECKBOX' <?php if(isset($input_nonstruc_remov) && $input_nonstruc_remov == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;TREE OR VEGETATION REMOAL</label>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-3">
        					<label><input id='input_nonstruc_othernon' name='input_nonstruc_othernon' class='CHECKBOX' <?php if(isset($input_nonstruc_othernon) && $input_nonstruc_othernon == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/>&nbsp;OTHER</label>
        				</div>
        				<div class="col-md-4">
        					<input id='input_nonstruc_othernon_ans' name='input_nonstruc_othernon_ans' class='land_use_input' value='<?php if(isset($input_nonstruc_othernon_ans)) echo $input_nonstruc_othernon_ans?>' type='text' readonly/>
        				</div>
        			</div>
        			<hr/>
    			</div>
    			<div class="row">
    				<div class="col-md-2">
    					<label>SANITARY PERMIT</label>
    					<input id='additional_sanitary_no' name='additional_sanitary_no' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_sanitary_no)) echo $additional_sanitary_no?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>NO. BEDROOMS</label>
    					<input id='additional_no_bed' name='additional_no_bed' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_no_bed)) echo $additional_no_bed?>' type='number'/>
    				</div>
    				<div class="col-md-2">
    					<label>PUBLIC SEWER</label>
    					<input id='additional_public_sewer' name='additional_public_sewer' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_public_sewer)) echo $additional_public_sewer?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>NON-CONFORM USE</label>
    					<input id='additional_nonconform' name='additional_nonconform' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_nonconform)) echo $additional_nonconform?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>FLOODPLAIN</label>
    					<input id='additional_floodplain' name='additional_floodplain' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_floodplain)) echo $additional_floodplain?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>SHORELAND/WETLAND</label>
    					<input id='additional_shoreland' name='additional_shoreland' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_shoreland)) echo $additional_shoreland?>' type='text'/>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-2">
    					<label>INSPECTION DATE</label>
    					<input id='additional_inspection' name='additional_inspection' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_inspection)) echo $additional_inspection?>' type='date'/>
    				</div>
    				<div class="col-md-6">
    					<label>OTHER DETAILS</label>
    					<input id='additional_other' name='additional_other' class='land_use_input ADMIN_EDIT' value='<?php if(isset($additional_other)) echo $additional_other?>' type='text'/>
    				</div>
    				<div class="col-md-4">
    					<label>ACCESS APPROVAL REQUIRED?</label>
    					<select id='additional_access_approval' name='additional_access_approval' class='land_use_input ADMIN_EDIT' value=''>
    						<option value='pending' <?php if(isset($additional_access_approval) && $additional_access_approval == 'pending'){ echo 'selected';}?>>PENDING</option>
    						<option value='yes' <?php if(isset($additional_access_approval) && $additional_access_approval == 'yes'){ echo 'selected';}?>>YES</option>
    						<option value='no' <?php if(isset($additional_access_approval) && $additional_access_approval == 'no'){ echo 'selected';}?>>NO</option>
    					</select>
    				</div>
    			</div>
			</div>
    		<br/>
    		<div class='color_back'>
    			<div class="row land_permit_heading">
            		<h3 class='land_permit_heading'>IV. PLOT PLAN (SKETCH)</h3>   
    			</div>
    			<div class="row">
    				<a href='<?php echo URL;?>Zoningadmin/PDF_VIEW/<?php echo $permit_num;?>' class='visit_site' target='_blank'>OPEN PDF&nbsp;<i class='fa-solid fa-up-right-from-square'></i></a>
    			</div>
			</div>
			<br/>
    		<div class='color_back'>
    			<div class="row land_permit_heading">
            		<h3 class='land_permit_heading'>V. ACKNOWLEDGEMENTS</h3>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-5">
    					<label></label>
    				</div>
    				<div class="col-md-1">
    					<label>MAIL&nbsp;<input id='permit_mail' name='permit_mail' class='CHECKBOX' <?php if(isset($permit_mail) && $permit_mail == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
    				</div>
    				<div class="col-md-2">
    					<label>PICKUP&nbsp;<input id='permit_pickup' name='permit_pickup' class='CHECKBOX' <?php if(isset($permit_pickup) && $permit_pickup == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
    				</div>
    				<div class="col-md-2">
    					<label>PICKUP NAME</label>
    					<input id='permit_pickup_name' name='permit_pickup_name' class='land_use_input' value='<?php if(isset($permit_pickup_name)) echo $permit_pickup_name?>' type='text' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>PICKUP NUMBER</label>
    					<input id='permit_pickup_number' name='permit_pickup_number' class='land_use_input' value='<?php if(isset($permit_pickup_number)) echo $permit_pickup_number?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-2">
    					<label>ACCEPTED&nbsp;<input id='permit_accepted_terms' name='permit_accepted_terms' class='CHECKBOX' <?php if(isset($permit_accepted_terms) && $permit_accepted_terms == 1){ echo 'checked';}?> type='checkbox' value='1' readonly/></label>
    				</div>
    				<div class="col-md-2">
    					<label>DATE</label>
    					<input id='permit_accepted_date' name='permit_accepted_date' class='land_use_input' value='<?php if(isset($permit_accepted_date)) echo $permit_accepted_date?>' type='date' readonly/>
    				</div>
    				<div class="col-md-2 offset-md-4">
    					<label>APPROVED BY</label>
    					<input id='permit_approved_by' name='permit_approved_by' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_approved_by)) echo $permit_approved_by?>' type='text'/>
    				</div>
    				<div class="col-md-2">
    					<label>DATE PERMIT ISSUED</label>
    					<input id='permit_date_issued' name='permit_date_issued' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_date_issued)) echo $permit_date_issued?>' type='date'/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-3 offset-md-5">
    					<label>INITIAL REVIEW</label>
    					<select id='reviewed' name='reviewed' class='land_use_input ADMIN_EDIT' value=''>
    						<option value='pending' <?php if(isset($reviewed) && $reviewed == 'pending') echo 'selected'?>>PENDING REVIEW</option>
    						<option value='reviewed' <?php if(isset($reviewed) && $reviewed == 'reviewed') echo 'selected'?>>REVIEWED</option>
    					</select>
    				</div>
    				<div class="col-md-2">
    					<label>PERMIT STATUS</label>
    					<select id='status' name='status' class='land_use_input ADMIN_EDIT' value=''>
    						<option value='pending' <?php if(isset($status) && $status == 'pending') echo 'selected'?>>PENDING</option>
    						<option value='conditional' <?php if(isset($status) && $status == 'conditional') echo 'selected'?>>CONDITIONAL</option>
    						<option value='approved' <?php if(isset($status) && $status == 'approved') echo 'selected'?>>APPROVED</option>
    						<option value='denied' <?php if(isset($status) && $status == 'denied') echo 'selected'?>>DENIED</option>
    					</select>
    				</div>
    				<div class="col-md-2">
    					<label>PERMIT NUMBER</label>
    					<input id='permit_number' name='permit_number' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_number)) echo $permit_number?>' type='text'/>
    				</div>
    			</div>
    			<hr/>
    			<div class="row">   
    				<div class="col-md-4">
        				<h4>APPLICATION FEES</h4>
        			</div>
    				<div class="col-md-2 offset-md-4">
    					<input type='hidden' value='0' id='permit_fee_paid' name='permit_fee_paid'>
    					<label>PAID&nbsp;<input id='permit_fee_paid' name='permit_fee_paid' class='CHECKBOX ADMIN_EDIT' <?php if(isset($permit_fee_paid) && $permit_fee_paid == 1){ echo 'checked';}?> type='checkbox' value='1'/></label>
    				</div>
    				<div class="col-md-2">
    					<label>PERMIT FEE</label>
    					<input id='permit_fee' name='permit_fee' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_fee)) echo $permit_fee?>' type='text'/>
    				</div>
    			</div>
    			<hr/>
    			<div class="row">
    				<div class="col-md-4">
    					<label>CONTACT NAME</label>
    					<input id='contact_fullname' name='contact_fullname' class='land_use_input' value='<?php if(isset($contact_fullname)) echo $contact_fullname?>' type='text' readonly/>
    				</div>
    				<div class="col-md-4">
    					<label>CONTACT PHONE</label>
    					<input id='contact_phone' name='contact_phone' class='land_use_input' value='<?php if(isset($contact_phone)) echo $contact_phone?>' type='text' readonly/>
    				</div>
    				<div class="col-md-4">
    					<label>CONTACT EMAIL</label>
    					<input id='contact_email' name='contact_email' class='land_use_input' value='<?php if(isset($contact_email)) echo $contact_email?>' type='text' readonly/>
    				</div>
    			</div>
        	</div>
    		<br/>
		</div>
	</section>
	</form>
</main>