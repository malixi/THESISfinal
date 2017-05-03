
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
<!--header-->
<?php include 'header.php';?>

<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>

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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images\lg.png" alt="New York" width="100%">
        <div class="carousel-caption">
          <h3>Lorem Ipsum </h3>
          <p>Lorem Ipsum Lorem Ipsum </p>
        </div>
      </div>

      <div class="item">
        <img src="images\sony.png" alt="Chicago" width="100%">
        <div class="carousel-caption">
          <h3>Lorem Ipsum </h3>
          <p>Lorem Ipsum Lorem Ipsum </p>
        </div>
      </div>

      <div class="item">
        <img src="images\lg.png" alt="Los Angeles" width="100%">
        <div class="carousel-caption">
          <h3>Lorem Ipsum </h3>
          <p>Lorem Ipsum Lorem Ipsum </p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<!--content-->
<div id="tour" class="bg-1">
  <div class="container">



    <div class="row text-center">



				<br><br><h3 class="text-center">FEATURED PRODUCTS</h1>
        </font></h3>


	        <div class="col-sm-4">
						<div class="hover11 column grid-top simpleCart_shelfItem">
		<div>
			<figure><img src="images/coconutvinegar.png" /></figure>

		</div>
		<div class="b-wrapper">


<p><a href="single.html">COCONUT VINEGAR</a></p>
<center><a href="http://localhost:8080/THESISfinal/coconutvinegar.php" class="add-cart item_add">SEE MORE</a></center><br>
</div>
</div>
</div>
<div class="col-sm-4">
	<div class="hover11 column grid-top simpleCart_shelfItem">
<div>
<figure><img src="images/coconutjam.png" /></figure>

</div>
<div class="b-wrapper">


<p><a href="single.html">COCONUTJAM</a></p>
<center><a href="http://localhost:8080/THESISfinal/coconutjam.php" class="add-cart item_add">SEE MORE</a></center><br>
</div>
</div>
</div>
<div class="col-sm-4">
 <div class="hover11 column grid-top simpleCart_shelfItem">
<div>
<figure><img src="images/vco.png" /></figure>

</div>
<div class="b-wrapper">


<p><a href="single.html">VIRGIN COCONUT OIl</a></p>
<center><a href="http://localhost:8080/THESISfinal/virgincoconutoil.php" class="add-cart item_add">SEE MORE</a></center><br>
</div>
</div>
</div>
	    </div>

								<div class="clearfix"> </div>
					</div>
				</div>
			</div>
	<!----->
<?php include 'footer.php'; ?>
</body>
</html>
