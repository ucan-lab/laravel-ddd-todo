@extends('layouts.app')

@section('title', __('views.auth.sign_in.title'))
@section('header', '')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">{{ __('views.auth.sign_in.title') }}</h3>
                            <form action="{{ route('sign-in') }}" method="post">
                                @csrf

                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input name="email" class="uk-input uk-form-large" type="email" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password" class="uk-input uk-form-large" type="password" required>
                                    </div>
                                </div>
                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                    <label><input name="remember" class="uk-checkbox" type="checkbox"> {{ __('views.auth.sign_in.remember_me') }}</label>
                                </div>
                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('views.auth.sign_in.sign_in') }}</button>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    {{ __('views.auth.sign_in.not_sign_up') }} <a href="{{ route('sign-up') }}">{{ __('views.auth.sign_in.sign_up') }}</a>
                                </div>
                                <div class="uk-text-small uk-text-center">
                                    {{ __('views.auth.sign_in.forgot_password') }} <a href="{{ route('password.request') }}">{{ __('views.auth.sign_in.send_password_resets') }}</a>
                                </div>
                            </form>
                        </div>
                        @if (config('app.debug'))
                            <div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-secondary uk-card-body uk-box-shadow-large">
                                <p>※デバッグ中のみ表示</p>
                                <ul>
                                    <li>メールアドレス: <code style="user-select: all">demo@example.com</code></li>
                                    <li>パスワード: <code style="user-select: all">P@ssw0rd</code></li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
