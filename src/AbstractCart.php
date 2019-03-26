<?php
namespace Thomas\SimpleCart;

abstract class AbstractCart {
    
    /**
     * Item container
     * 
     * @var AbstractCartItem[]
     */
    protected $items = [];
    
    /**
     * Add an item to the cart
     * 
     * @param int $productId
     * @param string $productName
     * @param int $quantity
     * @param float $price
     * @return bool
     */
    abstract public function add($productId, $productName = null, $quantity = 0, $price = 0);
    
    /**
     * Remove the item with the given productId from the cart
     * 
     * @param int $productId
     * @return bool
     */
    abstract public function remove($productId, $quantity = 1);
    
    /**
     * Get all items in the cart
     * 
     * @return AbstractCartItem[]
     */
    abstract public function getAll();
    
    /**
     * Get total of the items in the cart
     * 
     * @return int
     */
    abstract public function getTotal($decimals = 2);
    
    /**
     * Store the cart
     * 
     * @return bool
     */
    abstract protected function store();
    
    /**
     * Restore the cart
     * 
     * @return bool
     */
    abstract protected function restore();
}