<?php

declare(strict_types=1);

namespace Todo\Application\User;

final readonly class UserRegisterUseCaseInput
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
