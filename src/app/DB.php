<?php

namespace App;

//singleton
class DB
{
    public static ?DB $instance = null;

    private function __construct(public array $config)
    {
        echo 'instance created<br/>';
    }

    public static function getInstance(array $config): DB
    {
        if(self::$instance === null){
            self::$instance = new DB($config);
        }

        return self::$instance;
    }

}