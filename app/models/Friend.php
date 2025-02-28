<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

class Friend extends Model
{
    public static function getAll(): array
    {
        $db = self::getDB();

        $friends = $db->query('SELECT * FROM `Friend`')->fetchAll();

        return $friends;
    }

    public static function find(int $id): array
    {
        $db = self::getDB();

        $friend = $db->query("SELECT * FROM `Friend` WHERE `id` = {$id}")->fetch();

        return $friend;
    }
}
