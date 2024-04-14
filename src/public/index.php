<?php

//require_once '../app/PaymentGateway/Stripe/Transaction.php';
//require_once '../app/PaymentGateway/Paddle/Transaction.php';
//require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
//require_once '../app/Notification/Email.php';

use App\Enums\Status;
use App\PaymentGateway\Stripe\Transaction;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction();
$transaction->setStatus(Status::PAID);
var_dump($transaction->getStatus());

//echo $transaction::STATUS_PAID;
//echo '<hr/>';
//echo $transaction::STATUS_DECLINED;
//echo '<hr/>';
//echo $transaction::STATUS_PENDING;
echo '<hr/>';
echo Transaction::class;

