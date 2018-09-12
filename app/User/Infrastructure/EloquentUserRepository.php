<?php

namespace App\User\Infrastructure;

use App\User\Domain\User;
use App\User\Domain\UserRepository;
use App\User\Domain\UserWasLoggedIn;
use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;
use App\User\Infrastructure\Models\User as UserModel;

class EloquentUserRepository implements UserRepository
{
    public function add(User $user): User
    {
        /** @var \App\User\Infrastructure\Models\User $userModel */
        $userModel = UserModel::create([
            'email' => $user->getEmail()->getFullAddress(),
            'password' => $user->getPasswordHash(),
            'name' => $user->getName()
        ]);

        return $this->makeFromModel($userModel);
    }

    public function save(User $user): void
    {
        $this->handleEvents($user);

        //@TODO user update
    }

    public function findByEmail(Email $email): ?User
    {
        return $this->makeFromModel(UserModel::where('email', $email->getFullAddress())->first());
    }

    public function findById(int $id): ?User
    {
        return $this->makeFromModel(UserModel::find($id));
    }

    private function makeFromModel(?UserModel $userModel): ?User
    {
        if (!$userModel) {
            return null;
        }

        return new User(
            $userModel->id,
            new Email($userModel->email),
            new Password($userModel->password),
            $userModel->name
        );
    }

    private function handleEvents(User $user)
    {
        foreach ($user->getRecordedEvents() as $event) {
            if ($event instanceof UserWasLoggedIn) {
                /** @var $event UserWasLoggedIn */
                auth()->attempt([
                    'email' => $user->getEmail()->getFullAddress(),
                    'password' => $event->password()
                ]);
                continue;
            }
            throw new \LogicException(get_class($event).'was not handled');
        }
    }
}
