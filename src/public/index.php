<?php

require __DIR__.'/../vendor/autoload.php';
$date = '15/05/2020 3:30PM';

$dateTime = DateTime::createFromFormat('d/m/Y g:iA', $date);

echo '<pre>';
var_dump($dateTime);
echo '<pre/>';

$dateTime = new DateTime('', new DateTimeZone('Europe/Kyiv'));
$dateTime->setDate(2020, 4, 21)->setTime(2, 15);

echo '<pre>';
var_dump($dateTime->format('m/d/Y g:i A'));
echo '<pre/>';

echo '<hr/>';

$dateTime1 = new DateTime('05/25/2020 3:30PM');
$dateTime2 = new DateTime('03/15/2020 3:30PM');
var_dump($dateTime1 < $dateTime2);
var_dump($dateTime1 > $dateTime2);
var_dump($dateTime1 == $dateTime2);
var_dump($dateTime1 <=> $dateTime2);
echo '<hr/>';
var_dump($dateTime1->diff($dateTime2));
echo '<hr/>';

$period = new DatePeriod(new DateTime('05/01/2020'), new DateInterval('P1D'), new DateTime('05/31/2020'));

foreach ($period as $date) {
    echo $date->format('m/d/Y');
    echo '<br/>';
}



