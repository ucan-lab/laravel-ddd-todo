<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

use Todo\Lang\UlidFactory;

final class UserFactory
{
    public static function create(
        string $name,
        string $email,
        string $password,
    ): User {
        return new User(
            UserId::create(UlidFactory::generate()),
            new UserName($name),
            new Email($email),
            new PlainPassword($password),
        );
    }

    public static function fromRepository(
        string $id,
        string $name,
        string $email,
        string $password,
    ): User {
        return new User(
            UserId::fromString($id),
            new UserName($name),
            new Email($email),
            new HashedPassword($password),
        );
    }
}
