<?php

class MobSkill{
    private string $name;
    private int $damagePoints;

    public function __construct(string $name, int $damagePoints)
    {
        $this->name = $name;
        $this->damagePoints = $damagePoints;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDamagePoints(): int {
        return $this->damagePoints;
    }

    public function setDamagePoints($damagePoints) {
        $this->damagePoints = $damagePoints;
    }
}
?>