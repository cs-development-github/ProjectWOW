<?php

class Item {
    private string $name;
    private float $length; //Longeur en cm de l'arme
    private float $weight; //Poid de l'arme en gr

    public function __construct(string $name, float $length, float $weight)
    {
        $this->name = $name;
        $this->length = $length;
        $this->weight = $weight;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function setlength($length) {
        $this->length = $length;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

}



?>