<?php


namespace App;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;

    public function getFlavour(): string
    {
        return ' delicious';
    }
}