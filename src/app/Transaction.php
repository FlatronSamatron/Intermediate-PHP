<?php

declare(strict_types=1);
namespace App;

class Transaction
{
    /**
     * Some description
     *
     * @param   Customer  $customer
     * @param   float     $amount
     *
     * @return true
     * @throws \RuntimeException
     *
     */
    public function process(Customer $customer, float $amount): bool
    {
        return true;
    }

}