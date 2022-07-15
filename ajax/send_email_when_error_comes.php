<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/PHPMailer-6.1.5/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/PHPMailer-6.1.5/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/PHPMailer-6.1.5/src/SMTP.php';

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
	$mail->AltBody = $alt;
	$mail->MsgHTML($body);
	$mail->Send();

	if($mail->send()) {
		$result = true;
	}

	return $result;
}

if(filesize('php_errors.log') == $_POST['datas']['error_file_size']) {
	m('proflchavi3@gmail.com','New Error','New Error At '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].' : '.file_get_contents('php_errors.log'));
} else {
//	echo filesize($_SERVER['DOCUMENT_ROOT'].'/php_errors.log') .' -> '.$_POST['datas']['error_file_size'] ;
}