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
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <?php include 'header.php';    ?>
    <?php
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
        foreach ($_SESSION["cart_products"] as $cart_itm){
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
  <?php
          $pNAME = $_GET['pname'];
          $results = mysqli_query ($con,"SELECT * FROM products WHERE productID = '". $pNAME . "' LIMIT 1");

          while($row = mysqli_fetch_array($results)){
            $_SESSION["test1"] = $pNAME;
              echo

      '<div class="grow">
        <div class="container">
          <h2>'  .$row['name']. '</h2>
        </div>
      </div>
      <!-- grow -->';
      ?>


          <div class="container">
            <div class="row">
              <div class="span4">
                <a <?php echo 'href="admin/productimage/'.$row['image'].'"' ?> class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" <?php if($row['image'] == "Submit"){ echo 'src="admin/productimage/logo.png"'; } else { echo 'src="admin/productimage/'.$row['image'].'"'; }?>></a>
              </div>
              <div class="span5">
                <address>
                  <strong>Brand:</strong> <span><?php echo $row['name']; ?></span><br>
                  <strong>Product Code:</strong> <span><?php echo $row['productID']; ?></span><br>
                  <strong>Availability:</strong> <span><?php echo $row['quantity']; ?></span><br>                
                </address>                  
                <h4><strong>Price: <?php echo $row['price']; ?></strong></h4>
              </div>
              <div class="span5">
                <form class="form-inline" action="cart_update.php">
                  <p>&nbsp;</p>
                  <fieldset>
                    <label>Quantity:</label>
                    <input type="number" class="span1" maxlength="2" name="product_qty" value="1" />
                  </fieldset>
                  <input type="hidden" name="product_code" value=<?php echo $row['product_code']; ?> />
                  <input type="hidden" name="type" value="add" />
                  <input type="hidden" name="return_url" value=<?php echo $current_url; ?> />
                  <button class="btn btn-inverse" class="add_to_cart" type="submit">Add to cart</button>
                </form>
                <br>
                <br>
                <br>
              </div>              
            </div>
            <div class="row">
              <div class="span9">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#home">Description</a></li>
                </ul>              
                <div class="tab-content">
                  <div class="tab-pane active" id="home"><?php echo $row['description']; ?></div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>              
              </div>
            </div>
          </div>
          <?php } ?>
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
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');
</script>

<script src="themes/js/common.js"></script>
    <script>
      $(function () {
        $('#myTab a:first').tab('show');
        $('#myTab a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
      })
      $(document).ready(function() {
        $('.thumbnail').fancybox({
          openEffect  : 'none',
          closeEffect : 'none'
        });
        
        $('#myCarousel-2').carousel({
                    interval: 2500
                });               
      });
    </script>

<!--//content-->
<?php include 'footer.php'; ?>
</body>
</html>
