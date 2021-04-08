<?php
session_start();
$_SESSION['status'] = false;

require('class/Credentials.php');
require('class/User.php');
// require('../class/Formvalidation.php');
require('class/Sanitize.php');
// require('../class/Validation.php');

// Instanzieren der Klassen
// $formValidation = new formValidation($pdo);
$sanitize = new Sanitize();
$checkUser = new User($pdo);
 
// Wurde der Submit-Button des Logins gedrückt?
if ( isset ($_POST['login']) && isset($_POST['userName']) && isset($_POST['pass']) ) {
    // var_dump($_POST);

    // Variablen erstellen
    $user = $sanitize->sanitizeInput($_POST['userName']);
    $pass = $sanitize->sanitizeInput($_POST['pass']);
    // Methode für Login aufrufen
    $loginCheck = $checkUser->loginUser($user, $pass);
    // var_dump($loginCheck);

    if(!$loginCheck) {
        // $errorMessage = "Enter Username & Password";
        echo "<p class=\"error-message\">Enter Username & Password</p>\n";
        // $errorMessage = "<div class=\"error-message\">";
        // $errorMessage .= "Oh no, something wrong!";
        // $errorMessage .= "</div>\n";
    } else {
        $_SESSION['status'] = true;
        $_SESSION['userid'] = $loginCheck['id'];
        header('Location: dashboard.php');
    }
    //  if ( empty($user) ) {
    //     $errorMessage = "Enter Username";
    //     // echo "<p class=\"error-message\">Enter Username</p>\n";
    // }
    // if ( empty($pass)) {
    //     $errorMessage = "Enter Password";
    //     // echo "<p class=\"error-message\">Enter Password</p>\n";
    // } 
        // $_SESSION['status'] = true;
        // $_SESSION['userid'] = $loginCheck['id'];
        // header('Location: dashboard.php');
    
}
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $user = "";
    $pass = "";
    $errorMessage = "";
}


// Wurde der Submit-Button der Registration gedrückt?
if (isset ($_POST['submit'])) {
    // var_dump($_POST);

    // Variablen erstellen
    // $usernameValue = $sanitize -> sanitizeInput($_POST['username'], true, "Username", "min_length-2|max_length-40", "Username must be at least 2 characters and maximum 40 characters.");
    // $passwordValue = $sanitize -> sanitizeInput($_POST['password'], true, "Password", "min_length-8|max_length-40", "Password must be at least 8 characters and maximum 40 characters.");
    // $emailValue = $sanitize -> sanitizeInput($_POST['email'], true, "E-Mail", "email", "This ist not a valid e-mail address.");
    // $errorMessage = $userInstance -> registrationsKontrolle($user, $pass);

        // Variablen erstellen und Input "reinigen"
        $gender = $sanitize->sanitizeInput($_POST['gender']);
        $username = $sanitize->sanitizeInput($_POST['username']);
        $email = $sanitize->sanitizeInput($_POST['email']);
        $password = $sanitize->sanitizeInput($_POST['password']);
    
        // Errormessages
        $errorEmpty = false;
        $errorEmail = false;

        // Wurden alle Inputfelder ausgefüllt?
    if (empty($username) || empty($email) || empty($password)) {
        // Wenn nichts eingetragen wurde:
        $errorEmpty = true;
        $errorMessage = "<p class=\"error-message\">Fill in all the fields!</p>\n";
        // echo $errorMessage = "<div class=\"error-message\">";
        // echo $errorMessage .= "Fill in all the fields!";
        // echo $errorMessage .= "</div>\n";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Wenn eine falsche Mail angegeben wurde:
        echo "<p class=\"error-message\">Write a valid email adress!</p>\n";
        $errorEmail = true;
    } elseif ( !isset($_POST['agb']) ) {
        // Wenn die AGB nicht angekreuzt wurden
        $errorEmpty = true;
        echo "<p class=\"error-message\">Accept terms and conditions</p>\n";
    }
    else {
        // Wenn alles stimmt, in Datenbank eintragen
        // $sqlInsert = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
        $sqlInsert = $checkUser->registerUser($gender, $username, $email, $password);
        echo "<p class=\"success-message\">You are registered!</p>\n";
    }
} 
// else {
//     echo "<p class=\"success-message\">There is an error!</p>\n";
// }

    // if (empty($usernameValue)) {
    //     $errorMessage = "Please enter Username";
    // } elseif (empty($emailValue)) {
    //     $errorMessage = "Please enter Email";
    // } elseif (empty($passwordValue)) {
    //     $errorMessage = "Please enter a password!";
    // }

//     $sqlInsert = "INSERT INTO users (gender, username, mail, password) VALUES (:gender, :username, :mail, :password)";
//     // Ist die Formularvalidation in Ordnung?
//     if ($userInstance -> validationsStatus) {
//         // Alle Inputfelder sind in Ordnung!
//         $successMessage = "<div class=\"success-message\">";
//         $successMessage .= "Userinput accepted!";
//         $successMessage .= "</div>\n";
//     } else {
//         // Irgendwo hat es einen Fehler!
//         $errorMessage = "<div class=\"error-message\">";
//         foreach ($userInstance -> userFeedback as $feedback) {
//             $errorMessage .= $feedback. "<br>";
//         }
//         $errorMessage .= "</div<\n";
//     }
// }
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $usernameValue = "";
    $passwordValue = "";
    $emailValue = "";
    $errorMessage = "";
    $successMessage = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="scss/main.css">

<!-- Meta Data -->
<?php require('partials/head.inc.html'); ?>

<body>

<!-- Navigation -->


<!-- Register and Login Forms -->
<section class="form-section">
    <!-- Login Form -->
    <form action="" class="login-form" method="POST">
        <h2>Login</h2>
        <p class="register-info">to existing profile</p>
        <label for="userName">Username<input type="text" name="userName" value="<?=$user?>"></label>
        <label for="pass">Password<input type="password" name="pass" value="<?=$pass?>"></label>
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

        <!-- Fehlerausgabe -->
        <p class="error-message"><?=$errorMessage?></p>

        <!-- Positives Feedback -->
        <p class="success-message"><?=$successMessage?></p>
    
        <!-- Submit Button -->
        <input type="submit" class="btn" name="submit" value="Register" id="validate-submit"></input>
    </form>
</section>

    <!-- Footer -->
    <?php require('partials/footer.inc.html'); ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Other JS -->
    <script src="js/code.js"></script>
    <script src="js/register.js"></script>
</body>
</html>