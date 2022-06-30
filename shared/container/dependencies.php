<?php

use DI\ContainerBuilder;
use Didatics\Modules\Students\Commands\CreateStudentHandler;
use Didatics\Modules\Students\Infrastructure\PDO\Persistence\ConnectionCreator;
use Didatics\Modules\Students\Infrastructure\PDO\Repositories\PdoStudentRepository;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    'CreateStudentCommand' => function () {
        $connection = ConnectionCreator::createConnection();
        $repository = new PdoStudentRepository($connection);
        return new CreateStudentHandler($repository);
    },
]);

return $containerBuilder->build();