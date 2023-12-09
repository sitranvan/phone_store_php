<?php

namespace App\Core;

use App\Core\Load;
use PDO;
use PDOException;

class Connection
{
    private static $instance = null;
    private $connect;
    private function __construct()
    {
        try {
            $dsn = getenv('DB_CONNECTION') . ':dbname=' . getenv('DB_DATABASE') . ';host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT');
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->connect = new PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'), $options);
        } catch (PDOException $ex) {
            $data['message'] = $ex->getMessage();
            Load::renderError('database', $data);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance->connect;
    }
}
