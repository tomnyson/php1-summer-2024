<?php
session_start();



class Cart
{
    public $items;
    function __construct()
    {
        if (!isset($_SESSION['carts'])) {
            $this->items = array();
            $_SESSION['carts'] = [];
        } else {
            // $_SESSION['carts'] = [];
            $this->items = $_SESSION['carts'];
        }
    }

    function add($product)
    {
        $productId = $product['id'];
        if (!isset($this->items[$productId])) {
            $this->items[$productId] = $product;
            $this->items[$productId]['quantity'] = 1;
        } else {
            $this->items[$productId]['quantity']++;
        }
        $this->setCart();
    }
    function setCart()
    {
        $_SESSION['carts'] = $this->items;
    }

    function remove($productId)
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
        $this->setCart();
    }
    function getCart()
    {
        return $this->items;
    }
    public function getTotal()
    {
        $sum = 0;
        foreach ($this->items as $product) {
            $sum += $product['quantity'] * $product['price'];
        }
        return $sum;
    }
}
