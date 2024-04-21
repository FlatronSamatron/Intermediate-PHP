<?php

require __DIR__.'/../vendor/autoload.php';

$invoice = new \App\Invoice(5, 'Invoice 1', '123456789');
$str     = serialize($invoice);
echo '<pre>';
var_dump($str);
echo '<pre/>';

echo '<pre>';
var_dump(unserialize($str));
echo '<pre/>';
//echo serialize($invoice);
//echo '<hr/>';
//echo serialize(true);
//echo '<hr/>';
//echo serialize(1);
//echo '<hr/>';
//echo serialize(1.5);
//echo '<hr/>';
//echo serialize('hello');
//echo '<hr/>';
//echo serialize([]);

echo '<hr/>';

