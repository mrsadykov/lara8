<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li><a href="{{ route('post.index') }}">Posts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
