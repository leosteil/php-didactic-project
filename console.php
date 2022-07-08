<?php

use Didatics\Modules\Students\CommandLineInterface\CreateStudentCommand;
use Didatics\Modules\Students\Commands\CreateStudent;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;
use Symfony\Component\Console\Output\OutputInterface;

$container = require __DIR__ . '/app/bootstrap.php';

$app = new Silly\Application();

$app->useContainer($container, $injectWithTypeHint = true);

$app->command('create-student [name]', CreateStudentCommand::class);

$app->run();
