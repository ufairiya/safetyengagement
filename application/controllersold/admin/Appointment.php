<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
			if(!is_user_active('', FALSE))
		{
			redirect('admin/login');
		}
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');     	
        $this->load->helper('url');	
        $this->load->helper('push_helper');	
        		$this->load->model('task_model');

        $this->load->database();
        $this->load->model('purchaseorder_model');
	}
	public function index()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "appointment/appointment.php";
			$data['current_menu']  = "appointment";			
			$data['admin_of_appointments']  = $this->purchaseorder_model->getpending_task();
			
			//$data['sub_menu']  = "schdulecreate";
			//$data['get_task']  = $this->task_model->get_task_details();
			//$data['get_apartment']  = $this->property_model->getproperty_list();
			$this->template->load_frontend_template($data);		
	}
	public function edit_appointment()
	{
			$task_id = $this->input->get('taskid');
			$data['base_url'] = base_url();
			$data['view_file']  = "appointment/edit_appointment.php";
			$data['current_menu']  = "appointment";			
			$details = $this->purchaseorder_model->getpending_taskdetails($task_id);
		
			$listproperty = $this->purchaseorder_model->propertylist($details[0]->user_id);	
			$data['admin_of_task']  = $this->task_model->get_task_details();
			$data['tid'] = $task_id;
			$data['appointments_details'] = $details[0];
			$data['listproperty'] = $listproperty;
			$this->template->load_frontend_template($data);		
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
	public function push_notifi()
	{
		
		if(!empty($this->input->post()))
		{
		if($this->input->post("device_id"))
		{
			 $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';
        
        
        $res = array();
        $res['data']['title'] = $this->input->post("pname");
        $res['data']['is_background'] = false;
        $res['data']['message'] = $this->input->post("desciption");
        $res['data']['image'] = base_url().'uploads/'.$this->input->post("imgpath");
        $res['data']['payload'] =$payload;
        $res['data']['push_pages'] ='myrequest';
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
         

				 //send a notifiation
			$android_device_token = $this->input->post("device_id");
		
			$result = send_android_notification($android_device_token,$res);
			echo json_encode($result);
		}
	}
	}
	public function update_book_appointment()
	{
 
		if(!empty($this->input->post()))
		{
		
	$user_id = $this->session->userdata('id_user_master');

		//~ $task_detail = array('id' => $this->input->post('tasl_cat_id'),'user_id' => $this->session->userdata('id_user_master'),'apartment_id' => $this->input->post('apt_id'),'task_cat_shotname' => $this->input->post('short_code'),'task_catid' => $this->input->post('cateid'),'image_path' => $this->input->post('img_link'),'task_catname' => $this->input->post('service_book') ,'property_name' => $this->input->post('property_book') ,'booking_date' =>$this->input->post('booking_date'),'booking_time' => $this->input->post('booking_time'),'description' => $this->input->post('description') );     


		//~ $data_res = $this->task_model->update_booking($task_detail,$user_id);
		
		
	//~ var_dump($this->input->post());
	//~ exit;
		$data2 = array(
			'image_path' =>$this->input->post("imgpath"),		 
			'task_catname' => $this->input->post("category_name"),
			'description' => $this->input->post("desciption"),
			'jobname' => serialize($this->input->post("field_name")),
			'jobprice' => serialize($this->input->post("field_price")),
			'booking_date' => $this->input->post("bookingdate"),
			'bookingtime' => $this->input->post("bookingtime"),
			'est_time' => $this->input->post("est_time"),
			'status' => '2',
			);

	$update_task_table = $this->purchaseorder_model->update_task(array('id'=>$this->input->post("taskid")),$data2);
			 
			 
			$data1 = array(
			'p_first_name' => $this->input->post("first_name"),
			'p_phone' => $this->input->post("phone"),
			'p_email' => $this->input->post("email"),
			'p_image_path' => $this->input->post("imgpath"),		 
			'p_task_catname' => $this->input->post("category_name"),
			'p_description' => $this->input->post("desciption"),
			'p_jobname' => serialize($this->input->post("field_name")),
			'p_jobprice' => serialize($this->input->post("field_price")),
			'p_booking_date' => $this->input->post("bookingdate"),
			'p_booking_time' => $this->input->post("bookingtime"),
			'p_est_time' => $this->input->post("est_time"),
			'p_address' => $this->input->post("address"),
			'p_cat_shot_code' => $this->input->post("shot"),
			'p_catid' => $this->input->post("catid"),
			'p_task_id' => $this->input->post("taskid"),
			'p_userid' => $this->input->post("userid"),
			'p_pid' => $this->input->post("pid"),
			//~ 'status' => 2,						
			);

			$data['craetepurchaseorder'] = $craetepurchaseorder = $this->purchaseorder_model->createpurchaseorder($data1);
		     
	


			$data['base_url'] = base_url();		
			$data['current_menu']  = "service";
			$data['sub_menu']  = "service_list";				
			$adminemail = 'admin@1ss.com.sg';
			$adminname = '1SS';
		 $email = $craetepurchaseorder->p_email;
			//~ exit;
			$company_name = '1SS';
			$company_email_address = $adminemail;
			$filename= 'purchase'.date("mdHis");
			$pdfFilePath = FCPATH."downloads/reports/$filename.pdf";
			$pdfFilePathbase = base_url()."downloads/reports/$filename.pdf";
			if (file_exists($pdfFilePath) == FALSE)
			{
				ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
				//$message = $this->load->view('front/purchase_pdfweb', $data,true); // render the view into HTML
				$message .= '<link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/bootstrap-grid.css" >
<link rel="stylesheet" href="'.base_url().'assets/datetimedrapper/css/home.css"><link rel="stylesheet" href="'.base_url().'assets/listeo/css/style.css">';
$jobname = unserialize($craetepurchaseorder->p_jobname);
	  $jobprice = unserialize($craetepurchaseorder->p_jobprice) ;
	  	 $varbookdateform = date('d/m/Y',strtotime($craetepurchaseorder->p_booking_date)).' at '.strtolower($craetepurchaseorder->p_booking_time);
	  	 $p_sr_code = $craetepurchaseorder->p_sr_code;
	  	  $p_issue_date =$craetepurchaseorder->p_issue_date;
	  	 $p_address = $craetepurchaseorder->p_address;
	  	  $p_first_name =$craetepurchaseorder->p_first_name;
	  	  $p_email =$craetepurchaseorder->p_email;
	  $message .= '<div id="invoice" style="background: #fff;width: auto;max-width: 900px;padding: 60px;margin: 30px auto 60px; border-radius: 4px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.3);"><div style="margin-right: -15px;margin-left: -15px;"><div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width:20%;" src="'.base_url().'assets/listeo/images/logo-1SS.png" alt=""></div><div class="col-md-6" style="position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;width: 50%;float:right;"><p id="details" style="text-align: right;"><strong style="font-weight: 600;color: #333;display: inline-block;">Order:</strong>'.$p_sr_code.'<br><strong  style="font-weight: 600;color: #333;display:inline-block;">Issued:</strong>'.$p_issue_date.'<br>Due 7 days from date of issue</p></div></div><div class="row" style="margin-right: -15px;margin-left: -15px;"><div class="col-md-12" style="color: #707070;font-size: 15px;line-height: 27px;width:100%;float: left;"><h2 style="  font-weight: 300;color: #333;clear: both;margin: 0;font-size: 28px;line-height: 1;margin: 15px 0 45px!important;">Purchase Order</h2></div><div class="col-md-6" style="color: #707070;font-size: 15px;line-height: 27px;width: 40%;float:left;" >	<strong class="margin-bottom-5" style="font-weight: 600;font-size: 20px;color: #333;display: inline-block;margin-bottom:5px">Supplier</strong><p style=" color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;">'. $p_address.'</p></div><div class="col-md-6" style="width: 40%;"></div><div class="col-md-6" style="width: 40%;float:right;"><strong class="margin-bottom-5" class="margin-bottom-5" style="font-weight: 600;color: #333;display:inline-block;margin-bottom:5px;font-size: 16px;line-height:29px;">Customer</strong><p style="background-color: white;color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;">'.$p_first_name.'<br>'.$p_email.'</p></div></div><div class="row" style="margin-right: -15px;margin-left: -15px;"><div class="col-md-12" style="width:100%"><table class="margin-top-20" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;"><tr style="border-bottom: unset;color: #707070; font-size: 15px;line-height: 27px;display: table-row;vertical-align: inherit;padding: 15px 0;text-align: left;"><th style="font-weight: 700;border-bottom: 1px solid #ddd;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Description</th><th style="font-weight:700;border-bottom:1px solid #ddd;font-size:16px;color:#333;padding:15px 0;text-align:right">Estimated Cost</th></tr><tr class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;">'. $varbookdateform.'</td></tr>';
				for($i=0; $i<count($jobname);$i++)		{ 
					$message .='<tr style="color: #707070; font-size: 15px;line-height: 27px;" class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;">'.$jobname[$i].' </td><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align:right;"> $'.$jobprice[$i].'</td></tr>';
				}
					$message .='</table></div><div class="col-md-4 col-md-offset-8" style="margin-left: 66.66666667%;" ><table id="totals" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;"><tr style="display: table-row;vertical-align: inherit;border-color: inherit;"><th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Total Due</th> <th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: right;" ><span style="  position: relative;display: inline-block; height: 100%;">$'.array_sum($jobprice).'</span></th></tr></table></div></div><!-- Footer --><div class="row" style="margin-right: -15px;margin-left: -15px;"><div class="col-md-12" id="terms" ><p style="font-size: .9em;line-height: 1.3em;padding: 20px 0 60px; display: block;"><strong class="margin-bottom-5"  style="font-weight: 600;color: #333;margin-bottom:5px; display: block;padding-bottom: 10px;">Terms &amp; Conditions</strong>	very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here...</p>	<ul id="footer" style="width: 100%;border-top: 1px solid #ddd;margin: 60px 0 0;padding: 20px 0 0;list-style: none;font-size: 15px;"><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><span>www.stallioni.com</span></li><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li><li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;">+65 6666 5555</li></ul></div></div></div>';
				//~ exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
				$pdf->WriteHTML($message); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F'); // save to file because we can
				//~ $purchasepdf = array('purchase_pdf_link' => "$filename.pdf");
			}
			//~ echo $pdfFilePath;
			//~ echo $email
				$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);;
			$this->email->from($adminemail);
			$this->email->to($email);
			$this->email->subject($company_name.' - Purchase Order '.$craetepurchaseorder->p_sr_code);
			$this->email->message('Dear '.$craetepurchaseorder->p_first_name.',<br/>As confirmed over the phone, attached is your purchase order. Please go to our web or mobile applications to approve the Purchase Order before our team can make their way down to completed the requested tasks. Thank you.');
			$this->email->attach($pdfFilePathbase);
			$this->email->send();


			//~ echo $pdfFilePathbase;
			//~ echo $this->email->print_debugger();
//~ exit;
			//~ if($this->email->print_debugger()){
				//~ echo 'send';
				//~ return true;
			//~ }
			//~ else
			//~ {
				//~ echo "email send failed";
				//~ return false;
			//~ }
		
		$cateid = $this->input->post('catid');
		$bookdate = $this->input->post('bookingdate');
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
	//~ exit;
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


		}
	$booksessvalold = array('oldbooksess_date'=>$this->input->post('oldbooksess_date'),'oldbooksess_time'=> $this->input->post('oldbooksess_time'),'oldbooksess_taskcatid'=> $this->input->post('oldbooksess_taskcatid'));
		
		
		$booksess = array('booksess_taskcatid' => $this->input->post('catid'),'booksess_date'=>$this->input->post('bookingdate'),'booksess_time'=>$this->input->post('booking_time'),'booksess_maxappointment'=>$this->input->post('maxappointment'),'booksess_incdescaptmnt'=>$subtotal,'booksess_maxcalcount'=>$morafterevensess,'booksess_status'=>$sess_status);
		//~ var_dump($booksess);
		//~ exit;
		$this->task_model->book_sessupdate($booksess,$booksessvalold);
			
			
			
			
			
			if(!empty($craetepurchaseorder))
			{
				$this->session->set_flashdata('success', '<div class="notification success closeable"><p><span>' .$this->input->post("pname").'</span> appointment have been updated successfully! The Purchase Order have been sent to the user.</p><a class="close"></a></div>');
				//redirect('admin/appointment');					
			}
			else	
			{	    
				//redirect('admin/appointment');	
			}
		}
		else
		{
			//redirect('admin/appointment');
		}
			
	}
	
	public function getaddress()
	{
		
		$propertyid = $this->input->post('propertyid');
		$get_address = $this->purchaseorder_model->getaddress($propertyid);
	}
			public function getawaitconfirmationdata()
	{
				//$details = $this->purchaseorder_model->getpending_task(); 
	//~ $count = count($details);
		$checkdata = $this->purchaseorder_model->getpending_task();
		$checkdatacnt = count($checkdata);
		if($checkdatacnt > 0 )
		{
				echo json_encode(array('status'=>'success','countdata'=>$checkdatacnt));
			}
			
	}
		public function getscheduledata()
	{
				//~ $schedule = $this->purchaseorder_model->getawaitingservice_task();
	//~ $count_service = count($schedule);

		$checkdata = $this->purchaseorder_model->getawaitingservice_task(); 
		$checkdatacnt = count($checkdata);
		if($checkdatacnt > 0 )
		{
				echo json_encode(array('status'=>'success','countdata'=>$checkdatacnt));
			}
			
	}
		public function getendoseservicedata()
	{
					//~ $servicecount = $this->purchaseorder_model->getservicereport_list();
	//~ $servicecountval = count($servicecount);
		$checkdata = $this->purchaseorder_model->getservicereport_list(); 
		$checkdatacnt = count($checkdata);
		if($checkdatacnt > 0 )
		{
				echo json_encode(array('status'=>'success','countdata'=>$checkdatacnt));
			}
			
	}
		
	
 

}
?>
