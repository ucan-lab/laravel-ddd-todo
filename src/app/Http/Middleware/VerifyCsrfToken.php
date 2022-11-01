<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

final class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @throws TokenMismatchException
     */
    public function handle($request, Closure $next): mixed
    {
        if (app()->environment() !== 'testing') {
            return parent::handle($request, $next);
        }

        return $next($request);
    }
}
