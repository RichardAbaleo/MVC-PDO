<?php

namespace App\Utils;

use PDO;

class DB
{
    /**
     * @var PDO
     */
    private $dbh;

    /**
     * @var DB
     */
    private static $instance;

    private function __construct()
    {
        $config = parse_ini_file(__DIR__ . '/../../.env');

        try {
            $this->dbh = new PDO(
                "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8",
                $config['DB_USERNAME'],
                $config['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * @return PDO
     */
    public static function getPdo()
    {
        if (empty(self::$instance)) {
            self::$instance = new DB();
        }

        return self::$instance->dbh;
    }
}
