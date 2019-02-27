<?php
// check user is active or not
function is_user_active($url_after_login = '', $redirect = TRUE)
{
	$CI =& get_instance();
	
	/*
	| check request require redirect or not
	| if not then return respone or output
	*/
	if ( ! $redirect)
	{

		if($CI->session->userdata('user_id') == FALSE )
		{
			return FALSE; 
		}
		else
		{
			return TRUE;
		}

	}
	
	// if the user is active, then return response or output
	//~ if ($CI->session->userdata('user_id') !== FALSE || $CI->session->userdata('id_user_master') == FALSE)
	//~ {
		//~ echo "sowmiya 123";
		//~ return TRUE;
	//~ }
	
	if($CI->session->userdata('user_id') == FALSE )
	{
		return FALSE; 
	}
	else
	{
		return TRUE;
	}
	
	// set next page url to redirect after user login
	if ($url_after_login !== '')
	{
		$CI->session->set_userdata('next_url', $url_after_login);
	}
	
	$CI->session->set_flashdata('noti_msg', '<p>You must login to continue</p>');
	
	safe_redirect();
}

function validateDate($date){
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {
    	return TRUE;
    }
    return FALSE;
}

function flash( $name = '', $message = '', $class = 'alert alert-success alert-dismissable' )
{
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}


function getCurrencyFormat($number,$currency=TRUE){
	$formatResult = number_format($number, 2, '.', '');
	if($currency == TRUE){
		$formatResult = '$ '.$formatResult;
	}
	return $formatResult;
}

// safely redirect based on request type
function safe_redirect()
{
	$CI =& get_instance();
	
	if ($CI->input->is_ajax_request() === FALSE)
	{
		redirect('login');
	}
	
	$base_url = $CI->config->item('base_url');
	
	echo '<script>window.location = "' . $base_url . 'login";</script>';
}

function get_active_user_lang()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_lang');
}

function setPageTop($aPageTop,$btnName='New'){
	$pageTopFormat =  '<div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn btn-circle btn-outline red sblue dropdown-toggle" data-toggle="dropdown">';
                        if($btnName == 'New'){
                        	$icons =  'fa fa-plus';
                        }else{
                        	$icons =  'fa fa-eye';
                        }
                        $pageTopFormat .=  '<i class="'.$icons.'"></i>&nbsp;';
                        $pageTopFormat .=  '<span class="hidden-sm hidden-xs">'.$btnName.'&nbsp;</span>&nbsp;
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">';
                            if(count($aPageTop) > 0){
                                foreach ($aPageTop as $pagekey => $pagetopval) {
                                    $picon = $pagetopval['icon'];
                                    $phref = $pagetopval['href'];
                                  
                       $pageTopFormat .=' <li>
                                <a href="'.$phref.'">
                                    <i class="'.$picon.'"></i> '.$pagekey.'</a>
                            </li>';
                                   
                                }
                          }
                           
                        $pageTopFormat .='</ul>
                    </div>
                </div>';
                echo $pageTopFormat;
}

function getCurrentDateTime($time = FALSE)
{
  return ($time) ? date('Y-m-d') : date('Y-m-d H:i:s') ;
}

function getFlashMsg()
{
	$return = '';
	
	$CI =& get_instance();
	
	if (($flash_msg = $CI->session->flashdata('succ_msg')) != FALSE)
	{
		$return .= '<div class="succ_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';	
	}
	elseif (($flash_msg = $CI->session->flashdata('error_msg')) != FALSE)
	{
		$return .= '<div class="error_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';
	}
	elseif (($flash_msg = $CI->session->flashdata('noti_msg')) != FALSE)
	{
		$return .= '<div class="noti_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';
	}
		
	return $return;
}

function getContactPhoneFormat($phone,$retuntType=FALSE){
	global $aCustomerPhoneType;
	$phoneFormat = '';
	$aPhone = array();
	if(is_array($phone) && count($phone) > 0){
		foreach ($phone as $key => $value) {
			$Phoneno = array();
			$phoneNumber = isset($value->contact_number) ? $value->contact_number  :'';
			$phoneType = isset($value->contact_type) ? $value->contact_type  :'';
			if($phoneNumber !='' && $phoneType !=''){
				$phoneTypeName = in_array($phoneType,array_keys($aCustomerPhoneType)) ? $aCustomerPhoneType[$phoneType] : 'Phone ';
				$phoneFormat .=$phoneTypeName.' #: '.$phoneNumber .'</br>';
				$Phoneno['type'] = $phoneTypeName;
				$Phoneno['number'] = $phoneNumber;
				$aPhone[] = $Phoneno; 
			}
			
		}
	}
	if($retuntType){
		return $aPhone;
	}
	return $phoneFormat;

}

