<?php

namespace App;

class DebtCollectionService
{
    public function collectionDebt(DeptCollector $collector): void
    {
        $ownedAmount     = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($ownedAmount);

        echo 'Collected $'.$collectedAmount.' out of $'.$ownedAmount;
    }
}