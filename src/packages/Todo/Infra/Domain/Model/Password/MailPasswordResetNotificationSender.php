<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\Password;

use App\Mail\PasswordResetMail;
use DateInterval;
use Exception;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Routing\UrlGenerator;
use Todo\Domain\Model\Password\PasswordResetNotification;
use Todo\Domain\Model\Password\PasswordResetNotificationSender;
use Todo\Lang\Clock;

final readonly class MailPasswordResetNotificationSender implements PasswordResetNotificationSender
{
    public function __construct(
        private Mailer       $mailer,
        private Clock        $clock,
        private UrlGenerator $urlGenerator,
    ) {
    }

    /**
     * @throws Exception
     */
    public function send(PasswordResetNotification $notification): void
    {
        $duration = 'P' . PasswordResetNotification::EXPIRED_MINUTES . 'M';
        $expiredAt = $this->clock->now()->add(new DateInterval($duration));

        $temporarySignedRoute = $this->urlGenerator->temporarySignedRoute(
            'auth.reset-password', $expiredAt, ['user' => $notification->userId()]
        );

        $this->mailer
            ->to($notification->emailValue())
            ->send(new PasswordResetMail($temporarySignedRoute, PasswordResetNotification::EXPIRED_MINUTES));
    }
}
