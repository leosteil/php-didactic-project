<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();

try {
    $studentRepository = new PdoStudentRepository($connection);

    $connection->beginTransaction();

    $aStudent = new Student(null, 'Nico Steppat', new DateTimeImmutable('1985-05-01'));

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(null, 'LHS', new DateTimeImmutable('1985-05-01'));

    $studentRepository->save($anotherStudent);

    $connection->commit();
} catch (PDOException $exception) {
    echo $exception->getMessage();
    $connection->rollBack();
}


