<?php

declare(strict_types=1);
namespace App\Controllers;

use App\View;
use PDO;

class HomeController
{
    public function index(): View
    {
        try {
            $db        = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
            $email     = 'oleg@mail.com';
            $name      = 'oleg oleg';
            $isActive  = 1;
            $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2020 9:00PM'));
            $query     = "INSERT INTO users (email, full_name, is_active, created_at, update_at) VALUES (:email, :name, :active, :date1, :date2)";

            $stmt = $db->prepare($query);

            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':active', $isActive, PDO::PARAM_BOOL);
            $stmt->bindValue(':date1', $createdAt);
            $stmt->bindValue(':date2', $createdAt);

//            echo $stmt;

            $stmt->execute();

            $id = (int)$db->lastInsertId();

            foreach ($db->query('select * from users')->fetchAll() as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }


        return View::make('index', ['foo' => 'bar']);
    }
}