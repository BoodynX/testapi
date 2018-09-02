<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;

interface UserRepository
{
    public function add(User $user): User;

    public function findByEmail(Email $email): ?User;
}
