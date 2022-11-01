@extends('layouts.app')

@section('title', 'Task List')

@section('main')
    <div class="uk-container uk-margin-top">
        <form class="create-task-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="uk-flex">
                <input class="uk-input uk-width-expand uk-margin-small-right" type="text" name="name" placeholder="Enter new task">
                <input class="uk-input uk-width-1-4 uk-margin-small-right" type="date" name="dueDate" value="{{ now()->format('Y-m-d') }}">
                <button class="uk-button uk-button-primary uk-width-auto" type="submit">Add Task</button>
            </div>
        </form>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th class="uk-width-auto">Task Name</th>
                    <th class="uk-width-1-6">Status</th>
                    <th class="uk-width-1-6">Due date</th>
                    <th class="uk-width-1-6">Postpone count</th>
                    <th class="uk-width-1-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($taskList as $task)
                    <tr>
                        <td>{{ $task['name'] }}</td>
                        <td>{{ $task['status'] }}</td>
                        <td>{{ $task['dueDate'] }}</td>
                        <td class="uk-text-right">{{ $task['postponeCount'] }}</td>
                        <td>
                            <div class="uk-flex">
                                <form action="{{ route('tasks.postpone', ['taskId' => $task['id']]) }}" method="post" class="uk-margin-small-right">
                                    @csrf
                                    <button class="uk-button uk-button-small uk-button-danger " type="submit">Postpone</button>
                                </form>
                                <form action="{{ route('tasks.done', ['taskId' => $task['id']]) }}" method="post">
                                    @csrf
                                    <button class="uk-button uk-button-small uk-button-secondary" type="submit">Complete</button>
                                </form>
                                <a class="uk-button uk-button-small uk-button-default" href="{{ route('tasks.edit', $task['id']) }}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="uk-text-center">No task data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
