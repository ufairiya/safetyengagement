<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
		$this->load->model('prices_model');
		$this->load->model('packages_model');
		$this->load->model('postjob_model');
		$this->load->model('bids_model');
		$this->load->model('property_model');
		$this->load->model('task_model');
		$this->load->model('users_model');
		$this->load->model('purchaseorder_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');
	}
	public function index()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "packages/packages";
			$data['current_menu']  = "appointment";			
			$data['get_packages_list']  = $this->packages_model->get_packages_list();
			$this->template->load_frontend_template($data);		
	}

	public function bidjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/bidjob_list";
			$data['current_menu']  = "bidpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allbidjob();
			$this->template->load_frontend_template($data);		
	}
	public function postjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/postjob_list";
			$data['current_menu']  = "jobpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allpostjob();
			$this->template->load_frontend_template($data);		
	}
	public function awardedjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/awardedjob_list";
			$data['current_menu']  = "awardedpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allawardedjob(); 
			$this->template->load_frontend_template($data);		
	}
	public function completedjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/completedjob_list";
			$data['current_menu']  = "completedpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allcompletedjob();
			$this->template->load_frontend_template($data);		
	}
	public function addjob()
	{
		    //~ $data['base_url'] = base_url();
			//~ $data['view_file']  = "job/addjob";
			//~ $data['current_menu']  = "addjob";			
			//~ $this->template->load_front_home_template($data);
			$data['base_url'] = base_url();
			$data['current_menu']  = "job";
			$data['sub_menu']  = "addjob";
			$data['view_file']  = "job/addjob";
			$this->template->load_frontend_template($data);		
				
	}
		public function save_post_job()
	{  
	


			$config['upload_path']          = './uploads/';
			$config['allowed_types']        =  '*';
			$config['overwrite'] = TRUE;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload',$config);

			if ( ! $this->upload->do_upload('detailed_pic')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file1 = "";
			}
			else
			{
				$file1 = array('upload_data' => $this->upload->data());

			}
			if ( ! $this->upload->do_upload('equipment_pic')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file2 = "";
			}
			else
			{
				$file2 = array('upload_data' => $this->upload->data());
			}

			if ( ! $this->upload->do_upload('finalrep_pic')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file3 = "";
			}
			else
			{
				$file3 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('project_pic')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file4 = "";
			}
			else
			{
				$file4 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('certificates_pic')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file5 = "";
			}
			else
			{
				$file5 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('insurance_certificate')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file6 = "";
			}
			else
			{
				$file6 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('budget_img')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file7 = "";
			}
			else
			{
				$file7 = array('upload_data' => $this->upload->data());
			}
			
		if ( ! empty($_FILES['job_file']['name']))
		{
		$name_array = array();
		foreach($_FILES as $key=>$value)
			{
		
			$count = count($_FILES['job_file']['size']);
				for($s=0; $s<=$count-1; $s++) 
				{
					$_FILES['job_file']['name']=$value['name'][$s];
					$_FILES['job_file']['type']    = $value['type'][$s];
					$_FILES['job_file']['tmp_name'] = $value['tmp_name'][$s];
					$_FILES['job_file']['error']       = $value['error'][$s];
					$_FILES['job_file']['size']    = $value['size'][$s];   
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']    = '100';
					//~ $config['max_width']  = '1024';
					//~ $config['max_height']  = '768';
					$this->load->library('upload', $config);
					$this->upload->do_upload();
					$data = $this->upload->data();
					$name_array[] = $data['file_name'];
				}
			}																												
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
            $file8="";
		}
		
			$file_p1 = $file1 != "" ? $file1["upload_data"]['file_name'] :  "";
			$file_p2 = $file2 != "" ? $file2["upload_data"]['file_name'] :  "";
			$file_p3 = $file3 != "" ? $file3["upload_data"]['file_name'] :  "";
			$file_p4 = $file4 != "" ? $file4["upload_data"]['file_name'] :  "";
			$file_p5 = $file5 != "" ? $file5["upload_data"]['file_name'] :  "";
			$file_p6 = $file6 != "" ? $file6["upload_data"]['file_name'] :  "";
			$file_p7 = $file7 != "" ? $file7["upload_data"]['file_name'] :  "";
			$file_p8 = !empty($name_array) ? $name_array :  "";
			
						$hourorfix = !empty($this->input->post('hourorfix')) ? $this->input->post('hourorfix') :  "";

			$internship = (!empty($this->input->post('internship')) && $this->input->post('internship') == 'internship') ? $this->input->post('internship') : '' ;
			$insurance = (!empty($this->input->post('insurance'))) ? $this->input->post('insurance') : '' ;
			$thirdpartapprov = (!empty($this->input->post('thirdpartapprov'))) ? $this->input->post('thirdpartapprov') : '' ;
			$othertxt = $this->input->post('thirdpartapprov') == 4 ? $this->input->post('othertxt') : '' ;
			$industry_c = (!empty($this->input->post('se_industry')))? $this->input->post('se_industry') : $this->input->post('industry');
			$postjobdata = array('job_title'=>$this->input->post('job_title'),'highleveljobdesc'=>$this->input->post('highleveljobdesc'),'job_description'=>$this->input->post('job_description'),'equipment'=>$this->input->post('equipment'),'finalrep'=>$this->input->post('finalrep'),'industry'=>$industry_c,'internship'=>$internship,'project'=>$this->input->post('project'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'),'jobemergency'=>$this->input->post('jobemergency'),'worktype_desc'=>json_encode($this->input->post('worktype_desc')),'explevel1'=>$this->input->post('explevel1'),'thirdpartapprov'=>$thirdpartapprov,'thirdpartother'=>$othertxt,'joblocation'=>$this->input->post('joblocation'),'insurance'=>$this->input->post('jobinsurence'),'job3party'=>$this->input->post('job3party'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'zipcode'=>$this->input->post('zipcode'),'insurance'=>$insurance,'hourorfix'=>$hourorfix,'budget'=>$this->input->post('budget'),'detailed_pic'=>$file_p1,'equipment_pic'=>$file_p2,'finalrep_pic'=>$file_p3,'project_pic'=>$file_p4,'certificates_pic'=>$file_p5,'insurance_certificate'=>$file_p6,'budget_img'=>$file_p7,'job_file'=>json_encode($file_p8),'posteddate'=>date('m/d/Y h:i:s A'),'company_userid'=>$this->session->userdata('id_user_master'),'job_status'=>"2");
			

			
			$last_insert_id = $this->postjob_model->insert_postjob($postjobdata);
		if(!empty($last_insert_id))
		{			
			redirect(base_url()."job/payment_postjob/".$last_insert_id);

		}
		else
		{
			redirect('job');
		}
	}
}
