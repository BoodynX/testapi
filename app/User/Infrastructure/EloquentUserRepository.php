<?php declare(strict_types=1);

namespace App\User\Infrastructure;

use App\Core\Infrastructure\Models\User as UserModel;
use App\User\Domain\User;
use App\User\Domain\UserRepository;
use App\User\Domain\ValueObjects\Email;

class EloquentUserRepository implements UserRepository
{
    /** @var UserModel */
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function add(User $user): int
    {
        /** @var \App\Core\Infrastructure\Models\User $userModel */
        $userModel = UserModel::create([
            'email' => $user->getEmail()->getFullAddress(),
            'password' => $user->getPassword(),
            'name' => $user->getName()
        ]);

        return $userModel->id;
    }

    public function save(User $user): void
    {

    }

    public function findByEmail(Email $email): ?User
    {

    }
}
