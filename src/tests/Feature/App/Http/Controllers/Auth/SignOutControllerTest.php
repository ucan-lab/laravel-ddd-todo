<?php

declare(strict_types=1);

namespace Feature\App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SignOutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test認証済みユーザーがログアウトできること(): void
    {
        $user = User::factory()->create(['email' => 'test@example.com']);

        $this->actingAs($user)
            ->get('/sign-out')
            ->assertRedirect('/');
    }

    public function test未認証のユーザーが来た場合はログイン画面へ遷移(): void
    {
        $this->get('/sign-out')
            ->assertRedirect('/sign-in');
    }
}
