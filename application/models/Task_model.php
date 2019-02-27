<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model{
    
	public $table = "task_category";
	
   // Create New User
	public function taskcategory_insert($data)
	{
			$this->db->insert($this->table, $data);	
			return $this->db->insert_id();
		
	}
		public function get_task_details()
    {
		
       $this->db->select('*');
        $this->db->from('task_category');
        $this->db->where('status !=',2);
        $this->db->where('status !=',0);
	    $query = $this->db->get();
		return $result = $query->result();
	}

	public function task_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	
	public function getedittask_list($id)
    {
	   $this->db->select('*');
       $this->db->from('task_category');
       $this->db->where('id',$id);
	   $query = $this->db->get();
	  return $result = $query->row();
	}
	
	public function task_delete_permanently($where = array())
	{		
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->delete($this->table);
	}
	public function task_delete($data,$where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}
	public function task_insert($data,$shortcode)
	{
		$this->db->insert('task', $data);	
		$lid = $this->db->insert_id();
		$newDate = date("Ymd");
		$shortcode_val = array('SR_code'=>'SC'.$newDate.$shortcode.'00'.$lid );
		$this->db->where('id',$lid);
		return $this->db->update('task', $shortcode_val);		
	}
	 public function update_t($data, $where = array())
    {
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update('task', $data);
    }
	public function get_task1_details()
    {
		
		$this->db->select('*');
        $this->db->from('task');
	    $query = $this->db->get();
		return $result = $query->result();
	}

	public function get_list_task($id)
    {
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function task1_delete_permanently($where = array())
	{	
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->delete('task');
	}
	public function task1_delete($data,$where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update('task', $data);
	}	
	public function get_user_details()
    {	
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('user_type !=', 'contractor');
		$this->db->where('user_type !=', 'superuser');
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function get_user_task_category()
    { 		
        $this->db->select('*');
        $this->db->from('task_category');
        
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_task_categiriesmaxappoint($catid)
    { 		
        $this->db->select('max_appointment');
        $this->db->from('task_category');
		$this->db->where('id',$catid);

	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function get_task_cate($catid)
    { 		
		$this->db->select('*');
		$this->db->where('id',$catid);
		$this->db->from('task_category');
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function get_task_cate_servicecheck($cateid)
    { 		
		$this->db->select('*');
		$this->db->from('task_category');
		$this->db->where('id',$cateid);
		$this->db->where('status',1);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function update_edit_catumg($data,$where = array())
	{
		if (count($where) > 0)
		$this->db->where($where);
		return $this->db->update('task', $data);
	}

	public function get_front_task_details_pastrecord($user_id)
    {	
		$status = array('4', '5');	
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('user_id',$user_id);
		$this->db->where_in('status',$status);
		
		$this->db->order_by('status',"asc");
		$this->db->order_by('booking_date',"asc");
		$query = $this->db->get();
		return $result = $query->result();
	}
	
	public function get_front_task_details($user_id)
    {	
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('user_id',$user_id);
		$this->db->where('status',1);
		$this->db->order_by('status',"asc");
		$this->db->order_by('booking_date',"asc");
		$query = $this->db->get();
		return $result = $query->result();
	}
		public function get_front_task_details_api($user_id)
    {	
		$this->db->select('task.*,task_category.iconcode');
		$this->db->from('task');
		$this->db->join('task_category','task_category.id = task.task_catid');
		$this->db->where('task.user_id',$user_id);
		$this->db->where('task.status',1);
		$this->db->order_by('task.status',"asc");
		$this->db->order_by('task.booking_date',"asc");
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function get_front_task_details1($user_id)
    {		
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('user_id',$user_id);
        $this->db->where('status',2 );
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"asc");
	    $query = $this->db->get();
		return $result = $query->result();
	}

	public function get_front_task_details2($user_id)
    {
		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('user_id',$user_id);
        $this->db->where("(status=3 or status=6)");
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"asc");
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_front_upcoming_task_details($user_id)
    {
		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('user_id',$user_id);
         $this->db->where('status',2);
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"asc");
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_front_past_task_details($user_id)
    {
		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('user_id',$user_id);
        $this->db->where('status ',4);
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"asc");
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_front_task_declinelist($user_id)
    {
		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('user_id',$user_id);
        $this->db->where('status ',5);
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"asc");
	    $query = $this->db->get();
		return $result = $query->result();
	}	
	public function get_front_edit_details($task_id,$user_id)
    {		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('id',$task_id);
        $this->db->where('user_id',$user_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function get_front_schedule($user_id)
    {
		
		$this->db->select('*');
		$this->db->from('task');			
		$this->db->where('user_id',$user_id); 
        $this->db->where('status ',6);
        $this->db->order_by('status',"asc");
        $this->db->order_by('booking_date',"DESC");
	    $query = $this->db->get();
		return $result = $query->result();
	}	
	public function get_front_edit_details_admin($task_id)
	{
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('id',$task_id);      
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function update_booking($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where('user_id',$where);
            $this->db->where('id',$data['id']);
        return $this->db->update('task', $data);
	}
	public function property_title_update_task($aptid,$aptdata)
	{
		if (count($aptid) > 0)
		$this->db->where('apartment_id',$aptid);
		$this->db->where('status',1);
		$this->db->update('task', $aptdata);
		$updated_status = $this->db->affected_rows();
		var_dump($updated_status->id);

	}
	public function delete_task($userid,$where )
	{
	
		if (count($where) > 0)
		$this->db->where('id',$where);
		$this->db->where('user_id',$userid);
		return $this->db->delete('task');
	}
	public function get_taskimage($task_id )
	{
		
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('id',$task_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function taskcategoryshortcode($task_id )
	{
		
		$this->db->select('*');
        $this->db->from('task_category');
        $this->db->where($task_id);
	    $query = $this->db->get();
		// $result = $query->row();
		return ($query != FALSE && $query->num_rows()>0) ? 'false' : 'true';

	}
	public function get_property_task($propeyty)
	{
		$contname_res = $this->db->where("ID", $propeyty)->get("user_property");
		return $contname_res->result();
	}
	public function getallcategory()
	{
		$this->db->select('id,max_appointment');
        $this->db->from('task_category');
         $this->db->where('status','1');
        //$this->db->join('task', 'task.task_catid = task_category.id');
       // $this->db->where('booking_date',date("m/d/Y"));
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_task_cate_servicepage($catid)
	{
		$this->db->select('*');
        $this->db->from('task_category');
        $this->db->where('status','1');
        $this->db->where('id',$catid);
        $query = $this->db->get();
		return $result = $query->row();
	}
	public function tasktoday_session_morning($category_id)
	{
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('task_catid',$category_id);
		$this->db->where('booking_date',date('m/d/Y'));	
		$this->db->where('booking_time','morning');
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function tasktoday_session_afternoon($category_id)
	{
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('task_catid',$category_id);
		$this->db->where('booking_date',date('m/d/Y'));	
		$this->db->where('booking_time','afternoon');
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function tasktoday_session_evening($category_id)
	{
		$this->db->select('*');
		$this->db->from('task');
		$this->db->where('task_catid',$category_id);
		$this->db->where('booking_date',date('m/d/Y'));	
		$this->db->where('booking_time','evening');
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function getawaiting_task()
    {
		$this->db->select('task.*,user_property.*');
        $this->db->from('task');
        $this->db->join('user_property', 'task.apartment_id = user_property.ID');
        $this->db->where('status',3);
        $query = $this->db->get();
		return $result = $query->result();
	}
		public function getcomplete_task()
    {
		
       $this->db->select('*');
        $this->db->from('task');
        $this->db->where('status',6);
       
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
		public function getcompleteall_task()
    {
		
		$this->db->select('task.*,service_report.*');
        $this->db->from('task');
        $this->db->join('service_report','service_report.sche_id = task.id');
        $this->db->where('service_report.status',1);
        $query = $this->db->get();
		return $result = $query->result();
		
	}
	public function book_sessgetmaxapp($wheresess)
    {
		$this->db->select('*');
        $this->db->from('booksession');
        $this->db->where($wheresess);
        $query = $this->db->get();
		return $result = $query->result();
	}
	public function book_sessget($wheresess)
    {
		$this->db->select('*');
        $this->db->from('booksession');
        $this->db->where('booksess_status',1);
        $this->db->where('booksess_incdescaptmnt',0);
        $this->db->where($wheresess);
        $query = $this->db->get();
		return $result = $query->result();
	}
		
	public function book_sessinsert($data)
    {	
		$this->db->select('*');
        $this->db->from('booksession');
        $this->db->where('booksess_taskcatid',$data['booksess_taskcatid']);
        $this->db->where('booksess_date',$data['booksess_date']);
        $this->db->where('booksess_time',$data['booksess_time']);
        $query = $this->db->get();
		 $result = $query->row();
 //~ var_dump($data['booksess_maxcalcount']);
		if(empty($result))
		{
//~ var_dump($data['booksess_maxcalcount']);
//~ var_dump($result);

			if($data['booksess_maxcalcount'] != 0 )
			{
						 $databooksess_totbook =  1;
			}
			else
			{
				 $databooksess_totbook =  0;
				}
				
			$dataval = array( 'booksess_taskcatid' => $data['booksess_taskcatid'],'booksess_date'=>$data['booksess_date'],'booksess_time'=>$data['booksess_time'],'booksess_maxappointment'=>$data['booksess_maxappointment'],'booksess_incdescaptmnt'=>$data['booksess_incdescaptmnt'],'booksess_maxcalcount'=>$data['booksess_maxcalcount'],'booksess_totbook'=> $databooksess_totbook,'booksess_status'=>$data['booksess_status']);
				$this->db->insert('booksession', $dataval);	
			return $this->db->insert_id();
		}
		else
		{
			if(0 <  $result->booksess_incdescaptmnt)
		    {
				if($data['booksess_maxcalcount'] != 0)
				{
					$maxtotcnt = $result->booksess_totbook + 1;
				}
				else
				{
					$maxtotcnt = 0;
				}
				
			    $subtotal =$data['booksess_maxcalcount'] -  $maxtotcnt;
			
				//$subtotal = $result->booksess_incdescaptmnt - 1;
				if($subtotal == 0)
				{
					$sess_status = 1;
				}
				else
				{
					$sess_status = 0;	
				}
			}
			else
			{
				if($data['booksess_maxcalcount'] != 0)
				{
				$maxtotcnt = $result->booksess_totbook + 1;
				}
				else
				{
				$maxtotcnt = 0;
			}
				$sess_status = 1;	
				
				$subtotal = 0;	

			}
			
			$this->db->where('booksess_taskcatid',$data['booksess_taskcatid']);
			$this->db->where('booksess_date',$data['booksess_date']);
			$this->db->where('booksess_time',$data['booksess_time']);   
			return $this->db->update('booksession', array('booksess_maxappointment'=>$data['booksess_maxappointment'],'booksess_maxcalcount'=>$data['booksess_maxcalcount'],'booksess_incdescaptmnt'=>$subtotal,'booksess_totbook'=>$maxtotcnt,'booksess_status'=>$sess_status));
		}
	}

	public function book_sessupdate($booksess,$booksessvalold)
	{
		//~ if($booksess['booksess_date'] == $booksessvalold['oldbooksess_date'] && $booksess['booksess_time'] == $booksessvalold['oldbooksess_time'] && $booksess['booksess_taskcatid'] == $booksessvalold['oldbooksess_taskcatid'])
		//~ {
			$this->db->select('*');
        $this->db->from('booksession');
        $this->db->where('booksess_taskcatid',$booksess['booksess_taskcatid']);
        $this->db->where('booksess_date',$booksess['booksess_date']);
        $this->db->where('booksess_time',$booksess['booksess_time']);
        $query = $this->db->get();
		 $result = $query->row();
		 //~ var_dump($result);
		 //~ var_dump($booksess);
		 //~ var_dump($booksessvalold);
		 //~ exit;
		 if(empty($result) )
		{			
			
			 $databooksess_totbook = "";
			if($booksess['booksess_maxcalcount'] != 0)
			{
				$databooksess_totbook = 1;
			}
			else
			{
				$databooksess_totbook =  0;
			}
				$dataval = array( 'booksess_taskcatid' => $booksess['booksess_taskcatid'],'booksess_date'=>$booksess['booksess_date'],'booksess_time'=>$booksess['booksess_time'],'booksess_maxappointment'=>$booksess['booksess_maxappointment'],'booksess_incdescaptmnt'=>$booksess['booksess_incdescaptmnt'],'booksess_maxcalcount'=>$booksess['booksess_maxcalcount'],'booksess_totbook'=> $databooksess_totbook,'booksess_status'=>$booksess['booksess_status']);
				$this->db->insert('booksession', $dataval);	
				return $this->db->insert_id();
		}
		else
		{
		
			if(0 <  $result->booksess_incdescaptmnt)
		    {
				if($booksess['booksess_maxcalcount'] != 0)
				{
					$maxtotcnt = $result->booksess_totbook + 1;
				}
				else
				{
					$maxtotcnt = 0;
				}
				
					$subtotal =$booksess['booksess_maxcalcount'] -  $maxtotcnt;
			
				//$subtotal = $result->booksess_incdescaptmnt - 1;
				if($subtotal == 0)
				{
					$sess_status = 1;
				}
				else
				{
					$sess_status = 0;	
				}
			}
			else
			{
				if($booksess['booksess_maxcalcount'] != 0)
				{
					$maxtotcnt = $result->booksess_totbook + 1;
				}
				else
				{
					$maxtotcnt = 0;
				}
					$sess_status = 1;	
					
					$subtotal = 0;	

			}
				//~ echo "<pre>";
			//~ var_dump($booksess);
			//~ var_dump($result);
			//~ exit;
			if($booksess['booksess_maxcalcount'] == $result->booksess_maxcalcount)
			{	
				$this->db->where('booksess_date',$booksess['booksess_date']);
				if($booksess['booksess_time'] == $result->booksess_time)
				{	
					if(0<$result->booksess_incdescaptmnt)
					{	
						$subtotal = $result->booksess_incdescaptmnt - 1;
						$sess_status = 0;
						$maxtotcntval = $result->booksess_totbook + 1;
					}
					else
					{
						$subtotal = 0;	
						$maxtotcntval = 0;
						$sess_status = 1;  
					}
				
		  			$this->db->where('booksess_time',$booksess['booksess_time']); 
					  
				}
				else
				{
					$this->db->where('booksess_time !=',$booksess['booksess_time']); 
						if(0<$result->booksess_incdescaptmnt)
					{	
						$subtotal = $result->booksess_incdescaptmnt - 1;
						$sess_status = 0;
						$maxtotcntval = $result->booksess_totbook + 1;
					}
					else
					{
						$subtotal = 0;	
						$maxtotcntval = 0;
						$sess_status = 1;  
					}
				}   
			
					
				$this->db->where('booksess_taskcatid',$booksess['booksess_taskcatid']);      
				return $this->db->update('booksession', array('booksess_maxappointment'=>$booksess['booksess_maxappointment'],'booksess_status'=>$sess_status));
			}
			else
			{
				if($booksess['booksess_time'] == $result->booksess_time)
				{	
					if(0<$result->booksess_incdescaptmnt)
					{	
						$subtotal = $result->booksess_incdescaptmnt - 1;
						$sess_status = 0;
						$maxtotcntval = $result->booksess_totbook + 1;
					}
					else
					{
						$subtotal = 0;	
						$maxtotcntval = 0;
						$sess_status = 1;  
					}
				
		  			$this->db->where('booksess_time',$booksess['booksess_time']); 
					  
				}else
				{
					$this->db->where('booksess_time !=',$booksess['booksess_time']); 
					if(0<$result->booksess_incdescaptmnt)
					{	
						$subtotal = $result->booksess_incdescaptmnt - 1;
						$sess_status = 0;
						$maxtotcntval = $result->booksess_totbook + 1;
					}
					else
					{
						$subtotal = 0;	
						$maxtotcntval = 0;
						$sess_status = 1;  
					}
				}   
				$maxcnt = $result->booksess_maxcalcount + $booksess['booksess_maxcalcount'] - $result->booksess_totbook;
				//~ echo $result->booksess_maxcalcount;
				//~ echo $booksess['booksess_maxcalcount'];
				//~ echo $maxcnt;
				//~ exit;
				if(0 < $maxcnt)
				{
					$maxcntval = $maxcnt;
					$sess_status = 0;
					$maxtotcntval = $result->booksess_totbook + 1;
  
				}
				else
				{
					$maxcntval = 0;
					$maxtotcntval = $result->booksess_totbook;
					$sess_status = 1;  
				}	
						
				$this->db->where('booksess_date',$booksess['booksess_date']);      
				$this->db->where('booksess_taskcatid',$booksess['booksess_taskcatid']);      
				return $this->db->update('booksession', array('booksess_maxappointment'=>$booksess['booksess_maxappointment'],'booksess_maxcalcount'=>$booksess['booksess_maxcalcount'],'booksess_totbook'=>$maxtotcntval,'booksess_incdescaptmnt'=>$maxcntval,'booksess_status'=>$sess_status));
			
			}
		}
	}
		public function getcheck_properity($aptid)
    {		
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('apartment_id',$aptid);
        $where = '(status="1" or status = "2" or status = "3")';
		$this->db->where($where);
       $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_task_details_api()
	{
		$this->db->select('*');
        $this->db->from('task_category');
        $this->db->where('status','1');
        //$this->db->join('prices', 'task_category.id = prices.categoriesid');
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function update_booking_api($data,$id)
	{
		$this->db->where('id',$id);      
        return $this->db->update('task', $data);
	}
		public function get_task_iconcode_api($whereicon)
	{
		$this->db->select('*');
        $this->db->from('task_category');
        $this->db->where(array('id' => $whereicon));
        //$this->db->join('prices', 'task_category.id = prices.categoriesid');
	    $query = $this->db->get();
		 return $result = $query->row();
	}
	public function get_task_api($details)
	{
		$contname_res = $this->db->where($details)->get("task");
		return $contname_res->result();
	}
	public function get_task_purchase_api($taskid,$userid)
	{
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('id',$taskid);
        $this->db->where('user_id',$userid);
        //$this->db->where_in('status','2,3');    
	    $query = $this->db->get();		
		return $result = $query->row();
	}
	public function delete_task_api($details)
	{
        $this->db->where($details);
        return $this->db->delete('task');
	}
	public function task_insert_api($data,$shortcode)
	{
		$this->db->insert('task', $data);	
		$lid = $this->db->insert_id();
		$newDate = date("Ymd");
		$shortcode_val = array('SR_code'=>'SC'.$newDate.$shortcode.'00'.$lid );
		$this->db->where('id',$lid);
		$this->db->update('task', $shortcode_val);
		return $lid;		
	}
	public function get_task_byid_api($taskid)
	{
		$this->db->select('*');
        $this->db->from('task');
        $this->db->where('id',$taskid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	
public function get_homepage_recentrequestapi($user_id)
    {		
        $this->db->select('task.*,task_category.iconcode');
        $this->db->from('task');
        $this->db->join('task_category','task_category.id = task.task_catid');
        $this->db->where('task.user_id',$user_id);
        $this->db->where('task.status !=',5);
        $this->db->order_by('task.status',"dasc");
        $this->db->order_by('task.booking_date',"desc");
		 $this->db->limit(5);
	    $query = $this->db->get();
		return $result = $query->result();
	}
}
?>
