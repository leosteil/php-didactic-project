<?php

use Didatics\Modules\Students\Commands\CreateStudentCommand;
use Didatics\Modules\Students\Commands\CreateStudentHandler;
use Didatics\Modules\Students\Infrastructure\PDO\Repositories\PdoStudentRepository;
use Shared\Infrastructure\PDO\Persistence\ConnectionCreator;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;
use SimpleBus\Message\CallableResolver\CallableMap;
use SimpleBus\Message\CallableResolver\ServiceLocatorAwareCallableResolver;
use SimpleBus\Message\Handler\DelegatesToMessageHandlerMiddleware;
use SimpleBus\Message\Handler\Resolver\NameBasedMessageHandlerResolver;
use SimpleBus\Message\Name\ClassBasedNameResolver;

return [
    MessageBusSupportingMiddleware::class => function () {
        $commandHandlerMap = new CallableMap(
            array(
                CreateStudentCommand::class => array('create_student_handler', 'handle'),
            ),
            new ServiceLocatorAwareCallableResolver( function ($serviceId) {
                if ('create_student_handler' === $serviceId) {
                    $connection = ConnectionCreator::createConnection();
                    $repository = new PdoStudentRepository($connection);
                    return new CreateStudentHandler($repository);
                }
            }
            )
        );

        $commandBus = new MessageBusSupportingMiddleware();
        $commandBus->appendMiddleware(
            new DelegatesToMessageHandlerMiddleware(
                new NameBasedMessageHandlerResolver(
                    new ClassBasedNameResolver(),
                    $commandHandlerMap
                )
            )
        );

        return $commandBus;
    },
];
