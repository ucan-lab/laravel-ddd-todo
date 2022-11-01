<?php

declare(strict_types=1);

namespace Tests\Feature\Presentation\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test存在するユーザーでログインして成功すること(): void
    {
        User::factory()->create(['email' => 'test@example.com']);

        $data = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $this->post('/login', $data)
            ->assertRedirect('/dashboard');
    }

    public function test存在しないユーザーでログインした時に失敗すること(): void
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $this->post('/login', $data, ['HTTP_REFERER' => '/login'])
            ->assertRedirect('/login');
    }

    public function test不正な値の時にバリデーションエラーになること(): void
    {
        $this->post('/login', [], ['HTTP_REFERER' => '/login'])
            ->assertRedirect('/login');
    }
}
