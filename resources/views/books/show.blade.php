@extends('layouts.master')

    @section('title')
        Book
    @endsection

    @section('content')

        <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{$book->name}}</h1>
            <p class="lead text-muted">Author Name: {{ $book->authorName }}</p>
            <p class="lead text-muted">Year: {{ $book->year }}</p>
            <p class="lead text-muted">Publisher: {{ $book->publisher }}</p>
            <p class="lead text-muted">Description: {{ $book->description }}</p>
            <p class="lead text-muted">Recommended Reatil Price: ${{ $book->recommendedRetailPrice }}</p>
            <a class="lead text-muted" href="{{$book->url}}">{{ $book->name }}'s URL</a>
            <p>
            @auth <!--- user is logged in --->
                <a href=' {{url("review/create?book_id=$book->id")}}' class="btn btn-primary my-2">Create New Review</a><br>
                @if (Auth::user()->type == "Moderator")
                    <a href=' {{url("book/$book->id/edit")}}' class="btn btn-secondary my-2">Edit Book</a>
                    <p><form method="POST" action= '{{url("book/$book->id")}}'>
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-secondary my-2" value="Delete Book">
                    </form></p>
                @endif
            @endauth
            </p>
        </div>
        </div>

        @if ($images)
            <table class="table">
            
                <thead>
                    <tr>
                    <th scope="col" width="15%">Author Name</th> 
                    <th scope="col" width="75%">Image</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($images as $image)
                    <tr>
                    @foreach ($users as $user)
                        @if ($user->id == $image->user_id)
                            <td>Uploaded by: {{$user->name}}</td>
                            @break;
                        @endif
                    @endforeach
                    <td><img src="{{url($image->image)}}" alt="book image"
                    style="width:300px;height:300px;"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @auth <!--- user is logged in --->
        <form method="POST" action='{{url("image?book_id=$book->id")}}' enctype="multipart/form-data">
            {{csrf_field()}}
            <p><input type="file" name="image" style="border: 1px solid"><input type="submit" value="Save Image"></p> {{$errors->first('image')}}
        </form>
        @endauth

    </section>

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        
        <div class="album py-5 bg-light">
        <h2>Reviews:</h2>
    <div class="container">

      <div class="row py-lg-5">
        <div class="col">
          <div class="card shadow-sm">
            
          @if($reviews)
            @foreach ($reviews as $review)
                    <p>Rating: {{ $review->rating }}</p>
                    <p>Review: {{ $review->review }}</p>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                    @auth <!--- user is logged in --->
                        @if (Auth::user()->id == $review->user_id || Auth::user()->type == "Moderator")
                        <p><a href=' {{url("review/$review->id/edit/?book_id=$book->id")}}' class="btn btn-sm btn-outline-secondary">Edit Review</a></p>
                            <form method="POST" action= '{{url("review/$review->id")}}'>
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Delete Review" class="btn btn-sm btn-outline-secondary">
                            </form> 
                        @endif
                        <form method="POST" action= '{{url("like?review_id=$review->id&like_id=1")}}'>
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <input type="submit" value="Like" class="btn btn-sm btn-outline-secondary" 
                            style="{{$review->isLikedBy(Auth::user()) ? 'background-color:#0080ff; color:#ffffff' : NULL}}">
                        </form>

                        <form method="POST" action= '{{url("like?review_id=$review->id&&like_id=0")}}'>
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <input type="submit" value="Dislike" class="btn btn-sm btn-outline-secondary" 
                            style="{{$review->isDislikedBy(Auth::user()) ? 'background-color:#0080ff; color:#ffffff' : NULL}}">
                        </form>
                       
                    @endauth
                    </div>

                    <p style="{{$review->compareLikesAndDislikes($review) ? 'color:#0080ff;' : 'color:#ff3333;'}}">
                    Likes: {{$review->countLikes($review)}} / Dislikes: {{$review->countDislikes($review)}}</p>
                    
                        
                 

                @foreach ($users as $user)
                        @if ($user->id == $review->user_id)
                            <!--- <small class="text-muted">Created by: {{ $user->name }}</small> --->
                            @break;
                        @endif
                    @endforeach
                    <small class="text-muted">Created by: {{ $user->name }}<br>Creation Date And Time: {{ $review->date }}</small>

                    @auth
                    <form method="POST" action= '{{url("following?followed_id=$user->id")}}'>
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <input type="submit" value="Follow" class="btn btn-sm btn-outline-secondary">
                        </form>

                        <form method="POST" action= '{{url("following/$user->id")}}'>
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Unfollow" class="btn btn-sm btn-outline-secondary">
                            </form> 
                    @endauth
                    
              </div>
              <hr/>
            </div>
            @endforeach
        {{ $reviews->links()}}
        @else
            No Reviews Have Been Found
        @endif
          </div>
        </div>
    @endsection