<?php 
interface ShoppingCartObserver {
    function itemAdded(int $id);
}
class ShoppingCart {
    private $observers = array();
    public function attach(ShoppingCartObserver $observer) {
        $this->observers[] = $observer;
    }

    public function addItem(int $id) {
       
        $this->notify($id);
    }
    private function notify(int $id) {
        foreach ($this->observers as $observer) {
            $observer->itemAdded($id);
        }
    }
}

class ShoppingCartLog implements ShoppingCartObserver {
    public function itemAdded(int $id) {
        echo "Logged item $id\n";
    }
}

$cart = new ShoppingCart();
$logger = new ShoppingCartLog();

$cart->attach($logger);

$cart->addItem(2);
$cart->addItem(23);
$cart->addItem(123);