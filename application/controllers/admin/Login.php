<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
				$this->load->model('purchaseorder_model');

		
	}
		
	public function index()
	{
	
		// if user already logged in then redirect the user to dashboard page
		if(is_user_active('', FALSE))
		{
			redirect('admin/dashboard');
		}
				
		$data['base_url'] = base_url();
		$data['view_file']  = "login";
		$this->template->load_admin_login_template($data);
	}
	
	// perform login process
    public function processlogin(){	
	
		
			
			$this->lang->load('error', 'english');
			
			 $ad_uname = $this->input->post('username');
			 $ad_pwd = $this->input->post('password');
			
			if($ad_uname == '' || $ad_pwd == ''){
				
				$this->session->set_flashdata('error_msg', '<p>'.$this->lang->line('error_no_input').'</p>');
				redirect('admin/login');
			}
				
			// initially login status will be failed
			$login_status = 'failed';
		
			// authenticate user
			$result = getUserBasicDetails(array('username'=>$ad_uname,'password'=>md5($ad_pwd)),'',array('image'=>FALSE));
		
			if($result != FALSE){
			
				if($result->status == '1'){	
				
				//$this->load->library('GoogleAuthenticator');
				
				if(SECOND_VERFICATION == TRUE){
					$pin_number = $six_digit_random_number = mt_rand(100000, 999999);
	
					$this->load->library('twilio');
					
					$from = $this->config->item('number', 'twilio');
					$to =  "+".$result->country_code.$result->phone;
					
					$message = 'Enter this verfication code is : '.$pin_number;
					$response = $this->twilio->sms($from, $to, $message);
	
					if($response->IsError){
						$this->session->set_flashdata('error_msg','<p class="alert alert-danger">'.$response->ErrorMessage.'</p>');
						redirect('admin/login');
						return FALSE;
					}
	
					// generates the secret code
					//$secret = $this->googleauthenticator->createSecret();
					
					/// generates the QR code for the link the user's phone with the service
					//$qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl('Google Authentication Login', $result->email, $secret);
					
					// also, you can get a code to test the service
					// $oneCode = $this->googleauthenticator->getCode($secret);
					
					$this->users_model->update(array('otp'=>$pin_number), array('id_user_master'=>$result->id_user_master));
					 
					 
					$data['base_url'] = base_url();
					$data['phone_number'] =  "+".str_repeat("x",(strlen($result->phone)-3)).substr($result->phone, -3);;
					$data['key'] = $result->id_user_master;
					$data['view_file']  = "second_verification";
					$this->template->load_admin_login_template($data);
				}else{
					
					$time_stamp = time();					
						$ad_data = array(
							'session_id'=>session_id(),
							'user_id'=>$result->id_user_master,
							'user_type'=>$result->user_type,
							'user_name'=>$result->first_name.' '.$result->last_name,
							'user_email'=>strtolower($result->email),
							'user_created'=>$result->created_on
						);
					
					// save user data in session
					$this->session->set_userdata($ad_data);
					//$this->usertracking->track_this("Login");
					
					// update last login time
					//$this->users_model->update(array('last_login_time'=>getCurrentDateTime(),'otp'=>""), array('id_user_master'=>$result->id_user_master));
					redirect('admin/dashboard');
				}
				
				}elseif($result->status == '0'){					
					$this->session->set_flashdata('error_msg','<p class="alert alert-danger">'.$this->lang->line('error_account_not_activated').'</p>');
					redirect('admin/login');
				}else{					
					$this->session->set_flashdata('error_msg','<p class="alert alert-danger">'.$this->lang->line('error_account_blocked').'</p>');
					redirect('admin/login');
				}
			}else{
				
				$this->session->set_flashdata('error_msg','<p class="alert alert-danger">'.$this->lang->line('error_no_account_match').'</p>');			
				redirect('admin/login');
			}
		
	}
	   
   
	  public function Passwordreset()
   {
			$email = $this->input->post('reset_email');  
			$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$verificationText =substr(str_shuffle($letters), 0, 10);
			$newpass = md5($verificationText);
			$baseurl = base_url();
  $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>OSS - Activation</title>
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <meta name="viewport" content="width=device-width"><style type="text/css">
@media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:34px !important;line-height:43px !important}.wrapper h2{}.wrapper h2{font-size:30px !important;line-height:38px !important}.wrapper h3{}.wrapper h3{font-size:20px !important;line-height:28px !important}.column p,.column ol,.column ul{}.wrapper .size-8{font-size:8px !important;line-height:14px !important}.wrapper .size-9{font-size:9px !important;line-height:16px !important}.wrapper .size-10{font-size:10px !important;line-height:18px !important}.wrapper .size-11{font-size:11px !important;line-height:19px !important}.wrapper .size-12{font-size:12px !important;line-height:19px !important}.wrapper .size-13{font-size:13px !important;line-height:21px !important}.wrapper .size-14{font-size:14px !important;line-height:21px !important}.wrapper .size-15{font-size:15px 
!important;line-height:23px !important}.wrapper .size-16{font-size:16px !important;line-height:24px !important}.wrapper .size-17{font-size:17px !important;line-height:26px !important}.wrapper .size-18{font-size:18px !important;line-height:26px !important}.wrapper .size-20{font-size:20px !important;line-height:28px !important}.wrapper .size-22{font-size:22px !important;line-height:31px !important}.wrapper .size-24{font-size:24px !important;line-height:32px !important}.wrapper .size-26{font-size:26px !important;line-height:34px !important}.wrapper .size-28{font-size:28px !important;line-height:36px !important}.wrapper .size-30{font-size:30px !important;line-height:38px !important}.wrapper .size-32{font-size:32px !important;line-height:40px !important}.wrapper .size-34{font-size:34px !important;line-height:43px !important}.wrapper .size-36{font-size:36px !important;line-height:43px 
!important}.wrapper .size-40{font-size:40px !important;line-height:47px !important}.wrapper .size-44{font-size:44px !important;line-height:50px !important}.wrapper .size-48{font-size:48px !important;line-height:54px !important}.wrapper .size-56{font-size:56px !important;line-height:60px !important}.wrapper .size-64{font-size:64px !important;line-height:63px !important}}
</style>
   
    <style type="text/css">
