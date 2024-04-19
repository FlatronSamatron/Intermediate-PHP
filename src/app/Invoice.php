<?php

declare(strict_types=1);
namespace App;

class Invoice
{
    private float $amount = 55;
    private int $id = 1;
    private string $accountNumber = '0123456789';

    public function __debugInfo(): ?array
    {
        return [
                'id'            => $this->id,
                'amount'        => $this->amount,
                'accountNumber' => '****'.substr($this->accountNumber, -4),
        ];
    }
//    public function __invoke(): void
//    {
//        var_dump('invoked');
//    }
//    public function __toString(): string
//    {
//        return 'hello.';
//    }
//    private function process($amount, $description): void
//    {
//        var_dump('process', $amount, $description);
//    }
//
//    public function __call(string $name, array $arguments)
//    {
//        if (method_exists($this, $name)) {
//            call_user_func_array([$this, $name], $arguments);
////            $this->$name(...$arguments);
//        }
//    }
//
//    public static function __callStatic(string $name, array $arguments)
//    {
//        var_dump('static', $name, $arguments);
//    }
//    private array $data = [];
//
//    public function __get(string $name): ?array
//    {
//        if (array_key_exists($name, $this->data)) {
//            return $this->data;
//        }
//
//        return null;
//    }
//
//    public function __set(string $name, $value): void
//    {
//        $this->data[$name] = $value;
//    }
//
//    public function __isset(string $name): bool
//    {
//        return array_key_exists($name, $this->data);
//    }
//
//    public function __unset(string $name): void
//    {
//        unset($this->data[$name]);
//    }

}