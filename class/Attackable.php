<?php

    interface Attackable{
        public function attack(Character $target): string;
    }

?>