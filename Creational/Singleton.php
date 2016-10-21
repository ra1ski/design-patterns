<?php

final class Database
{
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __construct__() {}
    private function __clone() {}
    private function __wakeup() {}
}

class PostgreDatabase extends Database
{

}

$instance = PostgreDatabase::getInstance();
