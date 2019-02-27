<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		//~ $this->load->model('schdule_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	
		$this->load->model('calendar_model');
		        $this->load->helper('push_helper');	
		
	}
		
	//~ public function index()
	//~ {
		//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "schdule/schdulecreate";
		//~ $data['current_menu']  = "schdule";
		//~ $data['sub_menu']  = "schdulecreate";
		
		//~ $this->template->load_frontend_template($data);
	//~ }
	public function addschedule_temp()
	{
		$taskuserdetail =$this->input->post('taskuserid');
		$modified = explode(':', $taskuserdetail );
		$this->calendar_model->addschedule_temp(array('temp_taskid'=>$modified[0],'temp_user_id'=>$modified[1]));		
	}
	public function getschedule_temp()
	{
		 $details = $this->calendar_model->getschedule_temp();
		 echo json_encode($details);		
	}
	//~ public function addschedule()
	//~ {
		
     //~ $this->calendar_model->addschedule();
	
	
	//~ }
	
	public function addschedule()
	{
		
		$last_serv = $this->calendar_model->gettempdatadeviceid();
		//~ echo "<pre>";
		//~ var_dump($last_serv );
		//~ exit;
		foreach($last_serv as $last_serv_det)
		{
		
		if(!empty($last_serv_det->device_id))
		{
			if($last_serv_det->profile_image == "")
			{
				$profile_image = base_url().'uploads/default17.jpg';
			}
			else{
				$profile_image = base_url().'uploads/'.$last_serv_det->profile_image ;
		}
			 $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';
        //~ device_id
        //~ SR_code
        //~ username
        //~ property_name
        //~ task_catname
        $res = array();
        $res['data']['title'] = 'Assigned new task';
        $res['data']['is_background'] = false;
        $res['data']['message'] = 'check your task';
        $res['data']['image'] = $profile_image;
        $res['data']['payload'] =$payload;
        $res['data']['push_pages'] ='assignments';
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
         

				 //send a notifiation
			
			$android_device_token = $last_serv_det->device_id;
		
			$result = send_android_notification($android_device_token,$res);
			echo json_encode($result);
		
		}
	}

  $this->calendar_model->addschedule();


	

	
	}
	
	public function schedulecreate()
	{
		
		if($this->input->post('status_filter') != 0)
		{
			$data['base_url'] = base_url();
			$data['view_file']  = "schdule/schdulecreate";
			$data['current_menu']  = "schdule";
			$data['sub_menu']  = "schdulecreate";		
			$data['cont_name_list']  = $this->calendar_model->get_list_contractorname();		
			$alltaskcategories = $this->calendar_model->task_category();
			
			$data['get_task_category'] = $alltaskcategories;		
			$data['task_name_list']  = $this->calendar_model->get_list_task(1);
			$active = $this->input->get('active');

			$i = 0;
			$details = array();
			
			if(!empty($alltaskcategories))
			{
				foreach($alltaskcategories as $category)
				{				
					$details[] =   $this->calendar_model->get_list_task_stus($category->id,$this->input->post('status_filter')); 				
				}
			}	
				
			$data['scheduledetails'] = $details;			
			$data['status_id']  = $this->input->post('status_filter');		
			$data['schedule_contractor'] = $this->calendar_model->get_allcontractor();			
			$data['schedule_assignedcontractor'] = $this->calendar_model->get_assignedcontractor_id($this->input->post('status_filter'));
			$data['schedule_assignedcontractor_sched'] = $this->calendar_model->get_assignedcontractor();					
			$this->template->load_frontend_template($data);
		} 
		else
		{
			$data['base_url'] = base_url();
			$data['view_file']  = "schdule/schdulecreate";
			$data['current_menu']  = "schdule";
			$data['sub_menu']  = "schdulecreate";
			$data['status_id']  = $this->input->post('status_filter');
			
			$alltaskcategories = $this->calendar_model->task_category();
			$i = 0;
			$active = $this->input->get('active');
			$details = array();
			
			if(!empty($alltaskcategories))
			{
				foreach($alltaskcategories as $category)
				{				
					$details[] =   $this->calendar_model->get_list_taskbyid($category->id); 				
				}
			}
			
			
			$data['scheduledetails'] = $details;			
			$data['cont_name_list']  = $this->calendar_model->get_list_contractorname();		
			$alltaskcategories = $this->calendar_model->task_category();
			$data['get_task_category'] = $alltaskcategories;
			$data['schedule_contractor'] = $this->calendar_model->get_allcontractor();
			$data['schedule_assignedcontractor'] = $this->calendar_model->get_assignedcontractor();	
			$data['schedule_assignedcontractor_sched'] = $this->calendar_model->get_assignedcontractor();			
			$this->template->load_frontend_template($data);
		
		}
	}
	
	public function appendtabcontent()
	{
		$data = $this->calendar_model->get_list_taskbyid($this->input->post('catid'));
		print json_encode($data);
	}
	
	public function schedulelist()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "schdule/schduleview";
		$data['get_schedulelist']  = $this->calendar_model->get_events();
		$data['current_menu']  = "schdule";
		$data['sub_menu']  = "schduleview";
		
		$this->template->load_frontend_template($data);
	}
	
	public function edit_schedule($schedule_id = 0)
	{
		//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "schdule/schedule_edit";
		//~ $data['get_schedulelist']  = $this->calendar_model->get_events();
		//~ $data['current_menu']  = "schdule";
		//~ $data['sub_menu']  = "schedule_edit";
		
		//~ $this->template->load_frontend_template($data);
		
		$user_type = $this->session->user_type;
		$user_master = $this->session->id_user_master;
					

		if ($this->input->is_ajax_request())
		{
			$data['base_url'] = base_url();
			$pro_det_data = $this->calendar_model->geteditschedule_list($schedule_id);
			if(!empty($pro_det_data))
			{
				foreach($pro_det_data as $pro_det_data_val )
				{
					$data['getscheduledetails'] = 	$pro_det_data_val;
				}
			}
			$data['cont_name_list']  = $this->calendar_model->get_list_contractorname();
			$data['task_name_list']  = $this->calendar_model->get_list_task();
			$this->load->view('backend/schdule/schedule_edit',$data);					 
		}
	}
	    public function get_events() 
    {
		
        //~ // Our Stand and End Dates
        //~ $start = $this->input->get("start");
        //~ $end = $this->input->get("end");

        //~ $startdt = new DateTime('now'); // setup a local datetime
        //~ $startdt->setTimestamp($start); // Set the date based on timestamp
        //~ $format = $startdt->format('Y-m-d H:i:s');

        //~ $enddt = new DateTime('now'); // setup a local datetime
        //~ $enddt->setTimestamp($end); // Set the date based on timestamp
        //~ $format2 = $enddt->format('Y-m-d H:i:s');

        $events = $this->calendar_model->get_events();

		echo json_encode($events);

        //~ $data_events = array();

        //~ foreach($events->result() as $r) { 

            //~ $data_events[] = array(
                //~ "id" => $r->ID,
                //~ "title" => $r->title,
                //~ "description" => $r->description,
                //~ "end" => $r->end,
                //~ "start" => $r->start
            //~ );
        //~ }

        //~ echo json_encode(array("events" => $data_events));
        //~ exit();
    }

    public function add_event() 
    {
        /* Our calendar data */
     
        $name = $this->input->post("s_sel_val_val");
        $serv_cat = $this->input->post("s_serv_cat");
        $cont_name = $this->input->post("cont_name");
        $s_cateid_val = $this->input->post("s_cateid_val");
        $desc = $this->input->post("description");
        $s_emid = $this->input->post("s_emid");
        $booking_date = $this->input->post("s_bookdate");
        $s_bookdate_vale = $this->input->post("s_bookdate_vale");
        $start_date = $this->input->post("start_date").' '.$this->input->post("start_time");
        $end_date = $this->input->post("end_date").' '.$this->input->post("end_time");
       $userid_s = $this->input->post('s_uid');
        $task_id_s = $this->input->post('s_catid');

      $bookdate = str_replace('-','', $s_bookdate_vale) ;
  //SC20171231AS001
       $sche_code = 'SC'.$bookdate.$s_cateid_val;
       //~ echo $sche_code;
       //~ exit;
        $this->calendar_model->add_event(array(
            "title" => $name,
            "s_user_id" =>  $userid_s,
            "s_task_id" =>  $task_id_s,
            "contractor_name" => $cont_name,
            "u_email" => $s_emid,
            "service_categories" =>  $serv_cat ,
            "booking_date" => $booking_date,
            "sche_code" => $sche_code,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
               "user_name_s" => $this->session->user_name,
               "created" => $this->session->user_type,
            )
        );
	$data['base_url'] = base_url();
		$data['view_file']  = "schdule/schdulecreate";
		$data['current_menu']  = "schdule";
		$data['sub_menu']  = "schdulecreate";
		
		$this->template->load_frontend_template($data);
    }
    public function schedule_delete() 
    {		if ($this->input->is_ajax_request()){

		var_dump($this->input->post());
		
		exit;
	}
	}
    public function update_schedule() 
    {
        /* Our calendar data */
     
        $name = $this->input->post("s_sel_val_val");
        $serv_cat = $this->input->post("s_serv_cat");
        $cont_name = $this->input->post("cont_name");
        $desc = $this->input->post("description");
        $booking_date = $this->input->post("s_bookdate");
        $start_date = $this->input->post("start_date").' '.$this->input->post("start_time");
        $end_date = $this->input->post("end_date").' '.$this->input->post("end_time");
       $userid_s = $this->input->post('s_uid');
        $task_id_s = $this->input->post('s_catid');

     
        $this->calendar_model->add_event(array(
            "title" => $name,
            "s_user_id" =>  $userid_s,
            "s_task_id" =>  $task_id_s,
            "contractor_name" => $cont_name,
            "service_categories" =>  $serv_cat ,
            "booking_date" => $booking_date,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
               "user_name_s" => $this->session->user_name,
               "created" => $this->session->user_type,
            )
        );
	$data['base_url'] = base_url();
		$data['view_file']  = "schedule/schedulelist";
		$data['current_menu']  = "schdule";
		$data['sub_menu']  = "schedulelist";
		
		$this->template->load_frontend_template($data);
    }

	//~ public function filter_status()
	//~ {
	
	//~ if ($this->input->is_ajax_request()){
	//~ $status_filter = $this->input->post('status_filter');
	//~ var_dump($status_filter);

	//~ $data['base_url'] = base_url();
	//~ $data['view_file']  = "schdule/schdulecreate";
	//~ $data['current_menu']  = "schdule";
	//~ $data['sub_menu']  = "schdulecreate";
	//~ $data['get_filter_status'] 
	//~ $get_filter_status = $this->calendar_model->filter_status($status_filter);
	//~ var_dump($get_filter_status);
	//~ exit;	
	//~ $this->template->load_frontend_template($data);
	//~ }
	//~ }
	
	public function cancel_assignment($id = 0)
	{
		//var_dump();
		$events = $this->calendar_model->changecancelassign($id);
		redirect('admin/schedule/schedulecreate');		
	}
	public function get_awaitingcount()
	{
		$date = $this->input->post('booking_date');
		$get_results = $this->calendar_model->awaitingcount_bookingdate($date);
		$get_cat_ids = $this->calendar_model->gettaskcatids();
		
		$t_ids = array();
		$result = array();
		
		foreach($get_cat_ids as $get_cat_id)
		{
			$t_ids[] = $get_cat_id->id;
		}
		
		foreach($get_results as $get_result)
		{
			$result[] = $get_result->task_catid;
		}		
		
		//print_r($result);
		
		$i = 0;
		if(!empty($result))
		{
			for($k=0; $k<count($t_ids); $k++)
			{
				if(in_array($t_ids[$k],$result))
				{
				$counts = array_count_values($result);				
				$countvar[$t_ids[$k]] = $counts[$t_ids[$k]];
				}
				else
				{
					$countvar[$t_ids[$k]] = 0;
				}
			}
			
			
		}

		print json_encode($countvar);

	}
	

}
