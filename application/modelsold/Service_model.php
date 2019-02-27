<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends CI_Model{
    
	public $table 			= "task_category";
	public $service_report 	= "service_report";
	public $task            = "task";
	
   // Create New User
	public function get_user_detailss()
    {		
        $this->db->select('*');
        $this->db->from('user_master');
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_report($scheid)
	{
		$this->db->select('*');
        $this->db->from('service_report');
        $this->db->where('sr_id',$scheid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	
	public function get_schedule_events($contractorid)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from($this->task);			
		$this->db->where('task.contr_id',$contractorid); 
		$this->db->where('task.service_report_status',0);
		$this->db->where('task.status !=',5); 
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$this->db->order_by('task.booking_date', 'asc'); 
		$query = $this->db->get();
		return $query->result();  
	}
	public function get_schedule_events_past($contractorid)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from($this->task);			
		$this->db->where('contr_id',$contractorid); 
		$this->db->where('service_report_status',1); 
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$query = $this->db->get();
		return $query->result();  
	}
	public function get_schedule_total($contractorid)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from($this->task);			
		$this->db->where('contr_id',$contractorid); 
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$query = $this->db->get();
		return $query->result();  
	}
	public function get_service_report_details($taskid)
	{
		$this->db->select('service_report.*');		
		$this->db->from($this->service_report);			
		$this->db->where('sche_id',$taskid); 		
		$query = $this->db->get();
		return $query->row();  
	}	
	public function get_service_report_details_api($us_id,$t_id)
	{
		//~ $this->db->select('service_report.*');		
		//~ $this->db->from($this->service_report);			
		//~ $this->db->where('sche_id',$taskid); 		
		//~ $query = $this->db->get();
		//~ return $query->row();  
		
		$this->db->select('*');
		$this->db->from($this->service_report);		
		$this->db->where('status',2);
		$this->db->where('sche_id',$t_id);
		$this->db->where('us_id',$us_id);
		$query=$this->db->get();
		
		return $result = $query->row();
		
	}	
	public function get_task_event_sche($sche_id)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from('task');		
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$this->db->where('task.id',$sche_id); 
		$query = $this->db->get();
		return $query->row();
	}
	
	public function insert_schedue($data)
	{
		$this->db->insert($this->service_report, $data);	
		return $this->db->insert_id();		
	}
	public function insert_schedue_servicerep($data)
	{
		$this->db->insert($this->service_report, $data);	
		return $this->db->insert_id();		
	}
	public function services_insert($data)
	{
		$this->db->insert($this->table, $data);	
		return $this->db->insert_id();		
	}
	
	public function services_update($sreportid,$data)
	{
		
		
		$this->db->where('id',$sreportid); 
		return $this->db->update($this->table, $data);	
		
	}
	public function update_schedule($data,$sreportid)
	{
		$this->db->where('sr_id',$sreportid); 
		return $this->db->update($this->service_report, $data);	
	}
	public function update_taskschedule_report($data,$sreportid)
	{
		$this->db->where('id',$sreportid); 
		return $this->db->update($this->task, $data);	
	}
	public function update_invoicecode_report($sreportid,$data)
	{
		$this->db->where('sr_id',$sreportid); 
		return $this->db->update($this->service_report, $data);	
	}
	public function  update_schedule_report_status($data,$sreportid)
	{
		$this->db->where('sr_id',$sreportid); 
		return $this->db->update($this->service_report, $data);
	}
	public function get_taskservice_report($s_repid)
	{
		$this->db->select('service_report.*,task.*');
		$this->db->from('service_report');		
		$this->db->join('task','service_report.sche_id = task.id');
		$this->db->where('sr_id',$s_repid); 
		$query = $this->db->get();
		return $query->row();  
	}
	
	public function get_ss_rep_taskid($sr_id)
	{
		$this->db->select('*');
		$this->db->from($this->service_report);
		$this->db->where('sr_id',$sr_id); 
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_task_event_sche_report($sche_id)
	{
		$this->db->select('task.*,service_report.*,user_master.phone as user_phone,user_master.email as user_email');
		$this->db->from('task');
		$this->db->join('user_master','task.user_id=user_master.id_user_master');
		$this->db->join('service_report','task.id=service_report.sche_id');
		$this->db->where('id',$sche_id); 
		$query = $this->db->get();
		return $query->row();  
	}
	public function get_contname($sche_id)
	{
		$this->db->select('task.*,service_report.*,user_master.phone as user_phone,user_master.email as user_email');
		$this->db->from('task');
		$this->db->join('user_master','task.user_id=user_master.id_user_master');
		$this->db->join('service_report','task.id=service_report.sche_id');
		$this->db->where('id',$sche_id); 
		$query = $this->db->get();
		return $query->row();  
	}
	public function get_service_exist($chkwhere)
	{
		$this->db->select('*');
		$this->db->from($this->service_report);
		$this->db->where($chkwhere); 
		$query = $this->db->get();
		$rest = $query->result();
		if(!empty($rest))
		{
			 return 1;
		}
		else
		{
			return 0;	 
		}  
	}
	public function select_option($id)
	{

		$this->db->select('task.*,user_master.email as umail');
		$this->db->from('task');
		$this->db->join('user_master','user_master.id_user_master=task.user_id');
		$this->db->where('task.id',$id);
		$query=$this->db->get();
		return $result = $query->row();	
	}
	public function select_service($id)
	{

		$this->db->select('*');
		$this->db->from('calendar_events');
		$this->db->where('serv_id',$id);
		$query=$this->db->get();
		return $result = $query->row();	
	}
	public function getservicereport_list()
	{
		$this->db->select('service_report.*,user_master.username as contname,user_master.companyname');
		$this->db->from($this->service_report);
		$this->db->join('user_master','user_master.id_user_master=service_report.contractor_id');
		$this->db->where('service_report.status',1);
		$query=$this->db->get();
		return $result = $query->result();	
	}
	public function getservicereport_list_view()
	{
		$this->db->select('service_report.*,user_master.username as contname,user_master.companyname');
		$this->db->from($this->service_report);
		$this->db->join('user_master','user_master.id_user_master=service_report.contractor_id');
		$this->db->where('service_report.status',2);
		$query=$this->db->get();
		return $result = $query->result();	
	}
	public function getinvoicereport_list_view()
	{
		$this->db->select('service_report.*,user_master.username as contname,user_master.companyname');
		$this->db->from($this->service_report);
		$this->db->join('user_master','user_master.id_user_master=service_report.contractor_id');
		$this->db->where('service_report.status',2);
		$query=$this->db->get();
		return $result = $query->result();
	}	

	public function get_servicereport_data($sr_id)
	{
	
		$this->db->select('service_report.*,user_master.username as contname,user_master.companyname');
		$this->db->from($this->service_report);
		$this->db->join('user_master','user_master.id_user_master=service_report.contractor_id');
		$this->db->where('service_report.status',1);
		$this->db->where('service_report.sr_id',$sr_id);
		$query=$this->db->get();
		
		return $result = $query->result_array();	
		
	}
		public function get_servicereport_checkendorse_list($ser_rp_id,$us_id,$issuedate)
	{
	
		$this->db->select('*');
		$this->db->from($this->service_report);		
		$this->db->where('status',1);
		$this->db->where('issueddate',$issuedate);
		$this->db->where('sr_id !=',$ser_rp_id);
		$this->db->where('us_id',$us_id);
		$query=$this->db->get();
		
		return $result = $query->result();	
		
	}
	public function get_servicereport_pastrequest($sr_id,$us_id,$issuedate)
	{
		$this->db->select('*');
		$this->db->from($this->service_report);	
		$where = '(status=1 or status = 2)';
		$this->db->where($where);
		$this->db->where('sr_id',$sr_id);
		$this->db->where('created_date',$issuedate);
		$this->db->where('us_id',$us_id);
		$query=$this->db->get();
		
		return $result = $query->result();	
		
	}
	public function get_servicereport_data_generatedata($taskid)
	{
$this->db->select('*');		
		$this->db->from($this->service_report);			
		$this->db->where('sche_id',$taskid); 		
		$query = $this->db->get();
		return $query->row();  
		
	}
	public function get_servicereport_data_generate($ser_id,$us_id,$issuedate)
	{

		$this->db->select('*');
		$this->db->from($this->service_report);		
		$this->db->where('status',2);
		$this->db->where('created_date',$issuedate);
		$this->db->where('us_id',$us_id);
		$query=$this->db->get();
		
		return $result = $query->result();	
		
		
		
	}
public function get_categories()
{
$this->db->select('*');
       $this->db->from($this->table);
       $this->db->where('status !=',2);
   $query = $this->db->get();
return $result = $query->result();
}
public function get_categorybyid($id)
{
$this->db->select('*');
$this->db->where('id',$id);
       $this->db->from($this->table);
   $query = $this->db->get();
return $result = $query->row();
}
public function get_price($id)
{
$this->db->select('*');
$this->db->where('id',$id);
       $this->db->from('prices');
   $query = $this->db->get();
return $result = $query->result();
}
	public function changestatus_servicereport_data($ser_id)
	{
		$data = array('status'=>2);	
		$this->db->where("sr_id IN (".$ser_id[0].")",NULL, false); 
		return $this->db->update($this->service_report, $data);
	}
	public function update_statusservice($ser_id)
	{
		$data = array('status'=>2,'endorse_date'=>date('d/m/Y'));	
		$this->db->where("sr_id",$ser_id); 
		return $this->db->update($this->service_report, $data);
	}
	public function services_changestatusupdate($ser_id,$data)
	{
		$this->db->where("id",$ser_id); 
		return $this->db->update($this->table, $data);
	}
	
	
	public function uniquecheckservice_title($tasktitle)
	{
		$this->db->select('*');
       $this->db->from($this->table);
       $this->db->where('taskcategory_name ',$tasktitle);
		$result = $this->db->get();
		return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';

	}
		public function checkassigncont($serid)
	{
		$this->db->select('*');
        $this->db->from('user_master');
       	$this->db->where('user_type','contractor'); 
		$result = $this->db->get();
		return $result->result(); 
	}
	public function getscheduleeventswithtaskid_api($contractorid,$taskid)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from($this->task);			
		$this->db->where('task.contr_id',$contractorid); 
		$this->db->where('task.id',$taskid); 
		//$this->db->where('task.service_report_status',0);
		$this->db->where('task.status !=',5); 
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$query = $this->db->get();
		return $query->result();  
	}
	public function get_task_event_sche_api($sche_id,$userid)
	{
		$this->db->select('task.*,user_master.username,user_master.email,user_master.phone,user_property.*');		
		$this->db->from('task');		
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id '); 
		$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		$this->db->where('task.id',$sche_id); 
		$this->db->where('task.contr_id',$userid); 
		$query = $this->db->get();
		return $query->row();
	}
	public function get_schedule_api($taskid)
	{
		$this->db->select('*');
		$this->db->from('service_report');
		$this->db->where('sche_id',$taskid);
		$query=$this->db->get();
		return $result = $query->row();	
	}
	public function delete_category($delete_id)
	{
		$this->db->where('id', $delete_id);
		$this->db->delete('task_category');
	}

}
?>
