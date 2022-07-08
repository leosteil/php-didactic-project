<?php

namespace Didatics\Modules\Students\Infrastructure;

use Didatics\Modules\Students\Repositories\StudentRepository;
use Didatics\Modules\Students\Student;

class InMemoryStudentRepository implements StudentRepository
{
    private array $students = [];

    public function save(Student $student): bool
    {
        return array_push($this->students, [
            $student->name(),
            $student->birthDate()
        ]);
    }

    public function allStudents(): array
    {
        return $this->students;
    }
}