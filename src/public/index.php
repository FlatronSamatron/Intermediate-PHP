<?php

use App\CustomInvoice;
use App\Invoice;

require __DIR__.'/../vendor/autoload.php';

$invoice1      = new Invoice(25, 'My Invoice');
$invoice2      = new Invoice(25, 'My Invoice');
$invoice3      = $invoice2;
$customInvoice = new CustomInvoice(25, 'My Invoice');

echo '$invoice1 == $invoice2 ';
var_dump($invoice1 == $invoice2);
echo '<hr/>';
echo '$invoice1 === $invoice2 ';
var_dump($invoice1 === $invoice2);
echo '<hr/>';
echo '$invoice2 === $invoice3 ';
var_dump($invoice2 === $invoice3);
echo '<hr/>';
echo '$invoice1 == $customInvoice ';
var_dump($customInvoice == $invoice1);
echo '<hr/>';
echo '$invoice1 === $customInvoice ';
var_dump($customInvoice === $invoice1);

