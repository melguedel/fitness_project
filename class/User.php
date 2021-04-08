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

// Userinput mit Datenbank vergleichen
public function loginUser($user, $pass) {
    // Datenbank- Abfrage
    $query = "SELECT * FROM users WHERE username = :username and password = :password";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Statement ausführen
    $stmt -> execute(['username' => $user, 'password' => $pass]);
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

public function registerUser($gender, $username, $email, $password) {
    // Passwort hashen
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // Datenbank- Vorbereitung
    $query = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
    // Prepared Statement erstellen
    $stmt = $this->pdo->prepare($query);
    // Variablen binden
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $passwordHash);
    // Statement ausführen
    $result = $stmt -> execute();
    return $result;
}

};