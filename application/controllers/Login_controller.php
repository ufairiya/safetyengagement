<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
    
    public function __construct(){
    parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Employee_Model');   
		$this->load->model('property_model');		
    }
    
    public function index()
	{
		$data['base_url'] = base_url();		
		$data['current_menu']  = "";
		$data['sub_menu']  = "";
		$this->load->view('front/_blocks/header_home',$data);
		$this->load->view('front/home_view',$data);
		$this->load->view('front/_blocks/footer',$data);
	}
	public function login()
	{
		$remember = $this->input->post('remindme') ;
		$username = $this->input->post('txt_username');
		$password_cook = $this->input->post('log_txt_password');
		$password = md5($this->input->post('log_txt_password'));
		$res_user = $this->Employee_Model->loginUser($username, $password);
		
		if(!empty($res_user))
		{    

		if($remember == 1)
		{
		$hour = time() + 3600;
		$this->input->set_cookie('user_name',$username,$hour); 
		$this->input->set_cookie('password',$password_cook,$hour); 
		$this->input->set_cookie('remidme',$remember,$hour); 
		}
		else
		{
		if($this->input->cookie('ctracker_user_name') != '')   
		{  
		$this->input->set_cookie('user_name',''); 
		}
		if($this->input->cookie('ctracker_password') != '')   
		{  
		$this->input->set_cookie('password',''); 
		}
		if($this->input->cookie('ctracker_remidme') != '')   
		{  
		$this->input->set_cookie('remidme',''); 
		}
		}
		print json_encode(array("status"=>"success",'redirect'=>base_url('home')));             
		}
		else
		{
		print json_encode(array('status'=>'failed','faild' => '<div class="alert alert-danger alert-dismissable" text-center"><a class="close" data-dismiss="alert" aria-label="close">×</a>Login Failed!! Please try again.</div>'));
		}
	}
	function confirmEmail($hashcode)
	{
		$dataresult =	$this->Employee_Model->getactivedata($hashcode);
		if(!empty($dataresult))
		{
			if($dataresult->status == 0)
			{
				$data['base_url'] = base_url();		
				$data['current_menu']  = "";
				$data['sub_menu']  = "";
				$data['activedata'] = $dataresult;
				$this->load->view('front/activeconfirmation',$data);
				//redirect('activation');
			}
			else
			{
				$this->session->set_flashdata('alreadyactive', '<div class="alert alert-success text-center">This Email Address Already Activated </div>');
				redirect('home');
			}
		}
	}
	function activeconfirmEmail($active = 0)
	{
		$dataresult =	$this->Employee_Model->verifyEmail ($active);
		//var_dump($dataresult);
		if(!empty($dataresult))
		{
		$this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
		redirect('home');
		}
		else
		{
		$this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
		redirect('home');
		}
	}
   
    public function logout()
    {
        
    }
     /*new password reset*/
  
    function ForgotPassword() 
    {
		$password=  $this->users_model->ForgotPassword();
        $this->load->view('front/forgot_password.php');
    }
 	public function resetpassword()
    {
		$data['base_url'] = base_url();	
		$data['createkey'] = $this->uri->segment(3);
		$data['current_menu']  = "";
		$data['sub_menu']  = "";
		$this->load->view('front/reset_password',$data);

    }
   
	public function Passwordreset()
	{
			$email = $this->input->post('reset_email');  
			$emaildata = $this->users_model->getresetuserdata($email);  

			$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$verificationText =substr(str_shuffle($letters), 0, 10);
			$newpass = md5($verificationText);
			$baseurl = base_url();
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Safety engagement - Activation</title>
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
					<img style="border: 0;display: block;height: auto;width: 100%;max-width: 260px;" alt="" width="260" src="'.$baseurl.'assets/images/logo-whitew.png">
				</div>
			</div>
			</div>
			<!--[if (mso)|(IE)]></td><td style="width: 300px" valign="top" class="w260"><![endif]-->
			<div class="column" style="Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);text-align: left;color: #fff;font-size: 14px;line-height: 21px;font-family: Lato,Tahoma,sans-serif;">

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div style="line-height:20px;font-size:1px">&nbsp;</div>
			</div>

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #fff;font-size: 17px;line-height: 26px;">Hi '.$emaildata ->first_name.',</h3><p style="Margin-top: 12px;Margin-bottom: 20px;font-family: open sans,sans-serif;"><span class="font-open-sans">Please click on the button below to reset your password</span></p>
			</div>

			<div style="Margin-left: 20px;Margin-right: 20px;">
				<div class="btn btn--flat fullwidth btn--large" style="Margin-bottom: 20px;text-align: center;">
				<!--[if !mso]--><a style="border-radius: 4px;display: block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fe7587;background-color: #fff;font-family: Lato, Tahoma, sans-serif;" href="'.$baseurl.'login_controller/resetpassword/'.$newpass.'/?email='.$email.'">RESET PASSWORD</a><!--[endif]-->
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
			$this->email->from('test.stallioni@gmail.com', 'SE'); 
			$this->email->to($email);
			$this->email->subject('Reset Password'); 			
			$this->email->message($message);
			$this->email->send(); 				
			$update_key=  $this->users_model->update_key($data);
			echo 'success';
   
	}
      
	public function reset_password()
	{
		$passwordplain  =$this->input->post('resetnewpassword');   
		$create_key  =$this->input->post('create_key');   
		$newpass = md5($passwordplain);
		$data = array(
		'password' => $newpass,
		'passwordplain' => $passwordplain,
		'create_key' => $create_key
		);
		$update_password=  $this->users_model->update_password($data);
		$this->session->set_flashdata('reset_msg', '<div class="alert alert-danger text-center">Password reset Successfully.</div>');
		redirect('home');     
	}
	public function changepassword()
	{
		if ($this->input->is_ajax_request())
		{
		$current_password  = $this->input->post('current_password');
		$new_password = $this->input->post('new_password');
		$get_user = $this->users_model->get_checkpassword(array('password'=>md5($current_password)),array('id_user_master'=>$this->session->userdata('id_user_master')));
		if($get_user == FALSE){
		//$this->session->set_flashdata('errpass', '<div class="alert alert-danger alert-dismissable">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Current Password Not valid.</div>'); 
		echo 'current_fail';
		exit;
		}
		$data['password'] = md5($new_password);
		$this->users_model->update($data, array('id_user_master'=>$this->session->userdata('id_user_master')));
		//$this->session->set_flashdata('updatepassword', '<div class="alert alert-success alert-dismissable">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Password Updated Succesfully.</div>'); 
		echo  'true';
		exit;			
		}	
	}
	public function update()
	{
		if ($this->input->is_ajax_request()){
			$data["first_name"] = $this->input->post('first_name');
			$data["profile_image"] = $this->input->post('img_link');
			$data["positioncompany"] = $this->input->post('positioncompany');
			$data["address"] = $this->input->post('companyaddress');
			$data["city"] = $this->input->post('city');
			$data["state"] = $this->input->post('state');
			$data["zip_code"] = $this->input->post('zipcode');
			$data["resume"] = $this->input->post('resume');
			$data["resumeimg_uploadimg_link"] = $this->input->post('resumeimg_uploadimg_link');
			$data["officephone"] = $this->input->post('officephone');
			$data["phone"] = $this->input->post('cellphone');
			$data["collegedegree"] = $this->input->post('collegedegree');
			$data["clgdegreeimg_upload_link"] = $this->input->post('clgdegreeimg_upload_link');
			$data["education"] = $this->input->post('education');
			$data["othereduimg_upload_link"] = $this->input->post('othereduimg_upload_link');
			$data["certificates"] = $this->input->post('certificates');
			$data["certificatesimg_uploadimg_link"] = $this->input->post('certificatesimg_uploadimg_link');
			$data["avettaname"] = ($this->input->post('avettaname')) ? $this->input->post('avettaname') : '';
			$data["isnetworldname"] = ($this->input->post('isnetworldname')) ? $this->input->post('isnetworldname') : '';
			$data["brownname"] =($this->input->post('brownname')) ? $this->input->post('brownname') : '';
			$data["avettaimg_link"] = $this->input->post('avettaimg_link');
			$data["isnetworldimg_link"] = $this->input->post('isnetworldimg_link');
			$data["brownimg_link"] = $this->input->post('brownimg_link');
			$data["insurance"] = $this->input->post('insurance');
			$data["poorliabaimg_uploadimg_link"] = $this->input->post('poorliabaimg_uploadimg_link');
			$data["industries"] =$this->input->post('industries');
			$data["industriesimg_uploadimg_link"] = $this->input->post('industriesimg_uploadimg_link');
			$data["comments"] = $this->input->post('comments');
			$data["commentimg_link"] = $this->input->post('commentimg_link');	
			$data["uploadpripicdraw"] = $this->input->post('uploadpripicdraw');
			$data["uploadpripicdrawimg_link"] = $this->input->post('uploadpripicdrawimg_link');
			$data["otherfilecer"] = $this->input->post('otherfilecer');
			$data["otherfilecerimg_link"] = $this->input->post('otherfilecerimg_link');
			$data["travel"] = $this->input->post('travel');
			$data["insyprocontrapp"] = (!empty($this->input->post('insyprocontrapp'))) ? $this->input->post('insyprocontrapp') : '';
			$data["notifionoff"] = (!empty($this->input->post('notifionoff'))) ? $this->input->post('notifionoff') : '';
			//~ var_dump($data);
			//~ exit;
			$this->users_model->update($data, array('id_user_master'=>$this->session->userdata('id_user_master')));
			///$this->session->set_flashdata('updateuser', '<div class="alert alert-success alert-dismissable">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> User Updated Succesfully.</div>'); 
			echo  'true';
			exit;			
		}	
	}
	public function company_update(){
		if ($this->input->is_ajax_request()){

			$data["first_name"] = $this->input->post('first_name');
			$data["profile_image"] = $this->input->post('img_link');
			$data["positioncompany"] = $this->input->post('positioncompany');
			$data["companyperion"] = $this->input->post('companyperion');
			$data["companyperemail"] = $this->input->post('companyperemail');
			$data["companypercellphone"] = $this->input->post('companypercellphone');
			$data["companyname"] = $this->input->post('companyname');
			$data["address"] = $this->input->post('address');
			$data["city"] = $this->input->post('city');
			$data["state"] = $this->input->post('state');
			$data["zip_code"] = $this->input->post('zipcode');
			$data["officephone"] = $this->input->post('officenumber');
			$data["phone"] = $this->input->post('celphone');
			$data["email"] = $this->input->post('user_email');
			$data["industry"] = $this->input->post('industry');
			$data["weblink"] = $this->input->post('weblink');
			$this->users_model->update($data, array('id_user_master'=>$this->session->userdata('id_user_master')));
			echo  'true';
			exit;			
		}	
	}
	public function profile_image()
	{
		if ($this->input->is_ajax_request())
		{
			$output = '';
			$config["upload_path"] = './uploads/';
			$config['overwrite'] = TRUE;
			$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) 
			{
				$error = array('error' => $this->upload->display_errors());
				echo   $error['error'] ;
				exit;
			} 
			else
			{
				$config = array();
				$data = array('upload_data' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/' . $data['upload_data']['file_name'];
				$config['maintain_ratio'] = TRUE;
				//~ $config['width']         = 1050;
				//~ $config['height']       = 500;

				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$config = array();
				//~ $data = $this->upload->data();
				$output .= $data['upload_data']['file_name'];
			}
			echo $output;  
			
		}     
	} 
	public function multiuplod()
	{
		if($_FILES["files"]["name"] != '')
		{ 
			$output = array();
			$config["upload_path"] = './uploads/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
			{
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if($this->upload->do_upload('file'))
				{
					$config = array();
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/'.$data['upload_data']['file_name'];
					$config['maintain_ratio'] = TRUE;
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$config = array();
					$output[] = $data['upload_data']["file_name"];
				}
			}
		echo json_encode($output);   

		}
	}
	public function multiuplodall()
	{

		if($_FILES["files"]["name"] != '')
		{ 
			$output = array();
			$config["upload_path"] = './uploads/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
			{
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if($this->upload->do_upload('file'))
				{
					$config = array();
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/'.$data['upload_data']['file_name'];
					$config['maintain_ratio'] = TRUE;
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$config = array();
					$output[] = $data['upload_data']["file_name"];
				}
			}
		echo json_encode($output);   

		}
	}
}
