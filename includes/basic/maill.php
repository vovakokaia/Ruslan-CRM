<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.1.5/src/Exception.php';
require 'PHPMailer-6.1.5/src/PHPMailer.php';
require 'PHPMailer-6.1.5/src/SMTP.php';

function m($adress,$subject = '',$body = '',$alt = '') {
	$result = false;

	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPDebug = 0; 
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";              
	$mail->Host = "tls://smtp.gmail.com";
	$mail->Port = 587;
	$mail->SMTPKeepAlive = true;
	$mail->Mailer = "smtp";
	$mail->Username   = "vovakokaia@gmail.com";
	$mail->Password   = "za39zemel2";
	$mail->AddAddress($adress, 'abc');
	$mail->SetFrom('vovakokaia@gmail.com', 'def');
	$mail->Subject = $subject;
	$mail->AltBody = $alt; // optional - MsgHTML will create an alternate automatically
	$mail->MsgHTML($body);
	$mail->Send();

	if($mail->send()) {
		$result = true;
	}
	
	return $result;
}