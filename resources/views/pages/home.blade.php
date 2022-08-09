@extends('layouts.main')
@section('content')
    <div id="example-div" class="d-flex flex-column aligns-items-center justify-content-center">
        @include('includes.loginForm')
        <div class="col-12 d-flex justify-content-center mt-3">

            <a href="{{route('google.auth')}}" class="btn bg-purple text-white">
                Login By google
            </a>
        </div>
    </div>
@stop
