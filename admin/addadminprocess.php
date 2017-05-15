<?php

	session_start();
	require_once('connector.php');


	$wew=$_POST['addfirst'];
	$wew1=$_POST['addlast'];
	$username1=$_POST['username'];
	$userstatus1=$_POST['userstatus'];
	$email1=$_POST['emailaddress'];
	$newpassword=$_POST['newpassword'];
	$newpassword2=$_POST['newpassword2'];
	$encryptednewpassword = md5($_POST['newpassword']);
	$code = md5(uniqid(rand()));

	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE userEmail = ?');
	$stmt->bind_param('s', $email1);
	$stmt->execute();
	$result = $stmt->get_result();
	if($rows = $result->fetch_assoc()) {
		header("Content-Type: text/html; charset=UTF-8");
		echo"<script>window.alert('Email already exist. Try again with different email');</script>";
		echo"<script>location.href='addadminpage.php';</script>";
		$stmt->close();
		exit;
	}
	else if ($newpassword !=$newpassword2)
	{
		echo"<script>window.alert('Password not match');</script>";
		echo"<script>location.href='addadminpage.php';</script>";
	}
	 else {
		$stmt2 = $dbconn->prepare('INSERT INTO admin (userID, FirstName, LastName, userStatus, userName, userEmail, userPass, tokenCode) VALUES (?, ?, ?, ?, ?, ?,?, ?)');
		$stmt2->bind_param('issssssi', $adminID, $wew, $wew1, $userstatus1, $username1, $email1, $encryptednewpassword, $code);
		$stmt2->execute();
		echo"<script>window.alert('New admininistrator added.');</script>";
		echo"<script>location.href='viewadminpage.php';</script>";
}
?>
