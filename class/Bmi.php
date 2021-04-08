<?php

/* Klasse, um den Userinput als BMI zu berechnen */
class BodyMassIndex {

    public function calculateBmi($height, $weight) {
        $resultat = $height / ($weight * $weight);
        return $resultat;
    }
}