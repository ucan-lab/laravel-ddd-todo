<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

final class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => (string) $request->input('email'),
            'password' => (string) $request->input('password'),
        ];

        if ($this->auth->attempt($credentials, (bool) $request->input('remember'))) {
            $this->session->regenerate();

            return $this->redirector->route('dashboard');
        }

        return $this->redirector
            ->back()
            ->withErrors(['danger' => 'ログインに失敗しました。']);
    }
}
