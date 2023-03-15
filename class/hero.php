<?php

require_once('character.php');
require_once('Attackable.php');
require_once('Weapon.php');
require_once('BackPack.php');

class Hero extends Character implements Attackable
{

    private int $stamina;
    private Weapon $weapon;
    private Shield $shield;
    private BackPack $backpack;

    public function __construct(string $name, int $healthPoints, Weapon $weapon, int $stamina, Backpack $backpack, Shield $shield)
    {
        parent::__construct($name, $healthPoints);
        $this->weapon = $weapon;
        $this->stamina = $stamina;
        $this->backpack = $backpack;
        $this->shield = $shield;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getShield(): Shield
    {
        return $this->shield;
    }

    public function setShield(Shield $shield): void
    {
        $this->shield = $shield;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): void
    {
        $this->stamina = $stamina;
    }

    public function getBackpack(): BackPack
    {
        return $this->backpack;
    }

    public function setBackpack(BackPack $backpack): void
    {
        $this->backpack = $backpack;
    }

    public function attack(Character $target): string
    {
        $actionCost = ($this->getWeapon()->getLength() * $this->getWeapon()->getWeight()) / 100000;
        if ($this->stamina > $actionCost) {
            $this->stamina -= $actionCost;
            $damage = $this->weapon->getDamagePoints();
            $target->takeDamage($damage);
            return "{$this->getName()} attaque {$target->getName()} avec {$this->weapon->getName()} et inflige {$damage} dégats. 
            Sa stamina est de : {$this->stamina}. Et il a {$this->getLifePoint()} PDV";
        } else {
            return "{$this->getName()} Pas assez de stamina pour attaqué.";
        }
    }

    public function addItemToBackpack(Item $item): void
    {
        if ($item instanceof Weapon) {
            $this->backpack->addWeapon($item);
        } elseif ($item instanceof Shield) {
            $this->backpack->addShield($item);
        } elseif ($item instanceof Food) {
            $this->backpack->addFood($item);
        } else {
            throw new Exception("Invalid item type.");
        }
    }

    public function removeItemFromBackpack(Item $item): void
    {
        if ($item instanceof Weapon) {
            $this->backpack->removeWeapon($item);
        } elseif ($item instanceof Shield) {
            $this->backpack->removeShield($item);
        } elseif ($item instanceof Food) {
            $this->backpack->removeFood($item);
        } else {
            throw new Exception("Invalid item type.");
        }
    }
}