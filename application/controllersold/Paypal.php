<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{
    
    public function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library('paypal_lib');
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
     
   public function success(){
        // Get the transaction data
        $paypalInfo = $this->input->get();

        $data['item_name']      = $paypalInfo['item_name'];
        $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["tx"];
        $data['payment_amt']    = $paypalInfo["amt"];
        $data['currency_code']  = $paypalInfo["cc"];
        $data['status']         = $paypalInfo["st"];
        
        // Pass the transaction data to view
        $this->load->view('front/paypalsuccess', $data);
    }
     
     public function cancel(){
        // Load payment failed view
        $this->load->view('front/paypalcancel');
     }
     
    public function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                $this->postjob->insertTransaction($data);
            }
        }
    }
}
