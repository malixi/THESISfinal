<?php
include_once("configuration.php");
session_start();
unset($_SESSION['cart_products']);
 header('Location: view_cart.php');
?>
