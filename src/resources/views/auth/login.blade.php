@extends('layouts.app')

@section('title', 'Login')
@section('header', '')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Task App Login</h3>
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input name="email" class="uk-input uk-form-large" type="email" value="demo@example.com" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password" class="uk-input uk-form-large" type="password" value="password" required>
                                    </div>
                                </div>
                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                    <label><input name="remember" class="uk-checkbox" type="checkbox"> Remember me</label>
                                </div>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Login</button>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    Not registered? <a href="{{ route('register') }}">Create an account</a>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    Forgot password? <a href="{{ route('auth.forgot-password.form') }}">Send password resets</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
