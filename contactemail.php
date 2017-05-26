<?php
session_start();
include_once("configuration.php");
?>

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
  $mail->addAddress('grayenterprisethesis@gmail.com');

  $email=$_POST['Email'];                            // email kong san sya mag rereply
  $name=$_POST['Name'];
  $mail->setFrom( $email, $name);
  $mail->addReplyTo($email, $name);
  $mail->isHTML(true);                              // Set email format to HTML

  $subject=$_POST['Subject'];
  $message=$_POST['Message'];
  $contactMessage = '<h1>Good Day! You have receive an email from ' .$name. '</h1>';
  $contactMessage .= '<p>Email: ' .$email. '</p>';
  $contactMessage .= 'Message: <br>';
  $contactMessage .= '           "' .$message. '"';
  $mail->Subject = $subject;
  $mail->Body    = $contactMessage;

  //send email

  if(!$mail->send()) {
      //echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
      //toastr
      echo"<script>location.href='contact.php?action=error';</script>";

  } else {
    // echo"<script>window.alert('Message sent!');</script>";
    // You need to be able to redirect with PARAMETERS. Give a parameters called action and
    // the receiving page must get that action and do the action.
    // Like "?action=successEmail" and the resulting page will do the toast.
    //toastr
  	echo"<script>location.href='contact.php?action=success';</script>";

  }
  //back to return url
  $return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
  header('Location:'.$return_url);

?>
