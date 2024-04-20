<?php

declare(strict_types=1);
namespace App;

trait CappuccinoTrait
{
//    use LatteTrait;

    private function makeCappuccino(): void
    {
        echo static::class.' is making cappuccino';
    }

    public function makeCoffee(): void
    {
        echo 'Making Coffee (Update)';
    }
}