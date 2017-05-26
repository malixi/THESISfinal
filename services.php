<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once("analyticstracking.php") ?>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <?php include 'header.php';    ?>

    <!-- search-scripts -->
    <script src="js/classie.js"></script>
    <script src="js/uisearch.js"></script>
    <script>
        new UISearch(document.getElementById('sb-search'));
    </script>
    <!-- //search-scripts -->

    <div class="ca-r">
        <div class="cart box_1">
            <a href="view_cart.php">
              <h3> 
                <div class="total">
                  <span class="">My Cart</span> 
                </div>
                <img src="images/cart.png" alt=""/>
                  <?php
                    if(isset($_SESSION["cart_products"])){
                        echo count($_SESSION["cart_products"]);
                    }
                  ?>
              </h3>
            </a>
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>

    </div>
    </div>
    <div class="container">
        <?php include 'navbar.php'; ?>
    </div>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Services</h2>
		</div>
	</div>
	<!-- grow -->


<br>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <br>
            <h1><font color="green"><center>Acts as Buying Office</center></font></h1>
            <br>
            <br>
            <hr class="style14">
            <br>
            <p align="center" style = "font-size:17px">Our office can act as your buying office, as your third party counterpart to ensure that you are buying the exact requirement from your Philippine supplier. We shall check the volume, quality, time of delivery and capabilities of your prospective supplier or existing supplier.</p>
        </div>
        <div class="col-lg-6">
    		<br>
            <h1><font color="green"><center>Consolidator and booking coordinator</center></font></h1>
    		<hr class="style14">
            <br>
            <p align="center" style = "font-size:17px">Our office can act as your consolidator and manage different products from different suppliers to pull cargo into one container before dispatching to the pier. We can also stand as your broker for all the documentations and as your booking coordinator to your preferred shipping lines or air lines.</p>
        </div>
    </div>
</div>


<br><br><br><br>
<script>
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});
</script>
<a href="#" class="scrollup">Scroll</a>
<?php include 'footer.php'; ?>
</body>
</html>
