<?php

require_once('Attackable.php');

class Character implements Attackable{
    private string $name; //Nom du personnage
    private int $lifePoint; //Point de vie du personnage

    public function __construct(string $name, int $lifePoint){
        $this->name = $name;
        $this->lifePoint = $lifePoint;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLifePoint(): int {
        return $this->lifePoint;
    }

    public function setLifePoint($lifePoint) {
        $this->lifePoint = $lifePoint;
    }
    
    //Fonction de jeu pour les tours 

    //Distribue les dmg que le joueur ou le mob recoit
    public function takeDamage($damage) {
        $this->lifePoint -= $damage;
        if ($this->lifePoint < 0) {
            $this->lifePoint = 0;
        }
    }

    //Check si il est mort
    public function isDead(): bool
    {
        return $this->lifePoint <= 0;
    }

    public function attack(Character $target): string {
        // méthode vide, à implémenter dans les classes héritant de Character
    return "";
    }
}
?>