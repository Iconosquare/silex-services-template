<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Variables de config
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/register.php';
require_once __DIR__ . '/models.php';
require_once __DIR__ . '/middlewares.php';

$app->mount("/", new Iconosquare\Controller\IndexControllerProvider());

return $app;
