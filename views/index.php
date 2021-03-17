
<!DOCTYPE html>
<html lang="en">

<!-- Meta Data -->
<?php require('../partials/head.inc.html'); ?>

<body>

<!-- Navigation -->
<?php require('../partials/topnav.inc.php');?>

<!-- Header -->

<header class="home-header" id="home">
    <img src="../img/weightlifting.jpg" alt="person lifting weights">
        <article class="header-side-article">
            <h1>WORKOUTS</h1>
            <p>...for everyday. Do you want to get ready for summer? Or just stay fit and healthy? Put together your own workouts with the select tool below. Register, create your own profile and save your favourite exercises. Get closer to your dream body now.</p>
            <a href="register.php" class="btn">Sign up!</a>
        </article>
</header>


<!-- Main -->

    <section id="about">
        <h2>What is this site about?</h2>
        <p>Do you want workout a specific area in your body and need the right exercise for it? Check the section below and choose the area you want to find specific exercises for your needs.</p>
    </section>

    <section id="select-bodypart">
        <h2>Choose</h2>
        <p>the bodypart that you want to exercise</p>

        <select name="choose" class="select-options">
            <option value="">Abdomen</option>
            <option value="">Arms</option>
            <option value="">Booty</option>
            <option value="">Legs</option>
            <option value="">Stretching</option>
            <!-- Submit Button -->
        </select>
        <input type="submit" value="find exercise" name="find" class="btn">

    </section>

    <section id="contact">
        <h2>Contact</h2>
    </section>
    
<!-- Footer -->

<?php require('../partials/footer.inc.html'); ?>

    <script src="../js/code.js"></script>
</body>
</html>