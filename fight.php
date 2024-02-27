<?php

class Hero {
    public $health;
    public $stamina;
    public $weapon;

    public function __construct($health, $stamina, $weapon) {
        $this->health = $health;
        $this->stamina = $stamina;
        $this->weapon = $weapon;
    }
}

class Warrior extends Hero {
    public function __construct($health, $stamina, $weapon) {
        parent::__construct($health, $stamina, $weapon);
    }
}

class Mage extends Hero {
    public function __construct($health, $stamina, $weapon) {
        parent::__construct($health, $stamina, $weapon);
    }
}

class Archer extends Hero {
    public function __construct($health, $stamina, $weapon) {
        parent::__construct($health, $stamina, $weapon);
    }
}

class Battle {
    public static function fight($hero1, $hero2) {
        while ($hero1->health > 0 && $hero2->health > 0) {
            $hero1->health -= 10; 
            $hero2->health -= 10;
        }

        if ($hero1->health <= 0) {
            return get_class($hero2) . " переміг!";
        } elseif ($hero2->health <= 0) {
            return get_class($hero1) . " переміг!";
        }
    }
}


$warrior1 = new Warrior(100, 50, "Меч");
$mage1 = new Mage(80, 70, "Магічний посох");

echo Battle::fight($warrior1, $mage1);
