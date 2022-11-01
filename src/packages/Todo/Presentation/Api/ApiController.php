<?php

declare(strict_types=1);

namespace Todo\Presentation\Api;

use Illuminate\Contracts\Routing\ResponseFactory;

abstract class ApiController
{
    public function __construct(
        protected ResponseFactory $responseFactory,
    ) {
    }
}
