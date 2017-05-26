<?php
include_once("configuration.php");
session_start();
if(isset($_SESSION['cart_products'])){
	echo"<script>location.href='view_cart.php?action=success';</script>";
} else {
	echo"<script>location.href='view_cart.php?action=error';</script>";
}
unset($_SESSION['cart_products']);
?>
