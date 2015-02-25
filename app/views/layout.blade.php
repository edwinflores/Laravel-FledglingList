<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Fledgling List</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <header>
       <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">The Fledgling List</a>
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
