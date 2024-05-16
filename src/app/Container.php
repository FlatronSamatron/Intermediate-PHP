<?php

declare(strict_types=1);
namespace App;

use App\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            if (is_callable($id)) {
                return $entry($this);
            }

            $id = $entry;
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete): void
    {
        $this->entries[$id] = $concrete;
    }

    private function resolve(string $id)
    {
        //Класс ReflectionClass сообщает информацию о классе.
        $refectionClass = new \ReflectionClass($id);

        //Проверяет, можно ли создать экземпляр класса.
        if (!$refectionClass->isInstantiable()) {
            throw new ContainerException("Class {$id} is not instantiable");
        }

        //Возвращает конструктор отражённого класса.
        $constructor = $refectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException(
                        "Failed to resolve class {$id} because param {$name} is missing a type hint."
                );
            }

            if ($type instanceof \ReflectionUnionType) {
                throw new ContainerException(
                        "Failed to resolve class {$id} because of union type for param {$name}."
                );
            }

            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException(
                    "Failed to resolve class {$id} because invalid param {$name}."
            );
        }, $parameters);

        return $refectionClass->newInstanceArgs($dependencies);
    }
}