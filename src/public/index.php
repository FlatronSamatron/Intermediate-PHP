<?php

use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

use App\Invoice;

$invoice = new Invoice();
var_dump($invoice);

//$invoice(); //__invoke
//echo $invoice //__toString;

//$invoice->process(15, 'some description'); //__call
//echo '<hr/>';
//App\Invoice::process(1, 2, 3);
//$invoice->ammount = 50;
//
//var_dump(isset($invoice->ammount));
//unset($invoice->ammount);
//var_dump(isset($invoice->ammount));

echo '<hr/>';
echo Transaction::class;

