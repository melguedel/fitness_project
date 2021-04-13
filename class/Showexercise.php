<?php

// Klasse, um Workouts aus der Datenbank auszulesen

class Showexercise {

    // Attributes
protected $pdo;

// Constructor
public function __construct (PDO $pdo) {
    $this->pdo = $pdo;
}

// Methode

public function getExercise($query, $params = array()) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

}