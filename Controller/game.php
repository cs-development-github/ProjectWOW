<?php

require_once('./Controller/data.php');

    $heroesEliminated = false;
    $monstersEliminated = false;
    //Récupérer les mobs et les héros et les rassemble en un seul tableau 
    $allCharacters = array_merge($teamHeros->getCharacters(), $teamMonsters->getCharacters());
    //Mélange le tableau 
    $randomOrder = $allCharacters;
    shuffle($randomOrder);

    $turn = 1;
    //Illuste dans quel ordres les personnes vont houer
    echo("<h1> Ordre des tours </h1>");
    echo '<ul>';
    foreach ($randomOrder as $character) {
        echo '<li>' . $character->getName() . '</li>';
    }
    echo '</ul>';

    // Tant qu'aucune équipe n'est éliminée
    while (!$heroesEliminated && !$monstersEliminated) {
        // Parcourt la liste des personnages dans l'ordre aléatoire

        echo "<h1>Tour : {$turn} </h1> ";

        foreach ($randomOrder as $character) {
            if ($teamHeros->hasCharacter($character)) {

                $randomMonster = $teamMonsters->getRandomCharacter();
                $monstersEliminated = doAttack($character, $randomMonster, $teamMonsters);

                if ($monstersEliminated) {
                    break 2; // Sort de la boucle principale
                }

            } elseif ($teamMonsters->hasCharacter($character)) {

                $randomHero = $teamHeros->getRandomCharacter();
                $heroesEliminated = doAttack($character, $randomHero, $teamHeros);
                
                if ($heroesEliminated) {
                    break 2; // Sort de la boucle principale
                }
            }
        
        }
        $turn++;
    }

    function doAttack($attacker, $defender, $defenderTeam) {
        $damage = $attacker->attack($defender);
        echo $damage . '</br>';
    
        if ($defender->isDead()) {
            echo $defender->getName() . '<span style="color: red;"> est mort. </span> </br>';
            $defenderTeam->removeCharacter($defender);
        }
    
        if ($defenderTeam->isEmpty()) {
            echo 'L\'équipe des ' . ($defenderTeam->getName()) . ' a été éliminée ! </br>';
            return true;
        }
    
        return false;
    }


?>