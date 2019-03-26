<?php
namespace Thomas\SimpleCart;

class CartItem extends AbstractCartItem {
    
    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCartItem::getPrice()
     */
    public function getPrice($decimals = 2) {
        return number_format($this->price, $decimals);
    }
    
    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCartItem::getTotal()
     */
    public function getTotal($decimals = 2) {
        return number_format($this->quantity * $this->getPrice($decimals), $decimals);
    }
}