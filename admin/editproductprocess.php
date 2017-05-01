<?php

	session_start();
	require_once('connector.php');
	
	
	$prodID=$_POST['editID'];
	$prodName=$_POST['editname'];
	$prodPrice=$_POST['editprice'];
	$prodDesc=$_POST['editdescription'];
	$prodQty=$_POST['editquantity'];
	$prodCreated=$_POST['editdate_created'];
	$prodImage=$_FILES['fileToReplace']['name'];

	$target_dir = "productimage/";
	$target_file = $target_dir . basename($_FILES["fileToReplace"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToReplace"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToReplace"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    echo"<script>location.href='viewproductpage.php';</script>";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	    echo"<script>location.href='viewproductpage.php';</script>";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToReplace"]["tmp_name"], $target_file)) {
	        $stmt = $dbconn->prepare('SELECT * FROM products WHERE productID = ?');
			$stmt->bind_param('s', $prodID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($rows = $result->fetch_assoc()) {
				$stmt2 = $dbconn->prepare('UPDATE products SET name = ?, price = ?, image = ?, description = ?, quantity = ?, date_created = ? WHERE productID = ?');
				$stmt2->bind_param('sdssisi', $prodName, $prodPrice, $prodImage, $prodDesc, $prodQty, $prodCreated, $prodID);
				$stmt2->execute();

				echo"<script>window.alert('Product updated.');</script>";
				echo"<script>location.href='viewproductpage.php';</script>";
			} else {
				echo"<script>window.alert('Product Code incorrect');</script>";
				echo"<script>location.href='viewproductpage.php';</script>";
			}
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	        echo"<script>location.href='addproductpage.php';</script>";
	    }
	}
?>