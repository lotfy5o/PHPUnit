<?php

class User
{
    public $first_name;
    public $surname;

    public function get_full_name()
    {
        return trim("$this->first_name $this->surname");
    }
}
