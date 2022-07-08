<?php

require_once  __DIR__ . '/app/bootstrap.php';

use Didatics\Modules\Students\Commands\CreateStudent;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;

$bus = $container->get(MessageBusSupportingMiddleware::class);

$bus->handle(
    new CreateStudent('lhs', '1996-01-03')
);

