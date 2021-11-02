<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use App\Models\Like;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;

class BookController extends Controller
{

    /**
     * Middleware to see if the user is logged in or not to grant access to BookController CRUD
     */
    public function __construct() {
        $this->middleware('auth', ['except'=>['index', 'show']]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.createForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:books',
            'authorName' => 'required|max:255',
            'year' => 'required|digits:4|integer',
            'publisher' => 'required|max:255',
            'description' => 'required|max:255',
            'recommendedRetailPrice' => 'required|numeric|gt:0', 
            'url' => 'active_url'
            ]);

        $book = new Book();
        $book->name = $request->name;
        $book->authorName = $request->authorName;
        $book->year = $request->year;
        $book->publisher = $request->publisher;
        $book->description = $request->description;
        $book->recommendedRetailPrice = $request->recommendedRetailPrice;
        $book->url = $request->url;
        $book->save();
        return redirect("book/$book->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $reviews = Review::whereRaw('book_id == ?', array($id))->paginate(5);
        $users = array();

        foreach ($reviews as $review) {
            $users[] = User::find($review->user_id);
        }
        $likes = Like::all();
        $images = Book::find($id)->images;

        return view('books.show')->with('book', $book)->with('reviews', $reviews)
        ->with('users', $users)->with('likes', $likes)->with('images', $images);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if (Auth::user()->type == "Moderator") {
        return view('books.editForm')->with('book', $book);
        } else {
            Session::flash('message', "You cannot update this book");
            return Redirect::back();  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:books',
            'authorName' => 'required|max:255',
            'year' => 'required|digits:4|integer',
            'publisher' => 'required|max:255',
            'description' => 'required|max:255',
            'recommendedRetailPrice' => 'required|numeric|gt:0', 
            'url' => 'active_url'
            ]);
            
        $book = Book::find($id);
        $book->name = $request->name;
        $book->authorName = $request->authorName;
        $book->year = $request->year;
        $book->publisher = $request->publisher;
        $book->description = $request->description;
        $book->recommendedRetailPrice = $request->recommendedRetailPrice;
        $book->url = $request->url;
        $book->save();
        return redirect("book/$book->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(Auth::user()->type == "Moderator") {
            $reviews = Book::find($id)->reviews;
            
            foreach($reviews as $review) {
                $review->delete();
            }

            Book::destroy($id);
            return redirect("book");
    } else {
        Session::flash('message', "You cannot delete this book");
        return Redirect::back();   
    }

    }
}
