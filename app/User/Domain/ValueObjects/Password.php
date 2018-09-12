<?php

namespace App\User\Domain\ValueObjects;

class Password
{
    /** @var string */
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function __toString(): string
    {
        return $this->toNative();
    }

    public function toNative(): ?string
    {
        return $this->password;
    }

    public function generateHash(): string
    {
        return bcrypt($this->password);
    }
}
