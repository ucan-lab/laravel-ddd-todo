<?php

declare(strict_types=1);

namespace Tests\Feature\Presentation\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SignUpControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testユーザーを登録できること(): void
    {
        $data = [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'P@ssw0rd',
            'password_confirmation' => 'P@ssw0rd',
        ];

        $this->post('/sign-up', $data)
            ->assertRedirect('/dashboard');
    }
}
