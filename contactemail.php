<?php
re
//if "email" variable is filled out, send email
  //Email information
  require 'admin/mailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail->SMTPDebug = 3;
  $mail->isSMTP();                                   // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                            // Enable SMTP authentication
  $mail->Username = '';          // SMTP username
  $mail->Password = ''; // SMTP password
  $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;
  $mail->addAddress('');

  $email=$_POST['Email'];
  $name=$_POST['Name'];
  $mail->setFrom( $email, $name);
  $mail->addReplyTo($email, $name);
  $mail->isHTML(true);  // Set email format to HTML

  $subject=$_POST['Subject'];
  $message=$_POST['Message'];
  $bodyContent = '<h1>Hello!</h1>';
  $bodyContent .= '<p>You received a message from ' .$name. '</p>';
  $bodyContent .= 'Message:';
  $bodyContent .= ' "' .$message. '"';
  $bodyContent .= '<p>Reply to: ' .$email. '</p>';
  $mail->Subject = $subject;
  $mail->Body    = $bodyContent;

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
