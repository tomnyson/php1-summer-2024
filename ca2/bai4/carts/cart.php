<?php
class Cart
{
    public $items;
    public function __construct()
    {
        $this->items = array();
    }

    /**
     * array(
     *  '1' => array('id' => 1, 'name' => 'abc', 'price' => 12, 'quantity' => 1)
     * '1' => array('id' => 1, 'name' => 'abc', 'price' => 12, 'quantity' => 1)
     * )
     * array(
     * array(
     *  '1' => array('id' => 1, 'name' => 'abc', 'price' => 12, 'quantity' => 1)
     * )
     * array(
     *  '1' => array('id' => 1, 'name' => 'abc', 'price' => 12, 'quantity' => 1)
     * )
     * )
     * array(
     *  '1' => array('id' => 1, 'name' => 'abc', 'price' => 12, 'quantity' => 1)
     * )
     */
    public function add($product)
    {
        array_push($this->items, $product);
    }

    public function remove($productId)
    {
        foreach ($this->items as $product) {
            if ($product['id'] == $productId) {
                unset($product);
                return;
            }
        }
    }

    public function getTotal()
    {
        $sum = 0;
        foreach ($this->items as $product) {
            $sum += $product['price'] * $product['quantity'];
        }
        return $sum;
    }
}
