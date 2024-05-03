<?php

use App\Router;

require __DIR__.'/../vendor/autoload.php';

//echo '<pre>';
//var_dump($_SERVER);
//echo '<hr/>';

const STORAGE_PATH = __DIR__.'/../storage';
const VIEW_PATH    = __DIR__.'/../views';

try {
    $router = new Router();

    $router
            ->get('/', [\App\Controllers\HomeController::class, 'index'])
            ->post('/upload', [\App\Controllers\HomeController::class, 'upload'])
            ->get('/invoices', [\App\Controllers\InvoiceController::class, 'index'])
            ->get('/invoices/create', [\App\Controllers\InvoiceController::class, 'create'])
            ->post('/invoices/create', [\App\Controllers\InvoiceController::class, 'store']);

    echo $router->resolve(
            $_SERVER['REQUEST_URI'],
            $_SERVER['REQUEST_METHOD']
    );
} catch (\App\Exceptions\RouteNotFoundException $e) {
//    header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo \App\View::make('error/404');
}





