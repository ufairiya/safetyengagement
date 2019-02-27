<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
include( APPPATH . '/libraries/REST_Controller.php');

class Homeapi extends REST_Controller 
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
        $this->load->model('Employee_Model');
		$this->load->library('email');	
		$this->load->model('task_model');
		$this->load->model('property_model');
		$this->load->model('service_model');
		$this->load->model('purchaseorder_model');
	}
	public function index_post()
	{
		
		//~ $categorycount = count($category_details);		
		//~ $i = 0;
				
		$category_details  = $this->task_model->get_task_details_api();
		foreach($category_details as $category_detail)
		{
			$sutit = array(); 
			$counsub = array(); 
			$priname = array(); 
			$price = array(); 
			$descp = array(); 		
			$opening_hour = array(); 
			$closing_hour = array(); 
			
			$sutit 			= json_decode($category_detail->subtitle); 
			$counsub 		= json_decode($category_detail->pricecount); 
			$priname 		= json_decode($category_detail->pricename); 
			$price 			= json_decode($category_detail->price);
			$descp 			= json_decode($category_detail->description);			
			$opening_hour 	= json_decode($category_detail->opening_hours);
			$closing_hour 	= json_decode($category_detail->closing_hours);

			$prinamecot =count($priname);
			$start_val = 0;
			$end_val =$counsub[0]; 
			$finalval = array();
			$price_detail = array();
			$finalval = array();
			//~ $operating_hour = array();
			//~ $arrvar = array();
			
			if($category_detail->hideshowpr_status != '0')
			{
				for($i=0; $i<count($sutit);$i++)
				{
					$subtitle = $sutit[$i];
					
					if($i != 0)
					{
						$start_val = $start_val + $counsub[$i-1];
						$end_val = $start_val+$counsub[$i];
					}
					$loopval = array();
					
					for($j=$start_val; $j<$end_val;$j++)
					{																										
							$loopval[] = array('pricename'=>$priname[$j],'price'=>$price[$j],'description'=>$descp[$j]);
					}
					
					$finalval[$i] =  array('subtitle'=>$sutit[$i],'price_details'=>$loopval);
				
				}
			}
			else
			{
				$finalval = array();
			}
			
			$operating_hour = array();
			if($category_detail->hideshowti_status != '0')
			{
				for($k = 0; $k < count($opening_hour); $k++)
				{
					$operating_hour[] = array('opening_hour'=>$opening_hour[$k],'closing_hour'=>$closing_hour[$k]);
				}
			}
			else
			{
				$operating_hour = array();
			}
			
			if(json_decode($category_detail->gallery_img) == null)
			{
				$gellery =  array();
			}
			else
			{
				$gellery = json_decode($category_detail->gallery_img);
			}
			$category_details  = $this->task_model->get_task_iconcode_api($category_detail->id);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}
			
				 $arrvar[] = array(
				'id' => $category_detail->id,
				'taskcategory_name' => $category_detail->taskcategory_name,			
				'taskcatshort_code' =>$category_detail->taskcatshort_code,		
				'image_path' => $category_detail->image_path,
				'iconcode' => $iconvar,
				'pricedata' => $finalval,			
				'max_appointment' => $category_detail->max_appointment,
				'gallery_img' => $gellery,			
				'summary' => $category_detail->summary,
				'operating_hour' =>$operating_hour			
				);
			
			
				
		}


		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));	
			$get_apartment = array();
			
			if(!empty($user_details))
			{
				$get_apartment = $this->property_model->getproperty_curruserlistapi_($user_details->id_user_master);

					print json_encode(array(
					'status_code'=> '200',
					'taskcategorias' => $arrvar,
					'getapartment' => array('status_code'=>'200','status' => 'success','apt_details'=>$get_apartment),
					'status' => 'success'	
					));		
			}
			else
			{
				print json_encode(array(
					'status_code'=> '200',
					'taskcategorias' => $arrvar,
					'getapartment' => array('status_code'=>'400','status' => 'failed','apt_details'=>$get_apartment),
					'status' => 'success'	
					));	
			}
		}
		else
		{
			print json_encode(array('status_code'=> '200','taskcategorias' => $arrvar,'getapartment' => array('status_code'=>'400','status' => 'failed','apt_details'=>$get_apartment),'status' => 'success'));	
			
		}
		
		
	}
	public function get_homepage_servicecategory_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{	
				$recentrequest_details = $this->task_model->get_homepage_recentrequestapi($user_details->id_user_master);
				//~ print_r($recentrequest_details);
				$base_url =  BASE_URL().'uploads/';
			
				//$recentrequest_details = array_push($recentrequest_details,$iconvar);
				print json_encode(array('status_code'=> '200','status'=>'success','base_imgurl'=>$base_url,'recentrequest_details'=>$recentrequest_details));

			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=> 'invalid auth key'));	
			}
		}	
		else
		{
			print json_encode(array('status_code'=> '500','status'=> 'please provide auth key'));
		}
		
		
	}	
	public function send_contactus_post()
	{
		$from = "test.stallioni@gmail.com";    //senders email address
		$subject = 'S email address';  //email subject

		//sending confirmEmail($receiver) function calling link to the user, inside message body
		$message = $this->input->post('comments');

		//config email settings
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		//send email
		$this->email->from($this->input->post('contact_email'));
		$this->email->to( $from);
		$this->email->subject($this->input->post('subject'));
		$this->email->message($message);
		
		$this->email->send();
		print json_encode(array(
		'status_code'=> '200',
		'status' => 'success'		
		));	
	}
	
}
