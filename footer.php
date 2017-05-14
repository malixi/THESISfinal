<?php echo '<div class="footer w3layouts">
				<div class="container">
				<div class="container-fluid">
			<div class="footer-top-at w3">

				<div class="col-md-3 amet-sed w3l">
				<h4>MORE INFO</h4>
				<ul class="nav-bottom">
						<li><a href="faq.php">FAQS</a></li>
						<li><a href="forwarders.php">Forwarder</a></li>
						<li><a href="contact.php">Location</a></li>
						<li><a href="services.php">Other Services</a></li>
					</ul>
				</div>
				<div class="col-md-3 amet-sed w3ls">
					<h4>PRODUCTS</h4>
					<ul class="nav-bottom">';
					?>



<?php

$con=mysqli_connect('localhost','root','','grayenterprise');
$results = mysqli_query ($con,'SELECT * FROM products  ORDER BY productID DESC LIMIT 6 ');
while($row = mysqli_fetch_array($results)){
echo     '<li><a href="viewproducts.php?pname='  .$row['name']. '">'  .$row['name']. '</a></li>';
}
		?>
					<?php echo '</ul>
					<br>
				</div>

				<div class="col-md-3 amet-sed agileits-w3layouts">
				<h4>CONTACT US</h4>
					<ul class="nav-bottom">
					<li><a href="contact.php">Contact</a></li>
					</ul>
				<br>

					<div class="social">
						<ul>
							<li><a href="https://www.facebook.com/cocosport.drink"  target="_blank"><i class="facebok"> </i></a></li>


							<li><a href="https://www.instagram.com/llanesfarm/"  target="_blank"><i class="goog"> </i></a></li>
								<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="footer-class w3-agile">
		</div>
		</div>
		</div>';
 ?>
