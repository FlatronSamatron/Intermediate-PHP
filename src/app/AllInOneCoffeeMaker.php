<?php

declare(strict_types=1);
namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait {
        CappuccinoTrait::makeCappuccino as public;
    }

    public function getFlavour(): string
    {
        return ' delicious';
    }
}