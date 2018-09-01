<?php

namespace App\User\Domain\ValueObjects;

class Password
{
    /** @var string */
    private $hash;

    public function __construct(string $password)
    {
        $this->hash = bcrypt($password);
    }

    public function __toString(): string
    {
        return $this->hash;
    }

    public function getNative(): string
    {
        return $this->hash;
    }
}
