@extends('layouts.app')

@section('title', 'Profile Edit')

@section('main')
    <form class="uk-form-stacked" action="{{ route('profile') }}" method="POST">
        @csrf
        @put

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="text" value="{{ $name }}">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Email</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="email" value="{{ $email }}">
            </div>
        </div>

        <div class="uk-margin">
            <button class="uk-button uk-button-primary" type="submit">更新</button>
        </div>
    </form>
@endsection
