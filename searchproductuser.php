<?php
  session_start();
  require_once 'connector.php';
?>
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
  <?php include 'header.php';?>

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
  	<?php include 'navbar.php'; ?>



  <?php
  $search = $_GET['search'];
  $results = mysqli_query ($dbconn,'SELECT * FROM products WHERE name LIKE "%'.$search.'%"');

if($results->num_rows > 0) {

while($rows = mysqli_fetch_array($results)){?>
<div class='col-sm-4'>
        <div class='thumbnail'>
      <div class='grid-top simpleCart_shelfItem'>
        <a href="viewproducts.php?pname=<?php echo $rows['name'] ?>" class='b-link-stripe b-animate-go  thickbox'><img class='img-responsive' src="admin/productimage/<?php echo $rows["image"];?>" alt=''>
          <div class='b-wrapper'>
                  <h3 class='b-animate b-from-left b-delay03' >
                    <span>"<?php echo $rows['name'] ?>"</span>
                  </h3>
                </div>
        </a>
      <p><a href="viewproducts.php?pname=<?php echo $rows['name'] ?>">"<?php echo $rows['name'] ?>"</a></p>
      <a href="viewproducts.php?pname=<?php echo $rows['name'] ?>" class='item_add'><p class='number item_price'><i> </i>&#8369;<?php echo $rows['price'] ?></p></a>
      </div>
      </div>
      </div>
<?php
}
}
  ?>
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/>



<!----->
<?php include 'footer.php'; ?>
</body>
</html>
