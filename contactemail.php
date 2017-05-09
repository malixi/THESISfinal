<?php

//if "email" variable is filled out, send email
  if (isset($_POST['submit']))  {

  //Email information
require 'mailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail->SMTPDebug = 3;
  $mail->isSMTP();                                   // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                            // Enable SMTP authentication
  $mail->Username = '';          // SMTP username
  $mail->Password = ''; // SMTP password
  $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;

  $mail->setFrom('', '');
  $mail->addReplyTo('', '');
  $mail->isHTML(true);  // Set email format to HTML

    $msg = 'Name: ' .$_POST['Name'] . "\n"
    .'Email: ' .$_POST['Email'] . "\n"
    .'Subject: ' .$_POST['Subject'] . "\n"
    .'Message: ' .$_POST['Message'];


  //send email
mail($mail, $msg);

}
  //if "email" variable is not filled out, display the form

?>

<html>
<body>


  					  <form name="emailform" method="post">
  					    <input type="text" value="Name" name="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}" required />

  					    <input type="text" value="Email" name="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}" required />
  					    <input type="text" value="Subject" name="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}" required />

  					    <textarea cols="77" rows="6" value=" " name="Message" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}" required>Message</textarea>
  					    <div class="send">
  					      <input type="submit" name="submit" value="Send">
  					    </div>
  					  </form>



</body>
</html>
