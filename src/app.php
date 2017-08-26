<?php

use Skel\Controller\HomeController;

$app->match('/', HomeController::class . '::indexAction')
    ->method('GET')
    ->bind('home');
