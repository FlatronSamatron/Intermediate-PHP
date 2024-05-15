<?php

declare(strict_types=1);
namespace App\Controllers;

use App\App;
use App\Container;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Models\User;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    public function index(): View
    {
//        $email  = 'invoice6@mail.com';
//        $name   = 'invoice6 invoice6';
//        $amount = 25;
//
//        $userModel    = new User();
//        $invoiceModel = new Invoice();
//
//        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
//                [
//                        'email' => $email,
//                        'name'  => $name,
//                ],
//                [
//                        'amount' => $amount,
//                ]
//        );

        $userModel    = new User();
        $invoiceModel = new Invoice();
        $user         = $userModel->getUser("invoice5@mail.com");

        var_dump($this->invoiceService->process([], 15));

        return View::make('index', ['invoice' => $invoiceModel->find(5)]);
    }
}