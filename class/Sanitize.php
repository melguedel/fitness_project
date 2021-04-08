
<?php

/* Klasse, um den Userinput zu kontrollieren */
class Sanitize {

    public function sanitizeInput ($str) {
        // Trim, Remove Tags, XSS Schutz
        $str = trim($str);
        $str = strip_tags($str);
        $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
        return $str;
    }
}