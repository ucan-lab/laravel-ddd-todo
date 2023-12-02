<?php

declare(strict_types=1);

namespace Todo\Application\User;

final readonly class UserRegisterUseCaseOutput
{
    public function __construct(public string $userId)
    {
    }
}
