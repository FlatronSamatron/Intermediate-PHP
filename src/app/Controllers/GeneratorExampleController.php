<?php

declare(strict_types=1);
namespace App\Controllers;

class GeneratorExampleController
{
    public function index(): string
    {
        $numbers = $this->lazyRange(1, 10000);

        foreach ($numbers as $key => $value) {
            echo "{$key} : {$value} <br/>";
        }

        return 'generator';
    }

    private function lazyRange(int $start, int $end): \Generator
    {
        for ($i = $start; $i < $end; $i++) {
            yield $i * 5 => $i;
        }
    }
}