<?php

declare(strict_types=1);

namespace Todo\Application\Service\User;

final readonly class RegisterUserUseCaseOutput
{
    public function __construct(public string $userId)
    {
    }
}
