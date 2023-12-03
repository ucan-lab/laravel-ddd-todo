<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\User;

use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\HashedPassword;
use Todo\Domain\Model\User\PlainPassword;
use Todo\Domain\Model\User\User;
use Todo\Domain\Model\User\UserFactory;
use Todo\Domain\Model\User\UserId;
use Todo\Domain\Model\User\UserName;
use Todo\Lang\UlidGenerator;

final class ConcreteUserFactory implements UserFactory
{
    public function create(
        string $name,
        string $email,
        string $password,
    ): User {
        return new User(
            new UserId(UlidGenerator::generate()),
            new UserName($name),
            new Email($email),
            new PlainPassword($password),
        );
    }

    public function fromRepository(
        string $id,
        string $name,
        string $email,
        string $password,
    ): User {
        return new User(
            new UserId($id),
            new UserName($name),
            new Email($email),
            new HashedPassword($password),
        );
    }
}
