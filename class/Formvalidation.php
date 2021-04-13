<?php

class formValidation {

// Attributes
protected $pdo;

// Fehlermeldung für leere Inputfelder
private $requiredInput = "Please fill in the input fields.";

// Array aller Meldungen für den User
public $userFeedback = array(); 

// Validierungsstatus des Formulars
public $validationsStatus = true;

// Constructor

public function __construct (PDO $pdo) {
    $this->pdo = $pdo;
}

// Methoden

// Methode zur Validierung des Unserinputs
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

};

?>