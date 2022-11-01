<?php

declare(strict_types=1);

namespace Todo\Application\User;

final class UserRegisterUseCaseInput
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}
