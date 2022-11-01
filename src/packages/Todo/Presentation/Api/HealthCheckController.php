<?php

declare(strict_types=1);

namespace Todo\Presentation\Api;

use Illuminate\Http\JsonResponse;
use Todo\Lang\Clock;

final class HealthCheckController extends ApiController
{
    public function __invoke(Clock $clock): JsonResponse
    {
        return $this->responseFactory->json([
            'sysdate' => $clock->now()->format('Y-m-d H:i:s'),
        ]);
    }
}
