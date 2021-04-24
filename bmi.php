<?php
// Datenbank-Verbindung und Klassen aufrufen
require('class/Bmi.php');
require('class/Errorhandling.php');
// Instanziere Klassen
$bmi = new BodyMassIndex();
$sanitize = new Errorhandler();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Meta Data -->
<?php require('partials/head.inc.html'); ?>
<body>
<!-- Fixed top Navigation -->
<nav class="top-nav">
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="register.php">Login</a></li>
    </ul>
</nav>
<!--Sidebar Navigation with Hamburger Menu -->
<i class="fas fa-bars" onclick="openMenu()"></i>  
<nav class="side-nav">
    <i class="fas fa-times" onclick="closeMenu()"></i>
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="register.php">Login</a></li>
    </ul>
</nav>
<!-- BMI Calculator Form -->
<form action="" class="login-form" id="calculator" method="GET" style="margin: 7em auto 2em auto;">
    <h2>BMI Calculator</h2>
        <p class="register-info">Calculate your Body Mass Index</p>
        <label for="height">Height<input type="text" name="body-height" placeholder="Write 175cm as 1.75"></label>
        <label for="weight">Weight<input type="number" name="body-weight" placeholder="Write Kilograms"></label>
        <!-- Submit Button -->
        <input type="submit" value="Calculate BMI!" name="calculate" class="btn">
</form>
<?php
// Wurde der Submit Button gedrückt:
if (isset($_GET['calculate'])) {
    // Variablen definieren und Input reinigen
    $height = $sanitize->sanitizeInput($_GET['body-height']);
    $weight = $sanitize->sanitizeInput($_GET['body-weight']);
    // Methode aufrufen
    $bmi = $bmi->calculateBMI($height, $weight);
    // Ausgabe an den User mit Info
    if ($bmi < 16) {
            $info = "you are extremely underweight!";
        } else if ($bmi >= 16 && $bmi < 17) {
            $info = "you are underweight!";
        } else if ($bmi >= 17 && $bmi < 18.5) {
            $info = "you are slightly underweight!";
        } else if ($bmi >= 18.5 && $bmi < 25) {
            $info = "Congratulations, your weight is normal!";
        } else if ($bmi >= 25 && $bmi < 30) {
            $info = "you are overweight.";
        } else if ($bmi >= 30 && $bmi < 35) {
            $info = "you are obese.";
        } else if ($bmi >= 35 && $bmi < 40) {
            $info = "you are extremely obese!";
        }  else if ($bmi > 40) {
            $info = "..Oh no! You broke the scale!";
        }
        echo "<p class=\"neutral-message\" style=\"margin: 3em auto 2em auto; text-align: center;\">Your BMI Value is: ".$bmi." and ".$info."</p>\n";
    };
?>
<!-- Footer -->
<?php require('partials/footer.inc.html'); ?>
<!-- Javascript -->
    <script src="js/menu.js"></script>
</body>
</html>