<?php session_start();?>
<html>
<head>
  <?php include_once("analyticstracking.php") ?>
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"/>

<script src="js/toastrInit.js"> </script>

</script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="style/style.css" rel="stylesheet" type="text/css" media="all" /">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
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


<style>

.testing1 {
  position: absolute;
    left: 0px;
    top: 0px;
    z-index: 4;
}


</style>



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



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images\banner1.jpg" alt="New York" width="100%">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="images\banner2.jpg" alt="Chicago" width="100%">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
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
</div></div></div>

<!--content-->


<div class="container">
    <div class="row text-center">



				<br><br><h3 class="text-center">NEW PRODUCTS</h1>
        </font></h3>
</div></div></div>
		<?php

include_once("configuration.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>




<!-- View Cart Box Start -->
<div class="container testing1">
</div>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT productID, product_code, name, description, image, price FROM products ORDER BY productID LIMIT 4");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
if($obj->image == NULL){

$products_item .= <<<EOT
  <li class="product">
  <form method="post" action="cart_update.php">
  <div class="hover11 well">

  <div class="product-thumb"><figure> <a href="viewproducts.php?pname={$obj->productID}" class=""><img src="admin/productimage/logo.png" width="150px" height="150px"></a></figure></div>
  <div class="product-content"><h3>{$obj->name}</h3>
  <div class="product-info">
  Price {$currency}{$obj->price}


  <fieldset>



  <label>
    <span>Quantity</span>
    <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
  </label>

  </fieldset>
  <input type="hidden" name="product_code" value="{$obj->product_code}"  />
  <input type="hidden" name="type" value="add" />
  <input type="hidden" name="return_url" value="{$current_url}" />
  <div align="center"><button type="submit" class="add_to_cart">Add</button></div>

  </div></div>
  </form>
  </li>
EOT;
}
else{

$products_item .= <<<EOT
  <li class="product">
  <form method="post" action="cart_update.php">
  <div class="hover11 well">

  <div class="product-thumb"><figure> <a href="viewproducts.php?pname={$obj->productID}" class=""><img src="admin/productimage/{$obj->image}" width="150px" height="150px"></a></figure></div>
  <div class="product-content"><h3>{$obj->name}</h3>
  <div class="product-info">
  Price {$currency}{$obj->price}


  <fieldset>



  <label>
    <span>Quantity</span>
    <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
  </label>

  </fieldset>
  <input type="hidden" name="product_code" value="{$obj->product_code}"  />
  <input type="hidden" name="type" value="add" />
  <input type="hidden" name="return_url" value="{$current_url}" />
  <div align="center"><button type="submit" class="add_to_cart">Add</button></div>

  </div></div>
  </form>
  </li>
EOT;
}
}
$products_item .= '</ul>';
echo $products_item;
}
?>
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
