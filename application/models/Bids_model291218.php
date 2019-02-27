<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bids_model extends CI_Model{
    
	public $table = "postjob";
	public $table_bid = " job_bids";
	public $table_proposal = " proposal";
	
	   // Create New User
	public function insert_postjob($data)
	{
		$this->db->insert($this->table, $data);	
		return $this->db->insert_id();
		
	}
	public function update_price($data,$p_id)
	{
		$this->db->where('id',$p_id);
		return $this->db->update($this->table, $data);	
	}

	public function get_job($jobid)
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('po_id',$jobid);
        //$this->db->where('end_date <=',);
	    $query = $this->db->get();
		return $result = $query->row();

	}
	public function company_info($userid)
	{
		$this->db->select('*');
        $this->db->from('user_master');
        $this->db->where('id_user_master',$userid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function getcompanypostdata($jobid)
	{
		$this->db->select('postjob.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('po_id',$jobid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	
	public function insertTransaction($data)
	{
		$insert = $this->db->insert($this->transTable,$data);
		return $insert?true:false;
	}
    
    public function insert_selectjob($data)
	{
		$this->db->insert($this->table_bid, $data);	
		return $this->db->insert_id();
		
	}
	public function getbidjobdata($last_insert_id)
	{
		$this->db->select('*');
        $this->db->from('job_bids');
        $this->db->where('id',$last_insert_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function update_sendproposal($p_id,$data)
	{
		$this->db->where($p_id);
		return $this->db->update($this->table_bid, $data);	
		 
	}		 
	public function updatepaymentstatus($p_id,$data)
	{
		$this->db->where('pro_id',$p_id);
		$this->db->where('user_id',$this->session->userdata('id_user_master'));
		 $this->db->update($this->table_bid, $data);	
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else{
				return true;
			}
		
	}
	public function getpostjobdata($jobid)
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('po_id',$jobid);
        $this->db->where('job_status',2);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function getpostjobawardsdata($jobid)
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('po_id',$jobid);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function getcompanyuser($comuser)
	{
		$this->db->select('*');
        $this->db->from('user_master');
        $this->db->where('id_user_master',$comuser);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function updatepostpaymentstatus($p_id,$data)
	{
		$this->db->where('po_id',$p_id);
		 $this->db->update($this->table, $data);	
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else{
				return true;
			}
	
	}
	public function payment_info($pro_id,$user_id)
	{
		$this->db->select('*');
        $this->db->from('job_bids');
        $this->db->where('user_id',$user_id);
        $this->db->where('pro_id',$pro_id);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	public function bid_info($user_id)
	{
		$this->db->select('*');
        $this->db->from('job_bids');
        $this->db->where('user_id',$user_id);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_postjoball()
	{
		$this->db->select('postjob.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->order_by('postjob.po_id','desc');
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_bidjoballpaid($uid)
	{
		$this->db->select('postjob.*,job_bids.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('job_bids' ,'job_bids.pro_id=postjob.po_id');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('job_bids.user_id',$uid);
        $this->db->where('job_bids.status',2);
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_bidjoballpaidcom($uid)
	{
		$this->db->select('postjob.*,job_bids.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('job_bids' ,'job_bids.pro_id=postjob.po_id');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('job_bids.com_id',$uid);
        $this->db->where('job_bids.status',2);
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_postmanagejoball($usid)
	{
		$this->db->select('postjob.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('postjob.company_useri',$usid);
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_bidsubmit($user_id)
	{
		$this->db->select('*');
        $this->db->from('proposal');
        $this->db->where('proposuser_id',$user_id);
        $this->db->where('status',1);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
	public function get_submitacit($user_id)
	{
		//~ $this->db->select('*');
        //~ $this->db->from('proposal'); 
        //~ $this->db->where('proposuser_id',$user_id);
        //~ $this->db->where('status',2);
	    //~ $query = $this->db->get();
	    
	    $this->db->distinct();
	    $this->db->select('proposproj_id');
			$this->db->from('proposal');
			$this->db->join('postjob','postjob.po_id = proposal.proposproj_id');
			$this->db->where('proposal.proposuser_id',$user_id);
			$this->db->where('proposal.status',2);
			$this->db->where('postjob.job_status',3);
			$query = $this->db->get();
			return $result = $query->result();
		return $result = $query->result();
	}
	
	public function get_completed($user_id)
	{
		$this->db->select('*');
        $this->db->from('proposal'); 
        $this->db->where('proposuser_id',$user_id);
        $this->db->where('status',4);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
	public function get_postproposals($usid)
	{
		$this->db->select('postjob.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->join('job_bids' ,'job_bids.com_id = user_master.id_user_master');
       $this->db->where('postjob.company_userid',$usid);
        $this->db->where('postjob.job_status',2);
        $this->db->where('job_bids.status',2);
	    $query = $this->db->get();
	    echo $this->db->last_query();
	    exit;
		return $result = $query->result();
	}
	public function get_allpostjob()
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
	   
		return $result = $query->result();
	}
	public function get_allbidjob()
	{
		
		$this->db->select('postjob.*,job_bids.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('job_bids' ,'job_bids.pro_id=postjob.po_id');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('job_bids.status',2);
        $this->db->where('postjob.job_status',2);
	
	    $query = $this->db->get();
	   
		return $result = $query->result();
	}
	public function insert_sendproposal($data)
	{
			$this->db->insert($this->table_proposal, $data);	
			return $this->db->insert_id();
	}
	
	public function get_all()
	{
		$this->db->select('*');
        $this->db->from('job_bids'); 
        $this->db->where('status !=',0);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
	public function get_bidjobonly($uid)
	{
		$this->db->select('postjob.*,job_bids.*,user_master.*');
        $this->db->from('postjob');
        $this->db->join('job_bids' ,'job_bids.pro_id=postjob.po_id');
        $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
        $this->db->where('job_bids.user_id',$uid);
        $this->db->where('job_bids.status',1);
        $this->db->where('postjob.job_status',2);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	public function get_rating($uid)
	{
		$this->db->select('SUM(countrating) as countrating,comid,count(ra_id) as ra_id');
        $this->db->from('rating'); 
        $this->db->where('userid ',$uid);
        
	    $query = $this->db->group_by('countrating,ra_id');
	     $query = $this->db->get();
		return $result = $query->result();
	}
	
	public function all_con_bid($user_id_bit)
	{
		$this->db->select('*');
        $this->db->from('job_bids'); 
        $this->db->where('status !=',0);
        $this->db->where('user_id',$user_id_bit);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
	public function all_con_aw($user_id_bit)
	{
		$this->db->select('*');
        $this->db->from('proposal'); 
        $this->db->where('status',2);
        $this->db->where('proposuser_id',$user_id_bit);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	 
	 public function getpostjobdata_cop($jobid)
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('po_id',$jobid);
        $this->db->where('job_status',5);
	    $query = $this->db->get();
		return $result = $query->row();
	}
	 public function get_allawardedjob()
	{

		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->join('proposal','proposal.proposproj_id = postjob.po_id');
        $this->db->where('postjob.job_status',3);
        $this->db->where('proposal.status',2);
	    $query = $this->db->get();
	   return $result = $query->result();
	}
	 public function get_allcompletedjob()
	{
		$this->db->select('*');
        $this->db->from('postjob');
        $this->db->where('postjob.job_status',5);
	    $query = $this->db->get();
		return $result = $query->result();
	}
	
}
