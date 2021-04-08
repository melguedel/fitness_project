<?php
require('class/Bmi.php');

// Klasse aufrufen um BMI zu berechnen
$resultat = 
?>

<!DOCTYPE html>
<html lang="en">
<!-- Meta Data -->
<?php require('partials/head.inc.html'); ?>
<!-- Datenbank-Verbindung -->
<?php require('class/Credentials.php'); ?>
<body>
<!-- Fixed top Navigation -->
<nav class="top-nav">
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="register.php" class="login">Login</a></li>
    </ul>
</nav>
<!--Sidebar Navigation with Hamburger Menu -->
<i class="fas fa-bars" onclick="openMenu()"></i>  
<nav class="side-nav">
    <i class="fas fa-times" onclick="closeMenu()"></i>
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="register.php" class="login">Login</a></li>
    </ul>
</nav>
<!-- BMI Calculator -->
<form action="" class="login-form" id="calculator" method="GET">
    <h2>BMI Calculator</h2>
        <p class="register-info">Calculate your Body Mass Index</p>
        <label for="height">Height<input type="text" name="body-height" value="<?=$height?>"></label>
        <label for="weight">Weight<input type="text" name="body-weight" value="<?=$weight?>"></label>
        <!-- Fehlerausgabe -->
        
        <!-- Submit Button -->
        <input type="submit" value="Calculate BMI!" name="calculate" class="btn">
</form>
<!-- Footer -->
<?php require('partials/footer.inc.html'); ?>
<!-- Javascript -->
    <script src="js/code.js"></script>
</body>
</html>