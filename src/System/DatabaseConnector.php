<?php

/**
 * This file contains the class for the database connection.
 * Connection can be returned with getConnection()
 */

namespace Src\System;

class DatabaseConnector {

    private $dbConnection = null;

    public function __construct()
    {

        $connectionSettings = array(
        'dbname' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'port' => $_ENV['DB_PORT'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
        'charset' => 'UTF8'
        );
        try {
            $this->dbConnection = \Doctrine\DBAL\DriverManager::getConnection($connectionSettings);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function getConnection()
    {
        return $this->dbConnection;
    }

}