<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Mailer Configuration
$config['mail_mailer']          = 'PHPMailer';
$config['mail_debug']           = 0; // default: 0, debugging: 2, 'local'
$config['mail_debug_output']    = 'html';
$config['mail_smtp_auth']       = true;
$config['mail_smtp_secure']     = 'tls'; // default: '' | tls | ssl |
$config['mail_charset']         = 'utf-8';
// Templates Path and optional config
$config['mail_template_folder'] = 'templates/email';
$config['mail_template_options'] = array(
                                       'SITE_NAME' => 'Codeigniter Mail Plugin',
                                       'SITE_LOGO' => 'http://localhost/images/logo.jpg',
                                       'BASE_URL'  => 'http://localhost',
                                    );
// Server Configuration
$config['mail_smtp']    = 'ssl://email-smtp.us-west-2.amazonaws.com';

//~ $config['mail_smtp']            = 'smtp.example.com';
$config['mail_port']            = 465; // for gmail default 587 with tls
$config['mail_user']            = 'AKIAJY74ZP4MCLAXMCOQ';
$config['mail_pass']            = 'BOuieNQnlSXH5IwlxaUnkcA0G9FBlJEDCJiLBfCM++mT';
// Mailer config Sender/Receiver Addresses
$config['mail_admin_mail']      = 'admin@safetyengagement.com';
$config['mail_admin_name']      = 'WebMaster';
$config['mail_from_mail']       = 'admin@safetyengagement.com';
$config['mail_from_name']       = 'Safety engagement';
$config['mail_replyto_mail']    = 'admin@safetyengagement.com';
$config['mail_replyto_name']    = 'Reply to Name';
// BCC and CC Email Addresses
$config['mail_bcc']             = 'admin@safetyengagement.com';
$config['mail_cc']              = 'admin@safetyengagement.com';
// BCC and CC enable config, default disabled;
$config['mail_setBcc']          = false;
$config['mail_setCc']           = false;
/* End of file mail_config.php */
/* Location: ./application/config/mail_config.php */
