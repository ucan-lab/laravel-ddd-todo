@extends('layouts.app')

@section('title', __('views.tasks.index.title'))

@section('main')
    <div class="uk-container uk-margin-top">
        <form class="create-task-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="uk-flex">
                <input class="uk-input uk-width-expand uk-margin-small-right" type="text" name="name" placeholder="{{ __('views.tasks.index.enter_new_task') }}">
                <input class="uk-input uk-width-1-4 uk-margin-small-right" type="date" name="dueDate" value="{{ now()->format('Y-m-d') }}">
                <button class="uk-button uk-button-primary uk-width-auto" type="submit">{{ __('views.tasks.index.actions.add_task') }}</button>
            </div>
        </form>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th class="uk-width-auto">{{ __('views.tasks.index.task_list.task_name') }}</th>
                    <th class="uk-width-1-6">{{ __('views.tasks.index.task_list.due_date') }}</th>
                    <th class="uk-width-1-6">{{ __('views.tasks.index.task_list.postpone_count') }}</th>
                    <th class="uk-width-1-6">{{ __('views.tasks.index.task_list.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($taskList as $task)
                    <tr>
                        <td>{{ $task['name'] }}<span class="{{ $task['status'] }}">{{ $task['status'] }}</span></td>
                        <td>{{ $task['dueDate'] }}</td>
                        <td class="uk-text-right">{{ $task['postponeCount'] }}</td>
                        <td>
                            <div class="uk-flex">
                                <form action="{{ route('tasks.postpone', $task['id']) }}" method="post">
                                    @csrf
                                    <button class="uk-button uk-button-small uk-button-danger uk-text-nowrap uk-margin-small-right" type="submit">{{ __('views.tasks.index.actions.postpone') }}</button>
                                </form>
                                <form action="{{ route('tasks.done', $task['id']) }}" method="post">
                                    @csrf
                                    <button class="uk-button uk-button-small uk-button-secondary uk-text-nowrap uk-margin-small-right" type="submit">{{ __('views.tasks.index.actions.complete') }}</button>
                                </form>
                                <a class="uk-button uk-button-small uk-button-default uk-text-nowrap" href="{{ route('tasks.edit', $task['id']) }}">{{ __('views.tasks.index.actions.edit') }}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="uk-text-center">{{ __('views.tasks.index.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
