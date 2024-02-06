<?php


abstract class Cherga 
{
    private $value;

    public function __construct() {
        $this->value = array();
    }

    // Додати елемент у чергу
    public function Add($item) {
        array_push($this->value, $item);
    }

    // Перевірка на пустоту
    public function Clear() {
        return empty($this->value);
    }

    // Отримати розмір черги
    public function Count() {
        return count($this->value);
    }

    // Вивести вміст черги
    public function Get() {
        echo implode(', ', $this->value);
    }
}
