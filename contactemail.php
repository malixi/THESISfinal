<?php

//if "email" variable is filled out, send email
  //Email information
  require './admin/mailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail->SMTPDebug = 3;
  $mail->isSMTP();                                   // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                            // Enable SMTP authentication
  $mail->Username = 'grayenterprise.mailserver@gmail.com';    // SMTP username/
  $mail->Password = '*1973nutrifarmcorporation';             // SMTP password
  $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;
  $mail->addAddress('jamielousulit@gmail.com');

  $email=$_POST['Email'];             // email kong san sya mag rereply
  $name=$_POST['Name'];
  $mail->setFrom( $email, $name);
  $mail->addReplyTo($email, $name);
  $mail->isHTML(true);  // Set email format to HTML

  $subject=$_POST['Subject'];
  $message=$_POST['Message'];
  $contactMessage = '<h1>Hello!</h1>';
  $contactMessage .= '<p>From: ' .$name. '</p>';
  $contactMessage .= 'Message: <br>';
  $contactMessage .= '           "' .$message. '"';
  $contactMessage .= '<p>Reply to: ' .$email. '</p>';
  $mail->Subject = $subject;
  $mail->Body    = $contactMessage;

  //send email

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo"<script>window.alert('Message sent!');</script>";
  	echo"<script>location.href='contact.php';</script>";
  }
    //if "email" variable is not filled out, display the form


?>
