<?php

class Hero {
    public $health;
    public $stamina;
    public $weapon;
    public $baseDamage;

    public function __construct($health, $stamina, $baseDamage) {
        $this->health = $health;
        $this->stamina = $stamina;
        $this->baseDamage = $baseDamage;
    }

    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }

    public function sayOnWin() {
        $phrases = ["Перемога!", "Я - найкращий!", "Ніхто мене не зупинить!"];
        return $phrases[array_rand($phrases)];
    }

    public function sayOnLose() {
        $phrases = ["Наступного разу мені пощастить!", "Я повернуся сильнішим!", "Поразка - це тільки початок!"];
        return $phrases[array_rand($phrases)];
    }

    public function say() {
        $phrases = ["Цього разу я переміг!", "Повезло на цей раз!", "Ще раз довелося випробувати свої сили!"];
        return $phrases[array_rand($phrases)];
    }

    public function attack($opponent) {
        $damage = $this->baseDamage + rand(5, 15);
        $opponent->health -= $damage;
        return $damage;
    }
}

class Warrior extends Hero {
    public function __construct($health, $stamina, $baseDamage) {
        parent::__construct($health, $stamina, $baseDamage);
    }

    public function attack($opponent) {
        $damage = parent::attack($opponent);
        return "Воїн атакує ворога з базовим уроном {$this->baseDamage} та завдає {$damage} урону!";
    }
}

class Mage extends Hero {
    public function __construct($health, $stamina, $baseDamage) {
        parent::__construct($health, $stamina, $baseDamage);
    }

    public function attack($opponent) {
        $damage = parent::attack($opponent);
        return "Маг випробовує силу магії та наносить {$damage} урону ворогові!";
    }
}

class Battle {
    public static function fight($hero1, $hero2) {
        $phrases = [];
        while ($hero1->health > 0 && $hero2->health > 0) {
            $phrases[] = $hero1->attack($hero2);
            if ($hero2->health > 0) {
                $phrases[] = $hero2->attack($hero1);
            }
        }

        if ($hero1->health <= 0) {
            $phrases[] = $hero1->sayOnLose();
            return [get_class($hero2) . " переміг!", $phrases];
        } elseif ($hero2->health <= 0) {
            $phrases[] = $hero1->sayOnWin();
            return [get_class($hero1) . " переміг!", $phrases];
        }
    }
}


$warrior1 = new Warrior(100, 50, 20);
$mage1 = new Mage(80, 70, 15);

$warrior1->setWeapon("Меч");
$mage1->setWeapon("Магічний посох");

$result = Battle::fight($warrior1, $mage1);
echo $result[0] . "\n";
foreach ($result[1] as $phrase) {
    echo $phrase . "\n";
}
