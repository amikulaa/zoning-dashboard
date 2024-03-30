<?php

/**
* Zoning Dashboard Model
Some code is removed for privacy conerns.
*
* Author: Anna Mikula, 2023
**/

namespace LRS\Model;

use LRS\Core\Model;
use LRS\Libs\Helper;

class zoningadmin_model extends Model
{
    var $pin_municipality;
    var $pin_town;
    var $pin_range;
    var $pin_section;
    var $pin_quarter;
    var $pin_id_number;
    
    /**
     * Checks access to the LRS
     */
    public function is_authorized_user(){
	//removed for privacy conerns
    }
    
    /**
     * Sanitize string before insertion.
     *
     * @param unknown $var
     * @return unknown
     */
    private function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = trim($var);
        $var = str_replace("'",'&apos;',$var);
        return $var;
    }
    
    /**
     * Reformat before output
     *
     * @param unknown $var
     * @return unknown
     */
    public function format_output($var)
    {
        $var = str_replace('&amp;','&', $var);
        $var = str_replace("&apos;","'",$var);
        $var = str_replace('&quot;','"', $var);
        $var = trim($var);
        return $var;
    }
    
    /**
     * Display the submitted pdf.
     *
     * @return unknown
     */
    public function get_pdf($id){
        $sql = "SELECT * FROM `zoning`.`zoning_application_pdfs` WHERE `id` = ?;";
        $query = $this->db_webconn->prepare($sql);
        $query->execute([$id]);
        if($query->rowCount() != 0){
            $result = $query->fetchAll();
            foreach ($result as $row){
                echo $row->file_data;
            }
        }
    }
    
    /**
     * This function returns the permits, with button to open that specific permit.
     */
    public function get_approval_permits(){
        $sql = "SELECT * FROM `zoning`.`zoning_dashboard_permits` ORDER BY `id` ASC;";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            $html = "<table class='approval_table'><tbody>";
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $html .= "
                <tr>
                    <td><button id='permit$row->id' class='approval_buttons'>$row->name</button></td>
                </tr>";
            }
            $html .= "</tbody></table>";
            return $html;
        } else {
            return 'OPE! ERROR retrieving permits, please try agian.';
        }
    }
    
    /**
     * This function returns the submitted permits
     */
    public function get_all_applications(){
        $sql = "SELECT * FROM `zoning`.`zoning_application`;";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute()){
            return $query->fetchAll();
        } else {
            return 0;
        }
    }
    
    /**
     * This function returns the available permits to be printed out
     * on the zoning admin dashboard.
     */
    public function get_permits(){
        $sql = "SELECT * FROM `zoning`.`zoning_dashboard_permits` ORDER BY `id` ASC;";
        $query = $this->db->prepare($sql);
        if($query->execute()){
            $html = "<table class='table myaccordion table-hover' id='accordion'><thead>
								<tr>
									<th>#</th>
									<th>Permit Name</th>
									<th>Applications</th>
									<th>Description</th>
									<th>Site</th>
									<th>Live Date</th>
								</tr>
							</thead><tbody>";
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $html .= "                
                <tr data-toggle='collapse'>
                    <th scope='row'>$row->id</th>
                        <td>$row->name</td>
                        <td><button id='permit$row->id' class='permit_buttons'>APPLICATIONS</button></td>
						<th>$row->description</th>
						<th><a href='$row->site_url' class='visit_site' target='_blank'><i class='fa-solid fa-up-right-from-square'></i></a></th>
						<th>$row->live_date</th>
                </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else {
            return 'OPE! ERROR retrieving permits, please try agian.';
        }
    }
    
    /**
     * Permit1 table information, aka land and zoning use permit.
     * Approved can be = [denied, pending, conditional, approved].
     */
    public function get_permit1_table(){
        $sql = "SELECT * FROM `zoning`.`zoning_application` WHERE `status` = 'pending';";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute() && $query->rowCount() != 0){
            $html = "<div class='table100 ver1 m-b-110'>
                <div class='table100-head'>
                    <table>
                    <thead>
                        <tr class='row100 head'>
                        <th class='cell100 column1'>Permit Applications</th>
                        <th class='cell100 column2'>Structure Type</th>
                        <th class='cell100 column3'>Plot Plan</th>
                        <th class='cell100 column4'>Reviewed</th>
                        <th class='cell100 column4'>Status</th>
                        <th class='cell100 column5'>View</th>
                    </tr>
                    </thead>
                    </table>
                </div>
                <div class='table100-body js-pscroll ps ps--active-y'>
                <table>
            <tbody>";
            
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $col1 = $row->owner1_fullname . ': ' . $row->parcel;
                $col2 = $row->structure_type_new == 1 ? 'New Structure, ' : 'Addition, ';
                $col2 .= $row->structure_res == 1 ? 'Residential' : 'Non-Residential';
                $col3 = $row->TIMESTAMP;
                $col4 = $row->status;
                $col5 = $row->id;
                $col6 = $row->reviewed;
                $html .= "<tr class='row100 body'>
                    <td class='cell100 column1'>
                        <form method='POST' action='" . URL . "ZoningAdmin/edit/$col5'>
                            <button id='edit_$col5' class='view_pdf' title='CLICK TO EDIT'>$col1</button>
                        </form>
                    </td>
                    <td class='cell100 column2'>$col2</td>
                    <td class='cell100 column3'>                        
                        <form method='POST' action='" . URL . "Zoningadmin/PDF_VIEW/$col5' target='_blank'>
                            <button id='plot_pdf_$col5' class='view_pdf' title='CLICK TO OPEN PLOT PLAN'>$col3</button>
                        </form>
                    </td>
                    <td class='cell100 column4'>$col6</td>
                    <td class='cell100 column4'>$col4</td>
                    <td class='cell100 column5'>
                        <form method='POST' action='" . URL . "ZoningAdmin/open_fillable_pdf/$col5' target='_blank'>
                            <button id='open_$col5' class='view_pdf' title='CLICK TO OPEN PERMIT PDF'>PDF</button>
                        </form>
                    </td>
                    </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else if($query->rowCount() == 0){
            return 'No Current Pending Applications';
        } else {
            return 'OPE! ERROR, please try again.';
        }
    }
    
    /**
     * Permit2 table issued permits
     */
    public function get_issued_permits(){
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer` WHERE `status` = 'issued';";
        $query = $this->db->prepare($sql);
        if($query->execute() && $query->rowCount() != 0){
            $html = "<div class='table100 ver1 m-b-110'>
                <div class='table100-head'>
                    <table>
                    <thead>
                        <tr class='row100 head'>
                        <th class='cell100 column1_sm'>Approved Permits</th>
                        <th class='cell100 column2'>Structure Type</th>
                        <th class='cell100 column3'>Approval Timestamp</th>
                        <th class='cell100 column4'>Status</th>
                        <th class='cell100 column5'>View</th>
                    </tr>
                    </thead>
                    </table>
                </div>
                <div class='table100-body js-pscroll ps ps--active-y'>
                <table>
            <tbody>";
            
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $col1 = $row->parcel;
                $col2 = $row->structure_type_new == 1 ? 'New Structure, ' : 'Addition, ';
                $col2 .= $row->structure_res == 1 ? 'Residential' : 'Non-Residential';
                $col3 = $row->TIMESTAMP;
                $col4 = $row->status;
                $col5 = $row->id;
                $html .= "<tr class='row100 body'>
                    <td class='cell100 column1_sm'>
                        <form method='POST' action='" . URL . "ZoningAdmin/edit_permit2/$col5'>
                            <button id='edit_$col5' class='view_pdf' title='CLICK TO EDIT'>$col1</button>
                        </form>
                    </td>
                    <td class='cell100 column2'>$col2</td>
                    <td class='cell100 column3'>$col3</td>
                    <td class='cell100 column4'>$col4</td>
                    <td class='cell100 column5'>
                        <form method='POST' action='" . URL . "ZoningAdmin/open_all_pdfs/$col5' target='_blank'>
                            <button id='open_$col5' class='view_pdf' title='CLICK FOR ALL PDFS'>PDFs</button>
                        </form>
                    </td>
                    </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else if($query->rowCount() == 0){
            return 'No Current Issued Applications';
        } else {
            return 'OPE! ERROR, please try again.';
        }
    }
    
    /**
     * Permit2 table information, aka building permit.
     */
    public function get_permit2_table(){
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer` WHERE `status` = 'pending';";
        $query = $this->db->prepare($sql);
        if($query->execute() && $query->rowCount() != 0){
            $html = "<div class='table100 ver1 m-b-110'>
                <div class='table100-head'>
                    <table>
                    <thead>
                        <tr class='row100 head'>
                        <th class='cell100 column1_sm'>Approved Permits</th>
                        <th class='cell100 column2'>Structure Type</th>
                        <th class='cell100 column3'>Approval Timestamp</th>
                        <th class='cell100 column4'>Status</th>
                        <th class='cell100 column5'>View</th>
                    </tr>
                    </thead>
                    </table>
                </div>
                <div class='table100-body js-pscroll ps ps--active-y'>
                <table>
            <tbody>";
            
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $col1 = $row->parcel;
                $col2 = $row->structure_type_new == 1 ? 'New Structure, ' : 'Addition, ';
                $col2 .= $row->structure_res == 1 ? 'Residential' : 'Non-Residential';
                $col3 = $row->TIMESTAMP;
                $col4 = $row->status;
                $col5 = $row->id;
                $html .= "<tr class='row100 body'>
                    <td class='cell100 column1_sm'>
                        <form method='POST' action='" . URL . "ZoningAdmin/edit_permit2/$col5'>
                            <button id='edit_$col5' class='view_pdf' title='CLICK TO EDIT'>$col1</button>
                        </form>
                    </td>
                    <td class='cell100 column2'>$col2</td>
                    <td class='cell100 column3'>$col3</td>
                    <td class='cell100 column4'>$col4</td>
                    <td class='cell100 column5'>
                        <form method='POST' action='" . URL . "ZoningAdmin/open_all_pdfs/$col5' target='_blank'>
                            <button id='open_$col5' class='view_pdf' title='CLICK FOR ALL PDFS'>PDFs</button>
                        </form>
                    </td>
                    </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else if($query->rowCount() == 0){
            return 'No Current Pending Applications';
        } else {
            return 'OPE! ERROR, please try again.';
        }
    }
    
    /**
     * Gets daily application counts for adminzoning home dashboard.
     * @return string
     */
    public function get_counts(){
        $seven_days_ago = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-7, date("Y")));
        $sql = "SELECT DATE(`TIMESTAMP`) AS DateDay,
                    COUNT(*) AS NumApps
             FROM `zoning`.`zoning_application`
             WHERE DATE(`TIMESTAMP`) >= ?
             GROUP BY DATE(`TIMESTAMP`)
             ORDER BY DateDay";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$seven_days_ago]) && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            $fresh_arr = [];
            foreach($rs as $row){
                $date_arr = explode('-', $row->DateDay);
                array_push($fresh_arr, [date("l", mktime(0, 0, 0, $date_arr[1], $date_arr[2], $date_arr[0])), $row->DateDay, $row->NumApps]);
            }
            return json_encode($fresh_arr);
        } else if($query->rowCount() == 0){
            return json_encode(0);
        } else {
            return json_encode('ERROR');
        }
    }
    
    /**
     * Gets daily application counts for adminzoning home dashboard
     * by user piock of time period.
     * 
     * @return string
     */
    public function get_special_counts(){
        $amt_time = isset($_POST['amt_time']) ? $_POST['amt_time'] : 'week';
        $date_var = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-7, date("Y")));
        switch($amt_time){
            case 'week':        
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-7, date("Y")));
                break;
            case 'month':
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));
                break;
            case 'year':
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));
                break;
        }
        $sql = "SELECT DATE(`TIMESTAMP`) AS DateDay,
                    COUNT(*) AS NumApps
             FROM `zoning`.`zoning_application`
             WHERE DATE(`TIMESTAMP`) >= ?
             GROUP BY DATE(`TIMESTAMP`)
             ORDER BY DateDay";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$date_var]) && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            $fresh_arr = [];
            foreach($rs as $row){
                $date_arr = explode('-', $row->DateDay);
                array_push($fresh_arr, [date("l", mktime(0, 0, 0, $date_arr[1], $date_arr[2], $date_arr[0])), $row->DateDay, $row->NumApps]);
            }
            return json_encode($fresh_arr);
        } else if($query->rowCount() == 0){
            return json_encode(0);
        } else {
            return json_encode('ERROR');
        }
    }
    
    /**
     * Get the application from record #.
     * 
     * @param num $id
     */
    public function get_application($id){
        $sql = "SELECT * FROM `zoning`.`zoning_application` WHERE `id` = ?";
        $query = $this->db_webconn->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }
    
    /**
     * Get the application from record #.
     *
     * @param num $id
     */
    public function get_application_permit2($id){
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer` WHERE `id` = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }
    
    /**
     * This function updates the lup application with admin updates.
     * 
     * @param id $permit_num
     * @return boolean update success true or false
     */
    public function save_lup_updates($permit_num){
        $is_approved = false;
        $VAR_LIST = '';
        $PARAM_LIST[':id'] = $permit_num;
        foreach($_POST as $key => $value){
            $VAR_LIST .= "`" . $key . "` = :" . $key . ", ";
            $key_pdo = ":" . $key;
            if(($value == '' && (strpos($key, '_no') !== false)) || $value == ''){
            	$value = NULL;
            	$PARAM_LIST[$key_pdo] = $value;
            }else{
            	$PARAM_LIST[$key_pdo] = $this->sanitizeString($value);
            }
            if($key == 'status' && $value == 'approved'){
                $is_approved = true;
            }
        }
        $VAR_LIST = substr($VAR_LIST, 0, -2);
        $sql = "UPDATE `zoning`.`zoning_application` SET $VAR_LIST
                    WHERE `id` = :id;";
              
        $query = $this->db_webconn->prepare($sql);
        $rs = $query->execute($PARAM_LIST);
        
        if($rs === false){
            return false;
        } else {
            if($is_approved){
                $result = $this->insert_approved_permits($_POST, $permit_num);
                if($result){
                    return true;
                }
            }
            return true;
        }
    }
    
    /**
     * This function updates building permit
     *
     * @param id $permit_num
     * @return boolean update success true or false
     */
    public function save_lup_updates_building($permit_num){
        $VAR_LIST = '';
        $PARAM_LIST[':id'] = $permit_num;
        foreach($_POST as $key => $value){
            $VAR_LIST .= "`" . $key . "` = :" . $key . ", ";
            $key_pdo = ":" . $key;
            $PARAM_LIST[$key_pdo] = $this->sanitizeString($value);
        }
        $VAR_LIST = substr($VAR_LIST, 0, -2);
        $sql = "UPDATE `zoning`.`zoning_application_issuer` SET $VAR_LIST
                    WHERE `id` = :id;";
        $query = $this->db->prepare($sql);
        $rs = $query->execute($PARAM_LIST);
        if($rs === false){
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * This function inserts the land use permit into the building
     * permit database on approval.
     * 
     * @param unknown $VAR_LIST
     * @param unknown $PARAM_LIST
     */
    public function insert_approved_permits($POST, $ID){
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer` WHERE `id` = ?;";
        $query = $this->db->prepare($sql);
        if($query->execute([$ID]) && $query->rowCount() != 0){
            return false;
        } else {
            $sql = "INSERT INTO `zoning`.`zoning_application_issuer` (`id`) VALUES (?);";
            $query = $this->db->prepare($sql);
            if($query->execute([$ID]) == false){
                return false;
            } else {
                $VAR_LIST = '';
                $PARAM_LIST[':id'] = $ID;
                foreach($POST as $key => $value){
                    if($key == 'status'){
                        $value = 'pending';
                    } 
                    $VAR_LIST .= "`" . $key . "` = :" . $key . ", ";
                    $key_pdo = ":" . $key;
                    $PARAM_LIST[$key_pdo] = $this->sanitizeString($value);
                }
                $VAR_LIST = substr($VAR_LIST, 0, -2);
                $sql = "UPDATE `zoning`.`zoning_application_issuer` SET $VAR_LIST
                    WHERE `id` = :id;";
                $query = $this->db->prepare($sql);
                $rs = $query->execute($PARAM_LIST);
                if($rs === false){
                    return false;
                } else {
                    return true;
                }
            }
        }
    }
    
    /**
     * This function gets the status report.
     * 
     * [approved, conditional, pending, denied]
     * @param string $status  the status it needs to be equal to
     */
    public function get_status_report($status){
        $sql = "SELECT * FROM `zoning`.`zoning_application` WHERE `status` = ?";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$status]) && $query->rowCount() != 0){
            $status = ucwords($status);
            $html = "<div class='table100 ver1 m-b-110'>
                <div class='table100-head'>
                    <table>
                    <thead>
                        <tr class='row100 head'>
                        <th class='cell100 column1'>$status Applications</th>
                        <th class='cell100 column2'>Structure Type</th>
                        <th class='cell100 column3'>Date</th>
                        <th class='cell100 column4'>Status</th>
                        <th class='cell100 column5'>View</th>
                    </tr>
                    </thead>
                    </table>
                </div>
                <div class='table100-body js-pscroll ps ps--active-y'>
                <table>
            <tbody>";
            
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $col1 = $row->owner1_fullname . ': ' . $row->parcel;
                $col2 = $row->structure_type_new == 1 ? 'New Structure, ' : 'Addition, ';
                $col2 .= $row->structure_res == 1 ? 'Residential' : 'Non-Residential';
                $col3 = $row->TIMESTAMP;
                $col4 = $row->status;
                $col5 = $row->id;
                $html .= "<tr class='row100 body'>
                    <td class='cell100 column1'>";
                if($status == 'Approved'){
                    $html .= $col1;
                } else {
                    $html .= "
                        <form method='POST' action='" . URL . "ZoningAdmin/edit_status/$col5' target='_blank'>
                            <button id='edit_$col5' class='view_pdf' title='CLICK TO EDIT'>$col1</button>
                        </form>";
                }
                $html .= "</td>
                    <td class='cell100 column2'>$col2</td>
                    <td class='cell100 column3'>$col3</td>
                    <td class='cell100 column4'>$col4</td>
                    <td class='cell100 column5'>
                        <form method='POST' action='" . URL . "ZoningAdmin/open_fillable_pdf/$col5' target='_blank'>
                            <button id='open_$col5' class='view_pdf' title='CLICK TO OPEN PERMIT PDF'>PDF</button>
                        </form>
                    </td>
                    </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else if($query->rowCount() == 0){
            return 'No Current ' . ucwords($status) . ' Permits';
        } else {
            return 'OPE! ERROR, please try again.';
        }
    }
    
    /**
     * This function gets the requested amt of time report.
     * 
     * [month, quarter, year]
     * @param string $status  the status it needs to be equal to
     */
    public function get_time_report($length){
        $date_var = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-7, date("Y")));
        switch($length){
            case 'month':
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));
                break;
            case 'quarter':
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m")-3, date("d"), date("Y")));
                break;
            case 'year':
                $date_var = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));
                break;
        }
        
        $sql = "SELECT * FROM `zoning`.`zoning_application`
                WHERE DATE(`TIMESTAMP`) >= ?;";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$date_var]) && $query->rowCount() != 0){
            $length = ucwords($length);
            $html = "<div class='table100 ver1 m-b-110'>
                <div class='table100-head'>
                    <table>
                    <thead>
                        <tr class='row100 head'>
                        <th class='cell100 column1'>$length Applications</th>
                        <th class='cell100 column2'>Structure Type</th>
                        <th class='cell100 column3'>Date</th>
                        <th class='cell100 column4'>Status</th>
                        <th class='cell100 column5'>View</th>
                    </tr>
                    </thead>
                    </table>
                </div>
                <div class='table100-body js-pscroll ps ps--active-y'>
                <table>
            <tbody>";
            
            $rs = $query->fetchAll();
            foreach($rs as $row){
                $col1 = $row->owner1_fullname . ': ' . $row->parcel;
                $col2 = $row->structure_type_new == 1 ? 'New Structure, ' : 'Addition, ';
                $col2 .= $row->structure_res == 1 ? 'Residential' : 'Non-Residential';
                $col3 = $row->TIMESTAMP;
                $col4 = $row->status;
                $col5 = $row->id;
                $html .= "<tr class='row100 body'>
                    <td class='cell100 column1'>$col1</td>
                    <td class='cell100 column2'>$col2</td>
                    <td class='cell100 column3'>$col3</td>
                    <td class='cell100 column4'>$col4</td>
                    <td class='cell100 column5'>
                        <form method='POST' action='" . URL . "ZoningAdmin/open_fillable_pdf/$col5' target='_blank'>
                            <button id='open_$col5' class='view_pdf' title='CLICK TO OPEN PERMIT PDF'>PDF</button>
                        </form>
                    </td>
                    </tr>";
            }
            $html .= "</tbody>
						</table>";
            return $html;
        } else if($query->rowCount() == 0){
            return 'No Current ' . ucwords($length) . ' Permits';
        } else {
            return 'OPE! ERROR, please try again.';
        }
    }
    
    /**
     * Get previous query num for editing purposes.
     * 
     * @param int $old_num
     */
    public function back_edit($permit_num){
        $sql = "SELECT * FROM `zoning`.`zoning_application` WHERE `status` = 'pending' AND `id` < ? ORDER BY `id` DESC LIMIT 1;";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$permit_num]) && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            foreach($rs as $row){
                return $row->id;
            }
        }
        return 0;
    }
    
    /**
     * Get next query num for editing purposes.
     *
     * @param int $old_num
     */
    public function next_edit($permit_num){
        $sql = "SELECT * FROM `zoning`.`zoning_application` WHERE `status` = 'pending' AND `id` > ? ORDER BY `id` ASC LIMIT 1;";
        $query = $this->db_webconn->prepare($sql);
        if($query->execute([$permit_num]) && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            foreach($rs as $row){
                return $row->id;
            }
        }
        return 0;
    }
    
    /**
     * This function gets the for descriptions and nums
     * for the issurer tab
     */
    public function get_descriptions($property_desc_for){
        $options = '';
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer_desc`;";
        $query = $this->db->prepare($sql);
        if($query->execute() && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            $in_opt = false;
            $in_opt2 = false;
            foreach($rs as $row){
                if(intval($row->desc_num) < 10){
                    if($in_opt2){
                        $options .= "<option data-divider='true'></option>";
                    }
                    $options .= "<option disabled>$row->desc_text</option>";
                    $in_opt2 = true;
                } else if(intval($row->desc_num) < 10000 && $row->desc_num % 10 == 0){
                    if($in_opt){
                        $options .= "</optgroup>";
                    }
                    $options .= "<optgroup label='" . substr($row->desc_num, 0, 3) . ": $row->desc_text'>";
                    $in_opt = true;
                } else {
                    $options .= "<option value='$row->desc_num' data-subtext='" . substr($row->desc_num, 0, 3) . "'";
                    if($row->desc_num == $property_desc_for){
                        $options .= " selected";
                    } 
                    $options .= ">$row->desc_text</option>";
                }
            }
            $options .= "</optgroup></optgroup>";
        }
        return $options;
    }
    
    /**
     * This function gets the desc relational to the num 
     * used "for" zoning permit
     * 
     * @param num $desc_num
     */
    public function get_for_desc($desc_num){
        $sql = "SELECT * FROM `zoning`.`zoning_application_issuer_desc` WHERE `desc_num` = ?;";
        $query = $this->db->prepare($sql);
        if($query->execute([$desc_num]) && $query->rowCount() != 0){
            $rs = $query->fetchAll();
            foreach($rs as $row){
                return $row->desc_text;
            }
        }
        return '';
    }
}
?>
