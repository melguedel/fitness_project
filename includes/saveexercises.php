<?php
session_start();
require('../prefs/credentials.php');
require('../class/Showexercise.php');

// Save workout
$showexercise = new Showexercise($pdo);
$exer = $showexercise->saveExercise("INSERT INTO saved_workouts (user_id, saved_exer) VALUES (:user_id, :exer_id)", ['user_id' => $_SESSION['userid'],
                                                                                                                     'exer_id' => $_POST['exer_id']]);

?>