<?php
require __DIR__ . '/../../vendor/autoload.php';

use Bramus\Router\Router;
use Pimple\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controllers\HomeController;
use App\Services\AuthService;

$container = new Container();
// Define services

$container['twig'] = function () {
    $loader = new FilesystemLoader(__DIR__ . '/../templates');
    return new Environment($loader, [
        'cache' => __DIR__ . '/../var/cache/twig',
        'debug' => true,
    ]);
};

$container['auth'] = fn($c) => new AuthService();

$container['HomeController'] = fn($c) => new HomeController($c['twig'], $c['auth']);

// Initialize Router
$router = new Router();

$router->get('/', [$container['HomeController'], 'index']);
$router->get('/about', [$container['HomeController'], 'about']);
$router->get('/greet/(\w+)', function($name) use ($container) {
    $container['HomeController']->greet($name);
});

$router->set404(function() use ($container) {
    header('HTTP/1.1 404 Not Found');
    echo $container['twig']->render('404.html.twig');
});

$router->run();

function resolve(string $class, Container $c) {
    $refClass = new ReflectionClass($class);
    $constructor = $refClass->getConstructor();

    if (!$constructor) {
        return new $class();
    }

    $deps = [];
    foreach ($constructor->getParameters() as $param) {
        $type = $param->getType();

        if ($type && !$type->isBuiltin()) {
            $fqcn = $type->getName();

            // Look for service in container by FQCN or alias
            foreach ($c->keys() as $key) {
                if ($c[$key] instanceof $fqcn) {
                    $deps[] = $c[$key];
                    continue 2;
                }
            }

            throw new RuntimeException("No service found for dependency $fqcn");
        }

        // Optional: handle scalars or defaults
        $deps[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
    }

    return $refClass->newInstanceArgs($deps);
}