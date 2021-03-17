<?php

// 
class checkUser extends PDO {

    // Mit der Konstruktormethode Verbindung zu DB herstellen
    public function __construct($dbhost, $dbuser, $dbpassword, $dbname) {

        $pdo = 'mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8';

        $optionen = array (
            // Sind Fehler vorhanden?
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            parent::__construct($pdo, $dbuser, $dbpassword, $optionen);
        } catch (PDOException $e) {
            echo ("Database connection failed: ".$e->getMessage()); // oder die anstatt echo
        }
    }

// Funktion erstellen um User in DB zu vergleichen

public function userKontrolle($user, $pass) {
    $query = "SELECT * FROM `users` WHERE `username` = :username";
    $stmt = $this -> prepare($query);
    $stmt = bindParam(':username', $user);
    // $stmt = bindParam(':password', $pass);
    $stmt -> execute();
	$row = $stmt -> fetch();

    // Falls der User nicht gefunden wird
    if ($row) {

        // Stimmt Passwort mit dem in der DB überein?
        if (password_verify($pass, $row['password'])) {
            // Auf Dashboard weiterleiten
            $_SESSION['status'] = "Logged in!";
            header('Location: dashboard.php');
        } else {
            return $errorMessage = "Wrong password. Try again.";
        }
    } else {
            return $errorMessage = "Cannot find user.";
        }
    }


};



?>