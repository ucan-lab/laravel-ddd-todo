@extends('layouts.app')

@section('title', 'Rest password')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">パスワード変更画面</h3>

                            <form method="POST" action="{{ route('password.update', ['token' => $token, 'email' => $email]) }}">
                                @csrf

                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input name="email" class="uk-input uk-form-large" type="email" placeholder="Email" value="{{ $email }}" disabled>
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
                                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">
                                        Password Update
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
