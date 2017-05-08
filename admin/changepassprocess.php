<?php

	session_start();
	require_once('connector.php');


	$passid=$_SESSION['userSession'];
	$oldpassword=md5($_POST['oldPassword']);
	$newpassword=$_POST['newpassword'];
	$newpassword2=$_POST['newpassword2'];
	$encryptednewpassword = md5($_POST['newpassword']);


	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE userID = ? AND userPass = ?');
	$stmt->bind_param('is', $passid, $oldpassword);
	$stmt->execute();
	$result = $stmt->get_result();


	if($rows = $result->fetch_assoc()){
		if($newpassword == $newpassword2){
			$stmt2 = $dbconn->prepare('UPDATE admin SET userPass =? WHERE userID = ?');
			$stmt2->bind_param('si', $encryptednewpassword, $passid);
			$stmt2->execute();

			echo "<script>window.alert('Password updated.');</script>";
			echo"<script>location.href='changepass.php';</script>";
		}else{
			echo "<script>alert('Password Dont Match.');history.back();</script>";
		}
	}else{
		header("Content-Type: text/html; charset=UTF-8");
		echo "<script>alert('Old password incorrect.');history.back();</script>";
		$stmt->close();
		exit;
	}
?>
