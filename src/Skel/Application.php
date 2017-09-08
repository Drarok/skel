<?php

namespace Skel;

use Silex\Application as BaseApplication;

class Application extends BaseApplication
{
    use BaseApplication\TwigTrait;
    use BaseApplication\UrlGeneratorTrait;
}
