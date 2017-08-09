<?php

use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;

use Skel\Controller\HomeController;
use Zerifas\Supermodel\AbstractModel;

define('APP_ROOT', realpath(__DIR__ . '/../'));
require APP_ROOT . '/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'local.dev') !== false);

$app->register(new SessionServiceProvider());

$app->register(new TwigServiceProvider(), [
    'twig.path' => APP_ROOT . '/templates',
]);

$app['db'] = function ($app) {
    $config = json_decode(file_get_contents(APP_ROOT . '/config/db.json'), true);
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $config['host'], $config['dbname']);
    return new PDO($dsn, $config['username'], $config['password'], AbstractModel::getPDOOptions());
};

$app['controllers']->before(function (Request $request) use ($app) {
    /* @var Twig_Environment $twig */
    $twig = $app['twig'];
    $twig->addGlobal('current_path', $request->getPathInfo());
});

$app->get('/', HomeController::class . '::indexAction');

$app->run();
