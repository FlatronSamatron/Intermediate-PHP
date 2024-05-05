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
            $db = new PDO(
                    "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}",
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS'],
                    [
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES   => false,
                    ]
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $email  = 'invoice1@mail.com';
        $name   = 'invoice1 invoice1';
        $amount = 25;

        try {
            $db->beginTransaction();
            $newUserStmt = $db->prepare(
                    'insert into users(email, full_name, is_active, created_at) values(?,?,1,now())'
            );

            $newInvoiceStmt = $db->prepare(
                    'insert into invoices(amount, user_id) values(?,?)'
            );

            $newUserStmt->execute([$email, $name]);
            $userId = (int)$db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);

            var_dump($userId);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
        }

        $fetchSmt = $db->prepare(
                'select invoices.id as invoice_id, amount, user_id, full_name
                from invoices
                inner join users on user_id = users.id
                where email = ?'
        );

        $fetchSmt->execute([$email]);

        echo '<pre>';
        var_dump($fetchSmt->fetch());
        echo '</pre>';

        return View::make('index');
    }
}