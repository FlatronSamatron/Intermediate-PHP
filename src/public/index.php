<?php

require_once '../Transaction.php';

$amount1 = (new Transaction(110, 'Transaction 1'))
    ->addTax(10)
    ->applyDiscount(25)
    ->getAmount();

$amount2 = (new Transaction(200, 'Transaction 2'))
    ->addTax(10)
    ->applyDiscount(15)
    ->getAmount();

var_dump($amount1);
echo '<hr/>';
var_dump($amount2);
echo '<hr/>';

$str = '{"a": 1, "b": 1, "c": 1}';
$str_decode = json_decode($str); //object(stdClass)#1 (3) { ["a"]=> int(1) ["b"]=> int(1) ["c"]=> int(1) }
var_dump($str_decode);
var_dump($str_decode->a);

