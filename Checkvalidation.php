<?php

if (isset ($_POST['submit'])) {

$errorEmpty = false;
$errorEmail = false;
$errorMessages = [];
$blacklist = [' ', '\\', '?'];

        // Wurden alle Inputfelder ausgefüllt?
        if (!isset($_POST['username']) && strlen($_POST['username']) < 3) {
            // Wenn nichts eingetragen wurde:
            $errorEmpty = true;
            array_push($errorMessages, "Enter at least 3 characters!");
             // echo "<p class=\"error-message\">Enter an username!</p>\n";
        } 
        // else {
        //     array_push($errorMessages, "ADDED: USERNAME -> " . $_POST['username']);
        // }
     
    
        
        if (empty($passwordValue)) {
            $errorEmpty = true;
            array_push($errorMessages, "Enter a password!");
            //echo "<p class=\"error-message\">Enter a password!</p>\n";
            // $registerError = "<p class=\"error-message\">Enter a password!</p>\n";
        } 
        
        if (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
            // Wenn eine falsche Mail angegeben wurde:
            // $registerError = "<p class=\"error-message\">Write a valid email adress!</p>\n";
            array_push($errorMessages, "Write a valid email address!");
        }
        
        if ( !isset($_POST['agb'])) {
            // Wenn die AGB nicht angekreuzt wurden
            $errorEmpty = true;
            array_push($errorMessages, "Check terms and conditions");
            // $registerError = "<p class=\"error-message\">Check terms and conditions</p>\n";
        } else {
            echo "<p class=\"error-message\">Error!</p>\n";
            // Wenn alles stimmt, in Datenbank eintragen
            // $userRegistration->registerUser($gender, $usernameValue, $emailValue, $passwordHash);
            // $successMessage = "<p class=\"success-message\">You are registered!</p>\n";
        }

        echo print_r($errorMessages);



}