<?php

use App\Router;

require __DIR__.'/../vendor/autoload.php';

//echo '<pre>';
//var_dump($_SERVER);
//echo '<hr/>';

$router = new Router();

$router
        ->register('/', [\App\Classes\Home::class, 'index'])
        ->register('/invoices', [\App\Classes\Invoice::class, 'index'])
        ->register('/invoices/create', [\App\Classes\Invoice::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
