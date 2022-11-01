@extends('layouts.app')

@section('title', 'Task Edit')

@section('main')
    <form class="uk-form-stacked" action="{{ route('tasks.update', $taskId) }}" method="POST">
        @csrf
        @method('put')

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="text" value="{{ $name }}">
            </div>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-primary" type="submit">更新</button>
        </div>
    </form>
@endsection
