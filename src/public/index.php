<?php

use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

use App\{Toaster, ToasterPro};

$toaster = new Toaster();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->toast();
echo '<hr/>';

$toasterPro = new ToasterPro();
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->toast();
$toasterPro->toastBagel();

echo '<hr/>';
echo Transaction::class;

