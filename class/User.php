<?php

// Klasse um User zu registrieren und einzuloggen
class User {

// Attributes
protected $pdo;

// Constructor
public function __construct (PDO $pdo) {
    $this->pdo = $pdo;
}

// Methoden für Login
public function fetchAll($sql, $params = array()){
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

// Userinput mit Datenbank vergleichen
public function loginUser($user) {
    // Datenbank- Abfrage
    $query = "SELECT * FROM users WHERE username = :username";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Statement ausführen
    $stmt -> execute(['username' => $user]);
    $userCheck = $stmt -> fetch();
    return $userCheck;
}

// Vergleiche Email-Adresse
public function compareEmail($email) {
    // Datenbank- Abfrage
    $query = "SELECT * FROM users WHERE mail = :mail";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Statement ausführen
    $stmt -> execute(['mail' => $email]);
    $userCheck = $stmt -> fetch();
    return $userCheck;
}

// Vergleiche Username
public function compareUser($user) {
    // Datenbank- Abfrage
    $query = "SELECT * FROM users WHERE username = :username";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Statement ausführen
    $stmt -> execute(['username' => $user]);
    $userCheck = $stmt -> fetch();
    return $userCheck;
}

// Datenbankabfrage für ID
public function showInfos($id) {
    // Datenbank- Abfrage
    $query = "SELECT * FROM users WHERE id = :id";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Statement ausführen
    $stmt -> execute(['id' => $id]);
    $userCheck = $stmt -> fetch();
    return $userCheck;
}

// Methode für Registration
public function registerUser($array){
$query = "INSERT INTO `users` (gender, username, mail, password) 
            VALUES (:gender, :username, :mail, :password)";
$stmt = $this->pdo->prepare($query);
$stmt->execute($array);
}

};