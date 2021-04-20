<?php
session_start();
require('prefs/Credentials.php');
require('class/User.php');
// User ID in Variable speichern
$id = $_SESSION['userid'];
// Wenn Status auf true gesetzt ist, Namen von eingeloggtem User anzeigen
if ($_SESSION['status'] == true) {
    // Neue Instanz von Userklasse
    $userInfo = new User($pdo);
    // Methode aufrufen
    $showInfo = $userInfo->showInfos($id);
 } 
else {
    header('Location: register.php');
    echo "Could not log in!";
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- CSS Stylesheet -->
<link rel="stylesheet" href="scss/main.css">
<!-- Meta Data -->
<?php require('partials/head.inc.html'); ?>
<body>
<!-- Fixed top Navigation -->
<nav class="top-nav">
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="logout.php" class="home"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>
<!--Sidebar Navigation with Hamburger Menu -->
<i class="fas fa-bars" onclick="openMenu()"></i>  
<nav class="side-nav">
    <i class="fas fa-times" onclick="closeMenu()"></i>
    <ul>
        <li><a href="index.php" class="home">Home</a></li>
        <li><a href="logout.php" class="home"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>
<!-- Willkommenstext mit Usernamen anzeigen -->
<h1 class="dashboard-main">Welcome back <?=$showInfo['username']?>!</h1>
<!-- Gespeicherte Workouts ausgeben -->
<section class="workout-section">
    <article class="workout-title">
        <h2>Your saved exercises</h2>
        <span class="horizontal-rule"></span>
    </article>
</section>
<!-- Footer -->
<?php require('partials/footer.inc.html'); ?>
<!-- Javascript -->
<script src="js/menu.js"></script>
</body>
</html>