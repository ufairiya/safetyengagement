<?php
class Cron extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('postjob_model');
	
		
		
	}
	public function index()
	{
		$remider_data 	= $this->postjob_model->get_p_job();

		foreach($remider_data as $remider_data_mail)
		{
			$data = array('job_status' => 4);
			$p_id = $remider_data_mail->po_id;
			$pdate = $remider_data_mail->posteddate;
			//~ echo "<pre>";
			//~ var_dump($data);
			//~ var_dump($p_id);
			//~ var_dump($pdate);
			
			$com_data 	= $this->postjob_model->update_expired_pro($p_id,$data,$pdate);
		}
	}
	
	
	public function test()
	{
		
		$remider_data 	= $this->postjob_model->get_p_job();
		foreach($remider_data as $remider_data_mail)
		{
			$data = array('job_status' => 4);
			$p_id = $remider_data_mail->po_id;
			$pdate = $remider_data_mail->posteddate;
			//~ echo "<pre>";
			//~ var_dump($data);
			//~ var_dump($p_id);
			//~ var_dump($pdate);
			
			$com_data 	= $this->postjob_model->update_expired_pro($p_id,$data,$pdate);
	var_dump($com_data);
		}
	
		exit;
	}
}
