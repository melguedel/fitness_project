<?php
session_start();
// Usersession entfernen
unset($_SESSION['username']);
// unset($_SESSION['password']);

 // Session beenden und zurückkehren zu Login
session_destroy();
header("Location: register.php");

?>