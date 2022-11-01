<?php

declare(strict_types=1);

namespace Todo\Application\Password;

final class SendPasswordResetUseCaseInput
{
    public function __construct(public readonly string $email)
    {
    }
}
