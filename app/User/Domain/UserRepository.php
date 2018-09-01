<?php declare(strict_types=1);

namespace App\User\Domain;

interface UserRepository
{
    public function add(User $user): int;

    public function save(User $user): void;

    public function findById(int $id): ?User;
}
