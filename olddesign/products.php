<?php

session_start();

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'grayenterprise');


?>﻿

<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mattress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
</head>
<body>
<!--header-->
<?php include 'header.php';    ?>

<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->

				<div class="ca-r">
					<div class="cart box_1">
						<a href="checkout.html">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> </div>
							<img src="images/cart.png" alt=""/></h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

					</div>
				</div>
					<div class="clearfix"> </div>
			</div>

		</div>
		</div>
		<div class="container">
		<?php include 'navbar.php';  ?>
<!-- products -->
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Products</h2>
		</div>
	</div>
	<!-- grow -->
	<?php

$con=mysqli_connect('localhost','root','','grayenterprise');





$results = mysqli_query ($con,'SELECT * FROM products');

while($row = mysqli_fetch_array($results)){


	echo


	'<div class="pro-du">
	  <div class="container">
	  <div class="col-sm-4">

	    <div class="hover11 column grid-top  simpleCart_shelfItem">
	<div>
	<figure>
	      <a  href="viewproducts.php?pname='  .$row['productID']. '" class="">
	      <center><img src="admin/productimage/' .$row['image']. '" width="50%" alt=""></center></a></figure></div>
	        <div class="b-wrapper">


				<p><a href="viewproducts.php?pname='  .$row['productID']. '"><center>'  .$row['name']. '</center></a></p>
					<center><a href="viewproducts.php?pname='  .$row['name']. '" class="add-cart item_add">SEE MORE</a></center>


				</div>
			</div>
		</div>';

	}
	?>


</div>
</div>



						<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!----->
</div>
<!---->
</div>
<!-- products -->
<?php include 'footer.php'; ?>
</body>
</html>
