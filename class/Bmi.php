<?php

/* Klasse, um den Userinput als BMI zu berechnen */
class BodyMassIndex {
    public function calculateBmi($height, $weight) {
        // BMI Berechnungsformel
        $bmi = $weight / ($height * $height);
        return $bmi;
    }
};