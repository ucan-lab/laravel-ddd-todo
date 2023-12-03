@extends('layouts.app')

@section('title', 'Sign Up')
@section('header', '')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Task App Sign Up</h3>
                            <form action="{{ route('sign-up') }}" method="post">
                                @csrf

                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                                        <input name="name" type="name" class="uk-input uk-form-large" type="text" placeholder="Name" required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input name="email" class="uk-input uk-form-large" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password" class="uk-input uk-form-large" type="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password_confirmation" class="uk-input uk-form-large" type="password" placeholder="Password Confirm" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Sign Up</button>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    Already have an account? <a href="{{ route('login') }}" uk-switcher-item="1">Log in</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
