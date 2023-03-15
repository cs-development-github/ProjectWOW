<?php

class Food extends Item{
    private $effect;

    public function __construct($name, $weight, $value, $effect) {
        parent::__construct($name, $weight, $value);
        $this->effect = $effect;
    }

    public function getEffect() {
        return $this->effect;
    }

    //Permet d'utiliser des objets et change les stats des joueurs
    //NON implémenter
    public function use($character) {
        foreach ($this->effect as $effect => $value) {
            switch ($effect) {
                case 'stamina':
                    $character->restoreStamina($value);
                    break;
                case 'health':
                    $character->restoreHealth($value);
                    break;
                case 'strength':
                    $character->multiplyStrength($value);
                    break;
            }
        }
    }
}

?>
