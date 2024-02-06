<?php


class Stack extends Cherga
{
    private $stackArray;
    private $top;

    public function __construct() {
        $this->stackArray = [];
        $this->top = -1;
    }

    public function Clear() {
        return ($this->top == -1);
    }

    public function Add($item) {
        $this->top++;
        $this->stackArray[$this->top] = $item;
    }

    public function Delete() {
        if ($this->Clear()) {
            echo "Stack is empty";
            return null;
        } else {
            $item = $this->stackArray[$this->top];
            $this->top--;
            return $item;
        }
    }

    public function Count() {
        return $this->top + 1;
    }
}