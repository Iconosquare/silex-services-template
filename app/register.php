<?php

use Symfony\Component\HttpFoundation\Request;
use Silex\Provider;

Request::setTrustedProxies(array("77.87.108.221", "77.87.108.222"));

// Session

// PDO - MySQL
$app->register(
    new Iconosquare\Provider\PdoServiceProvider(),
    array(
        'pdo.dsn' => $app['mysql_dsn'],
        'pdo.username' => $app['mysql_user'],
        'pdo.password' => $app['mysql_password'],
        'pdo.options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    )
);

// Cache
$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir'  => $app['dir']['cache'] . DIRECTORY_SEPARATOR . 'http',
    'http_cache.options'    => array(
        'allow_reload'      => true,
        'allow_revalidate'  => true
)));

//$app['cache.defaults'] = array(
//    'Cache-Control' => sprintf(
//        'public, max-age=%d, s-maxage=%d, must-revalidate, proxy-revalidate',
//        $app['cache.max_age'],
//        $app['cache.max_age']
//    ),
//    'Expires' => date('r', time() + $app['cache.expires'])
//);

// Memcache
$app->register(new Memcache\Silex\MemcacheServiceProvider(), array(
    'memcache.servers' => $app['memcache_servers'],
));

// L'url-generator pour les routes: ->bind("route_name")
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Mobile detect
$app->register(new Binfo\Silex\MobileDetectServiceProvider());

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/Resources/views',
    'twig.options' => array(
        'debug' => $app['debug'],
        'charset'           => 'utf-8',
        'auto_reload'       => true,
        'strict_variables'  => true,
        'cache'             => $app['dir']['cache'] . DIRECTORY_SEPARATOR . 'twig'),
    'twig.globals' => array(
        'iconosquareUrl' => $app['iconosquare_url']
    )
));

// Web profiler
$app->register(new Provider\ServiceControllerServiceProvider());
if ($app['debug'] && $app['profiler']) {
    $webProfilerPath = dirname(__DIR__) .
        '/vendor/symfony/web-profiler-bundle/Symfony/Bundle/WebProfilerBundle/Resources/views';
    $app['twig.loader.filesystem']->addPath($webProfilerPath, 'WebProfiler');

    $app->register(new Provider\WebProfilerServiceProvider(), array(
        'profiler.cache_dir' => $app['dir']['cache'] . '/profiler',
        'profiler.mount_prefix' => '/_profiler',
    ));
    $app['profiler']->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector($app['dispatcher']));
}
