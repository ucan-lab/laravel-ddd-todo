<?php

declare(strict_types=1);

namespace Todo\Application\Service\User;

use Exception;
use Todo\Application\Boundary\MailSender;
use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\UserRepository;

final readonly class SendPasswordResetNotificationUseCase
{
    public function __construct(
        private UserRepository $userRepository,
        private MailSender $sender,
    ) {
    }

    /**
     * @throws Exception
     */
    public function send(SendPasswordResetNotificationUseCaseInput $input): SendPasswordResetNotificationUseCaseOutput
    {
        $user = $this->userRepository->restoreByEmail(new Email($input->email));

        $this->sender->sendMail(
            view: 'email.password_resets',
            data: [],
            subject: 'パスワードリセットメール',
            to: $user->emailValue(),
        );

        return new SendPasswordResetNotificationUseCaseOutput();
    }
}
