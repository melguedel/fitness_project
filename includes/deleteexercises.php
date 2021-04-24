<?php
session_start();
require('../prefs/credentials.php');
require('../class/Showexercise.php');

// Delete workout
$showexercise = new Showexercise($pdo);
$exer = $showexercise->deleteExercise("DELETE FROM saved_workouts WHERE user_id = :user_id AND saved_exer = :exer_id;", ['user_id' => $_SESSION['userid'],
                                                                                                                'exer_id' => $_POST['exer_id']]);
?>