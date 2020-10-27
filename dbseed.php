<?php
require "bootstrap.php";



$query = <<<EOS
    CREATE TABLE IF NOT EXISTS user (
        id INT NOT NULL AUTO_INCREMENT,
        firstname VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        mobilephone VARCHAR(20),
        admin BOOLEAN NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO user
        (id, firstname, lastname, email, mobilephone, admin)
    VALUES
        (1, 'Jonathan', 'Morland-Barrett', 'jmorland.barrett@gmail.com', '0432 073 969', 1),
        (2, 'Maria', 'Hristozova', 'Maria.Hristozova@gmail.com', null, 0),
        (3, 'Masha', 'Hristozova', 'Masha.Hristozova@gmail.com', null, 0),
        (4, 'Jane', 'Smith', 'Jane.Smith@gmail.com', null, 0),
        (5, 'John', 'Smith', 'John.Smith@gmail.com', null, 0),
        (6, 'Richard', 'Smith', 'Richard.Smith@gmail.com', null, 0),
        (7, 'Donna', 'Smith', 'Donna.Smith@gmail.com', null, 0),
        (8, 'Josh', 'Harrelson', 'Josh.Harrelson@gmail.com', null, 0),
        (9, 'Anna', 'Harrelson', 'Anna.Harrelson@gmail.com', null, 0);
EOS;

$statement = $dbConnection->prepare($query);

try {
    $createTable = $statement->execute();
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}