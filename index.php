<?php 
// Datenbank-Verbindung und Klassen aufrufen
require('prefs/credentials.php');
require('class/Showexercise.php');

// Instanziere Klasse
$showexercise = new Showexercise($pdo);

// Wurde der Button gedrückt, suche Workout-Übungen in DB
if (isset($_POST['find'])) {
    $exer_cat = $_POST['choose'];
    $exer = $showexercise->getExercise("SELECT * FROM `exercise` WHERE exer_category = :cat",['cat' => $exer_cat]);
} 
?>
<!DOCTYPE html>
<html lang="en">
<!-- Meta Data -->
<?php require('partials/head.inc.html'); ?>
<body>
<!-- Navigation -->
<?php require('partials/topnav.inc.html');?>
<!-- Header -->
<header class="home-header" id="home">
    <img src="img/weightlifting.jpg" alt="person lifting weights">
        <article class="header-side-article">
            <h1>WORKOUTS</h1>
            <p>...for everyday. Do you want to get ready for summer? Or just stay fit and healthy? Put together your own workouts with the select tool below. Register, create your own profile and save your favourite exercises. Get closer to your dream body now.</p>
            <a href="register.php" class="btn">Sign up!</a>
        </article>
</header>
<!-- About -->
    <section id="about">
        <h2>What is this site about?</h2>
        <p>Do you want workout a specific area in your body and need the right exercise for it? Check the section below and choose the area you want to find exercises that fit your needs.</p>
        <p>Want to feel better, have more energy and even add years to your life? Just exercise. The health benefits of regular exercise and physical activity are hard to ignore. Everyone benefits from exercise, regardless of age, sex or physical ability. Regular trips to the gym are great, but don't worry if you can't find a large chunk of time to exercise every day. Any amount of activity is better than none at all. To reap the benefits of exercise, just get more active throughout your day — take the stairs instead of the elevator or rev up your household chores. Consistency is key. Winded by grocery shopping or household chores? Regular physical activity can improve your muscle strength and boost your endurance.
            Exercise delivers oxygen and nutrients to your tissues and helps your cardiovascular system work more efficiently. And when your heart and lung health improve, you have more energy to tackle daily chores. Struggling to snooze? Regular physical activity can help you fall asleep faster, get better sleep and deepen your sleep. Just don't exercise too close to bedtime, or you may be too energized to go to sleep.</p>
    </section>
    <!-- Select Section -->
    <section id="select-bodypart" class="show-workouts">
        <h2>Choose</h2>
        <p>the bodypart that you want to exercise</p>
        <!-- Selector für bestimmte Übungen -->
        <form class="exercise-form" method="POST">
        <select id="exercise-option" name="choose" class="select-options">
            <option value="abdomen" name="abdomen">Abdomen</option>
            <option value="arms" name="arms">Arms</option>
            <option value="glutes" name="glutes">Glutes</option>
            <option value="legs" name="legs">Legs</option>
            <option value="yoga" name="yoga">Yoga</option>
        </select>  
        <!-- Submit Button -->
        <input type="submit" value="Show exercises!" name="find" class="btn">
        </form>
        <!-- Zeige gewählte Workout-Kategorie in Cards an -->
        <div class="workout-row"></div> 
    </section>
<!-- Contact Section -->
    <section id="contact">
        <h2>Contact</h2>
        <p>Or do you want to join our gym? Visit our studio and sip a protein shake with us!</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9264.664589529895!2d8.007038188976836!3d46.34158006576823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478f6f16d1ddb1cf%3A0x832ff821ca04e2b5!2sBitsch!5e0!3m2!1sde!2sch!4v1617825360663!5m2!1sde!2sch" title="google map" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <article>
                <p>The Schredderstube</p>
                <p>Rippedweg 444</p>
                <p>3982 Bitsch</p>
            </article>
    </section>
<!-- Footer -->
<?php require('partials/footer.inc.html'); ?>
<!-- Javascript -->
    <script src="js/code.js"></script>
    <script src="js/menu.js"></script>
    <script>
        $(document).ready(function(){
        // Neuladen der Seite verhindern
        $(".exercise-form").submit(function(e) {
            e.preventDefault();
            // Variablen erstellen und Helferdatei aufrufen
            let choosenOption = $("#exercise-option :selected").val();    
            $(".workout-row").load("partials/exercise.php", { value: choosenOption });
            });
          
        });
    </script>
</body>
</html>