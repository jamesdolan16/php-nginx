<?php
require __DIR__ . '/../../vendor/autoload.php';

use Bramus\Router\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Initialize Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../var/cache/twig',
    'debug' => true,
]);

// Initialize Router
$router = new Router();

$router->get('/', function() use ($twig) {
    echo $twig->render('home.twig', [
        'date' => date('d/m/Y'),
        'time' => date('H:i'),
    ]);
});

$router->get('/about', function() use ($twig) {
    echo $twig->render('about.twig');
});

$router->get('/greet/(\w+)', function($name) use ($twig) {
    echo $twig->render('greet.twig', ['name' => ucfirst($name)]);
});

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo '404 - Page not found';
});

$router->run();