<?php

namespace Didatics\Modules\Students\CommandLineInterface;

use Didatics\Modules\Students\Commands\CreateStudent;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;
use Symfony\Component\Console\Output\OutputInterface;

class CreateStudentCommand
{
    private MessageBusSupportingMiddleware $commandBus;

    public function __construct(MessageBusSupportingMiddleware $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(string $name, OutputInterface $output)
    {
        $this->commandBus->handle(
            new CreateStudent('lhs', '1996-01-03')
        );

        $output->writeln($name);
    }
}