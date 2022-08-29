@extends('layouts.main')
@section('content')
    <div id="example-div" class="d-flex flex-column aligns-items-center justify-content-center">
        <video autoplay muted loop id="loginBackground">
            <source src="{{asset('/home/videos/loginBackground.mp4')}}" type="video/mp4">
        </video>
        <div class=" d-flex justify-content-center mt-3 z-index-1">
                <div class="login-box d-flex">
                    <x-text></x-text>
                    <div class="pb-5">
                        <a href="{{route('google.auth')}}" class="btn d-flex bg-purple text-purple login-text-width">
                            <div class="d-flex">
                                <span class="pe-3 font-swanky connect-text"> Connect with </span>
                                <img width="25" src="{{asset('images/login/google.svg')}}" alt="googleIcon">
                            </div>

                        </a>
                    </div>

                </div>

        </div>
    </div>
@stop
