<?php
namespace Thomas\SimpleCart;

abstract class AbstractCartItem {
    
    /**
     * The ID of the item
     * 
     * @var int
     */
    public $id;
    
    /**
     * The name of the item
     * 
     * @var string
     */
    public $name;
    
    /**
     * The quantity for the item
     * 
     * @var int
     */
    public $quantity;
    
    /**
     * The price of the item
     * 
     * @var float
     */
    public $price;
    
    /**
     * Get the price of the item
     * 
     * @param int $decimals
     * @return float
     */
    abstract public function getPrice($decimals = 2);
    
    /**
     * Get the total price of the item
     */
    abstract public function getTotal($decimals = 2);
}