// return only requested data
function getEndData($data="", $identifier=""){
	return ($data != "" && $identifier != "") ? @end(explode($identifier, $data)) : FALSE;
}

function getUserBasicDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_user_master'=>$param,'status'=>1));
	}
	$CI->db->where('user_type','superuser');
	$result = $CI->db->get('user_master');
	if ($result != FALSE && $result->num_rows()>0){
		
		$result = $result->row();

		if ($column == ''){
			
			return (object) array_merge((array) $result, getUserImage($result, $option));
		}else{
			
			if (strpos($column, ',') === FALSE)
			{
				$column = getEndData($column, '.');
				if ($column == 'profile_image'){
					$result = (object) array_merge((array) $result, getUserImage($result, $option));
				}
				return $result->$column;
			}
			else
			{
				return $result;
			}
		}
	}
	return FALSE;
}function getCustomerBasicDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_company'=>$param,'company_status'=>1));
	}
	
	$result = $CI->db->get('company');
	if ($result != FALSE && $result->num_rows()>0){
		
		$result = $result->row();
		if ($column == ''){
			
			return $result;
		}else{
			
			if (strpos($column, ',') === FALSE)
			{
				$column = getEndData($column, '.');
				
				return $result->$column;
			}
			else
			{
				return $result;
			}
		}
	}
	return FALSE;
}
function getUseruniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_user_master'=>$param,'status'=>1));
	}
	
	$result = $CI->db->get('user_master');
	
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getPropertyuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('property_name'=>$param));
	}
	
	$result = $CI->db->get('user_property');
	
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}


function getCompanyuseruniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_company'=>$param,'company_status'=>1));
	}
	
	$result = $CI->db->get('company');	
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getPrivilegeuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	$result = $CI->db->get('access_privileges');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}


function getUniquePONumber($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_purchase_order'=>$param,'po_status'=>1));
	}
	
	$result = $CI->db->get('purchase_order');	
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}


function getUseruniqueLevelDetails($param){
	
	$CI =& get_instance();
	$CI->db->select('*') ;
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	
	$result = $CI->db->get('user_levels');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getUserLevelName($level_key,$column ='level_name'){
	
	$CI =& get_instance();
	$CI->db->select($column);
	$CI->db->where(array("level_key"=>$level_key));
	$result = $CI->db->get('user_levels');
	return ($result != FALSE && $result->num_rows()>0) ? $result = $result->row()->$column : FALSE;
}


function getUserImage($row, $option=array()){
	
	$base_url = (empty($option['base_url'])) ? base_url() : $option['base_url'];
	$default_image = (empty($option['default_image'])) ? 'uploads/default17.jpg' : $option['default_image'];
	if ($row->profile_image != ''){
			return array('profile_image'=>$row->profile_image);
	}
	return array('profile_image'=>$base_url.$default_image);
}

function getProfileImage(){
	
	$CI =& get_instance();
	$CI->db->select('*');	
	$CI->db->where(array('id_user_master'=>get_active_user_id(),'status'=>1 ,'user_type'=>'superuser'));	
	$result = $CI->db->get('user_master');
	
	if ($result != FALSE && $result->num_rows()>0){
		//~ var_dump($result->row()->profile_image);
		//~ exit;
		return $result->row()->profile_image;
	}
	return FALSE;
}


function get_active_user_id()
{
	$CI =& get_instance();
	$user_id = "";
	if($CI->session->userdata('user_type') == 'superuser')
	{
		$user_id = $CI->session->userdata('user_id');
	}
	//~ elseif($CI->session->userdata('user_type') == 'application_user')
	//~ {
		//~ $user_id = $CI->session->userdata('id_user_master');
	//~ }
	return $user_id;
}

function is_admin()
{
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return ($result->row()->user_type == "superuser") ? TRUE : FALSE;
	}
	return FALSE;
}


function get_user_type()
{
	$CI =& get_instance();
	$user_id = "";
	if($CI->session->userdata('user_type') == 'superuser')
	{
		$user_id = $CI->session->userdata('user_id');
	}
	//~ elseif($CI->session->userdata('user_type') == 'application_user')
	//~ {
		//~ $user_id = $CI->session->userdata('id_user_master');
	//~ }
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return $result->row()->user_type ;
	}
	return FALSE;
}

