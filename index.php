<?php
include 'src\AbstractCart.php';
include 'src\AbstractCartItem.php';
include 'src\Cart.php';
include 'src\CartItem.php';
use Thomas\SimpleCart\Cart;

// ######## please do not alter the following code ########
$products = [
    [ "name" => "Sledgehammer", "price" => 125.75 ],
    [ "name" => "Axe", "price" => 190.50 ],
    [ "name" => "Bandsaw", "price" => 562.131 ],
    [ "name" => "Chisel", "price" => 12.9 ],
    [ "name" => "Hacksaw", "price" => 18.45 ],
];
// ########################################################
?>
<h2>Product List:</h2>
<?php foreach ($products as $id => $product) {?>
<div>
    <span>Product Name:<?php echo $product['name']?></span>|
    <span>Price:<?php echo number_format($product['price'], 2)?></span>|
    <span><a href="add.php?id=<?=$id?>&name=<?=$product['name']?>&price=<?=$product['price']?>&quantity=1">add to cart</a></span>
</div>
<?php }?>

<h2>Cart Products:</h2>
<?php 
$cart = new Cart();
$items = $cart->getAll();

if (false == empty($items))
{
    foreach ($items as $item) {
?>
<div>
    <span>Product Name:<?php echo $item->name?></span>|
    <span>Price:<?php echo $item->getPrice()?></span>|
    <span>Quantity:<?php echo $item->quantity?></span>|
    <span>Total:<?php echo $item->getTotal()?></span>|
    <span><a href="remove.php?id=<?=$item->id?>&quantity=<?=$item->quantity?>">remove</a></span>
</div>
<?php
    }
} else {
?>
<div>Empty</div>
<?php }?>