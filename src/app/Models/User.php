<?php

declare(strict_types=1);
namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $email, string $name, bool $isActive = true): int
    {
        $stmt = $this->db->prepare(
                'insert into users(email, full_name, is_active, created_at) values(?,?,?,now())'
        );

        $stmt->execute([$email, $name, $isActive]);

        return (int)$this->db->lastInsertId();
    }

    public function getUser(string $email): array
    {
        $stmt = $this->db->prepare(
                'select * from users where email = ?'
        );

        $stmt->execute([$email]);

        return $stmt->fetch();
    }
}