<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\ResetPasswordShowRequest;
use Illuminate\Contracts\View\View;

/**
 * @see https://readouble.com/laravel/10.x/ja/passwords.html
 */
final class ResetPasswordShowController extends Controller
{
    public function __invoke(ResetPasswordShowRequest $request, string $token): View
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }
}
