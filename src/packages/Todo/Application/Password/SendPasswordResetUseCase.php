<?php

declare(strict_types=1);

namespace Todo\Application\Password;

use Exception;
use Todo\Domain\Model\Password\PasswordResetNotification;
use Todo\Domain\Model\Password\PasswordResetNotificationSender;
use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\UserRepository;

final readonly class SendPasswordResetUseCase
{
    public function __construct(
        private UserRepository $userRepository,
        private PasswordResetNotificationSender $sender,
    ) {
    }

    /**
     * @throws Exception
     */
    public function send(SendPasswordResetUseCaseInput $input): SendPasswordResetUseCaseOutput
    {
        $user = $this->userRepository->restoreByEmail(new Email($input->email));

        $notification = new PasswordResetNotification($user->userId(), $user->email());

        $this->sender->send($notification);

        return new SendPasswordResetUseCaseOutput();
    }
}
