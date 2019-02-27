<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endorseservice extends CI_Controller {
	
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
	}	public function add_services()
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
		$ser_id = $this->input->post('report_id');
		
		//~ var_dump($ser_id);
		//~ var_dump($usermaster_id);
		//~ exit;
		//~ $ser_id_val =implode(',',$ser_id);
		//~ $ser_id_valarr  = array($ser_id_val);
		
		//$changetask_details = $this->service_model->update_statusservice($usermaster_id);
		$task_details = $this->service_model->get_servicereport_data($ser_id);
		
		
		foreach($task_details as $task_details_val)
		{	
			$contcol_jobname = unserialize($task_details_val['contcol_jobname']);
			$cont_price = unserialize($task_details_val['cont_price']);
			$task_details_val['contcol_jobname']= $contcol_jobname ;  
			$task_details_val['cont_price'] =$cont_price;
			$task_details_valarr[] = $task_details_val ;
		}	
		
		echo json_encode($task_details_valarr);
	}
	
	public function pdffile()
	{
		
		$data['base_url'] = base_url();	
		$ser_user_id = $this->input->post('ser_user_id');
			
			$ser_user_email = $this->input->post('ser_user_email');

			$ser_rp_idarr  = array(2);
			$ser_rp_id = $this->input->post('ser_rp_id');
			$data['get_service_report'] = $this->service_model->get_servicereport_data_generate($ser_rp_idarr);
			$data['current_menu']  = "service";
			$data['sub_menu']  = "service_list";
		$this->load->view('front/pdf_report', $data,true); // render the view into HTML
		
	}
	public function generate_endorse()
	{
		if($this->input->post())
		{
			$data['base_url'] = base_url();		
			$ser_user_id = $this->input->post('ser_user_id');		
			$ser_user_email = $this->input->post('ser_user_email');
			$ser_rp_id = $this->input->post('ser_rp_id');
			$issueddate = $this->input->post('issueddate');
			$get_servicereport_checkendorse_list = $this->service_model->get_servicereport_checkendorse_list($ser_rp_id,$ser_user_id,$issueddate);
			if(!empty($get_servicereport_checkendorse_list))
			{
							$task_details = $this->service_model->update_statusservice($ser_rp_id);

				$data['get_service_report'] = $this->service_model->get_servicereport_data_generate($ser_rp_id,$ser_user_id,$issueddate);
				$data['current_menu']  = "service";
				$data['sub_menu']  = "service_list";
			}
			else
			{
										$task_details = $this->service_model->update_statusservice($ser_rp_id);

			$data['get_service_report'] = $get_service_report= $this->service_model->get_servicereport_data_generate($ser_rp_id,$ser_user_id,$issueddate);

			
			
			$data['base_url'] = base_url();		
			$data['current_menu']  = "service";
			$data['sub_menu']  = "service_list";				
			$adminemail = 'admin@1ss.com.sg';
			$adminname = '1SS';
	
			$company_name = '1SS';
			$company_email_address = $adminemail;
			$filename= 'Servicereport'.date("mdHis");
			$pdfFilePath = FCPATH."downloads/reports/$filename.pdf";
			$pdfFilePathbase = base_url()."downloads/reports/$filename.pdf";
			if (file_exists($pdfFilePath) == FALSE)
			{
				 $message = "";
				ini_set('memory_limit', '-1');//ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
				//~ $message = $this->load->view('front/pdf_report', $data,true); // render the view into HTML
		//~ var_dump($get_service_report);

 foreach($get_service_report as $get_service_report_details)
{ 				
$message .=	 '<link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/bootstrap-grid.css" ><link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/home.css"><link rel="stylesheet" href="'.base_url().'assets/listeo/css/style.css">';
	$getSR_code=$get_service_report_details->SR_code;
	$getcreated_date=$get_service_report_details->created_date;
	$getusername=$get_service_report_details->username;
	$getphone=$get_service_report_details->phone;
	$getemail=$get_service_report_details->email;
	$getapartment=$get_service_report_details->apartment;
	$getsr_address=$get_service_report_details->sr_address;
	$gettask_catname=$get_service_report_details->task_catname;
	$gettxtdescrip=$get_service_report_details->txtdescrip;
	$getadditional_description=$get_service_report_details->additional_description ;
	$getimg_sign=$get_service_report_details->img_sign ;
	$getwiteness_name=$get_service_report_details->witeness_name ;
	$message .=	'<div id="invoice" style="background: #fff;width: auto;max-width: 700px;padding: 20px;margin: 10px auto 60px; border-radius: 4px; "><div style="margin-right: -15px;margin-left: -15px;"><div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width: 100px; cursor: default;" src="'.base_url().'assets/listeo/images/logo-1SS.png" alt=""></div><div class="col-md-6" style="color: #707070;position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;float:right;"><p id="details" style="text-align: ;"><strong style="font-weight: 600;color: #333;display: inline-block;">Report:</strong> '.$getSR_code.' <br><strong style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong>'.$getcreated_date.'</p></div></div><div class="" style="display: table;width: 100%;margin-right: -15px;margin-left: -15px;"><div class="col-md-12" style="width:100%"><h2 style="font-weight: 300;color: #333;clear: both;margin: 0;font-size: 28px;line-height: 1;margin: 15px 0 45px!important;">Service Report</h2></div><div class="col-md-3 sr-prof " style="display: table;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;"><p style="margin: 0;font-size: 14px;line-height: 29px;padding-bottom: 0;clear: both;line-height: 27px;"><strong style="font-weight: 600;color: #333;display: inline-block;">Name :</strong><br><strong style="font-weight: 600;color: #333;display: inline-block;">Contact No:</strong><br><strong style="font-weight: 600;color: #333;display: inline-block;">Email:</strong><br></p><p style="line-height: 27px;"><strong style="font-weight: 600;color: #333;display: inline-block;">Apartment :</strong></p></div><div class="col-md-3 sr-prof" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;"><p style="color: #707070;line-height: 27px; margin: 0;">'.$getusername.'<br>'.$getphone.'<br>'.$getemail.'<br></p><p style="color: #707070;line-height: 27px;">'.$getapartment.'<br>'.$getsr_address.'</p></div><div class="col-md-3" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 12%;float: left;display: table;height: 108px;"></div><div class="col-md-3" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;"><strong style="color: #333;">Service Category</strong><p style="line-height: 27px;color: #707070;">'.$gettask_catname.'</p></div></div><!-- Invoice --><div class="" ><div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10"><p style="color: #333;">Description</p></div><div class="col-md-12 sr-desc"><p style="color: #707070;line-height: 27px;">'.$gettxtdescrip;
	 if($get_service_report_details->additional_description != '') {
		$message .='<br><strong class="margin-top-10" style="font-weight: 600;color: #333;">Additional Descriptions (optional):</strong>'.$getadditional_description.'</p>';
			} 
		$message .='</div><div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10"><p style="color: #333;">Job Description</p>
		</div><div class="col-md-12 sr-desc numbered"><ol style="counter-reset: li;list-style: none;padding: 0;margin-left: 18px;display: inline-block;    font-size: 16px;">';

				$jobname = unserialize($get_service_report_details->contcol_jobname);
				$jobprice =unserialize($get_service_report_details->cont_price);
				for($i = 0; $i < count($jobname); $i++)
				{
					$message .= '<li style="padding: 3px;font-size: 14px;line-height: 18px;color: #707070;">'.$jobname[$i].' -$ '.$jobprice[$i].' </li>';
				}
				
$message .='</ol></div><div class="col-md-4 signature"><div class="signature-box"><img style="width:50%;" src="'.$getimg_sign.'" />
				</div><label>'.$getwiteness_name.'</label></div></div><div class="row" style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-12" id="terms" ><ul id="footer" style="width: 100%;border-top: 1px solid #ddd;margin: 60px 0 0;padding: 20px 0 0;list-style: none;font-size: 15px;"><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><span>www.1ss.com.sg</span></li><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;">+65 6666 5555</li></ul>
				</div></div></div>';
				 }   
//~ var_dump($message);
//~ exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
				$pdf->WriteHTML($message); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			}
			
			$filename_inv= 'Invoice'.date("mdHis");
			$pdfFilePath_inv = FCPATH."downloads/invoice/$filename_inv.pdf";
			$pdfFilePathbase_inv = base_url()."downloads/invoice/$filename_inv.pdf";
			if (file_exists($pdfFilePath_inv) == FALSE)
			{
				 $message_inv  = "";
			ini_set('memory_limit', '-1');// boost the memory limit if it's low ;)
				//~ $message_inv = $this->load->view('front/invoice_pdf', $data,true); // render the view into HTML
				
 foreach($get_service_report as $get_service_report_details)
{
	$message_inv .= '<link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/bootstrap-grid.css" ><link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/home.css"><link rel="stylesheet" href="'.base_url().'assets/listeo/css/style.css">';
	$getinvoice_id = $get_service_report_details->invoice_id;
	$getcreated_date = $get_service_report_details->created_date;
	$getusername = $get_service_report_details->username;
	$getemail = $get_service_report_details->email;
	$getadditional_description = $get_service_report_details->additional_description;
	$message_inv .= '<div id="invoice" style="background: #fff;width: auto;max-width: 700px;padding: 20px;margin: 10px auto 60px; border-radius: 4px; "><div style="margin-right: -15px;margin-left: -15px;"><div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width: 100px; cursor: default;" src="'.base_url().'assets/listeo/images/logo-1SS.png" alt=""></div><div class="col-md-6" style="color: #707070;position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;float:right;"><p id="details" style="text-align: ;">';
					 if(!empty($get_service_report_details->img_sign)) {
						 $message_inv .= '<span style="float: left;position: absolute;transform: rotate(45deg)background: #f30c0c;z-index: 9!important;top: -20px;right: -90px;font-size: 1.3em;color: #fff;font-weight: 500;    margin: 0;line-height: 28px;text-align: center;width: 200px;text-transform: uppercase;">Paid</span>';  } 
						 $message_inv .= '<strong style="font-weight: 600;color: #333;display: inline-block;">Order:</strong>'.$getinvoice_id.' <br><strong style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong>'.$getcreated_date.'</p></div></div><div class="row"><div class="col-md-12"><h2>Invoice</h2></div><div class="col-md-6"><strong class="margin-bottom-5">Supplier</strong><p>1SS Pte. Ltd. <br>4002 Depot Lane #01-49 <br>Singapore 109756</p></div><div class="col-md-6"><strong class="margin-bottom-5">Customer</strong>
						<p>'.$getusername.'<br>'.$getemail.'</p></div></div><!-- Invoice --><div class="row"><div class="col-md-12">
						<table class="margin-top-20"><tr><th>Description</th><th>Estimated Cost</th></tr>';
								$jobname = unserialize($get_service_report_details->contcol_jobname);
							$jobprice = unserialize($get_service_report_details->cont_price);
							
							for($i = 0; $i < count($jobname); $i++)
							{
								 $message_inv .=  '<tr>
								<td>'.$jobname[$i].'</td> 
								<td> $'.$jobprice[$i].'</td>
								</tr>';
							}
						if (!empty($get_service_report_details->additional_description)) {  
							 $message_inv .= '<tr><th>Additonal Description</th><th></th></tr><tr><td>'.$getadditional_description.'</td><td></td></tr>';
				
							}  $message_inv .= '</table></div><div class="col-md-4 col-md-offset-8"><table id="totals"><tr><th>Total Due</th><th><span> $'.array_sum($jobprice).'</span></th></tr></table></div></div><!-- Footer --><div class="row"><div class="col-md-12" id="terms"><ul id="footer"><li><span>https://1SS.com.sg</span></li>
							<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li><li>+65 6666 5555</li></ul></div></div></div>';
				} 

				
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
				$pdf->WriteHTML($message_inv); // write the HTML into the PDF
				$pdf->Output($pdfFilePath_inv, 'F'); // save to file because we can
			}
			if(!empty($message) && !empty($message_inv))
			{
			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);
			$this->email->from($adminemail);
			$this->email->to($ser_user_email);
			$this->email->subject('Service Report and Invoice - '.$issueddate);
			$this->email->message('Dear '.$ser_user_name.',<br/>Thank you for using our services. Attached is your Service Report(s) and Invoice(s).');
			$this->email->attach($pdfFilePathbase);
			$this->email->attach($pdfFilePathbase_inv);
			$this->email->send();

		}
	}
	}
			

	}	
}