function get_user_name()
{
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return $result->row()->username ;
	}
	return FALSE;
}

function get_users_list($where=array())
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where($where);
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0)
	{
		return $result->result();
	}
	return FALSE;
}

function user_privilges_check($type,$id_privilges)
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('id_privileges'=>$id_privilges,'user_type_key'=>$type));
	$result = $CI->db->get('user_privileges');
	if($result != FALSE && $result->num_rows()>0) {
		return TRUE ;
	}
	return FALSE;
}

function default_privilges_check($type,$id_privilges)
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('id_privileges'=>$id_privilges,'user_type_key'=>$type));
	$result = $CI->db->get('default_privilege_access');
	if($result != FALSE && $result->num_rows()>0) {
		return TRUE ;
	}
	return FALSE;
}



function userPrivilgesList($user_id)
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('id_user'=>$user_id));
	$result = $CI->db->get('user_privileges');
	if($result != FALSE && $result->num_rows()>0) {
		return $result->result();
	}
	return FALSE;
}


function user_access_permission($user_access_key = '')
{
	$CI =& get_instance();
	
	// Super User Access
	if(is_admin() == TRUE){
		
		return TRUE;
	}
	
	if($user_access_key == '')
	{
		return FALSE;
	}
	
	$user_type = $CI->session->userdata('user_type');
	
	if($user_type == NULL)
	{
		return FALSE;
	}	
		
	$CI->db->select('id_access_privileges');
	
	$CI->db->where(array('access_privileges_key'=>$user_access_key,'status'=>1));
	
	$result = $CI->db->get('access_privileges');
	
	if($result == FALSE)
	{
		return FALSE;		
	}
		
	if($result->num_rows()>0) {

		$user_id_privileges = $result->row()->id_access_privileges;
		$user_id = get_active_user_id();
		$CI->db->select('*');
		
		$CI->db->where(array('user_type_key'=>$user_type,'id_user'=>$user_id,'id_privileges'=>$user_id_privileges));
		
		$result = $CI->db->get('user_privileges');
		
		if($result == FALSE)
		{
			return FALSE;		
		}	
		if($result->num_rows()>0) 
			return TRUE ;
		else
			return FALSE;
	}
	return FALSE;
}


function slugify($string, $replace = array(), $delimiter = '_') {
  if (!extension_loaded('iconv')) {
    throw new Exception('iconv module not loaded');
  }
  // Save the old locale and set the new locale to UTF-8
  $oldLocale = setlocale(LC_ALL, '0');
  setlocale(LC_ALL, 'en_US.UTF-8');
  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  if (!empty($replace)) {
    $clean = str_replace((array) $replace, ' ', $clean);
  }
  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
  $clean = strtolower($clean);
  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
  $clean = trim($clean, $delimiter);
  // Revert back to the old locale
  setlocale(LC_ALL, $oldLocale);
  return $clean;
}


function get_additions_type($id_customer_additions = '')
{
	$CI =& get_instance();		
	
	$CI->db->select('*');		
	
	$CI->db->where(array('id_customer_additions'=>$id_customer_additions));		
	
	$result = $CI->db->get('customerdata_additions');	
	
	if($result != FALSE && $result->num_rows()>0) {	
		
		return $result->row();
		
	}else{
				
		return FALSE;
	}
}


function get_cancellation_type($id_cancellation = '')
{
	$CI =& get_instance();		
	
	$CI->db->select('*');		
	
	$CI->db->where(array('id_cancellation'=>$id_cancellation));		
	
	$result = $CI->db->get('customerdata_cancellation');	
	
	if($result != FALSE && $result->num_rows()>0) {	
		
		return $result->row();
		
	}else{
				
		return FALSE;
	}
}



function get_reminder_type($id_reminder = '')
{
	$CI =& get_instance();		
	
	$CI->db->select('*');		
	
	$CI->db->where(array('id_reminder'=>$id_reminder));		
	
	$result = $CI->db->get('reminder');	
	
	if($result != FALSE && $result->num_rows()>0) {	
		
		return $result->row();
		
	}else{
				
		return FALSE;
	}
}


