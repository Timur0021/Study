<?php

class Man 
{
    private $habit = 'I love smokking in free time';
    private function badHabit($habit)
    {
       echo $habit;
    }

    public function speak()
    {
        $told = 'told';
        echo 'Hello I '. $told . ' you I happy!!!' . PHP_EOL;
    }

    public function ItSkill()
    {
        $skilAq = 'strong';
        echo 'I have '. $skilAq . 'in programming';

    }

}

class Programmer extends Man
{
    public function ItSkill()
    {
        echo 'I improve my skill in programming';
    }

    public function writeCode()
    {
        echo 'I wtite the best code on PHP';
    }
}

class Sinior extends Programmer
{
    public function codeReviev()
    {
        echo 'I watcing in your code how you wrout';
    }
}

class TehLid extends Sinior
{
    public function manegement()
    {
        echo 'I successfully manage my company I am the best';
    }
}


$man = new Man;
$programmer = new Programmer;
$sinior = new Sinior;
$tehLid = new TehLid;
// $man->speak();
//$programmer->badHabit();
// $sinior->codeReviev();
// $tehLid->manegement();