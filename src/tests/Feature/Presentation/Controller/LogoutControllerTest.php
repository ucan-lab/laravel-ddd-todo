<?php

declare(strict_types=1);

namespace Tests\Feature\Presentation\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class LogoutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test認証済みユーザーがログアウトできること(): void
    {
        $user = User::factory()->create(['email' => 'test@example.com']);

        $this->actingAs($user)
            ->get('/logout')
            ->assertRedirect('/');
    }

    public function test未認証のユーザーが来た場合はログイン画面へ遷移(): void
    {
        $this->get('/logout')
            ->assertRedirect('/login');
    }
}
