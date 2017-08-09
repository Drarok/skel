<?php

namespace Skel\Controller;

use Silex\Application;

class HomeController
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('home/index.html.twig');
    }
}
