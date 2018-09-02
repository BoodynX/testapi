<?php

namespace App\User\Application;

use App\User\Domain\UserRepository;

final class LogInHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LogIn $command): void
    {
        $user = $this->userRepository->findByEmail($command->getEmail());

        if ($user === null) {
            return;
        }

        $user->logIn($command->getPassword());
    }
}
