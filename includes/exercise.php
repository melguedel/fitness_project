<?php
require('../prefs/credentials.php');
require('../class/Showexercise.php');

// Hole Workout-Angaben aus DB und zeige sie als Cards auf index.php an
$showexercise = new Showexercise($pdo);
$exer = $showexercise->getExercise("SELECT * from `exercise` WHERE exer_category = :cat",['cat' => $_POST['value']]);

// Iteriere durch Workouts
foreach($exer as $row){ 
    include("../includes/card.php");
    }
?>