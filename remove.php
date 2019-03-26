<?php
include 'src\AbstractCart.php';
include 'src\AbstractCartItem.php';
include 'src\Cart.php';
include 'src\CartItem.php';
use Thomas\SimpleCart\Cart;

$cart = new Cart();
$cart->remove($_GET['id'], $_GET['quantity']);

header("Location: index.php");
exit();