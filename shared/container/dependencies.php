<?php

use DI\ContainerBuilder;
use Didatics\Modules\Students\Commands\CreateStudentCommand;
use Didatics\Modules\Students\Infrastructure\PDO\Persistence\ConnectionCreator;
use Didatics\Modules\Students\Infrastructure\PDO\Repositories\PdoStudentRepository;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    'CreateStudentCoammand' => function () {
        $connection = ConnectionCreator::createConnection();
        $repository = new PdoStudentRepository($connection);
        return new CreateStudentCommand($repository);
    },
]);

return $containerBuilder->build();