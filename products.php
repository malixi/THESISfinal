<html>
<head>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->

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
	<?php include 'header.php';    ?>
<!-- search-scripts -->
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script>new UISearch( document.getElementById( 'sb-search' ) );</script>
<!-- //search-scripts -->
<div class="ca-r">
	<div class="cart box_1">
		<a href="view_cart.php">
			<h3> 
				<div class="total">
					<span class="simpleCart_total"></span>
				</div>
				<img src="images/cart.png" alt=""/>
			</h3>
		</a>
		<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
	</div>
</div>
	<div class="clearfix"> </div>
</div>
</div>
</div>
<div class="container">
<?php include 'navbar.php'; ?>
				

<!-- products -->
<!-- grow -->
<div class="grow">
	<div class="container">
		<h2>Products</h2>
	</div>
</div>
<!-- grow -->

<?php
session_start();
include_once("configuration.php");

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<link href="style/style.css" rel="stylesheet" type="text/css">

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0){

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT productID, product_code, name, description, image, price FROM products");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object()){
	$products_item .= <<<EOT
	<li class="product">
		<form method="post" action="cart_update.php">
	<div class="hover11">

	<div class="product-thumb"><figure>	<a href="viewproducts.php?pname={$obj->productID}" class=""><img src="admin/productimage/{$obj->image}" width="150px" height="150px"></a></figure></div>
	<div class="product-content"><h3>{$obj->name}</h3>
	<div class="product-info">
	Price {$currency}{$obj->price}

	<fieldset>



	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>

	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}"  />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
<!-- Products List End -->
<?php include 'footer.php'; ?>
</body>
</html>
