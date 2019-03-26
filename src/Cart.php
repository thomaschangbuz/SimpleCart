<?php
namespace Thomas\SimpleCart;

class Cart extends AbstractCart {
    
    /**
     * The identity of current cart
     */
    private $identity = 'DEFAULT';
    
    public function __construct($identity = null) {
        if ($identity) {
            $this->identity = $identity;
        }
        $this->restore();
    }
    
    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCart::add()
     */
    public function add($productId, $productName = null, $quantity = 0, $price = 0) {
        if (isset($this->items[$productId])) {
            $this->items[$productId]->quantity += $quantity;
        } else {
            $this->items[$productId] = $this->createItem($productId, $productName, $quantity, $price);
        }
        
        $this->store();
        
        return true;
    }

    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCart::getAll()
     */
    public function getAll() {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCart::getTotal()
     */
    public function getTotal($decimals = 2) {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity * $item->getPrice($decimals);
        }
        return $total;
    }

    /**
     * {@inheritdoc}
     * @see \Thomas\SimpleCart\AbstractCart::remove()
     */
    public function remove($productId, $quantity = 1) {
        if (empty($this->items[$productId])) {
            return false;
        }
        
        if ($this->items[$productId]->quantity > $quantity) {
            $this->items[$productId]->quantity -= $quantity;
        } else {
            unset($this->items[$productId]);
        }
        
        $this->store();
        
        return true;
    }

    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCart::restore()
     */
    protected function restore() {
        if (empty($_COOKIE[$this->identity])) {
            return false;
        }
        
        $this->items = unserialize($_COOKIE[$this->identity]);
        
        return true;
    }
    
    /**
     * {@inheritDoc}
     * @see \Thomas\SimpleCart\AbstractCart::store()
     */
    protected function store() {
        setcookie($this->identity, serialize($this->items));
        return true;
    }
    
    /**
     * Create an new item
     * 
     * @param int $productId
     * @param string $productName
     * @param int $quantity
     * @param float $price
     * @return AbstractCartItem
     */
    private function createItem($productId, $productName = null, $quantity = 0, $price = 0)
    {
        $item = new CartItem();
        $item->id = $productId;
        $item->name = $productName;
        $item->quantity = $quantity;
        $item->price = $price;
        return $item;
    }
}