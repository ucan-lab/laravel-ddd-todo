<?php

declare(strict_types=1);

namespace Todo\Application\User;

use Throwable;
use Todo\Domain\Model\User\DuplicateUserException;
use Todo\Domain\Model\User\UserFactory;
use Todo\Domain\Model\User\UserRepository;
use Todo\Domain\Service\User\CheckDuplicateUserService;
use Todo\Lang\UnitOfWork;

final readonly class UserRegisterUseCase
{
    public function __construct(
        private UnitOfWork $unitOfWork,
        private CheckDuplicateUserService $checkDuplicateUserService,
        private UserRepository $userRepository,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function register(UserRegisterUseCaseInput $input): UserRegisterUseCaseOutput
    {
        $user = UserFactory::create(
            $input->name,
            $input->email,
            $input->password
        );

        $this->unitOfWork->transaction(function () use ($user) {
            if ($this->checkDuplicateUserService->exists($user)) {
                throw new DuplicateUserException('既に同じメールアドレスが登録されています。');
            }

            $this->userRepository->store($user);
        });

        return new UserRegisterUseCaseOutput($user->id());
    }
}
