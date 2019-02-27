<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bids extends CI_Controller {
	
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
		$this->load->model('postjob_model');
		$this->load->model('bids_model');
		$this->load->model('packages_model');
	}
	public function index()
	{

	
	}
	public function find_job($fullstate = "")
	{
	
		if(!empty($fullstate))
		{
			 $get_postjoballarrpush = $this->postjob_model->get_mapsearchdata($fullstate);
			//~ echo "<pre>";
			 //~ var_dump($get_postjoballarrpush);
			 //~ exit;
	
	 }
		 else
		 {
		$findarraydata = array('finddata'  => $this->input->post('finddata'));
		if(!empty($findarraydata['finddata']) )
		{
			$get_postjoballarrpush = $this->postjob_model->get_postjoballpaidfilter($findarraydata);
		
		}else{
			$get_postjoballarrpush  = $this->postjob_model->get_postjoballdetails();
			//~ $get_postjoballdata = $this->postjob_model->get_postjoballdetailsdata();
					//~ $get_postjoballarrpush = array_merge($get_postjoball,$get_postjoballdata);
					//~ echo "<pre>";
					//~ var_dump($get_postjoball );
					//~ var_dump($get_postjoballdata );
					//~ var_dump($get_postjoballarrpush );
					//~ exit;
			
		}
	}
	
			$data['base_url'] = base_url();
			$data['current_menu']  = "job";
			$data['sub_menu']  = "job";
			$data['get_postjoball']  = $get_postjoballarrpush;
			$data['fullstate']  =  $fullstate ;
			$data['view_file']  = "find_job";
			$this->template->load_front_home_template($data);	
			
		
	}
	public function view_job_details()
	{
		$get_postjoball = $this->postjob_model->get_postjoballpaid();
		$data['base_url'] = base_url();
		$data['current_menu']  = "bids";
		$data['sub_menu']  = "bids";
		$data['get_postjoball']  = $get_postjoball;
		$data['view_file']  = "reviewandpropos";
		$this->template->load_front_home_template($data);		
	}
	public function bidposts()
	{
		if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
		{
			$get_bidsubmit = $this->bids_model->get_bidsubmit($this->session->userdata('id_user_master'));
			$get_bidjoballpaid = $this->bids_model->get_bidjoballpaid($this->session->userdata('id_user_master'));

			$data['base_url'] = base_url();
			$data['current_menu']  = "job";
			$data['get_bidjoballpaid']  =   $get_bidsubmit;

			$data['sub_menu']  = "job";
			$data['view_file']  = "jobbids";
			$this->template->load_front_home_template($data);		
		}	
		else
		{
			redirect('home');
		}
	}
	public function manage_jobbid()
	{
			if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
			{
				$get_bidjoballpaid = $this->bids_model->get_bidjobonly($this->session->userdata('id_user_master'));
				
				$get_bidsubmit = $this->bids_model->get_bidsubmit($this->session->userdata('id_user_master'));
				$get_submitacit = $this->bids_model->get_submitacit($this->session->userdata('id_user_master'));
				$get_completed = $this->bids_model->get_completed($this->session->userdata('id_user_master'));
				$data['base_url'] = base_url();
				$data['get_bid_job']  =   $get_bidjoballpaid;
				$data['get_bidjoballpaid']  =   $get_bidsubmit;
				$data['get_award']  = $get_submitacit;
				$data['get_completed']  = $get_completed;
				$data['current_menu']  = "job";
				$data['sub_menu']  = "job";
				$data['view_file']  = "managebids";
				$this->template->load_front_home_template($data);		
			}
			else
			{
				redirect('home');

			}
	}
	
	public function send_proposals()
	{
			if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        =  '*';
				$config['overwrite'] = TRUE;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$this->load->library('upload',$config);
				if ( ! $this->upload->do_upload('proposal_files')) 
					{
						$error = array('error' => $this->upload->display_errors());
						$proposal_files = "";
					}
				else
				{
					$proposal_files = array('upload_data' => $this->upload->data());
				}
					$proposal_filesdata = $proposal_files != "" ? $proposal_files["upload_data"]['file_name'] :  "";
					$notifyme = (!empty($this->input->post('notifyme'))) ? $this->input->post('notifyme') :  "";
					$datasendprodata =	array('proposal_detail' => $this->input->post('proposal_detail'),'proposal_file' => $proposal_filesdata,'notifyme' =>$notifyme, 'comp_id' =>$this->input->post('comuser_id') ,'proposproj_id' => $this->input->post('job_id'),'proposuser_id' =>$this->session->userdata('id_user_master'),'status' => 1);
					$datasendpro =	array('pro_id' => $this->input->post('job_id'),'user_id' =>$this->session->userdata('id_user_master'));
						
					$pro_id =	array('po_id' => $this->input->post('job_id'));
					$this->bids_model->insert_sendproposal($datasendprodata);
					$this->postjob_model->update_sendproposal($datasendpro,array('status' => '2'));
					$this->postjob_model->update_postproposal($pro_id,array('job_status' => '2'));
					redirect('bids/select_job/'.$this->input->post('job_id'));
			}
			else
				{
				redirect('home');
				}
	}
	public function select_job($postjob = 0 )
	{
		
		$user_id = $this->session->userdata('id_user_master');
		
		$data['user_information']  = $this->users_model->getUserBasicDetails(array('id_user_master'=>$user_id),'',array('image'=>TRUE));
				
		$data['profile_user']  = $this->users_model->profile_user($user_id);
		
		$user_id = $this->session->userdata('id_user_master');

		$data['datadetailpayment']  = $this->postjob_model->payment_info($postjob,$user_id);
		
		$data['proct_compl']  = $this->postjob_model->proct_compl($postjob,$user_id);
						

		$data['getrating'] = $this->users_model->get_ratingjob(array('comid' => $user_id,'po_id' => $postjob));
		
		$data['get_subscription_package']  = $this->packages_model->get_subscription_package($user_id);
			
		$data['base_url'] = base_url();
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['postjobid']  = $postjob;
		$data['view_file']  = "select_job";
		$data['get_job']  = $this->postjob_model->get_job($postjob);
		//~ print_r($data['get_job']->joblocation );
		//~ exit;
		if(!empty($data['get_job'] ))
		{
		$city = $data['get_job']->joblocation;

		//~ joblocation city zipcode
		$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&address="'.urlencode($city).'&sensor=false');

		
		$data['latitude'] = json_decode($geocode)->results[0]->geometry->location->lat;
		$data['longitude'] = json_decode($geocode)->results[0]->geometry->location->lng;

		$this->template->load_front_home_template($data);	
		}
		else
		{
			redirect('bids/find_job');
		}
	}
	  

	
	public function save_select_job()
	{ 
		
		
			if(!empty($this->session->userdata('user_type_fr')))
			{
			if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
				{ 

					$check_bidins = $this->postjob_model->check_bidins($this->session->userdata('id_user_master'),$this->input->post('post'));
					$get_subscription_package = 
					$this->packages_model->get_subscription_package($this->session->userdata('id_user_master'));
					
					if(!empty($get_subscription_package))
						{
							if(empty($check_bidins ))
								{
									$price= 5;
									$data = array(
									'user_id'=>$this->session->userdata('id_user_master'),
									'com_id	'=> $this->input->post('company'),
									'pro_id'=> $this->input->post('post'),
									'status'=> '1',
									'price'=> $price);
									$package_id = $get_subscription_package->id;
									$package_count = $get_subscription_package->package_count - 1;
									$status = $package_count == 0 ? '3' : '1';
									$data_pkg = array( 
									'package_count'=>$package_count,
									'status	'=> $status);
									$package = $this->packages_model->update_jobbid($data_pkg,$package_id);
									$last_insert_id = $this->postjob_model->insert_selectjob($data);
								if(!empty($last_insert_id))
									{		
										if($lastid){           

											$this->load->library('email');
											$subject = 'Successfully Bidded Job | Satety Engagement';
											$message = '<p>Thank you for Bidded job by Safety Engagement.</p>';
											// Get full html:
											$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
											<html xmlns="http://www.w3.org/1999/xhtml">
											<head>
											<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
											<title>' . html_escape($subject) . '</title>
											<style type="text/css">
											body {
											font-family: Arial, Verdana, Helvetica, sans-serif;
											font-size: 16px;
											}
											</style>
											</head>
											<body>
											' . $message . '
											</body>
											</html>';
											$result = $this->email
											->from('test.stallioni@gmail.com')
											->reply_to('test.stallioni@gmail.com')    // Optional, an account where a human being reads.
											->to($this->input->post('applyuser'))
											->subject($subject)
											->message($body)
											->send();

											if($result == true)
											{			
												print json_encode(array('status'=>'success'));
											}
											else
											{
												print json_encode(array('status'=>'failed'));
											}
										}
										else
										{
											print json_encode(array('status'=>'failed'));
										}	
										redirect(base_url()."bids/select_job/".$this->input->post('post'));
									}
								else
									{
										$this->session->set_flashdata('showpopup',$last_insert_id);
										redirect('bids/select_job/'.$this->input->post('post')); 
									} 
								}
							else
								{
									redirect(base_url()."bids/select_job/".$check_bidins->id);
								}
						}
					else
						{
							$this->session->set_flashdata('showpopup','Product is Successfully Inserted');
							redirect('bids/select_job/'.$this->input->post('post')); 
						}	
				}
			else
				{
					redirect('package');	
				}
		}
		else
		{
				
				
			$this->session->set_flashdata('showpopup','Product is Successfully Inserted');
							redirect('bids/select_job/'.$this->input->post('post')); 
			}
	}

	
	public function payment_selectjob($last_insert_id = 0)
	{
		if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
		{
		$data['getbidjobdata'] = $this->postjob_model->getbidjobdata($last_insert_id);
		
		$data['base_url'] = base_url();
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "bid_job";
		$this->template->load_front_home_template($data);		
		}
			else
		{
			redirect('home');
		}
	}
	public function multiuplodall()
	{
	 
	  if($_FILES["files"]["name"] != '')
			{ 
			  
			   $output = array();
			   $config["upload_path"] = './uploads/';
				$config['allowed_types'] = '*';
			   $config['overwrite'] = TRUE;

			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
			   {
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if($this->upload->do_upload('file'))
				{
				 				$config = array();
								$data = array('upload_data' => $this->upload->data());
								$config['image_library'] = 'gd2';
								$config['source_image'] = './uploads/'.$data['upload_data']['file_name'];
								$config['maintain_ratio'] = TRUE;
								//~ $config['width']         = 1050;
								//~ $config['height']       = 500;

								$this->load->library('image_lib', $config);
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								$this->image_lib->clear();
								$config = array();
								 //~ $data = $this->upload->data();
				 $output[] = $data['upload_data']["file_name"];
				}
			   }
			echo json_encode($output);   
			  
			  }
	}

	public function stripe_payment()
	{
		
		$token  = $this->input->post('stripeToken');
		$itemNumber  = $this->input->post('pro_id');
		$pro_amt1  = $this->input->post('pro_amt');
		$pro_pid  = $this->input->post('pro_pid');
		$pro_amt = round($pro_amt1);
			if($token !='')
				{

				//include Stripe PHP library
					require_once(APPPATH.'libraries/stripe/init.php');
					
					//set api key
					$stripe = array(
					  "secret_key"      => "sk_test_oreX4gPVvkYgx26g0KsjMCiE",
					  "publishable_key" => "pk_test_XCYqdDIIwJWQ1JJ7OQqo4ptl"
					);
				   
					// echo "666666666666";
					// echo $stripe['secret_key'];
					\Stripe\Stripe::setApiKey($stripe['secret_key']);
					
					 //add customer to stripe
					$customer = \Stripe\Customer::create(array(
						'email' => $this->session->userdata('email'),
						'source'  => $token
					));
				  
					//item information
					$itemName = "package";
					$itemPrice = $pro_amt* 100;
					$currency = "USD";
					
					 $charge = \Stripe\Charge::create(array(
						'customer' => $customer->id,
						'amount'   => $itemPrice,
						'currency' => $currency,
						'description' => $itemName,
						
					));
								  
				$chargeJson = $charge->jsonSerialize();
				 if(!empty($chargeJson))
					{
						  if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
						{ 
							
						$amount = $chargeJson['amount'];
						$balance_transaction = $chargeJson['balance_transaction'];
						$charge_id = $chargeJson['id'];
						$currency = $chargeJson['currency'];
						$status = $chargeJson['status'];
						$date = date("Y-m-d H:i:s");
							 //if order inserted successfully
							if($status == 'succeeded')
							{
								// echo 'transaction succeeded';
								

									$data = array(
											'status' => 1,
											'cc' =>  $currency,
											'st' => 'Completed',
											'paytax' => $balance_transaction
									);
									
					$updatesucess =$this->postjob_model->updatebitspaymentstatus($itemNumber,$data);

					//$this->session->set_flashdata('flash_message' , get_phrase('The transaction was successful'));
					redirect(BASE_URL . '/bids/select_job/'.$pro_pid.'' , 'refresh');
									// echo print_r($_POST);
									// exit();
								
							}
							else
							{
									$data = array(
											'status' => 4,
											'modified_on' => $date,
									);
									//$this->session->set_flashdata('flash_message' , get_phrase('Transaction has been failed'));
					redirect(BASE_URL . '/bids/select_job/' , 'refresh');
							}
						}
						else
						{
							$data = array(
								'status' => 4,
								'modified_on' => $date,
						);
						
						//$this->session->set_flashdata('flash_message' , get_phrase('Transaction has been failed'));
					redirect(BASE_URL . '/bids/select_job/' , 'refresh');
						}
					}
					else
					{
						$data = array(
								'status' => 4,
								'modified_on' => $date,
						);
						
						//$this->session->set_flashdata('flash_message' , get_phrase('Transaction has been failed'));
					redirect(BASE_URL . '/bids/select_job/' , 'refresh');

					}	
					
					
					

				}
				else
				{
						//$this->session->set_flashdata('error_message' , get_phrase('Form submission error.......'));
					redirect(BASE_URL . '/bids/select_job/'.$itemNumber.'' , 'refresh');
				}
	}
	public function expired()
	{
		
		$p_id = explode("_",$this->input->post('proid'));
		
		
		$data = array('job_status' => 4);
		$expired = $this->postjob_model->update_expired($p_id['1'],$data);
		
		if($expired == false)
		{
			echo 'false';
		}
		else{
			 echo 'true';

			}
		
	}
	public function completejob($poid= "")
	{

	$completeupd = $this->postjob_model->update_completejob($poid);
	$completeupdas = $this->postjob_model->update_completeproposal($poid,$uid);
	
	redirect('job/jobposts');
	}
	
}
