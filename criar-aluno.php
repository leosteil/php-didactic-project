<?php

require_once 'bootstrap.php';

use Didatics\Modules\Students\Commands\CreateStudentCommand;

$locator->addHandler(
    $container->get('CreateStudentCommand'),
    CreateStudentCommand::class
);

$bus->handle(
    new CreateStudentCommand('lhs', '1996-01-03')
);
