<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/SMTP.php";
	include_once "PHPMailer/Exception.php";

	class email{
		private $d;
		private $data = array();
		private $config = array();
		private $setting = array();
		private $opt = '';

		function __construct($d,$config,$setting)
		{
			$this->d = $d;
			$this->config = $config;
			$this->setting = $setting;
			$this->infoEmail();
		}

		public function infoEmail()
		{
			global $config_base;
			$this->opt = $this->config['optionsEmail'];
			$this->data['email'] = ($this->opt['mailertype']==1) ? $this->opt['email_host'] : $this->opt['email_gmail'];
		}

		public function setEmail($key, $value)
		{
			if($key != '' && $value != '')
			{
				$this->data[$key] = $value;
			}
		}

		public function getEmail($key)
		{
			return $this->data[$key];
		}

		public function sendEmail($owner='', $arrayEmail=array(), $subject="", $message="", $file='')
		{
			global $config_base;

			$mail = new PHPMailer(true);
			$config_host = '';
			$config_port = 0;
			$config_secure = '';
			$config_email = '';
			$config_password = '';

			if($this->opt['mailertype'] == 1)
		    {
		        $config_host = $this->opt['ip_host'];
		        $config_port = $this->opt['port_host'];
		        $config_secure = $this->opt['secure_host'];
		        $config_email = $this->opt['email_host'];
		        $config_password = $this->opt['password_host'];

		        $mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPDebug = false;
				$mail->SMTPSecure = $config_secure;
				$mail->SMTPOptions = array(
		        	'ssl' => array(
		        		'verify_peer' => false,
		        		'verify_peer_name' => false,
		        		'allow_self_signed' => true
		        	)
		        );
				$mail->Host = $config_host;
				$mail->Port = $config_port;
				$mail->Username = $config_email;
				$mail->Password = $config_password;
				$mail->SetFrom($this->setting['email'],$this->setting['name_'.$lang]);
		    }
		    else if($this->opt['mailertype'] == 2)
		    {
		        $config_host = $this->opt['host_gmail'];
		        $config_port = $this->opt['port_gmail'];
		        $config_secure = $this->opt['secure_gmail'];
		        $config_email = $this->opt['email_gmail'];
		        $config_password = $this->opt['password_gmail'];

		        $mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPDebug = false;
				$mail->SMTPSecure = $config_secure;
				$mail->Host = $config_host;
				$mail->Port = $config_port;
				$mail->Username = $config_email;
				$mail->Password = $config_password;
				$mail->SetFrom($config_email,$this->setting['name_'.$lang]);
				$mail->From = $config_email;
				$mail->FromName = $this->setting['name_'.$lang];
		    }

		    if($owner == 'admin')
		    {
		    	$mail->AddAddress($this->opt['email'],$this->setting['name_'.$lang]);
		    }
		    else if($owner == 'customer')
		    {
		    	if($arrayEmail && count($arrayEmail) > 0)
		    	{
		    		foreach($arrayEmail as $vEmail)
		    		{
		    			$mail->AddAddress($vEmail['email'],$vEmail['name']);
		    		}
		    	}
		    }
		    $mail->AddReplyTo($this->setting['email'],$this->setting['name_'.$lang]);
		    $mail->CharSet = "utf-8";
		    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		    $mail->Subject = $subject;
		    $mail->MsgHTML($message);
		    if($file != '' && isset($_FILES[$file]) && !$_FILES[$file]['error'])
		    {
		    	$mail->AddAttachment($_FILES[$file]["tmp_name"], $_FILES[$file]["name"]);
		    }

		    if($mail->Send()) return true;
		    else return false;
		}
	}
?>