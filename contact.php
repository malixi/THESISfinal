<?php 
	session_start();
?>
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
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"/>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
<script src="js/toastrInit.js"> </script>
<style>
 	 #map {
         height: 400px;
         width: 100%;
        }
 </style>
</head>
<body>
<!--header-->

<?php include 'header.php';?>
<?php

	if (isset($_GET['action']) && $_GET['action'] == 'success') {
		echo "<script>toastr.success('Success', 'Message Sent!');</script>";
	}

	if (isset($_GET['action']) && $_GET['action'] == 'error') {
		echo "<script>toastr.error('Error', 'Failed to send a Message!');</script>";
	}

 ?>

<!--header-->

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
			<h2>Contact</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class="contact">
	<div class="container">
		<div class="contact-form">
			<div class="col-md-8 contact-grid">
				<form action="contactemail.php" method="post">
				<input type="text" value="Name" name="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}" required />

				<input type="text" value="Email" name="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}" required />
				<input type="text" value="Subject" name="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}" required />

				<textarea cols="77" rows="6" value=" " name="Message" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}" required>Message</textarea>
				<div class="send">
					<input type="submit" name="submit" value="Send">
				</div>
				</form>
			</div>
				<div class="col-md-4 contact-in">
					<div class="address-more">
						<h4>Philippines Address</h4>
						<p>GRAY ENTERPRISE</p>
						<p><b>Address:</b> no. 17 Market Market, Bonifacio Global City</p>
						<p><b>Plant/ Warehouse:</b> no.38 Bugtong Lipa City, Batangas, 4217</p>
						<p><b>Tel:</b>	+63 02 9752098, +63 917 8320162 , +63 921 4713575</p>
					</div>
					<div class="address-more">
					<h4>US Address</h4>
						<p><b>Address:</b> PG&L Imports, LLC 147 West Northfield Rd Livingston NJ 07039</p>
						<p><b>Tel:</b> 	973.533.4437</p>
						<p><b>Mobile:</b> 	201.618.7671</p>
						<p><b>Email:</b> 	gary@llanesfarm.com
						Info@llanesfarm.com
						llanesfarm@gmail.com
						</p>
					</div>
				</div>
				<div class="clearfix"> </div>
        
 <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 14.5498, lng: 121.0552};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpCS10WHMsQHLui52S6KBWj-o3vhKFcU0&callback=initMap">
    </script>
    </div></div></div>
<a href="#" class="scrollup">Scroll</a>

	<?php include 'footer.php'; ?>

</body>
</html>
