<?php
include 'src\AbstractCart.php';
include 'src\AbstractCartItem.php';
include 'src\Cart.php';
include 'src\CartItem.php';
use Thomas\SimpleCart\Cart;

$cart = new Cart();
$cart->add($_GET['id'], $_GET['name'], $_GET['quantity'], $_GET['price']);

header("Location: index.php");
exit();