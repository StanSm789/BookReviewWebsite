<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Redirect;
use Session;

class ReviewController extends Controller
{

    /**
     * Middleware to see if the user is logged in or not to grant access to ReviewController CRUD
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->checkBookAndUserDetails() == null) {
            return view('reviews.createForm');
        } else {
            Session::flash('message', "You can create only one review per each book.");
            return Redirect::back(); 
        } 
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
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|min:5',
            ]);

        date_default_timezone_set('Australia/Brisbane');

        $review = new Review();
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->date = date('F j, Y, g:i a');
        $review->book_id = $request->book_id;
        $review->user_id = Auth::id();
        $review->save();
        return redirect("book/$review->book_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user(); 
        $review = Review::find($id);

        if ($user->id == $review->user_id || $user->type == "Moderator") {
            return view('reviews.editForm')->with('review', $review);
        } else {
            Session::flash('message', "You can edit only your own reviews.");
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
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|min:5',
            ]);

        $review = Review::find($id);
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->book_id = $request->book_id;
        $review->user_id = $review->user_id; 
        $review->save();
        return redirect("book/$review->book_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user(); 
        $review = Review::find($id);
        $book_id = $review->book_id;

        if ($user->id == $review->user_id || $user->type == "Moderator") {
            Review::destroy($id);
            return redirect("book/$book_id");
        } else {
            Session::flash('message', "You can edit only delete your own reviews.");
            return Redirect::back(); 
        } 
    }

    private function checkBookAndUserDetails() 
    {
        $user = Auth::user(); 
        $bookId = request()->get('book_id');
        $userId = Auth::id();

        $sql = "select * from reviews where user_id = ? and book_id =?";
        $reviews = DB::select($sql, array($userId, $bookId));

        return $reviews;
    }
}
