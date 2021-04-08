<?php

/* Datenbank Verbindung mit lokalen DB-Credentials */

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpassword = "root";
// $dbname = "fitness_site";

/* Neue Instanz für PDO Objekt */

$pdo = new PDO (
    'mysql:host=localhost;dbname=fitness_site;charset=utf8', 'root', 'root'
);

$pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>