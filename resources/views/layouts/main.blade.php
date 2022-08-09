<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container d-flex flex-column min-vh-100">
        <header class="row flex-grow-0">
            @include('includes.header')
        </header>
        <div id="main" class="row flex-grow-1">
            @yield('content')
        </div>
        <footer class="row flex-grow-0 mt-auto">
            @include('includes.footer')
        </footer>
</div>
</body>
</html>
