<?php
// KLasse um User in DB einzufügen
class Register {

    // Attributes
    protected $pdo;

    // Constructor
    public function __construct (PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Methode für Registration
    
    public function registerUser($gender, $usernameValue, $emailValue, $passwordHash) {
        // Datenbank- Vorbereitung
        $query = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
        // Prepared Statement erstellen
        $stmt  = $this->pdo->prepare($query);
        // Variablen binden
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':username', $usernameValue);
        $stmt->bindParam(':email', $emailValue);
        $stmt->bindParam(':password', $passwordHash);
        // Statement ausführen
        // $stmt->execute(['gender' => $gender, 'email' => $email, 'username' => $username, 'password' => $passwordHash]);
        $result = $stmt->execute();
        $result->close();
        return $result;
    }
}
