<?php
require __DIR__ . '/../../vendor/autoload.php';

use Bramus\Router\Router;
use Pimple\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controllers\HomeController;

$container = new Container();

// Define twig service
$container['twig'] = function () {
    $loader = new FilesystemLoader(__DIR__ . '/../templates');
    return new Environment($loader, [
        'cache' => __DIR__ . '/../var/cache/twig',
        'debug' => true,
    ]);
};

// Define HomeController service
$container['HomeController'] = function($c) {
    return new HomeController($c['twig']);
};

// Initialize Router
$router = new Router();

$router->get('/', [$container['HomeController'], 'index']);
$router->get('/about', [$container['HomeController'], 'about']);
$router->get('/greet/(\w+)', function($name) use ($container) {
    return $container['HomeController']->greet($name);
});

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo '404 - Page not found';
});

$router->run();