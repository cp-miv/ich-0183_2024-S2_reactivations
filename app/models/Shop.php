<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

class Shop extends Model
{
    public static function getAll(): array
    {
        $db = self::getDB();

        $shops = $db->query('SELECT * FROM `Shop`')->fetchAll();

        return $shops;
    }

    public static function add(array $model): void
    {
        $db = self::getDB();

        $db->query("INSERT INTO `Shop`(`name`) VALUES ('{$model['name']}')");
    }
}
