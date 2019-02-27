<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('admin/login');
		}
		$this->load->model('task_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->quickViewSalesRep = array(
			'View Sales REP' => array('icon'=>'icon-users','href'=>BASE_URL.'/user/view_sales_rep'),
			'Add Sales REP' => array('icon'=>'icon-user','href'=>BASE_URL.'/user/sales_rep'),
		);
		$this->quickSalesRepPageTop = array(
			'View Sales REP' => array('icon'=>'icon-users','href'=>BASE_URL.'/user/view_sales_rep'),
			'Add Sales REP' => array('icon'=>'icon-user','href'=>BASE_URL.'/user/sales_rep'),
		);
	}
		
	public function index()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/user_list";
		$data['current_menu']  = "user";
		$data['sub_menu']  = "list";
		$data['list_of_users']  = $this->users_model->getUsers();
		$this->template->load_frontend_template($data);
	}
	
	public function user_level()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/user_level_list";
		$data['current_menu']  = "user";
		$data['sub_menu']  = "list_user_level";
		$data['list_of_user_levels']  = $this->users_model->getUserLevel();
		$this->template->load_frontend_template($data);
	}
	public function create()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/create_user";
		$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1'));
		$data['admin_of_task']  = $this->task_model->get_task_details();
		$data['current_menu']  = "user";
		$data['sub_menu']  = "create";
		$this->template->load_frontend_template($data);
	}
	public function users()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/users";
		$where = array('user_type ='=>'company'); 
		$data['list_of_users']  = $this->users_model->getUsers($where);
		$data['current_menu']  = "user";
		$data['sub_menu']  = "users";
		$this->template->load_frontend_template($data);
	}
	
	public function professional()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/professional";
		$where = array('user_type ='=>'professional'); 
		$data['list_of_users']  = $this->users_model->getUsers($where);
		$data['current_menu']  = "user";
		$data['sub_menu']  = "professional";
		$this->template->load_frontend_template($data);
	}

	public function student()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/student";
		$where = array('user_type ='=>'student'); 
		$data['list_of_users']  = $this->users_model->getUsers($where);
		$data['current_menu']  = "user";
		$data['sub_menu']  = "student";
		$this->template->load_frontend_template($data);
	}
	public function updateuser($uid = 0)
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/userupdate";
		$data['user_information']  = $this->users_model->getUserBasicDetails(array('id_user_master'=>$uid),'',array('image'=>TRUE));		
		$data['usercontractor']  = $this->users_model->get_alltaskcategory();
		$userlist = $data['list_of_users']  = $this->users_model->get_singleuser_list($uid);
		$data['singleproperty'] = $this->users_model->get_singleproperty_list($uid);
		$data['current_menu']  = "user";
		if($userlist->user_type == 'application_user')
		{
		$data['sub_menu']  = "users";
		}
		else
		{
		$data['sub_menu']  = "contractor";
		}
		$this->template->load_frontend_template($data);
	}
	public function updateadmin($adminid = 0)
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/adminupdate";
		$data['admin_details']  = $this->users_model->get_singleadmin_list($adminid);	
		$data['list_of_users']  = $this->users_model->get_singleuser_list($adminid);
		$data['current_menu']  = "user";
		$data['sub_menu']  = "adminupdate";
		$this->template->load_frontend_template($data);
	}
	public function contractor()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/contractor";
		$data['list_of_users']  = $this->users_model->getUsers();
		$data['usercontractor']  = $this->users_model->get_alltaskcategory();
		$data['current_menu']  = "user";
		$data['sub_menu']  = "contractor";
		$this->template->load_frontend_template($data);
	}
	
	public function getappuser()
	{
		$userdetails = $this->users_model->getapplicationusers();		
		print json_encode($userdetails);
	}
	
	public function administrator()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/administrator";
		$data['list_of_users']  = $this->users_model->getUsers();
		$data['current_menu']  = "user";
		$data['sub_menu']  = "admin";
		$this->template->load_frontend_template($data);
	}	
	public function change_status()
	{
		$this->users_model->updatestatusUsers($this->input->get('uid'),$this->input->get('status'));
		redirect('admin/user/users');
	}
	public function contractordetails()
	{
		$data = array('companyname'=> $this->input->post('compname'),'user_workpermitno'=>$this->input->post('wrkperno'),'workexpirydate' =>date("j M Y", strtotime($this->input->post('wrkperexpdate'))),'skills' => implode(',',$this->input->post('check')),'user_type'=>'contractor');
		$this->users_model->contractordetails($this->input->post('searchuserid'),$data);
	}
	public function admindetails()
	{
		$data = array(
			'first_name'=> $this->input->post('adminusername'),
			'username'=> $this->input->post('adminusername'),
			'email'=>$this->input->post('adminemail'),
			'skills' => implode(',',$this->input->post('check')),
			'phone' => $this->input->post('adminphone'),
			'password' =>md5($this->input->post('adminpassword')),			
			'user_type'=>'superuser'
		);			
		echo $last_insert_id = $this->users_model->insertadmin($data);	
	}
	
	public function change_contractstatus()
	{
		$this->users_model->updatestatusUsers($this->input->get('uid'),$this->input->get('status'));		
		redirect('admin/user/contractor');
	}
	public function get_singleuser_list()
	{
		$singleuser = $this->users_model->get_singleuser_list($this->input->post('us_id'));
		$singleproperty = $this->users_model->get_singleproperty_list($this->input->post('us_id'));
		$get_alltaskcategory = $this->users_model->get_alltaskcategory();
		if(!empty($get_alltaskcategory))
		{
			foreach($get_alltaskcategory as $get_alltaskcategoryval)
			{
				$get_alltaskcategoryvalarridarr[] = $get_alltaskcategoryval->id;
				$get_alltaskcategoryvalarrarr[] = $get_alltaskcategoryval->taskcategory_name;
			}			
			$singleuser->serviceid =	$get_alltaskcategoryvalarridarr;
			$singleuser->servicename =	$get_alltaskcategoryvalarrarr;
		}
		else
		{
			$singleuser->serviceid ="";
			$singleuser->servicename ="";
		}
		if(!empty($singleproperty))
		{
			foreach($singleproperty as $singlepropertyval)
			{
				$singlepropertyvalarr[] = ucfirst($singlepropertyval->property_name);
				$singlepropertyvalidarr[] = $singlepropertyval->ID;
				$singlepropertyvaladdrarr[] = $singlepropertyval->property_address;
			}			
			$singleuser->pname =	$singlepropertyvalarr;
			$singleuser->pid =	$singlepropertyvalidarr;
			$singleuser->paddress =	$singlepropertyvaladdrarr;
		}
		else
		{
			$singleuser->pname ="";
			$singleuser->pid ="";
			$singleuser->paddress="";
		}
		echo json_encode($singleuser);	
	}
	public function get_singleadmin_list()
	{
		$singleuser = $this->users_model->get_singleadmin_list($this->input->post('us_id'));
		echo json_encode($singleuser);	
	}

	public function sales_rep()
	{
		$data['title']  = "Add Sales Representative";
		$data['quickView']  = $this->quickViewSalesRep;
		$data['pageTop']  = $this->quickSalesRepPageTop ;
		$data['base_url'] = base_url();
		$data['view_file']  = "sales_rep/create_user";
		$data['user_type'] = 'sales_rep';
		$data['current_menu']  = "sales_rep";
		$this->template->load_frontend_template($data);
	}

	public function info($user_id = FALSE)
	{
		if($user_id == FALSE){
			$data['base_url'] = base_url();
			$data['view_file']  = "access_denied/access_denied";
			$data['current_menu']  = "sales_rep";			
			$this->template->load_frontend_template($data);
			return TRUE;
		}else{
			$data['title']  = "View Sales Representative";
			$data['quickView']  = $this->quickViewSalesRep;
			$data['base_url'] = base_url();
			$data['pageTop']  = $this->quickSalesRepPageTop ;
			$data['view_file']  = "sales_rep/user_info";
			$data['get_user'] =  $this->users_model->getUsers(array("id_user_master"=>$user_id),"row");
			$data['user_type'] = 'sales_rep';
			$data['current_menu']  = "sales_rep";
			$this->template->load_frontend_template($data);
		}
	}

	public function view_sales_rep()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "sales_rep/user_list";
		$data['pageTop']  = $this->quickSalesRepPageTop ;
		$data['current_menu']  = "sales_rep";
		$data['title']  = "Sales Representative";
		$data['quickView']  = $this->quickViewSalesRep;
		$data['list_of_users']  = $this->users_model->getUsers(array('user_type'=>'sales_rep'),"result",FALSE,array(),array('order_by'=>'user_cust_code','disp_order'=>'DESC'));
		$this->template->load_frontend_template($data);
	}
	
	public function get_user_template($user_id = 0)
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1'));
			$data['get_user'] =  $this->users_model->getUsers(array("id_user_master"=>$user_id),"row");
			$this->load->view('backend/user/user_edit_template',$data);		
		}
	}

	public function get_user_sales_template($user_id = 0)
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1'));
			$data['get_user'] =  $this->users_model->getUsers(array("id_user_master"=>$user_id),"row");
			$this->load->view('backend/sales_rep/user_edit_template',$data);		
		}
	}

	public function get_user_sales_address_template($user_id = 0)
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['get_user_address'] =  $this->users_model->getUserAddress(array("id_user_address"=>$user_id),$column='', $option=array(),"row");
			$this->load->view('backend/sales_rep/user_edit_address_template',$data);		
		}
	}
	public function create_user_level()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/create_user_level";
		$data['current_menu']  = "user";
		$data['sub_menu']  = "create_user_level";
		$this->template->load_frontend_template($data);
	}
	public function delete_user()
	{
		if ($this->input->is_ajax_request()){
			$user_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->usertracking->track_this("Deleting User");
				$this->users_model->user_delete(array("status"=>"2"),array("id_user_master"=>$user_id));
			}
			if($task  == 'p'){
					$this->usertracking->track_this("Deleting user permanently");
					$this->users_model->user_delete_permanently(array("id_user_master"=>$user_id));
			}
			echo TRUE;
			exit;
		}
	}
	
	public function get_user_level_template($user_level_id = 0 )
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['get_user_level'] =  $this->users_model->getUserLevel(array("id_user_levels"=>$user_level_id),"row");
			$this->load->view('backend/user/user_level_edit_template',$data);
		}
	}
	public function delete_user_level()
	{
		if ($this->input->is_ajax_request()){
			$user_level_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->usertracking->track_this("Deleting user level");
				$this->users_model->user_level_delete(array("status"=>"2"),array("id_user_levels"=>$user_level_id));
			}
			if($task  == 'p'){
					$this->usertracking->track_this("Deleting user level permanently");
					$this->users_model->user_level_delete_permanently(array("id_user_levels"=>$user_level_id));
			}
			echo TRUE;
			exit;
		}
	}
	public function create_new_user()
	{
	if ($this->input->is_ajax_request()){
		
			$usetType = $this->input->post("user_type");
			$userCustCode = ($usetType !='superuser') ? $this->users_model->getSalesRepCode(array('user_type'=>$usetType)) : 0;
			$create_new_user = array(
				"first_name"=>$this->input->post("user_name"),
				"phone"=>$this->input->post("phone"),
				"username"=>$this->input->post("user_name"),
				"email"=>$this->input->post("useremail"),
				"password"=>md5($this->input->post("password")),
				"skills"=>$this->input->post("skills"),
				"user_type"=>$usetType,
				"profile_image"=>$this->input->post("imag_val"),
				"user_cust_code"=>$userCustCode,
				"created_on"=>getCurrentDateTime(),	
				"gender"=>$this->input->post("gender")
			);
			$user_id = $this->users_model->user_insert($create_new_user);
			if($user_id != FALSE && $usetType !='superuser'){				
				$user_address = array(
					'pk_id_user'=>$user_id,					
					'address_1'=>$this->input->post("street_address"),
					'user_workpermitno'=>$this->input->post("wpno"),
					'companyname'=>$this->input->post("comname"),
					'post_code'=>$this->input->post("postcode"),					
					'phone_number'=>$this->input->post("phone"),
					'useremail'=>$this->input->post("useremail"),
					'address_created_on'=>getCurrentDateTime(),
					'address_status'=>1,
			    );
			    $user_id = $this->users_model->user_address_insert($user_address);
			}
		}
	}
	
	public function update_user()
	{
		if ($this->input->is_ajax_request()){
			$id_user_master = $this->input->post("user_id");
			$id_user_address = $this->input->post("id_user_address");
			$user_cust_code = $this->input->post("user_cust_code");
			$usetType = $this->input->post("user_type");
			if($user_cust_code == 0){
				$userCustCode = ($usetType !='superuser') ? $this->users_model->getSalesRepCode(array('user_type'=>$usetType)) : 0;
			}else{
				$userCustCode = $user_cust_code;
			}
			$update_user = array(
				"first_name"	=>	$this->input->post("first_name"),
				"last_name"	=>	$this->input->post("last_name"),
				"phone"	=>	$this->input->post("phone"),
				"email"	=>	$this->input->post("useremail"),				
				"user_type"	=>	$usetType,
				"user_cust_code"	=>	$userCustCode,
				"update_on"	=>	getCurrentDateTime(),	
				"status"	=>	$this->input->post("user_status"),					
			);
			if($this->input->post("password") != ""){
				$this->usertracking->track_this("Updating User Password");
				$update_user["password"] = md5($this->input->post("password"));
			}
			$this->usertracking->track_this("Updating User ");
			$this->users_model->user_update($update_user,array("id_user_master"=>$id_user_master));
		}
	}
	public function create_new_user_level()
	{
		if ($this->input->is_ajax_request()){
			$create_new_user_level = array(
				"level_name"=>$this->input->post("level_name"),
				"level_key"=>$this->input->post("level_key")				
			);
			$this->usertracking->track_this("User Level Created ");
			$this->users_model->user_level_insert($create_new_user_level);
		}
	}

	public function update_user_level()
	{
		if ($this->input->is_ajax_request()){
			$id_user_levels = 	$this->input->post("level_id");	
			$update_user_level = array(
				"level_name"=>$this->input->post("level_name"),
				"level_key"=>$this->input->post("level_key"),
				"status"=>$this->input->post("level_status")				
			);
			$this->users_model->user_level_update($update_user_level,array("id_user_levels"=>$id_user_levels));
		}
	}
	public function unquie()
	{
		if ($this->input->is_ajax_request()){
			$type = $this->input->post('type');		
			if($type == 'username'){
				$username = $this->input->post('username');
				$u_key = $this->input->post('u_key');
				if($u_key != ""){
					echo getUseruniqueDetails(array('username'=>$username,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('username'=>$username));
				exit;
			}
			if($type == 'sales_rep_number'){
				$sales_rep_number = $this->input->post('sales_rep_number');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getUseruniqueDetails(array('user_type'=>'sales_rep','user_cust_code'=>$sales_rep_number,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('user_type'=>'sales_rep','user_cust_code'=>$sales_rep_number));
				exit;
				
			}
			if($type == 'email'){
				$useremail = $this->input->post('useremail');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getUseruniqueDetails(array('email'=>$useremail,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('email'=>$useremail));
				exit;
			}
		}
	}
	
	public function unquie_level()
	{
		if ($this->input->is_ajax_request()){
			$type = $this->input->post('type');		
			if($type == 'name'){
				$level_name = $this->input->post('level_name');
				$level_id = $this->input->post('level_id');
				if($level_id != ""){
					echo getUseruniqueLevelDetails(array('level_name'=>$level_name,'id_user_levels !='=>$level_id));
					exit;
				}
				echo getUseruniqueLevelDetails(array('level_name'=>$level_name));
				exit;
			}
			if($type == 'key'){
				$level_key = $this->input->post('level_key');
				$level_id = $this->input->post('level_id');
				if($level_id != ""){
					echo getUseruniqueLevelDetails(array('level_key'=>$level_key,'id_user_levels !='=>$level_id));
					exit;
				}
				echo getUseruniqueLevelDetails(array('level_key'=>$level_key));
				exit;
			}
		}
	}
	public function user_access()
	{
		$this->load->model('privileges_model');
		$data['base_url'] = base_url();
		$data['view_file']  = "user/user_access";
		$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1',"level_key !="=>"superuser"));
		$userList = $this->users_model->getUsers(array("status"=>'1',"user_type !="=>"superuser"),'result',FALSE,array(),array(),FALSE,'id_user_master,user_type');
		$data['list'][''] = 'Select User';
		$data['list_user'] = getFormatDropDown($userList,'id_user_master','fullName',$blank=array());
		$data['users'] = $data['list']+$data['list_user'];
		$data['user_privileges'] =  $this->privileges_model->get_privileges();
		$data['current_menu']  = "user";
		$data['sub_menu']  = "user_access";
		$this->template->load_frontend_template($data);
	}
	public function user_privileges(){
		$aResponse = array();
		$userId = $this->input->post('userId');
		$aResponse['list'] = userPrivilgesList($userId);
		echo json_encode($aResponse);
	}
	public function access()
	{
		$this->load->model('privileges_model');
		$data['base_url'] = base_url();
		$data['view_file']  = "user/default_access";
		$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1',"level_key !="=>"superuser"));
		$data['user_privileges'] =  $this->privileges_model->get_privileges();
		$data['current_menu']  = "user";
		$data['sub_menu']  = "user_access";
		$this->template->load_frontend_template($data);
	}
	public function save_default_access()
	{
		if ($this->input->is_ajax_request()){
			if($this->input->post() != "" && is_array($this->input->post()) && !empty($this->input->post())){
				$user_level_permission = $this->input->post();			
				$this->usertracking->track_this("Changing Permission For Users");
				$this->users_model->truncate_default_access_privileges();
				foreach($user_level_permission as $user_key=>$user_level){	
						$data['user_type_key'] = $user_key;
					foreach($user_level as $values){	
						$data['id_privileges'] = $values; 
						$this->users_model->default_access_privileges($data);			
					}
				}
				echo TRUE;
				exit;
			}
			echo FALSE;
				exit;
		}else{
			$this->usertracking->track_this("User Access this page directly form the browser");
		}
	}
	public function save_user_access()
	{
		if ($this->input->is_ajax_request()){
			if($this->input->post() != "" && is_array($this->input->post()) && !empty($this->input->post())){
				$user_level_permission = $this->input->post();			
				$this->usertracking->track_this("Changing Permission For Users");
				//$this->users_model->truncate_user_access_privileges();
				$userId=$this->input->post('user_id');
				$this->users_model->delete('user_privileges',array('id_user'=>$userId));

				$data['id_user'] = $userId; 
				foreach($user_level_permission as $user_key=>$user_level){	
						$data['user_type_key'] = $user_key;
					foreach($user_level as $values){	
						$data['id_privileges'] = $values; 
						
						$this->users_model->user_access_privileges($data);			
					}
				}
				echo TRUE;
				exit;
			}
			echo FALSE;
				exit;
		}else{
			$this->usertracking->track_this("User Access this page directly form the browser");
		}
	}
	
	function ajax_upload()  
	{  
		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('image_file'))  
		{  
			echo json_encode( array('error' => $this->upload->display_errors()));  
		}  
		else  
		{  
			$data = $this->upload->data();  
			if($this->input->post('img_userid'))
			{
				if($this->users_model->update_userprofile($data["file_name"],$this->input->post('img_userid'))== true)
				{
					$imgval = array('success' => 'success' ,'data_image' => $data["file_name"]);  
					echo json_encode($imgval );
				}
			}
			else
			{
				$imgval = array('success' => 'success' ,'data_image' => $data["file_name"]);  
				echo json_encode($imgval );
			}
		}
	}
	public function user_image()
	{
		if ($this->input->is_ajax_request())
		{
			$output = '';
			$config["upload_path"] = './uploads/';
			$config['overwrite'] = TRUE;
			$config["allowed_types"] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file'))
			{
				$error = array('error' => $this->upload->display_errors());
			  echo   $error['error'] ;
			  exit;
			} else 
			{
					$config = array();
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/' . $data['upload_data']['file_name'];
					$config['maintain_ratio'] = TRUE;
					$config['width']         = 1050;
					$config['height']       = 500;
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$config = array();
					$output .= $data['upload_data']['file_name'];
			} 
     echo $output;   
    }
	}
            
    public function user_info()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/user_info";
		$this->template->load_frontend_template($data);
		
	}
    public function user_editform($user_id = 0)
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "user/user_editform";
		$data['current_menu']  = "user";
		$data['id_user_get']  = $user_id;
		$data['get_userdetails']  = $this->users_model->user_editform($user_id);		
		$data['get_useraddressdetails']  = $this->users_model->user_editaddressform($user_id);		
		$data['sub_menu']  = "list";
		$this->template->load_frontend_template($data);
	}
    
    public function oldpassword_response_check()
	{ 
		$oldpass = array('user_id' => $this->input->post('user_id'),
		'oldpass'=> $this->input->post('oldpassword'));
		$old_res =	$this->users_model->user_oldpassword($oldpass);			
		echo json_encode($old_res);
	}
	
    public function change_password()
	{
		$oldchangepass = array('password' => $this->input->post('password'),
		'oldpassword' =>$this->input->post('oldpassword'));
		$old_res =	$this->users_model->user_changeoldpassword($oldchangepass );			
	}

	public function addNewAddress()
	{
		$oldchangeaddress = array( 'phone' => $this->input->post('newPhone'),
		'city' =>$this->input->post('newCity'),
		'state' =>$this->input->post('newState'),
		'address_1' =>$this->input->post('newAddress'),
		'post_code' =>$this->input->post('newPincode'),
		'address_modified_on' =>date('Y-m-d H:i:s')
		);
		$old_res =	$this->users_model->user_changeoldaddress($oldchangeaddress,$this->input->post('usid') );			

	}
	public function update_userfield()
	{
		$apupstatus = $this->input->post('apupstatus');
		$upd_data = array('first_name	'=> $this->input->post('first_name'),
		'phone	'=>$this->input->post('user_phone'),
		'user_type	'=>$this->input->post('user_type'),
		'status	'=> $apupstatus,
		'username	'=>$this->input->post('first_name'));
		if($this->users_model->update_user_pridetails($upd_data,$this->input->post('img_userid')) == true );		
		{	
			redirect("admin/user/user_editform/".$this->input->post('img_userid'));
		}
	}
	public function update_userdata()
	{
		//~ var_dump($this->input->post());
			//~ exit;
			
	
		if($this->input->post('user_type') == 'company'){
			
			$upd_data = array(
			'profile_image'=> $this->input->post('img_link'),
			'first_name'=> $this->input->post('first_name'),
			'user_type'=>$this->input->post('user_type'),
			'companyperemail'=>$this->input->post('companyperemail'), 
			'companypercellphone'=>$this->input->post('companypercellphone'),
			'zip_code'=>$this->input->post('zipcode'),
			'positioncompany'=>$this->input->post('positioncompany'),
			'companyname'=>$this->input->post('companyname'),
			'address'=>$this->input->post('address'),
			'weblink'=>$this->input->post('weblink'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'companyperion'=>$this->input->post('companyperion'),
			'officephone'=>$this->input->post('officenumber'),
			'phone'=>$this->input->post('celphone'),
			'email'=>$this->input->post('user_email'),
			'industry'=>$this->input->post('industry'),
			);		
		}
		else if($this->input->post('user_type') == 'professional' || $this->input->post('user_type') == 'student'){
		
			$upd_data = array('profile_image'=> $this->input->post('img_link'),
			'first_name	'=> $this->input->post('first_name'),
			'phone	'=>$this->input->post('user_phone'),
			'email	'=>$this->input->post('user_email'),
			'username	'=>$this->input->post('first_name'),
			'positioncompany'=>$this->input->post('positioncompany'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zip_code'=>$this->input->post('zipcode'),
			'phone'=>$this->input->post('cellphone'),
			'officephone'=>$this->input->post('officephone'),
			'email'=>$this->input->post('user_email'),
			
			);
		}
		else
		{
			$upd_data = array('profile_image'=> $this->input->post('img_link'),
			'first_name	'=> $this->input->post('first_name'),
			'phone	'=>$this->input->post('user_phone'),
			'email	'=>$this->input->post('user_email'),
			'username	'=>$this->input->post('first_name'));
		}
			$userupdate_res = $this->users_model->update_user_pridetails($upd_data,$this->input->post('img_userid'));		
			echo json_encode(array('success'=> 'success') );
	}
	
	public function update_admindata()
	{
			$upd_data = array(
			'profile_image'=> $this->input->post('img_link'),
			'first_name	'=> $this->input->post('adminusername'),
			'phone	'=>$this->input->post('adminphoneno'),
			'email	'=>$this->input->post('adminemail'),
			'username'=>$this->input->post('adminusername'),
			'skills	'=>implode(',',$this->input->post('check'))
			);
			$userupdate_res = $this->users_model->update_user_pridetails($upd_data,$this->input->post('userid'));		
			echo json_encode(array('success'=> 'success') );
	}

	public function changepasswordadmin()
	{
			$current_password  = $this->input->post('current_password');
			$user_id  = $this->input->post('user_id');
			$new_password = $this->input->post('new_password');
			$get_user = $this->users_model->checkcurrentpass(array('password'=>md5($current_password),'id_user_master'=>$user_id ));
			if($get_user == FALSE){
				echo 'current_fail';
				exit;
			}
			$data['password'] = md5($new_password);
			$this->users_model->update($data, array('id_user_master'=>$user_id ));
			echo  'true';
			exit;	
	}
	public function changepassword()
	{
		if ($this->input->is_ajax_request())
		{				
			$email = $this->input->post('reset_email');  
			$emaildata = $this->users_model->getresetuserdata($email);  

			$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$verificationText =substr(str_shuffle($letters), 0, 10);
			$newpass = md5($verificationText);
			$baseurl = base_url();
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Safety engagement - Activation</title>
			<!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
			<meta name="viewport" content="width=device-width"><style type="text/css">
			@media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:34px !important;line-height:43px !important}.wrapper h2{}.wrapper h2{font-size:30px !important;line-height:38px !important}.wrapper h3{}.wrapper h3{font-size:20px !important;line-height:28px !important}.column p,.column ol,.column ul{}.wrapper .size-8{font-size:8px !important;line-height:14px !important}.wrapper .size-9{font-size:9px !important;line-height:16px !important}.wrapper .size-10{font-size:10px !important;line-height:18px !important}.wrapper .size-11{font-size:11px !important;line-height:19px !important}.wrapper .size-12{font-size:12px !important;line-height:19px !important}.wrapper .size-13{font-size:13px !important;line-height:21px !important}.wrapper .size-14{font-size:14px !important;line-height:21px !important}.wrapper .size-15{font-size:15px 
			!important;line-height:23px !important}.wrapper .size-16{font-size:16px !important;line-height:24px !important}.wrapper .size-17{font-size:17px !important;line-height:26px !important}.wrapper .size-18{font-size:18px !important;line-height:26px !important}.wrapper .size-20{font-size:20px !important;line-height:28px !important}.wrapper .size-22{font-size:22px !important;line-height:31px !important}.wrapper .size-24{font-size:24px !important;line-height:32px !important}.wrapper .size-26{font-size:26px !important;line-height:34px !important}.wrapper .size-28{font-size:28px !important;line-height:36px !important}.wrapper .size-30{font-size:30px !important;line-height:38px !important}.wrapper .size-32{font-size:32px !important;line-height:40px !important}.wrapper .size-34{font-size:34px !important;line-height:43px !important}.wrapper .size-36{font-size:36px !important;line-height:43px 
			!important}.wrapper .size-40{font-size:40px !important;line-height:47px !important}.wrapper .size-44{font-size:44px !important;line-height:50px !important}.wrapper .size-48{font-size:48px !important;line-height:54px !important}.wrapper .size-56{font-size:56px !important;line-height:60px !important}.wrapper .size-64{font-size:64px !important;line-height:63px !important}}
			</style>
			<style type="text/css">
			body {
			margin: 0;
			padding: 0;
			}
			table {
			border-collapse: collapse;
			table-layout: fixed;
			}
			* {
			line-height: inherit;
			}
			[x-apple-data-detectors],
			[href^="tel"],
			[href^="sms"] {
			color: inherit !important;
			text-decoration: none !important;
			}
			.wrapper .footer__share-button a:hover,
			.wrapper .footer__share-button a:focus {
			color: #ffffff !important;
			}
			.btn a:hover,
			.btn a:focus,
			.footer__share-button a:hover,
			.footer__share-button a:focus,
			.email-footer__links a:hover,
			.email-footer__links a:focus {
			opacity: 0.8;
			}
			.preheader,
			.header,
			.layout,
			.column {
			transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;
			}
			.layout,
			.header {
			max-width: 400px !important;
			-fallback-width: 95% !important;
			width: calc(100% - 20px) !important;
			}
			div.preheader {
			max-width: 360px !important;
			-fallback-width: 90% !important;
			width: calc(100% - 60px) !important;
			}
			.snippet,
			.webversion {
			Float: none !important;
			}
			.column {
			max-width: 400px !important;
			width: 100% !important;
			}
			.fixed-width.has-border {
			max-width: 402px !important;
			}
			.fixed-width.has-border .layout__inner {
			box-sizing: border-box;
			}
			.snippet,
			.webversion {
			width: 50% !important;
			}
			.ie .btn {
			width: 100%;
			}
			.ie .column,
			[owa] .column,
			.ie .gutter,
			[owa] .gutter {
			display: table-cell;
			float: none !important;
			vertical-align: top;
			}
			.ie div.preheader,
			[owa] div.preheader,
			.ie .email-footer,
			[owa] .email-footer {
			max-width: 560px !important;
			width: 560px !important;
			}
			.ie .snippet,
			[owa] .snippet,
			.ie .webversion,
			[owa] .webversion {
			width: 280px !important;
			}
			.ie .header,
			[owa] .header,
			.ie .layout,
			[owa] .layout,
			.ie .one-col .column,
			[owa] .one-col .column {
			max-width: 600px !important;
			width: 600px !important;
			}
			.ie .fixed-width.has-border,
			[owa] .fixed-width.has-border,
			.ie .has-gutter.has-border,
			[owa] .has-gutter.has-border {
			max-width: 602px !important;
			width: 602px !important;
			}
			.ie .two-col .column,
			[owa] .two-col .column {
			max-width: 300px !important;
			width: 300px !important;
			}
			.ie .three-col .column,
			[owa] .three-col .column,
			.ie .narrow,
			[owa] .narrow {
			max-width: 200px !important;
			width: 200px !important;
			}
			.ie .wide,
			[owa] .wide {
			width: 400px !important;
			}
			.ie .two-col.has-gutter .column,
			[owa] .two-col.x_has-gutter .column {
			max-width: 290px !important;
			width: 290px !important;
			}
			.ie .three-col.has-gutter .column,
			[owa] .three-col.x_has-gutter .column,
			.ie .has-gutter .narrow,
			[owa] .has-gutter .narrow {
			max-width: 188px !important;
			width: 188px !important;
			}
			.ie .has-gutter .wide,
			[owa] .has-gutter .wide {
			max-width: 394px !important;
			width: 394px !important;
			}
			.ie .two-col.has-gutter.has-border .column,
			[owa] .two-col.x_has-gutter.x_has-border .column {
			max-width: 292px !important;
			width: 292px !important;
			}
			.ie .three-col.has-gutter.has-border .column,
			[owa] .three-col.x_has-gutter.x_has-border .column,
			.ie .has-gutter.has-border .narrow,
			[owa] .has-gutter.x_has-border .narrow {
			max-width: 190px !important;
			width: 190px !important;
			}
			.ie .has-gutter.has-border .wide,
			[owa] .has-gutter.x_has-border .wide {
			max-width: 396px !important;
			width: 396px !important;
			}
			.ie .fixed-width .layout__inner {
			border-left: 0 none white !important;
			border-right: 0 none white !important;
			}
			.ie .layout__edges {
			display: none;
			}
			.mso .layout__edges {
			font-size: 0;
			}
			.layout-fixed-width,
			.mso .layout-full-width {
			background-color: #ffffff;
			}
			@media only screen and (min-width: 620px) {
			.column,
			.gutter {
			display: table-cell;
			Float: none !important;
			vertical-align: top;
			}
			div.preheader,
			.email-footer {
			max-width: 560px !important;
			width: 560px !important;
			}
			.snippet,
			.webversion {
			width: 280px !important;
			}
			.header,
			.layout,
			.one-col .column {
			max-width: 600px !important;
			width: 600px !important;
			}
			.fixed-width.has-border,
			.fixed-width.ecxhas-border,
			.has-gutter.has-border,
			.has-gutter.ecxhas-border {
			max-width: 602px !important;
			width: 602px !important;
			}
			.two-col .column {
			max-width: 300px !important;
			width: 300px !important;
			}
			.three-col .column,
			.column.narrow {
			max-width: 200px !important;
			width: 200px !important;
			}
			.column.wide {
			width: 400px !important;
			}
			.two-col.has-gutter .column,
			.two-col.ecxhas-gutter .column {
			max-width: 290px !important;
			width: 290px !important;
			}
			.three-col.has-gutter .column,
			.three-col.ecxhas-gutter .column,
			.has-gutter .narrow {
			max-width: 188px !important;
			width: 188px !important;
			}
			.has-gutter .wide {
			max-width: 394px !important;
			width: 394px !important;
			}
			.two-col.has-gutter.has-border .column,
			.two-col.ecxhas-gutter.ecxhas-border .column {
			max-width: 292px !important;
			width: 292px !important;
			}
			.three-col.has-gutter.has-border .column,
			.three-col.ecxhas-gutter.ecxhas-border .column,
			.has-gutter.has-border .narrow,
			.has-gutter.ecxhas-border .narrow {
			max-width: 190px !important;
			width: 190px !important;
			}
			.has-gutter.has-border .wide,
			.has-gutter.ecxhas-border .wide {
			max-width: 396px !important;
			width: 396px !important;
			}
			}
			@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
			.fblike {
			background-image: url(http://i3.cmail19.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
			}
			.tweet {
			background-image: url(http://i4.cmail19.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
			}
			.linkedinshare {
			background-image: url(http://i6.cmail19.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
			}
			.forwardtoafriend {
			background-image: url(http://i5.cmail19.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
			}
			}
			@media (max-width: 321px) {
			.fixed-width.has-border .layout__inner {
			border-width: 1px 0 !important;
			}
			.layout,
			.column {
			min-width: 320px !important;
			width: 320px !important;
			}
			.border {
			display: none;
			}
			}
			.mso div {
			border: 0 none white !important;
			}
			.mso .w560 .divider {
			Margin-left: 260px !important;
			Margin-right: 260px !important;
			}
			.mso .w360 .divider {
			Margin-left: 160px !important;
			Margin-right: 160px !important;
			}
			.mso .w260 .divider {
			Margin-left: 110px !important;
			Margin-right: 110px !important;
			}
			.mso .w160 .divider {
			Margin-left: 60px !important;
			Margin-right: 60px !important;
			}
			.mso .w354 .divider {
			Margin-left: 157px !important;
			Margin-right: 157px !important;
			}
			.mso .w250 .divider {
			Margin-left: 105px !important;
			Margin-right: 105px !important;
			}
			.mso .w148 .divider {
			Margin-left: 54px !important;
			Margin-right: 54px !important;
			}
			.mso .font-avenir,
			.mso .font-cabin,
			.mso .font-open-sans,
			.mso .font-ubuntu {
			font-family: sans-serif !important;
			}
			.mso .font-bitter,
			.mso .font-merriweather,
			.mso .font-pt-serif {
			font-family: Georgia, serif !important;
			}
			.mso .font-lato,
			.mso .font-roboto {
			font-family: Tahoma, sans-serif !important;
			}
			.mso .font-pt-sans {
			font-family: "Trebuchet MS", sans-serif !important;
			}
			.mso .footer__share-button p {
			margin: 0;
			}
			.mso .size-8,
			.ie .size-8 {
			font-size: 8px !important;
			line-height: 14px !important;
			}
			.mso .size-9,
			.ie .size-9 {
			font-size: 9px !important;
			line-height: 16px !important;
			}
			.mso .size-10,
			.ie .size-10 {
			font-size: 10px !important;
			line-height: 18px !important;
			}
			.mso .size-11,
			.ie .size-11 {
			font-size: 11px !important;
			line-height: 19px !important;
			}
			.mso .size-12,
			.ie .size-12 {
			font-size: 12px !important;
			line-height: 19px !important;
			}
			.mso .size-13,
			.ie .size-13 {
			font-size: 13px !important;
			line-height: 21px !important;
			}
			.mso .size-14,
			.ie .size-14 {
			font-size: 14px !important;
			line-height: 21px !important;
			}
			.mso .size-15,
			.ie .size-15 {
			font-size: 15px !important;
			line-height: 23px !important;
			}
			.mso .size-16,
			.ie .size-16 {
			font-size: 16px !important;
			line-height: 24px !important;
			}
			.mso .size-17,
			.ie .size-17 {
			font-size: 17px !important;
			line-height: 26px !important;
			}
			.mso .size-18,
			.ie .size-18 {
			font-size: 18px !important;
			line-height: 26px !important;
			}
			.mso .size-20,
			.ie .size-20 {
			font-size: 20px !important;
			line-height: 28px !important;
			}
			.mso .size-22,
			.ie .size-22 {
			font-size: 22px !important;
			line-height: 31px !important;
			}
			.mso .size-24,
			.ie .size-24 {
			font-size: 24px !important;
			line-height: 32px !important;
			}
			.mso .size-26,
			.ie .size-26 {
			font-size: 26px !important;
			line-height: 34px !important;
			}
			.mso .size-28,
			.ie .size-28 {
			font-size: 28px !important;
			line-height: 36px !important;
			}
			.mso .size-30,
			.ie .size-30 {
			font-size: 30px !important;
			line-height: 38px !important;
			}
			.mso .size-32,
			.ie .size-32 {
			font-size: 32px !important;
			line-height: 40px !important;
			}
			.mso .size-34,
			.ie .size-34 {
			font-size: 34px !important;
			line-height: 43px !important;
			}
			.mso .size-36,
			.ie .size-36 {
			font-size: 36px !important;
			line-height: 43px !important;
			}
			.mso .size-40,
			.ie .size-40 {
			font-size: 40px !important;
			line-height: 47px !important;
			}
			.mso .size-44,
			.ie .size-44 {
			font-size: 44px !important;
			line-height: 50px !important;
			}
			.mso .size-48,
			.ie .size-48 {
			font-size: 48px !important;
			line-height: 54px !important;
			}
			.mso .size-56,
			.ie .size-56 {
			font-size: 56px !important;
			line-height: 60px !important;
			}
			.mso .size-64,
			.ie .size-64 {
			font-size: 64px !important;
			line-height: 63px !important;
			}
			.footer__share-button p {
			margin: 0;
			}
			</style>

			<!--[if !mso]><!--><style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);
			</style><link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400" rel="stylesheet" type="text/css"><!--<![endif]--><style type="text/css">
			body{background-color:#eb6173}.mso h1{}.mso h2{}.mso h3{}.mso .column,.mso .column__background td{}.mso .column,.mso .column__background td{font-family:Tahoma,sans-serif !important}.mso .btn a{}.mso .btn a{font-family:Tahoma,sans-serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Tahoma,sans-serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#fff !important}.mso .layout-has-border{border-top:1px solid #cc1a31;border-bottom:1px solid #cc1a31}.mso .layout-has-bottom-border{border-bottom:1px solid #cc1a31}.mso .border,.ie .border{background-color:#cc1a31}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:34px !important;line-height:43px !important}.mso h2,.ie h2{}.mso h2,.ie 
			h2{font-size:30px !important;line-height:38px !important}.mso h3,.ie h3{}.mso h3,.ie h3{font-size:20px !important;line-height:28px !important}.mso .layout__inner p,.ie .layout__inner p,.mso .layout__inner ol,.ie .layout__inner ol,.mso .layout__inner ul,.ie .layout__inner ul{}
			</style></head>
			<!--[if mso]>
			<body class="mso">
			<![endif]-->
			<!--[if !mso]><!-->
			<body class="no-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
			<!--<![endif]-->
			<table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #eb6173;" cellpadding="0" cellspacing="0" role="presentation">
			<tbody><tr><td>      
			<div style="background-color: #fe7587;">
			<div class="layout two-col" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
			<div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
			<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-full-width" style="background-color: #fe7587;"><td class="layout__edges">&nbsp;</td><td style="width: 300px" valign="top" class="w260"><![endif]-->
			<div class="column" style="Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);text-align: left;color: #fff;font-size: 14px;line-height: 21px;font-family: Lato,Tahoma,sans-serif;">

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div style="line-height:20px;font-size:1px">&nbsp;</div>
			</div>
			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
					<img style="border: 0;display: block;height: auto;width: 100%;max-width: 260px;" alt="" width="260" src="'.$baseurl.'assets/images/logo-whitew.png">
				</div>
			</div>
			</div>
			<!--[if (mso)|(IE)]></td><td style="width: 300px" valign="top" class="w260"><![endif]-->
			<div class="column" style="Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);text-align: left;color: #fff;font-size: 14px;line-height: 21px;font-family: Lato,Tahoma,sans-serif;">

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div style="line-height:20px;font-size:1px">&nbsp;</div>
			</div>

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #fff;font-size: 17px;line-height: 26px;">Hi '.$emaildata ->first_name.',</h3><p style="Margin-top: 12px;Margin-bottom: 20px;font-family: open sans,sans-serif;"><span class="font-open-sans">Please click on the button below to reset your password</span></p>
			</div>

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div class="btn btn--flat fullwidth btn--large" style="Margin-bottom: 20px;text-align: center;">
				<!--[if !mso]--><a style="border-radius: 4px;display: block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fe7587;background-color: #fff;font-family: Lato, Tahoma, sans-serif;" href="'.$baseurl.'login_controller/resetpassword/'.$newpass.'/?email='.$email.'">RESET PASSWORD</a><!--[endif]-->
				<!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://getjaws.cmail19.com/t/d-i-ddxjdy-l-y/" style="width:260px" arcsize="9%" fillcolor="#FFFFFF" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FE7587;font-family:Tahoma,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">FIND OUT MORE</center></v:textbox></v:roundrect><![endif]--></div>
			</div>
			</div>
			<!--[if (mso)|(IE)]></td><td class="layout__edges">&nbsp;</td></tr></table><![endif]-->
			</div>
			</div>
			</div>
			</td></tr></tbody>
			</table>
			</body>
			</html>';
			$data = array(
			'email' => $email,
			'reset_pwd' => $newpass
			);
			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('test.stallioni@gmail.com', 'SE'); 
			$this->email->to($email);
			$this->email->subject('Reset Password'); 			
			$this->email->message($message);
			$this->email->send(); 				
			$update_key=  $this->users_model->update_key($data);
			echo 'success';
		}	
	}
	public function changepassword1()
	{
		if ($this->input->is_ajax_request())
		{				
			$user_id  = $this->input->post('user_id');
			$email = $this->input->post('reset_email');  
			$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$verificationText =substr(str_shuffle($letters), 0, 10);
			$newpass = md5($verificationText);
			$baseurl = base_url();
			$data = array(
			'email' => $email,
			'reset_pwd' => $newpass
			);
			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('test.stallioni@gmail.com', 'SE'); 
			$this->email->to($email);
			$this->email->subject('Reset Password'); 			
			$this->email->message('To reset your password please click the link below and follow the instructions:' . site_url('login_controller/resetpassword/'.$newpass.'/?email='.$email));
			$this->email->send(); 				
			$update_key= $this->users_model->update_key($data, array('id_user_master'=>$user_id ));
			echo 'success';
			
		}
	}
	   public function reset_password()
   {
			$passwordplain  =$this->input->post('password');   
			$create_key  =$this->input->post('create_key');   
			$newpass = md5($passwordplain);
			$data = array(
			'password' => $newpass,
			'passwordplain' => $passwordplain,
			'create_key' => $create_key
			);
			$update_password=  $this->users_model->update_password($data);
			$this->session->set_flashdata('reset_msg', '<div class="alert alert-danger text-center">Password reset Successfully.</div>');
			redirect('home');     
      }
}
