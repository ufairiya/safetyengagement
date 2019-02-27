<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model{
    
	public $table_notification  = "notification";
	public $table_comments  = "comments";

	// Create notification
	public function notification_insert($data)
	{
		$this->db->insert($this->table_notification, $data);
        return $this->db->insert_id();
	}

	//Update notification
	 public function notification_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_notification, $data);
    }
	
	// Delete notification
	
	public function notification_delete($where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table_notification);
	}
	//Get notification Template
	public function get_notification_template($where = array(),$option_type = "result")
    {   
		$this->db->select('*');
    	$this->db->where($where);
		$result = $this->db->get($this->table_notification);
     	if($result != FALSE && $result->num_rows()>0) {
			return $result->$option_type();
		}
		return FALSE;
    }
    	public function insertcommentsdata($data)
	{
		$this->db->insert($this->table_comments, $data);
        return $this->db->insert_id();
	}
	
	 public function updatecommentsdata()
    {
            $this->db->where('comment_status',0);
        return $this->db->update($this->table_comments, array('comment_status'=>1));
    }
    public function getcommentsdata()
    {   
		$this->db->select('*');
		$this->db->from($this->table_comments);

    	$this->db->order_by('comment_id','desc');
		$this->db->limit(5);  
		$result = $this->db->get();
     	
			return $result->result();
		
    }
    public function getcommentsdatanot()
    {   
		$this->db->select('*');
		$this->db->from($this->table_comments);
         $this->db->where('comment_status',0);
		$result = $this->db->get();
     	return $result->num_rows();
		
    }
}
