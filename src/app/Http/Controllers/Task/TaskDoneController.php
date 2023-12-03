<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskDoneRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Service\Task\DoneTaskUseCase;
use Todo\Application\Service\Task\DoneTaskUseCaseInput;

final class TaskDoneController extends Controller
{
    public function __invoke(
        TaskDoneRequest $request,
        DoneTaskUseCase $useCase,
        string $taskId,
    ): RedirectResponse {
        $input = new DoneTaskUseCaseInput($taskId);

        try {
            $useCase->done($input);
        } catch (Exception $exception) {
            return $this->redirector->back()
                ->with(self::SESSION_FAILURE, $exception->getMessage());
        }

        return $this->redirector->route('tasks.index')
            ->with(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.done.success'));
    }
}
