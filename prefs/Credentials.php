<?php

/* Datenbank Verbindung */

/* Neue Instanz für PDO Objekt */
try {
    $pdo = new PDO (
        'mysql:host=localhost;dbname=fitness_project;charset=utf8', 'root', 'root'
    );
    // Set PDO Error Mode to exception
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Verbindung zur Datenbank fehlgeschlagen".$e->getMessage();
}

?>