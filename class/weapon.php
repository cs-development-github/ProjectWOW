<?php

require_once('item.php');

class Weapon extends Item{

    private int $damagePoints; //Degats de l'arme en point

    public function __construct($name, $length, $weight, $damagePoints)
    {
        parent::__construct($name, $length, $weight, $damagePoints);
        $this->damagePoints = $damagePoints;
    }

    public function getDamagePoints(): int {
        return $this->damagePoints;
    }

    public function setDamagePoints($damagePoints) {
        $this->damagePoints = $damagePoints;
    }

}

?>