<?php

declare(strict_types=1);
namespace App;

interface DeptCollector
{
    public function collect(float $ownedAmount): float;

}