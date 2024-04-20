<?php

use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

use App\{CoffeeMaker, CappuccinoMaker, LatteMaker, AllInOneCoffeeMaker};

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();
echo '<hr/>';

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
echo '<br/>';
$latteMaker->makeLatte();
echo '<hr/>';

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
echo '<br/>';
$cappuccinoMaker->makeCappuccino();
echo '<hr/>';

$allInOneCoffeeMaker = new AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
echo '<br/>';
$allInOneCoffeeMaker->makeCappuccino();
echo '<br/>';
$allInOneCoffeeMaker->makeLatte();
echo '<hr/>';

echo '<hr/>';
echo Transaction::class;

