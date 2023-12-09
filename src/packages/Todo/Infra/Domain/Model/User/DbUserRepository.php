<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\User;

use App\Models\User as EloquentUser;
use Illuminate\Support\Facades\Hash;
use Todo\Domain\Model\User\Email;
use Todo\Domain\Model\User\HashedPassword;
use Todo\Domain\Model\User\NotFoundUserException;
use Todo\Domain\Model\User\User;
use Todo\Domain\Model\User\UserRepository;

final readonly class DbUserRepository implements UserRepository
{
    public function restoreById(string $id): User
    {
        $eloquentUser = EloquentUser::find($id);

        if ($eloquentUser === null) {
            throw new NotFoundUserException('存在しないユーザーです。');
        }

        return User::create(
            id: $eloquentUser->id,
            name: $eloquentUser->name,
            email: $eloquentUser->email,
            password: new HashedPassword($eloquentUser->password),
        );
    }

    public function restoreByEmail(Email $email): User
    {
        $eloquentUser = EloquentUser::query()
            ->where('email', $email->value())
            ->first();

        if ($eloquentUser === null) {
            throw new NotFoundUserException('存在しないユーザーです。');
        }

        return User::create(
            id: $eloquentUser->id,
            name: $eloquentUser->name,
            email: $eloquentUser->email,
            password: new HashedPassword($eloquentUser->password),
        );
    }

    public function store(User $user): void
    {
        $hashedPassword = $user->hasRawPassword() ? Hash::make($user->passwordValue()) : $user->passwordValue();

        EloquentUser::updateOrCreate(
            [
                'id' => $user->id(),
            ], [
                'name' => $user->nameValue(),
                'email' => $user->emailValue(),
                'password' => $hashedPassword,
            ],
        );
    }
}
