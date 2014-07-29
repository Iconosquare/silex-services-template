<?php

/**
 * Exception handling
 */
$app->error(function (\Exception $exception, $code) use ($app) {
    if (true === $app['debug']) {
        return null;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found...';
            break;
        case 403:
            $message = 'Not authorized...';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong...';
    }

    return $app['twig']->render(
        'error.twig',
        array(
            'message' => $message
        )
    );
});
