@extends('layouts.app')

@section('title', __('views.tasks.edit.title'))

@section('main')
    <div class="uk-container uk-margin-top">
        <form class="uk-form-stacked" action="{{ route('tasks.update', $taskId) }}" method="POST">
            @csrf
            @method('put')

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">{{ __('views.tasks.edit.name') }}</label>
                <div class="uk-form-controls">
                    <input name="name" class="uk-input" id="form-stacked-text" type="text" value="{{ $taskName }}">
                </div>
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-primary" type="submit">{{ __('views.tasks.edit.update') }}</button>
            </div>
        </form>
    </div>
@endsection
