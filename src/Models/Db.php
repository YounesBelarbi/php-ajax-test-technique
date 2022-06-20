<?php

namespace App\Models;

use PDO;
use PDOException;

class Db extends PDO
{
    private static $instance;

    private function __construct()
    {
        $_dsn = 'mysql:dbname=' . $_ENV["MYSQL_DATABASE"] . ';host=mysql';

        try {
            parent::__construct($_dsn, $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
