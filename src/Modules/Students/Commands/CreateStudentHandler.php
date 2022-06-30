<?php

namespace Didatics\Modules\Students\Commands;

use Didatics\Modules\Students\Repositories\StudentRepository;
use Didatics\Modules\Students\Student;

class CreateStudentHandler
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateStudentCommand $createStudentDTO)
    {
        $student = new Student(
            null,
            $createStudentDTO->getName(),
            $createStudentDTO->getBirthDate()
        );
    }
}