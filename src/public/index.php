<?php

use App\PaymentGateway\Stripe\Transaction;
use App\DB;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction(25,'Transaction1');
$transaction = new Transaction(25,'Transaction2');
$transaction = new Transaction(25,'Transaction3');
$transaction = new Transaction(25,'Transaction4');

var_dump(Transaction::getCount());
echo '<hr/>';

//singleton
$db = DB::getInstance(['ha' => 'haha']);
$db = DB::getInstance(['ha' => 'haha']);
$db = DB::getInstance(['ha' => 'haha']);
$db = DB::getInstance(['ha' => 'haha']);
var_dump($db);

echo '<hr/>';
echo Transaction::class;

