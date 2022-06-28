<?php

namespace Didatics\Modules\Students\Commands;

use Didatics\Modules\Students\Dtos\CreateStudentDTO;
use Didatics\Modules\Students\Entities\Student;
use Didatics\Modules\Students\Repositories\StudentRepository;

class CreateStudentCommand
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateStudentDTO $createStudentDTO)
    {
        $student = new Student(
            null,
            $createStudentDTO->getName(),
            $createStudentDTO->getBirthDate()
        );
    }
}