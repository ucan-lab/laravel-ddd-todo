<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Password;

use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\UserId;

final class PasswordResetNotification
{
    public const EXPIRED_MINUTES = 30;

    public function __construct(
        private readonly UserId $userId,
        private readonly Email $email,
    ) {
    }

    public function userId(): string
    {
        return $this->userId->id();
    }

    public function emailValue(): string
    {
        return $this->email->value();
    }
}
