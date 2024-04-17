<?php

namespace App;

class CollectionAgency implements DeptCollector
{
    public function collect(float $ownedAmount): float
    {
        $guaranteed = $ownedAmount * 0.5;

        return mt_rand($guaranteed, $ownedAmount);
    }
}