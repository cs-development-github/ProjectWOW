<?php

require_once('item.php');

class Shield extends Item{

    private int $damageReduction; //Degats de l'arme en point

    public function __construct($name, $length, $weight, $damageReduction)
    {
        parent::__construct($name, $length, $weight, $damageReduction);
        $this->damageReduction = $damageReduction;
    }

    public function getDamageReduction(): int {
        return $this->damageReduction;
    }

    public function setDamageReduction($damagePoints) {
        $this->damageReduction = $damagePoints;
    }

}

?>