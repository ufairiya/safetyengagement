<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('admin/login');
		}
		$this->load->model('calendar_model');		
		$this->load->model('purchaseorder_model');
		$this->load->model('task_model');
		$this->load->model('service_model');
		$this->load->model('property_model');
		$this->load->model('dashboard_model');
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
	}
	public function index()
	{				
		$user_id = get_active_user_id();
		$data['base_url'] = base_url();
		$data['view_file']  = "dashboard";
		$data['current_menu']  = "dashboard";
		$details = $this->purchaseorder_model->getpending_task(); 
		$get_com_t = $this->dashboard_model->get_com(); 
		$data['get_com'] = $this->dashboard_model->get_com(); 
		$data['get_sp'] = $this->dashboard_model->get_sp(); 
		$data['get_stu'] = $this->dashboard_model->get_stu(); 
		$data['get_post_job'] = $this->dashboard_model->get_post_job(); 
		$data['get_bid_job'] = $this->dashboard_model->get_bid_job(); 
		$data['get_award_job'] = $this->dashboard_model->get_award_job(); 
		$data['get_complet_job'] = $this->dashboard_model->get_complet_job(); 
		if(!empty($get_com_t))
		{
			foreach($get_com_t as $com_t_val)
			{
				$time=strtotime($com_t_val->created_on);
				$month=date("m",$time);
				$year=date("Y",$time);
				if($month == date('m') &&  $year == date("Y"))
				{
					$adrr[] = $com_t_val->created_on;
				}
				else
				{
					$adrr[] = "";
				}
			}
		}
		else
		{
			$adrr[] = "";
		}
		$data['count'] = count(array_filter($adrr));
		$taskcomplete = $this->task_model->getcompleteall_task();
		if(!empty($taskcomplete))
		{
			foreach($taskcomplete as $taskcompleteval)
			{
				if($taskcompleteval->created_date != "")
				{
					$date = DateTime::createFromFormat('d/m/Y', $taskcompleteval->created_date);
					$srtimeformat = $date->format('m/d/Y');
					$srtime = strtotime($srtimeformat);
					$srmonth= date("m",$srtime);
					$sryear= date("Y",$srtime);
					if($srmonth == date('m') &&  $sryear == date("Y"))
					{
						$taskcompletearr[] = $taskcompleteval->created_date;
						$respri[] = unserialize($taskcompleteval->jobprice);
					}
					else
					{
						$taskcompletearr = array();
						$respri[] = array();
					}
				}
			}	
		}
		else
		{
			$taskcompletearr = array();
			$respri[] = array();
		}	
			$res = array();
			foreach($respri as $value) 
			{
				foreach($value as $key => $number) 
				{
					(!isset($res[$key])) ?
					$res[$key] = $number :
					$res[$key] += $number;
				}
			}
		$data['count_taskcomplete'] = count($taskcompletearr);
		$data['donetaskpricetotal'] = array_sum($res);
		$servicecount = $this->task_model->getawaiting_task();
		$poapprcnt[] = "";
		if(!empty($servicecount))
		{
			foreach($servicecount as $servicecountval)
			{
				if($servicecountval->confirmdate != "")
				{
					$poapptime=strtotime($servicecountval->confirmdate);
					$poappmonth=date("m",$poapptime);
					$poappyear=date("Y",$poapptime);
					if($poappmonth == date('m') &&  $poappyear == date("Y"))
					{
						$poapprcnt[] = $servicecountval->confirmdate;
					}
					else
					{
						$poapprcnt[] = "";
					}
				}
			}
		}
		 else
			{
				$poapprcnt[] = "";
			}
		$data['poapprcnt'] = count(array_filter($poapprcnt));
		$usermail  = $this->users_model->getUsers(array('id_user_master'=>$user_id));
		$data['utype'] = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$this->template->load_frontend_template($data);
	}
	function barGraph()
	{
        $count = $this->dashboard_model->count_messages();
        $data = array(
                array(
                    'section'=>'Inbox',
                    'messages' => $count['inbox']
                    ),
                array(
                    'section'=>'Sent Items',
                    'messages' => $count['sent']
                    )
            );
        echo json_encode($data);
    }
	function lineGraph()
	{
		$data = array();
		for($i=0; $i <= 15; $i++)
		{             
			$date = date ( 'Y-m-d', strtotime ( "-$i day" ) );
			$count = $this->dashboard_model->count_inserted($date);
			$data[] = array('period' => $date,'inbox' => $count['inbox'],'sent' => $count['sent']);
		}
		echo json_encode($data); 
	}
    public function post_cal()
    {
		$eid = $this->input->post('id');
		if($eid == '1')
		{
			$get_post_job = count($this->dashboard_model->get_post_job()); 
			$get_bid_job = count($this->dashboard_model->get_bid_job()); 
			$get_award_job = count($this->dashboard_model->get_award_job()); 
			$get_complet_job = count($this->dashboard_model->get_complet_job()); 
			$all_data = array('post_job'=>$get_post_job,'bid_job'=>$get_bid_job,'award_job'=>$get_award_job,'complet_job'=>$get_complet_job);
			echo json_encode($all_data); 
		}
		else if($eid == '2')
		{
			$date_we = date('Y-m-d');
			$get_post_job = count($this->dashboard_model->get_post_today($date_we)); 
			$get_bid_job = count($this->dashboard_model->get_bid_today($date_we)); 
			$get_award_job = count($this->dashboard_model->get_award_today($date_we)); 
			$get_complet_today = count($this->dashboard_model->get_complet_today($date_we)); 
			$all_data = array('post_job'=>$get_post_job,'bid_job'=>$get_bid_job,'award_job'=>$get_award_job,'complet_job'=>$get_complet_today);
			echo json_encode($all_data); 
		}
		else if($eid == '3')
		{
			$income1 = count($this->dashboard_model->income_result_week_vise());
			$income_bid = count($this->dashboard_model->income_result_week_vise_bid());
			$income_award = count($this->dashboard_model->income_result_week_vise_award());
			$income_comp = count($this->dashboard_model->income_result_week_vise_comp());
			$all_data = array('post_job'=>$income1,'bid_job'=>$income_bid,'award_job'=>$income_award,'complet_job'=>$income_comp);
			echo json_encode($all_data); 
		}
		else if($eid == '4')
		{
			$income2 = count($this->dashboard_model->income_result_month_vise());
			$income2_bid = count($this->dashboard_model->income_result_month_vise_bid());
			$income2_award = count($this->dashboard_model->income_result_month_vise_award());
			$income2_comp = count($this->dashboard_model->income_result_month_vise_comp());
			$all_data = array('post_job'=>$income2,'bid_job'=>$income2_bid,'award_job'=>$income2_award,'complet_job'=>$income2_comp);
			echo json_encode($all_data); 
		}
		else if($eid == '5')
		{
			$income3 = count($this->dashboard_model->income_result_year_vise());
			$income3_bid = count($this->dashboard_model->income_result_year_vise_bid());
			$income3_award = count($this->dashboard_model->income_result_year_vise_award());
			$income3_comp = count($this->dashboard_model->income_result_year_vise_comp());
			$all_data = array('post_job'=>$income3,'bid_job'=>$income3_bid,'award_job'=>$income3_award,'complet_job'=>$income3_comp);
			echo json_encode($all_data); 
		}
		else
		{
		}
    }
}	
