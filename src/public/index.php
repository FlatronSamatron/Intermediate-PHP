<?php

use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

use App\{ClassA, ClassB};

$classA = new ClassA();
$classB = new ClassB();

//var_dump($classA->getName());
//echo '<hr/>';
//var_dump($classB->getName());

var_dump(ClassA::getName());
echo '<hr/>';
var_dump(ClassB::getName());
echo '<hr/>';
var_dump(ClassA::make());
echo '<hr/>';
var_dump(ClassB::make());
echo '<hr/>';
echo Transaction::class;

