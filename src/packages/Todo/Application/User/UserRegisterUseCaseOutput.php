<?php

declare(strict_types=1);

namespace Todo\Application\User;

final class UserRegisterUseCaseOutput
{
    public function __construct(public readonly string $userId)
    {
    }
}
