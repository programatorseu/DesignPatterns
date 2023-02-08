    <?php 
    interface PaymentAdapter {
        function pay($amount);
    }
    class Paypal {
        public function makePayment($amount) {
            echo "Paypal: $amount";
        }
    } 
    class Stripe {
        public function sendFunds($amount) {
            echo "Stripe : $amount";
        }
    }
    class StorePaymentAdapter implements PaymentAdapter {
        private $payMethod;
        public function __construct(mixed $method) {
            $this->payMethod = $method;
        }
        public function pay($amount) {
            $mode = get_class($this->payMethod);
            if($mode == 'Paypal') {
                $this->payMethod->makePayment($amount);
            } else if ($mode == 'Stripe') {
                $this->payMethod->sendFunds($amount);
            }
        }
    }
    $gateway = new StorePaymentAdapter(new Paypal());
    $gateway->pay(100);

    $gateway2 = new StorePaymentAdapter(new Stripe());
    $gateway2->pay(200);
