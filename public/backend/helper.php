<?php
session_start();
// session_destroy();
// die();
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['order']) && isset($_GET['quant'])) {
	
	$pid = $_GET['order'];
	$cafe_id = $_SESSION['cafe_id'];
	$quant = $_GET['quant'];
    $item = $_GET['item'];
    $photo = $_GET['photo'];
    $price = $_GET['price'];
    $x = array("productId"=>$pid,"quantity"=>$quant, "cafe_id"=>$cafe_id,"item"=>$item,"photo"=>$photo,"price"=>$price);
	
	array_push($_SESSION['cart'], $x);
}
if (isset($_SESSION['cart'])) {
	print_r($_SESSION['cart']);
	echo "<br>";
	echo sizeof($_SESSION['cart']);
}
?>