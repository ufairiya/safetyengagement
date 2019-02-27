<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model{
    
	public $table 				  = "user_master";
	public $table_user_level 	  = "user_levels";
	public $table_user_activity	  = "usertracking";
	public $table_user_access	  = "user_privileges";
	public $table_user_address	  = "user_address";
	public $table_user_contact	  = "user_contact";
	public $table_default_access	  = "default_privilege_access";
  
    /*User Access create*/
	public function update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	// Create New User
	public function user_insert($data)
	{
		$where['email'] =isset($data['email']) ? $data['email']  :'';
		if($where['email'] !=''){
			$this->db->where($where);
			$result = $this->db->get($this->table);
			if ($result != FALSE && $result->num_rows() > 0){				
				return $result->row()->id_user_master;
			}else{
				$this->db->insert($this->table, $data);		
				return $this->db->insert_id();
			}
		}
		else
		{
			$this->db->insert($this->table, $data);		
			return $this->db->insert_id();
		}
		
		
	}
	public function updatestatusUsers($uid,$stats)
    {
		if (count($uid) > 0)
		$this->db->where('id_user_master',$uid);
		return $this->db->update($this->table, array('status'=>$stats));
    }


	public function user_address_insert($data)
	{
		$this->db->insert('user_address', $data);
        return $this->db->insert_id();
	}

	public function getSalesRepCode($where='')
	{
		$this->db->select('ifnull(MAX(`user_cust_code`) + 1,1) as sales_rep');	
		if( isset($param) && $param !=''){
			$this->db->select($param);
		}
		if (isset($where) && is_array($where) && count($where)>0){
			$this->db->where($where);
		}
		$result = $this->db->get($this->table);
		if ($result != FALSE && $result->num_rows()>0)
		{	
			return $result = $result->row()->sales_rep;
		}
		return FALSE;
	}
	
	//Update User Level
	public function user_update($data, $where = array())
    {
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update($this->table, $data);
    }
    //Update User Level
	 public function user_address_update($data, $where = array())
    {
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update('user_address', $data);
    }
	
	// Delete User
	
	public function user_delete($data,$where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}


	// Delete User
	
	public function user_contact_delete($where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->delete($this->table_user_contact);
	}
	
	// Delete User Permanently
	
	public function user_delete_permanently($where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->delete($this->table);
	}
	
	// Create New user Level
	
	public function user_level_insert($data)
	{
		$this->db->insert($this->table_user_level, $data);
        return $this->db->insert_id();
	}
	//Update User Level
	 public function user_level_update($data, $where = array())
    {
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update($this->table_user_level, $data);
    }
	
	// Delete User Level
	
	public function user_level_delete($data,$where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update($this->table_user_level, $data);
	}
	
	// Delete User Level Permanently
	
	public function user_level_delete_permanently($where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->delete($this->table_user_level);
	}


	 public function insert_user_contact($data,$where=array())
	 {
		if (count($where) > 0)
			$this->db->where($where);
			$result = $this->db->get($this->table_user_contact);
		if ($result != false && $result->num_rows() > 0)
		{
		if (count($where) > 0)
			$this->db->where($where);
			$data['contact_modified_on'] = getCurrentDateTime();
			$this->db->update($this->table_user_contact, $data);
			return $result->row()->id_user_contact;
		}
		else
		{
			$data['contact_created_on'] = getCurrentDateTime();			
			$this->db->insert($this->table_user_contact, $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
	}


	 public function insert_user_address($data,$where=array())
	 {
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_user_address);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['address_modified_on'] = getCurrentDateTime();
		$this->db->update($this->table_user_address, $data);
		 return $result->row()->id_user_address;
		}
		else
		{
			$data['address_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_user_address, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}
	
	
	public function getapplicationusers()
	{
		$this->db->select('username');
		$this->db->from('user_master');
		$this->db->where('user_type','application_user');	        
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
	
	public function getuserscountprofessonaldata()
	{
		$this->db->select('first_name,username,companyname,email,password,phone,officephone,user_type,profile_image,address,city,travel_distance,zip_code,state,induoffsertext,safdocimg_upload,pripicdocimg_upload,insyprocontrapp,serpro,resume,resumeimg_uploadimg_link,collegedegree,clgdegreeimg_upload_link,education,othereduimg_upload_link,certificates,certificatesimg_uploadimg_link,avettaimg_link,isnetworldimg_link,brownimg_link,insurance,poorliabaimg_uploadimg_link,industries,comments,commentimg_link,otherfilecer,otherfilecerimg_link,uploadpripicdraw,uploadpripicdrawimg_link,travel');
		$this->db->from('user_master');
		$this->db->where('id_user_master',$this->session->userdata('id_user_master'));	        
		$where = '(user_type="professional" or user_type = "student")';
		$this->db->where($where);
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
	public function getuserscountcompanydata()
	{
		$this->db->select('first_name,profile_image,positioncompany,companyperion,companyperemail,companypercellphone,companyname,address,city,state,zip_code,officephone,phone,email,industry');
		$this->db->from('user_master');
		$this->db->where('id_user_master',$this->session->userdata('id_user_master'));	  
		$this->db->where('user_type','company');	            
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
	// Get User
	
	public function getUsers($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column='')
	{	
	    $fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";		

		if($column !=''){
			$this->db->select($column.','.$fullName.'');
		}else{
			$this->db->select('*,'.$fullName.'');
		}
		if (is_array($param) && count($param)>0){
			$this->db->where($param);		
		}

		if (is_array($where_or) && count($where_or)>0){
			$this->db->or_where($where_or);		
		}
		if($site_admin== FALSE){
			$this->db->where("site_admin !=","1");
		}
		if(is_array($orderby) && count($orderby) > 0){
			
			 $order_by = isset($orderby['order_by']) ? $orderby['order_by'] : FALSE;
			 $disp_order = isset($orderby['disp_order']) ? $orderby['disp_order'] : FALSE;
			$this->db->order_by($order_by, $disp_order); 
		}
			
		$result = $this->db->get($this->table);
		
		if ($result != FALSE && $result->num_rows()>0){

			$result =  $result->$option();
			if($other == TRUE){
				$aResponse = $this->getUserAddressInfo($result,$option);
			}else{
				$aResponse = $result;
			}
			
			
			return $aResponse;
		}
		return FALSE;
		
	}

	public function getUserAddressInfo($userid,$option)
	{
		if($userid == FALSE){
			return FALSE;
		}
		if($option == 'result'){
			$aAddress = array();
			foreach ($userid as $key => $user_address) {
				$Address = $user_address;
				$user_id = $user_address->id_user_master;
				$Address->user_address = $this->getUserAddress(array('pk_id_user'=>$user_id),'',array(),$option);	
				$Address->user_contact = $this->getUserContact(array('pk_id_user'=>$user_id),'',array(),$option);	
				$aAddress[] = $Address;			
			}
		}else{
			$option = 'result';
			$Address = $userid;
			$user_id = $Address->id_user_master;
			$Address->user_address = $this->getUserAddress(array('pk_id_user'=>$user_id),'',array(),$option);
			$Address->user_contact = $this->getUserContact(array('pk_id_user'=>$user_id),'',array(),$option);
				$aAddress = $Address;	
		}
		return $aAddress;
	}

	public function getUserContact($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_user_contact);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('address_status'=>1));
		}
		if(isset($option['like']) && is_array($option['like'])){
			$i = 0;
			foreach($option['like'] as $key => $val){
				$i++;
				if($i == 1)
				$this->db->like($key, $val);
			    else
				$this->db->or_like($key, $val);
			}
		}
		if(isset($option['where_in']) && is_array($option['where_in'])){
			foreach($option['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('contact_status',"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();
		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$returntype();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$returntype();
				}
			}
		}
		return FALSE;
    }



	public function getUserAddress($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_user_address);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('address_status'=>1));
		}
		if(isset($option['like']) && is_array($option['like'])){
			$i = 0;
			foreach($option['like'] as $key => $val){
				$i++;
				if($i == 1)
				$this->db->like($key, $val);
			    else
				$this->db->or_like($key, $val);
			}
		}
		if(isset($option['where_in']) && is_array($option['where_in'])){
			foreach($option['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('address_status',"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();
		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$returntype();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$returntype();
				}
			}
		}
		return FALSE;
    }

	// User Level 
	public function getUserLevel($param=array(),$option="result")
	{
	$this->db->select('*');	
	if (is_array($param) && count($param)>0){
		$this->db->where($param);
	}
	
	$result = $this->db->get($this->table_user_level);
	if ($result != FALSE && $result->num_rows()>0){	
		return $result = $result->$option();
	}
	return FALSE;
		
	}
	
	// User Level 
	public function getUserActivity($param=array(),$option="result")
	{
		$this->db->select('*');	
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}
		
		$result = $this->db->get($this->table_user_activity);
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->$option();
		}
		return FALSE;
	}
	
	// insert user type permission

	public function user_access_privileges($data)
	{
		$this->db->insert($this->table_user_access, $data);
        return $this->db->insert_id();
	}
	
	public function truncate_user_access_privileges()
	{
	   return $this->db->truncate($this->table_user_access);
	}


	// insert user type permission

	public function default_access_privileges($data)
	{
		$this->db->insert($this->table_default_access, $data);
        return $this->db->insert_id();
	}

	public function truncate_default_access_privileges()
	{
	   return $this->db->truncate($this->table_default_access);
	}


	public function delete($tables,$where = array())
	{
		$where_In = $where;
		if (count($where) > 0)
			if(isset($where['where_in'])){
				unset($where['where_in']);
			}
			if(isset($where['where_not_in'])){
				unset($where['where_not_in']);
			}
            $this->db->where($where);
        if(isset($where_In['where_in']) && is_array($where_In['where_in'])){
			foreach($where_In['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if(isset($where_In['where_not_in']) && is_array($where_In['where_not_in'])){
			foreach($where_In['where_not_in'] as $key => $val){
				$this->db->where_not_in($key,$val);
			}
		}
		
        return $this->db->delete($tables);  
	
	}
		public function get_profile_details($userid)
	{
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user_master',$userid);
		$result = $this->db->get();
		$results =$result->result();

		return $results;
		
	}
	public function user_editform($userid)
	{
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user_master',$userid);
		$result = $this->db->get();
		$results =$result->result();

		return $results;
	}
	public function user_editaddressform($userid)
	{
		
		$this->db->select('*');
		$this->db->from($this->table_user_address);
		$this->db->where('pk_id_user',$userid);
		$result = $this->db->get();
		$results =$result->result();

		return $results;
		
	}
	public function user_oldpassword($oldpass)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('password',md5($oldpass['oldpass']));
		$this->db->where('id_user_master',$oldpass['user_id']);
		$result = $this->db->get();
		$results =$result->result();
		return $results;
	}
	public function user_changeoldpassword($changeoldpass)
	{
      $this->db->where('password',md5($changeoldpass['oldpassword']));	
      return $this->db->update($this->table, array('password' => md5($changeoldpass['password'])));				
	}
	
	public function user_changeoldaddress($changeoldaddrs,$usrid)
	{
		if($changeoldaddrs != '')
		{
			$this->db->where('id_user_master',$usrid);	
			$this->db->update($this->table,array('phone' =>$changeoldaddrs['phone']));	


			$this->db->where('pk_id_user',$usrid);	
			$this->db->update($this->table_user_address,$changeoldaddrs);	
		}			
		return true;
	}
	public function ForgotPassword()
	{
		$this->db->select('email');
		$this->db->from('user_master'); 
		$query=$this->db->get();
		return $query->row_array();
	}
	public function update_key($data)
	{   
		$this->db->set('create_key', $data['reset_pwd']); 
		$this->db->where('email', $data['email']); 
		return $this->db->update($this->table);
    }
	public function update_password($data)
	{ 
		$this->db->set('password', $data['password']); 
		$this->db->set('create_key', ''); 
		$this->db->where('create_key', $data['create_key']); 
		return $this->db->update($this->table);
	}
	public function update_userprofile($data,$imgid)
	{   
		$this->db->where('id_user_master', $imgid); 
		$this->db->update($this->table,array('profile_image'=>$data));
		if ($this->db->affected_rows() == '1')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update_user_pridetails($data,$userid)
	{   
		$this->db->where('id_user_master', $userid); 
		$this->db->update($this->table,$data);
		if ($this->db->affected_rows() == '1')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_checkpassword($data,$userid)
	{    
		$this->db->select('*');
		$this->db->from('user_master'); 
		$this->db->where('password',$data['password']); 
		$this->db->where('id_user_master',$userid['id_user_master']); 
		$query=$this->db->get();
		$res_val = $query->row_array();

		if (!empty($res_val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
   	public function get_profile_img($userid)
	{
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user_master',$userid);
		$result = $this->db->get();
		$results =$result->row();
		return $results;
		
	}
	function getUserBasicDetails($param, $column='', $option=array())
	{
		($column == '') ? $this->db->select('*') : $CI->db->select($column);

		if (is_array($param) && count($param)>0){
		$this->db->where($param);
		}else{
		$this->db->where(array('id_user_master'=>$param,'status'=>1));
		}
		$result = $this->db->get('user_master');
		if ($result != FALSE && $result->num_rows()>0)
		{
		$result = $result->row();
		return $result;
		}
		return FALSE;
	}
	public function get_singleuser_list($usid)
	{
			$this->db->select('*');
			$this->db->from('user_master'); 
			$this->db->where('id_user_master',$usid); 
			$query=$this->db->get();
			return $query->row();
	}
	public function get_singleadmin_list($usid)
	{
			$this->db->select('*');
			$this->db->from('user_master'); 
			$this->db->where('id_user_master',$usid); 
			$query=$this->db->get();
			return $query->row();
	}
	public function get_singleproperty_list($usid)
	{
			$this->db->select('*');
			$this->db->from('user_property'); 
			$this->db->where('property_user_id',$usid); 
			$query=$this->db->get();
			return $query->result();
	}
	public function checkcurrentpass($upasswordusid)
	{
			$this->db->select('*');
			$this->db->from('user_master'); 
			$this->db->where('password',$upasswordusid['password']); 
			$this->db->where('id_user_master',$upasswordusid['id_user_master']); 
			$result = $query=$this->db->get();
			 
			if($result != FALSE && $result->num_rows()>0)
			{
				return TRUE ;
			}
			
			return FALSE;
	}
	public function contractordetails($userid,$data)
	{   
			$this->db->where('id_user_master', $userid); 
			$this->db->update($this->table,$data);
	}

	public function insertadmin($data)
	{
			$this->db->insert('user_master', $data);
			return $this->db->insert_id();

	}
	public function getUserBasicDetails_api($auth_key)
	{			
		$this->db->select('user_master.id_user_master,user_master.first_name,user_master.last_name,user_master.username,user_master.skills,user_master.user_workpermitno,user_master.workexpirydate,user_master.companyname,user_master.email,user_master.password,user_master.phone,user_master.user_type,user_master.profile_image','user_authkey.authkey');
		$this->db->from('user_master');
		$this->db->join('user_authkey', 'user_authkey.user_id = user_master.id_user_master');
		$this->db->where('authkey',$auth_key);	
		$this->db->where('status',1);        
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
	public function getUserBasicDetails_apibyid($user_id)
	{
		$this->db->select('id_user_master,first_name,last_name,username,user_workpermitno,workexpirydate,companyname,email,password,phone,user_type,profile_image');
		$this->db->from($this->table);
		$this->db->where('id_user_master',$user_id);	        
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
		public function getUserBasicDetailsnew_api($id)
	{			
		$this->db->select('id_user_master,first_name,last_name,username,user_workpermitno,skills,workexpirydate,companyname,email,password,phone,user_type,profile_image');
		$this->db->from($this->table);
		$this->db->where('id_user_master',$id);	
		$this->db->where('status',1);        
		$result = $this->db->get();
		$results =$result->row();
		return $results;
	}
	public function get_alltaskcategory()
	{							
		$this->db->select('*');
		$this->db->from('task_category');
		$this->db->where("status",1);
		$this->db->order_by("id","asc"); 
		$query = $this->db->get();
		return $query->result();		
	}
	public function checkemail($email)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$email);			
		$query = $this->db->get();
		return $query->result();	
	}
	public function checkpassword($password)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('password',$password);			
		$query = $this->db->get();
		return $query->result();	
	}
	public function getUsernotexistDetails($where1)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where($where1);			
		$result = $this->db->get();
		return ($result != FALSE && $result->num_rows()>0) ? 'true' : 'false';
	}
	public function check_emailpassword($email,$password)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$email);
		$this->db->where('password',$password);	
		$this->db->where('status','1');				
		$query = $this->db->get();
		return $query->row();
	}
	public function getresetuserdata($email)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$email);
		$query = $this->db->get();
		return $query->row();
	}
	public function gewtcontdetails($contid)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('id_user_master',$contid);
		$query = $this->db->get();
		return $query->row();
	}
	
	/*new*/
	  
	public function ForgotPassword1($email)
	{
		$this->db->select('email');
		$this->db->from('user'); 
		$this->db->where('email', $email); 
		$query=$this->db->get();
		return $query->row_array();
	}

	public function updatepass_for($data)
	{
		$this->db->set('password', $data['password']); 
		$this->db->where('email', $data['email']); 
		return $this->db->update($this->table);
	}


	public function update_key1($data)
	{
		$this->db->set('create_key', $data['s_key']); 
		$this->db->where('email', $data['email']); 
		return $this->db->update($this->table);
	}

	public function update_password1($data)
	{
		$this->db->set('password', $data['password']); 
		$this->db->where('s_key', $data['s_key']); 
		return $this->db->update($this->table);
	}
	public function updatedeviceid_api($uid,$key)
    {
		$this->db->where('id_user_master',$uid);
		return  $this->db->update($this->table,array('device_id'=>$key)); 
	}
	public function get_post($uid)
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('company_userid',$uid);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function sfprofess()
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('user_type','professional');
		$where = '(user_type="professional" or user_type = "student")';
		$this->db->where($where);
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function compprofess()
	{
		$this->db->select('*');
        $this->db->from('user_master');
        $this->db->where('user_type','company');
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function profile_user($userid)
	{

		$this->db->select('*');
        $this->db->from('user_master');
        $where = '(user_type="professional" or user_type = "student")';
        $this->db->where($where);
        $this->db->where('id_user_master',$userid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function user_data($uset_id)
	{
	
		$this->db->select('*');
        $this->db->from('user_master');
        $this->db->where('id_user_master',$uset_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function pro_data($pro_id)
	{
	
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('po_id',$pro_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function get_ratingjob($ratedata)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where('po_id',$ratedata['po_id']);
		//~ $this->db->where('comid',$ratedata['userid']);
		$this->db->where('comid',$ratedata['comid']);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function get_rating($ratedata)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where('po_id',$ratedata['po_id']);
		 $this->db->where('userid',$ratedata['userid']);
		$this->db->where('comid',$ratedata['comid']);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function insertrating($ratedata)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where('po_id',$ratedata['po_id']);
		$this->db->where('comid',$ratedata['comid']);
		$this->db->where('userid',$ratedata['userid']);
		$query = $this->db->get();
		$result = $query->row();
		if(!empty($result))
		{
			$this->db->where('ra_id',$result->ra_id);
			return  $this->db->update('rating',array('countrating'=>$ratedata['countrating'])); 
		}
		else
		{			
			return  $this->db->insert('rating',$ratedata); 
		}
	}
       
       public function getsenderdetails($senderid)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('id_user_master',$senderid);
		$query = $this->db->get();
		return $result = $query->row();
	}
       public function get_bidjob($uid)
	{
		$this->db->select('*');
		$this->db->from('postjob');
		$this->db->from('job_bids','job_bids.com_id = postjob.company_userid');
		$this->db->where('job_bids.user_id',$uid);
		$this->db->where('job_bids.status',1);
		$query = $this->db->get();
		return $result = $query->result();
	}
}
