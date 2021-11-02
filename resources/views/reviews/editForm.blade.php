@extends('layouts.master')

    @section('title')
            Edit Review
    @endsection

    @section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1>Edit Review:</h1>
            <form method="POST" action= '{{url("review/$review->id")}}'>
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <input type="hidden" name="book_id" value={{ request()->get('book_id') }}>

                <label for="validationDefault01">Rating</label>
                <input type="text" class="form-control" name="rating" value="{{$review->rating}}"> {{$errors->first('rating')}} </p>

                <label for="validationDefault02">Review</label>
                <input type="text" class="form-control" name="review" value="{{$review->review}}">{{$errors->first('review')}} </p>
                <button class="btn btn-primary" type="submit">Edit Review</button>
            </form>
        </div>
    </div>
    @endsection