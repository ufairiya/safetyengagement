<?php
class Calendar_model extends CI_Model
{
    
	public $table 	  = "task_category";
	public $schedule 	  = "schedule_events";
	public $schedule_temp 	  = "schedule_temp";
	public $task 	  = "task";
	
   // Create New User
	public function taskcategory_insert($data)
	{
			$this->db->insert($this->table, $data);	
			return $this->db->insert_id();
		
	}
	
	public function getschedule_temp()
	{
		$this->db->select('temp_taskid');
		$this->db->from('schedule_temp');
		$query = $this->db->get();
		return $query->result();
		
	}
	public function addschedule_temp($data)
	{
	$this->db->select('temp_taskid');
	$this->db->from($this->schedule_temp);
	//~ $this->db->where('temp_taskid !=',$data['taskid']);
	$this->db->where('temp_taskid ',$data['temp_taskid']);
	$results1 = $query = $this->db->get();
	$res1=$results1->result();
		if(empty($res1))
		{
		$this->db->insert($this->schedule_temp, $data);	
		return $this->db->insert_id();

		}
		else
		{
		$this->db->where('temp_taskid ',$data['temp_taskid']);
	return	$this->db->update($this->schedule_temp, array('temp_user_id'=>$data['temp_user_id']));


		}
	}
		public function gettempdatadeviceid()
	{
		$last_serv = $this->db->select('*')->order_by('temp_id','asc')->get($this->schedule_temp)->result_array();
	
			foreach ($last_serv as $item)
			{
			$dataitem[] = $item['temp_user_id'];
			}  

			$this->db->select('*');
			$this->db->from('user_master');
			$this->db->where_in('id_user_master',$dataitem);
			$resdevquer  = $this->db->get();
			$resdev  = $resdevquer->result();
			//~ echo "<pre>";

			//~ var_dump($resdev);
			//~ exit;
			return 	$resdev;

	}
	public function addschedule()
	{
		$last_serv = $this->db->select('*')->order_by('temp_id','asc')->get($this->schedule_temp)->result();

		foreach($last_serv as $last_serv_det)
		{
		
			$this->db->where('id ',$last_serv_det->temp_taskid);
			$this->db->update($this->task, array('contr_id'=>$last_serv_det->temp_user_id,'schedule_date'=>date("d-m-Y "),'status'=>6));

		}	 
	
	}
	function multidimensional_array_to_single_dimension_array($array) {  
	if (!$array) return false; 
	   $flat = array(); 
	   $iterator  = new RecursiveIteratorIterator(new RecursiveArrayIterator($array)); 
	   
	   foreach ($iterator as $value) $singhal[] = $value; 
	   return $singhal; 


	  
	 $res_sche= multidimensional_array_to_single_dimension_array($twoDimensionalArray); 


	$schres = array('s_task_id' =>$res_sche[0],'s_user_id'=>$res_sche[21],'s_wkpno' =>$res_sche[25],'s_esthours'=>$res_sche[8],'s_bookdate'=>$res_sche[6]);
		
	//~ exit;

				//~ var_dump($resvaldata);
				$this->db->insert($this->schedule, $schres);	
				return $this->db->insert_id();
		
	}


	public function get_events()
	{
		 $events =$this->db->order_by('ID',"asc")->get("calendar_events");
		return $events->result_array();
	   
	}
	public function get_task_event()
	{
		 $this->db->select('calendar_events.*,task.*,user_master.*');
		 $this->db->from('calendar_events');
		 $this->db->join('task', 'task.id = calendar_events.s_task_id'); 
		 $this->db->join('user_master', 'user_master.id_user_master = task.user_id'); 
		 $query = $this->db->get();
		 return $query->result();
	   
	}

	public function get_task_event_sche($sche_id)
	{
		 $this->db->select('calendar_events.*,user_master.*,user_property.*');
		 $this->db->select('task.*','task.description as taskdecription',FALSE);
		 $this->db->from('calendar_events');
		 $this->db->join('task', 'task.id = calendar_events.s_task_id'); 
		 $this->db->join('user_master', 'user_master.id_user_master = calendar_events.s_user_id'); 
		 $this->db->join('user_property', 'task.apartment_id = user_property.ID'); 
		 $this->db->where('calendar_events.ID',$sche_id); 
		 $query = $this->db->get();
		 return $query->row();
	   
	}


