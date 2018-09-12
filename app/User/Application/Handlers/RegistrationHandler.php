<?php

namespace App\User\Application\Handlers;

use App\User\Application\Commands\Register;
use App\User\Domain\User;
use App\User\Domain\UserRepository;

final class RegistrationHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Register $command): void
    {
        $user = User::registrable(
            $command->getEmail(),
            $command->getPassword(),
            $command->getName()
        );

        $this->userRepository->add($user);
    }
}
