<?php

require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Src\System\DatabaseConnector;



$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

//Load the database class and make connection.
$dbConnection = (new DatabaseConnector())->getConnection();