<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller

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
		$this->load->model('purchaseorder_model');
		$this->load->model('postjob_model');
		$this->load->model('bids_model');
		$this->load->model('message_model');
		$this->load->model('UserModel');
		$this->load->model('OuthModel');
		}

	public	function index()
		{

		if($this->session->userdata('id_user_master'))
		{
			$get_postjoball = $this->postjob_model->get_postjoball();
			$data['base_url'] = base_url();
			$data['view_file'] = "home_view";
			$data['get_postjoball'] = $get_postjoball;
			$data['current_menu'] = "home";
			$data['sub_menu'] = "";
			$data['category_details'] = $this->task_model->get_task_details();
			$this->template->load_front_home_template($data);

		}else
		{
			$this->session->set_flashdata('showpopup','Product is Successfully Inserted');
			$get_postjoball = $this->postjob_model->get_postjoball();
			$data['base_url'] = base_url();
			$data['view_file'] = "home_view";
			$data['get_postjoball'] = $get_postjoball;
			$data['current_menu'] = "home";
			$data['sub_menu'] = "";
			$data['category_details'] = $this->task_model->get_task_details();
			$this->template->load_front_home_template($data);
		}
		}

	public	function contact_us()
		{
			$data['base_url'] = base_url();
			$data['current_menu'] = "contact_us";
			$data['sub_menu'] = "";
			$data['view_file'] = "contact_us";
			$this->template->load_front_home_template($data);
		}

	public	function thankyou()
		{
			$paystatus = ($this->input->get('st') == 'Completed') ? 1 : 0;
			$uptdata = array(
				"cc" => $this->input->get('cc') ,
				"st" => $this->input->get('st') ,
				"paytax" => $this->input->get('tx') ,
				"status" => '1'
			);
			$updatesucess = $this->postjob_model->updatepaymentstatus($this->input->get('cm') , $uptdata);
			if ($updatesucess != false)
			{
				$data['base_url'] = base_url();
				$data['current_menu'] = "thankyou";
				$data['sub_menu'] = "";
				$data['postpoid'] = $this->input->get('cm');
				$data['view_file'] = "thankyou";
				$this->template->load_front_home_template($data);
			}
		  else
			{
				redirect('home');
			}
		}

	public	function thankyou_postjob()
		{
			$checkpaidorunpaid = $this->postjob_model->getpostjobdata($this->input->get('cm'));
			if ($checkpaidorunpaid->job_status == 1)
			{
				$paystatus = ($this->input->get('st') == 'Completed') ? 2 : 1;
				$uptdata = array(
					"job_status" => $paystatus,
					"cc" => $this->input->get('cc') ,
					"st" => $this->input->get('st') ,
					"paytax" => $this->input->get('tx')
				);
				$updatesucess = $this->postjob_model->updatepostpaymentstatus($this->input->get('cm') , $uptdata);
			if ($updatesucess != false)
			{
				$data['base_url'] = base_url();
				$data['current_menu'] = "thankyou";
				$data['sub_menu'] = "";
				$data['view_file'] = "thankyou_cp";
				$this->template->load_front_home_template($data);
			}
		  else
			{
			redirect('home');
			}
			}
		  else
			{
			redirect('home');
			}
		}

	public	function view_job()
		{
			$data['base_url'] = base_url();
			$data['current_menu'] = "job";
			$data['sub_menu'] = "";
			$data['view_file'] = "view_job";
			$this->template->load_front_home_template($data);
		}

	public	function about_us()
		{
			$data['base_url'] = base_url();
			$data['current_menu'] = "about_us";
			$data['sub_menu'] = "";
			$data['view_file'] = "about_us";
			$this->template->load_front_home_template($data);
		}

	public	function profile_new()
		{
		if ($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
		{
			$data['strTitle'] = '';
			$data['strsubTitle'] = '';
			$list = [];
			if ($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student')
			{
				$list = $this->UserModel->VendorsList();
				$data['strTitle'] = 'All Vendors';
				$data['strsubTitle'] = 'Vendors';
				$data['chatTitle'] = 'Select Vendor with Chat';
			}

			$vendorslist = [];
			foreach($list as $u)
			{
				$vendorslist[] = ['id' => $this->OuthModel->Encryptor('encrypt', $u['id']) , 'name' => $u['name'], 'picture_url' => $this->UserModel->PictureUrlById($u['id']) , ];
			}

			$data['vendorslist'] = $vendorslist;
			$user_id = $this->session->userdata('id_user_master');
			$get_bidjoballpaid = $this->bids_model->get_bidjoballpaid($user_id);
			$get_bidsubmit = $this->bids_model->get_bidsubmit($user_id);
			$get_submitacit = $this->bids_model->get_submitacit($user_id);
			$get_completed = $this->bids_model->get_completed($user_id);
			$data['base_url'] = base_url();
			$data['current_menu'] = "profile";
			$data['sub_menu'] = "profile";
			$data['view_file'] = "newprofile";
			$data['get_bidjoballpaid'] = $get_bidsubmit;
			$data['get_award'] = $get_submitacit;
			$data['get_completed'] = $get_completed;
			$data['get_rating'] = $this->bids_model->get_rating($user_id);
			$data['list_of_users'] = $this->users_model->get_singleuser_list($user_id);
			$data['usercontractor'] = $this->users_model->get_alltaskcategory();
			$data['sfprofess'] = $this->users_model->compprofess();
			$msg = $this->message_model;
			$data['recordinbx'] = $msg->get_messages();
			if (!$data['recordinbx'])
				{
				$data['nodatainbx'] = TRUE;
				}

			$data['contactsinbx'] = $msg->get_contacts();
			$data['record'] = $msg->get_messages_sent();
			if (!$data['record'])
				{
				$data['nodata'] = TRUE;
				}

			$data['contacts'] = $msg->get_contacts();
			$data['user_information'] = $this->users_model->getUserBasicDetails(array(
				'id_user_master' => $user_id
			) , '', array(
				'image' => TRUE
			));

			// echo $this->db->last_query();

			$this->template->load_front_home_template($data);
			}
		  else
			{
				redirect('home');
			}
		}

	public	function company_profile()
	{
		if ($this->session->userdata('user_type_fr') == 'company')
		{
			$user_id = $this->session->userdata('id_user_master');

			// ~ $get_postproposals = $this->postjob_model->get_postproposals($this->session->userdata('id_user_master'));
			// ~ $get_postjoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));

			$get_postjoball = $this->postjob_model->get_postjoballpaid();
			$get_postmanagejoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
			$get_postjobpaiduser = $this->postjob_model->get_postjobpaiduser($this->session->userdata('id_user_master'));
			$get_postjoballpaidproposal = $this->postjob_model->get_postprosalposttable($this->session->userdata('id_user_master'));

			// ~ $get_postjoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));

			$get_postproposals = $this->postjob_model->get_postproposals($this->session->userdata('id_user_master'));
			$get_postmanagejoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
			$data['base_url'] = base_url();
			$data['current_menu'] = "profile";
			$data['sub_menu'] = "profile";
			$data['view_file'] = "company_profile";
			$data['get_postjoball'] = $get_postmanagejoball;
			$data['get_postmanagejoball'] = $get_postmanagejoball;
			$data['get_postjobpaiduser'] = $get_postjobpaiduser;
			$data['get_postproposals'] = $get_postproposals;
			$data['get_postjoballpaidproposal'] = $get_postjoballpaidproposal;
			$data['get_postprosalposttableallstatus'] = $this->postjob_model->get_postprosalposttableallstatus($this->session->userdata('id_user_master'));
			$data['get_postawardedtable'] = $this->postjob_model->get_postawardedtable($this->session->userdata('id_user_master'));
			$data['get_postjobcompletedtable'] = $this->postjob_model->get_postjobcompletedtable($this->session->userdata('id_user_master'));
			$data['get_postjobexpired'] = $this->postjob_model->get_postjobexpired($this->session->userdata('id_user_master'));
			$data['list_of_users'] = $this->users_model->get_singleuser_list($user_id);
			$data['usercontractor'] = $this->users_model->get_alltaskcategory();
			$data['sfprofess'] = $this->users_model->sfprofess();
			$data['get_bidjoballpaid'] = $this->bids_model->get_bidjoballpaidcom($user_id);
			$data['user_information'] = $this->users_model->getUserBasicDetails(array(
				'id_user_master' => $user_id
			) , '', array(
				'image' => TRUE
			));

			// echo $this->db->last_query();

			$msg = $this->message_model;
			$data['recordinbx'] = $msg->get_messages();
			if (!$data['recordinbx'])
				{
				$data['nodatainbx'] = TRUE;
				}

			$data['contactsinbx'] = $msg->get_contacts();
			$data['record'] = $msg->get_messages_sent();
			if (!$data['record'])
				{
				$data['nodata'] = TRUE;
				}

			$data['contacts'] = $msg->get_contacts();
			$this->template->load_front_home_template($data);
		}
	  else
		{
			redirect('home');
		}
	}

	public	function my_account()
		{
		$user_id = $this->session->userdata('id_user_master');
		if ($user_id != '')
			{
			$data['base_url'] = base_url();
			$data['current_menu'] = "profile";
			$data['sub_menu'] = "";
			$data['view_file'] = "my_account";
			$data['profile_details'] = $this->users_model->get_profile_details($user_id);

			// $this->template->load_front_template($data);

			$this->template->load_front_home_template($data);
			}
		  else
			{
			redirect('Home');
			}
		}

	public	function send_contactus()
		{
		$from = "test.stallioni@gmail.com"; //senders email address
		$subject = 'email address'; //email subject

		// sending confirmEmail($receiver) function calling link to the user, inside message body

		$message = $this->input->post('comments');

		// config email settings

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		// send email

		$this->email->from($this->input->post('contact_email'));
		$this->email->to($from);
		$this->email->subject($this->input->post('subject'));
		$this->email->message($message);
		$this->email->send();
		echo '1';
		}

	public	function logout()
		{
		if ($this->session->has_userdata('id_user_master'))
			{
			if ($this->session->has_userdata('user_type_fr') == 'contractor' || $this->session->has_userdata('user_type_fr') == 'application_user')
				{
				$this->session->unset_userdata('id_user_master');
				$this->session->unset_userdata('user_type_fr');

				// ~ $this->session->sess_destroy();
				// ~ //unset($_SESSION['user_data']);

				redirect('Home');
				}
			}
		}

	public	function privacypolicy()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "privacypolicy";
		$data['sub_menu'] = "";
		$data['view_file'] = "privacypolicy";
		$data['category_details'] = $this->task_model->get_task_details();
		$data['get_apartment'] = $this->property_model->getproperty_curruserlist_($this->session->userdata('id_user_master'));
		$this->template->load_front_home_template($data);
		}

	public	function termsofservice()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "termsofservice";
		$data['sub_menu'] = "";
		$data['view_file'] = "termsofservice";
		$data['category_details'] = $this->task_model->get_task_details();
		$data['get_apartment'] = $this->property_model->getproperty_curruserlist_($this->session->userdata('id_user_master'));
		$this->template->load_front_home_template($data);
		}

	public	function how_it_works()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "how_it_works";
		$data['sub_menu'] = "";
		$data['view_file'] = "how_it_works";
		$this->template->load_front_home_template($data);
		}

	public	function letstalk()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "how_it_works";
		$data['sub_menu'] = "";
		$data['view_file'] = "letstalk";
		$this->template->load_front_home_template($data);
		}

	public	function emailus()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "how_it_works";
		$data['sub_menu'] = "";
		$data['view_file'] = "emailus";
		$this->template->load_front_home_template($data);
		}

	public	function history()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "how_it_works";
		$data['sub_menu'] = "";
		$data['view_file'] = "history";
		$this->template->load_front_home_template($data);
		}

	public	function industrieswecover()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "how_it_works";
		$data['sub_menu'] = "";
		$data['view_file'] = "industrieswecover";
		$this->template->load_front_home_template($data);
		}

	public	function engagement()
		{
		$data['base_url'] = base_url();
		$data['current_menu'] = "engagement";
		$data['sub_menu'] = "";
		$data['view_file'] = "industrieswecover";
		$this->template->load_front_home_template($data);
		}

	public	function profile($userid = 0, $poid = 0, $statusid = 0)
		{
		$user_id = $this->session->userdata('id_user_master');

		$data['user_information'] = $this->users_model->getUserBasicDetails(array(
			'id_user_master' => $user_id
		) , '', array(
			'image' => TRUE
		));
		if (!empty($userid) && !empty($poid))
			{
			$getrating = $this->users_model->get_rating(array(
				'comid' => $user_id,
				'userid' => $userid,
				'po_id' => $poid
			));
				$getawardedprojstatus = $this->postjob_model->getawardedprojstatus($poid);
			if(!empty($getawardedprojstatus))
			{
				$data['getawardedprojstatus'] = $getawardedprojstatus;
			}
			else
			{
				redirect('home');
			}
			$data['getrating'] = !empty($getrating) ? $getrating : '';
			$data['profile_user'] = $this->users_model->profile_user($userid);
			$data['poid'] = $poid;	
			$data['statusid'] = $statusid;
		
			
			$data['getawardedprojstatusawared'] = $this->postjob_model->getawardedprojstatusawared($userid, $poid);
			$data['base_url'] = base_url();
			$data['current_menu'] = "profile";
			$data['sub_menu'] = "profile";
			$data['view_file'] = "view_profile";
			$this->template->load_front_home_template($data);
			}
		  else
			{
			$this->session->set_flashdata('showpopup', 'Product is Successfully Inserted');
			redirect('home');
			}
		}

	public	function sendmail()
		{

		// print_r($this->input->post());

		$this->load->library('email');
		$subject = 'Contact Us | Satety Engagement';
		$message = $this->input->post('subject');

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
					<p>' . $message . '</p>
					</body>
					</html>';
		$result = $this->email->from($this->input->post('email'))->reply_to($this->input->post('email')) // Optional, an account where a human being reads.
		->to('test.stallioni@gmail.com')->subject($subject)->message($body)->send();
		if ($result == true)
			{
			print json_encode(array(
				'status' => 'success'
			));
			}
		  else
			{
			print json_encode(array(
				'status' => 'failed'
			));
			}

		redirect('home/about_us');
		}
	}
