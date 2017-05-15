<?php

	session_start();
	require_once('connector.php');


	$adminID=$_POST['editID'];
	$ffname=$_POST['firstname1'];
	$llname=$_POST['lastname'];
	$uusername=$_POST['username'];


	$stmt = $dbconn->prepare('SELECT * FROM admin WHERE userID = ?');
	$stmt->bind_param('i', $adminID);
	$stmt->execute();
	$result = $stmt->get_result();
	if($rows = $result->fetch_assoc()) {
		$stmt2 = $dbconn->prepare('UPDATE admin SET FirstName = ?, LastName = ?, userName= ? WHERE userID = ?');
		$stmt2->bind_param('sssi', $ffname, $llname, $uusername, $adminID);
		$stmt2->execute();

		echo"<script>window.alert('Admin updated.');</script>";
		echo"<script>location.href='viewadminpage.php';</script>";
	} else {
		echo"<script>window.alert('Admin incorrect');</script>";
		echo"<script>location.href='viewadminpage.php';</script>";
	}

?>
