<?php

require_once  __DIR__ . '/app/bootstrap.php';

use Didatics\Modules\Students\Commands\CreateStudentCommand;
use League\Tactician\CommandBus;

$bus = $container->get(CommandBus::class);

$bus->handle(
    new CreateStudentCommand('lhs', '1996-01-03')
);

