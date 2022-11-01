<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\User;

use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\HashedPassword;
use Todo\Domain\Model\User\RawPassword;
use Todo\Domain\Model\User\User;
use Todo\Domain\Model\User\UserFactory;
use Todo\Domain\Model\User\UserId;
use Todo\Domain\Model\User\UserName;
use Todo\Lang\UlidFactory;

final class ConcreteUserFactory implements UserFactory
{
    public function create(
        string $name,
        string $email,
        string $plainPassword,
    ): User {
        return new User(
            UserId::create(UlidFactory::generate()),
            new UserName($name),
            new Email($email),
            new RawPassword($plainPassword),
        );
    }

    public function fromRepository(
        string $id,
        string $name,
        string $email,
        string $hashedPassword,
    ): User {
        return new User(
            UserId::fromString($id),
            new UserName($name),
            new Email($email),
            new HashedPassword($hashedPassword),
        );
    }
}
