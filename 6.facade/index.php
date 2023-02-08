<?php 
class Inventory {
    public function checkInventory(string $id) {
        echo "Cecking inventory for item : $id\n";
        return true;
    }
}
class PaymentGateway {
    public function pay(float $amount) 
    {
        echo "Paying for item with $amount\n";
        return true;
    }
}
class ShippingService {
    public function shipItem(string $id) 
    {
        echo "Shipping item: $id";
        return true;
    }
}

// This is our Facade : 
class Order { 
    private $inventory; 
    private $payments; 
    private $shipping;
    // easy way - > call them in constructor
    public function __construct()  
    {
        $this->inventory = new Inventory();
        $this->payments = new PaymentGateway();
        $this->shipping = new ShippingService();
    }
    public function placeOrder(string $id, float $amount) {
        if($this->inventory->checkInventory($id) && $this->payments->pay($amount))
        {
            $this->shipping->shipItem($id);
        }       
    }
}
$order = new Order();
$order->placeOrder('1233', 36.4);
