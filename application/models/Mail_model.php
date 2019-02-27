<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }
    
	public function sendMail($from_email, $from_name, $to, $subject, $content, $cc = '', $bcc = '', $attach = array())
    {
    	$this->email->clear();
		$this->email->mailtype = 'html';
		$this->email->charset = 'iso-8859-1';
		$this->email->from($from_email, $from_name);
		$this->email->to($to);
		
		if ($cc != '')
		{
			$this->email->cc($cc);
		}
		if ($bcc != '')
		{
			$this->email->bcc($bcc);
		}
		
		$this->email->subject($subject);
		$this->email->message($content);
		
		if (count($attach) > 0)
        {
            foreach($attach as $doc)
            {
                $this->email->attach($doc);    
            }
        }
		
		return $this->email->send();
    }
	
	public function htmlEmail($mailTo, $nameTo = '', $mailFrom, $nameFrom, $subject, $body, $attFile = '', $option = array())
    {
		$emailAddress = ($nameTo != '') ? $nameTo . "<" . $mailTo . ">" : $mailTo;
		
			if ( ! empty($attFile) || $attFile != '')
			{
				$fileAtt = $attFile;
				$fileAttType = substr($attFile, strrpos($attFile, ".")+1,3);
				//$fileAttType = mime_content_type($attFile);
				$fileAttName = basename($attFile);
				
				$headers  = "From: ". $nameFrom . " <" . $mailFrom . ">\n";                
				$headers .= "Reply-To: ". 'no-reply@stallioni.com' . " <" . 'Arya Project Board' . ">\n";
				$headers .= "Return-Path: " . $mailFrom ."\n";        
				//$headers .= "Content-type: text/html;\n";
				
				$file = fopen($fileAtt,'rb');
				$data = fread($file,filesize($fileAtt));
				fclose($file);
				
				$semiRand = md5(time());
				$mimeBoundary = "{$semiRand}";
				
				$headers .= "MIME-Version: 1.0\n" .
				"Content-Type: multipart/mixed; boundary=\"{$mimeBoundary}\"\n\n";
				
				$body = "This is a multi-part message in MIME format.\n\n" .
				"--{$mimeBoundary}\n" .
				"Content-Type: text/html; charset=\"iso-8859-1\"\n" .
				"Content-Transfer-Encoding: 7bit\n\n" .
				$body . "\n\n";
				
				$data = chunk_split(base64_encode($data));
				
				$body .= "--{$mimeBoundary}\n" .
				"Content-Type: {$fileAttType}; name=\"{$fileAttName}\"\n" .
				"Content-Disposition: attachment; filename=\"{$fileAttName}\"\n" .
				"Content-Transfer-Encoding: base64\n\n" .
				$data . "\n\n" .
				"-{$mimeBoundary}-\n";
			}
			else
			{
				$headers = "Content-type: text/html;\n";
				$headers .= "From: ". $nameFrom . " <" . $mailFrom . ">\n";                
				$headers .= "Reply-To: ". 'no-reply@stallioni.com' . " <" . 'Arya Project Board' . ">\n";
				$headers .= "Return-Path: " . $mailFrom ."\n";
			}

			// Do log activity
			if (mail($emailAddress, $subject, $body, $headers))
			{
				$this->usertracking->track_this("Mail Send To ".$emailAddress." Subject :".$subject);
								
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
}

/* End of file mail_model.php */
/* Location: ./application/models/mail_model.php */