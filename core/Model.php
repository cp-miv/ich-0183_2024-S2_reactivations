<?php

declare(strict_types=1);

namespace Core;

use PDO;

abstract class Model
{
    protected static function getDB(): PDO
    {
        $pdo = new PDO('mysql:host=db;port=3306;dbname=reactivations;charset=utf8', 'root', '123456', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}
