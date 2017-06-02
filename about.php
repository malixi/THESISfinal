<!DOCTYPE html>
<html>
<head>
	  <?php include_once("analyticstracking.php") ?>
<title></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/about.css" rel="stylesheet" type="text/css" media="all" />
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
			<h2>About Us</h2>
		</div>
	</div>
	<!-- grow -->



<div class="container" >
	<BR><BR>

<h1><font color="green"><p class="text-center">Years of Family Business</p></h1></font>
									<hr class="style14">

<p id="fontstyle" class="text-justify">It is our mission to provide the highest quality produce in the shortest time possible.
	It is by serving our clients and their shipments in the least amount of time that we ensure that they are supplied
	with the freshest fruit and produce available today. Established since 1973,<b> LLANES NUTRIFARM CORPORATION</b> was centered
	on supplying fresh coconuts to local and international markets. Following the demand of the market,
	we have successfully ventured into diversifying our products. What first started as a small family business in 1973
	has grown to offer a wide range of the highest-quality fresh, frozen and dried products to the global market as <b>GRAY ENTERPRISE.</b> </p>
	<div class="row">

          <center> <img id="img" class="img-responsive" src="images/farming.jpg" style="width:550px;height:300px;">
				<img id="img" class="img-responsive" src="images/farm.jpeg" style="width:550px;height:300px;"></center>

    </div>

<p id="fontstyle" class="text-justify">Now, with more than 40 years of expertise in farming and export, <b>Gray Enterprise</b> is continuing the mission to provide the freshest produce both to our international and local clients. At Gray Enterprise, we believe that our core values determine how we treat our staff, clients, and partners. They define who we are and how we do our jobs. It also enables us to work together in the most effective way. We believe our name is synonymous to superior quality, integrity and dependability. This is why we take great pride in what we do and safeguard the highest quality and standards as well as ensuring that all necessary requirements are met prior to delivery.  </p>

<p> &nbsp;&nbsp;</p>




            </div>
          </div>
        </div>
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
