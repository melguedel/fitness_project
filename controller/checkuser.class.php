<?php

// 
class checkUser extends PDO {

    // Fehlermeldung für leere Inputfelder
    private $requiredInput = "Please fill in the input fields.";

    // Array aller Meldungen für den User
    public $userFeedback = array(); 

    // Validierungsstatus des Formulars
    public $validationsStatus = true;

    // Funktion zur Validierung des Unserinputs
    public function validateInput($input, $required, $elementName = "", $art="", $feedbackArt ="") {
        
        // alle Sonderzeichen, Leerschläge und Tags entfernen
        $desinfiziert = $this -> killDangerousInput($input);
        $überprüfen = "true";
        $listenArt = explode("|", $art);

        // Sind die zu befüllenden Inputs leer?
        if ($requiredInput && ($input == "")) {
            $this -> userFeedback[] = $elementName.": ".$this -> requiredInput;
            $this -> validationsStatus = false;
        } elseif (strlen($input) > 0) {
                if (in_array('email', $listenArt)) {
                    if (!$this -> email($input)) {
                        $überprüfen = "false";
                    }
                }

            $array1 = preg_grep("/^min_length-\d*/", $listenArt);
			$key1 = key($array1);
			if (count($array1) > 0) {
				$parts1 = explode("-", $array1[$key1]);
				if(!$this->minimumLength($input, $parts1[1])) {
					$überprüfen = "false";
				}
			}
			
			$array2 = preg_grep("/^max_length-\d*/", $listenArt);
			$key2 = key($array2);
			if (count($array2) > 0) {
				$parts2 = explode("-", $array2[$key2 ]);
				if(!$this->maximumLength($input, $parts2[1])) {
					$überprüfen = "false";
				}
			}
        }
    

        // if ($überprüfen == "false") {
        //     $this -> userFeedback[] = $elementName.": "$feedbackArt;
        //     $this -> validationsStatus = false;
        // }

        return $desinfiziert;

    }

    /* Funktionen für Registration */

    // Funktion zur "Reinigung und Desinfektion" des Unserinputs
    private function killDangerousInput($str){
        // $str = trim($str);
        // $str = strip_tags($str);
        // $str = htmlspecialchars($str);
        $newString = filter_var($str, FILTER_SANITIZE_STRING);
        $newString = trim($newString);
        return $newString;
    }

    // Funktion um zu prüfen ob Input eine E-Mail ist
    private function email($str) {
        if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    // Funktion um Mimimumlänge des Inputs zu prüfen
    private function minimumLength($str, $length) {
        $zeichenLaenge = strlen($str);
        if ($zeichenLaenge >= $length) {
            return true;
        } else {
            return false;
        }
    }

    // Funktion um Maximumlänge des Inputs zu prüfen
    private function maximumLength($str, $length) {
        $zeichenLaenge = strlen($str);
        if ($zeichenLaenge <= $length) {
            return true;
        } else {
            return false;
        }
    }


    // Mit der Konstruktormethode Verbindung zu DB herstellen
    public function __construct($dbhost, $dbuser, $dbpassword, $dbname) {

        $pdo = 'mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8';

        $optionen = array (
            // Sind Fehler in der Testphase vorhanden?
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        // Aufrufen der PDO-Klasse
        try {
            parent::__construct($pdo, $dbuser, $dbpassword, $optionen);
        } catch (PDOException $e) {
            echo ("Database connection failed: ".$e->getMessage()); // oder die anstatt echo
        }
    }

// Funktion erstellen um User in DB zu vergleichen
public function userKontrolle($user, $pass) {
    $query = "SELECT * FROM `users` WHERE `username` = :username";
    // $query = "SELECT * FROM `users` WHERE `username` = :username and `password` = :password";
    $stmt = $this -> prepare($query);
    $stmt -> bindParam(':username', $user);
    // $stmt -> bindValue(':password', $pass);
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
             $errorMessage = "Wrong password. Try again.";
            // return $errorMessage = "Wrong password. Try again.";
        }
    } else {
            $errorMessage = "Cannot find user.";
            // return $errorMessage = "Cannot find user.";
        }
    }


};



?>