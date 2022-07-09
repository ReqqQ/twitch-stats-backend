@extends('layouts.main')
@section('content')
    <div id="example-div" class="d-flex flex-column aligns-items-center justify-content-center">
        @include('includes.loginForm')
        <div class="col-12 d-flex justify-content-center mt-3">
            <a href="{{route('twitch.auth')}}" class="btn bg-purple text-white">
                Login By twitch
            </a>
        </div>
    </div>
@stop
