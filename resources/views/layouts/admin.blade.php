<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    @yield('css')
</head>
<body>

    @include('layouts.blocks.header-admin')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    @include('layouts.blocks.sidebar-admin')
                </div>
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @include('layouts.blocks.footer-admin')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/script.js')}}"></script>
    @yield('js')
    @stack('js')
</body>
</html>
