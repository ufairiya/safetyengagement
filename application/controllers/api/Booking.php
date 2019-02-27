<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
include( APPPATH . '/libraries/REST_Controller.php');

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Booking extends REST_Controller 
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('email', array('mailtype' => 'text/html'));
        $this->load->model('mail_model');
        $this->load->helper(array('form', 'url'));
                $this->load->model('Employee_Model'); 
                $this->load->model('purchaseorder_Model'); 
                $this->load->model('service_model'); 
                $this->load->model('users_model'); 
                $this->load->model('task_model');  

    }
    public function add_new_booking_post()
    {
		
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{
				
					
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('booking_date');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
			$tcatemaxappoint  = $this->task_model->get_task_categiriesmaxappoint($cateid);

		$serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
		if(!empty($serviceval->opening_hours))
		{
			$day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			$opentime = json_decode($serviceval->opening_hours);

			$closertime = json_decode($serviceval->closing_hours);
			$opentime_count = count($opentime);

			for($i=0; $i<$opentime_count;$i++ )
			{ 
				if($day[$i] == $day_name)
				{
				//	echo $day[$i] .''.$opentime[$i].' - '.$closertime[$i];

					if($opentime[$i] != 'Closed' || $closertime[$i] != 'Closed' )
					{
						$datetime1 = new DateTime($bookdate.''.$opentime[$i]);
						$datetime2 = new DateTime($bookdate.''.$closertime[$i]);
						$interval = $datetime1->diff($datetime2);
						$stropen = $opentime[$i];
						$opentot =   date("G:i", strtotime($opentime[$i]));
						$closetot =  date("G:i", strtotime($closertime[$i]));
						$tot_op_hrs = $interval->format('%h');
						$tot_op_min = $interval->format('%i')/60;
						//$tothours = 7;
					}
					else{
						$tot_op_hrs = 0;
					}

				}
			}
		$dec = 0;

if(!is_int($tot_op_hrs)){
	//$tot_op_hrs -= 0.5;
	$dec = $tot_op_min ;
}

$session1;
$session2;
$session3;

$temp = $tot_op_hrs % 3;

if($temp % 3 == 0){
	$session1 = ($tot_op_hrs / 3) + $dec;
	$session2 = $tot_op_hrs / 3;
	$session3 = $tot_op_hrs / 3;
} else if($temp == 1){
	$session1 = (($tot_op_hrs - $temp) / 3) + $dec;
	$session2 = (($tot_op_hrs - $temp) / 3) + 1;
	$session3 = ($tot_op_hrs - $temp) / 3;
}  else if($temp == 2){
	$session1 = (($tot_op_hrs - $temp) / 3) + $dec;
	$session2 = (($tot_op_hrs - $temp) / 3) + 1;
	$session3 = (($tot_op_hrs - $temp) / 3) + 1;
} 
if($this->input->post('booking_time') == 'morning')
{
	
		$morafterevensess =  floor($session1 * $tcatemaxappoint->max_appointment);
	
}
else if($this->input->post('booking_time') == 'afternoon')
{

		$morafterevensess =  floor($session2 * $tcatemaxappoint->max_appointment);

}
else if($this->input->post('booking_time') == 'evening')
{
		$morafterevensess = floor($session3 * $tcatemaxappoint->max_appointment);

}

		if(0 < $morafterevensess)
		{
			$subtotal = $morafterevensess - 1;
			$sess_status = 0;
		}
		else
		{
			$subtotal = 0;	
			$sess_status = 1;

		}
//~ echo $morafterevensess;
//~ exit;
	$booksess = array( 'booksess_taskcatid' => $this->input->post('cateid'),'booksess_date'=>$this->input->post('booking_date'),'booksess_time'=>$this->input->post('booking_time'),'booksess_maxappointment'=>$tcatemaxappoint->max_appointment,'booksess_incdescaptmnt'=>$subtotal,'booksess_maxcalcount'=>$morafterevensess,'booksess_status'=>$sess_status);
		$this->task_model->book_sessinsert($booksess);
	}
				
					$output = '';
					$config["upload_path"] = './uploads/';
					$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->load->library('upload', $config);

					if($this->upload->do_upload('image'))
					{
						$data = $this->upload->data();
						$output .= $data["file_name"];
					}
					
				$path = $output;
				$base_url =  BASE_URL().'uploads/'; 
				$shortcode =$this->input->post('short_code');
				
				$task_detail = array('email' => $user_details->email,'user_id' => $user_details->id_user_master,'task_catid' => $this->input->post('cateid'),'apartment_id' => $this->input->post('property_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description'),'status' => 1 );
				
				$checkdetails = $this->task_model->get_task_api($task_detail);
				
				$count_rows = count($checkdetails);
				
				if($count_rows < 1)
				{
					$task_detail1 = array('email' => $user_details->email,'user_id' => $user_details->id_user_master,'task_catid' => $this->input->post('cateid'),'apartment_id' => $this->input->post('property_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catname' => $this->input->post('service_book') ,'image_path' => $path,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description'),'status' => 1 );	
						
					$detail = $this->task_model->task_insert_api($task_detail1,$shortcode);
				
					if(!empty($detail))
					{	
						$booking_data = $this->task_model->get_task_byid_api($detail);								
						print json_encode(array('status_code'=> '200','booking_details'=>$booking_data,'baseimgpath'=>$base_url,'status'=>'booking inserted successfully'));
					}
					else
					{
						print json_encode(array('status_code'=> '400','status'=>'something went wrong'));	
					}
				}
				else
				{
					
					print json_encode(array('status_code'=> '409','status'=>'booking already exist'));
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));	
			}
		}
		else
		{
			print json_encode(array('status_code'=> '500','status'=>'please provide auth key'));
		}
					
	}
 public function pending_request_post()
    {
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_details_api($user_details->id_user_master);
				$base_url =  BASE_URL().'uploads/'; 
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'pending_request'=>$details));
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
	
	public function count_awaitingconfirmation_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_details1($user_details->id_user_master);				
				$arr = array();
				if(!empty($details))
				{
					$count = count($details);
					print json_encode(array('status_code'=> '200','status'=> 'success','count'=>$count));
				}
				else
				{
					
					print json_encode(array('status_code'=> '200','status'=> 'success','count'=>0));
				}
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
	
	
	public function awaitingconfirmation_request_post()
    {
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_details1($user_details->id_user_master);	
							
				//~ print_r($details);
				//~ exit;
				
				$arr = array();
				$category_details = array();
				foreach($details as $detail)
				{
					$category_details  = $this->task_model->get_task_iconcode_api($detail->task_catid);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}
	
		
					$arr[] = array(
					'id' => $detail->id,
					'user_id' => $detail->user_id,
					'po_id' => $detail->po_id,
					'SR_code' => $detail->SR_code,
					'email' => $detail->email,
					'booking_date' => $detail->booking_date,
					'booking_time' => $detail->booking_time,
					'est_time' => $detail->est_time,
					'bookingtime' => $detail->bookingtime,
					'apartment_id' => $detail->apartment_id,
					'image_path' => $detail->image_path,
					'iconcode' => $iconvar,
					'description' => $detail->description,
					'property_name' => $detail->property_name,
					'task_cat_shotname' => $detail->task_cat_shotname,
					'task_catname' => $detail->task_catname,
					'task_catid' => $detail->task_catid,
					'jobname' => unserialize($detail->jobname),
					'jobprice' => unserialize($detail->jobprice),
					'status' => $detail->status,
					//'contr_id' => $detail->contr_id,
					//'schedule_date' => $detail->schedule_date,					
					//'shedule_status' => $detail->shedule_status,
					//'service_report_status' =>$detail->service_report_status,						
					);
				}
				//~ exit;
				
				//~ //print_r($arr);				
				//~ //exit;
				$base_url =  BASE_URL().'uploads/'; 
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'awaitingconfirmation_request'=>$arr));
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
	public function awaitingservice_request_post()
    {
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_details2($user_details->id_user_master);
				$arr = array();
				foreach($details as $detail)
				{
	$category_details  = $this->task_model->get_task_iconcode_api($detail->task_catid);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}
					$arr[] = array(
					'id' => $detail->id,
					'user_id' => $detail->user_id,
					'po_id' => $detail->po_id,
					'SR_code' => $detail->SR_code,
					'email' => $detail->email,
					'booking_date' => $detail->booking_date,
					'booking_time' => $detail->booking_time,
					'est_time' => $detail->est_time,
					'bookingtime' => $detail->bookingtime,
					'apartment_id' => $detail->apartment_id,
					'image_path' => $detail->image_path,
					'iconcode' => $iconvar,
					'description' => $detail->description,
					'property_name' => $detail->property_name,
					'task_cat_shotname' => $detail->task_cat_shotname,
					'task_catname' => $detail->task_catname,
					'task_catid' => $detail->task_catid,
					'jobname' => unserialize($detail->jobname),
					'jobprice' => unserialize($detail->jobprice),
					'status' => $detail->status,
					'contr_id' => $detail->contr_id,
					'schedule_date' => $detail->schedule_date,					
					'shedule_status' => $detail->shedule_status,
					'service_report_status' =>$detail->service_report_status,						
					);
				}
				$base_url =  BASE_URL().'uploads/'; 	
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'awaitingservice_request'=>$arr));
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
	
	public function completed_request_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_details_pastrecord($user_details->id_user_master);
							
				$arr = array();
				foreach($details as $detail)
				{
					
					$price_name = unserialize($detail->jobname);
					$price = unserialize($detail->jobprice);
					
					for($i = 0;$i<count($price_name);$i++)
					{
						$price_details[] = array('pricename'=>$price_name[$i],'price'=>$price[$i]);
					}
	$category_details  = $this->task_model->get_task_iconcode_api($detail->task_catid);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}
					$arr[] = array(
					'id' => $detail->id,
					'user_id' => $detail->user_id,
					'po_id' => $detail->po_id,
					'SR_code' => $detail->SR_code,
					'email' => $detail->email,
					'booking_date' => $detail->booking_date,
					'booking_time' => $detail->booking_time,
					'est_time' => $detail->est_time,
					'bookingtime' => $detail->bookingtime,
					'apartment_id' => $detail->apartment_id,
					'image_path' => $detail->image_path,
					'iconcode' => $iconvar,
					'description' => $detail->description,
					'property_name' => $detail->property_name,
					'task_cat_shotname' => $detail->task_cat_shotname,
					'task_catname' => $detail->task_catname,
					'task_catid' => $detail->task_catid,
					//'jobname' => unserialize($detail->jobname),
					//'jobprice' => unserialize($detail->jobprice),
					'price_details' => $price_details,
					'status' => $detail->status,
					'contr_id' => $detail->contr_id,
					'schedule_date' => $detail->schedule_date,					
					'shedule_status' => $detail->shedule_status,
					
					'service_report_status' =>$detail->service_report_status,						
					);
				}
				$base_url =  BASE_URL().'uploads/'; 
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'completed_request'=>$arr));
			
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
	
	public function decline_request_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{		  
				$details = $this->task_model->get_front_task_declinelist($user_details->id_user_master);
				$base_url =  BASE_URL().'uploads/';
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'decline_request'=>$details));
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
	
	/*get all appointment*/
	public function get_all_booking_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{
				$task_detail = array('user_id' => $user_details->id_user_master);		  
				$checkdetails = $this->task_model->get_task_api($task_detail);
				$arr = array();
				foreach($checkdetails as $detail)
				{
					//~ echo $detail->jobname;
					//~ print_r(unserialize($detail->jobname));
					//~ exit;
	$category_details  = $this->task_model->get_task_iconcode_api($detail->task_catid);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}
					$arr[] = array(
					'id' => $detail->id,
					'user_id' => $detail->user_id,
					'po_id' => $detail->po_id,
					'SR_code' => $detail->SR_code,
					'email' => $detail->email,
					'booking_date' => $detail->booking_date,
					'booking_time' => $detail->booking_time,
					'est_time' => $detail->est_time,
					'bookingtime' => $detail->bookingtime,
					'apartment_id' => $detail->apartment_id,
					'image_path' => $detail->image_path,
					'iconcode' => $iconvar,
					'description' => $detail->description,
					'property_name' => $detail->property_name,
					'task_cat_shotname' => $detail->task_cat_shotname,
					'task_catname' => $detail->task_catname,
					'task_catid' => $detail->task_catid,
					'max_appointment' => $category_details->max_appointment,
					'jobname' => unserialize($detail->jobname),
					'jobprice' => unserialize($detail->jobprice),
					'status' => $detail->status,
					'contr_id' => $detail->contr_id,
					'schedule_date' => $detail->schedule_date,					
					'shedule_status' => $detail->shedule_status,
					'service_report_status' =>$detail->service_report_status,						
					);
				}
				$base_url =  BASE_URL().'uploads/';
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'details'=>$arr));
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
	
	public function get_booking_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{
				$task_detail = array('id' => $this->input->post('taskid'));		  
				$checkdetails = $this->task_model->get_task_api($task_detail);
				$arr = array();
				foreach($checkdetails as $detail)
				{
	$category_details  = $this->task_model->get_task_iconcode_api($detail->task_catid);
					
					
				
					if(!empty($category_details))
					{
						$iconvar = $category_details->iconcode;
					}
					else
					{
						$iconvar = "";
					}					$arr[] = array(
					'id' => $detail->id,
					'user_id' => $detail->user_id,
					'po_id' => $detail->po_id,
					'SR_code' => $detail->SR_code,
					'email' => $detail->email,
					'booking_date' => $detail->booking_date,
					'booking_time' => $detail->booking_time,
					'est_time' => $detail->est_time,
					'bookingtime' => $detail->bookingtime,
					'apartment_id' => $detail->apartment_id,
					'image_path' => $detail->image_path,
					'iconcode' => $iconvar,
					'description' => $detail->description,
					'property_name' => $detail->property_name,
					'task_cat_shotname' => $detail->task_cat_shotname,
					'task_catname' => $detail->task_catname,
					'task_catid' => $detail->task_catid,
					'max_appointment' => $category_details->max_appointment,
					'jobname' => unserialize($detail->jobname),
					'jobprice' => unserialize($detail->jobprice),
					'status' => $detail->status,
					'contr_id' => $detail->contr_id,
					'schedule_date' => $detail->schedule_date,					
					'shedule_status' => $detail->shedule_status,
					'service_report_status' =>$detail->service_report_status,						
					);
				}
					$base_url =  BASE_URL().'uploads/';
				print json_encode(array('status_code'=> '200','status'=>'success','baseimgpath'=>$base_url,'details'=>$arr));
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
	
	/* pending update */
	public function update_booking_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			if(!empty($user_details))
			{
				
				
				
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('booking_date');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
		$serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
		$tcatemaxappoint  = $this->task_model->get_task_categiriesmaxappoint($cateid);
		if(!empty($serviceval->opening_hours))
		{
			$day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			$opentime = json_decode($serviceval->opening_hours);

			$closertime = json_decode($serviceval->closing_hours);
			$opentime_count = count($opentime);
		//~ var_dump($opentime_count);
		//~ var_dump($closertime);
$tot_op_hrs = 0;
			for($i=0; $i<$opentime_count;$i++ )
			{
				
				if($day[$i] == $day_name)
				{
					//echo $day[$i] .''.$opentime[$i].' - '.$closertime[$i];

					if($opentime[$i] != 'Closed' || $closertime[$i] != 'Closed' )
					{
					
						$datetime1 = new DateTime($bookdate.''.$opentime[$i]);
						$datetime2 = new DateTime($bookdate.''.$closertime[$i]);
						$interval = $datetime1->diff($datetime2);
						$stropen = $opentime[$i];
						$opentot =   date("G:i", strtotime($opentime[$i]));
						$closetot =  date("G:i", strtotime($closertime[$i]));
						$tot_op_hrs = $interval->format('%h');
						$tot_op_min = $interval->format('%i')/60;
						
						//$tothours = 7;
					}
					else{
						$tot_op_hrs = 0;
					}

				}
			

			}
		$dec = 0;

	if(!is_int($tot_op_hrs)){
		//$tot_op_hrs -= 0.5;
		$dec = $tot_op_min ;
	}
	//~ echo $tot_op_hrs;
	//~ echo $tot_op_min;
	$session1;
	$session2;
	$session3;
//echo $dec;

	$temp = $tot_op_hrs % 3;

	if($temp % 3 == 0){
		$session1 = ($tot_op_hrs / 3) + $dec;
		$session2 = $tot_op_hrs / 3;
		$session3 = $tot_op_hrs / 3;
	} else if($temp == 1){
		$session1 = (($tot_op_hrs - $temp) / 3) + $dec;
		$session2 = (($tot_op_hrs - $temp) / 3) + 1;
		$session3 = ($tot_op_hrs - $temp) / 3;
	}  else if($temp == 2){
		$session1 = (($tot_op_hrs - $temp) / 3) + $dec;
		$session2 = (($tot_op_hrs - $temp) / 3) + 1;
		$session3 = (($tot_op_hrs - $temp) / 3) + 1;
	} 
//~ echo $session1;
//~ echo $session2;
//~ echo $session3;
//~ exit;

	if($this->input->post('booking_time') == 'morning')
	{
		
			$morafterevensess =  floor($session1 * $tcatemaxappoint->max_appointment);
		
	}
	else if($this->input->post('booking_time') == 'afternoon')
	{

			$morafterevensess =  floor($session2 * $tcatemaxappoint->max_appointment);

	}
	else if($this->input->post('booking_time') == 'evening')
	{
		
			$morafterevensess = floor($session3 * $tcatemaxappoint->max_appointment);

	}
//~ echo $morafterevensess;
//~ exit;
		if(0 < $morafterevensess)
		{
			$subtotal = $morafterevensess - 1;
			$sess_status = 0;
		}
		else
		{
			$subtotal = 0;	
			$sess_status = 1;
		}


		}

				
					$output = '';
					$config["upload_path"] = './uploads/';
					$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					$path = '';
					
					if($this->upload->do_upload('updateimage'))
					{
					$data = $this->upload->data();
					$output .= $data["file_name"];
					$path = $output;
					}
					
				 
				$base_url =  BASE_URL().'uploads/';
				//$shortcode =$this->input->post('short_code');

				$task_id = $this->input->post('taskid');
				
				if(!empty($task_id) && !empty($this->input->post('cateid')) &&  !empty($this->input->post('property_id')) && !empty($this->input->post('short_code')) && !empty($this->input->post('service_book')) && !empty($this->input->post('property_book')) && !empty($this->input->post('booking_date')) && !empty($this->input->post('booking_time')) && !empty($this->input->post('description')) )
				{
					if(!empty($path))
					{
					$task_detail = array('email' => $user_details->email,'user_id' => $user_details->id_user_master,'task_catid' => $this->input->post('cateid'),'image_path' => $path,'apartment_id' => $this->input->post('property_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description') );
					}
					else
					{
						$task_detail = array('email' => $user_details->email,'user_id' => $user_details->id_user_master,'task_catid' => $this->input->post('cateid'),'apartment_id' => $this->input->post('property_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description') );
					}
										
					$detail = $this->task_model->update_booking_api($task_detail,$task_id);
					
					$booking_data = $this->task_model->get_task_byid_api($task_id);	
					
						$booksessvalold = array('oldbooksess_date'=>$this->input->post('oldbooksess_date'),'oldbooksess_time'=> $this->input->post('oldbooksess_time'),'oldbooksess_taskcatid'=> $this->input->post('oldbooksess_taskcatid'));
		
		
		$booksess = array('booksess_taskcatid' => $this->input->post('cateid'),'booksess_date'=>$this->input->post('booking_date'),'booksess_time'=>$this->input->post('booking_time'),'booksess_maxappointment'=>$tcatemaxappoint->max_appointment,'booksess_incdescaptmnt'=>$subtotal,'booksess_maxcalcount'=>$morafterevensess,'booksess_status'=>$sess_status);
		
				$this->task_model->book_sessupdate($booksess,$booksessvalold);

					print json_encode(array('status_code'=> '200','status'=>'success','base_imgurl'=>$base_url,'updated_booking_data'=>$booking_data));
					
				}				
				else
				{
					print json_encode(array('status_code'=> '400','status'=>'Please fill all fields'));
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));	
			}
		}
		else
		{
			print json_encode(array('status_code'=> '500','status'=>'please provide auth key'));
		}
	}
	
	/*pending delete booking*/
	public function delete_booking_post()
	{
		
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{							
				$task_detail = array('id' => $this->input->post('taskid'),'user_id' => $user_details->id_user_master );					  
				$checkdetails = $this->task_model->get_task_api($task_detail);
				
				if(!empty($checkdetails))
				{
					$delete_task = $this->task_model->delete_task_api($task_detail);
					$base_url =  BASE_URL().'uploads/';
					print json_encode(array('status_code'=> '200','status'=> 'successfully deleted' ));
				}
				else
				{
					print json_encode(array('status_code'=> '400','status'=> 'invalid task id'));
				}			
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
	
	/*awaiting confirmation purchase order creation*/
	public function purchase_order_details_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
				$taskid = $this->input->post('taskid');					
				$purchase_orders = $this->purchaseorder_model->get_purchaseorder_details($taskid);
				$arr = array();
				foreach($purchase_orders as $purchase_order)
				{
					$arr[] = array(
					'p_ID' => $purchase_order->p_ID,
					'p_sr_code' => $purchase_order->p_sr_code,
					'p_first_name' => $purchase_order->p_first_name,
					'p_phone' => $purchase_order->p_phone,
					'p_email' => $purchase_order->p_email,
					'p_image_path' => $purchase_order->p_image_path,
					'p_task_catname' => $purchase_order->p_task_catname,
					'p_description' => $purchase_order->p_description,
					'p_jobname' => unserialize($purchase_order->p_jobname),
					'p_jobprice' => unserialize($purchase_order->p_jobprice),
					'p_booking_date' => $purchase_order->p_booking_date,
					'p_booking_time' => $purchase_order->p_booking_time,
					'p_est_time' => $purchase_order->p_est_time,
					'p_address' => $purchase_order->p_address,
					'p_cat_shot_code' => $purchase_order->p_cat_shot_code,
					'p_catid' => $purchase_order->p_catid,
					'p_task_id' => $purchase_order->p_task_id,
					'p_userid' => $purchase_order->p_userid,
					'p_issue_date' => $purchase_order->p_issue_date,
					'status' => $purchase_order->status,
					'first_name' => $purchase_order->first_name,
					'email' => $purchase_order->email,
					'statustask' => $purchase_order->statustask,
					);
				}
				
				print json_encode(array('status_code'=> '200','status' => 'success','purchase_order_details'=> $arr));	
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
	
	/* confirm purchase order*/
	public function confirm_purchase_order_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
				$details = array('id' => $this->input->post('taskid'),'user_id'	=>	$user_details->id_user_master,'status' => '2');
				$checkdetails = $this->task_model->get_task_api($details);
							
				if(!empty($checkdetails))
				{				
					$update = array('status' => '3','shedule_status' => '1');
					$taskchangetoawaiting = $this->purchaseorder_model->changeconfirm_api($details,$update);
					
					$detail = $this->task_model->get_task_byid_api($this->input->post('taskid'));	
					//print_r($booking_data);
					
					$arr = array();
					
						$arr = array(
						'id' => $detail->id,
						'user_id' => $detail->user_id,
						'po_id' => $detail->po_id,
						'SR_code' => $detail->SR_code,
						'email' => $detail->email,
						'booking_date' => $detail->booking_date,
						'booking_time' => $detail->booking_time,
						'est_time' => $detail->est_time,
						'bookingtime' => $detail->bookingtime,
						'apartment_id' => $detail->apartment_id,
						'image_path' => $detail->image_path,
						'description' => $detail->description,
						'property_name' => $detail->property_name,
						'task_cat_shotname' => $detail->task_cat_shotname,
						'task_catname' => $detail->task_catname,
						'task_catid' => $detail->task_catid,
						'jobname' => unserialize($detail->jobname),
						'jobprice' => unserialize($detail->jobprice),
						'status' => $detail->status,
						'contr_id' => $detail->contr_id,
						'schedule_date' => $detail->schedule_date,					
						'shedule_status' => $detail->shedule_status,
						'service_report_status' =>$detail->service_report_status,						
						);
					
									
					echo json_encode(array('status_code'=> '200','status' => 'success','data' => $arr ));
				}
				else
				{						
					print json_encode(array('status_code'=> '400','status' =>'invalid taskid or userid or status'));
				}
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
	
	/* decline purchase order*/	
	public function decline_purchase_order_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
			
			//~ print_r($user_details);
			//~ exit;
									
			if(!empty($user_details))
			{					
				$details = array('id' => $this->input->post('taskid'),'user_id'	=>	$user_details->id_user_master,'status' => '2');
				$checkdetails = $this->task_model->get_task_api($details);
				$arr = array();
				if(!empty($checkdetails))
				{
					$update = array('status' => '5');
					$taskchangetoawaiting = $this->purchaseorder_model->changeconfirm_api($details,$update);
					$detail = $this->task_model->get_task_byid_api($this->input->post('taskid'));	
					$arr = array(
						'id' => $detail->id,
						'user_id' => $detail->user_id,
						'po_id' => $detail->po_id,
						'SR_code' => $detail->SR_code,
						'email' => $detail->email,
						'booking_date' => $detail->booking_date,
						'booking_time' => $detail->booking_time,
						'est_time' => $detail->est_time,
						'bookingtime' => $detail->bookingtime,
						'apartment_id' => $detail->apartment_id,
						'image_path' => $detail->image_path,
						'description' => $detail->description,
						'property_name' => $detail->property_name,
						'task_cat_shotname' => $detail->task_cat_shotname,
						'task_catname' => $detail->task_catname,
						'task_catid' => $detail->task_catid,
						'jobname' => unserialize($detail->jobname),
						'jobprice' => unserialize($detail->jobprice),
						'status' => $detail->status,
						'contr_id' => $detail->contr_id,
						'schedule_date' => $detail->schedule_date,					
						'shedule_status' => $detail->shedule_status,
						'service_report_status' =>$detail->service_report_status,						
						);
					
					echo json_encode(array('status_code'=> '200','status' => 'success'));
				}
				else
				{						
					print json_encode(array('status_code'=> '400','status' =>'invalid taskid or userid or status'));
				}
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
	
	public function print_pdf_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
				//$details = array('id' => $this->input->post('task_id'),'user_id' =>	$user_details->id_user_master);
				$checkdetails = $this->task_model->get_task_purchase_api($this->input->post('task_id'),$user_details->id_user_master);
							
				if(!empty($checkdetails))
				{
					
									
					if($checkdetails->status == '3' || $checkdetails->status == '2')
					{
						$data['base_url'] = base_url();
						$filename= 'purchase'.date("mdHis");
						$pdfFilePath = FCPATH."downloads/reports/$filename.pdf";
					

						$data['get_purchaseorderdata'] = $this->purchaseorder_model->get_purchasedocument_api($this->input->post('task_id'));
						$data['current_menu']  = "service";
						$data['sub_menu']  = "service_list";
						if (file_exists($pdfFilePath) == FALSE)
						{
							ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)

							$html = $this->load->view('front/purchase_pdfdoc', $data,true); // render the view into HTML
							
							$this->load->library('pdf');
							$pdf = $this->pdf->load();
							$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
							$pdf->WriteHTML($html); // write the HTML into the PDF
							 $pdf->Output($pdfFilePath, 'F'); // save to file because we can

						$purchasepdf = array('purchase_pdf_link' => "$filename.pdf");
							
						}
						
						$this->purchaseorder_model->update_purchasedocument_api($this->input->post('task_id'),$purchasepdf);
				
						echo json_encode(array('status_code'=> '200','status' => 'success','data' =>base_url()."downloads/reports/$filename.pdf" ));
					}
					else
					{
						echo json_encode(array('status_code'=> '400','status' => 'invalid status' ));
					}
				}
				else
				{						
					print json_encode(array('status_code'=> '400','status' =>'invalid taskid or userid or status'));
				}
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
		public function print_invoicepdf_post()
	{
		if($this->input->post('auth_key') != '')
		{
							
				//$details = array('id' => $this->input->post('task_id'),'user_id' =>	$user_details->id_user_master);
$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))		

			{
				
				$data['get_service_report'] = $service_report_details = $this->service_model->get_service_report_details_api($user_details->id_user_master,$this->input->post('taskid'));
				//~ print_r($service_report_details);
				//~ exit;
				$price_name = array();
				$price = array();
				
				if(!empty($service_report_details->contcol_jobname))
				{
				    $price_name = unserialize($service_report_details->contcol_jobname);
				}
				if(!empty($service_report_details->cont_price))
				{
					$price = unserialize($service_report_details->cont_price);
				}
					
					
					$price_details = array();
					
					for($i = 0;$i<count($price_name);$i++)
					{
						$price_details[] = array('pricename'=>$price_name[$i],'price'=>$price[$i]);
					}
					
					
				
					$data['get_invoice'] = array(
					'sr_id' => $service_report_details->sr_id,
					'sche_id' => $service_report_details->sche_id,
					'invoice_id' => $service_report_details->invoice_id,
					'username' => $service_report_details->username,
					//'contcol_jobname' => unserialize($service_report_details->contcol_jobname),
					//'cont_price' => unserialize($service_report_details->cont_price),
					'sr_address' => $service_report_details->sr_address,
					'txtdescrip' => $service_report_details->txtdescrip,
					'additional_description' => $service_report_details->additional_description,
					'address' => $service_report_details->address,
					'apartment' => $service_report_details->apartment,
					'SR_code' => $service_report_details->SR_code,
					'issueddate' => $service_report_details->created_date,
					'phone' => $service_report_details->phone,
					'email' => $service_report_details->email,
					'task_catname' => $service_report_details->task_catname,
					'witeness_name' => $service_report_details->witeness_name,
					'img_sign' => $service_report_details->img_sign,
					'cont_name' => $service_report_details->cont_name,	
					'contractor_id' => $service_report_details->contractor_id,
					'price_details' => $price_details,
					'us_id' => $service_report_details->us_id,			
					'status' => $service_report_details->status								
					);
											
				if(!empty($service_report_details))
				{
						$data['base_url'] = base_url();
						$filename= 'invoice'.date("mdHis");
						$pdfFilePath = FCPATH."downloads/invoice/$filename.pdf";
					
						//~ $data['get_purchaseorderdata'] = $this->purchaseorder_model->get_purchasedocument_api($this->input->post('task_id'));
						$data['current_menu']  = "service";
						$data['sub_menu']  = "service_list";
						if (file_exists($pdfFilePath) == FALSE)
						{
							ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)

							$html = $this->load->view('front/invoice_pdf', $data,true); // render the view into HTML
							
							$this->load->library('pdf');
							$pdf = $this->pdf->load();
							$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
							$pdf->WriteHTML($html); // write the HTML into the PDF
							 $pdf->Output($pdfFilePath, 'F'); // save to file because we can

						$purchasepdf = array('purchase_pdf_link' => "$filename.pdf");
							
						}
						
					//	$this->purchaseorder_model->update_purchasedocument_api($this->input->post('task_id'),$purchasepdf);
				
						echo json_encode(array('status_code'=> '200','status' => 'success','data' =>base_url()."downloads/invoice/$filename.pdf" ));
					}
					else
					{
						echo json_encode(array('status_code'=> '400','status' => 'invalid status' ));
					}
				}
				else
				{						
					print json_encode(array('status_code'=> '400','status' =>'invalid taskid or userid or status'));
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=> 'invalid auth key'));
			}
		
		//~ else
		//~ {
			//~ print json_encode(array('status_code'=> '500','status'=> 'please provide auth key'));
		//~ }
	}
	

	
		/*past request invoice report*/
	public function get_invoice_report_post()
	{
		
			//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "invoice/invoice";
		//~ $data['current_menu']  = "invoice";
		//~ $data['get_service_report_details']  = $this->service_model->getinvoicereport_list_view();		
		//~ $this->template->load_frontend_template($data);
	
		if($this->input->post('auth_key') != '')
		{
		$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{
								
				
				$service_report_details = $this->service_model->get_service_report_details($this->input->post('taskid'));
				//~ print_r($service_report_details);
				//~ exit;
				
				$data['base_url'] = base_url();		
								$data['current_menu']  = "service";
								$data['sub_menu']  = "service_list";	
								//~ $originalDate = $service_report_details->issueddate;
								//~ $newDate = date("d/m/Y", strtotime($originalDate));			
							
							$data['get_service_report'] = $this->service_model->get_servicereport_pastrequest($service_report_details->sr_id,$service_report_details->us_id,$service_report_details->issueddate);

					$filename_inv= 'Invoice'.date("mdHis");
			$pdfFilePath_inv = FCPATH."downloads/invoice/$filename_inv.pdf";
			$pdfFilePathbase_inv = base_url()."downloads/invoice/$filename_inv.pdf";
			if (file_exists($pdfFilePath_inv) == FALSE)
			{
				
				ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
				$message_inv = $this->load->view('front/invoice_pdf', $data,true); // render the view into HTML
				//~ var_dump($message_inv);
				//~ exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
				$pdf->WriteHTML($message_inv); // write the HTML into the PDF
				$pdf->Output($pdfFilePath_inv, 'F'); // save to file because we can
			}
				$price_name = array();
				$price = array();
				
				if(!empty($service_report_details->contcol_jobname))
				{
				    $price_name = unserialize($service_report_details->contcol_jobname);
				}
				if(!empty($service_report_details->cont_price))
				{
					$price = unserialize($service_report_details->cont_price);
				}
					
					
					$price_details = array();
					
					for($i = 0;$i<count($price_name);$i++)
					{
						$price_details[] = array('pricename'=>$price_name[$i],'price'=>$price[$i]);
					}
					
					
				
					$arr = array(
					'sr_id' => $service_report_details->sr_id,
					'sche_id' => $service_report_details->sche_id,
					'invoice_id' => $service_report_details->invoice_id,
					'username' => $service_report_details->username,
					//'contcol_jobname' => unserialize($service_report_details->contcol_jobname),
					//'cont_price' => unserialize($service_report_details->cont_price),
					'sr_address' => $service_report_details->sr_address,
					'txtdescrip' => $service_report_details->txtdescrip,
					'additional_description' => $service_report_details->additional_description,
					'address' => $service_report_details->address,
					'apartment' => $service_report_details->apartment,
					'SR_code' => $service_report_details->SR_code,
					'issueddate' => $service_report_details->created_date,
					'phone' => $service_report_details->phone,
					'email' => $service_report_details->email,
					'task_catname' => $service_report_details->task_catname,
					'witeness_name' => $service_report_details->witeness_name,
					'img_sign' => $service_report_details->img_sign,
					'cont_name' => $service_report_details->cont_name,	
					'contractor_id' => $service_report_details->contractor_id,
					'price_details' => $price_details,
					'us_id' => $service_report_details->us_id,			
					'invoice_pdf' => $pdfFilePathbase_inv,			
					'status' => $service_report_details->status								
					);
				
				
				if(!empty($service_report_details))
				{
					print json_encode(array('status_code'=> '200','status' => 'success','service report'=> $arr));
				}
				else
				{
					print json_encode(array('status_code'=> '400','status'=> 'invalid service report'));
				}
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
	
	public function get_booksessdatahide_post()
	{
		if($this->input->post('auth_key') != '')
		{
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('bookdate');
		//~ echo date('m/d/Y');
		//~ echo $bookdate;
		if(strtotime(date('m/d/Y')) <= strtotime($bookdate))
		{ 
		$date = strtotime($bookdate);
		$day_name = date('l', strtotime($date));
		$day_name = date("l", $date);
		$serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
			$blaock['closechk'] = "";
		if(!empty($serviceval->opening_hours))
		{
			$day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			$opentime = json_decode($serviceval->opening_hours);

			$closertime = json_decode($serviceval->closing_hours);
			$opentime_count = count($opentime);

			for($i=0; $i<$opentime_count;$i++ )
			{ 
				if($day[$i] == $day_name)
				{
				//~ echo $day[$i] .''.$opentime[$i].' - '.$closertime[$i];
				$blaock['closechk'] =  $opentime[$i];
					if($opentime[$i] != 'Closed' || $closertime[$i] != 'Closed' )
					{
						$datetime1 = new DateTime($bookdate.''.$opentime[$i]);
						$datetime2 = new DateTime($bookdate.''.$closertime[$i]);
						$interval = $datetime1->diff($datetime2);
						$stropen = $opentime[$i];
						$opentot =   date("G:i", strtotime($opentime[$i]));
						$closetot =  date("G:i", strtotime($closertime[$i]));
						$tot_op_hrs = ceil($interval->format('%h').'.'.$interval->format('%i'));
						//$tothours = 7;
					}
					else{
						$tot_op_hrs = 0;
					}

				}
			}
			
		if(!empty($tot_op_hrs))
			{
		
				$session1;
				$session2;
				$session3;
				$temp = $tot_op_hrs % 3;
				if($temp % 3 == 0){
					$session1 = $tot_op_hrs / 3;
					$session2 = $tot_op_hrs / 3;
					$session3 = $tot_op_hrs / 3;
				} else if($temp == 1){
					$session1 = ($tot_op_hrs - $temp) / 3;
					$session2 = (($tot_op_hrs - $temp) / 3) + 1;
					$session3 = ($tot_op_hrs - $temp) / 3;
				}  else if($temp == 2){
					$session1 = ($tot_op_hrs - $temp) / 3;
					$session2 = (($tot_op_hrs - $temp) / 3) + 1;
					$session3 = (($tot_op_hrs - $temp) / 3) + 1;
				} 
			
				$morendTime = strtotime("+".$session1." hours", strtotime($opentot));
				$afterendTime = strtotime("+".$session2." hours", $morendTime);
				$evenendTime = strtotime("+".$session3." hours", $afterendTime);
				$morn_startendtime = date('h A',strtotime($stropen)) .' - '.date('h A', $morendTime);
				$after_startendtime = date('h A',$morendTime) .' - '.date('h A', $afterendTime);
				$even_startendtime = date('h A',$afterendTime) .' - '.date('h A', $evenendTime);
				
				
				$appendsess_time = array('morning'=>$morn_startendtime,'afternoon'=>$after_startendtime,'evening'=>$even_startendtime);
				
			}
			else
			{
				$appendsess_time = array('morning'=>"",'afternoon'=>"",'evening'=>"",'session'=>'Closed');
			
			}
			}
			else
			{
				$appendsess_time = array('morning'=>"",'afternoon'=>"",'evening'=>"",'session'=>'Closed');
				}
		if($blaock['closechk'] != "Closed")
		{
		$resbooksess = $this->task_model->book_sessget(array('booksess_taskcatid'=>$cateid,'booksess_date'=>$bookdate));
		//~ var_dump($resbooksess);
			if(!empty($resbooksess)){
				$i=0;	
				foreach($resbooksess as $resbooksessval){ 
					$i++;	
					$i ==1;
					if($resbooksessval->booksess_time == 'morning')
					{
						$valbd[] = '1';
					}
					else
					{
						$valbd[] = '';	
					}
					if($resbooksessval->booksess_time == 'afternoon')
					{
						$valbd[] =  '1';
					}
					else
					{
						$valbd[] = '';	
					}
					if($resbooksessval->booksess_time == 'evening')
					{
						$valbd[] = '1';
					}
					else
					{
						$valbd[] = '';	
					}
								
					//echo json_encode(array(0=> '0',1 => 'Morning',2 => '',3 => 'Evening'));
				}
				//$firstvalbd['0'] =0;
			
			    if(!empty($valbd[0]))
				    {
						$firstvalbd['morning'] = $valbd[0];
					}
					else
					{
						$firstvalbd['morning'] = "0";
					}
				   
					  if(!empty($valbd[1]) || !empty($valbd[4]))
				    {
						if($valbd[1])
						{
						$firstvalbd['afternoon'] = $valbd[1];
						}else if($valbd[4])
						{
								$firstvalbd['afternoon'] = $valbd[4];
						}
					}
					else
					{
						$firstvalbd['afternoon'] ="0";
					}
				    if(!empty($valbd[2]) || !empty($valbd[5]) || !empty($valbd[8]))
				    {
						if($valbd[2])
						{
						$firstvalbd['evening'] = $valbd[2];
						}else if($valbd[5])
						{
								$firstvalbd['evening'] = $valbd[5];
						}else if($valbd[8])
						{
								$firstvalbd['evening'] = $valbd[8];
						}
					}
					else
					{
						$firstvalbd['evening'] ="0";
					}
					
			 echo json_encode(array('status_code'=> '200','status'=> 'all session visible','session'=>'','morning'=>$firstvalbd['morning'],'afternoon'=>$firstvalbd['afternoon'],'evening'=>$firstvalbd['evening'],'morning_time'=>$appendsess_time['morning'],'afternoon_time'=>$appendsess_time['afternoon'],'evening_time'=>$appendsess_time['evening']));
			
		}
			else
			{
				echo json_encode(array('status_code'=> '200','status'=> 'all session visible','session'=>'','morning'=> '0','afternoon' => '0','evening' => '0','morning_time'=>$appendsess_time['morning'],'afternoon_time'=>$appendsess_time['afternoon'],'evening_time'=>$appendsess_time['evening']));
			}	
		}
		else
			{
				echo json_encode(array('status_code'=> '200','status'=> 'success 3 session hide','morning' => '1','afternoon' => '1','evening' => '1','session'=>'Closed','morning_time'=>'','afternoon_time'=>'','evening_time'=>''));
			}	
		}
		else
		{
			echo json_encode(array('status_code'=> '200','status'=> 'success 3 session hide','morning' => '1','afternoon' => '1','evening' => '1','session'=>'Closed','morning_time'=>'','afternoon_time'=>'','evening_time'=>''));
			
		}
	}
			//~ else
			//~ {
				//~ echo json_encode(array('status_code'=> '200','status'=> 'all session visible','morning'=> '0','afternoon' => '0','evening' => '0'));
			//~ }	
		//~ }
		//~ else
			//~ {
				//~ echo json_encode(array('status_code'=> '200','status'=> 'success 3 session hide','morning'=> '1','afternoon' => '1','evening' => '1'));
			//~ }	
		
			else
		{
			print json_encode(array('status_code'=> '500','status'=> 'please provide auth key'));
		}
	}
	
}
