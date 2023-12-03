<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskIndexRequest;
use Illuminate\Contracts\View\View;
use Todo\Application\Service\Task\GetTaskListUseCase;
use Todo\Application\Service\Task\GetTaskListUseCaseInput;
use Todo\Domain\Model\Task\Task;

final class TaskIndexController extends Controller
{
    public function __invoke(
        TaskIndexRequest $request,
        GetTaskListUseCase $useCase,
    ): View {
        $input = new GetTaskListUseCaseInput($this->auth->id(), $request->input('status'));
        $output = $useCase->list($input);

        $taskList = [];

        /** @var Task $task */
        foreach ($output->taskList as $task) {
            $taskList[] = [
                'id' => $task->id(),
                'name' => $task->name(),
                'status' => $task->status(),
                'dueDate' => $task->dueDate()->format('Y-m-d'),
                'postponeCount' => $task->postponeCount(),
            ];
        }

        return $this->viewFactory->make('tasks.index', ['taskList' => $taskList]);
    }
}
