<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

final readonly class User
{
    public function __construct(
        private UserId $id,
        private UserName $name,
        private Email $email,
        private Password $password,
    ) {
    }

    public function id(): string
    {
        return $this->id->id();
    }

    public function userId(): UserId
    {
        return $this->id;
    }

    public function nameValue(): string
    {
        return $this->name->value();
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function emailValue(): string
    {
        return $this->email->value();
    }

    public function hasRawPassword(): bool
    {
        return $this->password instanceof RawPassword;
    }

    public function passwordValue(): string
    {
        return $this->password->value();
    }
}
