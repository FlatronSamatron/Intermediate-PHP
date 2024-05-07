<?php

declare(strict_types=1);
namespace App\Controllers;

use App\Models\Invoice;
use App\Models\SignUp;
use App\Models\User;
use App\View;

class HomeController
{
    public function index(): View
    {
        $email  = 'invoice5@mail.com';
        $name   = 'invoice5 invoice5';
        $amount = 25;

        $userModel    = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
                [
                        'email' => $email,
                        'name'  => $name,
                ],
                [
                        'amount' => $amount,
                ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }
}