function get_status_icon($customer_option_data = '')
{
	$CI =& get_instance();		
	
	$CI->db->select('*');		
	
	$CI->db->where(array('status_name'=>$customer_option_data));		
	
	$result = $CI->db->get('status');	
	
	if($result != FALSE && $result->num_rows()>0) {	
	
	$icon = '<i class="glyphicon '.$result->row()->status_icon.'" style="width:25px;color:'.$result->row()->status_color.'"><i></i></i>';
	return $icon;

	}else{
				
		return FALSE;
	}
}

function getCustomerContractDuration($where){
	$CI =& get_instance();
	$CI->db->select('*');	
	$CI->db->where($where);	
	$result = $CI->db->get('contract_details');	
	if($result != FALSE && $result->num_rows()>0) {	
		return $result->result();
	}else{
				
		return FALSE;
	}
	
}

function getCustomerDurationFormat($custid){
	$CI =& get_instance();
	$where = array(
		'id_customer_data'=>$custid,
		'status'=>1
	);
	$contractDuration = '';
	$result = getCustomerContractDuration($where);
	if($result != FALSE){		
		foreach ($result as $key => $value) {
			$contractFrom = $value->duration_from;
			$contractTo = $value->duration_to;
			if(strtotime($value->duration_to) > time()){
			$contractDuration .= date('d.m.Y', strtotime($contractFrom)).' '.$CI->lang->line('to').' '.date('d.m.Y', strtotime($contractTo)).'<br>';
		    }

		}		
	}
	return $contractDuration;
}

function calculateMonth($fromdate,$todate,$display=FALSE){
	$CI =& get_instance();
	if(strtotime($fromdate) > time()){
		$d = $fromdate;
	}else{
		$d = date('d-m-Y');
	}
	
	$days = '';			

	$d1 = new DateTime($d);
	$d2 = new DateTime($todate);

	$interval = $d2->diff($d1);	
	if($interval->invert == 0){
		$diff_mn  = 0;
    	$day_left = 0;		
    }else{
    	$diff_mn =  (($interval->format('%y') * 12) + $interval->format('%m'));
		$day_left = $interval->format('%d');
    }
	$displayMonth = '';
	$days ='';
	if($display == TRUE){			
		if($day_left > 0 ){
			$dayName = ($day_left > 1) ? 'days' : 'day';
			$days = $day_left.' '.$CI->lang->line($dayName);
		}
		$monthsName = ($diff_mn > 1) ? $CI->lang->line('Months') : $CI->lang->line('Month');

		if($diff_mn > 0){
			$displayMonth = $diff_mn.' '.$monthsName;
		}
		if($diff_mn != 0 || $day_left != 0 ){
			$contractRemaining = $displayMonth.' '.$days;
		}else{
			$contractRemaining = FALSE;
		}	
		
	}else{
		$contractRemaining['month'] =$diff_mn;
		$contractRemaining['days'] =$day_left;
	}		
	return $contractRemaining;

}

function getCustomerContractRemainingFormat($custid){
	$CI =& get_instance();
	$where = array(
		'id_customer_data'=>$custid,
		'status'=>1
	);
	$contractRemaining = '';
	$result = getCustomerContractDuration($where);
	if($result != FALSE){
		
		foreach ($result as $key => $value) {		
			$durationFrom = $value->duration_from;
			$durationTo = $value->duration_to;
			$dateDiff = calculateMonth($durationFrom,$durationTo,TRUE);
			$contractRemaining .= $dateDiff.'</br>';
		}
	}
	return $contractRemaining;

}

function getContractRemainterNotification(){
	$CI =& get_instance();
	// $result = $CI->db->query("SELECT *, TIMESTAMPDIFF(DAY, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as day_diff,TIMESTAMPDIFF(MONTH, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as month_diff FROM contract_details having month_diff<=6 and day_diff >=1");
	$CI->db->select("*, TIMESTAMPDIFF(DAY, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as day_diff,TIMESTAMPDIFF(MONTH, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as month_diff,EXISTS(SELECT * FROM `contract_details` as cd WHERE status =1 AND cd.id_contract_details != (SELECT (`contract_details`.id_contract_details)) AND cd.`id_customer_data` = (SELECT (`contract_details`.id_customer_data))) as cust_con_exist");
	$CI->db->join('customerdata',  'customerdata.id_customer_data = contract_details.id_customer_data', 'left');
	$CI->db->having('month_diff<=6 and day_diff >=1 and cust_con_exist =0');
	$result = $CI->db->get('contract_details');

	if($result != FALSE && $result->num_rows()>0) {	
		return $result->result();
	}else{
				
		return FALSE;
	}
}

