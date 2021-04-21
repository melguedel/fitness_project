<?php

// Klasse, um Workouts aus der Datenbank auszulesen, zu speichern und zu löschen

class Showexercise {

// Attributes
protected $pdo;

// Constructor
public function __construct (PDO $pdo) {
    $this->pdo = $pdo;
}

// Methoden

// Hole Übungen von Datenbank
public function getExercise($query, $params = array()) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

// Übung speichern
public function saveExercise($query, $params = array()) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
}

// Übung löschen
public function deleteExercise($query, $params = array()) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
}



};