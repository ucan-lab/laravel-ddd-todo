<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

interface UserRepository
{
    public function restoreById(string $id): User;

    public function restoreByEmail(Email $email): User;

    public function store(User $user): void;
}
