<?php

	session_start();
	require_once('connector.php');


	$passid=$_SESSION['userSession'];
	$old_pass =md5($_POST['currentpassword']);
	$newpassword=$_POST['newpassword'];
	$newpassword2=$_POST['newpassword2'];
	$encryptednewpassword = md5($_POST['newpassword']);

	$chg_pwd=mysql_query("SELECT * from admin where userID='$passid'");
	$chg_pwd1=mysql_fetch_array($chg_pwd);
	$data_pwd=$chg_pwd1['userPass'];
	if($old_pass!=$data_pwd)
	{
		echo "<script>alert('Current Password not match'); window.location='changepass.php'</script>";
	}


	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE userID = ?');
	$stmt->bind_param('s', $passid);
	$stmt->execute();
	$result = $stmt->get_result();



	if($newpassword !=$newpassword2)
	{

		echo"<script>window.alert('Password not match');</script>";
		echo"<script>location.href='changepass.php';</script>";
	}
	else if
	 ($rows = $result->fetch_assoc()) {
		$stmt2 = $dbconn->prepare('UPDATE admin SET userPass = ? WHERE userID = ?');
		$stmt2->bind_param('si', $encryptednewpassword, $passid);
		$stmt2->execute();

		echo"<script>window.alert('Password updated.');</script>";
		echo"<script>location.href='home.php';</script>";
}
 else {
		echo"<script>window.alert('Product Code incorrect');</script>";
		echo"<script>location.href='home.php';</script>";
	}


?>
