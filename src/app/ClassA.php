<?php

declare(strict_types=1);
namespace App;

class ClassA
{
    protected static string $name = 'A';

    public static function getName(): string
    {
//        var_dump(get_class($this));
        var_dump(self::class);
        var_dump(static::class);

//        return self::$name; //ранняя привязка
        return static::$name; //поздняя привязка
    }

    public static function make(): static
    {
        return new static();
    }
}