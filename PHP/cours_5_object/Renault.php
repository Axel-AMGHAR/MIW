<?php

class Renault extends Vehicule {

    /**
     * 1km parcouru consomme 0.5L d'essence. Pas d'accident quand on recule
     * @return bool
     */
    public function reculer(){

        if (!$this->erreur) {
            if ($this->jauge > 0) {
                $this->kmParcouru++;
                $this->jauge = $this->jauge - 0.5;
                return true;
            } else {
                $this->erreur .= 'Panne d\'essence!';
                return false;
            }
        }
    }

    /**
     * 1km parcouru consomme 0.5L d'essence. Un véhicule Renault à 3 chance sur 100 d'avoir un accident
     * @return bool
     */
    public function avancer(){
        if (strlen($this->erreur) == 0) {
            if ($this->jauge > 0) {
                $this->kmParcouru++;
                $this->jauge = $this->jauge - 0.5;
                if (mt_rand(1, 100) <= 3) {
                    $this->erreur .= 'Accident!';
                    return false;
                }
                return true;
            } else {
                $this->erreur .= 'Panne d\'essence!';
                return false;
            }
        } else
            return true;
    }
}