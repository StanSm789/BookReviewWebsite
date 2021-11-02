@extends('layouts.master')

    @section('title')
        User
    @endsection

    @section('content')
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">{{$user->name}}</h1>
            @if (Auth::user()->type == "Moderator")
                <p class="lead fw-normal">Email: {{$user->email}}</p>
            @endif
            <p class="lead fw-normal">User Type: {{$user->type}}</p>
        </div>
    </div>
    @endsection