<?php

use App\{InvoiceCollection, Invoice};

require __DIR__.'/../vendor/autoload.php';

foreach (new Invoice(25) as $key => $value) {
    echo $key.' = '.$value.'<br/>';
}

echo '<hr/>';

$invoiceCollection = new InvoiceCollection([new Invoice(15), new Invoice(25), new Invoice(50)]);

foreach ($invoiceCollection as $invoice) {
//    echo '<pre>';
//    var_dump($invoice);
//    echo '<hr/>';
    echo $invoice->id.' - '.$invoice->amount.'<hr/>';
}
