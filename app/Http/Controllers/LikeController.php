<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Models\Like;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Redirect;
use Session;

class LikeController extends Controller
{

    /**
     * Middleware to see if the user is logged in or not to grant access to LikeController CRUD
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
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->checkReviewAndUserDetails() == null) {
            $like = new Like();
            $like->like = $_GET['like_id'];
            $like->user_id = Auth::id();
            $like->review_id = $_GET['review_id'];
            $like->save();
            return back();
        } else {
            return back();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkReviewAndUserDetails() 
    {
        $user = Auth::user(); 
        $reviewId = request()->get('review_id');
        $userId = Auth::id();

        $sql = "select * from likes where user_id = ? and review_id =?";
        $likes = DB::select($sql, array($userId, $reviewId));

        return $likes;
    }
}
