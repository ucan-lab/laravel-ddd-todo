<?php

declare(strict_types=1);

namespace Todo\Domain\Service\User;

use Todo\Domain\Model\User\NotFoundUserException;
use Todo\Domain\Model\User\User;
use Todo\Domain\Model\User\UserRepository;

final readonly class CheckDuplicateUserService
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function exists(User $user): bool
    {
        try {
            $duplicatedUser = $this->userRepository->restoreByEmail($user->email());
        } catch (NotFoundUserException) {
            return false;
        }

        return $user->emailValue() === $duplicatedUser->emailValue();
    }
}
