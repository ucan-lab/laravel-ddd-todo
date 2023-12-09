<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

use Todo\Domain\Model\Task\Task;

final readonly class User
{
    private function __construct(
        private UserId $id,
        private UserName $name,
        private Email $email,
        private Password $password,
    ) {
    }

    public static function create(
        string $id,
        string $name,
        string $email,
        Password $password,
    ): self {
        return new self (
            id: new UserId($id),
            name: new UserName($name),
            email: new Email($email),
            password: clone $password,
        );
    }

    public function id(): string
    {
        return $this->id->id();
    }

    public function userId(): UserId
    {
        return $this->id;
    }

    public function nameValue(): string
    {
        return $this->name->value();
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function emailValue(): string
    {
        return $this->email->value();
    }

    public function hasRawPassword(): bool
    {
        return $this->password instanceof PlainPassword;
    }

    public function passwordValue(): string
    {
        return $this->password->value();
    }

    public function hasTask(Task $task): bool
    {
        return $this->id->equals($task->userId());
    }
}
