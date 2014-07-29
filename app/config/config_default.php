<?php

$app['debug'] = false;
$app['profiler'] = false;
$app['iconosquare_url'] = 'http://iconosqua.re/';

// Directories
$app['dir'] = array(
    'config' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config',
    'cache' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'cache',
    'log' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'log'
);

// Reverse proxy cache
$app['cache.max_age'] = 3600 * 24 * 90;
$app['cache.expires'] = 3600 * 24 * 90;

// Database
$app['mysql_dsn'] = '***';
$app['mysql_user'] = '***';
$app['mysql_password'] = '***';

// Memcache
$app['memcache_servers'] = array(
    array("host" => "***", "port" => 0000)
);
