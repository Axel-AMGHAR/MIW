<?php

class Bmw extends Vehicule {

    /**
     * 3km parcouru consomme 2L d'essence. Pas d'accident quand on recule
     * @return bool
     */
    public function reculer(){
        if($this->jauge>0){
            $this->kmParcouru += 3;
            $this->jauge -= 2;
            return true;
        }else{
            $this->erreur .= 'Panne d\'essence!';
            return false;
        }
    }

    /**
     * 3km parcouru consomme 2L d'essence. Un véhicule Bmw à 5 chance sur 100 d'avoir un accident
     * @return bool
     */
    public function avancer(){
        if (strlen($this->erreur) == 0) {
            if ($this->jauge > 0) {
                $this->kmParcouru += 3;
                $this->jauge -= -2;
                if (mt_rand(1, 100) <= 5) {
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