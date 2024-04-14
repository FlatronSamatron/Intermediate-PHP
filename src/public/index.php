<?php

//require_once '../app/PaymentGateway/Stripe/Transaction.php';
//require_once '../app/PaymentGateway/Paddle/Transaction.php';
//require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
//require_once '../app/Notification/Email.php';

use App\PaymentGateway\Paddle\{CustomerProfile};
use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;
use App\PaymentGateway\Stripe\Transaction as StripeTransaction;
use App\Notification\Email;

//spl_autoload_register(function($class) {
//    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class). '.php');
//    if(file_exists($path)){
//        require $path;
//    }
//});

require __DIR__ . '/../vendor/autoload.php';

var_dump(new StripeTransaction());
echo '<hr/>';
var_dump(new PaddleTransaction());
echo '<hr/>';
var_dump(new CustomerProfile());
echo '<hr/>';
var_dump(new Email());
echo '<hr/>';

$id = new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4();

