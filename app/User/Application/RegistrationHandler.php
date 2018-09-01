<?php

namespace App\User\Application;

use App\Core\Infrastructure\Models\User as UserModel;
use App\User\Domain\User;
use App\User\Domain\UserRepository;

final class RegistrationHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Register $command): string
    {
        $user = User::registrable(
            $command->getEmail(),
            $command->getPassword(),
            $command->getName()
        );
        $userId = $this->userRepository->add($user);
        return auth()->login(UserModel::find($userId));
    }
}
