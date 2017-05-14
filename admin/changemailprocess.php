<?php

	session_start();
	require_once('connector.php');


	$emailid=$_SESSION['userSession'];
	$firstname=$_SESSION['FirstName1'];
	$lastname=$_SESSION['LastName1'];
	$email1=$_POST['email'];
	$email2=$_POST['email1'];
	$coded= md5(uniqid(rand()));
	$emailname = "Gray Enterprise";


	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE  userEmail= ?');
	$stmt->bind_param('s', $email1);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($rows = $result->fetch_assoc())
	{
		echo"<script>window.alert('Email already exist');</script>";
		echo"<script>location.href='changemail.php';</script>";
	}

	else if($email1 !=$email2)
	{

		echo"<script>window.alert('Email not match');</script>";
		echo"<script>location.href='changemail.php';</script>";
	}
	else {
		$stmt2 = $dbconn->prepare('UPDATE admin SET tokenCode = ? WHERE userID = ?');
		$stmt2->bind_param('si', $coded, $emailid);
		$stmt2->execute();

		require 'mailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->SMTPDebug = 3;
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'grayenterprise.mailserver@gmail.com';    // SMTP username/
		$mail->Password = '*1973nutrifarmcorporation';             // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;
		$mail->addAddress($email1);

		$email=$email2;            // email kong san sya mag rereply
		$mail->setFrom( $email, $emailname);
		$mail->addReplyTo($email, $firstname);
		$mail->isHTML(true);  // Set email format to HTML

		$message= "
					 Hello , $firstname $lastname
					 <br /><br />
					 We got requested to reset your email, if you do this then just click the following link to verify your email, if not just ignore this email,
					 <br /><br />
					 Click the following link below to verify your email
					 <br /><br />
					 <a href='http://localhost/THESISfinal/admin/verifyemail.php?email=$email1&code=$coded'>click here to verify your email</a>
					 <br /><br />
					 thank you :
					 ";
		$subject = "Please verify your email";
		$mail->Subject = $subject;
		$mail->Body    = $message;
		//send email

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		  echo"<script>window.alert('A confirmation email was sent to $email1. Your email will not be changed until you confirm!');</script>";
		  echo"<script>location.href='home.php';</script>";
		}
}



?>
