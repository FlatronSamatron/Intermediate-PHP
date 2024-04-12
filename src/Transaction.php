<?php

class Transaction
{
    private ?Customer $customer = null;
    public function __construct(private ?float $amount = null, private string $description = 'hello'){
        echo $amount;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

}