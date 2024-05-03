<?php

declare(strict_types=1);
namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index', ['foo' => 'bar']);
    }

    public function upload(): void
    {
        echo '<pre>';
        var_dump($_FILES);
        var_dump(pathinfo($_FILES['receipt']['tmp_name']));
        echo '</pre>';
        $file     = $_FILES['receipt']['name'];
        $filePath = STORAGE_PATH.'/'.$file;
        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '</pre>';

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
    }
}