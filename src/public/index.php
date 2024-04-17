<?php

use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

$service = new \App\DebtCollectionService();
$service->collectionDebt(new \App\CollectionAgency());
echo '<hr/>';
$service->collectionDebt(new \App\Rocky());

echo '<hr/>';
echo Transaction::class;

