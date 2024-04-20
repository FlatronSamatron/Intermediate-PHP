<?php

declare(strict_types=1);
namespace App;

trait LatteTrait
{
    protected string $milkType = 'whole-milk';

    public function makeLatte(): void
    {
        echo static::class.' is making latte with '.$this->milkType.' '.$this->getFlavour();
    }

    abstract public function getFlavour(): string;
}