<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapresult extends CI_Controller {

	public function __construct() 
	{
	parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');     	
        $this->load->library('email');
        $this->load->helper('url');	
        $this->load->database();
        $this->load->model('Employee_Model');
		$this->load->library('email');	
				$this->load->model('task_model');
				$this->load->model('property_model');
				$this->load->model('prices_model');
				$this->load->model('purchaseorder_model');
				$this->load->model('service_model');
				$this->load->model('postjob_model');
	}
	
	public function index()
	{		
		//~ $searchimg = $this->dashboard_model->getsearchimg();	
		$state = $this->input->get('state');
		
		if($state == 'AL')
		{
			$fullstate = 'Alabama';
		}
		elseif($state == 'AK')
		{
			$fullstate = 'Alaska';
		}	
		elseif($state == 'AZ')
		{
			$fullstate = 'Arizona';
		}	
		elseif($state == 'AR')
		{
			$fullstate = 'Arkansas';
		}	
		elseif($state == 'CA')
		{
			$fullstate = 'California';
		}	
		elseif($state == 'CO')
		{
			$fullstate = 'Colorado';
		}
		elseif($state == 'CT')
		{
			$fullstate = 'Connecticut';
		}
		elseif($state == 'DE')
		{
			$fullstate = 'Delaware';
		}
		elseif($state == 'DC')
		{
			$fullstate = 'DistrictOfColumbia';
		}
		elseif($state == 'FL')
		{
			$fullstate = 'Florida';
		}
		elseif($state == 'GA')
		{
			$fullstate = 'Georgia';
		}
		elseif($state == 'ID')
		{
			$fullstate = 'Idaho';
		}
		elseif($state == 'IL')
		{
			$fullstate = 'Illinois';
		}
		elseif($state == 'IN')
		{
			$fullstate = 'Indiana';
		}
		elseif($state == 'IA')
		{
			$fullstate = 'Iowa';
		}
		elseif($state == 'KS')
		{
			$fullstate = 'Kansas';
		}
		elseif($state == 'KY')
		{
			$fullstate = 'Kentucky';
		}
		elseif($state == 'LA')
		{
			$fullstate = 'Louisiana';
		}	
		elseif($state == 'ME')
		{
			$fullstate = 'Maine';
		}	
		elseif($state == 'MD')
		{
			$fullstate = 'Maryland';
		}	
		elseif($state == 'MA')
		{
			$fullstate = 'Massachusetts';
		}	
		elseif($state == 'MI')
		{
			$fullstate = 'Michigan';
		}	
		elseif($state == 'MN')
		{
			$fullstate = 'Minnesota';
		}	
		elseif($state == 'MS')
		{
			$fullstate = 'Mississippi';
		}	
		elseif($state == 'MO')
		{
			$fullstate = 'Missouri';
		}	
		elseif($state == 'MT')
		{
			$fullstate = 'Montana';
		}	
		elseif($state == 'NE')
		{
			$fullstate = 'Nebraska';
		}	
		elseif($state == 'NV')
		{
			$fullstate = 'Nevada';
		}	
		elseif($state == 'NH')
		{
			$fullstate = 'NewHampshire';
		}	
		elseif($state == 'NJ')
		{
			$fullstate = 'NewJersey';
		}	
		elseif($state == 'NM')
		{
			$fullstate = 'NewMexico';
		}	
		elseif($state == 'NY')
		{
			$fullstate = 'NewYork';
		}	
		elseif($state == 'NC')
		{
			$fullstate = 'NorthCarolina';
		}	
		elseif($state == 'ND')
		{
			$fullstate = 'NorthDakota';
		}	
		elseif($state == 'OH')
		{
			$fullstate = 'Ohio';
		}	
		elseif($state == 'OK')
		{
			$fullstate = 'Oklahoma';
		}	
		elseif($state == 'OR')
		{
			$fullstate = 'Oregon';
		}	
		elseif($state == 'PA')
		{
			$fullstate = 'Pennsylvania';
		}	
		elseif($state == 'RI')
		{
			$fullstate = 'RhodeIsland';
		}
		elseif($state == 'SC')
		{
			$fullstate = 'SouthCarolina';
		}
		elseif($state == 'SD')
		{
			$fullstate = 'SouthDakota';
		}
		elseif($state == 'TN')
		{
			$fullstate = 'Tennessee';
		}
		elseif($state == 'TX')
		{
			$fullstate = 'Texas';
		}
		elseif($state == 'UT')
		{
			$fullstate = 'Utah';
		}
		elseif($state == 'VT')
		{
			$fullstate = 'Vermont';
		}	
		elseif($state == 'VA')
		{
			$fullstate = 'Virginia';
		}	
		elseif($state == 'WA')
		{
			$fullstate = 'Washington';
		}	
		elseif($state == 'WV')
		{
			$fullstate = 'WestVirginia';
		}	
		elseif($state == 'WI')
		{
			$fullstate = 'Wisconsin';
		}	
		elseif($state == 'WY')
		{
			$fullstate = 'Wyoming';
		}
		
	
		//~ echo "<pre>";
//~ var_dump( $fullstate);
//~ var_dump( $searchstate);
redirect('bids/find_job/'.$fullstate.'');

		//~ $branchstate = $this->dashboard_model->getbranchstate($state);
		
		//~ $pestcats = $this->dashboard_model->getpestcategory();

		
		
					
				//~ $data['results'] = $searchstate;
				//~ $data['branch_result'] = $branchstate;
				//~ $data['search_state']= $state;
				//~ $data['branch_state']= $state;
				//~ $data['full_state'] = $fullstate;
				
			

	}
}
