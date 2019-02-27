<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Postjob_model extends CI_Model{
    
	public $table = "postjob";
	public $table_bid = " job_bids";
	
	   // Create New User
	public function insert_postjob($data)
		{
			$this->db->insert($this->table, $data);	
			return $this->db->insert_id();
		
		}
	public function update_postjob($p_id,$data)
		{
			$this->db->where('po_id',$p_id);


			return $this->db->update($this->table, $data);	
			
		}
	public function update_price($data,$p_id)
		{
			$this->db->where('id',$p_id);


			return $this->db->update($this->table, $data);	
			
		}
	public function update_repostjob($p_id,$data)
		{
			$this->db->where('po_id',$p_id);

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
			$this->db->select('postjob.*,user_master.*, postjob.insurance as projinsurence , postjob.city as citypost , postjob.state as statepost', false);
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

	public function check_bidins($uid,$prid)
		{
			$this->db->select('*');
			$this->db->from('job_bids');
			$this->db->where('user_id',$uid);
			$this->db->where('pro_id',$prid);
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
			$this->db->where('id',$p_id);
			$this->db->where('user_id',$this->session->userdata('id_user_master'));
			$this->db->update('subscription_package', $data);	
			
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
	public function get_postjoballpaid()
		{

			$this->db->select('job_bids.*,user_master.*');
			$this->db->from('job_bids');
			$this->db->join('user_master' ,'user_master.id_user_master=job_bids.user_id');
			$this->db->where('job_bids.status',2);
			$this->db->order_by('job_bids.id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postjoballdetails()
		{

				//~ $this->db->select('postjob.*,user_master.*');
			//~ $this->db->from('postjob');
			//~ $this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
			//~ $this->db->where('postjob.job_status !=',4);
			//~ $this->db->or_where('postjob.job_status !=',5);
			//~ $this->db->order_by('postjob.po_id','des');
			//~ $query = $this->db->get();
			 //~ $result = $query->result();
			 //~ var_dump(count($result));exit;
			 $this->db->select('*');
			$this->db->from('postjob');
			$this->db->join('proposal','proposal.proposproj_id = postjob.po_id','left');
			 $this->db->where('postjob.job_status',2);
			 $this->db->or_where('proposal.status',2);
			 $this->db->where('postjob.jobemergency',1);
			 $this->db->or_where('postjob.job_status',3);
			$this->db->order_by('postjob.po_id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postjoballpaidproposal($comid)
		{

			$this->db->select('comp_id');
			$this->db->from('proposal');
			$this->db->where('comp_id',$comid);
			$this->db->order_by('postjob.po_id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postjoballpaidfilter($filter)
		{

			$this->db->select('postjob.*,user_master.*');
			$this->db->from('postjob');
			$this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
			$this->db->where('postjob.job_status',2);
			$this->db->where("( postjob.state LIKE '%".$filter['finddata']."%' OR  postjob.zipcode LIKE '%".$filter['finddata']."%' OR  postjob.highleveljobdesc LIKE '%".$filter['finddata']."%' OR  postjob.job_description LIKE '%".$filter['finddata']."%' OR  postjob.industry LIKE '%".$filter['finddata']."%')", NULL, FALSE);
			$this->db->order_by('postjob.po_id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postmanagejoball($usid)
		{

			$this->db->select('postjob.*,user_master.*');
			$this->db->from('postjob');
			$this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
			$this->db->where('postjob.company_userid',$usid);
			$this->db->where('postjob.job_status',2);
			$this->db->order_by('postjob.po_id','desc');
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
			$this->db->order_by('postjob.po_id','desc');
			//~ $this->db->select();
			//~ $this->db->from('postjob');
			//~ $this->db->where('company_userid',$usid);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postprosal($usid)
		{
			$this->db->select('proposproj_id');
			//$this->db->distinct();
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$usid);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postprosaldetails($poid)
		{
			$this->db->select('proposal.*,user_master.*,proposal.status as prostatus');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposproj_id',$poid);
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postprosalposttable($poid)
		{
			$this->db->distinct();
			$this->db->select('proposproj_id');
			$this->db->from('proposal');
			$this->db->join('postjob','postjob.po_id = proposal.proposproj_id');
			$this->db->where('proposal.comp_id',$poid);
			$this->db->where('proposal.status',1);
			//$this->db->where('postjob.job_status',2);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postprosalposttableallstatus($poid)
		{
			$this->db->distinct();
			$this->db->select('proposproj_id');
			$this->db->from('proposal');
			$this->db->where('comp_id',$poid);
			$where = '(status=1 or status=2 )';
			$this->db->where($where);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postawardedtable($poid)
		{
			$this->db->distinct();
			$this->db->select('proposproj_id');
			$this->db->from('proposal');
			$this->db->join('postjob','postjob.po_id = proposal.proposproj_id');
			$this->db->where('proposal.comp_id',$poid);
			$this->db->where('proposal.status',2);
			$this->db->where('postjob.job_status',3);
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postjobcompletedtable($poid)
		{
			$this->db->distinct();
			$this->db->select('proposproj_id');
			$this->db->from('proposal');
			$this->db->join('postjob','postjob.po_id = proposal.proposproj_id');
			$this->db->where('proposal.comp_id',$poid);
			$this->db->where('proposal.status',4);
			$this->db->where('postjob.job_status',5);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postjobexpired($usid)
		{
			$this->db->distinct();
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('company_userid',$usid);
			$this->db->where('job_status',4);
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_postjoballpaiddata($poid)
		{

			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('po_id',$poid);
			//$this->db->where('job_status',2);
			$this->db->order_by('po_id','desc');
			$query = $this->db->get();
			return $result = $query->row();
			
		}
	public function update_postproposal($p_id,$data)
		{
			$this->db->where($p_id);
				return $this->db->update($this->table, $data);	
			 
		}		 
	public function update_awarded_job($p_id,$data)
		{
			
			
			$this->db->where($p_id);
				return $this->db->update('proposal', $data);	
			 
		}		 
	public function get_mapsearchdata($fullstate)
		{

			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('LOWER(state)',strtolower($fullstate));
			$this->db->where('job_status',2);
			$this->db->order_by('po_id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_active_postsp($poid)
		{
			$this->db->select('job_bids.*,user_master.*');
			$this->db->from('job_bids');
			$this->db->join('user_master','user_master.id_user_master = job_bids.user_id');
			$this->db->where('job_bids.pro_id',$poid);
			$this->db->where('job_bids.com_id',$this->session->userdata('id_user_master'));
			$this->db->where('job_bids.status',1);
			$query = $this->db->get();
			return $result = $query->result();

		 }
	public function get_active_postac($poid)
		{
			$this->db->select('proposal.*,user_master.*');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposal.proposproj_id',$poid);
			$this->db->where('proposal.comp_id',$this->session->userdata('id_user_master'));
			$this->db->where('proposal.status',1);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_active_postact($poid)
		{
			$this->db->select('proposal.*,user_master.*');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposal.proposproj_id',$poid);
			$this->db->where('proposal.comp_id',$this->session->userdata('id_user_master'));
			$this->db->where('proposal.status',2);
			$query = $this->db->get();
			return $result = $query->result();

		 }
	public function get_active_post($poid)
		{
			$this->db->select('job_bids.*,user_master.*');
			$this->db->from('job_bids');
			$this->db->join('user_master','user_master.id_user_master = job_bids.user_id');
			$this->db->where('job_bids.pro_id',$poid);
			$this->db->where('job_bids.status',1);
			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_post_sumbit_p($poid)
		{
			$this->db->select('proposal.*,user_master.*,proposal.status as prostatus');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposal.status',1);
			$this->db->where('proposal.proposproj_id',$poid);
			$this->db->where('proposal.comp_id',$this->session->userdata('id_user_master'));

			$query = $this->db->get();
			return $result = $query->result();

		}
	public function get_postjobpaiduser($user_id)
		{
			$this->db->select('postjob.*,user_master.*');
			$this->db->from('postjob');
			$this->db->join('user_master' ,'user_master.id_user_master=postjob.company_userid');
			$this->db->where('user_master.id_user_master',$user_id);
			$this->db->where('postjob.job_status',2);
			$this->db->order_by('postjob.po_id','desc');
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_post_award_p($poid)
		{
			$this->db->select('proposal.*,user_master.*,proposal.status as prostatus');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposal.status',2);
			$this->db->where('proposal.proposproj_id',$poid);
			$this->db->where('proposal.comp_id',$this->session->userdata('id_user_master'));
			$query = $this->db->get();
			return $result = $query->result();

		}

	public function update_expired($p_id,$data)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$p_id);
			$this->db->where('status !=',2);
			$query = $this->db->get();
		 $result = $query->row();
	
			if(!empty($result))
			{
				return false;
			}
			else
			{
				return true;
				//~ $this->db->where('po_id',$p_id);
				//~ $this->db->where('jobemergency',1);
				//~ return $this->db->update($this->table, $data);	
			}
		
		}
		
		public function update_expiredday($p_id,$data)
		{
			$this->db->where('po_id',$p_id);
			$this->db->where('jobemergency',1);
			return $this->db->update($this->table, $data);	
			
		}
	
	public function	check_bidjob($p_id,$comuid)
		{
			$this->db->select('*');
			$this->db->from('job_bids');
			$this->db->where('pro_id',$p_id);
			$this->db->where('com_id',$comuid);
			$this->db->where('user_id',$this->session->userdata('id_user_master'));
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function	check_awardedjob($p_id,$comuid)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$p_id);
			$this->db->where('comp_id',$comuid);
			$this->db->where('comp_id',$comuid);
			$this->db->where('status',2);
			$this->db->where('proposuser_id',$this->session->userdata('id_user_master'));
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function	check_awardedjob1($p_id,$comuid)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$p_id);
			$this->db->where('comp_id',$comuid);
			$this->db->where('status',2);
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function updatebitspaymentstatus($p_id,$data)
		{
			$this->db->where('id',$p_id);
			$this->db->where('user_id',$this->session->userdata('id_user_master'));
			$this->db->update('subscription_package', $data);	

			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
			{
				return false;
			}
			else{
					return true;
				}
			
		}
	
	public function proct_compl($pro_id,$user_id)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('comp_id',$user_id);
			$this->db->where('proposproj_id',$pro_id);
			$this->db->where('status','4');
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function get_singleproject($prid)
		{
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('po_id',$prid);
			$query = $this->db->get();
			return $result = $query->row();
		}
		
	public function get_aw($poid)
		{
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('po_id',$poid);
			$this->db->where('job_status',3);
			$this->db->order_by('po_id','desc');
			$query = $this->db->get();
			return $result = $query->row();
					}
	
	public function update_awarded_post($p_id,$dataaward)
		{
			$this->db->where('po_id',$p_id);
			return $this->db->update('postjob', $dataaward);	
		}
	public function update_awarded_otherstatus_job($p_id,$dataaward)
		{
			$this->db->where('proposproj_id',$p_id);
			return $this->db->update('proposal', $dataaward);	
		}
	public function update_awarded_currect_job($p_id,$dataaward)
		{
			$this->db->where('proposproj_id',$p_id);
			return $this->db->update('proposal', $dataaward);	
		}

	
	public function get_allpostuser($userid)
		{
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('company_userid',$userid);
			$query = $this->db->get();
			return $result = $query->result();
		}
	public function get_allawuser($userid)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('comp_id',$userid);
			$this->db->where('status',2);
			$query = $this->db->get();
			return $result = $query->result();
		}
	
	public function update_completejob($p_id)
		{
			$this->db->where('po_id',$p_id);
			return $this->db->update('postjob', array('job_status' => 5));	
			
		}	
	public function update_completeproposal($p_id,$uid)
		{
			$this->db->where('proposproj_id',$p_id);
			return $this->db->update('proposal', array('status' => 4));	
		}	
	
	public function get_rating($ratedata)
		{
			$this->db->select('SUM(countrating) as countrating,comid,count(ra_id) as ra_id');
			$this->db->from('rating'); 
			$this->db->where('comid ',$ratedata['comid']);
			$this->db->where('userid',$ratedata['userid']);
			$query = $this->db->get();
			return $result = $query->result();
			
		}
	
	public function get_postjoballcomdata($poid)
		{
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('po_id',$poid);
			$this->db->where('job_status',5);
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function getawardedprojstatus($poid)
		{
			$this->db->select('*');
			$this->db->from('postjob');
			$this->db->where('po_id',$poid);
			$this->db->where('company_userid',$this->session->userdata('id_user_master'));
			$query = $this->db->get();
			return $result = $query->row();
		}
	public function getawardedprojstatusawared($userid,$poid)
		{
			$this->db->select('proposal.*,postjob.*');
			$this->db->from('postjob');
			$this->db->where('postjob.po_id',$poid);
			$this->db->where('postjob.company_userid',$this->session->userdata('id_user_master'));
			$this->db->join('proposal','proposal.proposproj_id = postjob.po_id');
			$this->db->where('proposal.proposuser_id', $userid);
			$this->db->where('proposal.comp_id', $this->session->userdata('id_user_master'));
			$query = $this->db->get();
			return $result = $query->row();
		}
	
	public function proct_compl_list($poid)
		{

			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$poid);
			$this->db->where('status','4');
			$query = $this->db->get();
			return $result = $query->row();
		}
			public function proct_awarded_list($poid)
		{

			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->where('proposproj_id',$poid);
			$this->db->where('status',2);
			$query = $this->db->get();
			return $result = $query->row();
		}
		public function get_industry()
		{

			$this->db->select('*');
			$this->db->from('industry');
			$this->db->where('status','1');
			$query = $this->db->get();
			return $result = $query->result();
		}
		
			public function get_biddedjob($poid)
		{
			$this->db->select('*');
			$this->db->from('job_bids');
			$this->db->join('user_master','user_master.id_user_master = job_bids.user_id');
			$this->db->where('job_bids.pro_id',$poid);
			$query = $this->db->get();
			return $result = $query->result();
		}
			public function get_biddedproposaljob($poid)
		{
			$this->db->select('*');
			$this->db->from('proposal');
			$this->db->join('user_master','user_master.id_user_master = proposal.proposuser_id');
			$this->db->where('proposal.proposproj_id',$poid);
			$query = $this->db->get();
			return $result = $query->result();
		}
			public function checkprojectbidornot($compid,$poid)
		{
			$this->db->select('proposal.*,postjob.*');
			$this->db->from('postjob');
			$this->db->join('proposal','proposal.proposproj_id = postjob.po_id');
			$this->db->where('postjob.po_id',$poid);
			$this->db->where('postjob.company_userid', $compid);
			$query = $this->db->get();
			return $result = $query->row();
		}
		
}
