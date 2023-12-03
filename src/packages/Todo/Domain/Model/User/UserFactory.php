<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

interface UserFactory
{
    public function create(string $name, string $email, string $password): User;

    public function fromRepository(string $id, string $name, string $email, string $password): User;
}
