@extends('layouts.app')

@section('title', __('views.welcome.title'))
@section('header', '')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-height-medium uk-width-2xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h2 class="uk-card-title uk-text-center uk-margin-large-bottom">{{ __('views.welcome.message') }}</h2>
                            <div class="uk-text-center">
                                <a class="uk-button uk-button-primary" href="{{ route('login') }}">{{ __('views.welcome.sign_in') }}</a>
                                <a class="uk-button uk-button-secondary" href="{{ route('sign-up') }}">{{ __('views.welcome.sign_up') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
