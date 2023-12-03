@section('alert')
    @if (session('status'))
        <div class="uk-alert-success uk-margin-remove-bottom" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="uk-alert-success uk-margin-remove-bottom" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif

    @if (session('failure'))
        <div class="uk-alert-danger uk-margin-remove-bottom" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <ul>
                <li>{{ session('failure') }}</li>
            </ul>
        </div>
    @endif

    @if ($errors->any())
        <div class="uk-alert-danger uk-margin-remove-bottom" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@show
