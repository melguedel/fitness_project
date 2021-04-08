<?php

// Klasse um Registrationsinput zu validieren
class Validation {

public function validateForm() {}
if (isset ($_POST['submit'])) {

    var_dump($_POST);

    // Variablen erstellen
    // $usernameValue = $sanitize -> sanitizeInput($_POST['username'], true, "Username", "min_length-2|max_length-40", "Username must be at least 2 characters and maximum 40 characters.");
    // $passwordValue = $sanitize -> sanitizeInput($_POST['password'], true, "Password", "min_length-8|max_length-40", "Password must be at least 8 characters and maximum 40 characters.");
    // $emailValue = $sanitize -> sanitizeInput($_POST['email'], true, "E-Mail", "email", "This ist not a valid e-mail address.");
    // $errorMessage = $userInstance -> registrationsKontrolle($user, $pass);

        // Variablen erstellen
        $gender = $sanitize->sanitizeInput($_POST['gender']);
        $username = $sanitize->sanitizeInput($_POST['username']);
        $email = $sanitize->sanitizeInput($_POST['email']);
        $password = $sanitize->sanitizeInput($_POST['password']);
    
        // Errormessages
        $errorEmpty = false;
        $errorEmail = false;

        // Noch empty($agb) hinzufügen
    if (empty($username) || empty($email) || empty($password)) {
        $errorEmpty = true;
        echo "<p class=\"error-message\">Fill in all the fields!</p>\n";
        // echo $errorMessage = "<div class=\"error-message\">";
        // echo $errorMessage .= "Fill in all the fields!";
        // echo $errorMessage .= "</div>\n";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class=\"error-message\">Write a valid email adress!</p>\n";
        $errorEmail = true;
    } elseif ( !isset($_POST['agb']) ) {
        $errorEmpty = true;
        echo "<p class=\"error-message\">Accept terms and conditions</p>\n";
    }
    else {
        // $sqlInsert = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
        $sqlInsert = $registerUser->registerUser($gender, $username, $email, $password);
        echo "<p class=\"success-message\">You are registered!</p>\n";
    // 


    }


// if (isset($_POST['submit'])) {

//     // Variablen erstellen
//     $gender = $_POST['gender'];
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     // $agb = $_POST['agb'];

//     // Errormessages
//     $errorEmpty = false;
//     $errorEmail = false;

//     // Noch empty($agb) hinzufügen
//     if (empty($username) || empty($email) || empty($password)) {
//         echo "<p class=\"error-message\">Fill in all the fields!</p>\n";
//         // echo $errorMessage = "<div class=\"error-message\">";
//         // echo $errorMessage .= "Fill in all the fields!";
//         // echo $errorMessage .= "</div>\n";
//         $errorEmpty = true;
//     }
//     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         echo "<p class=\"error-message\">Write a valid email adress!</p>\n";
//         $errorEmail = true;
//     }
//     else {
        
//         echo "<p class=\"success-message\">You are registered!</p>\n";
//     }
// } 
// else {
//     echo "<p class=\"success-message\">There is an error!</p>\n";
// }

