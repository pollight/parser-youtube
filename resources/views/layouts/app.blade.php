<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Парсинг товаров с ютуба</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <a class="navbar-brand" href="/">Парсинг продуктов с ютуба</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    @yield('script')

</div>
</body>
</html>
