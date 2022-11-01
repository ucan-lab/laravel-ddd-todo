<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Password;

interface PasswordResetNotificationSender
{
    public function send(PasswordResetNotification $notification): void;
}
