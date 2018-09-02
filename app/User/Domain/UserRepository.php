<?php declare(strict_types=1);

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;

interface UserRepository
{
    public function add(User $user): int;

    public function save(User $user): void;

    public function findByEmail(Email $email): ?User;
}
