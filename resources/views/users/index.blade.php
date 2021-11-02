@extends('layouts.master')

    @section('title')
        Users
    @endsection

    @section('content')
        @if ($users)
            @foreach ($users as $user)
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <br>
                        <a href="user/{{$user->id}}">
                            <h3>User Name: {{ $user->name }}</h3></a>
                        <p>User Type: {{ $user->type }}</p>
                        <br>
                    </div>
                </div>
            @endforeach
        @else
            No Users Have Been Found
        @endif
    @endsection