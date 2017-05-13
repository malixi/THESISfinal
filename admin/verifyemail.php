<?php
require_once 'class.user.php';
	require_once('connector.php');
session_start();

if(empty($_GET['code']) && empty($_GET['email']))
{
	$user->redirect('index.php');
}

if(isset($_GET['email']) && isset($_GET['code']))
{
	$email = $_GET['email'];
	$code = $_GET['code'];
	$email2 = $email;

	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE tokenCode = ?');
	$stmt->bind_param('s', $code);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($rows = $result->fetch_assoc()) {
		$stmt2 = $dbconn->prepare('UPDATE admin SET userEmail = ? WHERE tokenCode = ?');
		$stmt2->bind_param('ss', $email2, $code);
		$stmt2->execute();

		echo"<script>window.alert('Email updated.');</script>";
		echo"<script>location.href='home.php';</script>";
}

		}

	else
	{
		$msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";

	}


session_destroy();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Verify Email</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
		<?php if(isset($msg)) { echo $msg; } ?>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
