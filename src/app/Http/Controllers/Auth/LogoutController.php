<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LogoutRequest;
use Illuminate\Http\RedirectResponse;

final class LogoutController extends Controller
{
    public function __invoke(LogoutRequest $request): RedirectResponse
    {
        $this->auth->logout();
        $this->session->invalidate();
        $this->session->regenerateToken();

        return $this->redirector->route('welcome');
    }
}
