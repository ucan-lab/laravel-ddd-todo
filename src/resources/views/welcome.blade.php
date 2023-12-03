@extends('layouts.app')

@section('title', 'Task App')
@section('header', '')

@section('main')
    <div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-height-medium uk-width-2xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h2 class="uk-card-title uk-text-center uk-margin-large-bottom">Welcome to Task App</h2>
                            <div class="uk-text-center">
                                <a class="uk-button uk-button-primary" href="{{ route('login') }}">Login</a>
                                <a class="uk-button uk-button-secondary" href="{{ route('sign-up') }}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
