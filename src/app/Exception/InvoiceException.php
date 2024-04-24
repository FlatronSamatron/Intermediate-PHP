<?php

declare(strict_types=1);
namespace App\Exception;

class InvoiceException extends \Exception
{

    public static function invalidAmount(): static
    {
        return new static('Invalid billing info');
    }

    public static function missingBillingInfo()
    {
        return new static('Missing billing information');
    }
}