<?php

namespace App\PaymentGateway\Stripe;

use App\Enums\Status;

class Transaction
{

    private string $status;

    public function __construct()
    {
        $this->status = Status::PENDING;
    }

    public function setStatus(string $status): self
    {
        if(!isset(Status::ALL_STATUSES[$status])){
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}