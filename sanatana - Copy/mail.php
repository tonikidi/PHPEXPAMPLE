<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$company = $_POST['user_company'];
$subject = $_POST['subject'];
$message = $_POST['message'];



$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 


$mail->Username = '	info@sanatana-trading.com'; 
$mail->Password = '*********';

$mail->isHTML(true);                                  
$mail->setFrom('info@sanatana-trading.com');
$mail->addAddress('office@sanatana-trading.com');     


$mail->Subject = $subject;
$mail->Body    = 'Name:' .$name . ' <br> Phone: ' .$phone. '<br> Email: ' .$email. '<br>Company:' .$company. '<br> Subject: ' .$subject.  '<br> Message: ' .$message;
$mail->AltBody = '';

if(!$mail->send()) {
    $msg = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $msg = "Message sent succesfully!";
	
	//header('location: thank-you.html');
	//header('Location:contact.html#contact');
	//header('<script>myfunction()</script>');
}
//header('Location:contact.html');
//sleep(5);
echo "<script type='text/javascript'>alert('$msg');</script>";
?>