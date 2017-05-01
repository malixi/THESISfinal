     <?php
	session_start();
	require_once('connector.php');

	$prodID=$_POST['delphotoID'];
	$prodImage=$_POST['fileToDelete'];

	$stmt = $dbconn->prepare('SELECT * FROM products WHERE productID = ?');
	$stmt->bind_param('s', $prodID);
	$stmt->execute();
	$result = $stmt->get_result();
	if($rows = $result->fetch_assoc()) {
		$stmt2 = $dbconn->prepare('UPDATE products SET image = ? WHERE productID = ?');
		$stmt2->bind_param('si', $prodImage, $prodID);
		$stmt2->execute();

		echo"<script>window.alert('Photo Deleted.');</script>";
		echo"<script>location.href='viewproductpage.php';</script>";
	} else {
		echo"<script>window.alert('Product Code incorrect');</script>";
		echo"<script>location.href='viewproductpage.php';</script>";
	}
?>