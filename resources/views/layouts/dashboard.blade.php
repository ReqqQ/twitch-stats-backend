<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container-fluid d-flex flex-column min-vh-100">
    <video autoplay muted loop id="loginBackground">
        <source src="{{asset('videos/loginBackground.mp4')}}" type="video/mp4">
    </video>
    <div class="row z-index-1 dashboard">
        <div class=" col-lg-4 col-xxl-2 d-flex flex-column align-items-center sidebar-background">
            @include('includes.sidebar')
        </div>
        <div class="col-lg-8 col-xxl-10">
            <div class="row">
                <div class="col-12 my-4">
                    @include('includes.content-top')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
