<?php

namespace Shared\Infrastructure\PDO\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): \PDO
    {
        $databasePath = __DIR__ . '/../../../../var/banco.sqlite';

        $connection = new PDO('sqlite:' . $databasePath);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}
