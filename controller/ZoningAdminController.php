<?php

/**
 * Class AdminController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace LRS\Controller;
    
use LRS\Model\zoningadmin_model;
    
class ZoningAdminController
{ 
    var $email;
    
    function __construct()
    {
        $this->zoningadmin_model = new \LRS\Model\zoningadmin_model();
    }
    
    public function index()
    {
        // load views
        if($this->checkIfLogon()){
            require APP . 'view/_templates/zoningadmin_header.php';
            require APP . 'view/zoningadmin/navigation.php';
            require APP . 'view/zoningadmin/index.php';
            require APP . 'view/_templates/zoningadmin_footer.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function pages($page_name)
    {
        // load views
        if($this->checkIfLogon()){
            require APP . 'view/_templates/zoningadmin_header.php';
            require APP . 'view/zoningadmin/navigation.php';
            require APP . 'view/zoningadmin/' . $page_name . '.php';
            require APP . 'view/_templates/zoningadmin_footer.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function open_permit_details($permit){
        if($this->checkIfLogon()){
            require APP . 'view/zoningadmin/' . $permit . '.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    /**
     * Returns back font size based off length of string
     * @param unknown $string
     * @return string
     */
    public function get_font($string){
        $default = '16';
        $length_str = strlen($string);
        if($length_str < 75){
            return $default;
        } else if($length_str < 100){
            return '12';
        } else if($length_str < 125){
            return '9';
        } else if($length_str < 175){
            return '6';
        } else {
            return '4';
        }
    }
    
    /**
     * Open up previous available permit to edit
     * @param unknown $permit_num
     */
    public function back_edit($permit_num){
        $back_num = $this->zoningadmin_model->back_edit($permit_num);
        if($back_num != 0){
            echo $this->edit($back_num);
        } else {
            echo $this->edit($permit_num);
        }
    }
    
    /**
     * Open up next available permit to edit
     * @param unknown $permit_num
     */
    public function next_edit($permit_num){
        $next_num = $this->zoningadmin_model->next_edit($permit_num);
        if($next_num != 0){
            echo $this->edit($next_num);
        } else {
            echo $this->edit($permit_num);
        }
    }
    
    /**
     * Sanitize string before insertion.
     *
     * @param unknown $var
     * @return unknown
     */
    private function revert_back($var)
    {
        $var = trim($var);
        $var = str_replace('&amp;','&', $var);
        $var = str_replace("&apos;","'",$var);
        $var = str_replace('&quot;','"', $var);
        return $var;
    }
    
    /**
     * Edit the land use permit application
     * @param int $permit the query num
     */
    public function edit($permit){
        if($this->checkIfLogon()){
            $permit_num = $permit;
            $rs = $this->zoningadmin_model->get_application($permit);
            if(isset($rs) && !empty($rs)){
                foreach($rs as $row){
                    foreach($row as $key => $value){
                        $$key = $this->revert_back($value);
                    }
                }
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/zoningadmin/edit.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            } else {
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/error/access_error.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            }
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    /**
     * Edit the specific record for status = approved, conditional, etc.
     * @param int $permit the query num
     */
    public function edit_status($permit){
        if($this->checkIfLogon()){
            $permit_num = $permit;
            $rs = $this->zoningadmin_model->get_application($permit);
            if(isset($rs) && !empty($rs)){
                foreach($rs as $row){
                    foreach($row as $key => $value){
                        $$key = $this->revert_back($value);
                    }
                }
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/zoningadmin/edit_status.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            } else {
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/error/access_error.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            }
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    /**
     * Edit the specific record for building permits
     * @param int $permit the query num
     */
    public function edit_permit2($permit){
        if($this->checkIfLogon()){
            $permit_num = $permit;
            $rs = $this->zoningadmin_model->get_application_permit2($permit);
            if(isset($rs) && !empty($rs)){
                foreach($rs as $row){
                    foreach($row as $key => $value){
                        $$key = $this->revert_back($value);
                    }
                }
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/zoningadmin/edit_permit2.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            } else {
                require APP . 'view/_templates/zoningadmin_header.php';
                require APP . 'view/zoningadmin/navigation.php';
                require APP . 'view/error/access_error.php';
                require APP . 'view/_templates/zoningadmin_footer.php';
            }
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function PDF_VIEW($id){
        if($this->checkIfLogon()){
            header("Content-type: application/pdf");
            header('Content-disposition: inline; filename="SUBMITTED.pdf"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            echo $this->zoningadmin_model->get_pdf($id);
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function open_fillable_pdf($id){
        if($this->checkIfLogon()){
            $ROW_ID = $id;
            $rs = $this->zoningadmin_model->get_application($id);
            require APP . 'view/zoningadmin/zoning_land_permit_pdf.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function open_all_pdfs($id){
        if($this->checkIfLogon()){
            $ROW_ID = $id;
            $rs = $this->zoningadmin_model->get_application($id);
            $rs2 = $this->zoningadmin_model->get_application_permit2($id);
            require APP . 'view/zoningadmin/zoning_ALL_pdf.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function open_receipt($id){
        if($this->checkIfLogon()){
            $ROW_ID = $id;
            $rs = $this->zoningadmin_model->get_application_permit2($id);
            require APP . 'view/zoningadmin/zoning_land_receipt_pdf.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function open_details($id){
        if($this->checkIfLogon()){
            $ROW_ID = $id;
            $rs = $this->zoningadmin_model->get_application_permit2($id);
            //get for desc through $rs num?
            require APP . 'view/zoningadmin/zoning_land_details_pdf.php';
        } else {
            require APP . 'view/error/access_denied.php';
        }
    }
    
    public function save_lup_updates($permit_num){
        if($this->zoningadmin_model->save_lup_updates($permit_num)){
            echo $this->edit($permit_num);
        } else {
            require APP . 'view/_templates/zoningadmin_header.php';
            require APP . 'view/zoningadmin/navigation.php';
            require APP . 'view/error/access_error.php';
            require APP . 'view/_templates/zoningadmin_footer.php';
        }
    }
    
    public function save_lup_updates_status($permit_num){
        if($this->zoningadmin_model->save_lup_updates($permit_num)){
            echo $this->edit_status($permit_num);
        } else {
            require APP . 'view/_templates/zoningadmin_header.php';
            require APP . 'view/zoningadmin/navigation.php';
            require APP . 'view/error/access_error.php';
            require APP . 'view/_templates/zoningadmin_footer.php';
        }
    }
    
    public function save_lup_updates_building($permit_num){
        if($this->zoningadmin_model->save_lup_updates_building($permit_num)){
            echo $this->edit_permit2($permit_num);
        } else {
            require APP . 'view/_templates/zoningadmin_header.php';
            require APP . 'view/zoningadmin/navigation.php';
            require APP . 'view/error/access_error.php';
            require APP . 'view/_templates/zoningadmin_footer.php';
        }
    }
    
    public function get_counts(){
        echo $this->zoningadmin_model->get_counts();
    }
    
    public function get_special_counts(){
        echo $this->zoningadmin_model->get_special_counts();
    }
    
    public function logout(){
        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
        $_SESSION = [];
        $this->email = null;
        header('location: ' . URL);
    }
    
    public function export()
    {
        if($this->checkIfLogon()){
            $rs = $this->zoningadmin_model->get_all_applications();
            if($rs != 0){
                require APP . 'view/zoningadmin/export.php';
            }
        }
    }
    
    /**
     * Makes sure user is an authorized user of zoning admin
     */
    public function checkIfLogon(){
        $valid = false;
        require 'inc/auth.php';
        $auth = new \modAuth();
        if($auth->userName>''){
        	$this->email = $auth->userName;
            $username = explode('@',$auth->userName);
            if($this->zoningadmin_model->is_authorized_user($this->email)){
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $this->email;
                $valid = true;
            }
        } else {
            require 'inc/graph.php';
            $Graph = new \modGraph();
            $profile = $Graph->getProfile();
            if($profile) {
                $this->email = $profile->userPrincipalName;
                $userPrincipalName = $profile->userPrincipalName;
                $username = explode('@',$userPrincipalName);
                if($this->zoningadmin_model->is_authorized_user($this->email)){
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $this->email;
                    $valid = true;
                }
            }
        }
        // true? entry fine, else, display error page
        return $valid;
    }
}
