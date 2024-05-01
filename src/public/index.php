<?php

use App\Router;

require __DIR__.'/../vendor/autoload.php';

//echo '<pre>';
//var_dump($_SERVER);
//echo '<hr/>';

$router = new Router();

$router
        ->get('/', [\App\Classes\Home::class, 'index'])
        ->get('/invoices', [\App\Classes\Invoice::class, 'index'])
        ->get('/invoices/create', [\App\Classes\Invoice::class, 'create'])
        ->post('/invoices/create', [\App\Classes\Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

