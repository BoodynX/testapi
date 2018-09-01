<?php

namespace App\User\Application;

use App\User\Domain\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\User\Infrastructure\EloquentUserRepository;

class UserServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserRepository::class => EloquentUserRepository::class,
    ];
}
