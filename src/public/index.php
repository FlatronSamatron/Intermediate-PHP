<?php

require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/Transaction.php';
require_once '../PaymentGateway/Paddle/CustomerProfile.php';

use PaymentGateway\Stripe\Transaction as StripeTransaction;
use PaymentGateway\Paddle\{Transaction as PaddleTransaction, CustomerProfile};

var_dump(new StripeTransaction());
echo '<hr/>';
var_dump(new PaddleTransaction());
echo '<hr/>';
var_dump(new CustomerProfile());

