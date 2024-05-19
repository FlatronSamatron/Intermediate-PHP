<?php

use App\{App, Container, Config, Router, Controllers};

require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const STORAGE_PATH = __DIR__.'/../storage';
const VIEW_PATH    = __DIR__.'/../views';

$container = new Container();

$router = new Router($container);

$router
        ->get('/', [Controllers\HomeController::class, 'index'])
        ->post('/upload', [Controllers\HomeController::class, 'upload'])
        ->get('/invoices', [Controllers\InvoiceController::class, 'index'])
        ->get('/invoices/create', [Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [Controllers\InvoiceController::class, 'store'])
        ->get('/examples/generator', [Controllers\GeneratorExampleController::class, 'index']);

echo '<ul>';
foreach ($router->paths() as $path) {
    echo "<li><a href={$path}>$path</a></li>";
}
echo '</ul>';

(new App(
        $router,
        ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
        new Config($_ENV),
        $container
))->run();









