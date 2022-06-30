<?php

namespace Modules\Students;

use DateTimeImmutable;
use Didatics\Modules\Students\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testShouldReturnCorrectAge(): void
    {
        $birthDate = new DateTimeImmutable('1996-01-03');
        $student = new Student(null, "John Snow", $birthDate);

        $expectedAge = $birthDate->diff(new DateTimeImmutable('now'))->y;
        $this->assertEquals($expectedAge, $student->age());
    }
}
