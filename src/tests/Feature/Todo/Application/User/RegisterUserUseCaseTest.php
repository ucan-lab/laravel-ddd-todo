<?php

declare(strict_types=1);

namespace Feature\Todo\Application\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Throwable;
use Todo\Application\Service\User\RegisterUserUseCase;
use Todo\Application\Service\User\RegisterUserUseCaseInput;
use Todo\Application\Service\User\RegisterUserUseCaseOutput;
use Todo\Domain\Model\User\DuplicateUserException;

final class RegisterUserUseCaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws Throwable
     */
    public function testユーザーを登録できること(): void
    {
        $name = 'test';
        $email = 'test@example.com';
        $password = 'P@ssw0rd';

        $input = new RegisterUserUseCaseInput($name, $email, $password);

        $output = $this->app->make(RegisterUserUseCase::class)->register($input);
        $this->assertInstanceOf(RegisterUserUseCaseOutput::class, $output);
    }

    /**
     * @throws Throwable
     */
    public function test同じメールアドレスのユーザーを登録できないこと(): void
    {
        $name = 'test';
        $email = 'test@example.com';
        $password = 'P@ssw0rd';

        User::factory()->create(['email' => $email]);

        $input = new RegisterUserUseCaseInput($name, $email, $password);

        $this->expectException(DuplicateUserException::class);
        $this->expectExceptionMessage('既に同じメールアドレスが登録されています。');
        $this->app->make(RegisterUserUseCase::class)->register($input);
    }
}
