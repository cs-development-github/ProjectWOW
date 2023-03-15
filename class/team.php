<?php

    class Team {
        private $name;
        private $characters = [];

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function getName(): string {
            return $this->name;
        }
    
        public function setName($name) {
            $this->name = $name;
        }


        //Ajout un personnage hero ou monstre a l'équipe
        public function addCharacter($character){
            $this->characters[] = $character;
        }

        public function getCharacters(){
            return $this->characters;
        }

        //Permet de voir combien de personnages sont encore en vie dans l'équipe
        public function getNumberOfCharactersAlive(){
            $numberOfCharactersAlive =0;
            foreach ($this->characters as $character){
                if ($character->getLifePoint() > 0){
                    $numberOfCharactersAlive++;
                }
            }
        return $numberOfCharactersAlive;
        }

        //Prend le personnage suivant
        public function getNextCharacter() {
            $characterAlive = false;
            $character = null;
            // Tourne tant qu'il n'as pas trouver un personne en vie
            while (!$characterAlive) {
                $character = $this->characters[rand(0, count($this->characters) - 1)];
                if ($character->getLifePoint() > 0) {
                    $characterAlive = true;
                }
            }
            return $character;
        }

        //Vérifie si le perso est la :) 
        public function hasCharacter(Character $character): bool
        {
            foreach ($this->characters as $c) {
                if ($c === $character) {
                    return true;
                }
            }
            return false;
        }

        //Choisis un perso aléatoirement
        public function getRandomCharacter(): ?Character
        {
            $numCharacters = count($this->characters);
            if ($numCharacters > 0) {
                $index = rand(0, $numCharacters - 1);
                return $this->characters[$index];
            }
            return null;
        }

        //Supprimer un perso 
        public function removeCharacter(Character $character): bool
        {   
        $index = array_search($character, $this->characters, true);
        if ($index !== false) {
            array_splice($this->characters, $index, 1);
            return true;
        }
        return false;
        }

        //Vérifie si l'équipe est vide, autrement dit si tout le monde est mort pour définir la condition de victoire
        public function isEmpty(): bool
        {
            return count($this->characters) === 0;
        }
    }
?>
