<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Purchaseorder_model extends CI_Model
{
    
	public $table 				 = "task";
	public $property 			 = "user_property";
	public $purchase_order 		 = "purchase_order";
	public $service_report 		 = "service_report";

	
	public function getpending_task()
	{
		$array_of_ordered_ids = array('morning','afternoon','evening');

		$user_master_id = $this->session->id_user_master;
		$this->db->select('task.*,user_property.*');			
		$this->db->from('task');
		$this->db->join('user_property', 'task.apartment_id = user_property.ID');
		$this->db->where('task.status',1);
		
		$order = sprintf('FIELD(task.booking_time,"morning","afternoon","evening")');
		$this->db->order_by($order);
		$this->db->order_by('task.booking_date',"desc");
		$query = $this->db->get();
		return $query->result();
		
	}
	public function getuser_task($userid)
	{
		$this->db->select('*');
		$this->db->where('user_id',$userid);	
		$this->db->from('task');
		$query = $this->db->get();
		return $query->result();
	}
	public function getawaiting_task()
	{
		$this->db->select('task.*,user_property.*,purchase_order.p_sr_code');
		$this->db->where('task.status',2);	
		$this->db->from('task');
		$this->db->join('user_property', 'task.apartment_id = user_property.ID');
		$this->db->join('purchase_order', 'task.po_id = purchase_order.p_ID');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_purchaseorder()
	{
		$this->db->select('*');
		$this->db->from('purchase_order');
		//$where = '(status = 1 or status = 2)';
        $this->db->order_by('p_ID',"asc");	
       	$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getawaitingservice_task()
	{
		$user_master_id = $this->session->id_user_master;
		$this->db->select('task.*,user_property.*');
		$this->db->where('status',3);	
		$this->db->from('task');
		$this->db->join('user_property', 'task.apartment_id = user_property.ID');
		$query = $this->db->get();
		return $query->result();
	}
	

	public function get_purchaseorder_details($taskid)
	{
		$this->db->select('purchase_order.*,user_master.first_name,user_master.email,task.status as statustask');
		$this->db->where('p_task_id',$taskid);	
		$this->db->from('purchase_order');
		$this->db->join('user_master', 'purchase_order.p_userid = user_master.id_user_master');
		$this->db->join('task', 'purchase_order.p_task_id = task.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getpending_taskdetails($taskid)
	{
		
		$this->db->select('task.*,user_property.*,user_master.*,task_category.taskcatshort_code,task_category.id');
		$this->db->where('task.id',$taskid);	
		$this->db->from('task');
		$this->db->join('user_property', 'user_property.ID = task.apartment_id', 'left');		
		$this->db->join('user_master', 'user_master.id_user_master = task.user_id', 'left');
		$this->db->join('task_category', 'task_category.id = task.task_catid', 'left');
		
		$query = $this->db->get();
		return $query->result();
	}
	public function propertylist($user_id)
	{
		$this->db->select('*');
		$this->db->where('property_user_id',$user_id);	
		$this->db->from('user_property');
		$query = $this->db->get();
		return $query->result();
	}
	public function changeawaiting($id)
	{
		$this->db->where('id',$id);
		$results =$this->db->update($this->table, array('status' => '2'));			
		return  $results ;
	
	}
	public function changeconfirm($id)
	{
		$this->db->where('p_task_id',$id);
		$results =$this->db->update($this->purchase_order, array('status' => '1',));					
		$this->db->where('id',$id);
		$results =$this->db->update($this->table, array('status' => '3','shedule_status' => '1','confirmdate'=> date('m/d/Y')));	
		return  $results ;
	
	}
	public function changedecline($id)
	{
			$this->db->where('p_task_id',$id);
		$results =$this->db->update($this->purchase_order, array('status' => '2'));	
		$this->db->where('id',$id);
		$results =$this->db->update($this->table, array('status' => '5'));					
		return  $results ;
	
	}
	public function getaddress($pid)
	{
		$this->db->select('*');
		$this->db->where('ID',$pid);	
		$this->db->from('user_property');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function update_task($where = array(),$data2)
	{
	
	//~ print_r($data2);
	//~ print_r($where);
	//~ exit;
	
		if (count($where) > 0)
		$this->db->where($where);
		$res=$this->db->update($this->table, $data2);
		return $res;
	}
	public function createpurchaseorder($data1)
	{
			$this->db->insert($this->purchase_order, $data1);	
			$linsert_id = $this->db->insert_id();
			$newDate = date("Ymd");
			$todaydate = date("d/m/Y");
			$orderid = 'PO'.$newDate.$data1['p_cat_shot_code'].'00'.$linsert_id;
			
			$shortcode_val = array('p_sr_code'=>'PO'.$newDate.$data1['p_cat_shot_code'].'00'.$linsert_id,'p_issue_date' => $todaydate);
			$this->db->where('p_ID',$linsert_id);
			$id = $this->db->update($this->purchase_order, $shortcode_val);
				
			$this->db->select('p_task_id');
			$this->db->where('p_ID',$linsert_id);	
			$this->db->from($this->purchase_order);
			$query = $this->db->get();
			$res_task = $query->row();
			/** purchase id update to task table**/
			$this->db->where('id',$res_task->p_task_id);
			$id = $this->db->update($this->table, array('po_id'=>$linsert_id));
			
			$this->db->select('*');
			 $this->db->where('p_ID',$linsert_id);	
			$this->db->from($this->purchase_order);
			$query = $this->db->get();
			$res_taskdata = $query->row();
		
		

		return $res_taskdata;   
	}
	//~ public function createpurchaseorder($data1)
	//~ {
			//~ $this->db->insert($this->purchase_order, $data1);	
			//~ $linsert_id = $this->db->insert_id();
			//~ $newDate = date("Ymd");
			//~ $todaydate = date("d/m/Y");
			//~ $orderid = 'PO'.$newDate.$data1['p_cat_shot_code'].'00'.$linsert_id;
			
			//~ $shortcode_val = array('p_sr_code'=>'PO'.$newDate.$data1['p_cat_shot_code'].'00'.$linsert_id,'p_issue_date' => $todaydate);
			//~ $this->db->where('p_ID',$linsert_id);
			//~ $id = $this->db->update($this->purchase_order, $shortcode_val);
				
			//~ $this->db->select('p_task_id');
			//~ $this->db->where('p_ID',$linsert_id);	
			//~ $this->db->from($this->purchase_order);
			//~ $query = $this->db->get();
			//~ $res_task = $query->row();
			//~ /** purchase id update to task table**/
			//~ $this->db->where('id',$res_task->p_task_id);
			//~ $id = $this->db->update($this->table, array('po_id'=>$linsert_id));
	
		
			//~ $jobname = unserialize($data1['p_jobname']);
			//~ $jobprice = unserialize($data1['p_jobprice']);
				//~ $baseurl = base_url();				
			//~ $adminemail = 'admin@1ss.com.sg';
			//~ $adminname = '1SS';
			//~ $email = $data1['p_email'];
			//~ $company_name = '1SS';
			//~ $company_email_address = $adminemail;
			//~ $this->email->initialize(array(
			//~ 'charset' => 'iso-8859-1',
			//~ 'mailtype' => 'html',
			//~ 'validate' => TRUE,
			//~ ));
			//~ $this->email->from($adminemail, $adminname);
			//~ $this->email->to($email);
			//~ $this->email->subject($company_name.' - Purchase Order '.$orderid);
		
		
			
			
			//~ $message = '<div id="invoice" style="background: #fff;width: auto;max-width: 900px;padding: 60px;margin: 30px auto 60px; border-radius: 4px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.3);">
			
			//~ <div style="margin-right: -15px;margin-left: -15px;">
				//~ <div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width: 70%;" src="'.$baseurl.'assets/listeo/images/logo.png" alt=""></div><div class="col-md-6" style="position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;width: 50%;float:right;"><p id="details" style="text-align: right;">
						//~ <strong style="font-weight: 600;color: #333;display: inline-block;">Order:</strong> '.$orderid.' <br>
						//~ <strong  style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong>'.$todaydate.'<br>
						//~ Due 7 days from date of issue
					//~ </p>
				//~ </div>
			//~ </div>


			
			//~ <div class="row" style="margin-right: -15px;margin-left: -15px;">
				//~ <div class="col-md-12" style="color: #707070;font-size: 15px;line-height: 27px;"width:100%;float: left;"><h2 style="  font-weight: 300;color: #333;clear: both;margin: 0;font-size: 28px;line-height: 1;margin: 15px 0 45px!important;">Purchase Order</h2>
				//~ </div>

				//~ <div class="col-md-6" style="color: #707070;font-size: 15px;line-height: 27px;width: 40%;float:left;" >	
					//~ <strong class="margin-bottom-5" style="font-weight: 600;font-size: 20px;color: #333;display: inline-block;margin-bottom:5px">Supplier</strong>
					//~ <p style=" color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;">'.$data1['p_address'].'</p>
				//~ </div>
				//~ <div class="col-md-6" style="width: 40%;">	
				//~ </div>
				//~ <div class="col-md-6" style="width: 40%;float:right;">	
					//~ <strong class="margin-bottom-5" class="margin-bottom-5" style="font-weight: 600;color: #333;display: inline-block;margin-bottom:5px;font-size: 16px;line-height:29px;">Customer</strong>
					//~ <p style="    background-color: white;color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;">
						//~ '.$data1['p_first_name'].'<br>'.$data1['p_email'].'
						
					//~ </p>
				//~ </div>
			//~ </div>


			//~ <!-- Invoice -->
			//~ <div class="row" style="margin-right: -15px;margin-left: -15px;">
				//~ <div class="col-md-12" style="width:100%">
					//~ <table class="margin-top-20" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;">
						//~ <tr style="border-bottom: unset;color: #707070; font-size: 15px;line-height: 27px;display: table-row;vertical-align: inherit;padding: 15px 0;text-align: left;"><th style="font-weight: 700;border-bottom: 1px solid #ddd;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Description</th>
							//~ <th style="font-weight:700;border-bottom:1px solid #ddd;font-size:16px;color:#333;padding:15px 0;text-align:right">Estimated Cost</th>
						//~ </tr>
						//~ <tr class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;">'.date('d/m/Y',strtotime($data1['p_booking_date'])).' at '.strtolower($data1['p_booking_time']).'</td></tr>';
						
						
						//~ for($i=0; $i<count($jobname);$i++)
						//~ {
								//~ $message .= '<tr style="color: #707070; font-size: 15px;line-height: 27px;" class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;">'.$jobname[$i].'</td>';
								//~ $message .= '<td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align:right;">$'.$jobprice[$i].'</td></tr>';
						
						 //~ }
						 
						//~ $message .= '				
					//~ </table>
				//~ </div>
				
				//~ <div class="col-md-4 col-md-offset-8" style="margin-left: 66.66666667%;" >	
					//~ <table id="totals" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;">
						//~ <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
							//~ <th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Total Due</th> 
							//~ <th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: right;" ><span style="  position: relative;display: inline-block; height: 100%;">$'.array_sum($jobprice).'</span></th>
						//~ </tr>
					//~ </table>
				//~ </div>
			//~ </div>

			//~ <!-- Footer -->
			//~ <div class="row" style="margin-right: -15px;margin-left: -15px;">
				//~ <div class="col-md-12" id="terms" >
					//~ <p style="font-size: .9em;line-height: 1.3em;padding: 20px 0 60px; display: block;"><strong class="margin-bottom-5"  style="font-weight: 600;color: #333;margin-bottom:5px; display: block;padding-bottom: 10px;">Terms &amp; Conditions</strong>
					//~ very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here...</p>
					
					//~ <ul id="footer" style="width: 100%;border-top: 1px solid #ddd;margin: 60px 0 0;padding: 20px 0 0;list-style: none;font-size: 15px;">
						//~ <li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><span>www.1ss.com.sg</span></li>
						//~ <li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
						//~ <li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;">+65 6666 5555</li>
					//~ </ul>
				//~ </div>
			//~ </div>
				
		//~ </div>';


		
		//~ $this->email->message($message);
		//~ $this->email->send();

		//~ return $id;   
	//~ }
	
	public function getservicereport_list()
	{
		$this->db->select('service_report.*,user_master.username as contname,user_master.companyname');
		$this->db->from($this->service_report);
		$this->db->join('user_master','user_master.id_user_master=service_report.contractor_id');
		$this->db->where('service_report.status',1);
		$query=$this->db->get();
		return $result = $query->result();	
	}
	
	public function changeconfirm_api($details,$update)
	{
		$this->db->where($details);
		return $res=$this->db->update($this->table, $update);
	}
	public function get_purchasedocument_api($where)
	{
		$this->db->select('*');
		$this->db->from('purchase_order');
       $this->db->where('p_task_id',$where);	
       	$query = $this->db->get();
		return $query->row();
	}
	public function update_purchasedocument_api($where,$data2)
	{
			$this->db->where('p_task_id',$where);
		$res=$this->db->update('purchase_order', $data2);
		return $res;
	}
	public function getuser_list($uid)
	{
	
	$this->db->select('*');
			$this->db->from('user_master'); 
			$query=$this->db->where('id_user_master',$uid);
			$query=$this->db->where('user_type',"superuser");
			$query=$this->db->get();
			return $query->row();
	}
}

