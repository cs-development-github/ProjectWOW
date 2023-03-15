<?php

    require_once('character.php');
    

    class Monster extends Character implements Attackable{

        private MobSkill $mobSkill;

        public function __construct($name, $healPoints, $mobSkill)
        {
            parent::__construct($name, $healPoints, $mobSkill);
            $this->mobSkill = $mobSkill;
        }

        
    public function getMobSkill(): MobSkill {
        return $this->mobSkill;
    }

    public function setMobSkill($mobSkill) {
        $this->mobSkill = $mobSkill;
    }

    //L'auto attaque basique d'un mob
    public function attack(Character $target): string {
        $damage = $this->mobSkill->getDamagePoints();
        $target->takeDamage($damage);
        return "{$this->getName()} attaque {$target->getName()} avec {$this->mobSkill->getName()} et lui inflige {$damage} points de dégâts.";
    }
}

?>
