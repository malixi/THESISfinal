<?php
session_start();
include_once("configuration.php");
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script>
	function ConfirmDelete() {
  return confirm("Are you sure you want to delete?");
}
</script>
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
<script>new UISearch( document.getElementById( 'sb-search' ) );</script>
<!-- //search-scripts -->

<div class="ca-r">
	<div class="cart box_1">
		<a href="view_cart.php">
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
	<?php include 'navbar.php'; ?>
	<div class="grow">
		<div class="container">
			<h2>Shopping Cart</h2>
		</div>
	</div>
	<div class="container">
		<?php
			if($_SESSION["cart_products"] == NULL){
				echo "<br><br><br><br><h2>No Products In Cart.</h2><br><br><br><br>";
			} else {
		?>
		<form method="post" action="cart_update.php">
			<table class="table table-windowed"><thead><tr><th>Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th></tr></thead>
				<tbody>
				 	<?php
						if(isset($_SESSION["cart_products"])){ //check session var
							$total = 0; //set initial total value
							$b = 0; //var for zebra stripe table
							foreach ($_SESSION["cart_products"] as $cart_itm){
								//set variables to use in content below
								$product_name = $cart_itm["product_name"];
								$product_qty = $cart_itm["product_qty"];
								$product_price = $cart_itm["product_price"];
								$product_code = $cart_itm["product_code"];
								$subtotal = ($product_price * $product_qty); //calculate Price x Qty

							   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe
							    echo '<tr class="'.$bg_color.'">';
							    echo '<td>'.$product_name.'</td>';
								echo '<td><input type="number" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
								echo '<td>'.$currency.$product_price.'</td>';
								echo '<td>'.$currency.$subtotal.'</td>';
								echo '<td><label class="btn btn-danger" for="delete">Remove</label><input Onclick=\'return ConfirmDelete()\' type="submit" style="display:none; visibility:hidden;" class="btn btn-primary" id="delete" name="remove_code[]" value="'.$product_code.'" /></td>';
					            echo '</tr>';
								$total = ($total + $subtotal); //add subtotal to total var
					        }
							$grand_total = $total + $shipping_cost; //grand total including shipping cost
							foreach($taxes as $key => $value){ //list and calculate all taxes in array
									$tax_amount     = round($total * ($value / 100));
									$tax_item[$key] = $tax_amount;
									$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
							}

							$list_tax       = '';
							foreach($tax_item as $key => $value){ //List all taxes
								$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
							}
							$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
						}
				    ?>
				    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
				    <tr><td colspan="5"><a href="products.php" class="btn btn-primary">Add More Items</a><button type="submit" class="btn btn-primary">Update</button></td></tr>
				</tbody>
			</table>
			<input type="hidden" name="return_url" value="<?php $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); echo $current_url; ?>"/>
		</form>
		<?php 
		echo '<form method="POST" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
				<input type="hidden" name="business" value="carlolo@gmail.com">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="item_name" value="'.$product_name.'">
				<input type="hidden" name="item_number" value="'.$product_code.'">
				<input type="hidden" name="quantity" value="'.$product_qty.'">
				<input type="hidden" name="shipping" value="'.$shipping_cost.'">
				
				
				<input type="hidden" name="amount" value="'.$product_price.'">
				<input type="hidden" name="currency_code" value="PHP">

				<input type="hidden" name="cancel_return" value="http://localhost/paypal_integration_php/cancel.php">
			    <input type="hidden" name="return" value="http://localhost/paypal_integration_php/success.php">

			    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
			    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
			</form>';
			}
		?>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
