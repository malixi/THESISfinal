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
<!-- JS Comment -->
<script src="js/comment.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>


<script> (function(){
  'use strict';

  angular
    .module('commentsApp', [])
    .controller('CommentsController', CommentsController);

  // Inject $scope dependency.
  CommentsController.$inject = ['$scope'];

  // Declare CommentsController.
  function CommentsController($scope) {
    var vm = this;

    // Current comment.
    vm.comment = {};

    // Array where comments will be.
    vm.comments = [];

    // Fires when form is submited.
    vm.addComment = function() {
      // Fixed img.
      vm.comment.avatarSrc = 'http://lorempixel.com/200/200/people/';

      // Add current date to the comment.
      vm.comment.date = Date.now();

      vm.comments.push( vm.comment );
      vm.comment = {};

      // Reset clases of the form after submit.
      $scope.form.$setPristine();
    }

    // Fires when the comment change the anonymous state.
    vm.anonymousChanged = function(){
      if(vm.comment.anonymous)
        vm.comment.author = "";
    }
  }

})();
 </script>

<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
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
<script src="js/imagezoom.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>


@import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

* {
  margin: 0;
  padding: 0;
  font-family: roboto;
}


.cont {
  width: 93%;
  max-width: 350px;
  text-align: center;
  margin: 4% auto;
  padding: 30px 0;
  background: #111;
  color: #EEE;
  border-radius: 5px;
  border: thin solid #444;
  overflow: hidden;
}

hr {
  margin: 20px;
  border: none;
  border-bottom: thin solid rgba(255,255,255,.1);
}

div.title { font-size: 2em; }

h1 span {
  font-weight: 300;
  color: #Fd4;
}

div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>

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
	<!-- grow -->
  <?php
          $pNAME = $_GET['pname'];
          $con=mysqli_connect('localhost','root','','grayenterprise');
          $results = mysqli_query ($con,"SELECT * FROM products WHERE name = '". $pNAME . "' LIMIT 1");

          while($row = mysqli_fetch_array($results)){

              echo

	'<div class="grow">
		<div class="container">
			<h2>'  .$row['name']. '</h2>
		</div>
	</div>
	<!-- grow -->


		<div class="product">
			<div class="container">

				<div class="product-price1">
				<div class="top-sing">
				<div class="col-md-7 single-top">
						<div class="flexslider">
			  <ul class="slides">
			    <li data-thumb="images/si.jpg">
			        <div class="thumb-image"> <img src="admin/productimage/' .$row['image']. '" data-imagezoom="true" class="img-responsive" width="50%"> </div>

			    </li>
			  </ul>
		</div>

	<div class="clearfix"> </div>
<!-- slide -->







          </div>

					</div>
					<div class="col-md-5 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4>'  .$row['name']. '</h4>';
          }
          ?>


						<div class="stars">
							<form action="">
								<input class="star star-5" id="star-5-2" type="radio" name="star"/>
								<label class="star star-5" for="star-5-2"></label>
								<input class="star star-4" id="star-4-2" type="radio" name="star"/>
								<label class="star star-4" for="star-4-2"></label>
								<input class="star star-3" id="star-3-2" type="radio" name="star"/>
								<label class="star star-3" for="star-3-2"></label>
								<input class="star star-2" id="star-2-2" type="radio" name="star"/>
								<label class="star star-2" for="star-2-2"></label>
								<input class="star star-1" id="star-1-2" type="radio" name="star"/>
								<label class="star star-1" for="star-1-2"></label>
							</form>
						</div>
					</div>


							<div class="star-on">

								<div class="review">
									<a href="#"> 1 customer review </a>

								</div>
							<div class="clearfix"> </div>
							</div>

							<h5 class="item_price">$ 500.00</h5>
							<p><ul>
										<li>Sweet, delectable, crunchy chips</li>
										<li>Coated in brown sugar to preserve its freshness</li>
										<li>Best for breakfast or snacks</li>
									</ul></p>
											Product Packaging/ Specification
									<p><ul>
										<li>Shelf life: 6 months</li>
										<li>100 grams packaging with local label</li>
										<li>can be packed in big plastic without the label for bulk orders </li>
									</ul></p>

<br>
							<div class="available">
								<ul>
									<li>
										<select>
										<option>-</option>
										<option>-</option>
										<option>-</option>
										<option>-</option>
									</select></li>
								<li class="size-in">-<select>
									<option>-</option>
									<option>-</option>
									<option>-</option>
									<option>-</option>
									<option>-</option>
								</select></li>
								<div class="clearfix"> </div>
							</ul>
						</div>

								<a href="#" class="add-cart item_add">ADD TO CART</a>

						</div>
					</div>
				<div class="clearfix"> </div>
        <!-- comment -->
        <div class="comments-app" ng-app="commentsApp" ng-controller="CommentsController as cmntCtrl">
        <h1>Comment Section</h1>

        <!-- From -->
        <div class="comment-form">
        <!-- Comment Avatar -->

        <form class="form" name="form" ng-submit="form.$valid && cmntCtrl.addComment()" novalidate>
        <div class="form-row">
        <textarea
                class="input"
                ng-model="cmntCtrl.comment.text"
                placeholder="Add comment..."
                required></textarea>
        </div>

        <div class="form-row">
        <input
             class="input"
             ng-class="{ disabled: cmntCtrl.comment.anonymous }"
             ng-disabled="cmntCtrl.comment.anonymous"
             ng-model="cmntCtrl.comment.author"
             ng-required="!cmntCtrl.comment.anonymous"
             placeholder="Email"
             type="email">
        </div>

        <div class="form-row text-right">
        <input
             id="comment-anonymous"
             ng-change="cmntCtrl.anonymousChanged()"
             ng-model="cmntCtrl.comment.anonymous"
             type="checkbox">
        <label for="comment-anonymous">Anonymous</label>
        </div>

        <div class="form-row">
        <input type="submit" value="Add Comment">
        </div>
        </form>
        </div>

        <!-- Comments List -->
        <div class="comments">
        <!-- Comment -->
        <div class="comment" ng-repeat="comment in cmntCtrl.comments | orderBy: '-date'">
        <!-- Comment Avatar -->
        <div class="comment-avatar">

        </div>

        <!-- Comment Box -->
        <div class="comment-box">
        <div class="comment-text">{{ comment.text }}</div>
        <div class="comment-footer">
        <div class="comment-info">
          <span class="comment-author">
            <em ng-if="comment.anonymous">Anonymous</em>
            <a ng-if="!comment.anonymous" href="{{ comment.author }}">{{ comment.author }}</a>
          </span>
          <span class="comment-date">{{ comment.date | date: 'medium' }}</span>
        </div>

        <div class="comment-actions">
          <a href="#">Reply</a>
        </div>
        </div>
        </div>
        </div>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-46156385-1', 'cssscript.com');
          ga('send', 'pageview');

        </script>


        <!-- end comment-->
				</div>


        <!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
$('.flexslider').flexslider({
animation: "slide",
controlNav: "thumbnails"
});
});
</script>


			</div>
		</div>




	</div>
</div>
			<!---->


<!--//content-->
<?php include 'footer.php'; ?>
</body>
</html>