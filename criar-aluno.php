<?php

require_once __DIR__ . '/config/bootstrap.php';

use Didatics\Modules\Students\Commands\CreateStudentCommand;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;

$bus = $container->get(MessageBusSupportingMiddleware::class);

$bus->handle(
    new CreateStudentCommand('lhsdfs', '1996-01-03')
);

