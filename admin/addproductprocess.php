<?php

	session_start();
	require_once('connector.php');

	$prodName=$_POST['addname'];
	$prodCode=$_POST['addproductcode'];
	$prodID=$_POST['addproductcode'];
	$prodPrice=$_POST['addprice'];
	$prodDesc=$_POST['adddescription'];
	$prodQty=$_POST['addquantity'];
	$prodCreated=$_POST['adddate_created'];
	$prodphoto=$_FILES['fileToUpload']['name'];

	$target_dir = "productimage/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

	if(empty($target_file)){
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        echo "<script>alert('File is not an image.');history.back();</script>";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    echo "<script>alert('Sorry, file already exists.');history.back();</script>";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    //echo "Sorry, your file is too large.";
		    echo "<script>alert('Sorry, your file is too large.');history.back();</script>";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');history.back();</script>";
		    $uploadOk = 0;
		}
	}


	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    //echo "Sorry, your file was not uploaded.";
	    echo "<script>alert('Photo was not uploaded');history.back();</script>";
	    //echo"<script>location.href='addproductpage.php';</script>";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        $stmt = $dbconn->prepare('SELECT * FROM products WHERE productID = ?');
			$stmt->bind_param('s', $prodID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($rows = $result->fetch_assoc()) {
				header("Content-Type: text/html; charset=UTF-8");
				echo "<script>alert('Product already exists.');history.back();</script>";
				$stmt->close();
				exit;
			} else {
				$stmt2 = $dbconn->prepare('INSERT INTO products (productID, product_code, name, price, image, description, quantity, date_created) VALUES (?,?, ?, ?, ?, ?, ?, ?)');
				$stmt2->bind_param('issdssis', $prodID, $prodCode, $prodName, $prodPrice, $prodphoto, $prodDesc, $prodQty, $prodCreated);
				$stmt2->execute();
				echo "<script>alert('Product Added.');</script>";
				echo"<script>location.href='viewproductpage.php';</script>";
			}
	    } else {
	    	$prodphoto = "Submit";
	    	$stmt = $dbconn->prepare('SELECT * FROM products WHERE productID = ?');
			$stmt->bind_param('s', $prodID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($rows = $result->fetch_assoc()) {
				header("Content-Type: text/html; charset=UTF-8");
				echo "<script>alert('Product already exists.');history.back();</script>";
				$stmt->close();
				exit;
			} else {
				$stmt2 = $dbconn->prepare('INSERT INTO products (productID, product_code, name, price, image, description, quantity, date_created) VALUES (?,?, ?, ?, ?, ?, ?, ?)');
				$stmt2->bind_param('issdssis', $prodID, $prodCode, $prodName, $prodPrice, $prodphoto, $prodDesc, $prodQty, $prodCreated);
				$stmt2->execute();
				echo "<script>alert('Product Added.');</script>";
				echo"<script>location.href='viewproductpage.php';</script>";
			}
	    }
	}
?>
