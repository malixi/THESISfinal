
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


			</div>
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div><div><small><a href="https://buywebsitetrafficreviews.org/trafficwebsites/">find the best traffic website here!</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(14.5495599,121.05608419999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.5495599,121.05608419999999)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>Market Market Philippines<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
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