function getContractRemainterNotifications($where){
	$CI =& get_instance();
	
	$CI->db->select("*, TIMESTAMPDIFF(DAY, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as day_diff,TIMESTAMPDIFF(MONTH, CURDATE(), DATE_FORMAT(STR_TO_DATE(duration_to, '%d.%m.%Y'), '%Y-%m-%d')) as month_diff,EXISTS(SELECT * FROM `contract_details` as cd WHERE status =1 AND cd.id_contract_details != (SELECT (`contract_details`.id_contract_details)) AND cd.`id_customer_data` = (SELECT (`contract_details`.id_customer_data))) as cust_con_exist");
	$CI->db->join('customerdata',  'customerdata.id_customer_data = contract_details.id_customer_data', 'left');
	$CI->db->where($where);
	$CI->db->having('month_diff<=6 and day_diff >=1 and cust_con_exist =0');
	$result = $CI->db->get('contract_details');
	
	if($result != FALSE && $result->num_rows()>0) {	
		return $result->result();
	}else{
				
		return FALSE;
	}
}

function getContractReminderDetails(){
	$CI =& get_instance();
	$result = getContractRemainterNotification();
	$displayNotification = '';
	if($result != FALSE){
		$base_url = base_url();
		foreach ($result as $key => $res1) {
		
	 $displayNotification .= ' <div class="mt-actions">
                    <div class="mt-action">                                                   
                        <div class="mt-action-body">
                            <div class="mt-action-row">
                                <div class="mt-action-info ">
                                    <div class="mt-action-icon ">
                                        <i class=" icon-bell"></i>
                                    </div>
                                    <div class="mt-action-details ">
                                      <a href="'.$base_url.'customerdata/edit/key/'.$res1->id_customer_data.'"><span class="mt-action-author">'.$res1->company_name.'</span></a>
                                        <p class="mt-action-desc">'.$CI->lang->line('reminder_contract_ends_on').' : '.$res1->duration_to.'</p>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>';
	}
}
if($displayNotification == ''){
	$displayNotification ='<div class="mt-actions">
		<div class="mt-action">                                                   
		<div class="mt-action-body">
		<div class="caption-subject font-dark bold uppercase">'.$CI->lang->line('no_new_notification').'</div>
		</div>
		</div>
		</div>';
}
return $displayNotification;
}

function getSalesManagerContractReminderDetails($username){
	$CI =& get_instance();
	$where = array(
		'`customerdata`.`salesmanager`'=>$username
	);
	$result = getContractRemainterNotifications($where);
	$displayNotification = '';
	if($result != FALSE){
		$base_url = base_url();
		foreach ($result as $key => $res1) {
	 $displayNotification .= ' <div class="mt-actions">
                    <div class="mt-action">                                                   
                        <div class="mt-action-body">
                            <div class="mt-action-row">
                                <div class="mt-action-info ">
                                    <div class="mt-action-icon ">
                                        <i class=" icon-bell"></i>
                                    </div>
                                    <div class="mt-action-details ">
                                      <a href="'.$base_url.'customerdata/edit/key/'.$res1->id_customer_data.'"><span class="mt-action-author">'.$res1->company_name.'</span></a>
                                        <p class="mt-action-desc">'.$CI->lang->line('reminder_contract_ends_on').' : '.$res1->duration_to.'</p>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>';
	}
}
if($displayNotification == ''){
	$displayNotification ='<div class="mt-actions">
		<div class="mt-action">                                                   
		<div class="mt-action-body">
		<div class="caption-subject font-dark bold uppercase">'.$CI->lang->line('no_new_notification').'</div>
		</div>
		</div>
		</div>';
}
return $displayNotification;
}

function getFormatDropDown($result,$keyName,$valueName,$blank=array()){
		$aResponse = array();

		if($result != FALSE && $keyName != FALSE && $valueName != FALSE){
				foreach ($result as $key => $value) {
					$keyNme = isset($value->$keyName) ? $value->$keyName : FALSE;
					$ValueNme = isset($value->$valueName) ? $value->$valueName : FALSE;
					$aResponse[$keyNme] = $ValueNme;
				}
			}
		if(is_array($blank) && count($blank) > 0){
			foreach ($blank as $key => $value) {
				$aResponse[$key] =  $value;
		    }
		}
		return $aResponse;
	}


