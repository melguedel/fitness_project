<?php
session_start();
require('class/Credentials.php');
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
// else {
//     header('Location: register.php');
// }
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
        <li><a href="logout.php" class="home"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>
<!--Sidebar Navigation with Hamburger Menu -->
<i class="fas fa-bars" onclick="openMenu()"></i>  
<nav class="side-nav">
    <i class="fas fa-times" onclick="closeMenu()"></i>
    <ul>
        <li><a href="logout.php" class="home"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>
<!-- Main Content of dashboard -->
<main class="dashboard-main">
<!-- Profile of User -->
<h1>Welcome back <?=$showInfo['username']?>!</h1>
<!-- Section User Profil -->
<section class="user-profile">
    <!-- Profile Picture -->
    <article class="profile-picture">
        <img src="../img/beach.jpg" alt="woman on beach">
    </article>
    <!-- Info about User -->
    <article class="user-info">
        <p>Username: <?=$user?></p>
        <p>Birthday:<?=$birthday?></p>
        <p>Height:<?=$height?></p>
        <p>Weight:<?=$weight?></p>
    </article>
</section>
<!-- Show saved exercises of user in this section -->
<section class="workout-section">
    <!-- Gespeicherte Workouts ausgeben -->
    <article class="workout-title">
        <h2>Your saved exercises</h2>
        <span class="horizontal-rule"></span>
    </article>
    <!-- Titel der Übungsart -->
    <article class="workout-title">
        <h3>Abdomen</h3>
        <span class="horizontal-rule"></span>
    </article>
    <!-- Titel der Übungsart -->
    <article class="workout-title">
        <h3>Arms</h3>
        <span class="horizontal-rule"></span>
    </article>
    <!-- Titel der Übungsart -->
    <article class="workout-title">
        <h3>Glutes</h3>
        <span class="horizontal-rule"></span>
    </article>
    <!-- Titel der Übungsart -->
    <article class="workout-title">
        <h3>Legs</h3>
        <span class="horizontal-rule"></span>
    </article>
    <!-- Titel der Übungsart -->
    <article class="workout-title">
        <h3>Yoga</h3>
        <span class="horizontal-rule"></span>
    </article>
</section>
<!-- End of Main Section -->
</main>
<!-- Footer -->
<?php require('partials/footer.inc.html'); ?>
<!-- Javascript -->
<script src="js/menu.js"></script>
</body>
</html>