<?php
session_start();
$_SESSION['status'] = false;

require('prefs/Credentials.php');
require('class/User.php');
require('class/Sanitize.php');

// Instanzieren der Klassen
$sanitize = new Sanitize();
$checkUser = new User($pdo);
 
   // Errormessage auf leer stellen
   $errorMessage = "";
// Wurde der Submit-Button des Logins gedrückt?
if ( isset ($_POST['login']) ) {
    // Variablen erstellen
    $user = $sanitize->sanitizeInput($_POST['userName']);
    $pass = $sanitize->sanitizeInput($_POST['pass']);
 
    // kontrollieren ob username und password eingebeben ist
    if (empty($user) || empty($pass)) {
        $errorMessage = "<p class=\"error-message\">Enter Username & Password</p>\n";
    }else{
        // DB abfrage, ob der username im DB existiert
        $loginCheck = $checkUser->loginUser($user);

        // wenn user nicht existiert, fehlermeldung erzeugen
        if (!$loginCheck) {
            $errorMessage = "<p class=\"error-message\">User not found!</p>\n";
        } else {
            // var_dump($loginCheck);
            // passwort vergleichen, wenn passt weiterleiten
            if(password_verify($pass,$loginCheck['password'])){
                $_SESSION['status'] = true;
                $_SESSION['userid'] = $loginCheck['id'];
                header('Location: dashboard.php'); 
            }else{
                // wenn nicht, fehlermeldung
                $errorMessage = "<p class=\"error-message\">Wrong Password!</p>\n";
            }
        }
    }
}
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $user = "";
    $pass = "";
    $errorMessage = "";
}

// Errormessages auf leer stellen
        $registerError = "";
        $successMessage = "";
// Wurde der Submit-Button der Registration gedrückt?
if (isset ($_POST['submit'])) {
        // Variablen erstellen und Input "reinigen"
        $gender = $sanitize->sanitizeInput($_POST['gender']);
        $usernameValue = $sanitize->sanitizeInput($_POST['username']);
        $emailValue = $sanitize->sanitizeInput($_POST['email']);
        $passwordValue = $sanitize->sanitizeInput($_POST['password']);

        // Passwort hashen
        $passwordHash = password_hash($passwordValue, PASSWORD_DEFAULT);
    
        // Wurden alle Inputfelder ausgefüllt?
        if (empty($usernameValue)) {
            // Wenn nichts eingetragen wurde:
            $registerError = "<p class=\"error-message\">Enter an username!</p>\n";
        } else if (empty($passwordValue)) {
            $registerError = "<p class=\"error-message\">Enter a password!</p>\n";
        } else if (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
            // Wenn eine falsche Mail angegeben wurde:
            $registerError = "<p class=\"error-message\">Write a valid email adress!</p>\n";
        } elseif ( !isset($_POST['agb'])) {
            // Wenn die AGB nicht angekreuzt wurden
            $registerError = "<p class=\"error-message\">Check terms and conditions</p>\n";
        } else {
            // kontrollieren, ob email schon im DB vorhanden ist
            $compEmail = $checkUser->compareEmail($emailValue);
            if(!$compEmail){
                // Wenn alles stimmt, in Datenbank eintragen
                $checkUser->registerUser([
                'gender'=>$gender, 
                'username' => $usernameValue,
                'mail' => $emailValue, 
                'password' =>$passwordHash]);
                $successMessage = "<p class=\"success-message\">You are registered!</p>\n"; 
            }else{
                $registerError = "<p class=\"error-message\">Email already taken</p>\n";
            }
        }
}
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $usernameValue = "";
    $passwordValue = "";
    $emailValue = "";
    $registerError = "";
    $successMessage = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- CSS Stylesheet -->
<link rel="stylesheet" href="scss/main.css">
<!-- Meta Data -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fitness Project Module WBD 5204 for SAE Zurich">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="scss/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Javascript -->
    <script src="js/register.js"></script>
    <!-- Title -->
    <title>Fitness Project</title>

    
</head>
<body>

<!-- Navigation -->
<?php require('partials/topnav.inc.html'); ?>

<!-- Register and Login Forms -->
<section class="form-section">
    <!-- Login Form -->
    <form action="" class="login-form" method="POST">
        <h2>Login</h2>
        <p class="register-info">to existing profile</p>
        <label for="userName">Username<input type="text" name="userName" value="<?=$user?>"></label>
        <label for="pass">Password<input type="password" name="pass"></label>
        <!-- Fehlerausgabe -->
        <?php if ($errorMessage) : ?>
        <p class="error-message"><?=$errorMessage?></p>
        <?php endif; ?>
        <!-- Submit Button -->
        <input type="submit" value="Log me in!" name="login" class="btn">
    </form>
    <!-- Registration Form -->
    <form action="" class="register-form" method="POST">
        <h2>Register</h2>
        <p class="register-info">and create your own workout plan</p>
        <!-- Select Gender -->
        <select name="gender" id="validate-gender">
            <option value="female">Female</option>
            <option value="other">Other</option>
            <option value="male">Male</option>
        </select>
        <!-- Eingabefelder -->
        <label for="username">Username<input type="text" id="validate-username" name="username" value="<?=$usernameValue?>"></label>
        <label for="email">E-Mail<input type="email" id="validate-email" name="email" value="<?=$emailValue?>"></label>
        <label for="password">Password<input type="password" id="validate-password" name="password" value="<?=$passwordValue?>"></label>
        <!-- Terms and Conditions -->
        <p>
            <label>
                <input type="checkbox" id="validate-agb" name="agb" />
                <span>Accept terms and conditions</span>
            </label>
        </p>
            <div id="alert"></div>
        <!-- Fehlerausgabe -->
        <p class="error-message" id="register-error"></p>
        <?php if ($registerError) : ?>
        <p class="error-message"><?=$registerError?></p>
        <?php endif; ?>
        <!-- Positives Feedback -->
        <p class="success-message"><?=$successMessage?></p>
        <!-- Submit Button -->
        <input type="submit" class="btn" name="submit" value="submit" id="validate-submit"></input>
    </form>
</section>
    <!-- Footer -->
    <?php require('partials/footer.inc.html'); ?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Other JS -->
    <script src="js/menu.js"></script>

    <script>
// $(document).ready(function() {                 
//     $(".login-form").submit(function(e){
//       e.preventDefault();
//       $.ajax({
//       url:'/test.php',
//       type:'POST',
//       data: {username:$("#validate-username").val(), password:$("#validate-password").val()},
//       success: function(resp) {
//          if(resp == "invalid") {
//           $("#register-error").html("Invalid username and password!");  
//          } else {
//           window.location.href= resp;
//          }
//       }
//      });
//   });
// });


$(document).ready(function(){

$(".register-form").submit(function(e) {
    // Neuladen der Seite verhindern
    console.log('bitchesss');
    e.preventDefault();
    console.log('test2');
    // Variablen erstellen
    let gender = $("#validate-gender").val();
    let username = $("#validate-username").val();
    let email = $("#validate-email").val();
    let password = $("#validate-password").val();
    let agb = $("#validate-agb").val();
    let submit = $("#validate-submit").val();

    console.table({
        gender: gender,
        username: username,
        email: email,
        password: password,
        agb: agb,
        submit: submit
    })

    $("#register-error").load("Checkvalidation.php", {
        gender: gender,
        username: username,
        email: email,
        password: password,
        agb: agb,
        submit: submit
    });
});

});
    </script>
</body>
</html>