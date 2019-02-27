<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('calendar_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	
		$this->load->helper('url');	
		

	}

    public function get_events() 
    {
		
        //~ // Our Stand and End Dates
        //~ $start = $this->input->get("start");
        //~ $end = $this->input->get("end");

        //~ $startdt = new DateTime('now'); // setup a local datetime
        //~ $startdt->setTimestamp($start); // Set the date based on timestamp
        //~ $format = $startdt->format('Y-m-d H:i:s');

        //~ $enddt = new DateTime('now'); // setup a local datetime
        //~ $enddt->setTimestamp($end); // Set the date based on timestamp
        //~ $format2 = $enddt->format('Y-m-d H:i:s');

        $events = $this->calendar_model->get_events();

		echo json_encode($events);

        //~ $data_events = array();

        //~ foreach($events->result() as $r) { 

            //~ $data_events[] = array(
                //~ "id" => $r->ID,
                //~ "title" => $r->title,
                //~ "description" => $r->description,
                //~ "end" => $r->end,
                //~ "start" => $r->start
            //~ );
        //~ }

        //~ echo json_encode(array("events" => $data_events));
        //~ exit();
    }

    public function add_event() 
    {
        /* Our calendar data */
     
        $name = $this->input->post("s_sel_val_val");
        $serv_cat = $this->input->post("s_serv_cat");
        $cont_name = $this->input->post("cont_name");
        $desc = $this->input->post("description");
        $booking_date = $this->input->post("s_bookdate");
        $start_date = $this->input->post("start_date").' '.$this->input->post("start_time");
        $end_date = $this->input->post("end_date").' '.$this->input->post("end_time");
       $userid_s = $this->input->post('s_uid');
        $task_id_s = $this->input->post('s_catid');
    //~ Array( [s_userid] => 1 [task_name] => ghfgh [cont_name] => contractor [description] => dfs [start_date] => 01/03/2018 [end_date] => 01/18/2018 [uid] => 1 [tid] => 3)
 //~ if(!empty($start_date)) {
            //~ $sd = DateTime::createFromFormat("m/d/Y H:i A", $start_date);
            //~ $start_date = $sd->format('Y-m-d H:i');
            //~ $start_date_timestamp = $sd->getTimestamp();
        //~ } else {
            //~ $start_date = date("Y-m-d H:i A", time());
            //~ $start_date_timestamp = time();
        //~ }
        //~ if(!empty($end_date)) {
            //~ $ed = DateTime::createFromFormat("m/d/Y H:i A", $end_date);
            //~ $end_date = $ed->format('Y-m-d H:i');
            //~ $end_date_timestamp = $ed->getTimestamp();
        //~ } else {
            //~ $end_date = date("Y-m-d H:i A", time());
            //~ $end_date_timestamp = time();
        //~ }
           //~ echo $start_date;
    //~ echo $end_date;
    //~ exit;
 //~ echo $start_date;
        //~ exit;
     
        $this->calendar_model->add_event(array(
            "title" => $name,
            "s_user_id" =>  $userid_s,
            "s_task_id" =>  $task_id_s,
            "contractor_name" => $task_id_s,
            "contractor_name" => $cont_name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
               "user_name_s" => $this->session->user_name,
               "created" => $this->session->user_type,
            )
        );
	$data['base_url'] = base_url();
		$data['view_file']  = "schdule/schdulecreate";
		$data['current_menu']  = "schdule";
		$data['sub_menu']  = "schdulecreate";
		
		$this->template->load_frontend_template($data);
    }

    public function delete_event() 
    {
		$eventid = $this->input->post("id");
		 $this->calendar_model->delete_event($eventid);

		$data['base_url'] = base_url();
		$data['view_file']  = "schdule/schdulecreate";
		$data['current_menu']  = "schdule";
		$data['sub_menu']  = "schdulecreate";
		
		$this->template->load_frontend_template($data);
			
	
		
	}
    public function edit_event() 
    {
        $eventid = intval($this->input->post("eventid"));
        $event = $this->calendar_model->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->common->nohtml($this->input->post("name"));
        $desc = $this->common->nohtml($this->input->post("description"));
        $start_date = $this->common->nohtml($this->input->post("start_date"));
        $end_date = $this->common->nohtml($this->input->post("end_date"));
        $delete = intval($this->input->post("delete"));

        if(!$delete) {

            if(!empty($start_date)) {
                $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                $start_date = $sd->format('Y-m-d H:i:s');
                $start_date_timestamp = $sd->getTimestamp();
            } else {
                $start_date = date("Y-m-d H:i:s", time());
                $start_date_timestamp = time();
            }

            if(!empty($end_date)) {
                $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                $end_date = $ed->format('Y-m-d H:i:s');
                $end_date_timestamp = $ed->getTimestamp();
            } else {
                $end_date = date("Y-m-d H:i:s", time());
                $end_date_timestamp = time();
            }

            $this->calendar_model->update_event($eventid, array(
                "title" => $name,
                "description" => $desc,
                "start" => $start_date,
                "end" => $end_date,
                )
            );
            
        } else {
            $this->calendar_model->delete_event($eventid);
        }

        redirect(site_url("calendar"));
    }

       public function update_events() 
    {       
		//~ var_dump(this->input->post());
		//~ 
        $name = $this->input->post("task_name");
        $cont_name = $this->input->post("cont_name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $event_id = $this->input->post("evenid");
      //  echo   $name;
       // echo   $cont_name;
       //echo   $desc;

 if(!empty($start_date)) {
            $sd = DateTime::createFromFormat("Y-m-d", $start_date);
            $start_date = $sd->format('Y-m-d H:i:s');
            $start_date_timestamp = $sd->getTimestamp();
        } else {
            $start_date = date("d-m-Y", time());
            $start_date_timestamp = time();
        }
        if(!empty($end_date)) {
            $ed = DateTime::createFromFormat("Y-m-d", $end_date);
            $end_date = $ed->format('Y-m-d H:i:s');
            $end_date_timestamp = $ed->getTimestamp();
        } else {
            $end_date = date("d-m-Y", time());
            $end_date_timestamp = time();
        }

        $this->calendar_model->update_event($event_id ,array(
            "title" => $name,
            "contractor_name" => $cont_name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date
            )
        );
}

}
?>
