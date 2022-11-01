<?php

declare(strict_types=1);

namespace Tests\Feature\Application\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\User\UserRegisterUseCase;
use Todo\Application\User\UserRegisterUseCaseInput;
use Todo\Application\User\UserRegisterUseCaseOutput;
use Todo\Domain\Model\User\DuplicateUserException;

final class UserRegisterUseCaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws DuplicateUserException
     */
    public function testユーザーを登録できること(): void
    {
        $name = 'test';
        $email = 'test@example.com';
        $password = 'password';

        $input = new UserRegisterUseCaseInput($name, $email, $password);

        $output = $this->app->make(UserRegisterUseCase::class)->register($input);
        $this->assertTrue($output instanceof UserRegisterUseCaseOutput);
    }

    /**
     * @throws DuplicateUserException
     */
    public function test同じメールアドレスのユーザーを登録できないこと(): void
    {
        $name = 'test';
        $email = 'test@example.com';
        $password = 'password';

        User::factory()->create(['email' => $email]);

        $input = new UserRegisterUseCaseInput($name, $email, $password);

        $this->expectException(DuplicateUserException::class);
        $this->expectExceptionMessage('既に同じメールアドレスが登録されています。');
        $output = $this->app->make(UserRegisterUseCase::class)->register($input);
        $this->assertTrue($output instanceof UserRegisterUseCaseOutput);
    }
}
