<?php

declare(strict_types=1);

namespace Todo\Application\Service\User;

final readonly class RegisterUserUseCaseInput
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
