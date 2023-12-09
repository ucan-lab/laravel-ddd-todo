<?php

declare(strict_types=1);

namespace Feature\App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SignInControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test存在するユーザーでログインして成功すること(): void
    {
        User::factory()->create(['email' => 'test@example.com']);

        $data = [
            'email' => 'test@example.com',
            'password' => 'P@ssw0rd',
        ];

        $this->post('/sign-in', $data)
            ->assertRedirect('/dashboard');
    }

    public function test存在しないユーザーでログインした時に失敗すること(): void
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'P@ssw0rd',
        ];

        $this->post('/sign-in', $data, ['HTTP_REFERER' => '/sign-in'])
            ->assertRedirect('/sign-in');
    }

    public function test不正な値の時にバリデーションエラーになること(): void
    {
        $this->post('/sign-in', [], ['HTTP_REFERER' => '/sign-in'])
            ->assertRedirect('/sign-in');
    }
}
