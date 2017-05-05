<?php

	session_start();
	require_once('connector.php');


  $msg1=$_POST['message'];
  $email=$_POST['email'];

  $test2=$_SESSION["test1"];

	//$wew=$_POST['addfirst'];
	//$wew1=$_POST['addlast'];
	//$username1=$_POST['username'];
	//$userstatus1=$_POST['userstatus'];
	//$email1=$_POST['emailaddress'];


  $sql = "INSERT INTO comment (email, message, productID)
  VALUES ('.$email.', '.$msg1.', '.$test2.')";

  if (mysqli_query($dbconn, $sql)) {
    ?><script>
    location.replace("viewproducts.php?pname=<?php echo $test2?>");
    </script>
    <?php
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
  }


  ?>
