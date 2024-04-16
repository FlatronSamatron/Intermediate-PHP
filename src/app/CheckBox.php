<?php

declare(strict_types=1);
namespace App;

class CheckBox extends Boolean
{
    public function render(): string
    {
        return <<<HTML
           <input type="checkbox" name="{$this->name}"
        HTML;
    }
}