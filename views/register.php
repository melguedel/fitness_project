<?php
session_start();
require('../model/credentials.php');
require('../controller/checkUser.class.php');
$userInstance = new checkUser ($dbhost, $dbuser, $dbpassword, $dbname);

// Variable für Fehlerausgabe
// $errorMessage = "";

// Wurde der Submit-Button des Logins gedrückt?
if (isset ($_POST['login'])) {

    // Variablen erstellen
    $user = $_POST['userName'];
    $pass = $_POST['pass'];
    $errorMessage = $userInstance -> userKontrolle($user, $pass);
}
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $user = "";
    $pass = "";
    $errorMessage = "";
}


// Wurde der Submit-Button der Registration gedrückt?
if (isset ($_POST['submit'])) {

    // Variablen erstellen
    $usernameValue = $_POST['username'];
    $passwordValue = $_POST['password'];
    $emailValue = $_POST['email'];
    $errorMessage = $userInstance -> registrationsKontrolle($user, $pass);
}
else {
    // Falls noch nichts eingegeben wurde, alles auf leer setzen
    $usernameValue = "";
    $passwordValue = "";
    $emailValue = "";
    $errorMessage = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Meta Data -->
<?php require('../partials/head.inc.html'); ?>

<body>

<!-- Navigation -->
<?php require('../partials/topnav.inc.php');?>

<!-- Register and Login Forms -->
<section class="form-section">

    <!-- Login Form -->
    
    <form action="" class="login-form">
    
        <h2>Login</h2>
        <p class="register-info">to existing profile</p>
        <label for="userName">Username<input type="text" name="userName" value="<?=$user?>"></label>
        <label for="pass">Password<input type="password" name="pass" value="<?=$pass?>"></label>
    
        <!-- Fehlerausgabe -->
            <?php if(isset($errorMessage)){ ?>
                <p class="error-message"><?=$errorMessage?></p>
            <?php }?>
    
        <!-- Submit Button -->
        <input type="submit" value="Log me in!" name="login" class="btn">
    
    </form>
    
    <!-- Registration Form -->
    
    <form action="" class="register-form" method="POST">
    
        <h2>Register</h2>
        <p class="register-info">and create your own workout plan</p>
    
        <!-- Radiobuttons -->
        <div class="radio-btn">
                                
        <!-- Radiobutton Female -->
        <p>
            <label>
            <input name="radio-btn-group" value="female" type="radio" checked />
            <span>Female</span>
            </label>
        </p>
    
        <!-- Radiobutton Male -->
        <p>
            <label>
            <input name="radio-btn-group" value="male" type="radio" />
            <span>Male</span>
            </label>
        </p>
    
        <!-- Radiobutton Other -->
        <p>
            <label>
            <input name="radio-btn-group" value="other" type="radio" />
            <span>Other</span>
            </label>
        </p>
    
        </div>
    
        <!-- Eingabefelder -->
        <label for="username">Username<input type="text" name="username" value="<?=$usernameValue?>"></label>
    
        <label for="email">E-Mail<input type="email" name="email" value="<?=$emailValue?>"></label>
    
        <label for="password">Password<input type="password" name="password" value="<?=$passwordValue?>"></label>
    
        <!-- Terms and Conditions -->
        <p>
            <label>
                <input type="checkbox" class="filled" name="agb" />
                <span>Accept terms and conditions</span>
            </label>
        </p>

        <!-- Fehlerausgabe -->
        <?php if(isset($errorMessage)){ ?>
                <p class="error-message"><?=$errorMessage?></p>
        <?php }?>
    
        <!-- Submit Button -->
        <input type="submit" class="btn" name="submit" value="Register"></input>
    
    </form>

</section>

<!-- Footer -->

<?php require('../partials/footer.inc.html'); ?>
    
    <script src="../js/code.js"></script>
</body>
</html>