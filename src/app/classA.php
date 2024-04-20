<?php

declare(strict_types=1);
namespace App;

class classA
{

    public function __construct(public int $x, public int $y)
    {
    }

    public function foo(): string
    {
        return 'foo';
    }

    public function bar(): object
    {
        return new class($this->x, $this->y) extends classA {
            public function __construct(public int $x, public int $y)
            {
                parent::__construct($x, $y);

                echo $this->foo();
            }
        };
    }
}