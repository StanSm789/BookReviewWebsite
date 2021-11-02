@extends('layouts.master')

    @section('title')
        Books
    @endsection

    @section('content')
        @if ($books)
            @foreach ($books as $book)
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                    <div class="col-md-5 p-lg-5 mx-auto my-5">
                        <br>
                        <a href="book/{{$book->id}}">
                            <h3>{{ $book->name }}</h3></a>
                        <p>by {{ $book->authorName }}</p>
                        <br>
                    </div>
                </div>
            @endforeach
        @else
            No Books Have Been Found
        @endif
        
        @auth <!--- user is logged in --->
        <div>
        <h4 class="text-white"><a href=' {{url("book/create")}}'>Create New Book</a></h4>
        </div>
        @endauth
    @endsection