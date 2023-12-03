<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\ResponseFactory;
use Psr\Log\LoggerInterface;

abstract class Controller
{
    protected const string SESSION_SUCCESS = 'success';

    protected const string SESSION_FAILURE = 'failure';

    protected readonly StatefulGuard $auth;

    public function __construct(
        protected readonly LoggerInterface $logger,
        protected readonly Session $session,
        protected readonly Translator $translator,
        protected readonly ViewFactory $viewFactory,
        protected readonly ResponseFactory $responseFactory,
        protected readonly Redirector $redirector,
        AuthFactory $authFactory,
    ) {
        $this->auth = $authFactory->guard('web');
    }
}
