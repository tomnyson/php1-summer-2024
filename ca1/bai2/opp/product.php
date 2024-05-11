<?php

namespace opp;

class product
{
    public $id;
    public $name;
    public $price;

    public function __construct($id, $name,  $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function inThongTin()
    {
        print(" ten $this->name </br>");
        print(" id $this->id  </br>");
        print(" price $this->price ");
    }
}