	public function add_event($data)
	{
		 $last_id = $this->db->select('id')->order_by('id','desc')->limit(1)->get('calendar_events')->row('id');
		 $last_id_val = $last_id +1;
	$data['sche_code'] = $data['sche_code'].$last_id_val;
		//~ var_dump($data);
		//~ exit;
		$this->db->insert("calendar_events", $data);
	}

	public function get_event($id)
	{
		return $this->db->where("ID", $id)->get("calendar_events");
	}

	public function update_event($id,$data)
	{
		$this->db->where("ID", $id)->update("calendar_events", $data);
	}

	public function delete_event($id)
	{
		$this->db->where("ID", $id)->delete("calendar_events");
	}
	public function get_list_contractorname()
	{
	   $contname_res = $this->db->where("user_type", 'contractor')->get("user_master");
			return $contname_res->result();

	}
	public function get_list_task()
	{
			$this->db->select('task.*,user_property.property_address');
			//~ $this->db->where("task_catid", $condition);
			$this->db->order_by("task_catid","asc");
			$this->db->from('task');
			$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 		
			$query = $this->db->get();
			return $query->result();
			
			//$contname_res = $this->db->where("task_catid", $condition)->get("task");
			//return $contname_res->result();
	}
	public function get_list_taskbyid($condition)
	{
			$this->db->select('task.*,user_property.property_address,task_category.taskcatshort_code');
			$this->db->where("task_catid", $condition);
			$this->db->order_by("task_catid","asc");
			$this->db->from('task');
			$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 	
			$this->db->join('task_category', 'task_category.id = task.task_catid'); 			
			$query = $this->db->get();
			return $query->result();
			
			//$contname_res = $this->db->where("task_catid", $condition)->get("task");
			//return $contname_res->result();
	}
	
	public function get_list_task_stus($condition,$statusid)
	{
			$this->db->select('task.*,user_property.property_address');
		
			$this->db->from('task');
			$this->db->join('user_property', 'task.apartment_id = user_property.ID'); 	
				$this->db->where("task_catid", $condition);
			$this->db->where("task.status", $statusid);	
			$query = $this->db->get();
			return $query->result();
			
			//$contname_res = $this->db->where("task_catid", $condition)->get("task");
			//return $contname_res->result();
	}
	public function get_assignedcontractor()
	{
			$this->db->select('*');
			$this->db->from('task');
			$this->db->where('status',6);

			$query = $this->db->get();
			return $query->result();		
	}
	public function get_assignedcontractor_id($id)
	{
			$this->db->select('*');
			$this->db->from('task');
			$this->db->where('status',$id);
			

			$query = $this->db->get();
			return $query->result();		
	}
	public function get_allcontractor()
	{
		
					
			$this->db->select('*');
			$this->db->where("user_type", "contractor");
			$this->db->from('user_master');
			$this->db->where("status",1);
			$this->db->order_by("companyname"); 
			$query = $this->db->get();
			return $query->result();		
	}
	public function get_allcontractor_date($date)
	{
			$this->db->select('*');
			$this->db->where("user_type", "contractor");
			$this->db->from('user_master');
			$this->db->join('task', 'task.contr_id = user_master.id_user_master');
			$this->db->where("user_master.status",1);
			$this->db->where("task.booking_date",$date);

			$this->db->order_by("companyname"); 
			$query = $this->db->get();
			return $query->result();		
	}
	public function geteditschedule_list($list_id)
	{
		$contname_res = $this->db->where("ID",$list_id)->get("calendar_events");
		return $contname_res->result();

	}
	public function task_category()
	{
		 $this->db->select('*');
		 $this->db->from('task_category');
		 $this->db->where('status', '1');
		 $query = $this->db->get();
		 return $query->result();
	}
	public function changecancelassign($cancelid)
	{
		return $this->db->where("id", $cancelid)->update("task", array('status'=> 5));

	}
	public function awaitingcount_bookingdate($bookdate)
	{
		$this->db->select('task_catid');
		$this->db->where('booking_date', $bookdate);
		$this->db->where('status', '3');
		$this->db->from('task');
		$query = $this->db->get();
		return $query->result();
	}
	public function gettaskcatids()
	{
		$this->db->select('id');
		$this->db->from('task_category');
		$query = $this->db->get();
		return $query->result();
	}
}
?>
