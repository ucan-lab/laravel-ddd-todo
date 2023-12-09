@section('header')
    <header>
        <nav class="uk-navbar-container uk-padding-small uk-padding-remove-vertical" uk-navbar>

            <div class="uk-navbar-left">
                <a href="" class="uk-navbar-item uk-logo">{{ __('views.components.header.app_name') }}</a>

                @auth

                    <ul class="uk-navbar-nav">
                        <li><a href="{{ route('tasks.index', ['status' => 'undone']) }}">{{ __('views.components.header.undone') }}</a></li>
                        <li><a href="{{ route('tasks.index', ['status' => 'done']) }}">{{ __('views.components.header.done') }}</a></li>
                    </ul>

                @endauth

            </div>

            @guest
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li><a href="{{ route('login') }}">{{ __('views.components.header.sign_in') }}</a></li>
                        <li><a href="{{ route('sign-up') }}">{{ __('views.components.header.sign_up') }}</a></li>
                    </ul>
                </div>
            @endguest

            @auth
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li><a href="">{{ auth()->user()?->name }}</a></li>
                        <li><a href="{{ route('logout') }}">{{ __('views.components.header.sign_out') }}</a></li>
                    </ul>
                </div>
            @endauth

        </nav>
    </header>
@show
