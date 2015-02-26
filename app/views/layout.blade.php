<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Fledgling List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ui-lightness/jquery-ui.css') }}">
    <script src="{{ asset('js/jquery-1.11.2.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <header>
       <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">The Fledgling List</a>
                @if (Auth::check())
                <ul class="nav navbar-nav navbar-right" style="position: absolute; margin-left: 85%">
                    <a href="{{ url('logout') }}">
                    <button type="button" class="btn btn-link navbar-btn">
                        <li class="glyphicon glyphicon-log-out" style="..."></li>
                    </button>
                    </a>
                </ul>
                @endif
            </div>
       </nav>
    </header>

    @yield('content')

    <div class="bottom-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2 navbar-brand">
                    <a href="/">The Fledgling List</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
