<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == "Logged in!") {
	$output = "<p>Status: ".$_SESSION['status']."</p>\n";
} else {
	// Umleitung zurück auf Login, da Session nicht gelesen werden konnte
	header('Location: register.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="../scss/main.css">

<!-- Meta Data -->
<?php require('../partials/head.inc.html'); ?>

<body>

<!-- Navigation -->
<?php require('../partials/topnav.inc.php');?>

<!-- Main Content of dashboard -->

<main class="dashboard-main">

<!-- Profile of User -->

<h1>Welcome back <?=$user?>!</h1>

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

    <article class="workout-title">
        <h2>Your saved exercises</h2>
        <span class="horizontal-rule"></span>
    </article>
    
    <article class="workout-title">
        <h3>Abdomen</h3>
        <span class="horizontal-rule"></span>
    </article>
    
    <article class="workout-title">
        <h3>Arms</h3>
        <span class="horizontal-rule"></span>
    </article>

    <article class="workout-title">
        <h3>Glutes</h3>
        <span class="horizontal-rule"></span>
    </article>

    <article class="workout-title">
        <h3>Legs</h3>
        <span class="horizontal-rule"></span>
    </article>

    <article class="workout-title">
        <h3>Yoga</h3>
        <span class="horizontal-rule"></span>
    </article>
    
    <a href="logout.php" class="btn logout-btn">Logout</a>

</section>


<!-- <a href="logout.php" class="btn logout-btn">Logout</a> -->

</main>

<!-- Footer -->
<?php require('../partials/footer.inc.html'); ?>
    
</body>
</html>