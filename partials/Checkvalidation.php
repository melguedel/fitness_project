<?php
// Wurde der Register-Button gedrückt:
if (isset ($_POST['submit'])) {

// $errorEmpty = false;
// $errorEmail = false;
$errorMessages = [];
// $errorMessages = "";
// $registerError = [];
// $registerError = "";
// $blacklist = [' ', '\\', '?'];

        // Wurden alle Inputfelder ausgefüllt?
        // if (!isset($_POST['username'])) {
            // Wenn weniger als 2 Zeichen eingetragen wurden:
            // $errorEmpty = true;
            // array_push($errorMessages, "Enter at least 3 characters!");
            // array_push($errorMessages, "No Username!");
            // array_push($registerError, "<p class=\"error-message\">Enter an username!</p>\n");
             // echo "<p class=\"error-message\">Enter an username!</p>\n";
        // } 
        // Wenn Username zu kurz:
        if (strlen($_POST['username']) < 2) {
            // $errorEmpty = true;
            // $registerError = "<p class=\"error-message\">Enter at least 2 characters in Username! </p>\n";
            array_push($errorMessages, "Enter at least 2 characters in Username!");
            // array_push($registerError, "<p class=\"error-message\">Enter at least 2 characters in Username! </p>\n");
        } 
        // else {
        //     $registerError = "";
        //     // array_push($registerError, " ");
        // }
        // else {
            //     array_push($errorMessages, "ADDED: USERNAME -> " . $_POST['username']);
            // }
            
            // if (!isset($_POST['password'])) {
                // Wenn kein Passwort eingetragen wurde:
                // $errorEmpty = true;
                // array_push($errorMessages, "Enter Password");
                // array_push($registerError, "<p class=\"error-message\">Enter Password!</p>\n");
                //echo "<p class=\"error-message\">Enter a password!</p>\n";
                // $registerError = "<p class=\"error-message\">Enter a password!</p>\n";
            // } 
            // Wenn Passwort zu kurz:
            if (strlen($_POST['password']) < 4) {
                // $errorEmpty = true;
                array_push($errorMessages, "Password must be at least 4 characters!");
                // $registerError = "<p class=\"error-message\">Enter at least 2 characters in Username! </p>\n";
                // array_push($registerError, "<p class=\"error-message\">Password must be at least 4 characters!</p>\n");
            } 
            // else {
            //     $registerError = "";
            //     // array_push($registerError, " ");
            // }
        
        // if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Wenn eine falsche Mail angegeben wurde:
            // $errorEmpty = true;
            // array_push($errorMessages, "Write a valid email address!");
            // array_push($registerError, "<p class=\"error-message\">Write a valid email address!</p>\n");
            // $registerError = "<p class=\"error-message\">Write a valid email adress!</p>\n";
        // }
        // Gebe Errormessages aus
        print_r($errorMessages);
        // print_r($registerError);
        // echo $errorMessages;
        // return $registerError;
        // $error = json_encode($registerError);
        // return $error;

}