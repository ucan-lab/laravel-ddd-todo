@section('header')
    <header>
        <nav class="uk-navbar-container uk-padding-small uk-padding-remove-vertical" uk-navbar>

            <div class="uk-navbar-left">
                <a href="" class="uk-navbar-item uk-logo">Todo App</a>

                @auth

                    <ul class="uk-navbar-nav">
                        <li><a href="{{ route('tasks.index', ['status' => 'undone']) }}">Undone</a></li>
                        <li><a href="{{ route('tasks.index', ['status' => 'done']) }}">Done</a></li>
                    </ul>

                @endauth

            </div>

            @guest
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('sign-up') }}">Register</a></li>
                    </ul>
                </div>
            @endguest

            @auth
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li><a href="">{{ auth()->user()?->name }}</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            @endauth

        </nav>
    </header>
@show
