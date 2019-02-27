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
class Schedule extends REST_Controller 
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
		
	}
	
	public function get_schedulecount_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
				$get_schedules = $this->service_model->get_schedule_events($user_details->id_user_master);	
					
				if(!empty($get_schedules))
				{
					$count = count($get_schedules);
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
	
	/* list of schedules to the contractor*/	
	public function get_all_schedule_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
				$get_schedules = $this->service_model->get_schedule_events($user_details->id_user_master);
					
				$arr = array();	
				
				foreach($get_schedules as $detail)
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
						'service_report_status' => $detail->service_report_status,
						'username' => $detail->username,
						'phone' => $detail->phone,	
						'ID' => $detail->ID,	
						'property_user_id' => $detail->property_user_id,	
						//'property_type' => $detail->property_type,	
						'property_address' => $detail->property_address,	
						//'property_landmark' => $detail->property_landmark,	
						//'property_country' => $detail->property_country,	
						'user_email' => $detail->user_email,	
						'property_status' => $detail->property_status,													
						);
				}
					$base_url =  BASE_URL().'uploads/'; 
					print json_encode(array('status_code'=> '200','status' => 'success','bae_url'=>$base_url,'schedules'=> $arr));		
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
	/*get single schedule*/
	public function get_schedule_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{					
					$get_schedules = $this->service_model->getscheduleeventswithtaskid_api($user_details->id_user_master,$this->input->post('task_id'));	
					if(!empty($get_schedules))
					{
						foreach($get_schedules as $detail)
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
							//'issueddate' => $detail->issueddate,
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
							'service_report_status' => $detail->service_report_status,
							'username' => $detail->username,
							'phone' => $detail->phone,	
							'ID' => $detail->ID,	
							'property_user_id' => $detail->property_user_id,	
							//'property_type' => $detail->property_type,	
							'property_address' => $detail->property_address,	
							//'property_landmark' => $detail->property_landmark,	
							//'property_country' => $detail->property_country,	
							'user_email' => $detail->user_email,	
							'property_status' => $detail->property_status,													
							);
						}
						$base_url =  BASE_URL().'uploads/'; 
						print json_encode(array('status_code'=> '200','status' => 'success','bae_url'=>$base_url,'single_schedules'=> $arr));		
					}
					else
					{
						print json_encode(array('status_code'=> '400','status'=> 'invalid task id' ));	
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
	
	/*list of past schedules*/
	public function get_all_pastschedule_post()
	{
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
				$arr = array();					
			if(!empty($user_details))
			{					
					$get_pastschedules = $this->service_model->get_schedule_events_past($user_details->id_user_master);	
					
					//~ print_r($get_pastschedules);
					//~ exit;
						if(!empty($get_pastschedules))
						{
							
							
							foreach($get_pastschedules as $detail)
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
								'service_report_status' => $detail->service_report_status,
								'username' => $detail->username,
								'phone' => $detail->phone,	
								'ID' => $detail->ID,	
								'property_user_id' => $detail->property_user_id,	
								//'property_type' => $detail->property_type,	
								'property_address' => $detail->property_address,	
								//'property_landmark' => $detail->property_landmark,	
								//'property_country' => $detail->property_country,	
								'user_email' => $detail->user_email,	
								'property_status' => $detail->property_status,													
								);
							}
						}
						$base_url =  BASE_URL().'uploads/'; 
					
					print json_encode(array('status_code'=> '200','status' => 'success','bae_url'=>$base_url,'past_schedules'=> $arr));		
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
	
	/*past assignment schedule report*/
	public function get_past_service_report_post()
	{
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
			$adminname = '1SS';
		 //~ $email = $craetepurchaseorder->p_email;
			//~ exit;
			$filename= 'Servicereport'.date("mdHis");
			$pdfFilePath = FCPATH."downloads/reports/$filename.pdf";
			$pdfFilePathbase = base_url()."downloads/reports/$filename.pdf";
			if (file_exists($pdfFilePath) == FALSE)
			{
				
				ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
				$message = $this->load->view('front/pdf_report', $data,true); // render the view into HTML
				//~ var_dump($data['get_service_report']);
				//~ exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
				$pdf->WriteHTML($message); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F'); // save to file because we can
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
					'service_report_pdf' => $pdfFilePathbase,			
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
	
/*service report creation*/
	public function service_report_creation_post()
	{
				
		if($this->input->post('auth_key') != '')
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));
									
			if(!empty($user_details))
			{
				
				$check_task_id_exist =  $this->service_model->get_schedule_api($this->input->post('task_id'));
				
			

					$get_schedules = $this->service_model->get_task_event_sche_api($this->input->post('task_id'),$user_details->id_user_master);
					
					
					$output = '';
					$config["upload_path"] = './uploads/signature/';
					$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->load->library('upload', $config);

					if($this->upload->do_upload('sign'))
					{
						$data = $this->upload->data();
						$output .= $data["file_name"];
					}
					
				 $path = $output;
				 $img_path=  BASE_URL().'uploads/signature/'.$output; 
				
				

					//~ $this->load->library('upload');
					//~ $dataURL = $this->input->post("sign");

					//~ print_r($this->upload->data('sign'));
					//~ exit;
					
					//~ $dataURL = str_replace('data:image/png;base64,', '', $dataURL);
					//~ $dataURL = str_replace(' ', '+', $dataURL);
					//~ $image = base64_decode($dataURL);
					//~ $filename = date("d-m-Y-h-i-s") . '.' . 'png'; //renama file name based on time
					//~ $image_path = './uploads/signature/';
					//~ file_put_contents($image_path. $filename, $image);
					//~ $img_path = base_url().'uploads/signature/'. $filename; 
					
					
					$jobname = unserialize($get_schedules->jobname);
					$jobprice = unserialize($get_schedules->jobprice);
					
					//$jnamestr = $this->input->post('extra_job_name')
					$extra_jobname = explode(',',$this->input->post('extra_job_name'));
					$extra_price = explode(',',$this->input->post('extra_price_name'));
					
					$combinejobname = array_merge($jobname,$extra_jobname);
					$combinejobprice = array_merge($jobprice,$extra_price);
					$serializejobname = serialize($combinejobname);
					$serializejobprice = serialize($combinejobprice);
					

					//$this->service_model->getscheduleeventswithtaskid_api($user_details->id_user_master,$this->input->post('task_id'));
							
					$newDate_bd = date("d/m/Y", strtotime($get_schedules->booking_date));
					$date = date("d/m/Y");
					 $insert_sched = array('SR_code'=> $get_schedules->SR_code,'sche_id'=>  $this->input->post('task_id'),'task_catname'=> $get_schedules->task_catname, 'us_id'=> $get_schedules->user_id, 'username'=> $get_schedules->username,'apartment'=> $get_schedules->property_name, 'sr_address'=> $get_schedules->property_address,'issueddate'=> $newDate_bd,'txtdescrip'=> $get_schedules->description,'additional_description' => $this->input->post('additional_description'),'contcol_jobname'=>$serializejobname,'cont_price'=>$serializejobprice,'phone'=> $get_schedules->phone,'email' =>$get_schedules->email, 'img_sign'=> $img_path,'witeness_name'=> $this->input->post('witnessname'),'created_date' => $date,'contractor_id'=> $user_details->id_user_master,'status' => 1);
					
					if(empty($check_task_id_exist))
					{
							$date = date("d/m/Y");
				$newDateio = date("Ymd");				
						$update_schedule = $this->service_model->insert_schedue( $insert_sched );			
						$update_task_schedule_status = array('service_report_status' => 1,'status' => 4);
						$update_schedule = $this->service_model->update_taskschedule_report($update_task_schedule_status,$this->input->post('task_id'));
						
						$update_scheduleinvoice = $this->service_model->update_invoicecode_report($update_schedule,array('invoice_id' =>'IO'.$newDateio.$get_schedules->task_cat_shotname.'00'.$update_schedule));
						
						//echo $this->input->post('task_id');
						$service_report_details = $this->service_model->get_service_report_details($this->input->post('task_id'));
						
						//~ print_r($service_report_details);
						//~ echo 'insert';
						//~ exit;
						
						
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
						'username' => $service_report_details->username,
						//'contcol_jobname' => unserialize($service_report_details->contcol_jobname),
						//'cont_price' => unserialize($service_report_details->cont_price),
						'price_details' => $price_details,
						'sr_address' => $service_report_details->sr_address,
						'txtdescrip' => $service_report_details->txtdescrip,
						'additional_description' => $service_report_details->additional_description,
						'address' => $service_report_details->address,
						'apartment' => $service_report_details->apartment,
						'SR_code' => $service_report_details->SR_code,
						'issueddate' => $service_report_details->issueddate,
						'phone' => $service_report_details->phone,
						'email' => $service_report_details->email,
						'task_catname' => $service_report_details->task_catname,
						'witeness_name' => $service_report_details->witeness_name,
						'img_sign' => $service_report_details->img_sign,
						'cont_name' => $service_report_details->cont_name,	
						'contractor_id' => $service_report_details->contractor_id,
						'us_id' => $service_report_details->us_id,			
						'status' => $service_report_details->status								
						);
				
						
						print json_encode(array('status_code'=> '200','status'=> 'schedule report inserted successfully','service_report_detail'=>$arr));
					}
					else
					{
						$scheduleid = $check_task_id_exist->sr_id;
						$status = $check_task_id_exist->status;

						if($status == 0 || $status == 2)
						{									
							$update_schedule = $this->service_model->update_schedule($insert_sched,$scheduleid);						
							$update_task_schedule_status = array('service_report_status' => 1,'status' => 4);
							$update_schedule = $this->service_model->update_taskschedule_report($update_task_schedule_status,$this->input->post('task_id'));
							
							$service_report_details = $this->service_model->get_service_report_details($this->input->post('task_id'));
							
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
							'username' => $service_report_details->username,
							//'contcol_jobname' => unserialize($service_report_details->contcol_jobname),
							//'cont_price' => unserialize($service_report_details->cont_price),
							'price_details' => $price_details,
							'sr_address' => $service_report_details->sr_address,
							'txtdescrip' => $service_report_details->txtdescrip,
							'additional_description' => $service_report_details->additional_description,
							'address' => $service_report_details->address,
							'apartment' => $service_report_details->apartment,
							'SR_code' => $service_report_details->SR_code,
							'issueddate' => $service_report_details->issueddate,
							'phone' => $service_report_details->phone,
							'email' => $service_report_details->email,
							'task_catname' => $service_report_details->task_catname,
							'witeness_name' => $service_report_details->witeness_name,
							'img_sign' => $service_report_details->img_sign,
							'cont_name' => $service_report_details->cont_name,	
							'contractor_id' => $service_report_details->contractor_id,
							'us_id' => $service_report_details->us_id,			
							'status' => $service_report_details->status								
							);
				
						
							print json_encode(array('status_code'=> '200','status'=> 'schedule report updated successfully','service_report_details'=>$arr));
						}
						else
						{
							print json_encode(array('status_code'=> '409','status'=> 'schedule report already created'));
						}
											
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
	
}
