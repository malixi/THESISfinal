<?php

session_start();
require_once 'connector.php';
require_once 'configuration.php';


?>
<html>

<head>
    <title>Llanes Farm</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
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

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- start menu -->
    <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/memenu.js"></script>
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>
    <script src="js/simpleCart.min.js">
    </script>
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
    </div>
    <!-- grow -->
    <div class="grow">
        <div class="container">
            <h2>My Cart</h2>
        </div>
    </div>
    <!-- grow -->
    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                <script>
                    $(document).ready(function(c) {
                        $('.close1').on('click', function(c) {
                            $('.cart-header').fadeOut('slow', function(c) {
                                $('.cart-header').remove();
                            });
                        });
                    });
                </script>
                <!-- LOOP THIS -->
                <?php 
                  if(empty($_SESSION['cart_products'])){
                    echo "<h2>No Products In Cart.</h2>";
                  } else {
                  if(isset($_SESSION["cart_products"])){ //check session var
                    $total = 0; //set initial total value
                    $b = 0; //var for zebra stripe table
                    foreach ($_SESSION["cart_products"] as $cart_itm){
                      //set variables to use in content below
                      $product_image = $cart_itm["product_image"];
                      $product_name = $cart_itm["product_name"];
                      $product_qty = $cart_itm["product_qty"];
                      $product_price = $cart_itm["product_price"];
                      $product_code = $cart_itm["product_code"];
                      $subtotal = ($product_price * $product_qty);
                ?>
                <form method="post" action="cart_update.php">
                  <div class="cart-header">
                      <div>
                        <label class="close1"" for="delete"></label>
                        <input Onclick=\'return ConfirmDelete()\' type="submit" style="display:none; visibility:hidden;" class="btn btn-primary" id="delete" name="remove_code[]" value=<?php echo $product_code ?> />
                      </div>
                      <div class="cart-sec simpleCart_shelfItem">
                          <div class="cart-item cyc">
                              <img src=<?php echo "admin/productimage/".$product_image."" ?> class="img-responsive" alt="" />
                          </div>
                          <div class="cart-item-info">
                              <h3><a href="#"><?php echo $product_name; ?></a><span><?php echo $product_code; ?></span></h3>
                              <ul class="qty">
                                  <li>
                                      <p>Quantity: <input type="number" style="width:40px;" maxlength="2" name=<?php echo "product_qty[".$product_code."]" ?> value=<?php echo $product_qty ?> /></p>
                                  </li>
                                  <li>
                                      <p>Price: <?php echo $product_price ?></p>
                                  </li>
                              </ul>
                              <div class="delivery">
                                  <p>Service Charges : Rs.100.00</p>
                                  <span>Delivered in 2-3 business days</span>
                                  <div class="clearfix"></div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  </div>
                </form>
                <?php
                      $total = ($total + $subtotal);
                    }
                    $grand_total = $total + $shipping_cost; //grand total including shipping cost
                      foreach($taxes as $key => $value){ //list and calculate all taxes in array
                          $tax_amount     = round($total * ($value / 100));
                          $tax_item[$key] = $tax_amount;
                          $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
                      }
                    $list_tax = '';
                      foreach($tax_item as $key => $value){ //List all taxes
                        $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
                      }
                    $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
                  }
                }
                ?>
                <!-- LOOP END -->
                <script>
                    $(document).ready(function(c) {
                        $('.close2').on('click', function(c) {
                            $('.cart-header2').fadeOut('slow', function(c) {
                                $('.cart-header2').remove();
                            });
                        });
                    });
                </script>
            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="#">Continue to basket</a>
                <div class="price-details">
                    <h3>Price Details</h3>
                    <span>Total</span>
                    <span class="total1"><?php 
                      if(empty($grand_total)){
                        echo "---";
                      } else {
                        echo $grand_total;
                      }
                        ?></span>
                    <span>Discount</span>
                    <span class="total1">---</span>
                    <span>Delivery Charges</span>
                    <span class="total1">---</span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>TOTAL</h4></li>
                    <li class="last_price"><span><?php 
                      if(empty($grand_total)){
                        echo "---";
                      } else {
                        echo sprintf("%01.2f", $grand_total);
                      }
                        ?></span></li>
                    <div class="clearfix"> </div>
                </ul>


                <div class="clearfix"></div>
                <a class="order" href="#">Place Order</a>
                <div class="total-item">
                    <h3>OPTIONS</h3>
                    <h4>COUPONS</h4>
                    <a class="cpns" href="#">Apply Coupons</a>
                    <p><a href="#">Log In</a> to use accounts - linked coupons</p>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>


    <!--//content-->
    <div class="footer w3layouts">
        <div class="container">
            <div class="footer-top-at w3">

                <div class="col-md-3 amet-sed w3l">
                    <h4>MORE INFO</h4>
                    <ul class="nav-bottom">
                        <li><a href="faq.html">FAQS</a></li>
                        <li><a href="forwarders.html">Forwarder</a></li>
                        <li><a href="contact.html">Location</a></li>
                        <li><a href="services.html">Other Services</a></li>

                    </ul>
                </div>
                <div class="col-md-3 amet-sed w3ls">
                    <h4>PRODUCTS</h4>
                    <ul class="nav-bottom">
                        <li><a href="bananaproducts.html">Banana</a></li>
                        <li><a href="cocoaproducts.html">Cocoa</a></li>
                        <li><a href="coconutproducts.html">Coconut</a></li>
                        <li><a href="herbalproducts.html">Herbal</a></li>
                        <li><a href="mangoproducts.html">Mango</a></li>
                        <li><a href="pineappleproducts.html">Pineapple</a></li>
                    </ul>

                </div>

                <div class="col-md-3 amet-sed agileits-w3layouts">
                    <h4>CONTACT US</h4>
                    <p>Lorem Ipsum</p>
                    <p>Lorem Ipsum</p>
                    <p>Lorem Ipsum</p>
                    <div class="social">
                        <ul>
                            <li><a href="https://www.facebook.com/cocosport.drink" target="_blank"><i class="facebok"> </i></a></li>


                            <li><a href="https://www.instagram.com/llanesfarm/" target="_blank"><i class="goog"> </i></a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-class w3-agile">

    </div>
    </div>
</body>

</html>