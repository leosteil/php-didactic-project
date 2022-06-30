<?php

namespace Didatics\Modules\Students\Commands;

use DateTimeImmutable;

class CreateStudentCommand
{
    private string $name;
    private \DateTimeInterface $birthDate;

    public function __construct(string $name, string $birthDate)
    {
        $this->name = $name;
        $this->birthDate = new DateTimeImmutable($birthDate);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }
}
