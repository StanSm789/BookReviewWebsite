@extends('layouts.master')

    @section('title')
        Followings
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
                    <table class="table">
            
                            <thead>
                                <tr>
                                    <th scope="col" width="15%">Book Name</th> 
                                    <th scope="col" width="5%">Rating</th>
                                    <th scope="col" width="40%">Review</th> 
                                    <th scope="col" width="40%">Date</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($reviews as $item)
                                    @foreach ($item as $review)
                                    @if ($user->id == $review->user_id)
                                        <tr>
                                        <td>{{$review->name}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{$review->review}}</td>
                                        <td>{{$review->date}}</td>
                                    @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                        </table>
                </div>
            @endforeach
        @else
            No Users Have Been Followed
        @endif
    @endsection