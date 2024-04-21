<?php

require __DIR__.'/../vendor/autoload.php';

$invoice  = new \App\Invoice();
$invoice2 = new $invoice();
$invoice3 = clone $invoice2;

echo '<pre>';
var_dump($invoice, $invoice2, $invoice3, \App\Invoice::create(), $invoice3 === $invoice2);
echo '<pre/>';

echo '<hr/>';

