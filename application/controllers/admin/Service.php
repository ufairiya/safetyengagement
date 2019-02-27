<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('task_model');
		$this->load->model('service_model');
		$this->load->model('property_model');
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	

	}
	public function index()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "service/endorseservice";
		$data['current_menu']  = "service";
		$data['sub_menu']  = "endorseservice";	
		$data['list_of_servicereport']  = $this->service_model->getservicereport_list();		
		$this->template->load_frontend_template($data);
	}
	
	public function add_services()
	{
		$id = $this->input->post('id');
		$data['base_url'] = base_url();		
		$data['view_file']  = "service/service_add";	
		$data['current_menu']  = "servicecategory";
		$data['sub_menu']  = "service_add";		
		$this->template->load_frontend_template($data);
	}	
	public function list_services()
	{
		$id = $this->input->post('id');
		$data['base_url'] = base_url();		
		$data['view_file']  = "service/service_list";
		$data['aparment_id']  = $this->property_model->getpropertyall_list();
		$data['service']  = $this->service_model->get_user_detailss();
		$data['task_id']  = $this->task_model->get_task1_details();
		$data['task'] = $this->service_model->select_option($id);	
		$data['task_category'] = $this->service_model->get_categories();
		$data['current_menu']  = "servicecategory";
		$data['sub_menu']  = "service_list";		
		$this->template->load_frontend_template($data);
	}	
		
	public function services()
	{
		
	$data['base_url'] = base_url();		
	$id = $this->input->post('id');
	$task_details = $this->service_model->select_option($id);
	echo json_encode($task_details);		
	}		
		
	public function list_servicereport()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "service/servicereport_list";
		$data['current_menu']  = "service";
		$data['sub_menu']  = "listservice_report";	
		$data['get_service_report_details'] = $this->service_model->getservicereport_list_view();	
		$this->template->load_frontend_template($data);
	}
	public function get_servicereport()
	{
		
		$data['base_url'] = base_url();		
		$ser_id = $this->input->post('ser_id');
		$changetask_details = $this->service_model->update_statusservice($ser_id);

		$task_details = $this->service_model->get_servicereport_data($ser_id);
		foreach($task_details as $task_details_val)
		{
			$contcol_jobname = unserialize($task_details_val['contcol_jobname']);
			$cont_price = unserialize($task_details_val['cont_price']);
			$task_details_val['contcol_jobname']= $contcol_jobname ;  
			$task_details_val['cont_price'] =$cont_price;
			$task_details_valarr[] = $task_details_val ;
			//~ exit;	
		}	
		//~ var_dump($task_details_valarr);
		//~ exit;
		echo json_encode($task_details_valarr);
	}
	public function generate_endorse()
	{		
		$data['base_url'] = base_url();		
		$ser_user_id = $this->input->post('ser_user_id');
		$ser_user_email = $this->input->post('ser_user_email');
		$ser_rp_id = $this->input->post('ser_rp_id');
		$ser_rp_id_val =implode(',',$ser_rp_id);
		$ser_rp_idarr  = array($ser_rp_id_val);
		$filename= 'report_'.date("mdHis");
		$pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";

		$data['get_service_report'] = $this->service_model->get_servicereport_data_generate($ser_rp_idarr);
		$data['current_menu']  = "service";
		$data['sub_menu']  = "service_list";

		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)

			$html = $this->load->view('front/pdf_report', $data,true); // render the view into HTML
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdfoutput = $pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
			
			$from = "test.stallioni@gmail.com";    //senders email address
			$subject = 'check pdf file';  //email subject			
			$message = 'check pdf file';

			//config email settings
			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			//send email
			$this->email->from($from);
			$this->email->to($ser_user_email);
			$this->email->subject($subject);
			$this->email->message($message);
			$path =base_url.'/downloads/reports/'.$filename.'.pdf';			
			$this->email->attach($pdfFilePath);
			
			if($this->email->send()){
				echo 'echo senddd';
				return true;
			}
			else
			{
				echo "email send failed";
				return false;
			}
		}

	}	
	
	public function update_service($catid = 0)
	{
			
		$data['base_url'] = base_url();		
		$data['view_file']  = "service/update_servicecategory";
		$data['task_categorybyid'] = $this->service_model->get_categorybyid($catid);
		//~ var_dump($data['task_categorybyid']);
		//~ exit;
		$data['taskprice'] = $this->service_model->get_price($catid);
		$data['current_menu']  = "servicecategory";
		$data['sub_menu']  = "update_service_category";		
		$this->template->load_frontend_template($data);

	}

	public function upload_service_gallery()
	{
		if (!empty($_FILES)) 
		{
			$config = array(
			'upload_path' => "./uploads/service_gallery/",
			'overwrite' => TRUE,
			'allowed_types' => "gif|jpg|png|jpeg",
			
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('file'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{                   
				$data = $this->upload->data();  
				echo json_encode(array('target_file' => base_url().'uploads/service_gallery/'.$data["file_name"]));
			}
		}
	}
	
	public function insertservice()
	{
		
		
			
				
					if(!empty($this->input->post("hideshowpr")))
					{
					$hideshowpri = 1;

					}
					else
					{
					$hideshowpri = 0;
					}
					if(!empty($this->input->post("hideshowti")))
					{

					$hideshowtim = 1;
					}
					else
					{

					$hideshowtim = 0;
					}
				
				
					$sc = explode(',',$this->input->post("subcatategory"));
					$pn = explode(',',$this->input->post("pricename"));
					$pd = explode(',',$this->input->post("pricedescription"));
					$pri = explode(',',$this->input->post("price"));
					$pc = explode(',',$this->input->post("pricecount"));
				
					$data = array('taskcategory_name'=>trim($this->input->post("service_title")),
					'max_appointment'=>$this->input->post("max_appointment"),
					'summary'=>$this->input->post("summary"),'gallery_img'=>json_encode($this->input->post("galleryimg")),
					'opening_hours'=>json_encode($this->input->post("opentime")),
					'closing_hours'=>json_encode($this->input->post("closetime")),
					//'pricecount'=>json_encode($this->input->post("count")),
					//'subtitle'=>json_encode($this->input->post("subtitle")),
					//'pricename'=>json_encode($this->input->post("cate_price_name")),
					'image_path'=>$this->input->post("im-fontpicker"),
					'iconcode'=>$this->input->post("iconcode"),
					'taskcatshort_code'=>$this->input->post("shortname"),
					//'description'=>json_encode($this->input->post("desc")),
					//'price'=>json_encode($this->input->post("cate_price")),
					'pricecount'=>json_encode($pc),
					'subtitle'=>json_encode($sc),
					'pricename'=>json_encode($pn),
					'description'=>json_encode($pd),
					'price'=>json_encode($pri),					
					'hideshowti_status'=>$hideshowtim,
					'hideshowpr_status'=>$hideshowpri,				
					'status'=>'2');
				
									$insert_id = $this->service_model->services_insert($data);
					echo json_encode(array('success'=>'booking/preview_service_categories','serid'=>$insert_id));
			    			
	}

public function unquie_service_title_val()
	{
	if ($this->input->is_ajax_request()){
		
			$service_title = $this->input->post('service_title');		
				
	
				$res = $this->service_model->uniquecheckservice_title($service_title);
				echo $res;
				exit;
		
		
	}
	}
public function updateservice()
	{
		
		//~ print_r($this->input->post());
		//~ exit;
		
			
					
					$ser_id = $this->input->post("service_id");
					if(!empty($this->input->post("hideshowpr")))
					{
					$hideshowpri = 1;

					}
					else
					{
					$hideshowpri = 0;
					}
					if(!empty($this->input->post("hideshowti")))
					{

					$hideshowtim = 1;
					}
					else
					{

					$hideshowtim = 0;
					}
					//~ if($this->input->post('count'))
					//~ {
						
						
					//~ }
					//~ var_dump($this->input->post());
					//~ exit;
					
					
					
					$sc = explode(',',$this->input->post("subcatategory"));
					$pn = explode(',',$this->input->post("pricename"));
					$pd = explode(',',$this->input->post("pricedescription"));
					$pri = explode(',',$this->input->post("price"));
					$pc = explode(',',$this->input->post("pricecount"));
					
				
				$galleryimg = json_encode($this->input->post("galleryimg"));
					$data = array('taskcategory_name'=>trim($this->input->post("service_title")),
					'max_appointment'=>$this->input->post("max_appointment"),
					'summary'=>$this->input->post("summary"),
					'gallery_img'=>$galleryimg,						
					'taskcatshort_code'=>$this->input->post("shortname"),				
					'image_path'=>$this->input->post("im-fontpicker"),
					'iconcode'=>$this->input->post("iconcode"),
					'hideshowti_status'=>$hideshowtim,
					'hideshowpr_status'=>$hideshowpri,					
					);
					$this->service_model->services_update($ser_id,$data);
					
					$subtitl	=	json_encode($sc);
					$catprname 	=	json_encode($pn);
					$desc 		=	json_encode($pd);
					$catpric 	=	json_encode($pri);
					$count 		= 	json_encode($pc);
					
					
					
					$openti =json_encode($this->input->post("opentime"));
					$closeti =json_encode($this->input->post("closetime"));
				
				if($hideshowpri == 1 && $hideshowtim == 0)
				{
					
					$data = array(				
					'subtitle'=>$subtitl,
					'pricename'=>$catprname,					
					'description'=>$desc,					
					'price'=>$catpric,
					'pricecount'=>$count,
					);
					$this->service_model->services_update($ser_id,$data);
				}
				else if($hideshowtim == 1 && $hideshowpri == 0)
				{
			
				
				$data = array(
					'opening_hours'=>$openti,
					'closing_hours'=>$closeti,
				);
				$this->service_model->services_update($ser_id,$data);
				}
				else if($hideshowpri == 1 && $hideshowtim == 1)
				{
					
				$data = array(
					'opening_hours'=>$openti,
					'closing_hours'=>$closeti,
					'subtitle'=>$subtitl,
					'pricename'=>$catprname,
					'description'=>$desc,
					'pricecount'=>$count,
					'price'=>$catpric);
					
					$this->service_model->services_update($ser_id,$data);
				}
				
			echo json_encode(array('success'=>'booking/preview_service_categories','serid'=>$ser_id));
							
	}
	
	public function deletecategory()
	{
		$delid = $this->input->post('cat_id');
		$checkassigncont =  $this->service_model->checkassigncont($delid);
		foreach($checkassigncont as $checkassigncontval)
		{
			$arr = array_filter(explode(',', $checkassigncontval->skills));
			if(in_array($delid, $arr)){
				$res[] = 'Exist';
			
			}
			else
			{
				$res[] = 'success';
				
			}
			
		}
		if(in_array('Exist',$res))
		{
			echo  'Exist';
			exit;
		}
		else
		{
			$del = $this->service_model->delete_category($delid);
			echo 'success';
			exit;
		}
	
		
		//~ $del = $this->service_model->delete_category($delid);
		//~ echo 'success';
		
	}
	
	public function changestatus($serid = 0)
	{
		
		$serid =$this->input->get("serid");
		$status =$this->input->get("status");
		
		
		$this->service_model->services_changestatusupdate($serid ,array('status'=> $status));
		redirect('admin/service/list_services');

	}
}
