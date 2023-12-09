<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\SignOutRequest;
use Illuminate\Http\RedirectResponse;

final class SignOutController extends Controller
{
    public function __invoke(SignOutRequest $request): RedirectResponse
    {
        $this->auth->logout();
        $this->session->invalidate();
        $this->session->regenerateToken();

        return $this->redirector->route('welcome');
    }
}
