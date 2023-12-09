<?php

declare(strict_types=1);

namespace Todo\Application\Service\User;

use Throwable;
use Todo\Domain\Model\User\DuplicateUserException;
use Todo\Domain\Model\User\PlainPassword;
use Todo\Domain\Model\User\User;
use Todo\Domain\Model\User\UserRepository;
use Todo\Domain\Service\User\CheckDuplicateUserService;
use Todo\Lang\UlidGenerator;
use Todo\Lang\UnitOfWork;

final readonly class RegisterUserUseCase
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
    public function register(RegisterUserUseCaseInput $input): RegisterUserUseCaseOutput
    {
        $user = User::create(
            id: UlidGenerator::generate(),
            name: $input->name,
            email: $input->email,
            password: new PlainPassword($input->password),
        );

        $this->unitOfWork->transaction(function () use ($user) {
            if ($this->checkDuplicateUserService->exists($user)) {
                throw new DuplicateUserException('既に同じメールアドレスが登録されています。');
            }

            $this->userRepository->store($user);
        });

        return new RegisterUserUseCaseOutput($user->id());
    }
}
