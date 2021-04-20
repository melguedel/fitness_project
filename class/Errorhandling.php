<?php 

// Klasse für Errormeldungen

class ErrorHandler {

    public $errormessages;
    public $successmessage;

    /* Keine Userangaben gemacht */
    public function required ($item) {
        if (!empty(trim($item))) {
            return $item;
        } else {
            $this->errormessages = 'Fill in all fields! <br>';
            return false;
        }
    }   

    /* Ist Userinput zu kurz? */
    public function minlenght ($item) {
        if (strlen($item) < 2){
            $this->errormessages = ' Minimum 2 characters! <br>';
            return false;
        }
        return true;
    }

    /* Ist Userinput zu lang? */
    public function maximumlenght ($item) {
        if (strlen($item) > 20) {
            $this->errormessages = ' Maximum 20 characters! <br>';
            return false;
        } 
        return true;
    }

    /* Ist Emaileingabe in Ordnung? */
    public function mailcheck ($item) {
        if (!isset($item)) {
            return false;
        }
        if (!filter_var($item, FILTER_VALIDATE_EMAIL)) {
            $this->errormessages = ' Write a valid email address! <br>';
            return false;
        }
        return true;
    }

    /* Ist Passworteingabe in Ordnung? */
    public function passlenght ($item) {
        if (strlen($item) > 20 || strlen($item) < 8) {
            $this->errormessages = ' Password must be 8-20 characters! <br>';
            return false;
        }
        return true;
    }

    /* Methode, um den Userinput zu kontrollieren */
    public function sanitizeInput ($str) {
        // Trim, Remove Tags, XSS Schutz
        $str = trim($str);
        $str = strip_tags($str);
        // $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
        return $str;
    }

}