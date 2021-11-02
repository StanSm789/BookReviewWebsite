@extends('layouts.master')

    @section('title')
            Create Book
    @endsection

    @section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1>Create a New Book:</h1>
            <form method="POST" action='{{url("book")}}'>
            {{csrf_field()}}

                <label for="validationDefault01">Book Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}"> <p> {{$errors->first('name')}} </p>

                <label for="validationDefault02">Author</label>
                <input type="text" class="form-control" name="authorName" value="{{old('authorName')}}"> <p> {{$errors->first('authorName')}} </p>

                <label for="validationDefault03">Year</label>
                <input type="text" class="form-control" name="year" value="{{old('year')}}"> <p> {{$errors->first('year')}} </p>

                <label for="validationDefault04">Publisher</label>
                <input type="text" class="form-control" name="publisher" value="{{old('publisher')}}"> <p> {{$errors->first('publisher')}} </p>

                <label for="validationDefault05">Description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}"> <p> {{$errors->first('description')}} </p>
                
                <label for="validationDefault06">Recommended Reatail Price</label>
                <input type="text" class="form-control" name="recommendedRetailPrice" value="{{old('recommendedRetailPrice')}}"> <p> {{$errors->first('recommendedRetailPrice')}} </p> 

                <label for="validationDefault07">URL</label>
                <input type="text" class="form-control" name="url" value="{{old('url')}}"> <p> {{$errors->first('url')}} </p> 

        <button class="btn btn-primary" type="submit">Create New Book</button>
            </form>
        </div>
    </div>
    @endsection
