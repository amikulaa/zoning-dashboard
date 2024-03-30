<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">All Applications</h1>
  </div>
	<section class="ftco-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
                        <form id="output-form" method="post" target="_blank" action="<?php echo URL?>zoningadmin/export">
                            <button type="submit" class="export btn btn-dark PAD1">Export to Excel</button>
                        </form>
					</div>
					<div class="row"><label></label></div>
					<div id='scroll_miror_div' class="row"><div id='scroll'></div></div>
					<div class="row"><label></label></div>
					<div id='all_permits_div' class="row">
                        <table id="sqlTable" class="table table-bordered">
                            <thead class="thead-dark sticky-top">
                                <tr>
                                <?php
                                $rs = $this->zoningadmin_model->get_all_applications();
                                $curr_color = '#343A40';
                                    //process first row to head header
                                    foreach ($rs as $row) {
                                        foreach ($row as $key => $value) {
                                            if(strpos($key, 'id') !== false && strpos($key, 'paid') == false){
                                                $curr_color = '#272B30';
                                                ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(strpos($key, 'property_town') !== false){
                                                $curr_color = '#343A40';
                                                ?><th class="th-lg" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(strpos($key, 'structure_type_new') !== false){
                                                $curr_color = '#272B30';
                                                ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(strpos($key, 'additional_sanitary_no') !== false){
                                                $curr_color = '#343A40';
                                                ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(strpos($key, 'permit_mail') !== false){
                                                $curr_color = '#272B30';
                                                ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(strpos($key, 'state') !== false || strpos($key, 'zip') !== false){
                                                ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(  strpos($key, 'name') !== false || 
                                                        strpos($key, 'city') !== false ||
                                                        strpos($key, 'phone') !== false || 
                                                        strpos($key, 'parcel') !== false || 
                                                        strpos($key, 'access_approval') !== false ||
                                                        strpos($key, 'pickup_number') !== false){
                                                ?><th class="th-md" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if($value === '0' || $value === '1' || 
                                                        strpos($key, 'subdiv') !== false || 
                                                        strpos($key, 'zoning_district') !== false || 
                                                        strpos($key, 'acres') !== false){
                                                        ?><th class="th-sm" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else if(  strpos($key, '_date') !== false ||
                                                        strpos($key, 'status') !== false || 
                                                        strpos($key, 'additional_inspection') !== false){
                                                        ?><th class="th-date" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            } else {
                                                ?><th class="th-lg" style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                            }
                                        }
                                        break;
                                    }
                                ?>
                            	</tr>
                            </thead>
                            <tbody class="tbody-dark">
                                <?php
                                    foreach ($rs as $row) {
                                        ?>
                                        <tr>
                                            <?php
                                                foreach ($row as $key => $value) {
                                                    ?><td><?php echo $this->zoningadmin_model->format_output($value);?></td><?php
                                                }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                <?php
                                    $rs = $this->zoningadmin_model->get_all_applications();
                                    $curr_color = '#e2e6ea';
                                    //process first row to head header
                                    foreach ($rs as $row) {
                                        foreach ($row as $key => $value) {
                                            if(strpos($key, 'id') !== false && strpos($key, 'paid') == false){
                                                $curr_color = '#272B30';
                                            } else if(strpos($key, 'property_town') !== false){
                                                $curr_color = '#343A40';
                                            } else if(strpos($key, 'structure_type_new') !== false){
                                                $curr_color = '#272B30';
                                            } else if(strpos($key, 'additional_sanitary_no') !== false){
                                                $curr_color = '#343A40';
                                            } else if(strpos($key, 'permit_mail') !== false){
                                                $curr_color = '#272B30';
                                            }
                                            ?><th style="background-color: <?php echo $curr_color;?>"><?php echo str_replace("_", " ", $key);?></th><?php
                                        }
                                        break;
                                    }
                                ?>
                            	</tr>
                            </thead>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>