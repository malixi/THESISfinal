<?php
    session_start();
    require_once('connector.php');

    if(isset($_SESSION["cart_products"])){
    foreach ($_SESSION["cart_products"] as $cart_itm){
        //set variables to use in content below
        $product_name = $cart_itm["product_name"];
        $product_qty = $cart_itm["product_qty"];
        $product_price = $cart_itm["product_price"];
        $product_code = $cart_itm["product_code"];
        $results = mysqli_query ($dbconn,'SELECT * FROM products WHERE product_code = '.$product_code.'');
        if($results->num_rows > 0) {
            while($row = mysqli_fetch_array($results)){
                    mysqli_query($dbconn, 'UPDATE products SET quantity = quantity - '.$product_qty.' WHERE product_code = '.$product_code.'');
                    echo"<script>location.href='success.php';</script>";
                }
            }
        }
    }

    include_once("configuration.php");
    session_start();
    if(isset($_SESSION['cart_products'])){
        echo"<script>location.href='view_cart.php?action=success';</script>";
    } else {
        echo"<script>location.href='view_cart.php?action=error';</script>";
    }
    unset($_SESSION['cart_products']);
?>