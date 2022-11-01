<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Contracts\View\View;

final class TaskEditController extends Controller
{
    public function __invoke(Task $task): View
    {
        return $this->viewFactory->make('tasks.edit', [
            'taskId' => $task->id,
            'name' => $task->name,
        ]);
    }
}
