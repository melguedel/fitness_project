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

public function fetchAll($sql,$params = array()){
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

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

// public function registerUser($gender, $username, $email, $password) {
//     // Passwort hashen
//     $passwordHash = password_hash($password, PASSWORD_DEFAULT);
//     // Ist die Email oder der Username bereits vergeben?
//     $stmt  = $pdo->prepare('SELECT * FROM users WHERE email = :email OR username=:username LIMIT 1');
//     $stmt->execute(['email' => $email, 'username' => $username]);
//     $vergeben = $stmt->rowcount();
//     if ($vergeben > 0) {
//         // Wenn User schon existiert:
//         echo "<p class=\"error-message\">Username is already taken!!</p>\n";
//     }
//     else {
//         // Falls der Name noch nicht existiert, weiterfahren:
//         $row = [
//             'username' => $username,
//             'password' => $token,
//             'email'    => $email
//         ];
//     // Datenbank- Vorbereitung
//     $query = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
//     // Prepared Statement erstellen
//     $stmt = $this->pdo->prepare($query);
//     // Variablen binden
//     $stmt->bindValue(':gender', $gender);
//     $stmt->bindValue(':username', $username);
//     $stmt->bindValue(':email', $email);
//     $stmt->bindValue(':password', $passwordHash);
//     // Statement ausführen
//     $result = $stmt -> execute();
//     return $result;
//     }
// }

};