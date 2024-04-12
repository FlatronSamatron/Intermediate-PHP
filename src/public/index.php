<?php

require_once '../Transaction.php';
require_once '../Customer.php';
require_once '../PaymentProfile.php';

$transaction = new Transaction(120, 'Transaction 1');

//$transaction->customer = new Customer();
//
//echo $transaction->customer?->paymentProfile?->id ?? 'foo'; //Nullsafe Operator

echo $transaction->getCustomer()?->getPaymentProfile()?->id ?? 'foo'; //Nullsafe Operator

