@extends('layouts.app')

@section('title', 'Rest password')

@section('main')
    <div class="uk-container uk-margin-top">
        <h2>Forgot password</h2>
        <form class="create-task-form" action="{{ route('auth.rest-password') }}" method="POST">
            @csrf
            <div class="uk-flex">
                <input class="uk-input uk-width-expand uk-margin-small-right" type="email" name="email" placeholder="Enter the email">
                <button class="uk-button uk-button-primary uk-width-auto" type="submit">Send</button>
            </div>
        </form>
    </div>
@endsection
