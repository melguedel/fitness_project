<?php
require('../prefs/credentials.php');
require('../class/Showexercise.php');

// Hole Workout-Angaben aus DB und zeige sie als Cards auf index.php an
$showexercise = new Showexercise($pdo);
$exer = $showexercise->getExercise("SELECT * from saved_workouts
                                    JOIN exercise on exercise.id = saved_workouts.saved_exer
                                    WHERE user_id = :userid;",['userid' => $_POST['user_id']]);

// Iteriere durch Workouts
foreach($exer as $row){ 
    include("../includes/card-delete.php");
    }
?>