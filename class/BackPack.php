<?php

class Backpack {

    private array $weapons = [];
    private array $shields = [];
    private array $food = [];
  
    public function addWeapon(Weapon $weapon): void {
      $this->weapons[] = $weapon;
    }
  
    public function addShield(Shield $shield): void {
      $this->shields[] = $shield;
    }
  
    public function addFood(Food $food): void {
      $this->food[] = $food;
    }
  
    public function getArmory(): array {
      $armory = [];
      foreach ($this->weapons as $weapon) {
          $armory[] = $weapon->getName();
      }
      foreach ($this->shields as $shield) {
          $armory[] = $shield->getName();
      }
      return $armory;
  }
  
    public function getFood(): array {
      return $this->food;
    }
  
    //Retire l'arme de l'inventaire du joueur
    public function removeWeapon(Weapon $weapon): ?Weapon {
        $index = array_search($weapon, $this->weapons, true);
        if ($index !== false) {
          $removed = array_splice($this->weapons, $index, 1);
          return $removed[0];
        } else {
          return null;
        }
      }
  
    //Retire le bouclier de l'inventaire du joueur
    public function removeShield(Shield $shield): ?Shield {
        $index = array_search($shield, $this->shields, true);
        if ($index !== false) {
            $removedShield = $this->shields[$index];
            unset($this->shields[$index]);
            $this->shields = array_values($this->shields); 
            return $removedShield;
        } else {
            return null;
        }
    }
  
    //Retire la nourriture de l'inventaire du joueur
    public function removeFood(Food $food): ?Food {
        $index = array_search($food, $this->food, true);
        if ($index !== false) {
            $removedFood = $this->food[$index];
            unset($this->food[$index]);
            $this->food = array_values($this->food); // Ré-indexe les éléments du tableau
            return $removedFood;
        } else {
            return null;
        }
    }
  }


?>