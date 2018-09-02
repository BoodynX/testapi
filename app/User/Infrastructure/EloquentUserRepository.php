<?php

namespace App\User\Infrastructure;

use App\Core\Infrastructure\Models\User as UserModel;
use App\User\Domain\User;
use App\User\Domain\UserRepository;
use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

class EloquentUserRepository implements UserRepository
{
    public function add(User $user): User
    {
        /** @var \App\Core\Infrastructure\Models\User $userModel */
        $userModel = UserModel::create([
            'email' => $user->getEmail()->getFullAddress(),
            'password' => $user->getPasswordHash(),
            'name' => $user->getName()
        ]);

        return $this->makeFromModel($userModel);
    }

    public function findByEmail(Email $email): ?User
    {
        $userModel = UserModel::where('email', $email->getFullAddress())->first();

        if (!$userModel) {
            return null;
        }

        return $this->makeFromModel($userModel);
    }

    private function makeFromModel(UserModel $userModel)
    {
        return new User(
            $userModel->id,
            new Email($userModel->email),
            new Password($userModel->password),
            $userModel->name
        );
    }
}
