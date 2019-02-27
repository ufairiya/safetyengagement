<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	
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
		$this->load->model('users_model');
			if($this->session->userdata('user_type_fr') == 'company')
			{
				return true;
			}
			else
			{
				redirect('home');
			}
	}
	public function index()
	{
		if($this->session->userdata('user_type_fr') == 'company')
			{
				$data['base_url'] = base_url();
				$data['current_menu']  = "job";
				$data['sub_menu']  = "job";
				$data['view_file']  = "post_job";
				$this->template->load_front_home_template($data);	
			}	
		else
			{
				
				
				$this->session->set_flashdata('showpopup','Product is Successfully Inserted');
				redirect('home');
			}	

	}
	public function payment_postjob($last_insert_id = 0)
	{
		if($this->session->userdata('user_type_fr') == 'company')
			{	
			$getcompanypostdata = $this->postjob_model->getcompanypostdata($last_insert_id);
					$data['get_job']  = $this->postjob_model->get_job($last_insert_id);

			$data['base_url'] = base_url();
			$data['getcompanypostdata']  = $getcompanypostdata;
			$data['current_menu']  = "job";
			$data['sub_menu']  = "job";
			$data['view_file']  = "view_job";
			$this->template->load_front_home_template($data);
		}	
		else
		{
			redirect('home');
		}	
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
			$industry_c = (!empty($this->input->post('se_industry')))? $this->input->post('se_industry') : $this->input->post('industry');
			$postjobdata = array('job_title'=>$this->input->post('job_title'),'highleveljobdesc'=>$this->input->post('highleveljobdesc'),'job_description'=>$this->input->post('job_description'),'equipment'=>$this->input->post('equipment'),'finalrep'=>$this->input->post('finalrep'),'industry'=>$industry_c,'internship'=>$internship,'project'=>$this->input->post('project'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'),'jobemergency'=>$this->input->post('jobemergency'),'worktype_desc'=>json_encode($this->input->post('worktype_desc')),'explevel1'=>$this->input->post('explevel1'),'thirdpartapprov'=>$thirdpartapprov,'joblocation'=>$this->input->post('joblocation'),'insurance'=>$this->input->post('jobinsurence'),'job3party'=>$this->input->post('job3party'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'zipcode'=>$this->input->post('zipcode'),'insurance'=>$insurance,'hourorfix'=>$hourorfix,'budget'=>$this->input->post('budget'),'detailed_pic'=>$file_p1,'equipment_pic'=>$file_p2,'finalrep_pic'=>$file_p3,'project_pic'=>$file_p4,'certificates_pic'=>$file_p5,'insurance_certificate'=>$file_p6,'budget_img'=>$file_p7,'job_file'=>json_encode($file_p8),'posteddate'=>date('m/d/Y h:i:s A'),'company_userid'=>$this->session->userdata('id_user_master'),'job_status'=>"2");
			
			
			
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
	public function re_post_job()
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
			$internship = (!empty($this->input->post('internship')) && $this->input->post('internship') == 'internship') ? $this->input->post('internship') : '' ;
			$insurance = (!empty($this->input->post('insurance'))) ? $this->input->post('insurance') : '' ;
			$thirdpartapprov = (!empty($this->input->post('thirdpartapprov'))) ? $this->input->post('thirdpartapprov') : '' ;
			$postjobdata = array('job_title'=>$this->input->post('job_title'),'highleveljobdesc'=>$this->input->post('highleveljobdesc'),'job_description'=>$this->input->post('job_description'),'equipment'=>$this->input->post('equipment'),'finalrep'=>$this->input->post('finalrep'),'information'=>$this->input->post('information'),'industry'=>$this->input->post('industry'),'internship'=>$internship,'project'=>$this->input->post('project'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'),'jobemergency'=>$this->input->post('jobemergency'),'worktype_desc'=>json_encode($this->input->post('worktype_desc')),'explevel1'=>$this->input->post('explevel1'),'thirdpartapprov'=>$thirdpartapprov,'joblocation'=>$this->input->post('joblocation'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'zipcode'=>$this->input->post('zipcode'),'insurance'=>$insurance,'hourorfix'=>$this->input->post('hourorfix'),'budget'=>$this->input->post('budget'),'detailed_pic'=>implode(",",array_filter($detailed_p)),'equipment_pic'=>implode(",",array_filter($equipment_p)),'finalrep_pic'=>implode(",",array_filter($finalrep_p)),'project_pic'=>implode(",",array_filter($project_p)),'certificates_pic'=>implode(",",array_filter($certificates_p)),'insurance_certificate'=>implode(",",array_filter($insurance_c)),'budget_img'=>implode(",",array_filter($budget_p)),'job_file'=>json_encode(explode(",",$this->input->post('files_pic'))),'posteddate'=>date('m/d/Y h:i:s A'),'company_userid'=>$this->session->userdata('id_user_master'),'job_status'=>"2");
			//~ $postjobdata = array('posteddate'=>date('m/d/Y h:i:s A'),'job_status'=>"2");
			$last_insert_id = $this->postjob_model->update_repostjob($this->input->post('job_id'),$postjobdata);
		if(!empty($last_insert_id))
		{			
			redirect(base_url()."job/payment_postjob/".$last_insert_id);
		}
		else
		{
			redirect('job');
		}
	}
	
	public function update_post_job()
	{  
		//~ print_r(DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, "PT"));

		

//~ $dt = new DateTime();
//~ $tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

//~ $dt->setTimezone($tz);
//~ echo $dt->format('Y-m-d H:i:s');

//~ exit;
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        =  '*';
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload',$config);
			
			
			if ( ! $this->upload->do_upload('detailed_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file1 = array();

			}
			else
			{
				$file1 = array('upload_data' => $this->upload->data());
			}

			if ( ! $this->upload->do_upload('equipment_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file2 = array();
			}
			else
			{
				$file2 = array('upload_data' => $this->upload->data());
			}

			if ( ! $this->upload->do_upload('finalrep_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file3 = array();
			}
			else
			{
				$file3 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('project_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file4 = array();
			}
			else
			{
				$file4 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('certificates_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file5 = array();
			}
			else
			{
				$file5 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('insurance_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file6 = array();
			}
			else
			{
				$file6 = array('upload_data' => $this->upload->data());
			}
			if ( ! $this->upload->do_upload('budget_upload')) //just use your name here
			{
				$error = array('error' => $this->upload->display_errors());
				$file7 = array();
			}
			else
			{
				$file7 = array('upload_data' => $this->upload->data());
			}
		if ( ! empty($_FILES['job_file']['name']))
		{
				$this->load->library('upload');

		$name_array = array();
		foreach($_FILES as $valuedata)
			{
				
				if(!empty($valuedata['size']))
				{
				$count = count($valuedata['size']);
				
				for($sd=0; $sd<=$count-1; $sd++) 
				{ 
				
					$_FILES['name']     = $valuedata['name'][$sd];
					$_FILES['type']     = $valuedata['type'][$sd];
					$_FILES['tmp_name'] = $valuedata['tmp_name'][$sd];
					$_FILES['error']    = $valuedata['error'][$sd];
					$_FILES['size']     = $valuedata['size'][$sd];  
					
					 $this->upload->initialize($this->set_upload_options());
     
					
					$this->upload->do_upload();
					$data = $this->upload->data();
					$name_array[] = $data['file_name'];
					var_dump($data);

				}
			}																												
		}
	}
		else
		{
			$error = array('error' => $this->upload->display_errors());
            $file8=array();
		}
		//~ echo "<pre>";
		//~ var_dump($file1);
		//~ var_dump($file2);
		//~ var_dump($file3);
		//~ var_dump($file4);
		//~ var_dump($file5);
		//~ var_dump($file6);
		//~ var_dump($file7);
		//~ exit;
			$file_p1= (!empty($file1)) ? $file1["upload_data"]['file_name'] : ""  ;
			$file_p2 = (!empty($file2)) ? $file2["upload_data"]['file_name'] : "" ;
			$file_p3= (!empty($file3)) ? $file3["upload_data"]['file_name'] : "";
			$file_p4 = (!empty($file4)) ? $file4["upload_data"]['file_name'] : "";
			$file_p5 = (!empty($file5)) ? $file5["upload_data"]['file_name'] : "";
			$file_p6 = (!empty($file6)) ? $file6["upload_data"]['file_name'] : "" ;
			$file_p7 = (!empty($file7)) ? $file7["upload_data"]['file_name'] :  "";
			$file_p8 = (!empty($name_array)) ? $name_array :  "";
			
				//~ echo "<pre>";
		//~ var_dump($file1);
		//~ var_dump($file2);
		//~ var_dump($file3);
		//~ var_dump($file4);
		//~ var_dump($file5);
		//~ var_dump($file6);
		//~ var_dump($file7);
		//~ var_dump($file_p8);
		//~ exit;
			$detailed_picchk = (!empty($this->input->post('detailed_pic'))) ? $this->input->post('detailed_pic').',' :'';
			$equipment_picchk = (!empty($this->input->post('equipment_pic'))) ? $this->input->post('equipment_pic').',' :'';
			$finalrep_picchk = (!empty($this->input->post('finalrep_pic'))) ? $this->input->post('finalrep_pic').',' :'';
			$project_picchk = (!empty($this->input->post('project_pic'))) ? $this->input->post('project_pic').',' :'';
			$certificates_picchk = (!empty($this->input->post('certificates_pic'))) ? $this->input->post('certificates_pic').',' :'';
			$insurance_certificatechk = (!empty($this->input->post('insurance_certificate'))) ? $this->input->post('insurance_certificate').',' :'';
			$budget_picchk = (!empty($this->input->post('budget_pic'))) ? $this->input->post('budget_pic').',' :'';
			$detailed_pic  = $detailed_picchk.$file_p1;
			$equipment_pic  = $equipment_picchk.$file_p2;
			$finalrep_pic  = $finalrep_picchk.$file_p3;
			$project_pic  = $project_picchk.$file_p4;
			$certificates_pic  = $certificates_picchk.$file_p5;
			$insurance_certificate  = $insurance_certificatechk.$file_p6;
			$budget_pic  = $budget_picchk.$file_p7;
			$detailed_p = explode(",",$detailed_pic);
			$equipment_p = explode(",",$equipment_pic);
			$finalrep_p = explode(",",$finalrep_pic);
			$project_p = explode(",",$project_pic);
			$certificates_p = explode(",",$certificates_pic);
			$insurance_c =explode(",",$insurance_certificate);
			$budget_p = explode(",",$budget_pic);
			$internship = (!empty($this->input->post('internship')) && $this->input->post('internship') == 'internship') ? $this->input->post('internship') : '' ;
			$insurance = (!empty($this->input->post('insurance'))) ? $this->input->post('insurance') : '' ;
			$thirdpartapprov = (!empty($this->input->post('thirdpartapprov'))) ? $this->input->post('thirdpartapprov') : '' ;
			$postjobdata = array('job_title'=>$this->input->post('job_title'),'highleveljobdesc'=>$this->input->post('highleveljobdesc'),'job_description'=>$this->input->post('job_description'),'equipment'=>$this->input->post('equipment'),'finalrep'=>$this->input->post('finalrep'),'information'=>$this->input->post('information'),'industry'=>$this->input->post('industry'),'internship'=>$internship,'project'=>$this->input->post('project'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date'),'jobemergency'=>$this->input->post('jobemergency'),'worktype_desc'=>json_encode($this->input->post('worktype_desc')),'explevel1'=>$this->input->post('explevel1'),'thirdpartapprov'=>$thirdpartapprov,'joblocation'=>$this->input->post('joblocation'),'city'=>$this->input->post('city'),'state'=>$this->input->post('state'),'zipcode'=>$this->input->post('zipcode'),'insurance'=>$insurance,'hourorfix'=>$this->input->post('hourorfix'),'budget'=>$this->input->post('budget'),'detailed_pic'=>implode(",",array_filter($detailed_p)),'equipment_pic'=>implode(",",array_filter($equipment_p)),'finalrep_pic'=>implode(",",array_filter($finalrep_p)),'project_pic'=>implode(",",array_filter($project_p)),'certificates_pic'=>implode(",",array_filter($certificates_p)),'insurance_certificate'=>implode(",",array_filter($insurance_c)),'budget_img'=>implode(",",array_filter($budget_p)),'job_file'=>json_encode(explode(",",$this->input->post('files_pic'))),'posteddate'=>date('m/d/Y h:i:s A'),'company_userid'=>$this->session->userdata('id_user_master'),'job_status'=>"2");
			$last_insert_id = $this->postjob_model->update_postjob($this->input->post('job_id'),$postjobdata);
		if(!empty($last_insert_id))
		{			
			redirect(base_url()."job/payment_postjob/".$this->input->post('job_id'));
		}
		else
		{
			redirect('job');
		}
	}
	private function set_upload_options()
{   
    //upload an image options
    $config = array();
	$config['upload_path']  = './uploads/';
	$config['allowed_types']  =  '*';
	 //~ $config['max_width']  = 1024;
	//~ $config['max_height']  = 768;
//	$config['overwrite']     = TRUE;

    return $config;
}
	public function find_job()
	{
		$findarraydata = array('finddata'  => $this->input->post('finddata'));
		if(!empty($findarraydata))
		{
			$get_postjoball = $this->postjob_model->get_postjoballpaidfilter($findarraydata);
		}
		else
		{
			$get_postjoball = $this->postjob_model->get_postjoballpaid();
		}
			$data['base_url'] = base_url();
			$data['current_menu']  = "job";
			$data['sub_menu']  = "job";
			$data['get_postjoball']  =   $get_postjoball;
			$data['view_file']  = "find_job";
			$this->template->load_front_home_template($data);	

	}
	public function jobposts()
	{
		$get_postjoball = $this->postjob_model->get_postjoballpaid();
		$get_postjobpaiduser = $this->postjob_model->get_postjobpaiduser($this->session->userdata('id_user_master'));
		$get_postjoballpaidproposal = $this->postjob_model->get_postprosalposttable($this->session->userdata('id_user_master'));
		//~ $get_postjoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
		$get_postproposals = $this->postjob_model->get_postproposals($this->session->userdata('id_user_master'));
				//$data['get_job']  = $this->postjob_model->get_job($postjob);

		$data['base_url'] = base_url();
		$data['current_menu']  = "job";
		$data['get_postjoball']  =   $get_postjoball;
		$data['get_postjobpaiduser']  =   $get_postjobpaiduser;
		$data['get_postproposals']  =   $get_postproposals;
		$data['get_postawardedtable']  =   $this->postjob_model->get_postawardedtable($this->session->userdata('id_user_master'));
		$data['get_postjobcompletedtable']  =   $this->postjob_model->get_postjobcompletedtable($this->session->userdata('id_user_master'));
		$data['get_postjoballpaidproposal']  =   $get_postjoballpaidproposal;
		$data['sub_menu']  = "job";
		$data['view_file']  = "jobposts";
		$this->template->load_front_home_template($data);		
	}
	public function manage_jobposts()
	{
		$get_postmanagejoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
		$data['get_postjobexpired']  =   $this->postjob_model->get_postjobexpired($this->session->userdata('id_user_master'));
		$data['base_url'] = base_url();
		$data['get_postjoball']  =   $get_postmanagejoball;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "managejobs";
		$this->template->load_front_home_template($data);		
	}
	public function bidposts()
	{
		$get_postjoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
		//	$get_postjoball = $this->postjob_model->get_postjoball();
		$data['base_url'] = base_url();
		$data['current_menu']  = "job";
		$data['get_postjoball']  =   $get_postjoball;
		$data['sub_menu']  = "job";
		$data['view_file']  = "jobbids";
		$this->template->load_front_home_template($data);		
	}
	public function manage_jobbid()
	{
		
		$get_postjoball = $this->postjob_model->get_postmanagejoball($this->session->userdata('id_user_master'));
		$data['base_url'] = base_url();
		$data['get_postjoball']  =   $get_postjoball;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "managebids";
		$this->template->load_front_home_template($data);		
	}
	public function edit_postjobs($poid)
	{
		$edit_postjobs = $this->postjob_model->getcompanypostdata($poid);
		$data['base_url'] = base_url();
		$data['edit_postjobs']  =   $edit_postjobs;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "editjobs";
		$this->template->load_front_home_template($data);		
	}
	public function re_postjobs($poid)
	{
		$edit_postjobs = $this->postjob_model->getcompanypostdata($poid);
		$data['base_url'] = base_url();
		$data['edit_postjobs']  =   $edit_postjobs;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "re_jobs";
		
		$this->template->load_front_home_template($data);		
	}
	public function send_proposals()
	{
		
		$datasendpro =	array('pro_id' => $this->input->post('job_id'),'user_id' =>$this->session->userdata('id_user_master'));
		$this->postjob_model->update_sendproposal($datasendpro,array('status' => '2'));
		redirect('job/select_job/'.$this->input->post('job_id'));
		
	}
	public function award_sf()
	{
		 
		$datasendpro =	array('proposproj_id' => $this->input->get('proj_id') ,'proposuser_id' =>$this->input->get('user_id'));
		$p_id = $this->input->get('proj_id');
		
		$this->postjob_model->update_awarded_otherstatus_job($this->input->get('proj_id'),array('status' => 3));
		$this->postjob_model->update_awarded_job($datasendpro,array('status' => 2));
		
		$dataaward =	array('job_status' => 3);
		
		$this->postjob_model->update_awarded_post($p_id,$dataaward);
		

		redirect('job/jobposts');
		
	}
	public function select_job($postjob = 0 )
	{
		$user_id = $this->session->userdata('id_user_master');
		if($user_id)
			{			
		
				$data['datadetailpayment']  = $this->postjob_model->payment_info($postjob,$user_id);
				$data['base_url'] = base_url();
				$data['current_menu']  = "job";
				$data['poid'] = $postjob;
				$data['sub_menu']  = "job";
				$data['view_file']  = "select_job";
				$data['get_job']  = $this->postjob_model->get_job($postjob);
				$this->template->load_front_home_template($data);	
			}	
		else
			{
				$this->session->set_flashdata('showpopup','Product is Successfully Inserted');
				redirect('home');
			}
	}
	  
	public function update_postjobprice($id)
	{ 
		$product = $this->product->update_postjobprice();
		redirect(base_url()."job/payment_postjob/".$last_insert_id);
	}
  
	public function buy($id)
	{
		// Set variables for paypal form
		$returnURL = base_url().'paypal/success';
		$cancelURL = base_url().'paypal/cancel';
		$notifyURL = base_url().'paypal/ipn';
		// Get product data from the database
		$product = $this->product->getRows($id);
		// Get current user ID from the session
		$userID = $_SESSION['userID'];
		// Add fields to paypal form
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['name']);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $product['id']);
		$this->paypal_lib->add_field('amount',  $product['price']);
		// Render paypal form
		$this->paypal_lib->paypal_auto_form();
	}
	
	public function save_select_job()
	{ 

		$price= 5;
		$data = array(
		'user_id'=>$this->session->userdata('id_user_master'),
		'com_id	'=> $this->input->post('company'),
		'pro_id'=> $this->input->post('post'),
		'price'=> $price);
		$last_insert_id = $this->postjob_model->insert_selectjob($data);
		if(!empty($last_insert_id))
			{			
				redirect(base_url()."job/payment_selectjob/".$last_insert_id);

			}
		else
			{
				redirect('job/find_job');
			}

	}
	public function payment_selectjob($last_insert_id = 0)
	{
		$data['getbidjobdata'] = $this->postjob_model->getbidjobdata($last_insert_id);
		$data['base_url'] = base_url();
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "bid_job";
		$this->template->load_front_home_template($data);		
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
					$itemName = "Post_job";
					$itemPrice = 5.00;
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
											'job_status' => 2,
											'cc' =>  $currency,
											'st' => 'Completed',
											'paytax' => $balance_transaction
									);
					$updatesucess =$this->postjob_model->updatepostpaymentstatus($itemNumber,$data);

					//$this->session->set_flashdata('flash_message' , get_phrase('The transaction was successful'));
					redirect(BASE_URL . '/job/manage_jobposts' , 'refresh');
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
					redirect(BASE_URL . '/job/payment_postjob/'.$itemNumber.'' , 'refresh');
							}
						}
						else
						{
							$data = array(
								'status' => 4,
								'modified_on' => $date,
						);
						
						//$this->session->set_flashdata('flash_message' , get_phrase('Transaction has been failed'));
					redirect(BASE_URL . '/job/payment_postjob/'.$itemNumber.'' , 'refresh');
						}
					}
					else
					{
						$data = array(
								'status' => 4,
								'modified_on' => $date,
						);
						
						//$this->session->set_flashdata('flash_message' , get_phrase('Transaction has been failed'));
					redirect(BASE_URL . '/job/payment_postjob/'.$itemNumber.'' , 'refresh');

					}

				}
				else
				{
						//$this->session->set_flashdata('error_message' , get_phrase('Form submission error.......'));
					redirect(BASE_URL . '/job/payment_postjob/'.$itemNumber.'' , 'refresh');

				}
	}
	public function listofSF($poid = "")
	{
		$get_postprosaldetails = $this->postjob_model->get_active_postsp($poid);  
		$get_singleproject = $this->postjob_model->get_singleproject($poid);  
		$data['base_url'] = base_url();
		$data['get_postprosaldetails']  =   $get_postprosaldetails;
		$data['get_singleproject']  =   $get_singleproject;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "listofsf";
		$this->template->load_front_home_template($data);		
	}
	public function listofAC($poid = "")
	{
		$get_postprosaldetails = $this->postjob_model->get_active_postac($poid);  
		$get_singleproject = $this->postjob_model->get_singleproject($poid);  
		$data['base_url'] = base_url();
		$data['get_postprosaldetails']  =   $get_postprosaldetails;
		$data['get_singleproject']  =   $get_singleproject;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "listofsf";
		$this->template->load_front_home_template($data);		
	}
	public function listofACT($poid = "")
	{
		$get_postprosaldetails = $this->postjob_model->get_active_postact($poid);  
		$get_singleproject = $this->postjob_model->get_singleproject($poid);  
		$data['base_url'] = base_url();
		$data['get_postprosaldetails']  =   $get_postprosaldetails;
		$data['get_singleproject']  =   $get_singleproject;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "listofsf";
		$this->template->load_front_home_template($data);		
	}
	
	public function complete_job($poid = "")
	{
		
			if($this->session->userdata('user_type_fr') == 'company')
			{	
						$user_id = $this->session->userdata('id_user_master');

		$getrating = $this->users_model->get_ratingjob(array(
				'comid' => $user_id,
				'po_id' => $poid
			));
			$data['getrating'] = !empty($getrating) ? $getrating : '';
		$data['base_url'] = base_url();
		$data['poid'] = $poid;
		$data['current_menu']  = "job";
		$data['sub_menu']  = "job";
		$data['view_file']  = "complete_job_page";
		$this->template->load_front_home_template($data);	
	}	else
	{
		redirect('home');
		
		}
	}
	
	public function expiredday()
	{
		
		$expiredday = $this->postjob_model->update_expiredday();
	}
	
}
