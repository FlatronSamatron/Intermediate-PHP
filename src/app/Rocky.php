<?php

namespace App;

class Rocky implements DeptCollector
{
    public function collect(float $ownedAmount): float
    {
        return $ownedAmount * 0.65;
    }
}