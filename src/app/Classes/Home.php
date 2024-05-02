<?php

declare(strict_types=1);
namespace App\Classes;

class Home
{
    public function index(): string
    {
        return <<<FORM
            <form action='/upload' method='post' enctype="multipart/form-data">
                <input type='file' name='receipt'/>
                <button type="submit">Upload</button>
            </form>
        FORM;
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