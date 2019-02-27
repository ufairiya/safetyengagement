<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	
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
				$this->load->model('prices_model');
				$this->load->model('purchaseorder_model');
				$this->load->model('service_model');

	}

	public function index()
	{
		
		
		if($this->session->userdata('id_user_master') != "" )
		{
			 $arraydata = array(
                'apt_name'     => $this->input->post('apt_name'),
                'cat_name' => $this->input->post('cat_name'),
                'txt_descr' => $this->input->post('txt_descr')
		);
			
			$this->session->set_userdata($arraydata);
			if(!empty($this->input->get('id')))
			{
			$cat_id = $this->input->get('id');	
		
			$taskcatarraydata = array( 'cat_name' => $cat_id);
			$this->session->set_userdata($taskcatarraydata);
			}
		
		$data['base_url'] = base_url();
			$data['current_menu']  = "booking";
			$data['sub_menu']  = "booking";
			$data['view_file']  = "booking";
			$data['get_task']  = $this->task_model->get_task_details();
			$data['get_apartment']  = $this->property_model->getproperty_list();

			
			$this->template->load_front_home_template($data);		
		}	
		else
		{

			redirect('home');
		}

	}
	public function get_booksessdatahide()
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
				
				
				$appendsess_time = array(''=>'','morning'=>$morn_startendtime,'afternoon'=>$after_startendtime,'evening'=>$even_startendtime);
				
			}
			else
			{
				$appendsess_time = array(''=>'',''=>'Closed');
			
			}
			}
			else
			{
				$appendsess_time = array(''=>'',''=>'Closed');
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
						$valbd[] = 'morning';
					}
					else
					{
						$valbd[] = '';	
					}
					if($resbooksessval->booksess_time == 'afternoon')
					{
						$valbd[] =  'afternoon';
					}
					else
					{
						$valbd[] = '';	
					}
					if($resbooksessval->booksess_time == 'evening')
					{
						$valbd[] = 'evening';
					}
					else
					{
						$valbd[] = '';	
					}
								
					//echo json_encode(array(0=> '0',1 => 'Morning',2 => '',3 => 'Evening'));
				}
				$firstvalbd['0'] =0;
			
			    if(!empty($valbd[0]))
				    {
						$firstvalbd['1'] = $valbd[0];
					}
					else
					{
						$firstvalbd['1'] = "";
					}
				   
					  if(!empty($valbd[1]) || !empty($valbd[4]))
				    {
						if($valbd[1])
						{
						$firstvalbd['2'] = $valbd[1];
						}else if($valbd[4])
						{
								$firstvalbd['2'] = $valbd[4];
						}
					}
					else
					{
						$firstvalbd[2] ="";
					}
				    if(!empty($valbd[2]) || !empty($valbd[5]) || !empty($valbd[8]))
				    {
						if($valbd[2])
						{
						$firstvalbd['3'] = $valbd[2];
						}else if($valbd[5])
						{
								$firstvalbd['3'] = $valbd[5];
						}else if($valbd[8])
						{
								$firstvalbd['3'] = $valbd[8];
						}
					}
					else
					{
						$firstvalbd['3'] ="";
					}
					
			 echo json_encode(array('sessdataall'=>$firstvalbd,'append_data'=>$appendsess_time));
			
		}
			else
			{
				echo json_encode(array('sessdataall'=>array('0'=> '0',1 => '','2' => '','3' => ''),'append_data'=>$appendsess_time));
			}	
		}
		else
			{
				echo json_encode(array('sessdataall'=>array('0'=> '0','1' => 'morning','2' => 'afternoon','3' => 'evening'),'append_data'=>$appendsess_time));
			}	
		}
		else
		{
			echo json_encode(array('sessdataall'=>array('0'=> '0','1' => 'morning','2' => 'afternoon','3' => 'evening'),'append_data'=>array(''=>'',''=>'Closed')));
			
		}
	}
	public function get_booksessdata()
	{
		//~ $cateid = $this->input->post('cateid');
		//~ $bookdate = $this->input->post('bookdate');
		//~ $date = strtotime($bookdate);
		//~ $day_name = date("l", $date);
		//~ $serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
		//~ if(!empty($serviceval->opening_hours))
		//~ {
			//~ $day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			//~ $opentime = json_decode($serviceval->opening_hours);

			//~ $closertime = json_decode($serviceval->closing_hours);
			//~ $opentime_count = count($opentime);
//~ $tot_op_hrs = 0;

			//~ for($i=0; $i<$opentime_count;$i++ )
			//~ { 
				//~ if($day[$i] == $day_name)
				//~ {
				//~ //	echo $day[$i] .''.$opentime[$i].' - '.$closertime[$i];

					//~ if($opentime[$i] != 'Closed' || $closertime[$i] != 'Closed' )
					//~ {
						//~ $datetime1 = new DateTime($bookdate.''.$opentime[$i]);
						//~ $datetime2 = new DateTime($bookdate.''.$closertime[$i]);
						//~ $interval = $datetime1->diff($datetime2);
						//~ $stropen = $opentime[$i];
						//~ $opentot =   date("G:i", strtotime($opentime[$i]));
						//~ $closetot =  date("G:i", strtotime($closertime[$i]));
						//~ $tot_op_hrs = ceil($interval->format('%h').'.'.$interval->format('%i'));
					
						//~ //$tothours = 7;
					//~ }
					//~ else{
						//~ $tot_op_hrs = 0;
					//~ }

				//~ }
			//~ }

			//~ if(!empty($tot_op_hrs))
			//~ {
			
		
				//~ $morn_startendtime = 'morning';
				//~ $after_startendtime = 'afternnon';
				//~ $even_startendtime ='evening';
				
				
				//~ echo json_encode(array('a'=>$morn_startendtime,'b'=>$after_startendtime,'c'=>$even_startendtime));
				//~ exit;
			//~ }
			//~ else
			//~ {
				//~ echo json_encode(array('a'=>0,'b'=>0,'c'=>0));
				//~ exit;
			//~ }
		//~ }
		
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('bookdate');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
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
				
				
				echo json_encode(array(''=>'','morning'=>$morn_startendtime,'afternoon'=>$after_startendtime,'evening'=>$even_startendtime));
				exit;
			}
			else
			{
				echo json_encode(array('morning'=>0,'afternoon'=>0,'evening'=>0));
				exit;
			}
		}
						
						
	}	
	public function past_request()
	{
		$user_id = $this->session->userdata('id_user_master');
		$data['current_menu']  = "booking";
		$data['sub_menu']  = "past_request";
		$data['base_url'] = base_url();
		$data['view_file']  = "request_record";
		$data['get_task_list']  = $this->task_model->get_front_task_details_pastrecord($user_id);
		$data['get_task_declinelist']  = $this->task_model->get_front_task_declinelist($user_id);
		$this->template->load_front_home_template($data);		

	}
	//~ public function request_record()
	//~ {
		//~ $user_id = $this->session->userdata('id_user_master');
		
		//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "request_record";
		//~ $data['get_task_list']  = $this->task_model->get_front_task_details($user_id);
		//~ $this->template->load_front_home_template($data);		

	//~ }
	public function active_request()
	{
		if($this->input->get('active') == 'pending')
		{
			$active = 'pending';
		}
		else if($this->input->get('active') == 'service')
		{
			$active = 'service';
		}
		else
		{
			$active = '';
		}
		$user_id = $this->session->userdata('id_user_master');
		$data['current_menu']  = "booking";
		$data['sub_menu']  = "active_request";
		$data['base_url'] = base_url();
		$data['view_file']  = "upcoming_request";
		$data['active'] = $active;
		$data['get_task_list']  = $this->task_model->get_front_task_details($user_id);
		$data['get_task_list1']  = $this->task_model->get_front_task_details1($user_id);
		$data['get_task_list2']  = $this->task_model->get_front_task_details2($user_id);
		$this->template->load_front_home_template($data);		

	}
	public function sessionperday()
	{
		$sessionperday  = $this->task_model->sessionbyday($this->input->post('cateid'));
		if(!empty($sessionperday->max_appointment))
		{
			$max_appointment = $sessionperday->max_appointment;
		}
		else
		{
			$max_appointment = 0;
		}
		
		$task_today_category_morning = $this->task_model->tasktoday_session_morning($this->input->post('cateid'));
		if(!empty($task_today_category_morning))
		{
			$morning_count = count($task_today_category_morning);
		}
		else
		{
			$morning_count = 0;
		}
		
		$task_today_category_afternoong = $this->task_model->tasktoday_session_afternoon($this->input->post('cateid'));
		if(!empty($task_today_category_afternoong))
		{
			$afternoon_count = count($task_today_category_afternoong);
		}
		else
		{
			$afternoon_count = 0;
		}
		
		$task_today_category_evening = $this->task_model->tasktoday_session_evening($this->input->post('cateid'));
		if(!empty($task_today_category_evening))
		{
			$evening_count = count($task_today_category_evening);
		}
		else
		{
			$evening_count = 0;
		}
		
		print json_encode(array('max_appointment'=>$max_appointment,'morning'=>$morning_count,'afternoon'=>$afternoon_count,'evening'=>$evening_count));
		
	
	}
	
	public function book_appointment()
	{
		
		
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('booking_date');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
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
	
		$morafterevensess =  floor($session1 * $this->input->post('maxappointment'));
	
}
else if($this->input->post('booking_time') == 'afternoon')
{

		$morafterevensess =  floor($session2 * $this->input->post('maxappointment'));

}
else if($this->input->post('booking_time') == 'evening')
{
	
		$morafterevensess = floor($session3 * $this->input->post('maxappointment'));

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
	$booksess = array( 'booksess_taskcatid' => $this->input->post('cateid'),'booksess_date'=>$this->input->post('booking_date'),'booksess_time'=>$this->input->post('booking_time'),'booksess_maxappointment'=>$this->input->post('maxappointment'),'booksess_incdescaptmnt'=>$subtotal,'booksess_maxcalcount'=>$morafterevensess,'booksess_status'=>$sess_status);
		$this->task_model->book_sessinsert($booksess);
	}
	
		$shortcode =$this->input->post('short_code');
		$task_detail = array('email' => $this->session->userdata('email'),'user_id' => $this->session->userdata('id_user_master'),'task_catid' => $this->input->post('cateid'),'image_path' => $this->input->post('img_link'),'apartment_id' => $this->input->post('property_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description'),'status' => 1);  
	$detail = $this->task_model->task_insert($task_detail,$shortcode);	

	
}
	public function edit_booking($task_id = 0)
	{
		$user_id = $this->session->userdata('id_user_master');
		$data['current_menu']  = "booking";
		$data['sub_menu']  = "booking";
		$data['base_url'] = base_url();
		$data['view_file']  = "booking_update";
		$data['get_task']  = $this->task_model->get_task_details();
		$data['get_apartment']  = $this->property_model->getproperty_list();
		$data['get_task_update']  = $this->task_model->get_front_edit_details($task_id,$user_id);
	
		$this->template->load_front_home_template($data);
	
	}
	public function delete_booking($task_id = 0)
	{
	
		$user_id = $this->session->userdata('id_user_master');				
		$delete_res = $this->task_model->delete_task($user_id,$task_id);
		 
		if($delete_res == true)
		{
			$this->session->set_flashdata('success', 'Your appointment request have been deleted.');
			redirect('my-request/active-request/?active=pending');
		}
		else
		{
				redirect('my-request/active-request');

		}
		
	}
	
	public function booking_update()
	{
		
		
		
		$cateid = $this->input->post('cateid');
		$bookdate = $this->input->post('booking_date');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
		$serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
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
		
			$morafterevensess =  floor($session1 * $this->input->post('maxappointment'));
		
	}
	else if($this->input->post('booking_time') == 'afternoon')
	{

			$morafterevensess =  floor($session2 * $this->input->post('maxappointment'));

	}
	else if($this->input->post('booking_time') == 'evening')
	{
		
			$morafterevensess = floor($session3 * $this->input->post('maxappointment'));

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

		$user_id = $this->session->userdata('id_user_master');

		$task_detail = array('id' => $this->input->post('task_id'),'user_id' => $this->session->userdata('id_user_master'),'apartment_id' => $this->input->post('apt_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catid' => $this->input->post('cateid'),'image_path' => $this->input->post('img_link'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description') );     


		$data_res = $this->task_model->update_booking($task_detail,$user_id);
		
		$booksessvalold = array('oldbooksess_date'=>$this->input->post('oldbooksess_date'),'oldbooksess_time'=> $this->input->post('oldbooksess_time'),'oldbooksess_taskcatid'=> $this->input->post('oldbooksess_taskcatid'));
		
		
		$booksess = array('booksess_taskcatid' => $this->input->post('cateid'),'booksess_date'=>$this->input->post('booking_date'),'booksess_time'=>$this->input->post('booking_time'),'booksess_maxappointment'=>$this->input->post('maxappointment'),'booksess_incdescaptmnt'=>$subtotal,'booksess_maxcalcount'=>$morafterevensess,'booksess_status'=>$sess_status);
		//~ var_dump($booksess);
		//~ exit;
		$this->task_model->book_sessupdate($booksess,$booksessvalold);
	
		if($data_res == true)
		{
			
			//~ $user_id = $this->session->userdata('id_user_master');

			//~ $data['base_url'] = base_url();
			//~ $data['view_file']  = "booking_update";
			//~ $data['get_task']  = $this->task_model->get_task_details();
			//~ $data['get_apartment']  = $this->property_model->getproperty_list();
			//~ $data['get_task_update']  = $this->task_model->get_front_edit_details($this->input->post('tasl_cat_id'),$user_id);

			//~ $this->template->load_front_home_template($data);
			echo json_encode(array('success' =>'success'));
			///$this->session->set_flashdata('updatesuccess', '<div class="alert alert-success alert-dismissable">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Success! Your request have been updated to our administrator. We will contact you for confirmation shortly.</div>');
			//redirect('booking/active_request');
		}
		else
		{
			//~ $user_id = $this->session->userdata('id_user_master');

			//~ $data['base_url'] = base_url();
			//~ $data['view_file']  = "booking_update";
			//~ $data['get_task']  = $this->task_model->get_task_details();
			//~ $data['get_apartment']  = $this->property_model->getproperty_list();
			//~ $data['get_task_update']  = $this->task_model->get_front_edit_details($this->input->post('tasl_cat_id'),$user_id);

			//~ $this->template->load_front_home_template($data);
		}
	
	}
	
	public function get_categories()
	{
		$cat_id = $this->uri->segment(3);

		//$cat_id = $this->input->get('task_id');
		$data['current_menu']  = "service";
		$data['sub_menu']  =base_url()."booking/get_categories?task_id=".$cat_id;
		$data['base_url'] = base_url();
		$data['task_cate']  = $this->task_model->get_task_cate($cat_id);
		//$data['getcat_val'] = $this->prices_model->getcate_price($cat_id);
		//~ if(!empty($getcat_val))
		//~ {
			//~ foreach($getcat_val as $getcat_val_val )
			//~ {
				//~ $data['getcate_price'] = 	$getcat_val_val;
			//~ }
		//~ }
		$data['view_file']  = "service";

		$this->template->load_front_home_template($data);
		
	}
	
	public function preview_service_categories()
	{            
		$cat_id 				=	$this->input->get('serid');
		$data['sub_menu']  		=	base_url()."booking/get_categories?task_id=".$cat_id;
		$data['current_menu']  	= 	"service";
		$data['base_url'] 		= 	base_url();
		$data['task_cate']  	= 	$this->task_model->get_task_cate($cat_id);
		$data['view_file']  	= 	"preview_service_categories";
		$this->template->load_front_homepreview_template($data);
	}
	

	public function getservicecategorydata()
	{
				$cateid = $this->input->post('cateid');
	$bookdate = $this->input->post('bookdate');
		$date = strtotime($bookdate);
		$day_name = date("l", $date);
		$serviceval = $this->task_model->get_task_cate_servicecheck($cateid);
		
		if(!empty($serviceval->opening_hours))
		{
			$daydata['dateval'] ="";	
			$daydataval =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
			$opentime = json_decode($serviceval->opening_hours);
			$closertime = json_decode($serviceval->closing_hours);
			$opentime_count = count($opentime);
			$tot_op_hrs = 0;
			for($i=0; $i<$opentime_count;$i++ )
			{ 
				if($daydataval[$i] == $day_name)
				{
					//echo $daydataval[$i].'-'.$opentime[$i];
					if($opentime[$i] == 'Closed')
					{
				 $endDate = strtotime('08/06/2080');
				 for($i = strtotime($daydataval[$i], strtotime(date('m/d/Y'))); $i <= $endDate; $i = strtotime('+1 week', $i)){
					  $dayval[] = date('m/d/Y', $i); } $daydata['dateval'] = implode(",",$dayval);

				}
				
			}
		

			}
			echo json_encode($daydata);
			//~ exit;
		}

	}
		public function getawaitconfirmationdata()
	{
				
		$checkdata = $this->task_model->get_front_upcoming_task_details($this->session->userdata('id_user_master')); 
		$checkdatacnt = count($checkdata);
		if($checkdatacnt > 0 )
		{
				echo json_encode(array('status'=>'success','countdata'=>$checkdatacnt));
			}
			
	}
		public function getawaitservicedata()
	{
				
		$checkdata = $this->service_model->get_schedule_events($this->session->userdata('id_user_master')); 
		$checkdatacnt = count($checkdata);
		if($checkdatacnt > 0 )
		{
				echo json_encode(array('status'=>'success','countdata'=>$checkdatacnt));
			}
			
	}
}
