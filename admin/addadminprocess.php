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

	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE userID = ?');
	$stmt->bind_param('i', $adminID);
	$stmt->execute();
	$result = $stmt->get_result();
	if($rows = $result->fetch_assoc()) {
		header("Content-Type: text/html; charset=UTF-8");
		echo "<script>alert('Admin already exists.');history.back();</script>";
		$stmt->close();
		exit;
	}
	else if ($newpassword !=$newpassword2)
	{
		echo"<script>window.alert('Password not match');</script>";
		echo"<script>location.href='addadminpage.php';</script>";
	}
	 else {
		$stmt2 = $dbconn->prepare('INSERT INTO admin (userID, FirstName, LastName, userStatus, userName, userEmail, userPass) VALUES (?, ?, ?, ?, ?, ?,?)');
		$stmt2->bind_param('issssss', $adminID, $wew, $wew1, $userstatus1, $username1, $email1, $encryptednewpassword );
		$stmt2->execute();
		echo"<script>window.alert('New admininistrator added.');</script>";
		echo"<script>location.href='viewadminpage.php';</script>";
}
?>
