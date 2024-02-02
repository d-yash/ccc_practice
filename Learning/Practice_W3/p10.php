<?php
class Product
{
    private $_pid;
    private $_name;
    private $_price;

    function __construct($pid, $name, $price)
    {
        $this->_pid = $pid;
        $this->_name = $name;
        $this->_price = $price;
    }
    function getPrice()
    {
        return $this->_price;
    }
    function getName(){
        return $this->_name;
    }
}
class Cart
{
    private $_items = [];
    function addItem(Product $p)
    {
        $this->_items[] = $p;
    }
    function calcTotal()
    {
        $total = 0;
        foreach ($this->_items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function displayItems()
    {
        echo "Shopping Cart Items ... <br>";
        foreach ($this->_items as $item) {
            echo "{$item->getName()} - {$item->getPrice()} INR<br>";
        }
    }
}
$p1 = new Product(1, "Laptop", 800);
$p2 = new Product(2, "Smartphone", 400);

$cart = new Cart();

$cart->addItem($p1);
$cart->addItem($p2);

$cart->displayItems();
echo "Total Price: " . $cart->calcTotal() . " INR";
?>

