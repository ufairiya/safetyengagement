<?php

class Dashboard_model extends CI_Model {
        
    function count_inbox()
    {
        $id = $this->session->userdata('user_id');
        $q = "select * from tbl_message where user_to=$id";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_sent()
    {
        $id = $this->session->userdata('user_id');
        $q = "select * from tbl_message_sent where user_from=$id";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_messages()
    {
		$id = $this->session->userdata('user_id');
		$data['inbox'] = $this->db
				->where('user_to',$id)
				->count_all_results('tbl_message');
		$data['sent'] = $this->db
				->where('user_from',$id)
				->count_all_results('tbl_message_sent');            
		return $data;
	}
    
    function count_inserted($date)
    {
		$id = $this->session->userdata('user_id');
		$data['inbox'] = $this->db
			   ->where('user_to',$id)
				->like('date',$date,'both')
				->count_all_results('tbl_message');
		
		$data['sent'] = $this->db
				->where('user_from',$id)
				->like('date',$date,'both')
				->count_all_results('tbl_message_sent');

		return $data;
	}
        
    public function get_com()
	{
		$this->db->select('*');
		$this->db->where('user_type','company');
        $query = $this->db->get('user_master');
		return $result = $query->result();
	}
	public function get_sp()
	{
		$this->db->select('*');
		$this->db->where('user_type','professional');
        $query = $this->db->get('user_master');
		return $result = $query->result();
	}
	public function get_stu()
	{
		$this->db->select('*');
		$this->db->where('user_type','student');
        $query = $this->db->get('user_master');
		return $result = $query->result();
	}
	public function get_post_job()
	{
		$this->db->select('*');
		$this->db->where('	job_status','2');
        $query = $this->db->get('postjob');
		return $result = $query->result();
	}
	public function get_bid_job()
	{
		$this->db->select('*');
		$this->db->where('	status','1');
        $query = $this->db->get('job_bids');
		return $result = $query->result();
	}
	public function get_award_job()
	{
		$this->db->select('*');
		$this->db->where('	status','2');
        $query = $this->db->get('proposal');
		return $result = $query->result();
	}
	public function get_complet_job()
	{
		$this->db->select('*');
		$this->db->where('status','4');
        $query = $this->db->get('proposal');
		return $result = $query->result();
	}
	public function get_post_today($date_we)
	{
		$this->db->select('*');
		$this->db->where('created_on',$date_we);
		$this->db->like('job_status','2');
        $query = $this->db->get('postjob');
		return $result = $query->result();
	}
	public function get_bid_today($date_we)
	{
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->like('created_date',$date_we);
        $query = $this->db->get('job_bids');
		return $result = $query->result();
	}
	public function get_award_today($date_we)
	{
		$this->db->select('*');
		$this->db->where('status','2');
		$this->db->like('created_on',$date_we);
        $query = $this->db->get('proposal');
		return $result = $query->result();
	}
		public function get_complet_today($date_we)
	{
		$this->db->select('*');
		$this->db->where('status','4');
		$this->db->like('created_on',$date_we);
        $query = $this->db->get('proposal');
		return $result = $query->result();
	}
	public function income_result_week_vise()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from postjob WHERE `created_on` > DATE_SUB( '$date', INTERVAL 7 DAY ) and `job_status` = 2");
		return $result->result();
	}
	public function income_result_week_vise_bid()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from job_bids WHERE 
		`created_date` > DATE_SUB( '$date', INTERVAL 7 DAY ) and `status` =1");
		return $result->result();

	}
	
	public function income_result_week_vise_award()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` > DATE_SUB( '$date', INTERVAL 7 DAY ) and `status` =	2");
		return $result->result();

	}
	
	public function income_result_week_vise_comp()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` > DATE_SUB( '$date', INTERVAL 7 DAY ) and `status` =	4");
		return $result->result();

	}
	
	public function income_result_month_vise()
	{
		$result = $this->db->query("SELECT * FROM postjob WHERE created_on > DATE_SUB(NOW(), INTERVAL 1 MONTH) and `job_status` = 2");
		return $result->result();
	}
	
	public function income_result_month_vise_bid()
	{
		$result = $this->db->query("SELECT * FROM job_bids WHERE 
		created_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) and `status` = 1");
		return $result->result();
	}
	
	public function income_result_month_vise_award()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` > DATE_SUB(NOW(), INTERVAL 1 MONTH) and `status` =	2");
		return $result->result();
	}
	
	public function income_result_month_vise_comp()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` > DATE_SUB(NOW(), INTERVAL 1 MONTH) and `status` =	4");
		return $result->result();
	}
	
	public function income_result_year_vise()
	{
		$result = $this->db->query("SELECT * FROM postjob WHERE created_on > DATE_SUB(NOW(), INTERVAL 1 YEAR) and `job_status` = 2");
		return $result->result();
	}
	
		public function income_result_year_vise_bid()
	{
		$result = $this->db->query("SELECT * FROM job_bids WHERE 
		created_date > DATE_SUB(NOW(), INTERVAL 1 YEAR) and `status` = 1");
		return $result->result();
	}
	
		public function income_result_year_vise_award()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` >  DATE_SUB(NOW(), INTERVAL 1 YEAR) and `status` =	2");
		return $result->result();
	
	}
	
		public function income_result_year_vise_comp()
	{
		$date=  date("Y-m-d");
		$result = $this->db->query(" SELECT * from proposal WHERE 
		`created_on` >  DATE_SUB(NOW(), INTERVAL 1 YEAR) and `status` =	4");
		return $result->result();
	
	}
}   
?>
