<?php

namespace Skel\Controller;

use Silex\Application;

use Skel\Service\FlashService;

class HomeController
{
    public function indexAction(Application $app)
    {
        /** @var FlashService $flash */
        $flash = $app['flash'];
        $flash->add(FlashService::TYPE_SUCCESS, 'Success message');
        $flash->add(FlashService::TYPE_INFO, 'Info message');

        return $app['twig']->render('home/index.html.twig');
    }
}
