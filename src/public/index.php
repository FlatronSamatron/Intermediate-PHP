<?php

require __DIR__.'/../vendor/autoload.php';

use App\{Invoice, Customer};

$invoice = new Invoice(new Customer(['transaction1' => '50']));

try {
    $invoice->process(-25);
} catch (\App\Exception\MissingBillingInfoException $e) {
    echo $e->getMessage().' '.$e->getFile().' '.$e->getLine();
} catch (\InvalidArgumentException) {
    echo 'Invalid argument exception';
} finally {
    echo '<br/>';
    echo 'Finally block';
}

echo '<hr/>';

