<?php

use Symfony\Component\HttpFoundation\Request;
use Silex\Provider;

Request::setTrustedProxies(array("77.87.108.221", "77.87.108.222"));

// Cache
$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir'  => $app['dir']['cache'] . DIRECTORY_SEPARATOR . 'http',
    'http_cache.options'    => array(
        'allow_reload'      => true,
        'allow_revalidate'  => true
)));

// Memcache
$app->register(new Memcache\Silex\MemcacheServiceProvider(), array(
    'memcache.servers' => $app['memcache_servers'],
));

// Redis
$app->register(new Redis\Silex\RedisServiceProvider());

// L'url-generator pour les routes: ->bind("route_name")
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

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
