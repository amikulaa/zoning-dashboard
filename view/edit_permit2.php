<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa-solid fa-file-invoice"></i>&nbsp;Issurer Documentation</h1>
  	</div>     
  	<form method="POST" action="<? echo URL ?>ZoningAdmin/save_lup_updates_building/<? echo $permit_num;?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<input id='permit_number' name='permit_number' class='land_use_input HEAD' value='<?php if(isset($permit_number)) echo $permit_number?>' type='text' title='PERMIT NUMBER' readonly/>
				</div>
				<div class="col-md-8">
					<button id='save_lup_button' type='submit' class='btn btn-primary PAD' title='CLICK TO SAVE'>SAVE</button>
        		<br/>
				</div>
			</div>       	
			<div class='color_back'>
    			<div class="row land_permit_heading">
    				<div class="col-md-3">
            			<h3 class='land_permit_heading'>ZONING PERMIT</h3>
    				</div>
    				<div class="col-md-1 offset-md-1">
    					<a id='permit_pdf' class='button_style PADU' href='<? echo URL ?>ZoningAdmin/open_fillable_pdf/<? echo $permit_num;?>' target='_blank' title='CLICK TO OPEN SUBMITTED APPLICATION'><i class="fa-regular fa-file-pdf fa-xl"></i></a>
    				</div>
    				<div class="col-md-1">
    					<a id='plot_pdf' class='button_style PADU' href='<? echo URL ?>Zoningadmin/PDF_VIEW/<? echo $permit_num;?>' target='_blank' title='CLICK TO OPEN SUBMITTED PLOT PLAN'><i class="fa-solid fa-pen-to-square fa-xl"></i></a>
    				</div>
    				<div class="col-md-6">
    					<a id='open_pdf_button' class='button_style PADU' href='<? echo URL ?>ZoningAdmin/open_details/<? echo $permit_num;?>' target='_blank' title='CLICK TO OPEN PERMIT PDF'>PERMIT PDF</a>
    				</div>
    			</div>
    			<br/>
        		<div class="row">
        			<div class="col-md-12">
    					<label>ISSUED PERMIT</label>
        				<select id='status' name='status' class='land_use_input ADMIN_EDIT' value='<?php if(isset($status)) echo $status?>'>
        					<option value='pending' <?php if(isset($status) && $status == 'pending') echo 'selected';?>>PENDING</option>
        					<option value='issued' <?php if(isset($status) && $status == 'issued') echo 'selected';?>>ISSUED</option>
        				</select>
        			</div>
        		</div>
    			<hr/>
    			<div class="row">
    				<div class="col-md-6">
    					<label>PROPERTY OWNER</label>
    						<input id='owner1_fullname' name='owner1_fullname' class='land_use_input' value='<?php if(isset($owner1_fullname)) echo $owner1_fullname?>' type='text' readonly/>
    						<input id='owner2_fullname' name='owner2_fullname' class='land_use_input' value='<?php if(isset($owner2_fullname)) echo $owner2_fullname?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-6">
    					<label>SITE ADDRESS</label>
    						<input id='owner1_address' name='owner1_address' class='land_use_input' value='<?php if(isset($owner1_address)) echo $owner1_address?>' type='text' readonly/>
    						<input id='owner2_address' name='owner2_address' class='land_use_input' value='<?php if(isset($owner2_address)) echo $owner2_address?>' type='text' readonly/>
    				</div>
    				<div class="col-md-4">
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
    			</div>
    			<hr/>
    			<div class="row">
    				<div class="col-md-12">
    					<label>FOR</label>
                        <select id='property_desc_for' name='property_desc_for' class='selectpicker land_use_input ADMIN_EDIT' data-width="100%" data-style="btn-simple"
                        	value='<?php if(isset($property_desc_for)) echo $property_desc_for;?>' data-live-search='true' onchange='update_property_desc_no(this.value);'>
    						<?php echo $this->zoningadmin_model->get_descriptions($property_desc_for);?>
                        </select>
					</div>
					<input id='property_for_no' name='property_for_no' value='<?php if(isset($property_for_no)) echo $property_for_no?>' hidden/>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-6">
    					<label>PARCEL</label>
    						<input id='parcel' name='parcel' class='land_use_input' value='<?php if(isset($parcel)) echo $parcel?>' type='text' readonly/>
    				</div>
    				<div class="col-md-4">
    					<label>TOWN</label>
    						<input id='property_town' name='property_town' class='land_use_input' value='<?php if(isset($property_town)) echo $property_town?>' type='text' readonly/>
    				</div>
    			</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-12">
    					<label>PROPERTY DESCRIPTION</label>
    						<input id='property_description' name='property_description' class='land_use_input' value='<?php if(isset($property_description)) echo $property_description?>' type='text' readonly/>
    				</div>
    			</div>
    			<hr/>
    			<div class="row">
    				<div class="col-md-2">
    					<label>DATE PERMIT ISSUED</label>
    					<input id='permit_date_issued' name='permit_date_issued' class='land_use_input' value='<?php if(isset($permit_date_issued)) echo $permit_date_issued?>' type='date' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>APPROVED BY</label>
    					<input id='permit_approved_by' name='permit_approved_by' class='land_use_input' value='<?php if(isset($permit_approved_by)) echo $permit_approved_by?>' type='text' readonly/>
    				</div>
    				<div class="col-md-8">
    					<label>THIS PERMIT EXPIRES ON (UNLESS RENEWED BEFORE DATE)</label>
    						<input id='permit_expiration' name='permit_expiration' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_expiration)) echo $permit_expiration?>' type='date'/>
    				</div>
    			</div>
			</div>
			<br/>
    		<div class='color_back'>
        		<div class="row land_permit_heading">
        			<div class="col-md-3">
                		<h3 class='land_permit_heading'>RECEIPT</h3>
        			</div>
        			<div class="col-md-6 offset-md-3">
        				<a id='open_pdf_button2' class='button_style PADU' href='<? echo URL ?>ZoningAdmin/open_receipt/<? echo $permit_num;?>' target='_blank' title='CLICK TO OPEN RECEIPT PDF'>RECEIPT PDF</a>
        			</div>
        		</div>
        		<br/>
    			<div class="row">
    				<div class="col-md-12">
    					<label>MAILING ADDRESS</label>
    						<input id='property_mailing_address' name='property_mailing_address' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_mailing_address)) echo $property_mailing_address?>' type='text'/>
    				</div>
				</div>
    			<br/>
    			<div class="row">
    				<div class="col-md-2">
    					<label>LOT NO</label>
    						<input id='property_lot_no' name='property_lot_no' class='land_use_input' value='<?php if(isset($property_lot_no)) echo $property_lot_no?>' min=0 type='number' readonly/>
    				</div>
    				<div class="col-md-2">
    					<label>BLOCK</label>
    						<input id='property_block_no' name='property_block_no' class='land_use_input' value='<?php if(isset($property_block_no)) echo $property_block_no?>' min=0 type='number' readonly/>
    				</div>
    				<div class="col-md-4">
    					<label>CSM NO</label>
    						<input id='property_csm_no' name='property_csm_no' class='land_use_input' value='<?php if(isset($property_csm_no)) echo $property_csm_no?>' min=0 type='number' readonly/>
    				</div>
    				<div class="col-md-4">
    					<label>SUBDIVISION</label>
    						<input id='property_subdiv' name='property_subdiv' class='land_use_input' value='<?php if(isset($property_subdiv)) echo $property_subdiv?>' type='text' readonly/>
    				</div>
				</div>
				<br/>
				<div class="row">
    				<div class="col-md-12">
    					<label>PROPERTY DESCRIPTION OTHER</label>
    						<input id='property_description_other' name='property_description_other' class='land_use_input ADMIN_EDIT' value='<?php if(isset($property_description_other)) echo $property_description_other?>' type='text'/>
    				</div>
				</div>
				<hr/>
    			<div class="row">
    				<div class="col-md-3">
            			<table>
            				<tr><td>
                        		<div class="input-group input-group-sm">
                            		<div class="input-group-prepend">
                            			<span class="input-group-text">ZONING FEE</span>
                            		</div>
                            		<input id='permit_fee' name='permit_fee' class='form-control' value='<?php if(isset($permit_fee)) echo $permit_fee?>' type='text' readonly/>
                            	</div>
                            </td></tr>
                            <tr><td><hr/></td></tr>
            				<tr><td>
                        		<div class="input-group input-group-sm">
                            		<div class="input-group-prepend">
                            			<span class="input-group-text">CHECK</span>
                            		</div>
                            		<input id='permit_fee_check' name='permit_fee_check' class='form-control ADMIN_EDIT' value='<?php if(isset($permit_fee_check)) echo $permit_fee_check?>' type='number'/>
                            	</div>
                            </td></tr>
            				<tr><td>
                        		<div class="input-group input-group-sm">
                            		<div class="input-group-prepend">
                            			<span class="input-group-text">CASH</span>
                            		</div>
                            		<input id='permit_fee_cash' name='permit_fee_cash' class='form-control ADMIN_EDIT' value='<?php if(isset($permit_fee_cash)) echo $permit_fee_cash?>' type='number'/>
                            	</div>
                            </td></tr>
            				<tr><td>
                        		<div class="input-group input-group-sm">
                            		<div class="input-group-prepend">
                            			<span class="input-group-text">ONLINE</span>
                            		</div>
                            		<input id='permit_fee_online' name='permit_fee_online' class='form-control ADMIN_EDIT' value='<?php if(isset($permit_fee_online)) echo $permit_fee_online?>' type='number'/>
                            	</div>
                            </td></tr>
            			</table>
    				</div>
    				<div class="col-md-1">
    					<input type='hidden' value='0' id='permit_fee_paid' name='permit_fee_paid'>
    					<label>PAID&nbsp;<input id='permit_fee_paid' name='permit_fee_paid' class='CHECKBOX ADMIN_EDIT' <?php if(isset($permit_fee_paid) && $permit_fee_paid == 1){ echo 'checked';}?> type='checkbox' value='1'/></label>
    				</div> 
    			    <div class="col-md-8">
    					<textarea id='permit_fee_notes' name='permit_fee_notes' class='land_use_input ADMIN_EDIT' rows=6 placeholder='PERMIT FEE NOTES...' value=<?php if(isset($permit_fee_notes)) echo $permit_fee_notes?>><?php if(isset($permit_fee_notes)) echo $permit_fee_notes?></textarea>
    				</div>
    			</div>
    			<hr/>
    			<div class="row">
    				<div class="col-md-6">
    					<label>PAID BY / CONTRACTOR INSTALLER</label>
    					<input id='permit_paid_by' name='permit_paid_by' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_paid_by)) echo $permit_paid_by?>' type='text'/>
    				</div>
    				<div class="col-md-6">
    					<label>AT</label>
    					<input id='permit_paid_at' name='permit_paid_at' class='land_use_input ADMIN_EDIT' value='<?php if(isset($permit_paid_at)) echo $permit_paid_at?>' type='text'/>
    				</div>
    			</div>
    			<br/>
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
	</form>
</main>	