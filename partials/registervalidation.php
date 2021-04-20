<?php
require('../class/Errorhandling.php');
require('../class/User.php');
require('../prefs/Credentials.php');
// Instanziere Klassen
$validation = new ErrorHandler;
$checkUser = new User($pdo);


if(isset($_POST)) {

    // Userinput "reinigen"
    $username =  $validation->sanitizeInput($_POST['username']);
    $email = $validation->sanitizeInput($_POST['email']);
    $password = $validation->sanitizeInput($_POST['password']);
    $gender = $validation->sanitizeInput($_POST['gender']);
    // $agb = $validation->sanitizeInput($_POST['agb']);

    // Wurde Username angegeben?
    $test = $validation->required($username);
    if (!$test){
       echo  $validation->errormessages;
    }

    // Miminuminput Username
    $minimum = $validation->minlenght($username);
    if (!$minimum){
       echo  $validation->errormessages;
    }

    // Maximuminput Username
    $maximum = $validation->maximumlenght($username);
    if (!$maximum){
       echo  $validation->errormessages;
    }

    // Emaileingabe
    $validmail = $validation->mailcheck($email);
    if (!$validmail){
       echo  $validation->errormessages;
    }

    // Passworteingabe
    $passwortcheck = $validation->passlenght($password);
    if (!$passwortcheck){
       echo  $validation->errormessages;
    }

    // Passwort hashen
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Kontrollieren, ob Email oder Username schon in der DB vorhanden ist
   //  $compEmail = $checkUser->compareEmail($email);
    $compUser = $checkUser->compareUser($username);
        if ( !$compUser && !isset($passwortcheck) && !isset($validmail) ) {
         // && !isset($validmail)
            // Wenn alles stimmt, in Datenbank eintragen
            $checkUser->registerUser([
            'gender'=>$gender, 
            'username' => $username,
            'mail' => $email, 
            'password' =>$passwordHash]);
            echo "<p class=\"success-message\">You are registered!</p>\n"; 
        } else {
            echo "<p class=\"error-message\">Could not register!</p>\n";
        }





};