body {
  margin: 0;
  padding: 0;
}
table {
  border-collapse: collapse;
  table-layout: fixed;
}
* {
  line-height: inherit;
}
[x-apple-data-detectors],
[href^="tel"],
[href^="sms"] {
  color: inherit !important;
  text-decoration: none !important;
}
.wrapper .footer__share-button a:hover,
.wrapper .footer__share-button a:focus {
  color: #ffffff !important;
}
.btn a:hover,
.btn a:focus,
.footer__share-button a:hover,
.footer__share-button a:focus,
.email-footer__links a:hover,
.email-footer__links a:focus {
  opacity: 0.8;
}
.preheader,
.header,
.layout,
.column {
  transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;
}
.layout,
.header {
  max-width: 400px !important;
  -fallback-width: 95% !important;
  width: calc(100% - 20px) !important;
}
div.preheader {
  max-width: 360px !important;
  -fallback-width: 90% !important;
  width: calc(100% - 60px) !important;
}
.snippet,
.webversion {
  Float: none !important;
}
.column {
  max-width: 400px !important;
  width: 100% !important;
}
.fixed-width.has-border {
  max-width: 402px !important;
}
.fixed-width.has-border .layout__inner {
  box-sizing: border-box;
}
.snippet,
.webversion {
  width: 50% !important;
}
.ie .btn {
  width: 100%;
}
.ie .column,
[owa] .column,
.ie .gutter,
[owa] .gutter {
  display: table-cell;
  float: none !important;
  vertical-align: top;
}
.ie div.preheader,
[owa] div.preheader,
.ie .email-footer,
[owa] .email-footer {
  max-width: 560px !important;
  width: 560px !important;
}
.ie .snippet,
[owa] .snippet,
.ie .webversion,
[owa] .webversion {
  width: 280px !important;
}
.ie .header,
[owa] .header,
.ie .layout,
[owa] .layout,
.ie .one-col .column,
[owa] .one-col .column {
  max-width: 600px !important;
  width: 600px !important;
}
.ie .fixed-width.has-border,
[owa] .fixed-width.has-border,
.ie .has-gutter.has-border,
[owa] .has-gutter.has-border {
  max-width: 602px !important;
  width: 602px !important;
}
.ie .two-col .column,
[owa] .two-col .column {
  max-width: 300px !important;
  width: 300px !important;
}
.ie .three-col .column,
[owa] .three-col .column,
.ie .narrow,
[owa] .narrow {
  max-width: 200px !important;
  width: 200px !important;
}
.ie .wide,
[owa] .wide {
  width: 400px !important;
}
.ie .two-col.has-gutter .column,
[owa] .two-col.x_has-gutter .column {
  max-width: 290px !important;
  width: 290px !important;
}
.ie .three-col.has-gutter .column,
[owa] .three-col.x_has-gutter .column,
.ie .has-gutter .narrow,
[owa] .has-gutter .narrow {
  max-width: 188px !important;
  width: 188px !important;
}
.ie .has-gutter .wide,
[owa] .has-gutter .wide {
  max-width: 394px !important;
  width: 394px !important;
}
.ie .two-col.has-gutter.has-border .column,
[owa] .two-col.x_has-gutter.x_has-border .column {
  max-width: 292px !important;
  width: 292px !important;
}
.ie .three-col.has-gutter.has-border .column,
[owa] .three-col.x_has-gutter.x_has-border .column,
.ie .has-gutter.has-border .narrow,
[owa] .has-gutter.x_has-border .narrow {
  max-width: 190px !important;
  width: 190px !important;
}
.ie .has-gutter.has-border .wide,
[owa] .has-gutter.x_has-border .wide {
  max-width: 396px !important;
  width: 396px !important;
}
.ie .fixed-width .layout__inner {
  border-left: 0 none white !important;
  border-right: 0 none white !important;
}
.ie .layout__edges {
  display: none;
}
.mso .layout__edges {
  font-size: 0;
}
.layout-fixed-width,
.mso .layout-full-width {
  background-color: #ffffff;
}
@media only screen and (min-width: 620px) {
  .column,
  .gutter {
    display: table-cell;
    Float: none !important;
    vertical-align: top;
  }
  div.preheader,
  .email-footer {
    max-width: 560px !important;
    width: 560px !important;
  }
  .snippet,
  .webversion {
    width: 280px !important;
  }
  .header,
  .layout,
  .one-col .column {
    max-width: 600px !important;
    width: 600px !important;
  }
  .fixed-width.has-border,
  .fixed-width.ecxhas-border,
  .has-gutter.has-border,
  .has-gutter.ecxhas-border {
    max-width: 602px !important;
    width: 602px !important;
  }
  .two-col .column {
    max-width: 300px !important;
    width: 300px !important;
  }
  .three-col .column,
  .column.narrow {
    max-width: 200px !important;
    width: 200px !important;
  }
  .column.wide {
    width: 400px !important;
  }
  .two-col.has-gutter .column,
  .two-col.ecxhas-gutter .column {
    max-width: 290px !important;
    width: 290px !important;
  }
  .three-col.has-gutter .column,
  .three-col.ecxhas-gutter .column,
  .has-gutter .narrow {
    max-width: 188px !important;
    width: 188px !important;
  }
  .has-gutter .wide {
    max-width: 394px !important;
    width: 394px !important;
  }
  .two-col.has-gutter.has-border .column,
  .two-col.ecxhas-gutter.ecxhas-border .column {
    max-width: 292px !important;
    width: 292px !important;
  }
  .three-col.has-gutter.has-border .column,
  .three-col.ecxhas-gutter.ecxhas-border .column,
  .has-gutter.has-border .narrow,
  .has-gutter.ecxhas-border .narrow {
    max-width: 190px !important;
    width: 190px !important;
  }
  .has-gutter.has-border .wide,
  .has-gutter.ecxhas-border .wide {
    max-width: 396px !important;
    width: 396px !important;
  }
}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
  .fblike {
    background-image: url(http://i3.cmail19.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
  }
  .tweet {
    background-image: url(http://i4.cmail19.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
  }
  .linkedinshare {
    background-image: url(http://i6.cmail19.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
  }
  .forwardtoafriend {
    background-image: url(http://i5.cmail19.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
  }
}
@media (max-width: 321px) {
  .fixed-width.has-border .layout__inner {
    border-width: 1px 0 !important;
  }
  .layout,
  .column {
    min-width: 320px !important;
    width: 320px !important;
  }
  .border {
    display: none;
  }
}
.mso div {
  border: 0 none white !important;
}
.mso .w560 .divider {
  Margin-left: 260px !important;
  Margin-right: 260px !important;
}
.mso .w360 .divider {
  Margin-left: 160px !important;
  Margin-right: 160px !important;
}
.mso .w260 .divider {
  Margin-left: 110px !important;
  Margin-right: 110px !important;
}
.mso .w160 .divider {
  Margin-left: 60px !important;
  Margin-right: 60px !important;
}
.mso .w354 .divider {
  Margin-left: 157px !important;
  Margin-right: 157px !important;
}
.mso .w250 .divider {
  Margin-left: 105px !important;
  Margin-right: 105px !important;
}
.mso .w148 .divider {
  Margin-left: 54px !important;
  Margin-right: 54px !important;
}
.mso .font-avenir,
.mso .font-cabin,
.mso .font-open-sans,
.mso .font-ubuntu {
  font-family: sans-serif !important;
}
.mso .font-bitter,
.mso .font-merriweather,
.mso .font-pt-serif {
  font-family: Georgia, serif !important;
}
.mso .font-lato,
.mso .font-roboto {
  font-family: Tahoma, sans-serif !important;
}
.mso .font-pt-sans {
  font-family: "Trebuchet MS", sans-serif !important;
}
.mso .footer__share-button p {
  margin: 0;
}
.mso .size-8,
.ie .size-8 {
  font-size: 8px !important;
  line-height: 14px !important;
}
.mso .size-9,
.ie .size-9 {
  font-size: 9px !important;
  line-height: 16px !important;
}
.mso .size-10,
.ie .size-10 {
  font-size: 10px !important;
  line-height: 18px !important;
}
.mso .size-11,
.ie .size-11 {
  font-size: 11px !important;
  line-height: 19px !important;
}
.mso .size-12,
.ie .size-12 {
  font-size: 12px !important;
  line-height: 19px !important;
}
.mso .size-13,
.ie .size-13 {
  font-size: 13px !important;
  line-height: 21px !important;
}
.mso .size-14,
.ie .size-14 {
  font-size: 14px !important;
  line-height: 21px !important;
}
.mso .size-15,
.ie .size-15 {
  font-size: 15px !important;
  line-height: 23px !important;
}
.mso .size-16,
.ie .size-16 {
  font-size: 16px !important;
  line-height: 24px !important;
}
.mso .size-17,
.ie .size-17 {
  font-size: 17px !important;
  line-height: 26px !important;
}
.mso .size-18,
.ie .size-18 {
  font-size: 18px !important;
  line-height: 26px !important;
}
.mso .size-20,
.ie .size-20 {
  font-size: 20px !important;
  line-height: 28px !important;
}
.mso .size-22,
.ie .size-22 {
  font-size: 22px !important;
  line-height: 31px !important;
}
.mso .size-24,
.ie .size-24 {
  font-size: 24px !important;
  line-height: 32px !important;
}
.mso .size-26,
.ie .size-26 {
  font-size: 26px !important;
  line-height: 34px !important;
}
.mso .size-28,
.ie .size-28 {
  font-size: 28px !important;
  line-height: 36px !important;
}
.mso .size-30,
.ie .size-30 {
  font-size: 30px !important;
  line-height: 38px !important;
}
.mso .size-32,
.ie .size-32 {
  font-size: 32px !important;
  line-height: 40px !important;
}
.mso .size-34,
.ie .size-34 {
  font-size: 34px !important;
  line-height: 43px !important;
}
.mso .size-36,
.ie .size-36 {
  font-size: 36px !important;
  line-height: 43px !important;
}
.mso .size-40,
.ie .size-40 {
  font-size: 40px !important;
  line-height: 47px !important;
}
.mso .size-44,
.ie .size-44 {
  font-size: 44px !important;
  line-height: 50px !important;
}
.mso .size-48,
.ie .size-48 {
  font-size: 48px !important;
  line-height: 54px !important;
}
.mso .size-56,
.ie .size-56 {
  font-size: 56px !important;
  line-height: 60px !important;
}
.mso .size-64,
.ie .size-64 {
  font-size: 64px !important;
  line-height: 63px !important;
}
.footer__share-button p {
  margin: 0;
}
</style>
    
<!--[if !mso]><!--><style type="text/css">
input, input[type="text"], input[type="password"], input[type="email"], input[type="number"], textarea, select {
    height: 51px;
    line-height: 51px;
    padding: 0 20px;
    outline: none;
    font-size: 15px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 0.06);
    font-weight: 500;
    opacity: 1;
    border-radius: 3px;
}
label, legend {
    display: block;
    
    font-size: 15px;
    font-weight: normal;
    margin-bottom: 8px;
}
.im {
    font-family: iconsmind!important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.im-icon-Lock-2:before {
    content: "\ea58";
}
body, h1, h2, h3, h4, h5, h6, input[type="text"], input[type="password"], input[type="email"], textarea, select, input[type="button"], input[type="submit"], button, #tiptip_content, .map-box p, .map-box div, .numerical-rating .rating-counter, body .menu-responsive i.menu-trigger:after {
    font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    text-transform: none;
}

input, input[type="text"], input[type="password"], input[type="email"], input[type="number"], textarea, select {
    height: 51px;
    line-height: 51px;
    padding: 0 20px;
    outline: none;
    font-size: 15px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 0.06);
    font-weight: 500;
    opacity: 1;
    border-radius: 3px;
}


button.button {
    line-height: 26px;
}
button.button, input[type="button"], input[type="submit"], a.button.border, a.button {
    background-color: #66676b;
    top: 0;
    padding: 9px 20px;
    color: #fff;
    position: relative;
    font-size: 15px;
    font-weight: 600;
    display: inline-block;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
    margin-right: 6px;
    overflow: hidden;
      background-color: #f91942;
    border: none;
    border-radius: 50px !important;
}
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);
</style><link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400" rel="stylesheet" type="text/css"><!--<![endif]--><style type="text/css">
body{background-color:#eb6173}.mso h1{}.mso h2{}.mso h3{}.mso .column,.mso .column__background td{}.mso .column,.mso .column__background td{font-family:Tahoma,sans-serif !important}.mso .btn a{}.mso .btn a{font-family:Tahoma,sans-serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Tahoma,sans-serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#fff !important}.mso .layout-has-border{border-top:1px solid #cc1a31;border-bottom:1px solid #cc1a31}.mso .layout-has-bottom-border{border-bottom:1px solid #cc1a31}.mso .border,.ie .border{background-color:#cc1a31}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:34px !important;line-height:43px !important}.mso h2,.ie h2{}.mso h2,.ie 
h2{font-size:30px !important;line-height:38px !important}.mso h3,.ie h3{}.mso h3,.ie h3{font-size:20px !important;line-height:28px !important}.mso .layout__inner p,.ie .layout__inner p,.mso .layout__inner ol,.ie .layout__inner ol,.mso .layout__inner ul,.ie .layout__inner ul{}
</style></head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
<body class="no-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
<!--<![endif]-->
	<table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #eb6173;" cellpadding="0" cellspacing="0" role="presentation">
	<tbody><tr><td>      
		<div style="background-color: #fe7587;">
			<div class="layout two-col" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
				<div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
					<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-full-width" style="background-color: #fe7587;"><td class="layout__edges">&nbsp;</td><td style="width: 300px" valign="top" class="w260"><![endif]-->
					<div class="column" style="Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);text-align: left;color: #fff;font-size: 14px;line-height: 21px;font-family: Lato,Tahoma,sans-serif;">
					
						<div style="Margin-left: 20px;Margin-right: 20px;">
							<div style="line-height:20px;font-size:1px">&nbsp;</div>
						</div>
						<div style="Margin-left: 20px;Margin-right: 20px;">
							<div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
								<img src="'.$baseurl.'assets/listeo/images/logo.png" alt="Logo" title="Logo" style="display:block"></div>
						</div>
					</div>
					<!--[if (mso)|(IE)]></td><td style="width: 300px" valign="top" class="w260"><![endif]-->
					<div class="column" style="Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);text-align: left;color: #fff;font-size: 14px;line-height: 21px;font-family: Lato,Tahoma,sans-serif;">
					
						<div style="Margin-left: 20px;Margin-right: 20px;">
							<div style="line-height:20px;font-size:1px">&nbsp;</div>
						</div>
					
						<div style="Margin-left: 20px;Margin-right: 20px;">
							<div class="col-md-12  restpassword">
		
  	
      <div class="restpasswordss">
        <h4 class="restpasswordcontent" id="restpass">Reset your password</h4>
      </div>
      <div class="rest">         
          <form id="resetPassword" name="resetPassword" method="post" action="'.$baseurl.'login_controller/reset_password" >
        	<div class="field-form form-group has-error">
							
								
							
							<label><i class="im im-icon-Lock-2"></i>New Password: 
                  
                <input type="password" name="password" class="effect-16" id="password" required>
             
               
										<button type="submit" style="background-color:#f91942;" class="buttonreset button border margin-top-5">Submit</button>                   
                    <input type="hidden" class="create_key" name="create_key" value="'.$newpass.'" />
                 
                   
                    
                     
                     </form> 
        </div>  
       
    </div>

						</div>
					
						<div style="Margin-left: 20px;Margin-right: 20px;">
							<div class="btn btn--flat fullwidth btn--large" style="Margin-bottom: 20px;text-align: center;">
							
							
							<!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://getjaws.cmail19.com/t/d-i-ddxjdy-l-y/" style="width:260px" arcsize="9%" fillcolor="#FFFFFF" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FE7587;font-family:Tahoma,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">FIND OUT MORE</center></v:textbox></v:roundrect><![endif]--></div>
						</div>
					</div>
				<!--[if (mso)|(IE)]></td><td class="layout__edges">&nbsp;</td></tr></table><![endif]-->
				</div>
			</div>
		</div>
	</td></tr></tbody>
	</table>
</body>
</html>';
			$data = array(
			'email' => $email,
			'reset_pwd' => $newpass
			);
			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('admin@1ss.com.sg', 'OSS'); 
			$this->email->to($email);
			$this->email->to('surya@stallioni.com');
			//$this->email->subject('Reset Password'); 			
			$this->email->message($message);
			$this->email->send(); 				
			//~ $update_key = $this->Users_model->update_key($data);  
			$update_key=  $this->users_model->update_key($data);
			
			echo 'success';
			
			//echo '<div class="alert alert-success text-center">Successfully send reset password link to your email. </div>';

			//redirect('home');
			     
      }
	public function second_step_verification(){
		
		if ($this->input->is_ajax_request()){
			
				$secret = $this->input->post('secert_key');
				//$this->load->library('GoogleAuthenticator');
				
				//$oneCode = $this->input->post('coded_key');
				$result = getUserBasicDetails(array("id_user_master"=>$this->input->post('code')),'',array('image'=>FALSE));
				//$checkResult = $this->googleauthenticator->verifyCode($secret, $oneCode, 10); // 2 = 2*30sec clock tolerance
				$code_verify = $result->otp;
				
				
				if ($code_verify == $secret) {
						$time_stamp = time();					
						$ad_data = array(
							'session_id'=>session_id(),
							'user_id'=>$result->id_user_master,
							'user_type'=>$result->user_type,
							'user_name'=>$result->first_name.' '.$result->last_name,
							'user_email'=>strtolower($result->email),
							'user_created'=>$result->created_on
						);
					
					// save user data in session
					$this->session->set_userdata($ad_data);
					$this->usertracking->track_this("Login");
					
					// update last login time
					$this->users_model->update(array('last_login_time'=>getCurrentDateTime(),'otp'=>""), array('id_user_master'=>$result->id_user_master));
					
					// set login status as success
					echo 'success';					
				} else {
					echo "fail";					
				
				}
		}
	}
	
	// perform logout process
	public function logout()
	{
		// Update logout time
		//$this->usertracking->track_this("Logout");
		//~ /$this->users_model->update(
			//~ array(
				//~ 'last_logout_time'=>getCurrentDateTime()
			//~ ),
			//~ array(
				//~ 'id_user_master'=>get_active_user_id()
			//~ )
		//~ );		
		if($this->session->userdata('user_id'))
{		$this->destroy_user();
}
	}
	
	// Destroy all user activity
	private function destroy_user()
	{
		//~ $this->session->sess_destroy();
		            $this->session->unset_userdata('user_id');

		$this->session->set_flashdata('succ_msg', '<p class="alert alert-success">Logout successfully</p>');
		redirect('admin/login');
	}
}
