<?php

namespace App;

use Traversable;

class InvoiceCollection implements \IteratorAggregate
{
    public function __construct(public array $invoices)
    {
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->invoices);
    }
}

//class InvoiceCollection implements \Iterator
//{
//    private int $key;
//
//    public function __construct(public array $invoices)
//    {
//    }
//
//    public function current(): mixed
//    {
//        echo __METHOD__.'<br>';
//
////        return current($this->invoices);
//        return $this->invoices[$this->key];
//    }
//
//    public function next(): void
//    {
//        echo __METHOD__.'<br>';
//
////        next($this->invoices);
//        ++$this->key;
//    }
//
//    public function key(): mixed
//    {
//        echo __METHOD__.'<br>';
//
////        return key($this->invoices);
//        return $this->key;
//    }
//
//    public function valid(): bool
//    {
//        echo __METHOD__.'<br>';
//
////        return current($this->invoices) !== false;
//        return isset($this->invoices[$this->key]);
//    }
//
//    public function rewind(): void
//    {
//        echo __METHOD__.'<br>';
//
//        $this->key = 0;
////        reset($this->invoices);
//    }
//}