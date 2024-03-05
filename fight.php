<?php

// class Hero {
//     public $health;
//     public $stamina;
//     public $weapon;

//     public function __construct($health, $stamina, $weapon) {
//         $this->health = $health;
//         $this->stamina = $stamina;
//         $this->weapon = $weapon;
//     }
// }

// class Warrior extends Hero {
//     public function __construct($health, $stamina, $weapon) {
//         parent::__construct($health, $stamina, $weapon);
//     }
// }

// class Mage extends Hero {
//     public function __construct($health, $stamina, $weapon) {
//         parent::__construct($health, $stamina, $weapon);
//     }
// }

// class Archer extends Hero {
//     public function __construct($health, $stamina, $weapon) {
//         parent::__construct($health, $stamina, $weapon);
//     }
// }

// class Battle {
//     public static function fight($hero1, $hero2) {
//         while ($hero1->health > 0 && $hero2->health > 0) {
//             $hero1->health -= 10; 
//             $hero2->health -= 10;
//         }

//         if ($hero1->health <= 0) {
//             return get_class($hero2) . " переміг!";
//         } elseif ($hero2->health <= 0) {
//             return get_class($hero1) . " переміг!";
//         }
//     }
// }


// $warrior1 = new Warrior(100, 50, "Меч");
// $mage1 = new Mage(80, 70, "Магічний посох");

// echo Battle::fight($warrior1, $mage1);

class Hero {
    public $name;
    public $health;
    public $weapon;

    public function __construct($name, $health, $weapon) {
        $this->name = $name;
        $this->health = $health;
        $this->weapon = $weapon;
    }

    public function attack($opponent) {
        return "{$this->name} атакує за допомогою {$this->weapon}!";
    }

    public function defend() {
        return "{$this->name} захищається від нападів.";
    }
}

class Weapon {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}

class Battle {
    public $hero1;
    public $hero2;

    public function __construct($hero1, $hero2) {
        $this->hero1 = $hero1;
        $this->hero2 = $hero2;
    }

    public function fight() {
        while ($this->hero1->health > 0 && $this->hero2->health > 0) {
            echo $this->hero1->attack($this->hero2) . "<br>";
            $this->hero2->health -= rand(5, 20);
            echo "Здоров'я {$this->hero2->name}: {$this->hero2->health}<br>";
            if ($this->hero2->health <= 0) {
                echo "{$this->hero1->name} переміг!";
                break;
            }

            echo $this->hero2->attack($this->hero1) . "<br>";
            $this->hero1->health -= rand(5, 20);
            echo "Здоров'я {$this->hero1->name}: {$this->hero1->health}<br>";
            if ($this->hero1->health <= 0) {
                echo "{$this->hero2->name} переміг!";
                break;
            }
        }
    }
}

// Створення героїв і зброї
$warrior = new Hero("Воїн", 100, new Weapon("Меч"));
$mage = new Hero("Маг", 80, new Weapon("Магічний посох"));

// Початок битви
$battle = new Battle($warrior, $mage);
$battle->fight();
