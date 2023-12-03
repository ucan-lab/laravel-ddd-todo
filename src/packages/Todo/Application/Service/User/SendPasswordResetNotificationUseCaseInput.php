<?php

declare(strict_types=1);

namespace Todo\Application\Service\User;

final readonly class SendPasswordResetNotificationUseCaseInput
{
    public function __construct(public string $email)
    {
    }
}