function customform_dropdown($data = '', $options = array(), $selected = array(), $extra = '', $optionsExtra = array())
{
    $defaults = array();

    if (is_array($data))
    {
        if (isset($data['selected']))
        {
            $selected = $data['selected'];
            unset($data['selected']); // select tags don't have a selected attribute
        }

        if (isset($data['options']))
        {
            $options = $data['options'];
            unset($data['options']); // select tags don't use an options attribute
        }
    }
    else
    {
        $defaults = array('name' => $data);
    }

    is_array($selected) OR $selected = array($selected);
    is_array($options) OR $options = array($options);

    // If no selected state was submitted we will attempt to set it automatically
    if (empty($selected))
    {
        if (is_array($data))
        {
            if (isset($data['name'], $_POST[$data['name']]))
            {
                $selected = array($_POST[$data['name']]);
            }
        }
        elseif (isset($_POST[$data]))
        {
            $selected = array($_POST[$data]);
        }
    }

    $extra = _attributes_to_string($extra);

    $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

    $form = '<select '.rtrim(_parse_form_attributes($data, $defaults)).$extra.$multiple.">\n";

    foreach ($options as $key => $val)
    {
        $key = (string) $key;

        if (is_array($val))
        {
            if (empty($val))
            {
                continue;
            }

            $form .= '<optgroup label="'.$key."\">\n";

            foreach ($val as $optgroup_key => $optgroup_vals)
            {
               
                $data_value = (is_array($optgroup_vals) && isset($optgroup_vals['data-val'])) ? $optgroup_vals['data-val'] : FALSE;

                $optgroup_val =is_array($optgroup_vals) ? $optgroup_vals['label'] : $optgroup_vals;

                $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';

                $data_id = isset($optionsExtra[$key]) ? $optionsExtra[$key] : '';
                // Changed to include $optionsExtra
                $form .= '<option data-id ="'.$data_id .'" data-type="'.$key.'"  data-val ="'.$data_value.'" value="'.html_escape($optgroup_key).'"'.$sel
                    .(isset($optionsExtra[$key][$optgroup_key]) ? _parse_form_attributes($optionsExtra[$key][$optgroup_key]) : '')
                    .'>'.(string) $optgroup_val."</option>\n";
            }
            $form .= "</optgroup>\n";
        } 
        else 
        {
            // Changed to include $optionsExtra
            $flipSelected = array_flip($selected);
            $dataKey = (in_array($key, $selected)) ? $flipSelected[$key] : '-1';
            $form .= '<option data-id="'.$dataKey.'" value="'.html_escape($key).'"'
                .(in_array($key, $selected) ? ' selected="selected"' : '')
                .(isset($optionsExtra[$key]) ? _parse_form_attributes($optionsExtra[$key]) : '')
                .'>'.(string) $val."</option>\n";
        }
    }

    return $form."</select>\n";
}
function getCompanyDetails($param,$returnType="result", $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_company'=>$param,'company_status'=>1));
	}

	if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$CI->db->order_by($option['orderby'],$option['disporder']);
		else
			$CI->db->order_by('company_name',"ASC");

	if(isset($option['groupby']) && $option['groupby'] !='') {
			$CI->db->group_by($option['groupby']);
	}		
	
	$result = $CI->db->get('company');
	if ($result != FALSE && $result->num_rows()>0){
		
		$result = $result->$returnType();

		 if(isset($option['format'])){
		 	if($option['format'] == 'array'){
		 		return getCompanyArrayFormat($result);
		 	}
		 }
		if ($column == ''){
			
			return $result;
		}else{
			
			if (strpos($column, ',') === FALSE)
			{
				$column = getEndData($column, '.');				
				return $result->$column;
			}
			else
			{
				return $result = $result->$returnType();
			}
		}
	}
	return FALSE;
}
function getCompanyArrayFormat($result){
	$aResponse = array();
	if($result != FALSE){
		foreach ($result as $key => $company) {
			$id_company = isset($company->id_company)? $company->id_company  :'';
			$company_name = isset($company->company_name)? $company->company_name  :'';
		 $aResponse[$id_company] =$company_name;
	 }
	}
	return $aResponse;
}

function getitemuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	$result = $CI->db->get('item_type');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}
function getpdtitemuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	$result = $CI->db->get('product_item');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getItemSKUuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	$result = $CI->db->get('item_map');	
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

