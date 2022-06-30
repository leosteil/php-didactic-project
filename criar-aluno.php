<?php

use Didatics\Modules\Students\Commands\CreateStudentDTO;

require_once 'vendor/autoload.php';

$container = require __DIR__ . '/shared/container/dependencies.php';

$createStudentDto = new CreateStudentDTO('lhs', '1996-01-03');
$createStudentCommand = $container->get('CreateStudentCommand');

$createStudentCommand->execute($createStudentDto);
