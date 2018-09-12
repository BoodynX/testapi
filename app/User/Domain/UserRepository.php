<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;

interface UserRepository
{
    public function add(User $user): User;

    public function save(User $user): void;

    public function findByEmail(Email $email): ?User;

    public function findById(int $id): ?User;
}
