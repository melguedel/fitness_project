<?php

if (isset ($_POST['submit'])) {

$errorEmpty = false;
$errorEmail = false;

        // Wurden alle Inputfelder ausgefüllt?
        if (empty($usernameValue)) {
            // Wenn nichts eingetragen wurde:
            $errorEmpty = true;
            echo "<p class=\"error-message\">Enter an username!</p>\n";
        } else if (empty($passwordValue)) {
            $errorEmpty = true;
            echo "<p class=\"error-message\">Enter a password!</p>\n";
            // $registerError = "<p class=\"error-message\">Enter a password!</p>\n";
        } else if (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
            // Wenn eine falsche Mail angegeben wurde:
            // $registerError = "<p class=\"error-message\">Write a valid email adress!</p>\n";
        } elseif ( !isset($_POST['agb'])) {
            // Wenn die AGB nicht angekreuzt wurden
            $errorEmpty = true;
            // $registerError = "<p class=\"error-message\">Check terms and conditions</p>\n";
        } else {
            echo "<p class=\"error-message\">Error!</p>\n";
            // Wenn alles stimmt, in Datenbank eintragen
            // $userRegistration->registerUser($gender, $usernameValue, $emailValue, $passwordHash);
            // $successMessage = "<p class=\"success-message\">You are registered!</p>\n";
        }



}