@extends('layouts.master')

    @section('title')
        Recommended
    @endsection

    @section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1>You may be intersted in these books:</h1>
                @foreach($books as $book)
                    @foreach($book as $item)
                    <a href="book/{{$item->id}}">
                        <h3>{{ $item->name }}</h3></a>
                        <p>by {{ $item->authorName }}</p>
                    @endforeach
                @endforeach
                <p><p>
        </div>
    @endsection