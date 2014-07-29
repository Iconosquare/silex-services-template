<?php

namespace Iconosquare\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexControllerProvider implements ControllerProviderInterface
{
    /**
     * @param Application $app An Application instance
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->match('/', array($this, 'index'));

        return $controllers;
    }

    public function index(Application $app)
    {
        var_dump($app['memcache']);
        return $app['twig']->render('index.twig');
    }
}
