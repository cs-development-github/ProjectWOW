<?php
    require_once('./class/character.php');
    require_once('./class/weapon.php');
    require_once('./class/hero.php');
    require_once('./class/monster.php');
    require_once ('./class/team.php');
    require_once('./class/mobSkill.php');
    require_once('./class/item.php');
    require_once('./class/shield.php');
    require_once('./class/Food.php');
    require_once('./class/BackPack.php');

    //Création des éhéros
    $teamHeros = new Team('héros');

    //Crée une liste de prénom pour les héros
    $herosName = array('Alice', 'Bob', 'Charlie', 'David', 'Emma', 'Fabien', 'Gaspard', 'Hélène', 'Isaac', 'Julie', 'Kévin', 'Lucie', 'Marc', 'Nina', 'Oscar');
    //Crée des armes
    $weapons = [
        new Weapon('Épée de lumière',80, 1600, 25),
        new Weapon('Épée de glace', 80, 1600, 30),
        new Weapon('Épée de feu', 80, 1600, 30),
        new Weapon('Marteau de Thor' , 25 , 20000, 50 ),
        new Weapon('Marteau de guerre céleste' , 25 , 15000, 55 ),
        new Weapon('Lance du dragon', 160 , 726, 35  ),
        new Weapon('Baguette des éléments' , 33 , 100, 25 ),
        new Weapon('Hache de guerre', 69 , 1000 , 30 ),
        new Weapon('Arc de la lune' , 124 , 5000, 52 ),
    ];

    $shields = [
        new shield("Bouclier d'Hyrule", 2, 45, 90),
        new shield("Bouclier de la Tortue", 10, 75, 85),
        new shield("Bouclier de la Licorne", 5, 70, 80),
        new shield("Bouclier de feu", 3, 50, 75),
        new shield("Bouclier de bois", 2, 60, 50),
        new shield("Bouclier d'or", 4, 55, 70),
    ];

    //Création de la nouriture
    $foods = [
        new Food('Apple', 0.1, 1, ['stamina' => 10]),
        new Food('Steak', 0.5, 5, ['strength' => 1.5]),
        new Food('Potion de heal', 0.5, 5, ['heal' => 20]),
        new Food('Potion de force', 0.5, 5, ['strength' => 3]),
        new Food('Potion de stamina', 0.5, 5, ['stamina' => 100]),
    ];

    //Mélange les armes et les prénoms
    shuffle($weapons);
    shuffle($herosName);
    shuffle($shields);


    $itemsForBackPack = [
        'weapons' => $weapons,
        'shields' => $shields,
        'foods' => $foods,
    ];


    //Choisis le nombre de perso par équipe
    $teamCount = rand(2,7);

    for ($i = 0; $i < $teamCount; $i++){
        
        $backpack = new Backpack();
        $quantities = [
            'weapons' => 1,
            'shields' => 1,
            'foods' => 3,
        ];

        //Beugé de fous mais c'est censé faire une attribution pour remplir la saccoche
        foreach ($quantities as $type => $quantity) {
            for ($j = 0; $j < $quantity; $j++) {
                switch ($type) {
                    case 'weapons':
                        $randomWeapon = $weapons[array_rand($weapons)];
                        $backpack->addWeapon($randomWeapon);
                        break 1;
                    case 'shields':
                        $randomShield = $shields[array_rand($shields)];
                        $backpack->addShield($randomShield);
                        break 1;
                    case 'foods':
                        $randomFood = $foods[array_rand($foods)];
                        $backpack->addFood($randomFood);
                        break 1;
                    default:
                        echo("ECHEC");
                }
            }
        }

        $prenom = array_pop($herosName); //Retire le dernier prénom de la liste
        $pointsDeVie = rand(50, 200);
        $stamina = rand(10, 50);
        $shield =  array_pop($shields);
        $arme = array_pop($weapons); //Retire la dernière arme de la liste
        $teamHeros->addCharacter(new Hero($prenom, $pointsDeVie, $arme, $stamina, $backpack , $shield )); //Crée le héros
    }

    //Créations des montres
    $teamMonsters = new Team('monstres');

    $MobList = array(
        new Monster('Le murloc', rand(100,150), new MobSkill('Lance', rand(10,35) )),
        new Monster('Gollem des éléments', rand(250,650), new MobSkill('Giffle', rand(10,20) )),
        new Monster('Dragon de glace', rand(250,350), new MobSkill('Souffle glacé', rand(35,55) )),
        new Monster('Dragon de feu', rand(250,350), new MobSkill('Souffle brulant', rand(35,55) )),
        new Monster('Esprit de lumière', rand(10,35), new MobSkill('Éclat', 1 )),
        new Monster('E.T', rand(20,100), new MobSkill('Téléphone maison', rand(15,20) )),
        new Monster('Sarcosuchus ', rand(200,700), new MobSkill('Morsure', rand(40,60) )),
        new Monster('Dodu le dodo ', 800, new MobSkill('Coup de bec', 8 , )),
    );

    shuffle($MobList);//Mélange la liste des montres

    for ($i=0; $i < $teamCount; $i++){
        $teamMonsters->addCharacter(array_pop($MobList));//Retire le dernier monstre de la liste
    }

    //Montre les héros

    foreach ($teamHeros->getCharacters() as $hero) {

        echo("<br>");
        echo("<h1>". $hero->getName() ."</h1>");
        echo("<br>");
        echo "Points de vie : " . $hero->getLifePoint() . "\n";
        echo("<br>");
        echo "Arme : " . $hero->getWeapon()->getName() . "\n";
        echo("<br>");
        echo "Bouclier : " . $hero->getShield()->getName() . "\n";
        echo("<br>");
        echo "Sac à dos : \n";
    
        $backpack = $hero->getBackpack();
        foreach ($backpack->getArmory() as $weapon) {
            echo "- " . $weapon . "\n";
        }
    
        foreach ($backpack->getArmory() as $shield) {
            echo "- " . $shield . "\n";
        }
    
        foreach ($backpack->getFood() as $food) {
            echo "- " . $food->getName() . "\n";
        }
    
        echo "\n";
    }

?>