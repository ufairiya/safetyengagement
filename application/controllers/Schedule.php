<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');     	
        $this->load->library('email');
        $this->load->helper('url');	
        $this->load->database();
        $this->load->model('calendar_model');
		$this->load->library('email');	
		$this->load->model('task_model');
		$this->load->model('service_model');
		$this->load->model('property_model');
		if(empty($this->session->userdata('id_user_master')))
		{
			redirect('home');
		}
	}	
	public function index()
	{
			
		$data['base_url'] = base_url();
		$data['current_menu']  = "schedule";
		$data['sub_menu']  = "schedule";
		$data['view_file']  = "schedule";
		$data['get_schedule']  = $this->service_model->get_schedule_events($this->session->userdata('id_user_master'));
		//~ $schedule  = $this->calendar_model->get_task_event();
		//~ var_dump($schedule );
		//~ exit;
		$this->template->load_front_home_template($data);		
	}		
	public function pastassignment()
	{
		$data['base_url'] = base_url();
		$data['current_menu']  = "schedule";
		$data['sub_menu']  = "pastassignment";
		$data['view_file']  = "past_assignment";
		$data['get_schedule']  = $this->service_model->get_schedule_events_past($this->session->userdata('id_user_master'));
		$this->template->load_front_home_template($data);	
	}
	
	public function service_rp()
	{
		$data['base_url'] = base_url();
		$data['current_menu']  = "service_rp";
		$data['sub_menu']  = "";
		$data['view_file']  = "l-schedule-c";
		//$data['get_schedule']  = $this->calendar_model->get_task_event();
		$this->template->load_front_home_template($data);	
	}
	public function service_sign()
	{ 
		$data['base_url'] = base_url();
		$data['current_menu']  = "service_sign";
		$data['sub_menu']  = "";
		$data['view_file']  = "l-schedule-s";
		//$data['get_schedule']  = $this->calendar_model->get_task_event();
		$this->template->load_front_home_template($data);	
	}
	public function pastassignment_list()
	{ 
		$data['base_url'] = base_url();
		$data['current_menu']  = "pastassignment_list";
		$data['sub_menu']  = "";
		$data['view_file']  = "l-schedule-cn";
		//$data['get_schedule']  = $this->calendar_model->get_task_event();
		$this->template->load_front_home_template($data);	
	}
	public function pastassignment_service_report()
	{ 
		$data['base_url'] = base_url();
		$data['current_menu']  = "pastassignment_service_report";
		$data['sub_menu']  = "";
		$data['view_file']  = "l-assignment-sr-o2";
		//$data['get_schedule']  = $this->calendar_model->get_task_event();
		$this->template->load_front_home_template($data);	
	}
	public function pastservicereport()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "pastservicereport";
		$data['current_menu']  = "pastservicereport";
		$data['sub_menu']  = "";
		$taskid = $this->input->get('tid');
		$data['get_service_report_details']  = $this->service_model->get_service_report_details($taskid);
		$this->template->load_front_home_template($data);	
	}
	public function past_requestinvoice()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "past_requestinvoice";
		$data['current_menu']  = "past_requestinvoice";
		$data['sub_menu']  = "";
		$taskid = $this->input->get('tid');
		$data['get_service_report_details']  = $this->service_model->get_servicereport_data_generatedata($taskid);
		$this->template->load_front_home_template($data);	
	}
	public function schedule_details()
	{
		
		$sche_id = $this->input->get('sche_id');	
		$data['base_url'] = base_url();
		$data['get_schedule']  = $this->service_model->get_task_event_sche($sche_id );
		//~ var_dump($data_schedule );
		//~ exit;
		//~ $data['task_cate']  = $this->task_model->get_task_cate($cat_id);
		$data['current_menu']  = "schedule_details";
		$data['sub_menu']  = "";
		$data['view_file']  = "schedule_details";			
		$this->template->load_front_home_template($data);		
	}
	public function img_upload()
	{
		$this->load->library('upload');

		//~ $base64Image = $this->input->post('imageData');
			//~ echo $base64Image; 
		//~ $decoded=base64_decode($base64Image);
	
		//~ file_put_contents('newImage.png',$decoded);
		//~ echo $decoded;
	
		$dataURL = $this->input->post("imageData");


		//~ $dataURL=$this->input->post('images_crop');
		$dataURL = $_POST["imageData"];
		$dataURL = str_replace('data:image/png;base64,', '', $dataURL);
		$dataURL = str_replace(' ', '+', $dataURL);
		$image = base64_decode($dataURL);
		$filename = date("d-m-Y-h-i-s") . '.' . 'png'; //renama file name based on time
		$image_path = './uploads/signature/';
		//echo $image_path.$filename.$image;
		file_put_contents($image_path. $filename, $image);
		
		echo $img_path = base_url().'uploads/signature/'. $filename; 

	}
	
	public function servicereportstep3()
	{
		//~ print_r($this->input->post());
		//~ exit;

		$s_repid = $this->input->post('srfinal_id');
		//~ echo '<pre>';
		//~ print_r($this->input->post());
		//~ echo '</pre>';
		//~ exit;
		
		$get_ss_rep_taskid =  $this->service_model->get_ss_rep_taskid($s_repid);
		//~ print_r($get_ss_rep_taskid);
		//~ echo $get_ss_rep_taskid->sche_id;
	//print_r($this->session->userdata('id_user_master'));
		
		$date = date("d/m/Y");
		$newDate = date("Ymd");
		$shortcode = $this->input->post('tacashname');
		$insert_sched = array('img_sign'=> $this->input->post('signature_img'),'witeness_name'=> $this->input->post('witnessname'),'created_date' => $date,'contractor_id'=>$this->session->userdata('id_user_master'),'invoice_id'=>'IO'.$newDate.$shortcode.'00'.$s_repid);
		$update_schedule = $this->service_model->update_schedule($insert_sched,$s_repid);
			
		$update_task_schedule_status = array('contr_id'=>$this->session->userdata('id_user_master'),'service_report_status' => 1,'status' => 4);
		$update_schedule = $this->service_model->update_taskschedule_report($update_task_schedule_status,$get_ss_rep_taskid->sche_id);
		
		$update_schedule_status = array('status' => 1);
		$update_schedule = $this->service_model->update_schedule_report_status($update_schedule_status,$s_repid);
		
		//~ $get_tid = $this->service_model->get_taskid('');
		
		//$this->session->set_flashdata('reportsuccess','<div class="notification success closeable"><p>Success! service report genarated successfully. </p><a class="close"></a></div>');
		//redirect(');
		echo json_encode(array('success' => 'success','path' =>'schedule/pastservicereport/?tid='.$get_ss_rep_taskid->sche_id) );
		
	}
	public function servicereportstep2()
	{
		
		$s_repid = $this->input->get('srepid');				
		$j_name = $this->input->post('contcol_jobname');
		$j_price = $this->input->post('cont_price');
		$varname = $this->input->post('contcol_jobname');
		$varprice = $this->input->post('cont_price');
			if(!empty($varname) && !empty($varprice))
		{
			array_filter($varname);
			array_filter($varprice);
			
			$combinejobname = array_merge($this->input->post('jobnamepre'),$this->input->post('contcol_jobname'));
			$combinejobprice = array_merge($this->input->post('jobpricepre'),$this->input->post('cont_price'));	
			
					
			$serializejobname = serialize(array_filter($combinejobname));
			$serializejobprice = serialize(array_filter($combinejobprice));
						
			$insert_sched = array('phone'=> $this->input->post('s_phone'),'email'=> $this->input->post('s_email'),'additional_description'=> $this->input->post('additional description'),'additional_description'=> $this->input->post('additional_description'),'contcol_jobname'=>$serializejobname,'cont_price'=>$serializejobprice);			
		}
		else
		{
			$get_schedule = $this->service_model->get_report($s_repid);
			$jname = serialize($this->input->post('jobnamepre'));
			$jprice = serialize($this->input->post('jobpricepre'));
			
			if(!empty($get_schedule->contcol_jobname)&& !empty($get_schedule->cont_price))
			{
				$insert_sched = array('phone'=> $this->input->post('s_phone'),'email'=> $this->input->post('s_email'),'additional_description'=> $this->input->post('additional description'),'additional_description'=> $this->input->post('additional_description'),'status'=>2);	
			}
			else
			{
				$insert_sched = array('phone'=> $this->input->post('s_phone'),'email'=> $this->input->post('s_email'),'additional_description'=> $this->input->post('additional description'),'additional_description'=> $this->input->post('additional_description'),'contcol_jobname'=> $jname,'cont_price'=> $jprice,'status'=>2);
			}
								
		}	

		$update_schedule = $this->service_model->update_schedule($insert_sched,$s_repid);		
		$s_repid1 = $this->input->get('srepid');	
		$data['get_schedule'] = $this->service_model->get_taskservice_report($s_repid);
		$getschedulestep2var = $this->service_model->get_taskservice_report($s_repid1);				
		$data['base_url'] = base_url();
		$data['current_menu']  = "servicereportstep2";
		$data['sub_menu']  = "";
		$data['view_file']  = "final_service_report";			
		$this->template->load_front_home_template($data);
	}
	public function service_report()
	{			
		$data['base_url'] = base_url();
		$data['current_menu']  = "service_report";
		$data['sub_menu']  = "";
		$sche_id = $this->input->get('id');
		
		if(!empty($this->input->post()))
		{
			$insert_sched = array('SR_code'=> $this->input->post('sr_code'),'sche_id'=>  $sche_id,'task_catname'=> $this->input->post('service_catename'), 'us_id'=> $this->input->post('us_id'),'contractor_id'=> $this->input->post('ucontractor_id'), 'username'=> $this->input->post('uname'),'apartment'=> $this->input->post('propertyname'), 'sr_address'=> $this->input->post('sr_address'),'issueddate'=> $this->input->post('iss_date'),'txtdescrip'=> $this->input->post('sche_descrip'));
			//~ var_dump($insert_sched);
			//~ exit;
			$data_res = $this->service_model->get_service_exist(array('SR_code'=> $this->input->post('sr_code')));
			
			if($data_res == 0)
			{
				$ins_id = $this->service_model->insert_schedue($insert_sched);
				$get_schedule = $this->service_model->get_task_event_sche_report($sche_id);
				$data['get_schedule']  = $get_schedule ;
				$data['view_file']  = "service_report";
				$this->template->load_front_home_template($data);
			}
			else
			{					
				$data['get_schedule']  = $this->service_model->get_task_event_sche_report($sche_id);
				$data['view_file']  = "service_report";
				$this->template->load_front_home_template($data);			
			}
				
		}
		else
		{	
			$data['view_file']  = "service_report"; 
			$data['get_schedule']  = $this->service_model->get_task_event_sche_report($sche_id);
			$this->template->load_front_home_template($data);
		
		}

	}
}
	
